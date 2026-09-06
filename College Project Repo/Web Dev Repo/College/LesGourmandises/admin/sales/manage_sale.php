<?php


if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM `sale_list` where id = '{$_GET['id']}' ");
    if ($qry->num_rows > 0) {
        $res = $qry->fetch_array();
        foreach ($res as $k => $v) {
            if (!is_numeric($k)) {
                $$k = $v;
            }
        }
    } else {
        echo '<script> alert("Unknown Sale\'s ID."); location.replace("./?page=sales"); </script>';
    }
   
}
?>
<style>
    body {
        overflow: hidden !important;
    }

    .text-sm .select2-container--default .select2-selection--single .select2-selection__rendered, select.form-control-sm ~ .select2-container--default .select2-selection--single .select2-selection__rendered {
        margin-top: -0.4rem;
        font-size: 30px !important;
        font-weight: bold !important;
    }
    .card-footer {
        position: absolute;
        bottom: 0;
        right: 0;

    }

    .content .py-3 {
        padding: 0 !important;
    }

    #sales-panel {
        height: 100vh;
        /* width: 130vh; */

    }

    #panel-left,
    #item-list {
        background: rgb(255 255 255 / 17%);
    }

    #item-list {
        height: 56%;
    }

    #change-dollars {
        position: absolute;
        top: 5px;
    }

    .c-w {
        color: white !important;
    }

    /* Make the radio button larger */
    .btn-check {
        display: none;
    }

    /* Change the background color when the radio button is checked */

    /* Style the label to make the text and button appear nicely */
    .radio-label {
        font-size: 20px !important;

        background-color: ghostwhite;
        color: black;
        display: inline-block;
        cursor: pointer;
        margin: 0;
    }

    .radio-label {
        padding: 15px;
        width: 100%;
        text-align: center;
    }

    /* When the radio button is checked, change the label background to red */


    /* Optional: Add a hover effect to the labels */


    /* Change the border color of the label when selected */
    .btn-check:checked+.radio-label {
        background-color: red;
        color: white;
    }

    .select2-selection.select2-selection--single {
        height: 60px !important;
        /* Set the height to 40px */
        line-height: 40px !important;
        /* Vertically center the text inside the box */
    }

    /* .select2.select2-container {
        width: 50% !important;
        height: 100px !important;
    }

    
   
/*toul al 3amoud*/
    /* .select2.select2-container .select2-selection .select2-selection__arrow {
        background: #f8f8f8;
        border-left: 1px solid #ccc;
        -webkit-border-radius: 0 3px 3px 0;
        -moz-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
        height: 100px;
        width: 33px;
    } */




    .cont {
        height: 100%;
        width: 100%;
    }

    /* Custom Dropdown Styles */
    .custom-dropdown {
        position: relative;
        width: 100%;
        display: inline-block;
        padding-top:15px;
        padding-bottom:10px;
        /* background-color:red; */

    }

    .dropdown-label {
        font-size: 20px;
        font-weight: bold;
        display: block;
        margin-bottom: 10px;
        cursor: pointer;

    }

    .dropdown-options {
        display: none;
        position: absolute;
        top: 100%;
        left: 0px;
        right: 0;
        z-index: 100;
        background-color: white;
        border: 1px solid #ccc;
        width: 130px;
        height: 350px;


    }

    .custom-dropdown:hover .dropdown-options {
        align-items: flex-start;
        display: flex;

        flex-direction: column;
        justify-content: space-between;
        padding-top:30px;
        margin: 0;

        /* Show options when hovering over the dropdown */
    }

    .dropdown-option {
        display: block;
        font-size: 18px;
        padding:0;
        margin:0;
        cursor: pointer;
        /* border: 5px solid red */

    }

    .dropdown-option input {
        margin: 0;
        padding:0;
        width: 30px !important;
        height: 30px !important;
        border: 5px solid red;
    }

    .black {
        color: black;
        font-size: 25px;
        font-weight: bold;
    }
