<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `product_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
	 .select2-selection.select2-selection--single {
       padding-bottom:30px;
	   padding-top:20px;
    }

	.custom-select {
    	padding: 10px;  /* Adjust this value as needed */
	}

	/* Add padding to the dropdown */
	.custom-dropdown .select2-results__option {
		padding: 10px;  /* Adjust this value as needed */
	}
	.fc,.select2-results__option{
		font-size:20px !important;
	}
	.ft{
		font-size:25px !important;
	}
	.select2-selection__rendered{
		font-size:25px !important;
		font-weight:bold !important; 
	}
	.select2-selection .select2-selection--single{
		padding-bottom:30px !important;
	}
</style>
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
	$(document).ready(function(){
		$('#uni_modal').on('shown.bs.modal', function() {
			$('#category_id').select2({
				placeholder: "Please select here",
				width: '100%',
				dropdownParent: $('#uni_modal'),
				containerCssClass: 'form-control form-control-lg rounded-0 custom-select',  // Add custom class for padding
				dropdownCssClass: 'custom-dropdown' // Add custom class for dropdown padding
			});
		});

		$('#product-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_product",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occurred",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body,.modal").scrollTop(0);
                            end_loader()
                    }else{
						alert_toast("An error occurred",'error');
						end_loader();
					}
				}
			})
		})

	})
</script>
