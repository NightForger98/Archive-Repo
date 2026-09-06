<?php
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$staff_id = isset($_GET['staff']) ? $_GET['staff'] : 0;
?>

<?php if ($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>

<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">تقرير الموظفين الشهري</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <fieldset class="border px-2 mb-2 ,x-2">
                <legend class="w-auto px-2">التصفية</legend>
                <form id="filter-form" action="">
                    <div class="row align-items-end">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="month">الشهر</label>
                                <select name="month" class="form-control form-control-sm rounded-0" required>
                                    <option value="01" <?= $month == '01' ? 'selected' : '' ?>>يناير</option>
                                    <option value="02" <?= $month == '02' ? 'selected' : '' ?>>فبراير</option>
                                    <option value="03" <?= $month == '03' ? 'selected' : '' ?>>مارس</option>
                                    <option value="04" <?= $month == '04' ? 'selected' : '' ?>>أبريل</option>
                                    <option value="05" <?= $month == '05' ? 'selected' : '' ?>>مايو</option>
                                    <option value="06" <?= $month == '06' ? 'selected' : '' ?>>يونيو</option>
                                    <option value="07" <?= $month == '07' ? 'selected' : '' ?>>يوليو</option>
                                    <option value="08" <?= $month == '08' ? 'selected' : '' ?>>أغسطس</option>
                                    <option value="09" <?= $month == '09' ? 'selected' : '' ?>>سبتمبر</option>
                                    <option value="10" <?= $month == '10' ? 'selected' : '' ?>>أكتوبر</option>
                                    <option value="11" <?= $month == '11' ? 'selected' : '' ?>>نوفمبر</option>
                                    <option value="12" <?= $month == '12' ? 'selected' : '' ?>>ديسمبر</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="staff">الموظف</label>
                                <select name="staff" class="form-control form-control-sm rounded-0" required>
                                    <option value="0" <?= $staff_id == 0 ? 'selected' : '' ?>>الكل</option>
                                    <?php
                                    $staff_qry = $conn->query("SELECT id, name FROM staff");
                                    while ($staff = $staff_qry->fetch_assoc()):
                                    ?>
                                        <option value="<?= $staff['id'] ?>" <?= $staff_id == $staff['id'] ? 'selected' : '' ?>><?= $staff['name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary rounded-0 btn-sm"><i class="fa fa-filter"></i> تصفية</button>
                                <button class="btn btn-light border rounded-0 btn-sm" type="button" id="print"><i class="fa fa-print"></i> طباعة</button>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>

            <div class="container-fluid" id="printout">
                <table class="table table-hover table-striped table-bordered" id="staff-list">
                    <colgroup>
                        <col width="5%" id="id">
                        <col width="10%">
                        <col width="10%">
                        <col width="15%">
                        <col width="15%">
                        <col width="15%">
                        <col width="15%">
                        <col width="15%">
                        
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الموظف</th>
                            <th>الراتب</th>
                            <th>أيام العمل</th>
                            <th>أيام الغياب</th>
                            <th>السحب</th>
                            <th>مجموع السحب</th>
                            <th>الإجمالي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $i = 1;

                        $staff_qry = $conn->query("
                            SELECT 
                                s.id, 
                                s.name, 
                                s.salary, 
                                s.day_work
                            FROM staff s
                            WHERE s.id = '{$staff_id}' OR '{$staff_id}' = 0
                        ");

                        while ($staff = $staff_qry->fetch_assoc()):
                            $absentDates = [];
                            $withdrawalDates = [];
                            $deduction = 0;
                            $withdrawals = 0;

                            $absence_qry = $conn->query("SELECT created_at ,rival FROM absence WHERE staff_id = {$staff['id']} AND MONTH(created_at) = '{$month}'");
                            while ($absence = $absence_qry->fetch_assoc()) {
                                $absentDates[] = date('m/d/Y', strtotime($absence['created_at'])). " = " . number_format($absence['rival'], 2);
                                $deduction += ($staff['salary'] / $staff['day_work']);
                            }

                            $withdrawal_qry = $conn->query("SELECT created_at, amount FROM withdrawal WHERE staff_id = {$staff['id']} AND MONTH(created_at) = '{$month}'");
                            while ($withdrawal = $withdrawal_qry->fetch_assoc()) {
                                $withdrawalDates[] = date('m/d/Y', strtotime($withdrawal['created_at'])) ." = " . number_format($withdrawal['amount'], 2);
                                $withdrawals += $withdrawal['amount'];
                            }

                            $totalAmount = $staff['salary'] - ($deduction + $withdrawals);
                            $total += $totalAmount;
                        ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $staff['name'] ?></td>
                                <td><?= number_format($staff['salary'], 2) ?></td>
                                <td><?= $staff['day_work'] - count($absentDates) ?></td>
                                <td><?= implode("<br>", $absentDates) // i want just echo the date?> </td>
                                <td><?= implode("<br>", $withdrawalDates) ?> </td>
                                <td class="text-center"> <?= number_format($withdrawals, 2) ?></td>   
                                <td><?= number_format($totalAmount, 2) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="text-center">الإجمالي</th>
                            <th class="text-right"><?= number_format($total, 2) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('#filter-form').submit(function(e) {
        e.preventDefault();
        location.href = "./?page=reports_staff&" + $(this).serialize();
    });

    $('#print').click(function() {
        var head = $('head').clone();
        var p = $($('#printout').html()).clone();

        var el = $('<div style="width:100mm; margin:0; padding:0;">');
        head.find('title').text("تقرير الموظفين الشهري - نسخة للطباعة");
        el.append(p);
        var nw = window.open("", "_blank", "width=1000, height=900");
        nw.document.querySelector('head').innerHTML = head.prop('outerHTML');
        nw.document.querySelector('body').innerHTML = el.prop('outerHTML');
        nw.document.close();

        setTimeout(() => {
            nw.print();
            setTimeout(() => {
                nw.close();
            }, 300);
        }, 500);
    });
</script>
