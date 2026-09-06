<?php
echo $_settings->info('dollar-rate');
if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM `sale_list` where id = '{$_GET['id']}' ");
    if ($qry->num_rows > 0) {
        $res = $qry->fetch_array();
        foreach ($res as $k => $v) {
            if (!is_numeric($k)) {
                $$k = $v;
            }
        }
        if (isset($user_id) && is_numeric($user_id)) {
            $user = $conn->query("SELECT concat(firstname,' ', lastname) as `name` FROM `users` where id = '{$user_id}' ");
            if ($user->num_rows > 0) {
                $user_name = $user->fetch_array()['name'];
            }
        }
        if (isset($client_id) && is_numeric($client_id)) {
            $client = $conn->query("SELECT * FROM `clients` WHERE id = '{$client_id}'");
            if ($client->num_rows > 0) {
                $client_data = $client->fetch_assoc(); // Fetch the row as an associative array
                $client_namen = $client_data['clientName']; // Extract 'clientName'
                $client_phone = $client_data['phone'];     // Extract 'phone'
                $client_address = $client_data['address']; // Extract 'address'
            }
        }
    } else {
        echo '<script> alert("Unknown sale\'s ID."); location.replace("./?page=sales"); </script>';
    }
} else {
    echo '<script> alert("sale\'s ID is required to access the page."); location.replace("./?page=sales"); </script>';
}

?>
<?php


?>


