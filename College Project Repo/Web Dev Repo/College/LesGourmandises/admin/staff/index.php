
	
		<?php if ($_settings->chk_flashdata('success')): ?>
			<script>
				alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
			</script>
		<?php endif; ?>
		<style>
			.fbx {
				font-size: 20px;
			}
		</style>
		
		<div class="card card-outline rounded-0 card-navy">
			<div class="card-header">
				<h3 class="card-title">قائمة الموظفين</h3>
				<div class="card-tools">
					<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> إضافة موظف جديد</a>
					<a href="http://localhost/cscs/admin/?page=reports_staff" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> تقرير الموظفين</a>
				</div>
			</div>
			<div class="card-body">
				<div class="container-fluid">
					<table class="table table-hover table-striped table-bordered" id="list">
						<colgroup>
							<col width="10%">
							<col width="35%">
							<col width="35%">
							<col width="20%">
						</colgroup>
						<thead>
							<tr>
								<th>#</th>
								<th>الاسم</th>
								<th>الراتب</th>
								<th>الإجراء</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							$qry = $conn->query("SELECT * from `staff` order by `name` asc ");
							while ($row = $qry->fetch_assoc()):
							?>
								<tr>
									<td class="text-center"><?php echo $i++; ?></td>
									<td class="fbx"><?php echo $row['name'] ?></td>
									<td>
										<p class="m-0 truncate-1 fbx"><?= $row['salary'] ?></p>
									</td>
									<td align="center">
										<button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
											الإجراء
											<span class="sr-only">تبديل القائمة</span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> عرض</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> تعديل</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> حذف</a>
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
			$(document).ready(function() {
				$('.delete_data').click(function() {
					_conf("هل أنت متأكد من حذف هذا الموظف نهائيًا؟", "delete_category", [$(this).attr('data-id')])
				})
				$('#create_new').click(function() {
					uni_modal("<i class='fa fa-plus'></i> إضافة موظف جديد", "staff/manage_staff.php")
				})
				$('.view_data').click(function() {
					uni_modal("<i class='fa fa-bars'></i> تفاصيل الموظف", "categories/view_category.php?id=" + $(this).attr('data-id'))
				})
				$('.edit_data').click(function() {
					uni_modal("<i class='fa fa-edit'></i> تحديث تفاصيل الموظف", "staff/manage_staff.php?id=" + $(this).attr('data-id'))
				})
				$('.table').dataTable({
					columnDefs: [{
						orderable: false,
						targets: [1, 2]
					}],
					order: [0, 'asc']
				});
				$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
			})

			function delete_category($id) {
				start_loader();
				$.ajax({
					url: _base_url_ + "classes/Master.php?f=delete_staff",
					method: "POST",
					data: {
						id: $id
					},
					dataType: "json",
					error: err => {
						console.log(err)
						alert_toast("حدث خطأ.", 'error');
						end_loader();
					},
					success: function(resp) {
						if (typeof resp == 'object' && resp.status == 'success') {
							location.reload();
						} else {
							alert_toast("حدث خطأ.", 'error');
							end_loader();
						}
					}
				})
			}
			
		</script>
