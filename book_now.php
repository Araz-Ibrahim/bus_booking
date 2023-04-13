<?php 


include 'db_connect.php';
extract($_POST);

if((intval($availability) - intval($count)) < intval($qty)){
    $count = intval($count);
    $availability = intval($availability);
    $seatsLeft = $availability - $count;
    echo json_encode(array('status'=> 2, 'msg' => 'Sorry, only ' . $seatsLeft .' seat/s left for this schedule.'));
    exit;
}

$data = ' schedule_id = '.$sid.' ';
$data .= ', user_id = '.$user_id.' ';
$data .= ', qty ="'.$qty.'" ';
if(!empty($bid)){
	$data .= ', status ="'.$status.'" ';
	$update = $conn->query("UPDATE booked set ".$data." where id =".$bid);
	if($update){
		echo json_encode(array('status'=> 1));
	}
	exit;
}
$i = 1;
$ref = '';
while($i == 1){
	$ref = date('Ymd').mt_rand(1,9999);
	$data .= ', ref_no = "'.$ref.'" ';
	$chk = $conn->query("SELECT * FROM booked where ref_no=".$ref)->num_rows;
	if($chk <=0)
		$i = 0;
}

// echo "INSERT INTO booked set ".$data;
	$insert = $conn->query("INSERT INTO booked set ".$data);
	if($insert){
		echo json_encode(array('status'=> 1,'ref'=>$ref));
	}
