<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error

<<<<<<< HEAD
if ($action=='session_keep_data') {
	
		$_SESSION['ss_sale_code']=$_POST['sale_code'];
		$_SESSION['ss_create_date']=$_POST['create_date'];
		$_SESSION['ss_quotation_no']=$_POST['quotation_no'];
		$_SESSION['ss_department_id']=$_POST['department_id'];
		$_SESSION['ss_on_status']=$_POST['on_status'];
		
		
		$_SESSION['ss_contact_name']=$_POST['contact_name'];
		$_SESSION['ss_customer_id']=$_POST['customer_id'];
		
		$_SESSION['ss_cert_for']=$_POST['cert_for'];
		$_SESSION['ss_address']=$_POST['address'];
		
		
		
		
		
						
}

if ($action=="add_new_csr") {
	
	$quotation_no=$_POST['quotation_no'];
=======
if ($action=="add_new_csr") {
	
	$quotation_id=$_POST['quotation_id'];
>>>>>>> origin/master
	$code_sale=$_POST['sale_code'];
	$contact_name=addslashes($_POST['contact_name']);
	$cert_for=addslashes($_POST['cert_for']);
	$address=addslashes($_POST['address']);
<<<<<<< HEAD
	
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
=======
	$fax=addslashes($_POST['fax']);
	$telephone=addslashes($_POST['telephone']);
	
	$customer_id=$_POST['customer_id'];
	$description='';
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
>>>>>>> origin/master

	
	//----Genelate CSR No -------
	
	$code_year=date("y");
	
			//ตรวจสอบค่ามากสุดของ Quotation 
				$sql="	SELECT MAX(code_no) AS max_code FROM "._TB_CSR." 
							WHERE code_year='$code_year' 
						";
		
				$re=mysql_query($sql);
				$max_csr_code =mysql_result($re,0);
				$new_csr_no=($max_csr_code+1);
	
<<<<<<< HEAD
				$code_no= str_pad($new_csr_no,6,"0",STR_PAD_LEFT);
	
	
	$sql2=" INSERT INTO "._TB_CSR." (id, code_no, code_year, code_sale, quotation_no, contact_name, cert_for, address,  create_dttm, update_dttm, publish, customer_id, department_id, session_csr, status, create_person) 
=======
	$code_no= str_pad($new_csr_no,5,"0",STR_PAD_LEFT);
	
	//`id`, `code_no`, `code_year`, `code_sale`, `quotation_id`, `contact_name`, `cert_for`, `address`, `fax`, `telephone`, `create_dttm`, `update_dttm`, `publish`, `customer_id`, `create_person`
	
	$sql2=" INSERT INTO "._TB_CSR." (id, code_no, code_year, code_sale, quotation_id, contact_name, cert_for, address, fax, telephone, create_dttm, update_dttm, publish, customer_id, create_person) 
>>>>>>> origin/master
				VALUES (
						NULL,
						'$code_no',
						'$code_year',
						'$code_sale',
<<<<<<< HEAD
						'$quotation_no',
						'$contact_name',
						'$cert_for',
						'$address',						
=======
						'$quotation_id',
						'$contact_name',
						'$cert_for',
						'$address',
						'$fax',
						'$telephone',
>>>>>>> origin/master
						NOW(),
						NOW(),
						'$publish',
						'$customer_id',
<<<<<<< HEAD
						'$department_id',
						'$session_csr',
						'$status',
=======
>>>>>>> origin/master
						'$create_person'
				) ";
	
	$re2 = mysql_query($sql2);
	
	if ($re2) {
<<<<<<< HEAD
		
		$new_csr_id=mysql_insert_id();
		$num_item_array=count($item_array_id);
		if ($num_item_array>0) {
				for ($j=0;$j<$num_item_array;$j++) {
					
					$item_id2=$item_array_id[$j];
					$item_serial2=$item_serial[$j];
					$item_id_no2=$item_id_no[$j];
					
					mysql_query("UPDATE "._TB_ITEM." SET  serial_no='$item_serial2', id_no='$item_id_no2', quotation_no='$quotation_no', csr_id='$new_csr_id' WHERE id='$item_id2' LIMIT 1; ");
					
				} //for
		}
		
	}
	
	unset($_SESSION['session_CSR']);	
	unset(
			$_SESSION['ss_sale_code'],
			$_SESSION['ss_create_date'],
			$_SESSION['ss_quotation_no'],
			$_SESSION['ss_department_id'],
			$_SESSION['ss_on_status'],
			$_SESSION['ss_contact_name'],
			$_SESSION['ss_customer_id'],
			$_SESSION['ss_cert_for'],
			$_SESSION['ss_address']
	);
	
		
=======
		//add เข้า csr item	
		$csr_id=mysql_insert_id();
			
			$items=$_POST['item_id'];
			$n_item=count($items);

			if($n_item>0){  
					for ($i=0;$i<$n_item;$i++) {
						
									$item_id=$items[$i];
									$quantity=$qtys[$i];
									$Status=$status[$i];
									
									//`csr_id`, `item_id`, `quotation_id`, `is_status`, `create_dttm`, `update_dttm`, `publish`, `create_person`
									
									$sql3= " INSERT INTO "._TB_CSR_ITEM." (csr_id, item_id, quotation_id, create_dttm, update_dttm, publish, create_person) 
												 VALUES ('$csr_id', '$item_id', '$quotation_id',  NOW(), NOW(), '$publish', '$create_person')
											  ";
									mysql_query($sql3);
						}
			}
	}
	
>>>>>>> origin/master
	echo "";
}


