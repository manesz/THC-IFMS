<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 12/9/2558
 * Time: 10:44 น.
 */
include("check-permission.php"); 


$id=$_GET['id'];


if (isset($_GET['id']) && $id!="") {
	
		$sql="SELECT * FROM "._TB_CSR." WHERE id='$id' AND publish<>'0' LIMIT 1; ";
		$re=mysql_query($sql);
		
		if (mysql_num_rows($re)>0) {
			
					$rs=mysql_fetch_array($re);
					
						$code_year=$rs['code_year'];
						$code_no=$rs['code_no'];
						$code_sale=$rs['code_sale'];
						
						$quotation_no=$rs['quotation_no'];
						$contact_name=stripslashes($rs['contact_name']);
						$cert_for=stripslashes($rs['cert_for']);
						
						$address=stripslashes($rs['address']);
						$fax=stripslashes($rs['fax']);
						$telephone=stripslashes($rs['telephone']);			
						
						$customer_id=$rs['customer_id'];
						$department_id=$rs['department_id'];
						$on_status=$rs['status'];
						
						$create_dttm=$rs['create_dttm'];
						
						$csr_code="$code_no/$code_year";			

						$customer_listbox=$db->customer_listbox($customer_id);
						
						
						$member_listbox=$db->member_listbox($code_sale,$db->department_id_from_code('MKT'));
						
						$department_listbox=$db->department_inout_lab_listbox($department_id);
						

						
					
	
				//Load item List
				$item_list='';
				$SQL="	SELECT 
								A.id, A.equipment_name, A.model, A.manufacturer, A.serial_no, A.id_no, A.customer_id,  A.update_dttm, A.publish, B.company_name 
							FROM "._TB_ITEM." AS A, "._TB_CUSTOMER." AS B
							WHERE A.customer_id = B.id 
							AND A.csr_id='".$id."'
							AND	A.publish<>'0' ";
				
				$re=mysql_query($SQL);
				$num_items=mysql_num_rows($re);
				
				if ($num_items>0) {
					$n=1;
					$item_list.='';
					while ($rs=mysql_fetch_array($re)) {
						$item_id=$rs['id'];
						$equipment_name=stripslashes($rs['equipment_name']);
						$manufacturer=stripslashes($rs['manufacturer']);
						$model=stripslashes($rs['model']);
						$serial_no=stripslashes($rs['serial_no']);
						$id_no=stripslashes($rs['id_no']);
						
						$company_name=stripslashes($rs['company_name']);
						$latest_update=$rs['update_dttm'];	
						
						$publish=$rs['publish'];
						
						$checkbox='<input type="checkbox" class="" name="item_chk[]" id="item_chk[]"  value="'.$item_id.'"> ';
						
						$td_bg='';
						$input_readonly='';
						$text_status='';
						if ($publish=='2') { //สถานะยกเลิก
							$td_bg=' style="background-color:#bbb"; ';
							$input_readonly=' readonly ';
							$text_status=' <span style="color:#f00;font-size:16px;">** ยกเลิก **</span>';
						}
						
						
						$item_list.='
								 <tr>
									 <td '.$td_bg.'>'.$checkbox.'</td>
									<td '.$td_bg.'>'.$n.'</td>
									<td '.$td_bg.'>'.$equipment_name.' '.$text_status.'</td>
									<td '.$td_bg.'>'.$manufacturer.'</td>
									<td '.$td_bg.'>'.$model.'</td>	
									<td '.$td_bg.'>
									<input type="hidden"  name="item_array_id[]" id="item_array_id[]" value="'.$item_id.'" >
									<input type="text"  name="item_serial[]" id="item_serial[]" value="'.$serial_no.'" size="10" '.$input_readonly.'>
									</td>	
									<td '.$td_bg.'><input type="text" name="item_id_no[]" id="item_id_no[]" value="'.$id_no.'" size="10" '.$input_readonly.'></td>					
									<td '.$td_bg.'>'.$company_name.'</td>
									<td '.$td_bg.'>
											<div class="dropdown">
											<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												จัดการ
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
												<li><a href="#" id="btn_clone" onclick="clone_item(\''.$item_id.'\',\''.htmlspecialchars("$equipment_name").'\'); return false;"><i class="fa fa-eye"> Clone</i></a></li>
												<li><a href="paper_item_description.php?id='.$item_id.'" target="_blank"><i class="fa fa-eye"> ดู</i></a></li>
												<li><a href="item-edit.php?id='.$item_id.'&return=add"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
												<li><a href="#" onclick="cancel_item(\''.$item_id.'\',\''.htmlspecialchars("$equipment_name").'\');return false;"><i class="fa fa-times" style="color: red;"> ยกเลิก</i></a></li>
												<li><a href="#" onclick="delete_item(\''.$item_id.'\',\''.htmlspecialchars("$equipment_name").'\');return false;"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
											</ul>
										</div>
									</td>					
								</tr>
						';
						$n++;
					} //end whiel				
				}//end if
		} //end if csr 

} else {
$db->close();
exit;	
}


