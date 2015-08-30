<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error


if ($action=='add') {
	
	$title=addslashes($_POST['title']);
	$value=addslashes($_POST['value']);
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	
	//`id`, `title`, `value`, `create_dttm`, `update_dttm`, `publish`, `create_person`
	
	//ตรวจสอบชื่อแผนกซ้ำ
	if ($db->check_exist_data("title", _TB_PERMISSION, " title='$title' AND publish='1'  ")) {
		$error="103";
	} else { 
		$sql="	INSERT INTO "._TB_PERMISSION." 
					(id, title, value, create_dttm, update_dttm, publish, create_person) 
					VALUES (
						NULL, '$title', '$value', NOW(), NOW(), '$publish', '$create_person'
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
	$value=addslashes($_POST['value']);
	
	$create_person=$_SESSION['ss_member_id'];
	
	
	if ($current_title!=$title && $db->check_exist_data("title", _TB_PERMISSION, " title='$title' AND id<>'$id'  AND publish='1' ")) {
			$error="103";	
	} else {
		
			$SQL="UPDATE  "._TB_PERMISSION." 
					SET  	title = '$title', 
							value='$value',
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
	$SQL="UPDATE "._TB_PERMISSION." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="101";
	} 	
	echo $error;		
}

$db->close();
?>