<?php if ($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
</script>
<?php endif; ?>

<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">List of Clients</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="25%">
					<col width="25%">
					<col width="25%">
					<col width="25%">
				</colgroup>
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		// Initialize DataTable with server-side processing
		$('#list').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: _base_url_ + "classes/Master.php?f=limit",
				type: 'POST'
			},
			columns: [
				{ 
					data: 'clientName',
					title: 'Name',
					render: function(data, type, row) {
						return `<input style="width:100%;" type="text" id="clientName_${row.id}" value="${data}" />`;
					}
				},
				{ 
					data: 'phone', 
					title: 'Phone',
					render: function(data, type, row) {
						return `<input style="width:100%;" type="text" id="phone_${row.id}" value="${data}" />`;
					}
				},
				{ 
					data: 'address',
					title: 'Address',
					render: function(data, type, row) {
						return `<input style="width:100%;" type="text" id="address_${row.id}" value="${data}" />`;
					}
				},
				{ 
					data: 'id', 
					title: 'Action', 
					orderable: false, 
					render: function(data, type, row) {
						return `
							<div class="text-center">
								<button type="button" class="btn btn-flat btn-primary btn-sm update_client" data-id="${data}">Update</button>
								<button type="button" class="btn btn-flat btn-warning btn-sm edit_data" data-id="${data}">Edit</button>
								<button type="button" class="btn btn-flat btn-danger btn-sm delete_data" data-id="${data}">Delete</button>
							</div>
						`;
					}
				}
			],
			order: [[1, 'asc']], // Default sort by Name
			pageLength: 50 // Display 5 rows per page
		});

		// Update client details
		$(document).on('click', '.update_client', function () {
			var id = $(this).data('id');
			var clientName = $('#clientName_' + id).val().trim();
			var phone = $('#phone_' + id).val().trim();
			var address = $('#address_' + id).val().trim();

			// Validation
			if (clientName === '') {
				alert_toast('Please enter the client name.', 'error');
				return;
			}
			if (phone === '') {
				alert_toast('Please enter a valid phone number.', 'error');
				return;
			}

			// AJAX request to update the client
			$.ajax({
				url: _base_url_ + "classes/Master.php?f=save_clients",
				method: "POST",
				data: { id: id, clientName: clientName, phone: phone, address: address },
				dataType: "json",
				error: function (err) {
					console.error(err);
					alert_toast("An error occurred.", 'error');
				},
				success: function (response) {
					if (response.status === 'success') {
						alert_toast("Client updated successfully.", 'success');
						$('#list').DataTable().ajax.reload(); // Refresh the DataTable
					} else {
						alert_toast("An error occurred.", 'error');
					}
				}
			});
		});

		// Event handlers for other action buttons (view, edit, delete)
		$('#list').on('click', '.view_data', function() {
			let id = $(this).data('id');
			uni_modal("<i class='fa fa-bars'></i> Clients Details", "clients/view_clients.php?id=" + id);
		});

		$('#list').on('click', '.edit_data', function() {
			let id = $(this).data('id');
			uni_modal("<i class='fa fa-edit'></i> Update Clients Details", "clients/manage_clients.php?id=" + id);
		});

		$('#list').on('click', '.delete_data', function() {
			let id = $(this).data('id');
			_conf("Are you sure to delete this client permanently?", "delete_category", [id]);
		});
	});

	// Delete client functionality
	function delete_category(id) {
		start_loader();
		$.ajax({
			url: _base_url_ + "classes/Master.php?f=delete_clients",
			method: "POST",
			data: { id: id },
			dataType: "json",
			error: function(err) {
				console.log(err);
				alert_toast("An error occurred.", 'error');
				end_loader();
			},
			success: function(resp) {
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("An error occurred.", 'error');
					end_loader();
				}
			}
		});
	}
</script>
