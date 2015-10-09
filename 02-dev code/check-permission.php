<?php
session_start();
//Permission

if (!$_SESSION['ss_login'] && $_SESSION['ss_login']!='1') {
	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	exit;
}

include("define.php"); 
include('libs/class/db_connect.php');
include('libs/class/db_class.php');
include("libs/class/public-function.php");

$db = new db_class();

$avata_image=$db->get_image_profile($_SESSION['ss_member_id']);

?>