<div class="content p-0 m-0">
    <div class="card card-outline card-navy rounded-0 shadow p-0 m-0">
        <div class="card-header p-0 m-0">
            <h4 class="card-title p-0 m-0">Sale Details: <b><?= isset($code) ? $code : "" ?></b></h4>
            <div class="card-tools">
                <a href="./?page=sales/manage_sale" class="btn btn-default border btn-sm"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
        <div class="card-body p-0 m-0">
            <div class="container-fluid row justify-content-center p-0 m-0">
                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 p-0 m-0" id="printout">
                    <!-- Sale Code-->
                    <div class="d-flex">
                        <div style="font-size: 20px; font-weight:bold;" class="col-auto p-0 m-0">Sale Code:</div>
                        <div style="font-size: 20px; font-weight:bold;position: relative;left: 10px;" class="col-auto ps-1 flex-shrink-1 flex-grow-1 border-bottom border-dark p-0 m-0"><?= isset($code) ? $code : "" ?></div>
                    </div>
                    <!--Date-->
                    <div class="d-flex">
                        <div style="font-size: 20px; font-weight:bold;" class="col-auto p-0 m-0">Date:</div>
                        <div style="font-size: 20px; font-weight:bold;" class="col-auto ps-1 flex-shrink-1 flex-grow-1 border-bottom border-dark p-0 m-0">
                            <?php if (isset($date_created)): ?>
                                <span style="position: relative;left: 10px;" class="date p-0 m-0"><?= date("d-m-Y", strtotime($date_created)); ?></span>
                                <span style="position: relative;left: 130px;" class="time"><?= date("h:i A", strtotime($date_created)); ?></span>
                            <?php else: ?>
                                <?= ""; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                    <!--Client Name-->

                    <div class="d-flex">
                        <div style="font-size: 20px; font-weight:750;" class="col-auto p-0 p-0">
                            Name:
                        </div>
                        <div style="font-size: 25px; font-weight:750;font-family: 'MarkaziText', serif;left:-8px;" class="col-auto ps-1 flex-shrink-1 flex-grow-1  border-bottom border-dark text-right p-0 m-0">
                            <?php

                            if (isset($client_namen) && !empty($client_namen)) {
                                echo $client_namen;
                            } elseif (isset($guest_user) && !empty($guest_user)) {
                                echo $guest_user;
                            } else {
                                echo "";
                            }
                            ?>
                        </div>
                    </div>
                    <!--Phone-->

                    <?php
                    if (!empty($client_phone) && $payment_type == 2) {
                    ?>
                        <h5 class="d-flex">
                            <div style="font-size: 20px; font-weight:750;" class="col-auto mt-2 p-0 m-0">Phone:</div>
                            <div style="font-size: 20px; font-weight:750;" class="col-auto ps-1 flex-shrink-1 flex-grow-1 mt-2 border-bottom border-dark text-right p-0 m-0"><?= isset($client_phone) ? (substr($client_phone, 0, 4) === '+961' ? substr($client_phone, 4) : $client_phone) : "" ?>
                            </div>
                        </h5>
                    <?php }; ?>
                    <div style="margin:30px;"></div>
                    <!--Table-->
                    <h4 class="d-flex border-bottom border-dark p-0 m-0">
                        <div class="col-3 text-left p-0 m-0">Total</div>
                        <div class="col-7 text-center">Item</div>
                        <div class="col-2 text-right p-0 m-0">QTY</div>
                    </h4>
                    <?php if (isset($id)): ?>
                        <?php
                        $sp_query = $conn->query("SELECT * FROM `sale_products` where sale_id = '{$id}'");
                        while ($row = $sp_query->fetch_assoc()):
                        ?>
                            <div class="d-flex border-bottom border-dark">
                                <!-- Total Price Column -->
                                <div class="col-2  m-0 p-0" style="font-weight: bold; font-size: 20px;">
                                    <?= format_num($row['price'] * $row['qty']) ?>
                                </div>

                                <!-- Product Name and Price Column -->
                                <div class="col-9 text-right p-0 m-0" style="line-height: 0.8em;" dir="rtl">
                                    <p class="p-0 m-0 w-100"
                                        style="font-size: 25px; font-weight: 750; font-family: 'MarkaziText', serif; line-height: 1em;">
                                        <?= $row['prod_name'] ?>
                                        <span class="p-0 m-0"
                                            style="font-weight: bold; font-size: 17px;">
                                            $<?= $row['price'] = intval($row['price']); ?>
                                        </span>
                                    </p>
                                </div>

                                <!-- Quantity Column -->
                                <div class="col-1 text-right m-0 p-0" style="font-weight: bold; font-size: 20px;">
                                    <?= $row['qty'] ?>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="d-flex" style="border-top: 2px solid #000;"></div>

                    <h5 class="d-flex">


                        <div style="font-size: 20px; font-weight: 750;" class="col-6 text-left p-0 m-0">QTY</div>
                        <div style="font-size: 20px; font-weight: 750;" class="col-6 text-right p-0 m-0">
                            <?php
                            $total_query = $conn->query("SELECT sum(qty) as total FROM sale_products WHERE sale_id = '{$id}'");
                            $total = $total_query->num_rows > 0 ? $total_query->fetch_array()['total'] : 0;
                            $total = $total > 0 ? $total : 0;
                            echo format_num($total); ?>
                        </div>
                    </h5>
                    <?php if(isset($disc) && !empty($disc)) {?>
                        <h5 class="d-flex">
                            <div style="font-size: 20px; font-weight: 750;" class="col-6 text-left p-0 m-0">Discount</div>
                            <div style="font-size: 20px; font-weight: 750;" class="col-6 text-right p-0 m-0">
                                <?php
                                echo $disc;
                                 ?>
                                 %
                            </div>
                        </h5>
                     <?php }?>   
                    <?php

                    if (!empty($dev_charg) && $payment_type == 2) { ?>
                        <h5 class="d-flex">

                            <div style="font-size: 20px; font-weight: 750;" class="col-3 text-left p-0 m-0">
                                <?php
                                if (isset($dev_charg) && $dev_charg != 0) {
                                    echo ucwords($dev_charg . ' LL'); // If delivery charge is set and not 0
                                } else {
                                    echo "Free"; // If delivery charge is 0 or not set
                                }
                                ?>
                            </div>
                            <div style="font-size: 20px; font-weight: 750;" class="col-9 text-right p-0 m-0">Charge Delivery</div>
                        </h5>

                    <?php  }; ?>


                    <!--TOTAL-->
                    <h3 class="d-flex border-top border-dark">

                        <div class="col-6 text-left p-0"><?= isset($amount) ? $amount : 0 ?>.$</div>
                        


                    </h3>




                    <!--Address-->
                    <?php

                    if (!empty($client_address) && $payment_type == 2) { ?>
                        <h5 class="d-flex">
                            <div style="font-size: 20px; font-weight:750;" class="col-2 p-0 m-0">Address:</div>
                            <div style="font-size: 20px; font-weight:750;" class="col-10 m-0 p-0 text-right"><?= isset($client_address) ? ucwords($client_address) : "" ?></div>
                        </h5>
                    <?php  }; ?>
                    <!--Status-->
                    <h5 class="d-flex">

                        <div style="font-size: 25px; font-weight:700;" class="col-5 text-left p-0 m-0">
                            <?php
                            // Fixing the condition to use equality operator and elseif for multiple conditions
                            if (isset($payment_type) && $payment_type == 1) {
                                echo "Takaway";
                            } else {
                                echo "Delivery";
                            }
                            ?>
                        </div>
                        
                    </h5>

                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <a class="btn btn-primary bg-gradient-primary border col-lg-3 col-md-4 col-sm-12 col-xs-12 rounded-pill" href="./?page=sales/manage_sale&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Edit</a>
                <button class="btn btn-light bg-gradient-light border col-lg-3 col-md-4 col-sm-12 col-xs-12 rounded-pill" id="print"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-light bg-gradient-light border col-lg-3 col-md-4 col-sm-12 col-xs-12 rounded-pill" id="print2"><i class="fa fa-print"></i> Print 2</button>
                <button class="btn btn-danger bg-gradient-danger border col-lg-3 col-md-4 col-sm-12 col-xs-12 rounded-pill" id="delete_sale" type="button"><i class="fa fa-trash"></i> Delete sale</button>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
    <style>
        html,
        body {
            padding: 0 !important;
            margin: 0 !important;
            background: unset !important;
            min-height: unset !important
        }
    </style>
    <div class="d-flex w-100 p-0 m-0">
        <div class="col-2 text-center p-0 m-0">
        </div>
        <div class="col-8 text-center p-0 m-0">





            <h4 style="font-weight:900;font-size:50px;font-family: 'MarkaziText', serif;" class="tex-center m-0 p-0">Les Gourmandies
                
            </h4>
            <h4 style="letter-spacing:5px; font-weight:700;" class="text-center p-0 m-0">71052045</h4>

        </div>
    </div>
    <!-- <hr> -->
