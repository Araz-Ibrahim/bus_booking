<?php
session_start();
include('db_connect.php');
if(isset($_GET['id']) && !empty($_GET['id']) ){
	$qry = $conn->query("SELECT * FROM schedule_list where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $val){
		$meta[$k] =  $val;
	}
$bus = $conn->query("SELECT * FROM bus where id = ".$meta['bus_id'])->fetch_array();
$from_location = $conn->query("SELECT id,Concat(terminal_name,', ',city,', ',state) as location FROM location where id =".$meta['from_location'])->fetch_array();
$to_location = $conn->query("SELECT id,Concat(terminal_name,', ',city,', ',state) as location FROM location where id =".$meta['to_location'])->fetch_array();
$count = $conn->query("SELECT SUM(qty) as sum from booked where schedule_id =".$meta['id'])->fetch_array()['sum'];
}

?>
<div class="container-fluid">
	<form id="manage_book">
		<div class="col-md-12">
			<p><b>Bus:</b> <?php echo $bus['bus_number'] . ' | '.$bus['name'] ?></p>
			<p><b>From:</b> <?php echo $from_location['location'] ?></p>
			<p><b>To:</b> <?php echo $to_location['location'] ?></p>
			<p><b>Departure Time</b>: <?php echo date('M d,Y h:i A',strtotime($meta['departure_time'])) ?></p>
			<p><b>Estimated Time of Arrival:</b> <?php echo date('M d,Y h:i A',strtotime($meta['eta'])) ?></p>
		</div>
	</form>
</div>