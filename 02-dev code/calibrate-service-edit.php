<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 12/9/2558
 * Time: 10:44 น.
 */
include("check-permission.php"); 


$id=$_GET['id'];
unset($_SESSION['ss_select_item_id']);


if (isset($_GET['id']) && $id!="") {
	
		$sql="SELECT * FROM "._TB_CSR." WHERE id='$id' AND publish='1' LIMIT 1; ";
		$re=mysql_query($sql);
		
		if (mysql_num_rows($re)>0) {
					$rs=mysql_fetch_array($re);
					
						$code_year=$rs['code_year'];
						$code_no=$rs['code_no'];
						$code_sale=$rs['code_sale'];
						
						$quotation_id=$rs['quotation_id'];
						$contact_name=stripslashes($rs['contact_name']);
						$cert_for=stripslashes($rs['cert_for']);
						
						$address=stripslashes($rs['address']);
						$fax=stripslashes($rs['fax']);
						$telephone=stripslashes($rs['telephone']);			
						
						$customer_id=$rs['customer_id'];
						
						$csr_code="$code_no/$code_year";			

						$customer_listbox=$db->customer_listbox($customer_id);
						$quotation_listbox=$db->quotation_listbox($quotation_id);
						
						$department_id=$db->department_id_from_code('MKT');
						$member_listbox=$db->member_listbox($code_sale,$department_id);
						
					
		}

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
                                <label class="col-sm-12 col-md-4 control-label">Quotation No.</label>
                                <div class="col-lg-8">
                                    <select class="selectBox js-states form-control" id="quotation_id" name="quotation_id">
                                        <!-- option value="">-- โปรดเลือก --</option -->
                                        <?php echo $quotation_listbox; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อผู้ติดต่อ</label>
                                <div class="col-lg-8">
                                   <input type="text" name="contact_name" id="contact_name" class="form-control" value="<?php echo $contact_name; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อพนักงานขาย</label>
                                <div class="col-lg-8">
                                   <select name="sale_code" id="sale_code" class="form-control">
											<?php echo $member_listbox; ?>
                                   </select>
                                </div>
                            </div>
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
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">โทรสาร</label>
                                <div class="col-lg-8"><input type="text" name="fax" id="fax" class="form-control" value="<?php echo $fax; ?>"></div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">โทรศัพท์</label>
                                <div class="col-lg-8"><input type="text" name="telephone" id="telephone" class="form-control" value="<?php echo $telephone; ?>"></div>
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
                            <div class="col-lg-6" style="">
                               	<button class="btn btn-danger" type="submit" id="btn_delete_item" name="btn_delete_item">ลบอุปกรณ์</button>
                            </div>
                            
                            <div class="col-lg-12" style="">
                              	 <div id="box_select_item_list"></div>
                            </div>

                            <div class="clearfix form-group col-sm-12 col-md-12" style="float: right; text-align: right;">
                                  <button class="btn btn-primary col-lg-4" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="float: right; text-align: center;">
                    เพิ่มอุปกรณ์
                </button>
                            </div><!-- /hidden button -->
                            <div class="collapse" id="itemDescription" style="margin-top: 20px;"><!-- itemDescription tab -->

                                <h4>รายการอุปกรณ์ทั้งหมด</h4>
                                
    
                                
                                <button type="submit" id="btn_add_item1"  class="btn btn-success col-lg-12" style="margin: 0 0 20px 0;">บันทึกข้อมูลจำนวนอุปกรณ์</button>                                
                             	 <div id="box_all_item_list"></div>
                                 
                                <button type="submit" id="btn_add_item2"  class="btn btn-success col-lg-12" style="margin: 0 0 20px 0;">บันทึกข้อมูลจำนวนอุปกรณ์</button>

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
	$('#requestList').DataTable();
	$('#itemList').DataTable();
//        $("#departmentList_filter").add

		$(".alert").hide();	
		$("#btn_delete_item").hide();
		
		
		
		$("#customer_id").change(function() {
				var id=$(this).val();
				get_customer_info(id);
		});
		
		//load default item
		load_edit_csr_item();
		load_selected_item();
		load_all_item_list();			
		get_customer_info("<?php echo $customer_id; ?>");
		
		
		//add item 
		$("#btn_add_item1,#btn_add_item2").click(function() {
			if ($("#quotation_id").val()=="") {
				alert("กรุณาระบุ Quotation No.");
				return false;
			} else {			
					$("#act").val("add_item");
					$('#frm').ajaxForm( 
					{ 
							beforeSubmit: validate,
							complete: function(xhr) {
									var result=xhr.responseText;
									
										if (result=='') {							
												load_selected_item();		
												load_all_item_list();	
															
										}					
							}
					}); 
			}
				
		});
		
		//Remove item
		$("#btn_delete_item").click(function() {
					$("#act").val("delete_item_list");
					
					$('#frm').ajaxForm( 
					{ 
							beforeSubmit: validate,
							complete: function(xhr) {
									var result=xhr.responseText;
									load_selected_item();		
									load_all_item_list();	
							}
					}); 
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
	
	
function validate(formData, jqForm, options) {		
	  if ($('input[name^=item_chk]:checked').length <= 0) {
		alert("โปรดเลือก Item ที่ต้องการ");
		return false;	
	 } 
};

function validate_edit_csr(formData, jqForm, options) {		
	  if ($('#quotation_id').val() == "") {
		alert("กรุณาเลือก Quotation No.");
		$("#quotation_id").focus();
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
	} else if ($("#box_select_item_list").html()=="") {
			alert("กรุณาเลือกอุปกรณ์ที่ต้องการอย่างน้อย 1 รายการ");	
			return false;		
	}
	 
	 
};

function load_all_item_list() { //item ทั้งหมด ยกเว้นที่เลือก
	$.post("calibrate-service-script.php",{'act':'load_all_item_list'},function(data) {
			$("#box_all_item_list").html(data);
			select_all();
	});
}

function load_selected_item() { //item ที่เลือก
	var quotation_code=$("#quotation_id").find('option:selected').text();
	
	$.post("calibrate-service-script.php",{'act':'display_select_item','quotation_code':quotation_code,'csr_id':'<?php echo $id; ?>'},function(data) {
			$("#box_select_item_list").html(data);	
			
			if (data!="") { 
				$("#btn_delete_item").show();	 //show delete button
				select_all();
			} else {
				$("#btn_delete_item").hide();	 //hide delete button
			}
	});
}
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

function load_edit_csr_item() { //item ที่เลือก
	$.post("calibrate-service-script.php",{'act':'load_edit_csr_item','id':'<?php echo $id; ?>'});
}


</script>
