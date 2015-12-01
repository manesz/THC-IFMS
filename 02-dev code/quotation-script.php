<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error

if ($action=="add_new_quotation") {
	
	$contact_name=$_POST['contact_name'];
	$department_name=$_POST['department_name'];
	$position_name=$_POST['position_name'];
	$customer_id=$_POST['customer_id'];
	
	$description='';
	
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	
	//----Genelate Quotation No -------
	$code_sale=$_POST['sale_code'];
	$code_year=date("y");
	$code_month=date("m");
	
			//ตรวจสอบค่ามากสุดของ Quotation 
				$sql="	SELECT MAX(code_no) AS max_code FROM "._TB_QUOTATION." 
							WHERE code_sale='$code_sale' 
								AND code_year='$code_year' 
								AND code_month ='$code_month' 
						";
		
				$re=mysql_query($sql);
				$max_quotation_code =mysql_result($re,0);
				$new_quotation_no=($max_quotation_code+1);
	
	$code_no= str_pad($new_quotation_no,4,"0",STR_PAD_LEFT);
	$code_revise='';	
	
	//`id`, `code_sale`, `code_year`, `code_month`, `code_no`, `code_revise`, 
	//`contact_name`, `department_name`, `position_name`, `description`, `create_dttm`, `update_dttm`, `publish`, `customer_id`, `create_person`
	
	$sql2=" INSERT INTO "._TB_QUOTATION." (id, code_sale, code_year, code_month, code_no, code_revise, contact_name, department_name, position_name, description, create_dttm, update_dttm, publish, customer_id, create_person) 
				VALUES (
					NULL, 
					'$code_sale',
					'$code_year',
					'$code_month',
					'$code_no',
					'$code_revise',
					'$contact_name',
					'$department_name',
					'$position_name',
					'$description',
					NOW(),
					NOW(),
					'$publish',
					'$customer_id',
					'$create_person'
				) ";
	
	$re2 = mysql_query($sql2);
	
	if ($re2) {
		$quotation_id=mysql_insert_id();
			
			$items=$_POST['item_id'];
			$qtys=$_POST['item_qty'];
			$status=$_POST['is_status'];
			
			$n_item=count($items);

			if($n_item>0){  
					for ($i=0;$i<$n_item;$i++) {
						
									$item_id=$items[$i];
									$quantity=$qtys[$i];
									$Status=$status[$i];
									
									$sql3="	INSERT INTO "._TB_QUOTATION_ITEM." (quotation_id, item_id, quantity, is_status, create_dttm, update_dttm, publish, create_person) 
												VALUES ('$quotation_id', '$item_id', '$quantity', '$Status', NOW(), NOW(), '$publish', '$create_person') ";
									mysql_query($sql3);
						}
			}
	}
	
	echo "";
}


