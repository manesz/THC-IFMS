<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error

////`id`, `title`, `create_dttm`, `update_dttm`, `publish`, `parent_id`, `create_person`
if ($action=='add') {
	
	$title=addslashes($_POST['title']);
	$parent_id=$_POST['parent_id'];
	$require_data=$_POST['require_data'];
	$publish='1';	
	
	$create_person=$_SESSION['ss_member_id'];
	
	$sql="	INSERT INTO "._TB_ITEM_ACCESSORIES." 
				(id, title, create_dttm, update_dttm, publish, parent_id, require_data, create_person) 
				VALUES (
					NULL, '$title', NOW(), NOW(), '$publish', '$parent_id', '$require_data', '$create_person'
				) ";
	if (!$db->query($sql)) {
		$error="101";
	}

	echo $error;
}


if ($action=='edit') {	
	$id=$_POST['id'];
	
	$title=addslashes($_POST['title']);
	$parent_id=$_POST['parent_id'];
	$require_data=$_POST['require_data'];
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];

	$SQL="UPDATE  "._TB_ITEM_ACCESSORIES." 
			SET  	title = '$title', 
					parent_id='$parent_id',
					require_data='$require_data',
					update_dttm=NOW(),
					create_person='$create_person'
			WHERE id='$id' 
			LIMIT 1; ";
			
	
	if (!mysql_query($SQL)) {
		$error="101";
	} 		
	echo $error;		
}

if ($action=='delete') {
	$id=$_POST['id'];
	$SQL="UPDATE "._TB_ITEM_ACCESSORIES." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="101";
	} 	
	echo $error;		
}

$db->close();
?>