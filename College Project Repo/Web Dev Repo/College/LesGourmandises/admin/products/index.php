<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	
</style>
<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">Product List</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Add New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table style="font-size: 35px; font-weight: bold;" class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="60%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Category</th>
						<th>Name/Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT p.*, c.name as `category` from `product_list` p inner join category_list c on p.category_id = c.id where p.delete_flag = 0 order by p.`name` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center fss"><?php echo $i++; ?></td>
							
							<td class="fsss"><?php echo $row['category'] ?></td>

							<td class="text-right fss">
								<!-- Input field for the product name -->
								<input style="width:40%;" id="name_<?php echo $row['id']; ?>" name="up_name" type="text" value="<?php echo $row['name']; ?>">

								<!-- Input field for the product price -->
								<input style="width:40%;" id="price_<?php echo $row['id']; ?>" name="up_price" type="number" value="<?php echo intval($row['price']); ?>">
									<!-- Hidden fields to store actual searchable data for name and price -->
									<span class="hidden-name" style="display:none;"><?php echo $row['name']; ?></span>
                    				<span class="hidden-price" style="display:none;"><?php echo $row['price']; ?></span>
								<!-- Button to update the product -->
								<button type="button" class="btn btn-sm btn-primary update_product" data-id="<?php echo $row['id']; ?>">Update Product</button>
							</td>
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure you want to permanently delete this product?", "delete_product", [$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='fa fa-plus'></i> Add New Product","products/manage_product.php")
		})
		$('.view_data').click(function(){
			uni_modal("<i class='fa fa-bars'></i> Product Details","products/view_product.php?id="+$(this).attr('data-id'))
		})
		$('.edit_data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Update Product Details","products/manage_product.php?id="+$(this).attr('data-id'))
		})
		var table = $('.table').DataTable({
        columnDefs: [
            { orderable: false, targets: [0, 3] },  // Disable sorting for columns #, and Action
            { orderable: true, targets: [2] }    // Enable sorting for Category and Name/Price columns
        ],
        order: [0, 'asc'],  // Default sorting by the first column
        searchCols: [
            null,  // No specific search for column 1 (index 0)
            null,  // No specific search for column 2 (Category)
            { search: '' },  // Apply search specifically on column 2 (Name/Price)
            null   // No search on column 3 (Actions)
        ]
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
		
		$(document).ready(function(){
    		// When the 'update_price' button is clicked
			$(document).on('click', '.update_product', function() {
				var id = $(this).data('id'); // Get the product ID
				var name = $('#name_' + id).val(); // Get the updated name from the input field
				var price = $('#price_' + id).val(); // Get the updated price from the input field
				// console.log(id);
				// Validate inputs
				if (name === '') {
					alert_toast('Please enter the product name', 'error');
					return;
				}
				if (price === '' || isNaN(price) || parseFloat(price) <= 0) {
					alert_toast('Please enter a valid price', 'error');
					return;
				}

				// Send AJAX request to update the product
				$.ajax({
					url:_base_url_+"classes/Master.php?f=save_product",
					method: 'POST',
					data: {
						id: id,
						name: name,
						price: price
					},
					dataType: 'json',
					error: function(err) {
						console.log(err);
						alert_toast("An error occurred.", 'error');
					},
					success: function(response) {
						if (response.status === 'success') {
							alert_toast("Product updated successfully", 'success');
							// Optionally, update the values dynamically in the table
							$('#name_' + id).val(name); // Update the name in the input field
							$('#price_' + id).val(price); // Update the price in the input field
						} else {
							alert_toast("An error occurred.", 'error');
						}
					}
				});
			});
		});

	})
	function delete_product($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_product",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occurred.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occurred.",'error');
					end_loader();
				}
			}
		})
	}
</script>
