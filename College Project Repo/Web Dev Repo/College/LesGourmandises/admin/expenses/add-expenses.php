<?php
$id = $supplier_id = $supplier_name = $amount = $sale_number = $payment_method = $date = '';
$sale_items = [];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $qry = $conn->prepare("SELECT * FROM `expenses` WHERE id = ?");
    $qry->bind_param("i", $id);
    $qry->execute();
    $result = $qry->get_result();

    if ($result->num_rows > 0) {
        $res = $result->fetch_assoc();
        foreach ($res as $k => $v) {
            if (!is_numeric($k)) $$k = $v;
        }

        if (isset($supplier_id) && is_numeric($supplier_id)) {
            $supplier_qry = $conn->prepare("SELECT `name` FROM `suppliers` WHERE id = ?");
            $supplier_qry->bind_param("i", $supplier_id);
            $supplier_qry->execute();
            $supplier_result = $supplier_qry->get_result();

            if ($supplier_result->num_rows > 0) {
                $supplier_name = $supplier_result->fetch_assoc()['name'];
            }
        }

        $items_qry = $conn->prepare("SELECT * FROM `sale_items` WHERE expense_id = ?");
        $items_qry->bind_param("i", $id);
        $items_qry->execute();
        $items_result = $items_qry->get_result();
        while ($row = $items_result->fetch_assoc()) {
            $sale_items[] = $row;
        }
    } else {
        echo '<script>alert("Unknown Expense ID."); location.replace("./?page=expenses");</script>';
    }
}
?>

<div class="container-fluid">
    <form action="" id="expense-form">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <div class="form-group">
            <label for="supplier_name" class="control-label">Supplier Name</label>
            <input type="text" name="supplier_name" id="supplier_name" class="form-control" value="<?php echo htmlspecialchars($supplier_name); ?>" required />
        </div>
        <div class="form-group">
            <label for="amount" class="control-label">Amount</label>
            <input type="hidden" id="initial_amount" value="<?php echo htmlspecialchars($amount); ?>">
            <input type="text" name="amount" id="amount" class="form-control" value="<?php echo htmlspecialchars($amount); ?>" required readonly />
        </div>
        <div class="form-group">
            <label for="sale_number" class="control-label">Sale Number</label>
            <input type="text" name="sale_number" id="sale_number" class="form-control" value="<?php echo htmlspecialchars($sale_number); ?>" required />
        </div>
        <div class="form-group">
            <label for="date" class="control-label">Date</label>
            <input type="datetime-local" name="date" id="date" class="form-control" value="<?php echo htmlspecialchars($date); ?>" required />
        </div>
        <div class="form-group">
            <label for="payment_method" class="control-label">Payment Method</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="Cash" <?php echo $payment_method == "Cash" ? 'selected' : ''; ?>>Cash</option>
                <option value="Credit" <?php echo $payment_method == "Credit" ? 'selected' : ''; ?>>Credit</option>
                <option value="Bank Transfer" <?php echo $payment_method == "Bank Transfer" ? 'selected' : ''; ?>>Bank Transfer</option>
            </select>
        </div>
        <div class="mb-2">
            <label class="form-label">Sale Items</label>
            <table class="table" id="saleItemsTable">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sale_items as $item): ?>
                        <tr>
                            <td><input type="text" name="item_name[]" class="form-control" value="<?php echo htmlspecialchars($item['item_name']); ?>" required></td>
                            <td><input type="number" name="item_qty[]" class="form-control item-qty" value="<?php echo htmlspecialchars($item['quantity']); ?>" oninput="calculateTotal()" required></td>
                            <td><input type="text" name="item_price[]" class="form-control item-price" value="<?php echo htmlspecialchars($item['price']); ?>" oninput="calculateTotal()" required></td>
                            <td class="item-total"><?php echo number_format($item['quantity'] * $item['price'], 2); ?></td>
                            <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">X</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="addItemRow()">+ Add Item</button>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
                        
<script>
   // Add this script to call calculateTotal() on page load
  // Add this script to call calculateTotal() on page load
  document.addEventListener("DOMContentLoaded", function() {
        calculateTotal();
    });

    function addItemRow() {
        let table = document.querySelector("#saleItemsTable tbody");
        let row = document.createElement("tr");
        row.innerHTML = `
            <td><input type="text" name="item_name[]" class="form-control" required></td>
            <td><input type="number" name="item_qty[]" class="form-control item-qty" oninput="calculateTotal()" required></td>
            <td><input type="text" name="item_price[]" class="form-control item-price" oninput="calculateTotal()" required></td>
            <td class="item-total">0</td>
            <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">X</button></td>
        `;
        table.appendChild(row);
    }

    function removeRow(button) {
        button.closest('tr').remove();
        calculateTotal();
    }

    function calculateTotal() {
        // Get the initial amount value
        let initialAmount = parseFloat(document.getElementById("initial_amount").value) || 0;

        // Calculate the total of sale items
        let itemsTotal = 0;
        document.querySelectorAll("#saleItemsTable tbody tr").forEach(row => {
            let qtyInput = row.querySelector(".item-qty");
            let priceInput = row.querySelector(".item-price");
            let qty = parseFloat(qtyInput ? qtyInput.value : 0) || 0;
            let price = parseFloat(priceInput ? priceInput.value : 0) || 0;
            let subtotal = qty * price;
            let totalCell = row.querySelector(".item-total");
            if (totalCell) {
                totalCell.textContent = subtotal.toFixed(2);
            }
            itemsTotal += subtotal;
        });

        // Update the amount field with the total (initial amount + items total)
        let total = itemsTotal;
        document.getElementById("amount").value = total.toFixed(2);
    }

    $('#expense-form').submit(function(e) {
        e.preventDefault();
        var _this = $(this);
        $('.err-msg').remove();
        start_loader();

        $.ajax({
            url: _base_url_ + "classes/Master.php?f=save_expenses",
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error: function(err) {
                console.log(err);
                alert_toast("An error occurred", 'error');
                end_loader();
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    alert_toast(resp.msg, 'success');
                    setTimeout(function() {
                        <?php if(isset($id)){?>
                            location.href="?page=expenses"
                      <?php  }else{?>
                            location.reload()
                     <?php   } ?>
                    }, 50);
                } else if (resp.status == 'failed' && !!resp.msg) {
                    
                    var el = $('<div>');
                    el.addClass("alert alert-danger err-msg").text(resp.msg);
                    _this.prepend(el);
                    el.show('slow');
                    $("html, body, .modal").scrollTop(0);
                    end_loader();
                } else {
                    alert_toast("An error occurred", 'error');
                    end_loader();
                }
            }
        });
    });
</script>