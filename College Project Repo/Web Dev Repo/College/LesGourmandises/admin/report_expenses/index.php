<?php
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date("Y-m-d");
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date("Y-m-d");

// Append '23:59:59' to the end_date
$end_date_with_time = $end_date . ' 23:59:59';
?>
<?php if ($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>
<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">Daily & Monthly Expenses Report</h3>
    </div>
    <div style="font-size:35px; font-weight:bold;" class="card-body">
        <div class="container-fluid">
            <fieldset class="border px-2 mb-2">
                <legend class="w-auto px-2">Filter</legend>
                <form id="filter-form" action="">
                    <div class="row align-items-end">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" value="<?= $start_date ?>" class="form-control form-control-sm rounded-0" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" value="<?= $end_date ?>" class="form-control form-control-sm rounded-0" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary rounded-0 btn-sm"><i class="fa fa-filter"></i> Filter</button>
                                <button class="btn btn-light border rounded-0 btn-sm" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
            <div class="container-fluid" id="printout">
                <table style="font-size:35px; font-weight:bold;" class="table table-hover table-striped table-bordered" id="report-list">
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
                    <tbody style="font-size:35px; font-weight:bold;">
                        <?php
                        $total = 0;
                        $stmt = $conn->query("SELECT * FROM expenses WHERE date BETWEEN '$start_date' AND '$end_date_with_time'");
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
                                <a class="btn btn-primary bg-gradient-primary border rounded-pill" href="./?page=expenses/add-expenses&id=<?= isset($row['id']) ? $row['id'] : '' ?>"><i class="fa fa-view"></i> View</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot style="font-size:35px; font-weight:bold;">
                        <tr>
                            <th colspan="5" class="text-center">Total</th>
                            <th class="text-right"><?= format_num($total) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            location.href = "./?page=report_expenses&" + $(this).serialize();
        });
        $('#report-list td, #report-list th').addClass('py-1 px-2 align-middle');
    });
</script>