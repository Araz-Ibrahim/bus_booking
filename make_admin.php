<?php

include('db_connect.php');
extract($_POST);
$update = $conn->query("UPDATE users set is_admin = 1 where id =".$id);
if($update)
	echo 1;