include_once("header.php");
?>
<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <?php
    include_once("top-nav-bar.php");
    include_once("sidebar-menu.php");
    ?>
    <section id="main-content">
        <section class="wrapper" style="">
            <div class="row" style="">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <h3><i class="fa fa-angle-right"></i> <a href="calibrate-service-list.php">รายการใบขอรับบริการสอบเทียบ</a> <i class="fa fa-angle-right"></i> สร้างใบขอรับบริการสอบเทียบ</h3>
                    </div>
                </div>
            </div><!-- /.row title -->

            <form class="form-horizontal" action="calibrate-service-script.php" id="frm" name="frm" method="post">

                <div class="row" style="">
                    <div class="col-lg-12">
                        <div class="content-panel col-lg-12">
                        
                        	  <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อพนักงานขาย</label>
                                <div class="col-lg-8">
                                   <select name="sale_code" id="sale_code" class="form-control">
											<?php echo $member_listbox; ?>
                                   </select>
                                </div>
                            </div>
                            
                           <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">วันที่สร้าง</label>
                                <div class="col-lg-8">
                                 <input type="text" name="create_date" id="create_date" value="<?php echo date("d-m-Y", strtotime($create_dttm)); ?>" class="form-control" /> (d-m-Y H:i:s)
                                </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">Quotation No.</label>
                                <div class="col-lg-8">
                                    <input type="text" name="quotation_no" id="quotation_no" class="form-control" value="<?php echo $quotation_no ?>">
                                </div>
                            </div>
                            
                                <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">Lab</label>
                                <div class="col-lg-8">
                                		 <select class="selectBox js-states form-control" name="department_id" id="department_id">
                                        <option value="">-- โปรดเลือก --</option>
                                        <?php echo $department_listbox; ?>
                                    </select>
                                </div>
                            </div>
                            
                                  <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">Status<span style="color:red;">*</span></label>
                                <div class="col-lg-8">
                                		 <select class="selectBox js-states form-control" name="on_status" id="on_status">
                                        <option value="">-- โปรดเลือก --</option> 
                                        <option value="1" <?php echo ($on_status== '1' ? ' selected ' : ''); ?>>In-Lab</option>
                                        <option value="2" <?php echo ($on_status== '2' ? ' selected ' : ''); ?>>On-Site</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <hr />
                            
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อผู้ติดต่อ</label>
                                <div class="col-lg-8">
                                   <input type="text" name="contact_name" id="contact_name" class="form-control" value="<?php echo $contact_name; ?>">
                                </div>
                            </div>
                            
                              <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อบริษัท</label>
                                <div class="col-lg-8">
                                       <select class="selectBox js-states form-control" id="customer_id" name="customer_id">
                                          <!--option value="">-- โปรดเลือก --</option -->
                                            <?php echo $customer_listbox; ?>
                                        </select>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
				            <div class="row" style="margin-top:10px;">                          
                                <div class="col-md-12">
                                    <div class="col-md-12" id="box_comapny_info"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                          
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">Cert สำหรับ </label>
                                <div class="col-lg-8">
                                    <input type="text" name="cert_for" id="cert_for" class="form-control" value="<?php echo $cert_for; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ที่อยู่</label>
                                <div class="col-lg-8"><input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>"></div>
                            </div>
                            
                             <div class="clearfix"></div>
                            <hr />
                         <br /><br />

                            <div class="clearfix form-group col-sm-12 col-md-12" style="float: right; text-align: right;">
                                 <button class="btn btn-primary col-lg-4" role="button" type="button" style="float: right; text-align: center;" id="btn_add_item">เพิ่มอุปกรณ์</button>
                            </div><!-- /hidden button -->
                            <div id="itemDescription" style="margin-top: 20px;"><!-- itemDescription tab -->

                                <h4>รายการอุปกรณ์ทั้งหมด</h4>
                                 <?php 
								 if ($num_items>0) {
									echo '<div class="col-lg-6"><button class="btn btn-danger" type="submit" id="btn_delete_item" name="btn_delete_item">ลบอุปกรณ์</button></div>';
								 }
								 ?>
									<table id="itemList" class="table table-bordered table-striped table-responsive">
										<thead>
											<th width="30"><input type="checkbox" class="" name="select_all_1" id="select_all_1"></th>
											<th width="30">#</th>
											<th width="500">ชื่ออุปกรณ์</th>
											<th width="80">Manufacturer</th>
											<th width="80">Model</th>
											<th width="80">Serial</th>
											<th width="80">ID No.</th>
											<th width="300">Customer</th>
											<th width="100">Action</th>
										</thead>
										<tbody>
										 <?php echo $item_list; ?>
										</tbody>
									</table>


                            </div>

                        </div><!-- /content-panel col-lg-12 -->
                    </div><!-- /col-lg-12 -->
                </div><!-- /.row -->

                <div class="row" style="">
                    <div class="col-lg-12">
                        <div class="content-panel col-lg-12">
                            <div class="form-group" style="padding: 0; margin: 0;">
                             	<input type="hidden" name="act" id="act" value="">
                                <input type="hidden" name="csr_id" id="csr_id" value="<?php echo $id; ?>" />
                                <button type="submit" id="btn_save_csr" name="btn_save_csr" class="btn btn-success btn-lg col-md-6" style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูล</button>
                            	<button type="button" class="btn btn-default btn-lg col-md-3" style="float: right; margin: 0 5px 0 5px;" onclick="window.location.href=window.location.href">เคลียร์ข้อมูล</button>
                                
                            </div>
                        </div>
                    </div>
                </div><!-- /.row title -->

            </form><!-- /form -->

        </section><!-- /.wrapper -->
    </section><!-- /#main-content -->
