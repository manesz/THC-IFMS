<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error
if ($action=='add') {
	
	$company_name=addslashes($_POST['company_name']);	
	$company_address=addslashes($_POST['company_address']);	
	$tax_no=addslashes($_POST['tax_no']);
	$phone_no=addslashes($_POST['phone_no']);
	$fax_no=addslashes($_POST['fax_no']);
	$email=$_POST['email'];
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];

	$sql="	INSERT INTO "._TB_CUSTOMER." 
				(id, company_name, company_address, tax_no, phone_no, fax_no, email, create_dttm, update_dttm, publish, create_person) 
				VALUES (
					NULL, 
					'$company_name', 
					'$company_address', 
					'$tax_no', 
					'$phone_no', 
					'$fax_no', 
					'$email', 					
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