//บันทึกการแก้ไข Quotation -------------------------
if ($action=="edit_quotation") {
	
	$quotation_id=$_POST['quotation_id'];
	
	$code_sale=$_POST['sale_code'];		
	$contact_name=$_POST['contact_name'];
	$department_name=$_POST['department_name'];
	$position_name=$_POST['position_name'];
	$customer_id=$_POST['customer_id'];
	
	$description='';
	
	$publish='1';	
	$create_person=$_SESSION['ss_member_id'];
	
	$sql2=" UPDATE "._TB_QUOTATION." 
				SET
					code_sale='$code_sale',
					contact_name = '$contact_name',
					department_name='$department_name', 
					position_name='$position_name',
					description='$description',
					update_dttm=NOW(), 
					customer_id = '$customer_id',
					create_person = '$create_person'				
				WHERE id='$quotation_id' 
				LIMIT 1; 
	";
	$re2 = mysql_query($sql2);
	
	if ($re2) {
			//ลบ quotation item ของเก่าออกก่อน
			mysql_query("DELETE FROM "._TB_QUOTATION_ITEM." WHERE quotation_id='$quotation_id' ");
			
			$items=$_POST['item_id'];
			$qtys=$_POST['item_qty'];
			$status=$_POST['is_status'];
			$n_item=count($items);

			if($n_item>0){  
					for ($i=0;$i<$n_item;$i++) {
						
									$item_id=$items[$i];
									$quantity=$qtys[$i];
									$Status=$status[$i];
									
									$sql3="	INSERT INTO "._TB_QUOTATION_ITEM." (quotation_id, item_id, quantity, is_status, create_dttm, update_dttm, publish, create_person) 
												VALUES ('$quotation_id', '$item_id', '$quantity', '$Status', NOW(), NOW(), '$publish', '$create_person') ";
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

//ลบ item ใน list ที่เลือก
if ($action=='delete_item_list') {
	$item_check=$_POST['item_chk'];
	$n_item=count($item_check);

	if($n_item>0){  
				
				$arr_delete=array();
				foreach($item_check as $key=>$value){ 
					$arr_delete[]=$value;
				}
				
				$_SESSION['ss_select_item_id']=array_diff($_SESSION['ss_select_item_id'],$arr_delete);				
	}  
	echo "";
}

//ลบใบ quotation
if ($action=='delete') {
	$id=$_POST['id'];
	$SQL="UPDATE "._TB_QUOTATION." SET publish='0' WHERE id='$id' LIMIT 1; ";
	if (!mysql_query($SQL)) {
			$error="102";
	} 	
	echo $error;
}



//ดึง item เฉพาะที่เลือก --------------------------------
if ($action=='display_select_item') {
	
	$item_list='';
	$quotation_id=$_POST['quotation_id'];
	
	
	if (isset($_SESSION['ss_select_item_id']) && count($_SESSION['ss_select_item_id'])>0) {
		
		$ids=join(',',$_SESSION['ss_select_item_id']);
		$condition=" AND id IN ($ids) ";
	

					$SQL="	SELECT id, equipment_name, model, id_no, manufacturer, description, serial_no,  update_dttm
								FROM "._TB_ITEM."
								WHERE  publish='1' $condition  ";
					
					$re=mysql_query($SQL);
					$num=mysql_num_rows($re);
					
					if ($num>0) {
						$i=0;
						$item_list.=' <table id="requestList" class="table table-bordered table-striped table-responsive" style="width: 100%; margin: 10px 0 20px 0;"><!-- item content -->
																		<thead>
																			<td class="text-center" width="30"><input type="checkbox" name="select_all_2" id="select_all_2"></td>
																			<td class="text-center height-50 bg-fafafa" style="width: 350px;">Description</td>
																			<td class="text-center height-50 bg-fafafa" style="width: 150px;">Manufacturer</td>
																			<td class="text-center height-50 bg-fafafa" style="width: 80px;">Model</td>
																			<td class="text-center height-50 bg-fafafa" style="width: 80px;">S/N or ID No.</td>
																			<td class="text-center height-50 bg-fafafa" style="width: 60px;">Quantity</td>
																			<td class="text-center height-50 bg-fafafa" style="width: 80px;">Status</td>
																			<td class="text-center height-50 bg-fafafa" style="width: 80px;">ISO 17025<br/>Accredited</td>
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
										$latest_update=$rs['update_dttm'];	
										
									
										$ISO=($iso017025=='1' ? 'YES' : '-');
										
										
										if ($serial_no!="" && $id_no!="") { $Serial="$serial_no<br>$id_no"; }
										elseif ($serial_no!="" && $id_no=="") { $Serial="$serial_no"; }
										elseif ($serial_no=="" && $id_no!="") { $Serial="$id_no"; }
										else { $Serial="-"; }
										
									
										$quantity='';
										$is_status='';
										if ($quotation_id!="") {
											//ดึงจำนวน
											$re4 = mysql_query("SELECT quantity, is_status FROM "._TB_QUOTATION_ITEM." WHERE quotation_id='$quotation_id' AND item_id='$item_id' AND publish='1' LIMIT 1; ");
											if (mysql_num_rows($re4)>0) {
												$rs4=mysql_fetch_array($re4);
												$quantity=$rs4['quantity'];	
												$is_status=$rs4['is_status'];	
											}
										}
										
										$checkbox='<input type="checkbox" class="" name="item_chk[]" id="item_chk[]"  value="'.$item_id.'"> ';
										
										$quotation='<input type="input"  class="form-control" name="item_qty[]" id="item_qty[]"  value="'.$quantity.'">';
										$quotation.='<input type="hidden"  class="form-control" name="item_id[]" id="item_id[]"  value="'.$item_id.'">';		
										
										$Status='<select name="is_status[]" id="is_status[]" class="form-control">
															<option value="">โปรดเลือก</option>
															<option value="i" '.($is_status=='i' ? ' selected ' : '').'>InLab</option>
															<option value="o" '.($is_status=='o' ? ' selected ' : '').'>Onsite</option>
													</select>';								
										
										$item_list.='
												 <tr>
													 <td>'.$checkbox.'</td>											
													<td>'.$equipment_name.' </td>
													<td>'.$manufacturer.'</td>
													<td>'.$model.'</td>					
													<td>'.$Serial.'</td>
													<td>'.$quotation.'</td>
													<td>'.$Status.'</td>											
													<td class="text-center">'.$ISO.'</td>					
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
if ($action=='load_edit_quotation_item') {
	//ดึง item ใน Quotation มาก่อนแล้วใส่ไปใน Session	
	$quotation_id=$_POST['id'];	

	$txt='';
	$sql="SELECT item_id, quantity FROM "._TB_QUOTATION_ITEM." WHERE quotation_id='$quotation_id' AND publish = '1' ORDER BY item_id ";
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


$db->close();
?>