<<<<<<< HEAD

=======
>>>>>>> origin/master
//บันทึกการแก้ไข CSR -------------------------
if ($action=="edit_csr") {
	
	$csr_id=$_POST['csr_id'];
	
<<<<<<< HEAD
	$quotation_no=$_POST['quotation_no'];
=======
	$quotation_id=$_POST['quotation_id'];
>>>>>>> origin/master
	$code_sale=$_POST['sale_code'];
	$contact_name=addslashes($_POST['contact_name']);
	$cert_for=addslashes($_POST['cert_for']);
	$address=addslashes($_POST['address']);
<<<<<<< HEAD
	//$fax=addslashes($_POST['fax']);
	//$telephone=addslashes($_POST['telephone']);
	
	$customer_id=$_POST['customer_id'];	
	$department_id=$_POST['department_id'];
	
	$status=$_POST['on_status'];
	
	$item_array_id=$_POST['item_array_id'];
	$item_serial=$_POST['item_serial'];
	$item_id_no=$_POST['item_id_no'];
	
=======
	$fax=addslashes($_POST['fax']);
	$telephone=addslashes($_POST['telephone']);
	
	$customer_id=$_POST['customer_id'];	
>>>>>>> origin/master
	$description='';	
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	$sql2=" UPDATE "._TB_CSR." 
				SET
					code_sale='$code_sale',
<<<<<<< HEAD
					quotation_no='$quotation_no', 
					contact_name='$contact_name',
					cert_for='$cert_for',
					address='$address',					
					update_dttm=NOW(),
					customer_id='$customer_id',
					department_id='$department_id',
					status='$status',
=======
					quotation_id='$quotation_id', 
					contact_name='$contact_name',
					cert_for='$cert_for',
					address='$address',
					fax='$fax',
					telephone='$telephone',
					update_dttm=NOW(),
					customer_id='$customer_id',
>>>>>>> origin/master
					create_person='$create_person'
				WHERE id='$csr_id' 
				LIMIT 1; 
	";
	
	$re2 = mysql_query($sql2);
	
<<<<<<< HEAD
	if ($re2) { 
		
			$num_item_array=count($item_array_id);
			if ($num_item_array>0) {
					for ($j=0;$j<$num_item_array;$j++) {
						
						$item_id2=$item_array_id[$j];
						$item_serial2=$item_serial[$j];
						$item_id_no2=$item_id_no[$j];
						
						mysql_query("UPDATE "._TB_ITEM." SET  serial_no='$item_serial2', id_no='$item_id_no2', quotation_no='$quotation_no' WHERE id='$item_id2' LIMIT 1; ");
						
					} //for
			}
		echo ""; 
	} else { echo "101"; }
}


=======
	
	if ($re2) {
			//ลบ CSR item ของเก่าออกก่อน
			mysql_query("DELETE FROM "._TB_CSR_ITEM." WHERE csr_id='$csr_id' ");
			
			$items=$_POST['item_id'];
			$n_item=count($items);

			if($n_item>0){  
					for ($i=0;$i<$n_item;$i++) {						
									$item_id=$items[$i];	
									$sql3= " INSERT INTO "._TB_CSR_ITEM." (csr_id, item_id, quotation_id, create_dttm, update_dttm, publish, create_person) 
												 VALUES ('$csr_id', '$item_id', '$quotation_id',  NOW(), NOW(), '$publish', '$create_person') ";
									mysql_query($sql3);
						}
			}
	}
	
	echo "";
}


