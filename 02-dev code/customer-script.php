<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error
if ($action=='get_contact_name') {
	$id=$_POST['id'];
	$contact_name='';
	$re=mysql_query("SELECT contact_name FROM "._TB_CUSTOMER." WHERE id='$id' LIMIT 1; ");	 
	if (mysql_num_rows($re)>0) {
		$rs=mysql_fetch_array($re);
		$contact_name=stripslashes($rs['contact_name']);
	}
	echo $contact_name;
}

if ($action=='add') {
	
	$company_name=addslashes($_POST['company_name']);	
	$company_address=addslashes($_POST['company_address']);	
	$tax_no=addslashes($_POST['tax_no']);
	$phone_no=addslashes($_POST['phone_no']);
	$fax_no=addslashes($_POST['fax_no']);
	$email=$_POST['email'];
	$contact_name=addslashes($_POST['contact_name']);
	
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];

	$sql="	INSERT INTO "._TB_CUSTOMER." 
				(id, company_name, company_address, tax_no, phone_no, fax_no, email, contact_name, create_dttm, update_dttm, publish, create_person) 
				VALUES (
					NULL, 
					'$company_name', 
					'$company_address', 
					'$tax_no', 
					'$phone_no', 
					'$fax_no', 
					'$email', 		
					'$contact_name',			
					NOW(), 
					NOW(), 			
					'$publish', 			
					'$create_person'
				) ";
	if (!$db->query($sql)) {
		$error="102";
	}

	echo $error;
}


if ($action=='edit') {	
	
	$id=$_POST['id'];		

	$company_name=addslashes($_POST['company_name']);	
	$company_address=addslashes($_POST['company_address']);	
	$tax_no=addslashes($_POST['tax_no']);
	$phone_no=addslashes($_POST['phone_no']);
	$fax_no=addslashes($_POST['fax_no']);
	$email=$_POST['email'];
	$contact_name=addslashes($_POST['contact_name']);
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	//id, company_name, company_address, tax_no, phone_no, fax_no, email, create_dttm, update_dttm, publish, create_person
	$SQL="UPDATE  "._TB_CUSTOMER." 
				SET  company_name = '$company_name',
						company_address = '$company_address',
						tax_no = '$tax_no',
						phone_no = '$phone_no',
						fax_no = '$fax_no', 
						email = '$email', 
						contact_name='$contact_name',
						update_dttm=NOW(),
						publish='$publish',
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
	$SQL="UPDATE "._TB_CUSTOMER." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="102";
	} 	
	echo $error;
}

$db->close();
?>