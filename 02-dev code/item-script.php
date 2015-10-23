<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error
$PDF_PATH  = _PDF_ITEM_PATH."/";
$IMG_PATH = _IMG_ITEM_PATH."/";

if ($action=='load-images') {
	$id=$_POST['item_id'];
	$images='';
	
	$sql="SELECT * FROM "._TB_ITEM_IMAGE." WHERE item_id='$id' ";
	$re=mysql_query($sql);
	$n=mysql_num_rows($re);
	if ($n>0) {
		while ($rs=mysql_fetch_array($re)) {
			$img_name=$rs['name'];
			
			$images.='   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
								<div class="project-wrapper">
									<div class="project">
										<div class="photo-wrapper">
											<div class="photo">
												<a class="fancybox" href="'.$IMG_PATH.$img_name.'"><img class="img-responsive" src="'.$IMG_PATH.$img_name.'" alt=""></a>
											</div>
											<div class="overlay"></div>
										</div>
									</div>
								</div>
							</div>
							';	
		}
	}
	echo $images;
	
}

if ($action=='get_customer_info') {
		$id=$_POST['id'];	
		$sql="SELECT company_name, company_address, phone_no, fax_no, email FROM "._TB_CUSTOMER." WHERE id='$id' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
				$rs=mysql_fetch_array($re);
				
				$company_name=stripslashes($rs['company_name']);
				$company_address=stripslashes($rs['company_address']);
				$phone_no=stripslashes($rs['phone_no']);
				$fax_no=stripslashes($rs['fax_no']);
				$email=stripslashes($rs['email']);
				
		
								$content='<table class="table table-bordered table-striped table-responsive">
                                                        <tr>
                                                            <td style="width: 30%;">ชื่อ</td>
                                                            <td style="width: 70%;">'.$company_name.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%;">ที่อยู่</td>
                                                            <td style="width: 70%;">'.nl2br($company_address).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%;">โทรศัพท์</td>
                                                            <td style="width: 70%;">'.$phone_no.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%;">โทรสาร</td>
                                                            <td style="width: 70%;">'.($fax_no!="" ? $fax_no : '-').'</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%;">อีเมล</td>
                                                            <td style="width: 70%;">'.($email!="" ? $email : '-').'</td>
                                                        </tr>
                                                    </table> ';
		}
		
		echo $content;
}

if ($action=='add') {
	
	
	$department_id=addslashes($_POST['department_id']);	
	$prefix=$db->department_code($department_id);
	
	$postfix=date("y");
	
	$code = $db->auto_new_item_code($prefix,$postfix);	
	
	$item_code=str_pad("$code", 6, "0", STR_PAD_LEFT); 
	
	
	$equipment_name=addslashes($_POST['equipment_name']);	
	$description=addslashes($_POST['description']);	
	
	$qty=addslashes($_POST['qty']);	
	
	$customer_id=addslashes($_POST['customer_id']);
	
	$manufacturer=addslashes($_POST['manufacturer']);
	$model=$_POST['model'];
	$resolution=addslashes($_POST['resolution']);	
	$calibration_range=addslashes($_POST['calibration_range']);	
	$serial_no=addslashes($_POST['serial_no']);	
	$id_no=addslashes($_POST['id_no']);
	
	$item_accessories=addslashes($_POST['item_accessories']);
	
	$iso017025=($_POST['iso017025']== '1' ? '1' : '0');
	
	$create_dttm=date("Y-m-d H:i:s");
	$receive_dttm=$create_dttm;
	$update_dttm=$create_dttm;
	
	
	
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	//----ITEM Accessory 
	$acc_chk=$_POST['acc_chk'];  
	$acc_id=$_POST['acc_id'];
	 $item_accessories='';
	if(count($acc_chk)>0){  // ตรวจสอบ checkbox ว่ามีการเลือกมาอย่างน้อย 1 รายการหรือไม่  
		foreach($acc_chk as $key=>$value){  
			$item_accessories.=$value;
			
			$acc_more=$_POST["acc_more$value"];
			if ($acc_more!="") {
				$item_accessories.=":$acc_more";
			}			
			$item_accessories.="|";
		}     
	}  	
	//---------

	$sql="	INSERT INTO "._TB_ITEM." 
				(
						id, item_code_prefix, item_code, item_code_postfix,						
						equipment_name, description, qty, department_id, customer_id, 
						manufacturer, model, resolution, calibration_range, serial_no, id_no, 
						item_accessories,
						iso017025,
						create_dttm, receive_dttm, update_dttm, 
						publish,
						create_person
				) 
				VALUES (
					NULL, '$prefix', '$item_code', '$postfix',		
					'$equipment_name', '$description', '$qty', '$department_id', '$customer_id', 
					'$manufacturer', '$model', '$resolution', '$calibration_range', '$serial_no', '$id_no', 
					'$item_accessories',
					'$iso017025', 
					'$create_dttm', '$receive_dttm', '$update_dttm', 
					'$publish', 
					'$create_person'
				) ";
	if (!$db->query($sql) ) {
		$error="102";
	} else {
		$newID=$db->getinsertID();
		$error="returnid:$newID";
	}
	
	echo $error;
}


