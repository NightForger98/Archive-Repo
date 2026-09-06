<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `staff` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
	<dl>
        <dt class="text-muted">الاسم</dt>
        <dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
        <dt class="text-muted">الاجر</dt>
        <dd class="pl-4"><?= isset($price) ? $price : '' ?></dd>
        <dt class="text-muted">ايام الغياب</dt>
        <dd class="pl-4"><?= isset($day_abs) ? $day_abs : '' ?></dd>
        <dt class="text-muted">قيمة الخصم</dt>
        <dd class="pl-4"><?= isset($price_abs) ? $price_abs : '' ?></dd>
    </dl>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-sm btn-dark bg-gradient-dark btn-flat" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>