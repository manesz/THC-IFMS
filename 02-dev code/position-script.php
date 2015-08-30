<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error


if ($action=='add') {
	
	$title=addslashes($_POST['title']);
	$description=addslashes($_POST['description']);
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	
	//`id`, `title`, `description`, `create_dttm`, `update_dttm`, `publish`, `create_person`
	
	//ตรวจสอบชื่อตำแหน่งซ้ำ
	if ($db->check_exist_data("title", _TB_POSITION, " title='$title' AND publish='1'  ")) {
		$error="103";
	} else { 
		$sql="	INSERT INTO "._TB_POSITION." 
					(id, title, description, create_dttm, update_dttm, publish, create_person) 
					VALUES (
						NULL, '$title', '$description', NOW(), NOW(), '$publish', '$create_person'
					) ";
		if (!$db->query($sql)) {
			$error="101";
		}
	}	
	echo $error;
}


if ($action=='edit') {	
	$id=$_POST['id'];
	$title=trim(addslashes($_POST['title']));
	$current_title=trim(addslashes($_POST['current_title'])); 	
	$description=addslashes($_POST['description']);
	
	$create_person=$_SESSION['ss_member_id'];
	
	
	if ($current_title!=$title && $db->check_exist_data("title", _TB_POSITION, " title='$title' AND id<>'$id'  AND publish='1' ")) {
			$error="103";	
	} else {
		
			$SQL="UPDATE  "._TB_POSITION." 
					SET  	title = '$title', 
							description='$description',
							update_dttm=NOW(),
							create_person='$create_person'
					WHERE id='$id' 
					LIMIT 1; ";
					
			
			if (!mysql_query($SQL)) {
				$error="101";
			} 	
	}
	echo $error;		
}

if ($action=='delete') {
	$id=$_POST['id'];
	$SQL="UPDATE "._TB_POSITION." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="101";
	} 	
	echo $error;		
}

$db->close();
?>