<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `clients` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
	.cdx{
		font-size:20px !important;
	}
</style>
<div class="container-fluid">
	<form action="" id="client-form">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="clientName" class="control-label">الاسم</label>
			<input type="text" name="clientName" id="clientName" class="form-control form-control-sm rounded-0 cdx" value="<?php echo isset($clientName) ? $clientName : ''; ?>" autocomplete="off" required/>
		</div>
		<div class="form-group">
			<label for="phone" class="control-label">الهاتف</label>
			<textarea name="phone" id="phone" class="form-control form-control-sm rounded-0 cdx" required><?php echo isset($phone) ? $phone : ''; ?></textarea>
		</div>
        <div class="form-group">
			<label for="address" class="control-label">العنوان</label>
			<textarea name="address" id="address" class="form-control form-control-sm rounded-0 cdx" required><?php echo isset($address) ? $address : ''; ?></textarea>
		</div>
		
	</form>
</div>

<script>
    function validateForm() {
        // احصل على القيم من إدخالات النموذج
        var clientName = document.getElementById('clientName').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var address = document.getElementById('address').value.trim();

        // التحقق من الحقول الفارغة
        if (clientName === "" || phone === "" || address === "") {
            alert("يرجى ملء جميع الحقول قبل الحفظ.");
            return false;  // منع إرسال النموذج
        }

        return true;  // السماح بإرسال النموذج
    }

    $(document).ready(function(){
        $('#client-form').submit(function(e){
            e.preventDefault();  // منع الإرسال الافتراضي للنموذج

            // تحقق من صحة الحقول قبل المتابعة
            if (!validateForm()) {
                return;  // إذا فشلت التحقق، أوقف إرسال النموذج
            }

            var _this = $(this);
            $('.err-msg').remove();  // إزالة رسائل الخطأ السابقة
            start_loader();  // عرض مؤشر التحميل (إذا كان لديك وظيفة لذلك)

            // تابع الإرسال عبر AJAX إذا نجح التحقق
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_clients",
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
                    end_loader();  // إخفاء مؤشر التحميل
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        location.reload();  // إعادة تحميل الصفحة عند النجاح
                    } else if (resp.status == 'failed' && resp.msg) {
                        var el = $('<div>');
                        el.addClass("alert alert-danger err-msg").text(resp.msg);
                        _this.prepend(el);
                        el.show('slow');
                        $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                        end_loader();  // إخفاء مؤشر التحميل
                    } else {
                        alert_toast("حدث خطأ", 'error');
                        end_loader();  // إخفاء مؤشر التحميل
                        console.log(resp);
                    }
                }
            });
        });
    });
</script>
