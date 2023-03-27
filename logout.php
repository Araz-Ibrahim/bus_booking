<?php
$is_admin = isset($_SESSION['login_is_admin']) ? $_SESSION['login_is_admin'] : 0;
session_start();
session_destroy();
if($is_admin == 0)
	header('location:login_user.php');
if($is_admin == 1)
    header('location:admin.php');
?>