if ($action=='edit') {	
	
	$id=$_POST['id'];		
	
	$department_id=addslashes($_POST['department_id']);
	$prefix=$db->department_code($department_id);

	$equipment_name=addslashes($_POST['equipment_name']);
	$description=addslashes($_POST['description']);	
	
	$qty=addslashes($_POST['qty']);	
	
	$customer_id=addslashes($_POST['customer_id']);
	
	$manufacturer=addslashes($_POST['manufacturer']);
	$model=$_POST['model'];
	$resolution=addslashes($_POST['resolution']);	
	$calibration_range=addslashes($_POST['calibration_range']);	
	$serial_no=addslashes($_POST['serial_no']);	
	$id_no=addslashes($_POST['id_no']);
	
	
	$iso017025=($_POST['iso017025']== '1' ? '1' : '0');
	
	$calibrate_result=addslashes($_POST['calibrate_result']);
	$note=addslashes($_POST['note']);
	
	$cert_no=addslashes($_POST['cert_no']);
	$cer_pdf='';
	$inv_no=addslashes($_POST['inv_no']);
	$update_dttm=date("Y-m-d H:i:s");
	
	
	
	//----ITEM Accessory 
	$acc_chk=$_POST['acc_chk'];  
	$acc_id=$_POST['acc_id'];
	 $item_accessories='';
	if(count($acc_chk)>0){  // ตรวจสอบ checkbox ว่ามีการเลือกมาอย่างน้อย 1 รายการหรือไม่  
		foreach($acc_chk as $key=>$value){  
			$item_accessories.=$value;
			
			$acc_more=$_POST["acc_more$value"];
			if ($acc_more!="") {
				$item_accessories.=":$acc_more";
			}			
			
			$item_accessories.="|";
		}     
	}  	
	//---------
	
	$SQL_PDF='';
	if ($change_pdf=='1') { //เปลี่ยนภาพ
				if($_FILES["cer_pdf"]["size"]>0){
								if(!file_exists($PDF_PATH)) mkdir($PDF_PATH); //สร้าง Folder ปลายทางเมื่อไม่พบ
								
								if(isPDF($_FILES["cer_pdf"])){ //ตรวจสอบว่าเป็นไฟล์ PDF
								
										//เรียกฟังก์ชั่น Resize
										$pdf_name=$_FILES['cer_pdf']['name'];
										
										$path=$PDF_PATH.$pdf_name;
											
										if( copy($_FILES['cer_pdf']['tmp_name'], $path)) {														
														$SQL="UPDATE  "._TB_ITEM." 
																	SET  	item_code_prefix='$prefix',
																			equipment_name = '$equipment_name', 
																			description = '$description', 
																			department_id = '$department_id',
																			model = '$model',
																			resolution = '$resolution',
																			calibration_range = '$calibration_range',
																			serial_no = '$serial_no',
																			id_no = '$id_no',
																			item_accessories='$item_accessories',
																			calibrate_result = '$calibrate_result',
																			iso017025 = '$iso017025',
																			manufacturer = '$manufacturer',
																			cert_no = '$cert_no',
																			cer_pdf='$pdf_name',
																			inv_no = '$inv_no',
																			note = '$note',
																			status = '$status',
																			qty = '$qty',						
																			update_dttm = '$update_dttm',
																			customer_id ='$customer_id',
																			create_person='$create_person'
																	WHERE id='$id' 
																	LIMIT 1; ";
														$re=$db->query($SQL);
														if (!$re) {
															$error='102';	
														}
										} else {
												//echo 'ไม่สามารถอัพโหลดได้';
												$error='103';
										}
								}else{
										//echo 'กรุณาใช้ไฟล์ PDF
										$error='104';
								}
				} else{
						//echo 'ท่านยังไม่ได้อัพโหลดไฟล์';
						$error='105';
				}							
	} else {
		$SQL="UPDATE  "._TB_ITEM." 
					SET  		
							item_code_prefix='$prefix',		
							equipment_name = '$equipment_name', 
							description = '$description', 
							department_id = '$department_id',
							model = '$model',
							resolution = '$resolution',
							calibration_range = '$calibration_range',
							serial_no = '$serial_no',
							id_no = '$id_no',
							item_accessories='$item_accessories',
							calibrate_result = '$calibrate_result',
							iso017025 = '$iso017025',
							manufacturer = '$manufacturer',
							cert_no = '$cert_no',
							cer_pdf = '$cer_pdf',
							inv_no = '$inv_no',
							note = '$note',
							status = '$status',
							qty = '$qty',						
							update_dttm = '$update_dttm',
							customer_id ='$customer_id',
							create_person='$create_person'
					WHERE id='$id' 
					LIMIT 1; ";
		$re=$db->query($SQL);
		if (!$re) {
			$error='102';	
		}
	}

	
	echo $error;		

}

if ($action=='delete') {
	$id=$_POST['id'];
	$SQL="UPDATE "._TB_ITEM." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="102";
	} 	
	echo $error;
}

$db->close();
?>