<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error


if ($action=='add') {
	
	$title=addslashes($_POST['title']);
	$code=$_POST['code'];
	
	$description=addslashes($_POST['description']);
	
	$is_in_lab=$_POST['is_in_lab'];
	$is_on_site=$_POST['is_on_site'];
	
	$in_lab = ($is_in_lab=='1' ? '1' : '');
	$on_site = ($is_on_site=='1' ? '1' : '');
	
	
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	
	//`id`, `title`, `description`, `create_dttm`, `update_dttm`, `publish`, `create_person`
	
	//ตรวจสอบชื่อแผนกซ้ำ
	if ($db->check_exist_data("title", _TB_DEPARTMENT, " title='$title' AND publish='1'  ")) {
		$error="103";
	} else { 
		$sql="	INSERT INTO "._TB_DEPARTMENT." 
					(id, title, code, description, is_in_lab, is_on_site, create_dttm, update_dttm, publish, create_person) 
					VALUES (
						NULL, '$title', '$code', '$description', '$in_lab', '$on_site', NOW(), NOW(), '$publish', '$create_person'
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
	$code=$_POST['code'];
	
	$current_title=trim(addslashes($_POST['current_title'])); 	
	$description=addslashes($_POST['description']);
	
	$is_in_lab=$_POST['is_in_lab'];
	$is_on_site=$_POST['is_on_site'];
	
	$in_lab = ($is_in_lab=='1' ? '1' : '');
	$on_site = ($is_on_site=='1' ? '1' : '');
	
	$create_person=$_SESSION['ss_member_id'];
	
	
	if ($current_title!=$title && $db->check_exist_data("title", _TB_DEPARTMENT, " title='$title' AND id<>'$id'  AND publish='1' ")) {
			$error="103";	
	} else {
		
			$SQL="UPDATE  "._TB_DEPARTMENT." 
					SET  	title = '$title', 
							code='$code',
							description='$description',
							is_in_lab='$in_lab',
							is_on_site='$on_site',
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
	$SQL="UPDATE "._TB_DEPARTMENT." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="101";
	} 	
	echo $error;		
}

$db->close();
?>