if ($action=='load_all_item_list') {
	//Item ------------------
	$item_list='';
	
	if (isset($_SESSION['ss_select_item_id'])) {
		$ids=join(',',$_SESSION['ss_select_item_id']);
		$condition=" AND A.id NOT IN ($ids) ";
	}
	
	
	$SQL="	SELECT 
					A.id, A.equipment_name, A.model, A.manufacturer, A.customer_id,  A.update_dttm, B.company_name 
				FROM "._TB_ITEM." AS A, "._TB_CUSTOMER." AS B
				WHERE A.customer_id = B.id 		
				$condition 
				AND	A.publish='1' ";
	
	$re=mysql_query($SQL);
	$num=mysql_num_rows($re);
	
	if ($num>0) {
		$item_list.='  <table id="itemList" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <th width="30"><input type="checkbox" class="" name="select_all_1" id="select_all_1"></th>
                    <th width="30">#</th>
                    <th width="500">ชื่ออุปกรณ์</th>
                    <th width="80">Manufacturer</th>
                    <th width="80">Model</th>
                    <th width="300">Customer</th>
                    <th width="100">last updated</th>
                    </thead>
                    <tbody>';
		while ($rs=mysql_fetch_array($re)) {
			$item_id=$rs['id'];
			$equipment_name=stripslashes($rs['equipment_name']);
			$manufacturer=stripslashes($rs['manufacturer']);
			$model=stripslashes($rs['model']);
			$company_name=stripslashes($rs['company_name']);		
			$latest_update=$rs['update_dttm'];	
			
			$checkbox='<input type="checkbox" class="" name="item_chk[]" id="item_chk[]"  value="'.$item_id.'"> ';
			
			$item_list.='
					 <tr>
						 <td>'.$checkbox.'</td>
						<td>'.$item_id.'</td>
						<td>'.$equipment_name.' </td>
						<td>'.$manufacturer.'</td>
						<td>'.$model.'</td>					
						<td>'.$company_name.'</td>
						<td>'.$latest_update.'</td>					
					</tr>
			';
			
		} //end whiel
		$item_list.='  </tbody>
                </table>';
	}
	echo $item_list;
}

if ($action=='add_item') {
	$item_check=$_POST['item_chk'];
	$n_item=count($item_check);
	
	if($n_item>0){  
				$i=1;
				
				if (!isset($_SESSION['ss_select_item_id'])) {					
					$_SESSION['ss_select_item_id']=array();	
				}
				
			
				foreach($item_check as $key=>$value){ 		
					$_SESSION['ss_select_item_id'][]=$value;
				}
	}  		
	echo "";
}
>>>>>>> origin/master

//ลบ item ใน list ที่เลือก
if ($action=='delete_item_list') {
	$item_check=$_POST['item_chk'];
	$n_item=count($item_check);

	if($n_item>0){  
<<<<<<< HEAD
				//$arr_delete=array();
				foreach($item_check as $key=>$value){ 
					//$arr_delete[]=$value;
					mysql_query("UPDATE "._TB_ITEM." SET publish='0' WHERE id='$value' LIMIT 1; ");
				}
				//$_SESSION['ss_select_item_id']=array_diff($_SESSION['ss_select_item_id'],$arr_delete);				
=======
				
				$arr_delete=array();
				foreach($item_check as $key=>$value){ 
					$arr_delete[]=$value;
				}
				
				$_SESSION['ss_select_item_id']=array_diff($_SESSION['ss_select_item_id'],$arr_delete);				
>>>>>>> origin/master
	}  
	echo "";
}

<<<<<<< HEAD


//ลบ CSR
if ($action=='delete-csr') {
=======
//ลบ CSR
if ($action=='delete') {
>>>>>>> origin/master
	$id=$_POST['id'];
	$SQL="UPDATE "._TB_CSR." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="102";
<<<<<<< HEAD
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


=======
	} 	
	echo $error;
}