</section><!-- /#container -->

<?php include_once("footer.php"); ?>
<!--script for this page-->
<script src="libs/js/jquery.dataTables.min.js"></script>
<script src="libs/js/dataTables.bootstrap.min.js"></script>

<script src="libs/js/jquery.form.js"></script>

<script>
$(document).ready(function() {
	
		$(".alert").hide();	
		select_all();
		
		$("#customer_id").change(function() {
				var id=$(this).val();
				get_customer_info(id);
		});
			
		get_customer_info("<?php echo $customer_id; ?>");
		
		
		$("#btn_add_item").click(function() {
			window.location.href="item-add.php?return=edit&csrid=<?php echo $id; ?>";		
		});
		
		
		//Remove item
		$("#btn_delete_item").click(function() {
			
			var chk=confirm("คำเตือน!!\nItem จะถูกลบออกจาก CSR ทันที\nโปรดยืนยันการลบ Items  ");
			
			if (chk) {
					$("#act").val("delete_item_list");					
					$('#frm').ajaxForm( 
					{ 
							beforeSubmit: validate,
							complete: function(xhr) {
									var result=xhr.responseText;
									window.location.href=window.location.href;
							}
					}); 
			} else {
				return false;	
			}
				//	return false;
		});		
		
		
		//Edit CSR
		$("#btn_save_csr").click(function() {
					$("#act").val("edit_csr");
				
					$('#frm').ajaxForm( 
					{ 
							beforeSubmit: validate_edit_csr,
							complete: function(xhr) {
									var result=xhr.responseText;
									if (result=="") {
										
										window.location.href="calibrate-service-list.php";
										
									} else {
										alert("เกิดข้อผิดพลาด!\n"	+result);
									}
									
							}
					}); 
					
				//	return false;
		});
});
	



