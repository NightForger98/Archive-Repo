<?php if ($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
    </script>
<?php endif; ?>

<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">List of Attendance</h3>
        <div class="card-tools">
            <a href="./?page=expenses/add-expenses" id="create_new" class="btn btn-flat btn-primary">
                <span class="fas fa-plus"></span> Create New
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table style="font-size: 35px; font-weight: bold;" class="table table-hover table-striped table-bordered" id="report-list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Supplier</th>
                        <th>Amount</th>
                        <th>Sale Number</th>
                        <th>Date</th>
                        <th>Payment Method</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody style="font-size: 35px; font-weight: bold;">
                    <?php
                    $total = 0;
                    $stmt = $conn->query("SELECT * from expenses");

                    while ($row = $stmt->fetch_assoc()):
                        $total += $row['amount'];
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['supplier_name'] ?></td>
                            <td><?= $row['amount'] ?></td>
                            <td><?= $row['sale_number'] ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['payment_method'] ?></td>
                            <td>
                                <a class="btn btn-default bg-gradient-light btn-flat btn-sm" href="?page=expenses/view_details&id=<?= $row['id']; ?>">
                                    <span class="fa fa-eye text-dark"></span> View
                                </a>
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
        $('.table').dataTable({
            columnDefs: [{ orderable: false, targets: [6] }],
            order: [0, 'asc']
        });
        $('.dataTable td, .dataTable th').addClass('py-1 px-2 align-middle');
    });
</script>