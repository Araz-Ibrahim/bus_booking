<?php
session_start();
include('db_connect.php');
if(isset($_GET['id']) && !empty($_GET['id']) ) {
    $qry = $conn->query("SELECT ref_no FROM booked WHERE schedule_id = " . $_GET['id'] . " AND user_id = " . $_SESSION['login_id'])->fetch_array();
    foreach ($qry as $k => $val) {
        $meta[$k] = $val;
    }
}
?>
<div class="container-fluid">
	<form id="manage_book">
		<div class="col-md-12">
            <div class="text-center">
                <p><strong><h3><?php echo $meta['ref_no'] ?></h3></strong></p>
                <small>Reference Number</small><br/>
                <small>Copy or Capture your Reference number </small>
            </div>
        </div>
	</form>
</div>