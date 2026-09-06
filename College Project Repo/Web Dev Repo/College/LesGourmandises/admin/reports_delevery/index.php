<?php
$date = isset($_GET['date']) ? $_GET['date'] : date("Y-m-d");
$id = isset($_GET['id']) ? $_GET['id'] : 0;
echo $id;
?>
<?php if ($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>
<style>
    .ft{
        font-size: 25px !important;
    }
</style>
<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">Daily Sales Report for Delevery</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <fieldset class="border px-2 mb-2 ,x-2">
                <legend class="w-auto px-2">Filter</legend>
                <form id="filter-form" action="">
                    <div class="row align-items-end">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" value="<?= $date ?>" class="form-control form-control-sm rounded-0" required>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="user_id">Delevery</label>
                                <select name="id" class="form-control form-control-sm" required>
                                    <option value="0" <?= $id == 0 ? 'selected' : '' ?>>All</option>
                                    <?php
                                    $qry = $conn->query("SELECT * FROM delevery ORDER BY `delevery_name` ASC");
                                    while ($row = $qry->fetch_assoc()):
                                    ?>
                                        <option value="<?= $row['id'] ?>" <?= $id == $row['id'] ? 'selected' : '' ?>><?= $row['delevery_name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
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
            <div class="container-fluid p-0 m-0" id="printout">
                <!-- Sales List Table -->
                <table class="table table-hover table-striped table-bordered p-0 m-0" id="report-list">
                    <colgroup>
                        <col width="auto">
                        <col width="auto">
                        <col width="auto">
                        <col width="auto"> 
                        <col width="auto"> 
                        <col width="auto"> 
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Updated</th>
                            <th>Sales Code</th>
                            <th>Customer</th>
                            <th>Delevery</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $i = 1;

                        // Fetch delivery names
                        $users_qry = $conn->query("SELECT id, delevery_name as `name` FROM `delevery` WHERE id IN (SELECT dev_id FROM `sale_list` WHERE date(date_created) = '{$date}' AND payment_type != 1)");
                        $user_arr = array_column($users_qry->fetch_all(MYSQLI_ASSOC), 'name', 'id');

                        // Adjust query to filter sales by dev_id
                        $qry = $conn->query("SELECT * FROM `sale_list` WHERE date(date_created) = '{$date}' AND payment_type != 1" . ($id > 0 ? " AND dev_id = '{$id}'" : "") . " ORDER BY UNIX_TIMESTAMP(date_updated) DESC");
                        while ($row = $qry->fetch_assoc()):
                            $total += $row['amount'];
                        ?>
                            <tr>
                                <td style="font-size:15px !important; font-weight:bold;" class="text-center"><?php echo $i++; ?></td>
                                <td>
                                    <p class="m-0 hidex ft"><?= date("M d, Y H:i", strtotime($row['date_updated'])) ?></p>
                                </td>
                                <td>
                                    <p class="m-0 hidex ft"><?= $row['code'] ?></p>
                                </td>
                                <td>
                                    <p style="font-size:20px; font-weight:600; " class="m-0 truncate-1 ft"><?php
                                                                $clientName = ""; // Default value

                                                                if (isset($row['client_id']) && $row['client_id'] > 0) {
                                                                    // Use prepared statement to prevent SQL injection
                                                                    $stmt = $conn->prepare("SELECT clientName FROM clients WHERE id = ?");
                                                                    $stmt->bind_param("i", $row['client_id']);  // "i" means integer
                                                                    $stmt->execute();
                                                                    $result = $stmt->get_result();

                                                                    // Fetch the client name
                                                                    if ($client = $result->fetch_assoc()) {
                                                                        $clientName = $client['clientName'];
                                                                    } else {
                                                                        $clientName = ""; // In case no client is found
                                                                    }

                                                                    $stmt->close();
                                                                } elseif (isset($row['guest_user']) && !empty($row['guest_user'])) {
                                                                    // Check if guest user is set and not empty
                                                                    echo $row['guest_user'];
                                                                } else {
                                                                    // If neither client_id nor guest_user exists
                                                                    echo "0";
                                                                }

                                                                // Echo the clientName if it's set
                                                                if (!empty($clientName)) {
                                                                    echo $clientName;
                                                                }
                                                                ?></p>
                                </td>

                                <td style="font-size:20px; font-weight:600;" class='ft'><?= ucwords(isset($user_arr[$row['dev_id']]) ? $user_arr[$row['dev_id']] : "N/A") ?></td>
                                <td style="font-size:20px; font-weight:600;" class='text-left ft'><?= number_format($row['amount'], 0, '.', ''); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-center" style="font-size:25px !important; font-weight:bold;">Total</th>
                            <th class="text-left"><span style="font-size:25px !important; font-weight:bold;"><?= format_num($total) ?></span></th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>


<noscript id="print-header">
    <style>
        html,
        body {
            background: unset !important;
            min-height: unset !important
        }
    </style>
    <div class="d-flex w-100">
        <div class="col-2 text-center">
        </div>
        <div class="col-8 text-center" style="line-height:.9em">
            <h4 class="text-center m-0"><?= $_settings->info('name') ?></h4>
            <h3 class="text-center m-0"><b><?= date("F d, Y", strtotime($date)) ?></b></h3>
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
        })
        $('#filter-form').submit(function(e) {
            e.preventDefault()
            location.href = "./?page=reports_delevery&" + $(this).serialize()
        })
        $('#report-list td,#report-list th').addClass('py-1 px-2 align-middle')
        $('#print').click(function() {
            var head = $('head').clone();
            var p = $($('#printout').html()).clone();
            var phead = $($('noscript#print-header').html()).clone();

            // Hide unnecessary columns for print
           
            // Remove 'Date Updated' and 'Sales Code' columns
            p.find('thead tr th:nth-child(2), thead tr th:nth-child(3)').hide();
            p.find('tbody tr td:nth-child(2), tbody tr td:nth-child(3)').hide();
            // p.find('#id').attr('style', 'width:5%');
            // p.find('#cus').attr('style', 'width:50%');
            // p.find('#user').attr('style', 'width:15%');
            // p.find('#amount').attr('style', 'width:30%');
            
            // Create printable layout
            var el = $('<div style="width:100mm; margin:0; padding:0;">');
            head.find('title').text("Daily Sales Report - Print View");
            el.append(phead);
            el.append(p);
            el.find('.bg-gradient-navy').css({
                'background': '#001f3f linear-gradient(180deg, #26415c, #001f3f) repeat-x !important',
                'color': '#fff'
            });
            el.find('.bg-gradient-secondary').css({
                'background': '#6c757d linear-gradient(180deg, #828a91, #6c757d) repeat-x !important',
                'color': '#fff'
            });
            el.find('tr.bg-gradient-navy').attr('style', "color:#000");
            el.find('tr.bg-gradient-secondary').attr('style', "color:#000");

            // Print the modified table
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






    })
</script>