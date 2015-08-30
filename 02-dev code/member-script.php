<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error
$IMG_PATH  = _IMG_PROFILE_PATH."/";

if ($action=='add') {
	
	$f_name=addslashes($_POST['f_name']);
	$l_name=addslashes($_POST['l_name']);
	$phone_no=addslashes($_POST['phone_no']);
	$mobile_no=addslashes($_POST['mobile_no']);
	$email=addslashes($_POST['email']);
	
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	
	$department_id=$_POST['department_id'];
	$permission_id=$_POST['permission_id'];
	$position_id=$_POST['position_id'];
	
	$publish='1';	
	
	$is_active=($_POST['is_active']=='1' ? '1' : '0');	
	$create_person=$_SESSION['ss_member_id'];
	
	if ($db->check_exist_data("username", _TB_MEMBER, " username='$username'  ")) {
		$error="101";
	} elseif($_FILES["image_profile"]["size"]>0){
				if(!file_exists($IMG_PATH)) mkdir($IMG_PATH); //สร้าง Folder ปลายทางเมื่อไม่พบ
				
				if(isImage($_FILES["image_profile"])){ //ตรวจสอบว่าเป็นไฟล์รูปภาพ
						//เรียกฟังก์ชั่น Resize
						$img_name="$username";
						if($newfilename = uploadResizeTo($_FILES["image_profile"], $IMG_PATH, "$img_name", 500, 500)) {

							$sql="	INSERT INTO "._TB_MEMBER." 
										(id, f_name, l_name, phone_no, mobile_no, email, image_profile, username, password, create_dttm, update_dttm, is_active, publish, department_id, permission_id, position_id, create_person) 
										VALUES (
											NULL, 
											'$f_name', 
											'$l_name', 
											'$phone_no', 
											'$mobile_no', 
											'$email', 
											'$newfilename',
											'$username', 
											'$password', 
											NOW(), 
											NOW(), 
											'$is_active', 
											'$publish', 
											'$department_id', 
											'$permission_id', 
											'$position_id', 
											'$create_person'
										) ";
								
								if (!$db->query($sql)) {
									$error='102';	 //save ไม่ได้
								}  else {							
									$error="";
								}
								
						} else {
								//echo 'ไม่สามารถอัพโหลดได้';
								$error='103';
						}
				}else{
						//echo 'กรุณาใช้ไฟล์รูปภาพเท่านั้น';
						$error='104';
				}		
						
	} else {
				//echo 'ท่านยังไม่ได้อัพโหลดไฟล์';
					$sql="	INSERT INTO "._TB_MEMBER." 
								(id, f_name, l_name, phone_no, mobile_no, email, username, password, create_dttm, update_dttm, is_active, publish, department_id, permission_id, position_id, create_person) 
								VALUES (
									NULL, 
									'$f_name', 
									'$l_name', 
									'$phone_no', 
									'$mobile_no', 
									'$email', 
									'$username', 
									'$password', 
									NOW(), 
									NOW(), 
									'$is_active', 
									'$publish', 
									'$department_id', 
									'$permission_id', 
									'$position_id', 
									'$create_person'
								) ";
					if (!$db->query($sql)) {
						$error="102";
					}
	}

	
	/*
	//ตรวจสอบชื่อตำแหน่งซ้ำ
	if ($db->check_exist_data("username", _TB_MEMBER, " username='$username'  ")) {
		$error="103";
	} else { 
		$sql="	INSERT INTO "._TB_MEMBER." 
					(id, f_name, l_name, phone_no, mobile_no, email, username, password, create_dttm, update_dttm, is_active, publish, department_id, permission_id, position_id, create_person) 
					VALUES (
						NULL, 
						'$f_name', 
						'$l_name', 
						'$phone_no', 
						'$mobile_no', 
						'$email', 
						'$username', 
						'$password', 
						NOW(), 
						NOW(), 
						'$is_active', 
						'$publish', 
						'$department_id', 
						'$permission_id', 
						'$position_id', 
						'$create_person'
					) ";
		if (!$db->query($sql)) {
			$error="101";
		}
	}	
	*/
	echo $error;
}


