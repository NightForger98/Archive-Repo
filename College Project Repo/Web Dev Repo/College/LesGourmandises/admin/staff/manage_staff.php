<?php

require_once('../../config.php');

$is_today = false; // القيمة الافتراضية كقيمة منطقية

if (isset($_GET['id']) && $_GET['id'] > 0) {
    // جلب بيانات الموظف
    $qry = $conn->query("SELECT * FROM `staff` WHERE id = '{$_GET['id']}'");
    if ($qry && $qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }

    // التحقق مما إذا تم تسجيل غياب لتاريخ اليوم
    $absence_qry = $conn->query("SELECT `created_at` FROM `absence` WHERE staff_id = '{$_GET['id']}'");
    if ($absence_qry && $absence_qry->num_rows > 0) {
        $absence_data = $absence_qry->fetch_assoc();
        if (isset($absence_data['created_at']) && date('Y-m-d') === date('Y-m-d', strtotime($absence_data['created_at']))) {
            $is_today = true; // تحديث العلامة
        }
    }
}
?>
<style>
    .fdx {
        font-size: 20px;
    }
</style>
<div class="container-fluid">
    <form action="" id="category-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
        <div class="form-group">
            <label for="name" class="control-label">الاسم</label>
            <input type="text" name="name" id="name" class="fdx form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="salary" class="control-label">المعاش</label>
            <input name="salary" id="salary" class="fdx form-control form-control-sm rounded-0" value="<?php echo isset($salary) ? $salary : ''; ?>">
        </div>
        <div class="form-group">
            <label for="amount" class="control-label">السحب</label>
            <input type="text" name="amount" id="amount" class="fdx form-control form-control-sm rounded-0" value="">
        </div>
        <div class="form-group">
            <label for="day_off" class="control-label">يوم الإجازة</label>
            <div>
                <label class="btn btn-primary">
                    <input type="radio" id="day_off_yes" name="day_off" value="1" <?php echo ($is_today) ? "disabled" : ""; ?>> نعم
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" id="day_off_no" name="day_off" value="0" <?php echo ($is_today) ? "disabled" : ""; ?> checked> لا
                </label>
            </div>
        </div>
    </form>
</div>
<?php 
    // إخراج لتصحيح الأخطاء
    echo $is_today ? "true" : "false";
?>
<script>
    $(document).ready(function() {
        $('#category-form').submit(function(e) {
            e.preventDefault();
            var _this = $(this);
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_staff",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: function(err) {
                    console.log(err);
                    alert_toast("حدث خطأ", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        location.reload();
                    } else if (resp.status == 'failed' && resp.msg) {
                        var el = $('<div>');
                        el.addClass("alert alert-danger err-msg").text(resp.msg);
                        _this.prepend(el);
                        el.show('slow');
                        $("html, body").animate({
                            scrollTop: _this.closest('.card').offset().top
                        }, "fast");
                        end_loader();
                    } else {
                        alert_toast("حدث خطأ", 'error');
                        end_loader();
                        console.log(resp);
                    }
                }
            });
        });
    });
</script>
