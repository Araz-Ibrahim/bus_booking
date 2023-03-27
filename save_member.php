<?php
include('db_connect.php');

extract($_POST);
	$data = " name = '$name' ";
	$data .= ", username = '$username' ";
    $data .= ", password = '$password' ";
    $data .= ", blood_type = '$blood_type' ";
    $data .= ", phone = '$phone' ";
    $data .= ", phone_2 = '$phone_2' ";
    $data .= ", date_updated = now() ";
    $data .= ", is_admin = 0 ";

if(empty($id)){
	
	$insert= $conn->query("INSERT INTO users set ".$data);
	if($insert)
		echo 1;
}else{
	$update= $conn->query("UPDATE users set ".$data." where id =".$id);
	if($update)
		echo 1;
}