</style>
<div class="content py-3">
    <div class="container-fluid p-0 m-0">
        <div class="card card-outline card-outline rounded-0 shadow blur">
            <!-- <div class="card-header">
                <h5 class="card-title"><?= isset($id) ? "Update " . $code . " Sale" : "New Sale" ?></h5>
            </div> -->
            <div class="card-body m-0 p-0">
                <div class="container-fluid">
                    <form action="" id="sale-form">
                        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
                        <input type="hidden" name="amount" value="<?= isset($amount) ? $amount : '' ?>">
                        <input type="hidden" name="client_id" value="<?= isset($client_id) ? $client_id : '' ?>">
                        <input type="hidden" name="dev_id" id="dev_id" value="<?= isset($div_id) ? $div_id : '' ?>">






                        <div class="border rounded-0 shadow bg-gradient-navy px-1 py-1" id="sales-panel">
                            <div class="d-flex h-100 w-100">
                                <div class="col-6 px-0 h-100" id="panel-left">
                                    <div class="card card-primary bg-transparent border-0 h-100 card-tabs rounded-0">
                                        <div class="card-header bg-gradient-dark p-0 pt-1" dir="rtl">
                                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                <?php
                                                $has_active = false;
                                                $category = $conn->query("SELECT * FROM `category_list` where delete_flag = 0 and `status` = 1  order by `order_cat` asc");
                                                $product = $conn->query("SELECT * FROM `product_list` where delete_flag = 0 and `status` = 1  order by `order` asc");
                                                $prod_arr = [];
                                                while ($row = $product->fetch_array()) {
                                                    $prod_arr[$row['category_id']][] = $row;
                                                }
                                                $cat_arr = array_column($category->fetch_all(MYSQLI_ASSOC), 'name', 'id');
                                                foreach ($cat_arr as $k => $v):
                                                ?>
                                                    <li class="nav-item">
                                                        <a style="font-size: 30px; font-weight:bold;" class="nav-link <?= (!$has_active) ? 'active' : '' ?>" id="custom-tabs-one-home-tab" data-toggle="pill" href="#cat-tab-<?= $k ?>" role="tab" aria-controls="cat-tab-<?= $k ?>" aria-selected="<?= (!$has_active) ? 'true' : 'false' ?>"><?= $v ?></a>
                                                    </li>
                                                <?php
                                                    $has_active = true;
                                                endforeach;
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="card-body  overflow-auto">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <?php
                                                $has_active = false;
                                                foreach ($cat_arr as $k => $v):
                                                ?>
                                                    <div class="tab-pane fade <?= (!$has_active) ? 'active show' : '' ?>" id="cat-tab-<?= $k ?>" role="tabpanel" aria-labelledby="cat-tab-<?= $k ?>-tab">
                                                        <div class="row ordering" id="sortable-<?= $k ?>"> <!-- Add a unique ID for the sortable container -->
                                                            <?php if (isset($prod_arr[$k])): ?>
                                                                <?php foreach ($prod_arr[$k] as $row): ?>
                                                                    <div class="col-<?php if ($k == 50) {
                                                                                        echo "4";
                                                                                    } else {
                                                                                        echo "6";
                                                                                    } ?> px-3 py-3"> <!-- col-4 ensures 3 items per row (12 / 4 = 3) -->
                                                                        <a href="javascript:void(0)" class="card rounded-pill text-dark text-decoration-none prod-item w-100"
                                                                            data-order="<?= $row['order'] ?>"
                                                                            data-price="<?= $row['price'] ?>"
                                                                            data-id="<?= $row['id'] ?>">
                                                                            <div class="card-body text-center p-0 w-auto" style="font-size: 25px; font-weight: bold; white-space: nowrap;padding-top: 20px !important;padding-bottom: 20px !important;">
                                                                                <?= $row['name']  ?>

                                                                            </div>
                                                                        </a>

                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                <?php
                                                    $has_active = true;
                                                endforeach;
                                                ?>

                                            </div>
                                        </div>
                                        <div id="off-on" class="btn btn-success">OFF</div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <div class="col-6 h-100">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group d-flex mt-3">
                                                <!-- <label for="client_name1" class="control-label">Client Full Name</label> -->
                                                <?php

                                                $selectedClient = null;
                                                if (isset($client_id) && !empty($client_id)) {
                                                    $stmt = $conn->prepare("SELECT id, clientName, phone, address FROM clients WHERE id = ?");
                                                    $stmt->bind_param("i", $client_id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    $selectedClient = $result->fetch_assoc();
                                                }
                                                ?>
                                                <select id="client_name1" class="form-control form-control-sm rounded-0">
                                                <?php if (isset($selectedClient) && !empty($selectedClient)): ?>
                                                    <option value="<?= $selectedClient['clientName'] ?>" selected>
                                                        <?= htmlspecialchars($selectedClient['id']) ?> (<?= htmlspecialchars($selectedClient['phone']) ?>)
                                                    </option>
                                                <?php endif; ?>
                                                </select>
                                                <!-- <select id="client_name1" class="form-control form-control-sm rounded-0"></select> -->

                                                <a href="javascript:void(0)" id="create_new" class="btn btn-primary btn-block rounded-0 p-0 m-0 text-center" style="font-size: 20px !important; font-weight: bold; background: forestgreen;height:60px;">Create And Edite</a>

                                            </div>
                                        </div>
                                       
                                       
                                    </div>
                                    <table class="table table-bordered table-striped mb-0">
                                        <colgroup>
                                            <col width="auto">
                                            <col width="auto">
                                            <col width="auto">
                                            <col width="auto">
                                            <col width="auto">
                                            <col width="auto">
                                        </colgroup>
                                        <thead>
                                            <tr class="bg-gradient-navy-dark">
                                                <th class="text-center px-2 py-1">QTY</th>
                                                <th class="text-center px-2 py-1">Product</th>
                                                <th class="text-center px-2 py-1">Total</th>
                                                <th class="text-center px-2 py-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>
                                    </table>

                                    <div id="item-list" class="overflow-auto">

                                        <table class="table table-bordered table-striped" id="product-list">
                                            <colgroup>

                                                <col width="10%">
                                                <col width="65%">
                                                <col width="15%">
                                                <col width="10%">
                                                <col width="10%">
                                            </colgroup>
                                            <tbody>
                                                <?php if (isset($id)): ?>
                                                    <?php
                                                    $sp_query = $conn->query("SELECT sp.*, p.name as `product` FROM `sale_products` sp inner join `product_list` p on sp.product_id =p.id where sp.sale_id = '{$id}'");
                                                    while ($row = $sp_query->fetch_assoc()):
                                                        $prodCheckedValues = explode(',', $row['prod_cheked']);

                                                    ?>
                                                        <tr>
                                                            <td class="p-0 m-0 align-middle">
                                                                <input type="hidden" name="product_id[]" value="<?= $row['product_id'] ?>">
                                                                <input type="hidden" name="product_price[]" value="<?= $row['price'] ?>">
                                                                <input type="hidden" name="product_name[]" value="<?= $row['prod_name'] ?>">
                                                                <input type="hidden" name="product_cheked[]" value="<?= $row['prod_cheked'] ?>">

                                                                <input style="font-size:25px;font-weight:bold;height:60px" type="number" class="form-control form-control-sm rounded-0 text-left p-0 m-0" min="0" name="product_qty[]" value="<?= $row['qty'] ?>" required>
                                                            </td>
                                                            <td class="align-middle p-0 m-0" style="line-height:2.3em; margin:0!important;padding-right: 3px !important;">
                                                                <p style="font-size:25px!important;overflow:unset;padding-right:5px !important" class="product_name text-right truncate-1 p-0 m-0"><?= $row['prod_name'] ?></p>
                                                                <span style="font-size:20px; font-weight:bold;" id="product_price" class="product_price p-0 m-0">x <?= format_num($row['price']) ?></span>
                                                                <!-- <p class="m-0"><small class="product_price"></small></p> -->
                                                            </td>
          
                                                            <td style="font-size:25px!important;" id="product_total" class="p-0 m-0 align-middle text-right product_total"><?= '$' . format_num($row['price'] * $row['qty']) ?></td>
                                                            <!-- <td class="px-2 py-1 align-middle text-right product_total"></td> -->

                                                            <td class="p-0 m-0 align-middle text-center">
                                                                <button style="font-size:20px!important;color:white !important;" class="btn btn-outline-danger border-0 btn-sm rounded-0 edit-product " type="button"><i class="fa fa-edit"></i></button>
                                                            </td>
                                                            <td class="align-middle text-center"><button style="font-size:20px!important;" class="btn btn-outline-danger border-0 btn-sm rounded-0 rem-product p-0 m-0" type="button"><i class="fa fa-times"></i></button></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <h3 class="text-light w-100 d-flex">
                                        <div class="col-auto">Total:</div>
                                        <div style="margin-left:50px" class="col-auto flex-shrink-1 flex-grow-1 truncate-1 text-left" id="amount"><?= isset($amount) ? '$'. format_num($amount) : '0.00' ?></div>
                                    </h3>

                                    <h3 class="d-flex w-100 align-items-center">
                                        <div class="col-4">Discount:</div>
                                        <div class="col-8 d-flex">
                                            <input type="text" pattern="[0-9\.]*$" name="disc" class="form-control form-control-lg rounded-0 text-right" id="discount-input" placeholder="Enter discount percentage" value="<?= isset($disc) ? format_num($disc) : '' ?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
                                            <button type="button" id="apply-discount" class="btn btn-success ml-2">Apply</button>
                                            <button type="button" id="remove-discount" class="btn btn-danger ml-2">Remove</button>
                                        </div>
                                    </h3>
                                    <h3 class="d-flex w-100 align-items-center">
                                        <div class="col-5">
                                            <input type="radio" class="btn-check" name="payment_type" id="payment_type_takeaway" value="1"
                                                <?= isset($payment_type) && $payment_type == 1 ? "checked" : "checked" ?> required>
                                            <label class="radio-label" for="payment_type_takeaway">Takeaway</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="radio" class="btn-check" name="payment_type" id="payment_type_delivery" value="2"
                                                <?= isset($payment_type) && $payment_type == 2 ? "checked" : "" ?> required>
                                            <label class="radio-label" for="payment_type_delivery">Delivery : <span style="position: relative; left:20px; bottom:0px" id="dev-charg1"><?php if (isset($dev_charg)) {
                                                                                                                                                                                            echo $dev_charg = round($dev_charg, 0);
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo "";
                                                                                                                                                                                        } ?></span></label>
                                        </div>

                                    </h3>


                                    <!-- Hidden Input for Delivery Charge -->
                                    <input type="hidden" name="dev_charg" id="dev_charg" value="<?= isset($dev_charg) ? $dev_charg : '' ?>">
                                    <!-- Example delivery charge -->
                                    <h3 class="d-flex w-100 align-items-center">
                                        <div class="col-4" style="background-color: mediumblue;">
                                            <button style="font-size:20px !important; font-weight:bold !important;color: white;" type="button" id="restore-btn" class="btn  w-100 h-100 p-3">Restore<span> 0</span></button>
                                        </div>
                                        <div class="col-4" style="background-color: yellow;">
                                            <button style="font-size:20px !important; font-weight:bold !important;color:black;" type="button" id="hold-btn" class="btn  w-100 h-100 p-3">Hold</button>

                                        </div>
                                        <div class="col-4 text-center" style="color: white;background-color:brown !important">
                                            <?php if (!isset($id)): ?>
                                                <a style="font-size:20px !important; font-weight:bold !important;border: none !important;color: white;padding-top: 15px;" class="btn w-100 h-100 p-3" href="<?php if($_settings->userdata('type') == 1){
                                                    echo "./?page=sales";
                                                }else{
                                                    echo "./";
                                                } ?>">Cancel</a>
                                            <?php else: ?>
                                                <a style="font-size:20px !important; font-weight:bold !important;color: white;padding-top: 15px;" class="btn text-center w-100 h-100" href="./?page=sales/view_details&id=<?= $id ?>">Cancel</a>
                                            <?php endif; ?>
                                        </div>
                                    </h3>

                                    <h3 class="d-flex w-100 align-items-center">
                                        <div class="col-4" style="background-color: red;">
                                            <div style="font-size:20px !important; font-weight:bold !important;color: white;" id="disc" class="btn w-100 h-100 p-3">Discount</div>
                                        </div>
                                        <div class="col-4" style="background-color: green;">
                                            <button style="font-size:20px !important; font-weight:bold !important;color: white;" class="btn w-100 h-100 p-3" id="fast-print">Fast Print</button>
                                        </div>
                                        <div class="col-4" style="background-color: maroon;">
                                            <button style="font-size:20px !important; font-weight:bold !important;color: white;" class="btn w-100 h-100 p-3" id="fast-print-fast">Fast Print 2</button>
                                        </div>
                                    </h3>

                                    <!-- Add Discount Input Field -->
                                    <!-- Discount Input Field -->
                                        <div id="discount-input" style="display: none;">
                                            <input type="number" id="discount-percentage" placeholder="Enter discount percentage" style="font-size:20px; padding:10px;">
                                            <div class="btn w-100 h-100 p-3" id="apply-discount">Apply Discount</div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<noscript id="product-clone">
    <tr>

        <td class="p-0 m-0 align-middle text-right">
            <input type="hidden" name="product_id[]">
            <input type="hidden" name="product_price[]">
            <input type="hidden" name="product_name[]">
            <input type="hidden" name="product_cheked[]">

            <input style="font-size:25px;font-weight:bold;height:60px" type="number" class="form-control form-control-sm rounded-0 text-left p-0 m-0" min="0" name="product_qty[]" value="1" required>
        </td>

        <td class="align-middle p-0 m-0" style="line-height:2.6em; margin:0!important;padding-right: 3px !important;position:relative">
            <p style="font-size:25px!important;overflow:unset;padding-right:5px !important" id="product_name" class="product_name text-right p-0 m-0">Product 101 </p>
            <span style="font-size:20px; font-weight:bold;position:absolute;left:0;bottom:0;" id="product_price" class="product_price p-0 m-0">$ 123.00</span>
            <!-- <p style="font-size:25px!important;" class="text-right pt-4"><small id="product_price" class="product_price">x 123.00</small></p> -->
        </td>
        <td style="font-size:25px!important;" id="product_total" class="p-0 m-0 align-middle text-right product_total">$</td>
        <td class="p-0 m-0 align-middle text-center">
            <button style="font-size:20px!important;color:white !important;padding-top:15px;padding-bottom: 15px;" class="btn btn-outline-danger border-0 btn-sm rounded-0 edit-product w-100 h-100 " type="button"><i class="fa fa-edit"></i></button>
        </td>
        <td class="align-middle text-center p-0 m-0"><button style="font-size:20px!important;padding:12px 12px 12px 24px!important;" class="btn btn-outline-danger border-0 btn-sm rounded-0 rem-product p-0 m-0" type="button"><i class="fa fa-times"></i></button></td>

        <!-- <td class="px-2 py-1 align-middle text-center">
            <button class="btn  border-0 btn-sm rounded-0 add-product p-1" type="button"><i class="fa fa-edit"></i></button>
        </td> -->
    </tr>