function clone_item(id,item_name) {
	var clone_qty=prompt("ใส่จำนวนที่ต้องการ CLONE Item ["+item_name+"]","1");
	
	if (clone_qty && !IsNumber(clone_qty)) {
			alert("กรุณาใส่จำนวนที่ต้องการ Clone เป็นตัวเลข!!");		
			clone_item(id,item_name);	
	}  else if (clone_qty>0) {		
			
		$.post("item-script.php",{'act':'clone-item','id':id,'clone_qty':clone_qty},function(data) {
			if (data=="") {
				//window.location.href = window.location.href;	
				window.location.href='calibrate-service-edit.php?id=<?php echo $id; ?>';
			} else {
				alert("เกิดข้อผิดพลาด!!.");	
			}
		});
		
	}
}
	
function validate(formData, jqForm, options) {		
	  if ($('input[name^=item_chk]:checked').length <= 0) {
		alert("โปรดเลือก Item ที่ต้องการ");
		return false;	
	 } 
};

function validate_edit_csr(formData, jqForm, options) {		
	  if ($('#quotation_no').val() == "") {
		alert("กรุณาเลือก Quotation No.");
		$("#quotation_no").focus();
		return false;	
	  } else if ($('#contact_name').val() == "") {
		alert("กรุณาใส่ชื่อผู้ติดต่อ");
		$("#contact_name").focus();
		return false;	
	  } else if ($('#sale_code').val() == "") {
			alert("กรุณาระบุชื่อพนักงานขาย");
			$("#sale_code").focus();
			return false;	
	} else if ($('#customer_id').val() == "") {
			alert("กรุณาเลือกบริษัท");
			$("#customer_id").focus();
			return false;		
	} else {
		
		var flag_serial=true;
		$('input[name^="item_serial"]').each(function() {
				if ($(this).val()=="") {
					flag_serial=false;						
				}
		});	
		
		var flag_id=true;
		$('input[name^="item_id_no"]').each(function() {
				if ($(this).val()=="") {
					flag_id=false;						
				}
		});	
		
				
			if (!flag_serial && !flag_id) {
				alert("กรุณาระบุ Serial และ ID No. ให้ครบถ้วน");
				return false;	
			}	else if (!flag_serial && flag_id) {
				alert("กรุณาระบุ Serial ให้ครบถ้วน");
				return false;	
			} else if (flag_serial && !flag_id) {
				alert("กรุณาระบุ ID No. ให้ครบถ้วน");
				return false;	
			}
			
	}
	 
	 
};

function select_all() {
		$('#select_all_1,#select_all_2').change(function() {
			var checkboxes = $(this).closest('form').find(':checkbox');
			if($(this).is(':checked')) {
				checkboxes.prop('checked', true);
			} else {
				checkboxes.prop('checked', false);
			}
		});	
}

//Customer info
function get_customer_info(id) {
		if (id!="") {
			$.post("item-script.php", {'act':'get_customer_info','id':id},function(data) {
				$("#box_comapny_info").html(data);
			});
		} else {
			$("#box_comapny_info").html('')	;
		}
}


/*
function delete_item(id,txt) {
	var chk=confirm("คำเตือน !! Item จะถูกลบออกจาก CSR ทันที\nกรุณายืนยันการลบ Item ["+txt+"] ");
	if (chk) {
		$.post("item-script.php",{'act':'delete_item_id','id':id},function(data) {
			window.location.href=window.location.href;
		});
	} else {
		return false;
	}	
}*/


function delete_item(id, title) {
var chk=confirm("คำเตือน!!\nอุปกรณ์นี้จะถูกลบถาวร และเลขที่อุปกรณ์นี้จะถูกแทนที่เมื่อมีการเพิ่มอุปกรณ์ใหม่\n\nโปรดยืนยันการลบอุปกรณ์ [ "+title+" ] !!\n\n");
	if (chk) {
		$.post("item-script.php",{'act':'delete_item_id','id':id},function(data) {
			window.location.href='calibrate-service-edit.php?id=<?php echo $id; ?>';
		});
	} else { return false; }
}

function cancel_item(id, title) {
var chk=confirm("โปรดยืนยันการยกเลิกอุปกรณ์ [ "+title+" ] !!\n\n");
	if (chk) {
		$.post("item-script.php",{'act':'cancel-item','id':id},function(data) {
			window.location.href='calibrate-service-edit.php?id=<?php echo $id; ?>';
		});
	} else { return false; }
}

</script>