if ($action=='edit') {	
	
	$id=$_POST['id'];		
	$f_name=addslashes($_POST['f_name']);
	$l_name=addslashes($_POST['l_name']);
	$phone_no=addslashes($_POST['phone_no']);
	$mobile_no=addslashes($_POST['mobile_no']);
	$email=addslashes($_POST['email']);
	
	$username=trim($_POST['username']);
	$current_username=trim($_POST['current_username']);
	
	$password=trim($_POST['password']);
	if ($password!="") {
		$update_password=" password = '$password', ";	
	} else {
		$update_password='';	
	}
	
	$department_id=$_POST['department_id'];
	$permission_id=$_POST['permission_id'];
	$position_id=$_POST['position_id'];
	
	$publish='1';	
	
	$is_active=($_POST['is_active']=='1' ? '1' : '0');	
	
	$create_person=$_SESSION['ss_member_id'];
	
	if ($current_username!=$username && $db->check_exist_data("username", _TB_MEMBER, " username='$username' AND id<>'$id'  ")) {
			$error="101";
	} else {
		
				if ($change_img=='1') { //เปลี่ยนภาพ
							if($_FILES["image_profile"]["size"]>0){
											if(!file_exists($IMG_PATH)) mkdir($IMG_PATH); //สร้าง Folder ปลายทางเมื่อไม่พบ
											
											if(isImage($_FILES["image_profile"])){ //ตรวจสอบว่าเป็นไฟล์รูปภาพ
													//เรียกฟังก์ชั่น Resize
													$img_name="$username";
													if($newfilename = uploadResizeTo($_FILES["image_profile"], $IMG_PATH, "$img_name", 500, 500)) {
																//echo 'อัพโหลดไฟล์เรียบร้อย <strong>'.$newfilename.'</strong>';
																$SQL="UPDATE  "._TB_MEMBER." 
																			SET   f_name = '$f_name',
																					 l_name = '$l_name',
																					 phone_no = '$phone_no',
																					 mobile_no = '$mobile_no',
																					 email = '$email', 
																					 image_profile='$newfilename',
																					 username = '$username',
																					 $update_password
																					 is_active = '$is_active',
																					 department_id = '$department_id',
																					 permission_id = '$permission_id',
																					 position_id = '$position_id',	
																					update_dttm=NOW(),
																					create_person='$create_person'
																			WHERE id='$id' 
																			LIMIT 1; ";
					
																if (!$db->query($SQL)) {
																	$error='102';	
																}  else {
																	$error="";
																}
													} else {
															//echo 'ไม่สามารถอัพโหลดได้';
															$error='103';
													}
											}else{
													//echo 'กรุณาใช้ไฟล์รูปภาพเท่านั้น';
													$error='104';
											}											
							} else{
									//echo 'ท่านยังไม่ได้อัพโหลดไฟล์';
									$error='105';
							}
							
				} else { //ไม่เปลี่ยนภาพ ก็ทับแต่ข้อมูล
						$SQL="UPDATE  "._TB_MEMBER." 
									SET   f_name = '$f_name',
											 l_name = '$l_name',
											 phone_no = '$phone_no',
											 mobile_no = '$mobile_no',
											 email = '$email', 
											 username = '$username',
											 $update_password
											 is_active = '$is_active',
											 department_id = '$department_id',
											 permission_id = '$permission_id',
											 position_id = '$position_id',							 
											update_dttm=NOW(),
											create_person='$create_person'
									WHERE id='$id' 
									LIMIT 1; ";
						$re=$db->query($SQL);
						if (!$re) {
							$error='102';	
						} 
				}
						
			
			/*			
			
			$SQL="UPDATE  "._TB_MEMBER." 
					SET   f_name = '$f_name',
					         phone_no = '$phone_no',
							 mobile_no = '$mobile_no',
							 email = '$email', 
							 username = '$username',
							 password = '$password',
							 is_active = '$is_active',
							 department_id = '$department_id',
							 permission_id = '$permission_id',
							 position_id = '$position_id',							 
							update_dttm=NOW(),
							create_person='$create_person'
					WHERE id='$id' 
					LIMIT 1; ";
					
			
			if (!mysql_query($SQL)) {
				$error="101";
			} 	
			
			*/
	}
	
	echo $error;		

}

if ($action=='delete') {
	$id=$_POST['id'];
	$SQL="UPDATE "._TB_MEMBER." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="101";
	} 	
	echo $error;
}

$db->close();
?>