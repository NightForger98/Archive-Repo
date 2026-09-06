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
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
	<dl>
        <dt class="text-muted">Clients Name</dt>
        <dd class="pl-4"><?= isset($clientName) ? $clientName : "" ?></dd>
        <dt class="text-muted">Phone</dt>
        <dd class="pl-4"><?= isset($phone) ? $phone: '' ?></dd>
        <dt class="text-muted">Address</dt>
        <dd class="pl-4"><?= isset($address) ? $address: '' ?></dd>
        
    </dl>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-sm btn-dark bg-gradient-dark btn-flat" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>