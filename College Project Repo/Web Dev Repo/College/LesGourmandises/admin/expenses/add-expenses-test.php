<?php if ($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
    </script>
<?php endif; ?>

<style>
    .fbx {
        font-size: 20px;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-3">Expense Entry</h2>
    <form id="expenseForm">
        <div class="mb-2">
            <label class="form-label">Supplier Name</label>
            <input type="text" class="form-control" id="supplierName" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Sale Number</label>
            <input type="text" class="form-control" id="saleNumber" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Date</label>
            <input type="date" class="form-control" id="date" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Payment Method</label>
            <select class="form-control" id="paymentMethod">
                <option>Cash</option>
                <option>Credit</option>
                <option>Bank Transfer</option>
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
                <tbody></tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="addItemRow()">+ Add Item</button>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
<div class="container-fluid">
	<form action="" id="product-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="category_id" class="control-label ft">Category</label>
			<select name="category_id" id="category_id" class="ft form-control form-control-lg rounded-0 fc" required>
				<option class="ft" value="" disabled <?= !isset($category_id) ? "selected" : "" ?>></option>
				<?php 
				$qry = $conn->query("SELECT * FROM `category_list` where delete_flag = 0 and `status` = 1 ".(isset($id)? " or id = '{$category_id}' ": "")." order by `name` asc");
				while($row=$qry->fetch_array()):
				?>
				<option class="ft" value="<?= $row['id'] ?>" <?php echo isset($category_id) && $category_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="name" class="ft control-label fc">Name</label>
			<input type="text" name="name" id="name" class="ft form-control form-control-lg rounded-0 fc" value="<?php echo isset($name) ? $name : ''; ?>" required/>
		</div>
		<div class="form-group">
			<label for="description" class="ft control-label">Description</label>
			<textarea type="text" name="description" id="description" class="ft form-control form-control-lg fc rounded-0" required><?php echo isset($description) ? $description : ''; ?></textarea>
		</div>
		<div class="form-group">
			<label for="price" class="ft control-label">Price</label>
			<input type="number" name="price" id="price" class="ft form-control form-control-lg rounded-0 text-right" value="<?php echo isset($price) ? $price : ''; ?>" required/>
		</div>
		<div class="form-group">
			<label for="status" class="ft control-label">Status</label>
			<select name="status" id="status" class="ft form-control form-control-lg rounded-0" required>
				<option class="ft" value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
				<option class="ft" value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
			</select>
		</div>
	</form>
</div>
<script>
   function addItemRow() {
            let table = document.querySelector("#saleItemsTable tbody");
            let row = document.createElement("tr");
            row.innerHTML = `
                <td><input type="text" class="form-control item-name"></td>
                <td><input type="number" class="form-control item-qty" oninput="calculateTotal()"></td>
                <td><input type="number" class="form-control item-price" oninput="calculateTotal()"></td>
                <td class="item-total">0</td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">X</button></td>
            `;
            table.appendChild(row);
        }
        function removeRow(button) {
            button.parentElement.parentElement.remove();
            calculateTotal();
        }
        function calculateTotal() {
            let total = 0;
            document.querySelectorAll("#saleItemsTable tbody tr").forEach(row => {
                let qty = row.querySelector(".item-qty").value || 0;
                let price = row.querySelector(".item-price").value || 0;
                let subtotal = qty * price;
                row.querySelector(".item-total").textContent = subtotal;
                total += subtotal;
            });
            document.getElementById("totalAmount").value = total;
        }
    $('#expenseForm').submit(function(e) {
            e.preventDefault();
            var _this = $(this);
            $('.err-msg').remove();
            start_loader();

            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_expensens",
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
   
</script>

