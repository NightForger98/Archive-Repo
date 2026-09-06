<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">قائمة الموظفين</h3>
        <div class="card-tools">
            <a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary">
                <span class="fas fa-plus"></span> إنشاء موظف جديد
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-hover table-striped table-bordered" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="20%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="10%">
                    <col width="15%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الراتب</th>
                        <th>ايام العمل</th>
                        <th>ايام الغياب</th>
                        <th>الخصم</th>
                        <th>الانسحابات</th>
                        <th>الاجمال</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    $qry = $conn->query("
                        SELECT 
                            s.*, 
                            COALESCE(SUM(w.amount), 0) AS total_withdrawal, 
                            (s.salary / s.day_work) * 
                            (SELECT COUNT(*) FROM `absence` a WHERE a.staff_id = s.id) AS total_deduction
                        FROM 
                            `staff` s
                        LEFT JOIN 
                            `withdrawal` w 
                        ON 
                            s.id = w.staff_id
                        GROUP BY 
                            s.id
                        ORDER BY 
                            s.name ASC
                    ");

                    while ($row = $qry->fetch_assoc()):
                        $staff_id = $row['id'];

                        // Fetch absence details
                        $absence_qry = $conn->query("
                            SELECT 
                                a.absence_date,
                                (s.salary / s.day_work) AS per_day_deduction
                            FROM 
                                `absence` a 
                            JOIN 
                                `staff` s 
                            ON 
                                a.staff_id = s.id
                            WHERE 
                                a.staff_id = '{$staff_id}'
                        ");

                        // Fetch withdrawal details
                        $withdrawal_qry = $conn->query("
                            SELECT 
                                w.created_at, 
                                w.amount 
                            FROM 
                                `withdrawal` w 
                            WHERE 
                                w.staff_id = '{$staff_id}'
                        ");

                        $days_worked = $row['day_work'] - $absence_qry->num_rows;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td class="fbx"><?php echo $row['name']; ?></td>
                        <td class="fbx"><?php echo number_format($row['salary'], 2); ?></td>
                        <td class="fbx"><?php echo $days_worked; ?></td>
                        <td class="fbx">
                            <ul class="mb-0">
                                <?php 
                                while ($abs_row = $absence_qry->fetch_assoc()):
                                ?>
                                <li>
                                    <?php echo $abs_row['absence_date']; ?>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <strong>المجموع: <?php echo $absence_qry->num_rows; ?> أيام</strong>
                        </td>
                        <td class="fbx">
                            <ul class="mb-0">
                                <?php 
                                $absence_qry->data_seek(0); // Reset pointer for reuse
                                while ($ded_row = $absence_qry->fetch_assoc()):
                                    $deduction_amount = $ded_row['per_day_deduction'];
                                ?>
                                <li>
                                    <?php echo $ded_row['absence_date'] . ": " . number_format($deduction_amount, 2) . " الخصم"; ?>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <strong>الإجمالي: <?php echo number_format($row['total_deduction'], 2); ?></strong>
                        </td>
                        <td class="fbx">
                            <ul class="mb-0">
                                <?php 
                                while ($with_row = $withdrawal_qry->fetch_assoc()):
                                ?>
                                <li>
                                    <?php echo $with_row['created_at'] . ": " . number_format($with_row['amount'], 2) . " الانسحاب"; ?>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <strong>الإجمالي: <?php echo number_format($row['total_withdrawal'], 2); ?></strong>
                        </td>
                        <td class="fbx"><?php echo number_format($row['salary'] - ($row['total_withdrawal'] + $row['total_deduction']), 2); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#list').dataTable({
            columnDefs: [
                { orderable: false, targets: [4, 5, 6, 7] }
            ],
            order: [0, 'asc']
        });
        $('.dataTable td, .dataTable th').addClass('py-1 px-2 align-middle');
    });
</script>
