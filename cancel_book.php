<?php
session_start();
include('db_connect.php');
extract($_POST);
// check schedule table if 24 hours before departure time, if no, then delete from booked table
$check = $conn->query("SELECT * FROM schedule_list WHERE id = ".$id)->fetch_array();
if (strtotime($check['departure_time']) - strtotime(date('Y-m-d H:i:s')) < 86400) {
    echo 2;
    exit;
}

$remove = $conn->query("DELETE FROM booked where schedule_id =".$id . " AND user_id = ".$_SESSION['login_id']);
if($remove)
	echo 1;