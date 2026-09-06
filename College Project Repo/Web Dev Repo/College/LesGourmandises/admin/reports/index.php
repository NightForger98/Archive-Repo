<?php
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date("Y-m-d");
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date("Y-m-d");
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;

if ($_settings->userdata('type') == 3) {
    $user_id = $_settings->userdata('id');
}
?>
<?php if ($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>
<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">Daily Sales Report</h3>
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
                        <?php if ($_settings->userdata('type') != 3): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="user_id">User</label>
                                    <select name="user_id" class="form-control form-control-sm" required>
                                        <option value="0" <?= $user_id == 0 ? 'selected' : '' ?>>All</option>
                                        <?php
                                        $qry = $conn->query("SELECT *, CONCAT(firstname, ' ', lastname) AS `name` FROM users ORDER BY `name` ASC");
                                        while ($row = $qry->fetch_assoc()):
                                        ?>
                                            <option value="<?= $row['id'] ?>" <?= $user_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
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
                <table class="table table-hover table-striped table-bordered" id="report-list">
                    <colgroup>
                        <col width="5%">
                        <col width="20%">
                        <col width="15%">
                        <col width="20%">
                        <col width="15%">
                        <col width="15%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Updated</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $i = 1;
                        $where = "";
                        if ($user_id > 0) {
                            $where = " AND user_id = '{$user_id}'";
                        }
                        $users_qry = $conn->query("SELECT id, CONCAT(firstname, ' ', lastname) AS `name` FROM users WHERE id IN (SELECT user_id FROM sale_list WHERE DATE(date_created) BETWEEN '$start_date' AND '$end_date')");
                        $user_arr = array_column($users_qry->fetch_all(MYSQLI_ASSOC), 'name', 'id');
                        $qry = $conn->query("SELECT * FROM sale_list WHERE DATE(date_created) BETWEEN '$start_date' AND '$end_date' $where ORDER BY UNIX_TIMESTAMP(date_updated) DESC");
                        while ($row = $qry->fetch_assoc()):
                            $total += $row['amount'];
                        ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= date("M d, Y H:i", strtotime($row['date_updated'])) ?></td>
                                <td><?= $row['payment_type'] == 1 ? "Takeaway" : "Delivery" ?></td>
                                <td>
                                    <?php
                                    if ($row['client_id'] > 0) {
                                        $stmt = $conn->prepare("SELECT clientName FROM clients WHERE id = ?");
                                        $stmt->bind_param("i", $row['client_id']);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        if ($client = $result->fetch_assoc()) {
                                            echo $client['clientName'];
                                        }
                                        $stmt->close();
                                    } elseif (!empty($row['guest_user'])) {
                                        echo $row['guest_user'] . "<span style='margin-left:80px'>طيار</span>";
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </td>
                                <td><?= ucwords($user_arr[$row['user_id']] ?? "N/A") ?></td>
                                <td class="text-right"><?= format_num($row['amount']) ?></td>
                                <td>
                                <a class="btn btn-primary bg-gradient-primary border rounded-pill" href="./?page=sales/view_details&id=<?= isset($row['id']) ? $row['id'] : '' ?>"><i class="fa fa-view"></i> View</a>
                            </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6" class="text-center">Total</th>
                            <th class="text-right"><?= format_num($total) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <h4 class="mt-5">Total Items Sold</h4>
            <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_items = 0;
                        $total_value = 0;
                        $product_query = $conn->query("SELECT p.name AS product_name, SUM(sp.qty) AS total_qty, p.price
                                                      FROM sale_products sp
                                                      JOIN product_list p ON sp.product_id = p.id
                                                      JOIN sale_list sl ON sl.id = sp.sale_id
                                                      WHERE DATE(sl.date_created) BETWEEN '$start_date' AND '$end_date'
                                                      GROUP BY sp.product_id");
                        while ($product_row = $product_query->fetch_assoc()):
                            $product_name = $product_row['product_name'];
                            $quantity = $product_row['total_qty'];
                            $price = $product_row['price'];
                            $total_value = $quantity * $price;
                            $total_items += $quantity;
                        ?>
                            <tr>
                                <td><?= $product_name ?></td>
                                <td class="text-center"><?= $quantity ?></td>
                                <td class="text-right"><?= format_num($total_value) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<noscript id="print-header">
    <style>
        html, body {
            background: unset !important;
            min-height: unset !important;
        }
    </style>
    <div class="d-flex w-100">
        <div class="col-2 text-center"></div>
        <div class="col-8 text-center" style="line-height:.9em">
            <h4 class="text-center m-0"><?= $_settings->info('name') ?></h4>
            <h3 class="text-center m-0"><b>Daily Sales Report</b></h3>
            <h5 class="text-center m-0"><b>as of</b></h5>
            <h3 class="text-center m-0"><b><?= date("F d, Y", strtotime($start_date)) ?> to <?= date("F d, Y", strtotime($end_date)) ?></b></h3>
        </div>
    </div>
    <hr>
</noscript>
<script>
    $(document).ready(function() {
        $('[name="user_id"]').select2({
            placeholder: 'Please Select User Here',
            width: '100%',
            containerCssClass: 'form-control form-control-sm rounded-0'
        });
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            location.href = "./?page=reports&" + $(this).serialize();
        });
        $('#report-list td, #report-list th').addClass('py-1 px-2 align-middle');
        $('#print').click(function() {
            var head = $('head').clone();
            var p = $('#printout').clone();
            var phead = $('noscript#print-header').html();
            var el = $('<div class="container-fluid">');
            head.find('title').text("Daily Sales Report - Print View");
            el.append(phead);
            el.append(p);
            el.find('.bg-gradient-navy, .bg-gradient-secondary').css({
                'background': 'unset !important',
                'color': '#000 !important'
            });
            start_loader();
            var nw = window.open("", "_blank", "width=1000, height=900");
            nw.document.querySelector('head').innerHTML = head.prop('outerHTML');
            nw.document.querySelector('body').innerHTML = el.prop('outerHTML');
            nw.document.close();
            setTimeout(() => {
                nw.print();
                setTimeout(() => {
                    nw.close();
                    end_loader();
                }, 300);
            }, 500);
        });
    });
</script>