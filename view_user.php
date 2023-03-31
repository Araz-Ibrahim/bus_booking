<?php
session_start();
include('db_connect.php');
if(isset($_GET['id']) && !empty($_GET['id']) ){
	$qry = $conn->query("SELECT * FROM users where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $val){
		$meta[$k] =  $val;
	}
?>
<div class="container-fluid">
	<form id="manage_book">
		<div class="col-md-12">
			<p><b>Name:</b> <?php echo $meta['name']?></p>
            <p><b>Username:</b> <?php echo $meta['username']?></p>
            <p><b>Blood Type:</b> <?php echo $meta['blood_type']?></p>
            <p><b>Phone:</b> <?php echo $meta['phone']?></p>
            <p><b>Second Phone:</b> <?php echo $meta['phone_2']?></p>
		</div>
	</form>
</div>

<?php
}