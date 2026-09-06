<?php
require_once('../../config.php');

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT * FROM `staff` WHERE id = '{$_GET['id']}'");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }

    $attendance_summary = $conn->query("
        SELECT 
            COUNT(*) AS days_worked,
            SUM(is_absent) AS days_off
        FROM `attendance`
        WHERE staff_id = '{$_GET['id']}'
    ")->fetch_assoc();

    $days_worked = $attendance_summary['days_worked'] ?? 0;
    $days_off = $attendance_summary['days_off'] ?? 0;
}
?>
<style>
    .fdx {
        font-size: 20px;
    }
</style>
<div class="container-fluid">
    <form action="" id="staff-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
        <div class="form-group">
            <label for="name" class="control-label">الاسم</label>
            <input type="text" name="name" id="name" class="fdx form-control form-control-sm rounded-0" 
                value="<?php echo isset($name) ? $name : ''; ?>" required />
        </div>
        <div class="form-group">
            <label for="salary" class="control-label">الاجر</label>
            <input type="text" name="salary" id="salary" class="fdx form-control form-control-sm rounded-0" 
                value="<?php echo isset($salary) ? $salary : ''; ?>" />
        </div>
        <div class="form-group">
            <label for="days_worked" class="control-label">ايام العمل</label>
            <input type="number" id="days_worked" class="fdx form-control form-control-sm rounded-0" 
                value="<?php echo $days_worked; ?>" readonly />
        </div>
        <div class="form-group">
            <label for="days_off" class="control-label">ايام الغياب</label>
            <input type="number" id="days_off" class="fdx form-control form-control-sm rounded-0" 
                value="<?php echo $days_off; ?>" readonly />
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#staff-form').submit(function(e) {
            e.preventDefault();
            const form = $(this);
            start_loader();

            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_staff",
                data: new FormData(form[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                success: function(resp) {
                    if (resp.status === 'success') {
                        alert_toast('Staff record saved successfully.', 'success');
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        const error = $('<div>')
                            .addClass("alert alert-danger err-msg")
                            .text(resp.msg || 'Error occurred.');
                        form.prepend(error);
                        error.show('slow');
                    }
                    end_loader();
                },
                error: function(err) {
                    console.log(err);
                    alert_toast('Error occurred. Please try again.', 'error');
                    end_loader();
                }
            });
        });
    });
</script>