</noscript>
<script>
    $(document).ready(function() {

        // $(".ordering").sortable("destroy");
        $('#fast-print').click(function() {
            $('#sale-form').data('fast-print', true);
            // $('#sale-form').submit();
        });
        $('#fast-print-fast').click(function() {

            $('#sale-form').data('fast-print-fast', true);
            // $('#sale-form').submit();
        });

        $('#guest_user_input').focus();



        const deliveryRadioButton = document.getElementById('payment_type_delivery');
        const takeawayRadioButton = document.getElementById('payment_type_takeaway');
        const deliveryChargeInput = document.getElementById('dev_charg');

        // Event listener to detect when the "Delivery" radio button is selected
        deliveryRadioButton.addEventListener('change', function() {
            if (this.checked) {
                // Show prompt when "Delivery" is selected
                let deliveryPrice = prompt("Please enter the price for delivery:");

                // Check if the user entered a valid number
                if (deliveryPrice && !isNaN(deliveryPrice)) {
                    // Set the value of the delivery charge
                    deliveryChargeInput.value = deliveryPrice;

                    if (deliveryPrice) {
                        $('#dev-charg1').text(deliveryPrice); // Update #div-charg with the deliveryPrice value
                    } else {
                        $('#dev-charg1').text(""); // Clear the text if deliveryPrice has no value
                    }
                    // calc_total_amount();
                }

            }
        });
        takeawayRadioButton.addEventListener('change', function() {
            if (this.checked) {
                deliveryChargeInput.value = 0;
                $('#dev-charg1').text("");
                // calc_total_amount();
            }
        });
    

  
        // Recalculate total amount when discount is applied
        
        // Optional: If you want to reset the delivery charge when "Takeaway" is selected, you can use this:

        updateRestoreCount()
        $('#hold-btn').click(function() {
            // Prompt the user to enter a name for the hold
            let holdName = prompt("Please enter a name for this hold:");

            // Check if the user entered a valid name
            if (holdName && holdName.trim() !== '') {
                // Create an array to hold product data
                let productsArray = [];

                // Loop through all the product rows and store the data in productsArray
                $('#product-list tbody tr').each(function() {
                    let productId = $(this).find('[name="product_id[]"]').val();
                    let productPrice = $(this).find('[name="product_price[]"]').val();
                    let productQty = $(this).find('[name="product_qty[]"]').val();
                    let productNameClass = $(this).find('[name="product_name[]"]').val(); // Use .text() to get the text content
                    let productTotalClass = $(this).find('.product_total').text(); // Use .text() to get the text content

                    // Get the checkbox values for this product row
                    let selectedValues = [];
                    $(this).find('.dropdown-options input[type="checkbox"]:checked').each(function() {
                        selectedValues.push($(this).val()); // Store checked values (1, 2, 3, etc.)
                    });

                    // Add the product data along with the selected checkboxes to the array
                    productsArray.push({
                        id: productId,
                        price: productPrice,
                        qty: productQty,
                        prod_name: productNameClass,
                        prod_total: productTotalClass,
                        selectedValues: selectedValues // Save the checked checkbox values
                    });
                });

                // Save the productsArray to localStorage under the given name
                localStorage.setItem('heldProducts_' + holdName, JSON.stringify(productsArray));

                // Reset the product-clone input values (effectively clearing the table or form)
                $('#product-list tbody').empty(); // Clears all the rows in the product list

                updateRestoreCount(); // Update the restore count
            } else {
                // If no name is entered or it is just spaces, show a message
                alert("Please provide a valid name for the hold.");
            }
        });


        function updateRestoreCount() {
            // Get all keys from localStorage that start with 'heldProducts_'
            let storedKeys = Object.keys(localStorage).filter(key => key.startsWith('heldProducts_'));

            // Update the span inside the restore button with the count
            let count = storedKeys.length;
            $('#restore-btn span').text(` (${count})`); // Update the span with the count
        }

        $('#restore-btn').click(function() {
            // Get all keys from localStorage that start with 'heldProducts_'
            let storedKeys = Object.keys(localStorage).filter(key => key.startsWith('heldProducts_'));

            // Check if there are any stored holds
            if (storedKeys.length === 0) {
                alert("No holds available to restore.");
                return;
            }

            // Create a select box with options for each stored hold
            let selectHtml = '<select id="hold-select" class="form-control">';
            storedKeys.forEach(key => {
                // Extract the name from the key (everything after 'heldProducts_')
                let holdName = key.replace('heldProducts_', '');
                selectHtml += `<option value="${key}">${holdName}</option>`;
            });
            selectHtml += '</select>';

            // Show the select box in a modal or a prompt
            let restoreModal = `
            <div id="restore-modal" class="modal" style="display:block;width:500px;margin-left:30px">
                <div class="modal-content">
                    <h4>Select a saved hold to restore</h4>
                    ${selectHtml}
                    <button id="restore-confirm" class="btn btn-success">Restore</button>
                    <button id="restore-cancel" class="btn btn-danger">Cancel</button>
                </div>
            </div>
            `;
            $('body').append(restoreModal);

            // When the Cancel button is clicked
            $('#restore-cancel').click(function() {
                $('#restore-modal').remove(); // Close the modal
            });

            // When the Restore button in the modal is clicked
            $('#restore-confirm').click(function() {
                // Get the selected hold name
                let selectedKey = $('#hold-select').val();

                // Retrieve the stored product array from localStorage
                let storedProducts = JSON.parse(localStorage.getItem(selectedKey));

                // Clear the existing product list
                $('#product-list tbody').empty();

                // Loop through the stored products and restore them to the table
                storedProducts.forEach(product => {
                    let rowHtml = `
            <tr>
                
              
                <td class="p-0 m-0 align-middle">
                <input type="hidden" name="product_cheked[]" value="${product.selectedValues}">
                    <input type="hidden" name="product_id[]" value="${product.id}">
                    <input type="hidden" name="product_price[]" value="${product.price}">
                    <input type="hidden" name="product_name[]" value="${product.prod_name}">
                    <input style="font-size:25px;font-weight:bold;height:60px" type="number" class="form-control form-control-sm rounded-0 text-left p-0 m-0" min="0" name="product_qty[]" value="${product.qty}" required>
                </td>

                <td class="align-middle p-0 m-0" style="line-height:2.3em; margin:0!important;padding-right: 3px !important;">
                    <p style="font-size:25px!important;overflow:unset;padding-right:5px !important" id="product_name" class="product_name text-right truncate-1 p-0 m-0">${product.prod_name} </p>
                    <span style="font-size:20px; font-weight:bold;" id="product_price" class="product_price p-0 m-0">x${product.price}</span>
                </td>
          
                <td style="font-size:25px!important;" id="product_total" class="p-0 m-0 align-middle text-right product_total">${product.prod_total}</td>
                <td class="p-0 m-0 align-middle text-center">
                     <button style="font-size:20px!important;color:white !important;" class="btn btn-outline-danger border-0 btn-sm rounded-0 edit-product " type="button"><i class="fa fa-edit"></i></button>
                </td>
                <td class="align-middle text-center"><button style="font-size:20px!important;" class="btn btn-outline-danger border-0 btn-sm rounded-0 rem-product p-0 m-0" type="button"><i class="fa fa-times"></i></button></td>
            </tr>
            `;

                    // Add the row to the table
                    $('#product-list tbody').append(rowHtml);
                    // console.log(product.selectedValues)
                    // Restore the selected checkbox values
                    product.selectedValues.forEach(value => {
                        // Use the proper selector to check the checkbox based on its value
                        $('#product-list tbody tr').last().find('.dropdown-options input[value="' + value + '"]').prop('checked', true);
                    });
                });

                // Remove the restored products from localStorage
                localStorage.removeItem(selectedKey);
                updateRestoreCount();
                calc_total_amount(); // You may need to recalculate totals

                // Close the modal after restoring
                $('#restore-modal').remove();
            });
        });




        $("#off-on").click(function() {
            let x = 0; // Declare x as 0 initially

            // Check the current state of the button text
            if ($(this).text() === "OFF") {
                // Show a confirmation dialog asking the user if they want to enable sorting
                var userResponse = confirm("هل ترغب في تفعيل الترتيب؟");

                if (userResponse) {
                    $(this).text("ON"); // Change the button text to "ON"
                    x = 1; // Set x to 1 to indicate sorting is enabled

                    // Show a success message that sorting is now enabled
                    // alert("Sorting has been enabled.");
                } else {
                    // If the user clicks "Cancel", we don't change the button text
                    return;
                }
            } else if ($(this).text() === "ON") {
                // Show a confirmation dialog asking the user if they want to disable sorting
                var userResponse = confirm("هل ترغب في تعطيل الترتيب؟");

                if (userResponse) {
                    $(this).text("OFF"); // Change the button text to "OFF"
                    x = 0; // Set x to 0 to indicate sorting is disabled

                    // Show a success message that sorting has been disabled
                    // alert("Sorting has been disabled.");
                } else {
                    // If the user clicks "Cancel", we don't change the button text
                    return;
                }
            }

            // If sorting is enabled (x = 1), initialize sortable functionality
            if (x === 1) {
                $(".ordering").sortable({
                    update: function(event, ui) {
                        var updatedOrder = [];

                        $(this).children().each(function(index) {
                            var dataId = this.getAttribute('data-id');
                            var dataOrder = this.getAttribute('data-order');

                            // If attributes are still null, inspect deeper
                            if (!dataId || !dataOrder) {
                                var childAttributes = this.children[0]?.attributes;
                                if (childAttributes) {
                                    dataId = childAttributes.getNamedItem('data-id')?.nodeValue || null;
                                    dataOrder = childAttributes.getNamedItem('data-order')?.nodeValue || null;
                                }
                            }

                            // If we still don't have valid attributes, log the error
                            if (!dataId || !dataOrder) {
                                console.error("Failed to extract data-id or data-order for element:", this);
                            } else {
                                // Update the `data-order` value directly
                                var newOrder = index + 1;
                                this.setAttribute('data-order', newOrder);

                                // Add to the updatedOrder array
                                updatedOrder.push({
                                    id: dataId,
                                    order: newOrder
                                });
                            }
                        });

                        console.log("Final Updated Order Array: ", updatedOrder);

                        // Send the updated order to the server via AJAX
                        $.ajax({
                            url: _base_url_ + "classes/Master.php?f=update_order",
                            method: 'POST',
                            data: {
                                updatedOrder: JSON.stringify(updatedOrder)
                            },
                            success: function(response) {
                                console.log("Server Response: ", response);
                                if (response === '1') {
                                    alert_toast("Order updated successfully.", 'success');
                                } else {
                                    alert_toast("Error updating the order.", 'error');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error updating product order:", error);
                                alert_toast("An error occurred while updating the order.", 'error');
                            }
                        });
                    }
                });
            } else {
                // If sorting is disabled (x = 0), destroy the sortable functionality
                $(".ordering").sortable("destroy");
            }
        });

        function calc_product_total(row) {
            var qty = parseFloat(row.find('[name="product_qty[]"]').val()) || 0;
            var price = parseFloat(row.find('[name="product_price[]"]').val()) || 0;
            // var dollarRate = parseFloat(<?= json_encode($_settings->info('dollar-rate')); ?>) || 1;
            // var newprice = price *  dollarRate;
            var total = qty * price;
            row.find('.product_total').text(total.toLocaleString('en-US', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }));
        }

        // // Recalculate total amount (sum of all product totals)
        // function calc_total_amount() {
        //     var total = 0;
        //     $('#product-list tbody tr').each(function() {
        //         var qty = parseFloat($(this).find('[name="product_qty[]"]').val()) || 0;
        //         var price = parseFloat($(this).find('[name="product_price[]"]').val()) || 0;
        //         // var delevery = parseFloat($(this).find('#delivery_charge').val()) || 0;
        //         // console.log(delevery);


        //         total += qty * price;

        //     });
           
        //     $('[name="amount"]').val(total.toFixed(2));
        //     $('#amount').text(`$ ${total}`);
            
        // }



        $('#product-list').on('click', '.edit-product', function() {
            var row = $(this).closest('tr');
            var currentPrice = row.find('[name="product_price[]"]').val();
            var currentName = row.find('[name="product_name[]"]').val(); // Get current name
            let currentPriceFormatted = Math.floor(currentPrice);
            // Create the modal HTML structure
            var modalHtml = `
                    <div id="editModal" style="display: block;">
                        <div style="background-color: rgba(0,0,0,0.5); position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999;"></div>
                        <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 8px; z-index: 10000;width: 600px;}">
                            <h3>Edit Product</h3>
                            <label style="font-size:30px; font-weight:bold;" for="newPrice">Price:</label>
                            <input style="font-size:30px; font-weight:bold; width:80%;" type="text" id="newPrice" value="${currentPriceFormatted}" /><br><br>
                            <label class="text-left" style="font-size:30px; font-weight:bold;" for="newName">Name:</label>
                            <input style="font-size:30px; font-weight:bold; width:80%; text-align:right;" type="text" id="newName" value="${currentName}" dir="rtl" /><br><br>
                            <button style="font-size:25px; font-weight:bold;margin-left:25%;" id="saveChanges">Save</button>
                            <button class="text-center" style="font-size:25px; font-weight:bold; margin-left:20px;" id="cancelEdit">Cancel</button>
                        </div>
                    </div>
            `;

            // Append the modal HTML to the body
            $('body').append(modalHtml);
            $('#newName').focus();
            $('#newName')[0].setSelectionRange($('#newName').val().length, $('#newName').val().length);
            $('#cancelEdit').on('click', function() {
                $('#editModal').remove();
            });

            // Save button functionality
            $('#saveChanges').on('click', function() {
                var newPrice = $('#newPrice').val();
                var newName = $('#newName').val();

                // Validate new price and name
                if (!isNaN(newPrice) && parseFloat(newPrice) >= 0 && newName.trim() !== "") {
                    // Update the price
                    row.find('[name="product_price[]"]').val(newPrice);
                    row.find('.product_price').text(`$ ${parseFloat(newPrice).toLocaleString()}`);

                    // Update the name
                    row.find('[name="product_name[]"]').val(newName);
                    row.find('.product_name').text(newName);

                    // Recalculate the produew pricect total and overall total
                    calc_product_total(row);
                    calc_total_amount();

                    // Close the modal
                    $('#editModal').remove();
                } else {
                    alert("Invalid price or name entered.");
                }
            });
        });

        // Handle quantity input changes and recalculate the total
        $('#product-list tbody').on('input change', 'input[name="product_qty[]"]', function() {
            var row = $(this).closest('tr');
            calc_product_total(row); // Update product total for this row
            calc_total_amount(); // Update overall total
        });

        let originalTotal = 0; // Store the original total before discount
        let isDiscountApplied = false; // Track if a discount is currently applied

        // Apply discount when the "Apply" button is clicked
        $('#apply-discount').on('click', function() {
            var discountPercentage = parseFloat($('#discount-input').val());

            // Validate the discount percentage
            if (!isNaN(discountPercentage) && discountPercentage >= 0 && discountPercentage <= 100) {
                if (!isDiscountApplied) {
                    originalTotal = parseFloat($('[name="amount"]').val()); // Save the original total
                    isDiscountApplied = true; // Mark discount as applied
                }

                // Calculate the discounted total
                var discountAmount = (originalTotal * discountPercentage) / 100;
                var discountedTotal = originalTotal - discountAmount;

                // Update the total amount
                $('[name="amount"]').val(discountedTotal.toFixed(2));
                $('#amount').text(`$ ${discountedTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`);

                alert(`Discount of ${discountPercentage}% applied successfully!`);
            } else {
                alert("Please enter a valid discount percentage (0-100).");
            }
        });

        // Remove discount when the "Remove" button is clicked
        $('#remove-discount').on('click', function() {
            if (isDiscountApplied) {
                // Restore the original total
                $('[name="amount"]').val(originalTotal.toFixed(2));
                $('#amount').text(`$ ${originalTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`);
                $('#discount-input').val(""); // Clear the discount input
                isDiscountApplied = false; // Mark discount as removed
                alert("Discount removed successfully!");
            } else {
                alert("No discount is currently applied.");
            }
        });

        // Recalculate total amount (sum of all product totals)
        function calc_total_amount() {
            var total = 0;
            $('#product-list tbody tr').each(function() {
                var qty = parseFloat($(this).find('[name="product_qty[]"]').val()) || 0;
                var price = parseFloat($(this).find('[name="product_price[]"]').val()) || 0;
                total += qty * price;
            });

            // Update the total amount
            $('[name="amount"]').val(total.toFixed(2));
            $('#amount').text(`$ ${total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`);

            // Reset discount tracking if the total changes
            isDiscountApplied = false;
            originalTotal = total; // Update the original total
        }

        // Recalculate total when quantity changes
        $('#product-list tbody').on('input change', 'input[name="product_qty[]"]', function() {
            calc_total_amount();
        });
        
        // Optionally, if the amount changes dynamically, you can call `calculateChange` again
        $('[name="amount"]').on('input change', function() {
            calculateChange(); // Recalculate the change when the amount changes
        });


        $('#client_name1').select2({
            placeholder: "Search for a client",
            allowClear: true,
            width: '100%',
            ajax: {
                url: _base_url_ + "classes/Master.php?f=search_client",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function(data) {
                    var results = data.results.map(function(item) {
                        return {
                            id: item.id,
                            text: item.text,
                            additional: item.phone + ' | ' + item.address,
                            clientName: item.text,
                            address: item.address,
                            phone: item.phone
                        };
                    });

                    return {
                        results: results
                    };
                }
            },
            templateResult: function(data) {
                if (!data.id) {
                    return data.text;
                }

                return $(
                    `<div>
                        <strong style="font-size:20px">${data.clientName}</strong><br>
                        <small style="font-size:20px;font-weight:600;">${data.phone}</small>
                    </div>`
                );
            },
            templateSelection: function(data) {
                return (


                    data.clientName || data.id

                );
            }
        });
        // Set custom height for the dropdown list as well
        $('#client_name1').on('select2:open', function() {
            $('.select2-results').css('max-height', '200px'); // Control the dropdown height if needed
        });
        // Listen for select2:select event
        // Initialize variable to store the selected client ID
        let selectedClientId = null;

        // Handle Select2 selection
        $('#client_name1').on('select2:select', function(e) {
            // Get the selected data object
            const selectedData = e.params.data;




            // Optionally set an input value
            $('input[name="client_id"]').val(selectedData.id);

            // Store the selected client ID in a variable
            selectedClientId = selectedData.id;
        });

        // Handle "Create New" button click
        $('#create_new').click(function() {
            var client_id = <?php echo isset($client_id) ? $client_id : 'null'; ?>; // Pass PHP variable to JavaScript
            var url;

            if (selectedClientId || client_id) {
                // Use selectedClientId if available, otherwise use client_id from PHP
                url = `clients/manage_clients.php?id=${selectedClientId || client_id}`;
            } else {
                url = `clients/manage_clients.php`;
            }

            uni_modal("<i class='fa fa-bars'></i> Clients Details", url);
        });

        // Handle product selection
        let selectedProductRow = null;
        $('.prod-item').click(function() {
            const id = $(this).data('id');
            const existingRow = $(`#product-list tbody input[name="product_id[]"][value="${id}"]`).closest('tr');

            // if (existingRow.length > 0) {
            //     selectedProductRow = existingRow;
            //     alert("Product already in the list. You can update its quantity.");
            // } 

            const name = $(this).text().trim();
            const price = $(this).data('price');
            const newRow = $($('noscript#product-clone').html()).clone();
            newRow.find('input[name="product_id[]"]').val(id);

            newRow.find('input[name="product_price[]"]').val(price);
            newRow.find('input[name="product_name[]"]').val(name);
            newRow.find('.product_name').text(name);
            newRow.find('.product_price').text(`$ ${parseFloat(price).toLocaleString()}`);
            newRow.find('.product_total').text(`$ ${parseFloat(price).toLocaleString()}`);

            $('#product-list tbody').append(newRow);
            selectedProductRow = newRow;


            calc_product_total(selectedProductRow); // Update the new product total
            calc_total_amount(); // Recalculate overall total
        });

        // Delet product
        $('#product-list tbody').on('click', '.rem-product', function() {
            var tr = $(this).closest('tr');
            var productName = tr.find('.product_name').text().trim();

            // Confirm removal

            tr.remove(); // Remove the product row from the table
            calc_total_amount(); // Recalculate the total amount

        });

        // Send Form
        $('#sale-form').submit(function(e) {
            e.preventDefault();
            var _this = $(this);
            $('.err-msg').remove();
            start_loader();

            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_sale",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                dataType: 'json',
                error: function(err) {
                    console.log(err);
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (typeof resp === 'object' && resp.status === 'success') {
                        // Check if the fast-print button was clicked
                        var fast = _this.data('fast-print-fast') === true ? "&fast=1" : "";
                        var printFlag = _this.data('fast-print') === true ? "&print=1" : "";
                        // Redirect to the view_page.php with the sale ID and optional print flag
                        location.href = "./?page=sales/view_details&id=" + resp.sid + printFlag + fast;
                    } else if (resp.status === 'failed' && resp.msg) {
                        var el = $('<div>');
                        el.addClass("alert alert-danger err-msg").text(resp.msg);
                        _this.prepend(el);
                        el.show('slow');
                        $("html, body,.modal").scrollTop(0);
                        end_loader();
                    } else {
                        alert_toast("An error occurred", 'error');
                        end_loader();
                    }
                }
            });
        });


    });
</script>