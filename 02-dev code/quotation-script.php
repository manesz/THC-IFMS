<?php
include("check-permission.php");

$db = new db_class();
$action=$_POST['act'];

$error=""; //no-error

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
                    <th width="30"><input type="checkbox" class=""/></th>
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
				
			//	$array_select_id=array();											
				foreach($item_check as $key=>$value){ 		
				//	$array_select_id[]=$value;
				//	$_SESSION['ss_select_item_id']=array_push($_SESSION['ss_slect_item_id'],$value);
					$_SESSION['ss_select_item_id'][]=$value;
				}
	}  		
	echo "";
}

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

if ($action=="add_new_quotation") {
	echo "SSSSSSSSSSSSSSSSSS";	
}

//ดึง item เฉพาะที่เลือก --------------------------------
if ($action=='display_select_item') {
	
	$item_list='';
	
	if (isset($_SESSION['ss_select_item_id']) && count($_SESSION['ss_select_item_id'])>0) {
		
		$ids=join(',',$_SESSION['ss_select_item_id']);
		$condition=" AND id IN ($ids) ";
	

					$SQL="	SELECT id, equipment_name, model, id_no, manufacturer, description, serial_no,  update_dttm
								FROM "._TB_ITEM."
								WHERE  publish='1' $condition  ";
					
					$re=mysql_query($SQL);
					$num=mysql_num_rows($re);
					
					if ($num>0) {
						$item_list.=' <table id="requestList" class="table table-bordered table-striped table-responsive" style="width: 100%; margin: 10px 0 20px 0;"><!-- item content -->
																		<thead>
																			<td class="text-center" width="30"><input type="checkbox" class=""/></td>
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
										$latest_update=$rs['update_dttm'];	
										
										
										if ($serial_no!="" && $id_no!="") { $Serial="$serial_no<br>$id_no"; }
										elseif ($serial_no!="" && $id_no=="") { $Serial="$serial_no"; }
										elseif ($serial_no=="" && $id_no!="") { $Serial="$id_no"; }
										else { $Serial="-"; }
										
										$Qty="-";
										$Status="";
										
										$checkbox='<input type="checkbox" class="" name="item_chk[]" id="item_chk[]"  value="'.$item_id.'"> ';
										
										$item_list.='
												 <tr>
													 <td>'.$checkbox.'</td>											
													<td>'.$equipment_name.' </td>
													<td>'.$manufacturer.'</td>
													<td>'.$model.'</td>					
													<td>'.$Serial.'</td>
													<td>'.$Qty.'</td>
													<td>'.$Status.'</td>											
													<td>'.$latest_update.'</td>					
												</tr>
										';
							
						} //end whiel
						
						$item_list.='</tbody></table>';
						
					}
	} else {
		unset($_SESSION['ss_select_item_id']);
	}
	echo $item_list;
}

/*
if ($action=='add_item') {
	$ss_item_id=''; //for session id
	$item_list='';
	$item_check=$_POST['item_chk'];
	$n_item=count($item_check);
	
	if($n_item>0){  
		$i=1;
		if (!isset($_SESSION['ss_select_item_id'])) {
			$array_select_id=array();
			$_SESSION['ss_select_item_id']=array();	
		}
		$item_list.=' <table id="requestList" class="table table-bordered table-striped table-responsive" style="width: 100%; margin: 10px 0 20px 0;"><!-- item content -->
														<thead>
															<td class="text-center" width="30"><input type="checkbox" class=""/></td>
															<td class="text-center height-50 bg-fafafa" style="width: 350px;">Description</td>
															<td class="text-center height-50 bg-fafafa" style="width: 150px;">Manufacturer</td>
															<td class="text-center height-50 bg-fafafa" style="width: 80px;">Model</td>
															<td class="text-center height-50 bg-fafafa" style="width: 80px;">S/N or ID No.</td>
															<td class="text-center height-50 bg-fafafa" style="width: 60px;">Quantity</td>
															<td class="text-center height-50 bg-fafafa" style="width: 80px;">Status</td>
															<td class="text-center height-50 bg-fafafa" style="width: 80px;">ISO 17025<br/>Accredited</td>
														</thead>
														<tbody>';
														
		foreach($item_check as $key=>$value){ 			
						$SQL="	SELECT id, equipment_name, model, id_no, manufacturer, description, serial_no,  update_dttm
									FROM "._TB_ITEM."
									WHERE  id='$value' AND publish='1' ";
						
						$re=mysql_query($SQL);
						$num=mysql_num_rows($re);
						
						if ($num>0) {
									
									$rs=mysql_fetch_array($re);
										$item_id=$rs['id'];
										$equipment_name=stripslashes($rs['equipment_name']);
										$manufacturer=stripslashes($rs['manufacturer']);
										$model=stripslashes($rs['model']);
										$description=stripslashes($rs['description']);
										$id_no=stripslashes($rs['id_no']);		
										$serial_no=stripslashes($rs['serial_no']);		
										$latest_update=$rs['update_dttm'];	
										
										
										if ($serial_no!="" && $id_no!="") { $Serial="$serial_no<br>$id_no"; }
										elseif ($serial_no!="" && $id_no=="") { $Serial="$serial_no"; }
										elseif ($serial_no=="" && $id_no!="") { $Serial="$id_no"; }
										else { $Serial="-"; }
										
										$Qty="-";
										$Status="";
										
										$checkbox='<input type="checkbox" class="" name="item_chk[]" id="item_chk[]"  value="'.$item_id.'"> ';
										
										$item_list.='
												 <tr>
													 <td>'.$checkbox.'</td>											
													<td>'.$description.' </td>
													<td>'.$manufacturer.'</td>
													<td>'.$model.'</td>					
													<td>'.$Serial.'</td>
													<td>'.$Qty.'</td>
													<td>'.$Status.'</td>											
													<td>'.$latest_update.'</td>					
												</tr>
										';
										
								//$ss_item_id.="$item_id".($i<$n_item ? "," : '');
								$array_select_id[]=$item_id;
									
						}//end num >0 
					$i++;
			
		}  //end for is   
		
		$item_list.='</tbody></table>';
		
		
	}  	//end count item_check>0
	
	$_SESSION['ss_select_item_id'] = array_unique($array_select_id);	
	
	echo $item_list;
}
*/

$db->close();
?>