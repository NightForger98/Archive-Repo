<?php
if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM `expenses` WHERE id = '{$_GET['id']}'");
    if ($qry->num_rows > 0) {
        $res = $qry->fetch_array();
        foreach ($res as $k => $v) {
            if (!is_numeric($k)) $$k = $v;
        }
        if (isset($supplier_id) && is_numeric($supplier_id)) {
            $supplier = $conn->query("SELECT `name` FROM `suppliers` WHERE id = '{$supplier_id}'");
            if ($supplier->num_rows > 0) {
                $supplier_name = $supplier->fetch_array()['name'];
            }
        }
    } else {
        echo '<script>alert("Unknown Expense ID."); location.replace("./?page=expenses");</script>';
    }
} else {
    echo '<script>alert("Expense ID is required to access the page."); location.replace("./?page=expenses");</script>';
}
?>

<div class="content p-0 m-0">
    <div class="card card-outline card-navy rounded-0 shadow p-0 m-0">
        <div class="card-body p-0 m-0">
            <div class="container-fluid row justify-content-center p-0 m-0">
                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 p-0 m-0" id="printout">
                    <div class="d-flex">
                        <div style="font-size: 20px; font-weight: bold;" class="col-auto p-0 m-0">Sale Code:</div>
                        <div style="font-size: 20px; font-weight: bold; position: relative; left: 10px;" class="col-auto ps-1 flex-shrink-1 flex-grow-1 border-bottom border-dark p-0 m-0"><?= isset($sale_number) ? $sale_number : "" ?></div>
                    </div>
                    <div class="d-flex">
                        <div style="font-size: 20px; font-weight: 750;" class="col-auto p-0 p-0">Supplier Name:</div>
                        <div style="font-size: 25px; font-weight: 750; font-family: 'MarkaziText', serif; left: -8px;" class="col-auto ps-1 flex-shrink-1 flex-grow-1 border-bottom border-dark text-right p-0 m-0">
                            <?php echo isset($supplier_name) ? $supplier_name : ""; ?>
                        </div>
                    </div>
                    <div style="margin: 30px;"></div>
                    <h4 class="d-flex border-bottom border-dark p-0 m-0">
                        <div class="col-3 text-left p-0 m-0">Total</div>
                        <div class="col-7 text-center">Item</div>
                        <div class="col-2 text-right p-0 m-0">QTY</div>
                    </h4>
                    <?php if (isset($id)): ?>
                        <?php
                        $sp_query = $conn->query("SELECT * FROM `sale_items` WHERE expense_id = '{$id}'");
                        while ($row = $sp_query->fetch_assoc()):
                        ?>
                            <div class="d-flex border-bottom border-dark">
                                <div class="col-4 m-0 p-0" style="font-weight: bold; font-size: 20px;"><?= format_num($row['price'] * $row['quantity']) ?></div>
                                <div class="col-4 text-center p-0 m-0" style="line-height: 0.8em;" dir="rtl">
                                    <p class="p-0 m-0 w-100" style="font-size: 25px; font-weight: 750; font-family: 'MarkaziText', serif; line-height: 1em;">
                                        <?= $row['item_name'] ?>
                                        <span class="p-0 m-0" style="font-weight: bold; font-size: 17px;">*<?= $row['price'] = intval($row['price']); ?></span>
                                    </p>
                                </div>
                                <div style="font-weight: bold; font-size: 20px;" class="col-4 text-right">
                                    <?= $row['quantity'] ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="d-flex" style="border-top: 2px solid #000;"></div>
                    <h5 class="d-flex">
                        <div style="font-size: 20px; font-weight: 750;" class="col-6 text-left p-0 m-0">QTY</div>
                        <div style="font-size: 20px; font-weight: 750;" class="col-6 text-right p-0 m-0">
                            <?php
                            $total_query = $conn->query("SELECT sum(quantity) as total FROM sale_items WHERE expense_id = '{$id}'");
                            $total = $total_query->num_rows > 0 ? $total_query->fetch_array()['total'] : 0;
                            echo format_num($total);
                            ?>
                        </div>
                    </h5>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <a class="btn btn-primary bg-gradient-primary border col-lg-3 col-md-4 col-sm-12 col-xs-12 rounded-pill" href="./?page=expenses/add-expenses&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Edit</a>
                <button class="btn btn-light bg-gradient-light border col-lg-3 col-md-4 col-sm-12 col-xs-12 rounded-pill" id="print"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-danger bg-gradient-danger border col-lg-3 col-md-4 col-sm-12 col-xs-12 rounded-pill" id="delete_sale" type="button"><i class="fa fa-trash"></i> Delete Sale</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#print').click(function() {
            var head = $('head').clone();
            var p = $('#printout').clone();
            var el = $('<div style="width:100mm; margin:0; padding:0;">');
            head.find('title').text("Sale Details-Print View");
            el.append(p);
            var nw = window.open("about:blank", "_blank", "width=1px,height=1px,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no");
            nw.document.querySelector('head').innerHTML = head.prop('outerHTML');
            nw.document.querySelector('body').innerHTML = el.prop('outerHTML');
            nw.document.close();
            setTimeout(() => {
                nw.print();
                setTimeout(() => {
                    nw.close();
                    if (new URLSearchParams(window.location.search).get('print') === '1') {
                        location.href = "./?page=expenses";
                    }
                }, 0);
            }, 0);
        });

        $('#delete_sale').click(function() {
            _conf("Are you sure to delete this sale permanently?", "delete_sale", []);
        });
    });

    function delete_sale($id) {
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_expenses",
            method: "POST",
            data: { id: '<?= isset($id) ? $id : "" ?>' },
            dataType: "json",
            error: err => {
                console.log(err);
                alert_toast("An error occurred.", 'error');
                end_loader();
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.replace('./?page=expenses');
                } else {
                    alert_toast("An error occurred.", 'error');
                    end_loader();
                }
            }
        });
    }
</script>