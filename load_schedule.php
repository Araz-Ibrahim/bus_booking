<?php

session_start();

include 'db_connect.php';

$qry = $conn->query("SELECT s.*, CONCAT(b.bus_number, ' | ', b.name) AS bus 
                     FROM schedule_list s 
                     INNER JOIN bus b ON b.id = s.bus_id 
                     WHERE s.status = 1 " .
    ($_SESSION['login_is_admin'] == 0 ? "AND s.departure_time > NOW() " : "") .
    "ORDER BY DATE(s.departure_time) ASC");

$data = array();
while($row = $qry->fetch_assoc()){
	$from_location = $conn->query("SELECT id,Concat(terminal_name,', ',city,', ',state) as location FROM location where id = ".$row['from_location'])->fetch_array()['location'];
	$to_location = $conn->query("SELECT id,Concat(terminal_name,', ',city,', ',state) as location FROM location where id = ".$row['to_location'])->fetch_array()['location'];
	$row['from_location'] = $from_location;
	$row['to_location'] = $to_location;
	$row['date'] = date('M d, Y',strtotime($row['departure_time']));
	$row['time'] = date('h:i A',strtotime($row['departure_time']));

    $booked_query = "SELECT * FROM booked WHERE schedule_id = ".$row['id']." AND user_id = ".$_SESSION['login_id'];
    $booked_result = $conn->query($booked_query);
    if ($booked_result->num_rows > 0) {
        $row['booked'] = 1;
    } else {
        $row['booked'] = 0;
    }

	if(date('F d, Y',strtotime($row['departure_time'])) == date('F d, Y',strtotime($row['eta']))){
		$row['eta'] = date('h:i A',strtotime($row['eta']));
	}else{
		$row['eta'] = date('M d,Y h:i A',strtotime($row['eta']));
	}
	$data[]= $row;
}
echo json_encode($data);