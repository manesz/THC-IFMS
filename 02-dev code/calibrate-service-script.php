<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error

if ($action=='session_keep_data') {
	
		$_SESSION['ss_sale_code']=$_POST['sale_code'];
		$_SESSION['ss_create_date']=$_POST['create_date'];
		$_SESSION['ss_quotation_no']=$_POST['quotation_no'];
		$_SESSION['ss_invoice_no']=$_POST['invoice_no'];
		$_SESSION['ss_department_id']=$_POST['department_id'];
		$_SESSION['ss_on_status']=$_POST['on_status'];
		
		
		$_SESSION['ss_contact_name']=$_POST['contact_name'];
		$_SESSION['ss_customer_id']=$_POST['customer_id'];
		
		$_SESSION['ss_cert_for']=$_POST['cert_for'];
		$_SESSION['ss_address']=$_POST['address'];
		
						
}

if ($action=="add_new_csr") {
	
	$quotation_no=$_POST['quotation_no'];
	$invoice_no=$_POST['invoice_no'];
	$code_sale=$_POST['sale_code'];
	$contact_name=addslashes($_POST['contact_name']);
	$cert_for=addslashes($_POST['cert_for']);
	$address=addslashes($_POST['address']);
	
	//$fax=addslashes($_POST['fax']);
	//$telephone=addslashes($_POST['telephone']);
	
	$customer_id=$_POST['customer_id'];
	$department_id=$_POST['department_id'];
	
	$status=$_POST['on_status'];
	
	$item_array_id=$_POST['item_array_id'];
	$item_serial=$_POST['item_serial'];
	$item_id_no=$_POST['item_id_no'];
	
	$description='';
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];	
	
	$session_csr=$_SESSION['session_CSR'];

	
	//----Genelate CSR No -------
	
	$code_year=date("y");

	$flag_reuse=false;
	
	//ตรวจสอบสถานะนี้เป็น 0 หรือไม่ ถ้าเป็น 0 แสดงว่าถูกลบไปแล้ว 	
	$sql_publish="SELECT code_no, code_year FROM "._TB_CSR." WHERE publish='0' ORDER BY code_year, CONVERT(code_no,UNSIGNED INTEGER) ";
	$re_publish=mysql_query($sql_publish);
	if (mysql_num_rows($re_publish)>0) { //ถ้ามี record ที่ถูกลบ
	
			while ($rs_publis=mysql_fetch_array($re_publish)) {
				
					$old_code_no=$rs_publis['code_no'];
					$old_code_year=$rs_publis['code_year'];
					
					//เอา csr no มาตรวจสอบว่ามีหรือยังโดยที่ publish ต้องไม่เป็น 0
					$re_exist=mysql_query("SELECT id FROM "._TB_CSR." 
														WHERE code_no='$old_code_no' AND code_year='$old_code_year' AND publish<>'0' 
														ORDER BY code_year, CONVERT(code_no,UNSIGNED INTEGER) LIMIT 1; "); 
					
					if (mysql_num_rows($re_exist)<=0) { //แสดงว่าไม่มีการ reuse ก็ให้ใช้ รหัสเดิมมา reuse ใหม่
						$flag_reuse=true;
						
						$new_code_no=	$old_code_no;
						$new_code_year=	$old_code_year;
																
						break;
					}
					 //ถ้ามีแสดงว่ามี csr no ที่ถูกลบ และมีการ Reuse ใหม่แล้ว
					 
			}//end while
	}
	
	if ($flag_reuse) {
		$code_no=$new_code_no;
		$code_year=$new_code_year;
	} else {
			   //ตรวจสอบค่ามากสุดของ CSR 
			   //$sql="	SELECT MAX(code_no) AS max_code FROM "._TB_CSR." WHERE code_year='$code_year' ";
			   	 $sql="	SELECT MAX(CONVERT(code_no,UNSIGNED INTEGER)) AS max_code FROM "._TB_CSR." WHERE code_year='$code_year' ";
			
				$re=mysql_query($sql);		
				if (mysql_num_rows($re)>0) { //ถ้ามีเลข CSR No นี้แล้ว
					
					$max_csr_code =mysql_result($re,0);
					$new_csr_no=($max_csr_code+1);
					
				} else { //ถ้ายังไม่มีเลย
					$new_csr_no=1;	
				}
	
				$code_no= str_pad($new_csr_no,6,"0",STR_PAD_LEFT);
	}
				
	//----End of Genelate CSR No -------
	
	
	$sql2=" INSERT INTO "._TB_CSR." (id, code_no, code_year, code_sale, quotation_no, invoice_no, contact_name, cert_for, address,  create_dttm, update_dttm, publish, customer_id, department_id, session_csr, status, create_person) 
				VALUES (
						NULL,
						'$code_no',
						'$code_year',
						'$code_sale',
						'$quotation_no',
						'$invoice_no',
						'$contact_name',
						'$cert_for',
						'$address',						
						NOW(),
						NOW(),
						'$publish',
						'$customer_id',
						'$department_id',
						'$session_csr',
						'$status',
						'$create_person'
				) ";
	
	$re2 = mysql_query($sql2);
	
	if ($re2) {
		
		$new_csr_id=mysql_insert_id();
		$num_item_array=count($item_array_id);
		if ($num_item_array>0) {
				for ($j=0;$j<$num_item_array;$j++) {
					
					$item_id2=$item_array_id[$j];
					$item_serial2=$item_serial[$j];
					$item_id_no2=$item_id_no[$j];
					
					mysql_query("UPDATE "._TB_ITEM." SET  serial_no='$item_serial2', id_no='$item_id_no2', quotation_no='$quotation_no', invoice_no='$invoice_no', csr_id='$new_csr_id' WHERE id='$item_id2' LIMIT 1; ");
					
				} //for
		}
		
	}
	
	unset($_SESSION['session_CSR']);	
	unset(
			$_SESSION['ss_sale_code'],
			$_SESSION['ss_create_date'],
			$_SESSION['ss_quotation_no'],
			$_SESSION['ss_invoice_no'],
			$_SESSION['ss_department_id'],
			$_SESSION['ss_on_status'],
			$_SESSION['ss_contact_name'],
			$_SESSION['ss_customer_id'],
			$_SESSION['ss_cert_for'],
			$_SESSION['ss_address']
	);
	
		
	echo "";
}