//ดึง item เฉพาะที่เลือก --------------------------------
if ($action=='display_select_item') {
	
	$item_list='';
	$csr_id=$_POST['csr_id'];
	$quotation_code=$_POST['quotation_code'];
	
	
	if (isset($_SESSION['ss_select_item_id']) && count($_SESSION['ss_select_item_id'])>0) {
		
		$ids=join(',',$_SESSION['ss_select_item_id']);
		$condition=" AND id IN ($ids) ";
	

					$SQL="	SELECT id, equipment_name, model, id_no, manufacturer, description, serial_no,  calibration_point, cert_no, update_dttm
								FROM "._TB_ITEM."
								WHERE  publish='1' $condition  ";
					
					$re=mysql_query($SQL);
					$num=mysql_num_rows($re);
					
					if ($num>0) {
						$i=0;
						$item_list.=' <table id="requestList" class="table table-bordered table-striped table-responsive" style="width: 100%; margin: 10px 0 20px 0;"><!-- item content -->
																		<thead>
																			<td class="text-center" width="30"><input type="checkbox" name="select_all_2" id="select_all_2"></td>
																			<th class="text-center" style="width: 300px;">Description</th>
																			<th class="text-center" style="width: 100px;">Manufacturer</th>
																			<th class="text-center" style="width: 100px;">Model</th>
																			<th class="text-center" style="width: 120px;">Serial No.</th>
																			<th class="text-center" style="width: 100px;">ID No.</th>
																			<th class="text-center" style="width: 300px;">Calibration Point</th>
																			<th class="text-center" style="width: 100px;">Cert No.</th>
																			<th class="text-center" style="width: 100px;">Quotation</th>
																		</thead>
																		<tbody>';
						while ($rs=mysql_fetch_array($re)) {
										$item_id=$rs['id'];
										$equipment_name=stripslashes($rs['equipment_name']);
										$manufacturer=stripslashes($rs['manufacturer']);
										$model=stripslashes($rs['model']);
										$description=stripslashes($rs['description']);
										$id_no=stripslashes($rs['id_no']);		
										$serial_no=stripslashes($rs['serial_no']);	
										$iso017025=stripslashes($rs['iso017025']);	
										$calibration_point=stripslashes($rs['calibration_point']);	
										$cert_no=stripslashes($rs['cert_no']);	
										
										$latest_update=$rs['update_dttm'];	
										
									
										$ISO=($iso017025=='1' ? 'YES' : '-');
										
									/*
										$quantity='';
										$is_status='';
										if ($quotation_id!="") {
											//ดึงจำนวน
											$re4 = mysql_query("SELECT quantity, is_status FROM "._TB_CSR_ITEM." WHERE quotation_id='$quotation_id' AND item_id='$item_id' AND publish='1' LIMIT 1; ");
											if (mysql_num_rows($re4)>0) {
												$rs4=mysql_fetch_array($re4);
												$quantity=$rs4['quantity'];	
												$is_status=$rs4['is_status'];	
											}
										}
										$quotation='<input type="input"  class="form-control" name="item_qty[]" id="item_qty[]"  value="'.$quantity.'">';
										$Status='<select name="is_status[]" id="is_status[]" class="form-control">
															<option value="">โปรดเลือก</option>
															<option value="i" '.($is_status=='i' ? ' selected ' : '').'>InLab</option>
															<option value="o" '.($is_status=='o' ? ' selected ' : '').'>Onsite</option>
													</select>';	
										
										*/
										
										$checkbox='<input type="checkbox" class="" name="item_chk[]" id="item_chk[]"  value="'.$item_id.'"> ';
										$checkbox.='<input type="hidden"  class="form-control" name="item_id[]" id="item_id[]"  value="'.$item_id.'">';		
										
										$item_list.='
												 <tr>
													 <td>'.$checkbox.'</td>
													<td>'.$equipment_name.' </td>
													<td>'.$manufacturer.'</td>
													<td  class="text-center">'.($model !="" ? $model : '-').'</td>
													<td  class="text-center">'.($serial_no !="" ? $serial_no : '-').'</td>
													<td  class="text-center">'.($id_no!="" ? $id_no : '-').'</td>
													<td>'.($calibration_point!="" ? $calibration_point : '-').'</td>		
													<td class="text-center">'.($cer_no !="" ? $cert_no : '-').'</td>										
													<td class="text-center txt_quotation_code">'.$quotation_code.'</td>
												</tr>
										';
										
										$i++;
							
						} //end whiel
						
						$item_list.='</tbody></table>';
						
					}
	} else {
		unset($_SESSION['ss_select_item_id']);
	}
	echo $item_list;
}


//ดึง item เฉพาะที่เลือก (การแก้ไข) --------------------------------
if ($action=='load_edit_csr_item') {
	//ดึง item ใน CSR มาก่อนแล้วใส่ไปใน Session	
	$csr_id=$_POST['id'];	

	$txt='';
	$sql="SELECT item_id FROM "._TB_CSR_ITEM." WHERE csr_id='$csr_id' AND publish = '1' ORDER BY item_id ";
	$re=mysql_query($sql);
	$n_item=mysql_num_rows($re);

	if($n_item>0){ 
	
			if (!isset($_SESSION['ss_select_item_id'])) {	
				 $_SESSION['ss_select_item_id']=array();	
			}
				
			while ($rs=mysql_fetch_array($re)) {				
				$item_id=$rs['item_id'];
				$_SESSION['ss_select_item_id'][]=$item_id;
			} //end while
	}  
}
>>>>>>> origin/master


$db->close();
?>