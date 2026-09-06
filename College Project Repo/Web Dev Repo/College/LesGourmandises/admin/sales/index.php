<?php if ($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>

<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">List of Sales</h3>
        <div class="card-tools">
            <a href="./?page=sales/manage_sale" id="create_new" class="btn btn-flat btn-primary">
                <span class="fas fa-plus"></span> Create New
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table  style="font-size: 35px; font-weight: bold;" class="table table-hover table-striped table-bordered">
                <colgroup>
                    <col width="auto">
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
                        <th>Status</th>
                        <th>code</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $and = '';
                    $where = '';
                    $i = 1;
                    $today_date = date("Y-m-d"); // Current date

                    if (isset($_GET['no']) && $_GET['no'] == 1) {
                        $and = "and payment_type = 2 and dev_id = 0 and date(date_created) = '{$today_date}'";
                        $where = "where payment_type = 2 and dev_id = 0 and date(date_created) = '{$today_date}'";
                    }
                    $delivery_list = $conn->query("SELECT id, delevery_name FROM `delevery`")->fetch_all(MYSQLI_ASSOC);
                    if ($_settings->userdata('type') == 3):
                        $qry = $conn->query("SELECT * FROM `sale_list` WHERE user_id = '{$_settings->userdata('id')}' and $and ORDER BY UNIX_TIMESTAMP(date_updated) DESC");
                    else:
                        $qry = $conn->query("SELECT * FROM `sale_list` $where ORDER BY UNIX_TIMESTAMP(date_updated) DESC");
                    endif;

                    while ($row = $qry->fetch_assoc()):
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td>
                                <p class="m-0 truncate-1"><?= date("M d, Y H:i", strtotime($row['date_updated'])) ?></p>
                            </td>
                            <td>
                                <p class="m-0 truncate-1">
                                    <?php
                                    if (isset($row['payment_type']) && $row['payment_type'] == 1) {
                                        echo "Tekaway";
                                    } elseif (isset($row['payment_type']) && $row['payment_type'] == 2) {
                                        echo "Delivery";
                                    } else {
                                        echo "N/A";
                                    }
                                    ?>
                                </p>
                            </td>
                            <td class="text-center"><?= $row['code'] ?></td>
                            <td>
                                <p class="m-0 truncate-1"><?php
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
                                                                echo $row['guest_user'] . "<span style='margin-left:80px'>طيار</span>";
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
                            <td class='text-right'><?= format_num($row['amount']) ?></td>
                            <td align="left">
                                <?php if (isset($row['payment_type']) && $row['payment_type'] == 2): ?>
                                    <!-- Delivery Dropdown -->
                                    <select class="form-control select-delivery" data-sale-id="<?= $row['id'] ?>">
                                        <option value="" disabled selected>Select Delivery</option>
                                        <?php foreach ($delivery_list as $delivery): ?>
                                            <option value="<?= $delivery['id'] ?>" <?= $delivery['id'] == $row['dev_id'] ? 'selected' : '' ?>>
                                                <?= $delivery['delevery_name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>

                                <!-- View Button (always visible) -->
                                <a class="btn btn-default bg-gradient-light btn-flat btn-sm" href="?page=sales/view_details&id=<?= $row['id']; ?>">
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
            columnDefs: [{
                orderable: false,
                targets: [6]
            }],
            order: [0, 'asc']
        });
        $('.dataTable td, .dataTable th').addClass('py-1 px-2 align-middle');

        $('.select-delivery').change(function() {
            let sale_id = $(this).data('sale-id');
            let dev_id = $(this).val();

            $.ajax({
                url: _base_url_ + "classes/Master.php?f=update_dev",
                method: 'POST',
                data: {
                    sale_id: sale_id,
                    dev_id: dev_id
                },
                dataType: 'json', // Expect JSON response
                success: function(resp) {
                    if (resp.status === 'success') {
                        alert_toast("Delivery updated successfully", 'success');
                    } else {
                        alert_toast(resp.msg || "Failed to update delivery", 'error');
                    }
                },
                error: function() {
                    alert_toast("An unexpected error occurred.", 'error');
                }
            });
        });

    });
</script>