//บันทึกการแก้ไข CSR -------------------------
if ($action=="edit_csr") {
	
	$csr_id=$_POST['csr_id'];
	
	$quotation_no=$_POST['quotation_no'];
	$invoice_no=$_POST['invoice_no'];
	$code_sale=$_POST['sale_code'];
	$contact_name=addslashes($_POST['contact_name']);
	$cert_for=addslashes($_POST['cert_for']);
	$address=addslashes($_POST['address']);
	//$fax=addslashes($_POST['fax']);
	//$telephone=addslashes($_POST['telephone']);
	
	$customer_id=$_POST['customer_id'];	
	$department_id=$_POST['department_id'];
	
	$status=$_POST['on_status'];
	
	$item_array_id=$_POST['item_array_id'];
	$item_serial=$_POST['item_serial'];
	$item_id_no=$_POST['item_id_no'];
	
	$description='';	
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	$sql2=" UPDATE "._TB_CSR." 
				SET
					code_sale='$code_sale',
					quotation_no='$quotation_no', 
					invoice_no='$invoice_no',
					contact_name='$contact_name',
					cert_for='$cert_for',
					address='$address',					
					update_dttm=NOW(),
					customer_id='$customer_id',
					department_id='$department_id',
					status='$status',
					create_person='$create_person'
				WHERE id='$csr_id' 
				LIMIT 1; 
	";
	
	$re2 = mysql_query($sql2);
	
	if ($re2) { 
		
			$num_item_array=count($item_array_id);
			if ($num_item_array>0) {
					for ($j=0;$j<$num_item_array;$j++) {
						
						$item_id2=$item_array_id[$j];
						$item_serial2=$item_serial[$j];
						$item_id_no2=$item_id_no[$j];
						
						mysql_query("UPDATE "._TB_ITEM." SET  serial_no='$item_serial2', id_no='$item_id_no2', quotation_no='$quotation_no', invoice_no='$invoice_no' WHERE id='$item_id2' LIMIT 1; ");
						
					} //for
			}
		echo ""; 
	} else { echo "101"; }
}



//ลบ item ใน list ที่เลือก
if ($action=='delete_item_list') {
	$item_check=$_POST['item_chk'];
	$n_item=count($item_check);

	if($n_item>0){  
				//$arr_delete=array();
				foreach($item_check as $key=>$value){ 
					//$arr_delete[]=$value;
					mysql_query("UPDATE "._TB_ITEM." SET publish='0' WHERE id='$value' LIMIT 1; ");
				}
				//$_SESSION['ss_select_item_id']=array_diff($_SESSION['ss_select_item_id'],$arr_delete);				
	}  
	echo "";
}



//ลบ CSR
if ($action=='delete-csr') {
	$id=$_POST['id'];
	$SQL="UPDATE "._TB_CSR." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="102";
	} 
	echo $error;
}

//Cancel CSR
if ($action=='cancel-csr') {
	$id=$_POST['id'];
	$SQL="UPDATE "._TB_CSR." SET publish='2' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="102";
	} 	
	
	echo $error;
}




$db->close();
?>