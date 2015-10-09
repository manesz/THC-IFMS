<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error

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
	
	$prefix='THD';
	$postfix=date("y");
	
	$code = $db->auto_new_item_code($prefix,$postfix);	
	$item_code=str_pad("$code", 6, "0", STR_PAD_LEFT); 
	
	
	$equipment_name=addslashes($_POST['equipment_name']);	
	$qty=addslashes($_POST['qty']);	
	$department_id=addslashes($_POST['department_id']);
	$customer_id=addslashes($_POST['customer_id']);
	
	$manufacturer=addslashes($_POST['manufacturer']);
	$model=$_POST['model'];
	$resolution=addslashes($_POST['resolution']);	
	$calibration_range=addslashes($_POST['calibration_range']);	
	$serial_no=addslashes($_POST['serial_no']);	
	$id_no=addslashes($_POST['id_no']);
	
	$attb1_1=($_POST['attb1_1'] == '1' ? '1' : '0');
	$attb1_2=($_POST['attb1_2'] == '1' ? '1' : '0');
	$attb1_3=($_POST['attb1_3'] == '1' ? '1' : '0');
	$attb1_4=($_POST['attb1_4'] == '1' ? '1' : '0');
	$attb1_5=($_POST['attb1_5'] == '1' ? '1' : '0');
	$attb1_6=($_POST['attb1_6'] == '1' ? '1' : '0');
	$attb1_7=addslashes($_POST['attb1_6_other']);
	
	$attb2_1=($_POST['attb2_1']== '1' ? '1' : '0');
	$attb2_2=($_POST['attb2_2']== '1' ? '1' : '0');
	$attb2_3=($_POST['attb2_3']== '1' ? '1' : '0');
	$attb2_4=($_POST['attb2_4']== '1' ? '1' : '0');
	$attb2_4_other=addslashes($_POST['attb2_4_other']);
	
	
	$iso017025=($_POST['iso017025']== '1' ? '1' : '0');
	
	$create_dttm=date("Y-m-d H:i:s");
	$receive_dttm=$create_dttm;
	$update_dttm=$create_dttm;
	
	
	
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];

	$sql="	INSERT INTO "._TB_ITEM." 
				(
						id, item_code_prefix, item_code, item_code_postfix,						
						equipment_name, qty, department_id, customer_id, 
						manufacturer, model, resolution, calibration_range, serial_no, id_no, 
						attb1_1, attb1_2, attb1_3, attb1_4, attb1_5, attb1_6, attb1_6_other,
						attb2_1, attb2_2, attb2_3, attb2_4, attb2_4_other,
						iso017025,
						create_dttm, receive_dttm, update_dttm, 
						publish,
						create_person
				) 
				VALUES (
					NULL, '$prefix', '$item_code', '$postfix',		
					'$equipment_name', '$qty', '$department_id', '$customer_id', 
					'$manufacturer', '$model', '$resolution', '$calibration_range', '$serial_no', '$id_no', 
					'$attb1_1', '$attb1_2', '$attb1_3', '$attb1_4', '$attb1_5', '$attb1_6', '$attb1_6_other', 
					'$attb2_1', '$attb2_2', '$attb2_3', '$attb2_4', '$attb2_4_other', 
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

	$equipment_name=addslashes($_POST['equipment_name']);	
	$qty=addslashes($_POST['qty']);	
	$department_id=addslashes($_POST['department_id']);
	$customer_id=addslashes($_POST['customer_id']);
	
	$manufacturer=addslashes($_POST['manufacturer']);
	$model=$_POST['model'];
	$resolution=addslashes($_POST['resolution']);	
	$calibration_range=addslashes($_POST['calibration_range']);	
	$serial_no=addslashes($_POST['serial_no']);	
	$id_no=addslashes($_POST['id_no']);
	
	$attb1_1=($_POST['attb1_1'] == '1' ? '1' : '0');
	$attb1_2=($_POST['attb1_2'] == '1' ? '1' : '0');
	$attb1_3=($_POST['attb1_3'] == '1' ? '1' : '0');
	$attb1_4=($_POST['attb1_4'] == '1' ? '1' : '0');
	$attb1_5=($_POST['attb1_5'] == '1' ? '1' : '0');
	$attb1_6=($_POST['attb1_6'] == '1' ? '1' : '0');
	$attb1_7=addslashes($_POST['attb1_6_other']);
	
	$attb2_1=($_POST['attb2_1']== '1' ? '1' : '0');
	$attb2_2=($_POST['attb2_2']== '1' ? '1' : '0');
	$attb2_3=($_POST['attb2_3']== '1' ? '1' : '0');
	$attb2_4=($_POST['attb2_4']== '1' ? '1' : '0');
	$attb2_4_other=addslashes($_POST['attb2_4_other']);
	
	
	$iso017025=($_POST['iso017025']== '1' ? '1' : '0');
	
	$calibrate_result=addslashes($_POST['calibrate_result']);
	$note=addslashes($_POST['note']);
	
	$cert_no=addslashes($_POST['cert_no']);
	$cer_pdf='';
	$inv_no=addslashes($_POST['inv_no']);
	$update_dttm=date("Y-m-d H:i:s");
	
	
	$SQL="UPDATE  "._TB_ITEM." 
				SET  				
						equipment_name = '$equipment_name', 
						department_id = '$department_id',
						model = '$model',
						resolution = '$resolution',
						calibration_range = '$calibration_range',
						serial_no = '$serial_no',
						id_no = '$id_no',
						attb1_1 = '$attb1_1',
						attb1_2 = '$attb1_2',
						attb1_3 = '$attb1_3',
						attb1_4 = '$attb1_4',
						attb1_5 = '$attb1_5',
						attb1_6 = '$attb1_6',
						attb1_6_other = '$attb1_6_other',
						attb2_1 = '$attb2_1',
						attb2_2 = '$attb2_2',
						attb2_3 = '$attb2_3',
						attb2_4 = '$attb2_4',
						attb2_4_other = '$attb2_4_other',
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