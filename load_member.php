<?php
include 'db_connect.php';

$qry = $conn->query("SELECT * FROM users where status = 1 and is_admin = 0 order by name asc");
$data = array();
while($row = $qry->fetch_assoc()){
	$data[]= $row;
}
echo json_encode($data);