</noscript>


<script>
    $(function() {
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('print') === '1') {
                $('#print').trigger('click');
            }
            
             if (urlParams.get('fast') === '1') {
                 $('#print2').trigger('click');
             }
        });

        
        $('#print').click(function() {
            var head = $('head').clone();
            var p = $($('#printout').html()).clone();
            var phead = $($('noscript#print-header').html()).clone();
            var el = $('<div style="width:100mm; margin:0; padding:0;">');
            head.find('title').text("Sale Details-Print View");
            el.append(phead);
            el.append(p);
            el.find('.bg-gradient-navy').css({
                'background': '#001f3f linear-gradient(180deg, #26415c, #001f3f) repeat-x !important',
                'color': '#fff'
            });
            el.find('.bg-gradient-secondary').css({
                'background': '#6c757d linear-gradient(180deg, #828a91, #6c757d) repeat-x !important',
                'color': '#fff'
            });
            el.find('tr.bg-gradient-navy').attr('style', "color:#000");
            el.find('tr.bg-gradient-secondary').attr('style', "color:#000");

            
            var nw = window.open(
            "about:blank", // URL or "about:blank" for an empty page
            "_blank", // Open in a new window
            "width=1px,height=1px,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no"
            );;
            nw.document.querySelector('head').innerHTML = head.prop('outerHTML');
            nw.document.querySelector('body').innerHTML = el.prop('outerHTML');
            nw.document.close();
            setTimeout(() => {
                nw.print();
                // nw.print();
                setTimeout(() => {
                    nw.close();
                    
                    $(document).ready(function() {
                        const urlParams = new URLSearchParams(window.location.search);
                        if (urlParams.get('print') === '1') {
                            location.href = "./?page=sales/manage_sale";;
                        }
                    });

                }, 0);
            }, 0);
        });
        $('#print2').click(function() {
            var head = $('head').clone();
            var p = $($('#printout').html()).clone();
            var phead = $($('noscript#print-header').html()).clone();
            var el = $('<div style="width:100mm; margin:0; padding:0;">');
            head.find('title').text("Sale Details-Print View");
            el.append(phead);
            el.append(p);
            // el.find('.bg-gradient-navy').css({
            //     'background': '#001f3f linear-gradient(180deg, #26415c, #001f3f) repeat-x !important',
            //     'color': '#fff'
            // });
            // el.find('.bg-gradient-secondary').css({
            //     'background': '#6c757d linear-gradient(180deg, #828a91, #6c757d) repeat-x !important',
            //     'color': '#fff'
            // });
            // el.find('tr.bg-gradient-navy').attr('style', "color:#000");
            // el.find('tr.bg-gradient-secondary').attr('style', "color:#000");

            
            var nw = window.open(
            "about:blank", // URL or "about:blank" for an empty page
            "_blank", // Open in a new window
            "width=1px,height=1px,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no"
            );;
            nw.document.querySelector('head').innerHTML = head.prop('outerHTML');
            nw.document.querySelector('body').innerHTML = el.prop('outerHTML');
            nw.document.close();
            setTimeout(() => {
                nw.print();
                nw.print();
                setTimeout(() => {
                    nw.close();
                    
                    $(document).ready(function() {
                        const urlParams = new URLSearchParams(window.location.search);
                        if (urlParams.get('fast') === '1') {
                            location.href = "./?page=sales/manage_sale";;
                        }
                    });

                }, 0);
            }, 0);
        });

        $('#delete_sale').click(function() {
            _conf("Are you sure to delete this sale permanently?", "delete_sale", [])
        })
    })

    function delete_sale($id) {
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_sale",
            method: "POST",
            data: {
                id: '<?= isset($id) ? $id : "" ?>'
            },
            dataType: "json",
            error: err => {
                console.log(err)
                alert_toast("An error occured.", 'error');
                end_loader();
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.replace('./?page=sales');
                } else {
                    alert_toast("An error occured.", 'error');
                    end_loader();
                }
            }
        })
    }
</script>