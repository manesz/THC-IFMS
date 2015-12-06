<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 5/9/2558
 * Time: 22:07 น.
 */
 include("check-permission.php");
 
 if ($_GET['department_id'] && $_GET['department_id']!="") {
	$department_id=$_GET['department_id']; 
 } else {
	$department_id=$_SESSION['ss_department_id'];	 
 }
 
 if ($_GET['customer_id'] && $_GET['customer_id']!="") {
	$customer_id=$_GET['customer_id']; 
 } else {
	$customer_id=$_SESSION['ss_customer_id'];	 
 }
 
 
 $department_listbox=$db->department_inout_lab_listbox($department_id);
 $customer_listbox=$db->customer_listbox($customer_id);
 
 
//Item accessories
$accessories='';
$sql2="SELECT id, title, parent_id,  update_dttm FROM "._TB_ITEM_ACCESSORIES." WHERE publish='1' AND parent_id='0' ORDER BY id ";
$re2=mysql_query($sql2);
$num2=mysql_num_rows($re2);

$n=0;
$m=0;
if ($num2>0) {	
	$n=1;
	while ($rs2=mysql_fetch_array($re2)) {
		$id2=$rs2['id'];
		$title2=stripslashes($rs2['title']);
		$parent_id2=$rs2['parent_id'];
		
		
		$accessories.=' <label class="col-sm-12 col-md-12 control-label">'.$n.'. '.$title2.'</label>';
		
		//sub----
				$sql3="SELECT id, title, parent_id, require_data, update_dttm FROM "._TB_ITEM_ACCESSORIES." WHERE publish='1' AND parent_id='$id2' ORDER BY id ";
				$re3=mysql_query($sql3);
				$num3=mysql_num_rows($re3);
				
				if ($num3>0) {	
					$m=1;
					while ($rs3=mysql_fetch_array($re3)) {
						$id3=$rs3['id'];
						$title3=stripslashes($rs3['title']);
						$parent_id3=$rs3['parent_id'];		
						$require_data3=$rs3['require_data'];
						
						$require_field='';
						if ($require_data3=='1') {
							$require_field='<input type="text" class="form-control" name="acc_more'.$id3.'" id="acc_more'.$id3.'">';
						}
						
						$accessories.=' <div class="col-sm-12 col-md-4">
													<input type="checkbox" class="" name="acc_chk[]" id="acc_chk[]"  value="'.$id3.'" '.$check.'> 
													'.$n.'.'.$m.') '.$title3.' '.$require_field.'
													
												</div>';
						$m++;
					}
					
				}
				mysql_free_result($re3);
		//end sub
		
		$n++;
	} //end while
	
}
mysql_free_result($re2);

 
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
                        <h3><i class="fa fa-angle-right"></i> <a href="item-list.php">รายการอุปกรณ์</a> <i class="fa fa-angle-right"></i> สร้างอุปกรณ์</h3>
                    </div>
                </div>
            </div><!-- /.row title -->
            
                <div class="alert alert-success" style="display:none;"><b>บันทึกข้อมูลสำเร็จ</b> You successfully read this important alert message.</div>
            <div class="alert alert-warning" style="display:none;"><b>กรุณากรอกข้อมูลให้ครบถ้วน</b> Better check yourself, you're not looking too good.</div>
            <div class="alert alert-danger" style="display:none;"><b>ไม่สามารถสร้างผู้ใช้งานได้</b> Change a few things up and try submitting again.</div>
            
         
			      
                                <!-- Tab -->                                
                                <ul class="nav nav-tabs" role="tablist" id="pro_tab" style="margin-top:20px;">
                                  	<li role="presentation" class="active"><a href="#tab_general" role="tab" data-toggle="tab" class="bg-info"><h5>ข้อมูลทั่วไป</h5></a></li>     
                                    <li role="presentation"><a href="#tab_description" role="tab" data-toggle="tab" class="bg-info"><h5>รายละเอียดอุปกรณ์</h5></a></li>
                                    <!-- 
                                    <li role="presentation" class="disabled"><a href="#tab_image"  class="bg-info" onclick="alert('กรุณาบันทึกข้อมูลทั่วไป และรายละเอียดอุปกรณ์ก่อน');"><h5>รูปภาพ</h5></a></li>
                                    <li role="presentation" class="disabled"><a href="#tab_calibration" class="bg-info" onclick="alert('กรุณาบันทึกข้อมูลทั่วไป และรายละเอียดอุปกรณ์ก่อน');"><h5>Calibration</h5></a></li>
                                    <li role="presentation" class="disabled"><a href="#tab_certification" class="bg-info" onclick="alert('กรุณาบันทึกข้อมูลทั่วไป และรายละเอียดอุปกรณ์ก่อน');"><h5>Certification</h5></a></li>
                                    <li role="presentation" class="disabled"><a href="#tab_invoice" class="bg-info" onclick="alert('กรุณาบันทึกข้อมูลทั่วไป และรายละเอียดอุปกรณ์ก่อน');"><h5>Invoice</h5></a></li>
                                    -->
                                </ul>
                     
                     
                                
     <form class="form-horizontal style-form" action="item-script.php" id="frm" method="post">
            
     <!-- Tab panes -->
     <div class="tab-content">
            
      		<div role="tabpanel" class="tab-pane active" id="tab_general">   
						                                       
                                  <div class="row" style="">
                                        <div class="col-lg-12">
                                            <div class="content-panel col-lg-12">
                                                
                                                <div class="clearfix form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">ชือ / Item</label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <input type="text" class="form-control" name="equipment_name" id="equipment_name"> 
                                                      
                                                    </div>
                                                </div><!-- /name -->
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">จำนวน / Quantity</label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <input type="text" class="form-control" name="qty" id="qty" value="1">
                                                    </div>
                                                </div><!-- /quality -->
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">Lab</label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <select class="selectBox js-states form-control" name="department_id" id="department_id">
                                                            <option value="">-- โปรดเลือก --</option>
                                                            <?php echo $department_listbox; ?>
                                                        </select> 

                                                    </div>
                                                </div><!-- /Lab -->
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">ลูกค้า / Customer</label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <select class="selectBox js-states form-control" id="customer_id" name="customer_id">
                                                           <option value="">-- โปรดเลือก --</option>
                                                            <?php echo $customer_listbox; ?>
                                                        </select>
                                                    </div>
                                                </div><!-- /customer -->
                        
                                                <div class="col-md-12" id="box_comapny_info"></div>  <!-- end box company info -->
                                  
                                      
                                            </div><!-- /content-panel col-lg-12 -->
                                        </div><!-- /col-lg-12 -->
                                </div><!-- /.row -->
             
			</div><!-- // Tab general -->
            
            
                <div role="tabpanel" class="tab-pane " id="tab_description">
	                 <div class="row" style="">
                        <div class="col-lg-12">
                            <div class="content-panel col-lg-12">
                            		<div  style="margin-top: 20px;"><!-- itemDescription tab -->
                            <div class=""><!-- class well -->

                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ผู้ผลิต / <br/>Manufacturer</label>
                                    <div class="col-sm-12 col-md-8">
                                      <input type="text" class="form-control" name="manufacturer" id="manufacturer">
                                    </div>
                                </div><!-- /Manufacturer -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">รุ่น / Model</label>
                                    <div class="col-sm-12 col-md-8">
                                         <input type="text" class="form-control" name="model" id="model">
                                    </div>
                                </div><!-- /Model -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ความละเอียด / Resolution</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" id="resolution" name="resolution">
                                    </div>
                                </div><!-- /Resolution -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">จุดสอบเทียบ / <br/>Calibration Range</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" name="calibration_range" id="calibration_range">
                                    </div>
                                </div><!-- /Calibration Range -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">Serial No.</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" name="serial_no" id="serial_no" value="N/A">
                                    </div>
                                </div><!-- /Serial No. -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ID No.</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" id="id_no" name="id_no" value="N/A">
                                    </div>
                                </div><!-- /ID No. -->
                                <div class="form-group col-sm-12 col-md-12" style="height: auto;">
                                   <?php echo $accessories; ?>
                                    
                                   <div class="clearfix"></div>
									<div style="margin-top:20px;">
                                       <label class="col-sm-12 col-md-12 control-label">3) ISO</label>
                                       <div class="col-sm-12 col-md-12"><input type="checkbox" name="iso017025" id="iso017025" value="1">  ISO 17025 Accredited</div>
									</div>
                                       
                                </div><!-- /Accessories -->
                                
                         
                                
                                  <div class="form-group col-sm-12 col-md-6">
                                            <label class="col-sm-12 col-md-3 control-label">Description</label>
                                        <div class="col-sm-12 col-md-9">
                                          <textarea name="description" id="description" class="form-control" rows="7"></textarea>
                                        </div>
                                    </div><!-- /description -->
                                                
                                   <div class="clearfix"></div>

                            </div>
                        </div><!-- /itemDescription tab -->
                            </div>
                         </div>
                      </div>
                </div><!-- // Tab description -->
                
                <div role="tabpanel" class="tab-pane " id="tab_image">
              		 <div class="row" style="">
                        <div class="col-lg-12">
                            <div class="content-panel col-lg-12">
                            	 สามารถ <strong>เพิ่มรูปภาพ</strong> ได้หลังจากบันทึกข้อมูล ข้อมูลทั่วไป และรายละเอียดอุปกรณ์แล้ว
                            </div>
                         </div>
                      </div>
                </div><!-- // Tab Image -->
                
                <div role="tabpanel" class="tab-pane " id="tab_calibration">
              		 <div class="row" style="">
                        <div class="col-lg-12">
                            <div class="content-panel col-lg-12">
                            	 สามารถจัดการข้อมูล <strong>Calibration</strong>  ได้หลังจากบันทึกข้อมูล ข้อมูลทั่วไป และรายละเอียดอุปกรณ์แล้ว
                            </div>
                         </div>
                      </div>
                </div><!-- // Tab Calibration -->
                
                <div role="tabpanel" class="tab-pane " id="tab_certification">
                      <div class="row" style="">
                        <div class="col-lg-12">
                            <div class="content-panel col-lg-12">
                            	 สามารถจัดการข้อมูล <strong>Certification</strong>  ได้หลังจากบันทึกข้อมูล ข้อมูลทั่วไป และรายละเอียดอุปกรณ์แล้ว
                            </div>
                         </div>
                      </div>
                </div><!-- // Tab Certification -->
                
                <div role="tabpanel" class="tab-pane " id="tab_invoice">
                   		 <div class="row" style="">
                        <div class="col-lg-12">
                            <div class="content-panel col-lg-12">
                            	 สามารถจัดการข้อมูล <strong>Invoice</strong>  ได้หลังจากบันทึกข้อมูล ข้อมูลทั่วไป และรายละเอียดอุปกรณ์แล้ว
                            </div>
                         </div>
                      </div>
                </div><!-- // Tab Invoice -->
                
            
            
     </div> <!-- // Tab panes -->
		
        
      
                <div style="padding: 0; margin: 0; margin-top:30px;">
                                 <input type="hidden" name="act" id="act" value="add" />
                                 <?php 
								 if ($_GET['session_csr'] && $_GET['session_csr']!="" && $_GET['return'] == 'edit') {
		                                 echo '<input type="hidden" name="edit_session_csr" id="edit_session_csr" value="'.$_GET['session_csr'].'" />';
								 }
								 if ($_GET['csrid'] && $_GET['csrid']!="" && $_GET['return'] == 'edit') {
		                                 echo '<input type="hidden" name="eidt_csr_id" id="edit_csr_id" value="'.$_GET['csrid'].'" />';
								 }
								 ?>
                                <button type="submit" id="btn_save" class="btn btn-success btn-lg col-md-6" style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูล</button>
                                <button type="reset" class="btn btn-default btn-lg col-md-3"  style="float: right; margin: 0 5px 0 5px;">เคลียร์ข้อมูล</button>      
                </div>
           

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
		$('#frm').ajaxForm( 
		{ 
				beforeSubmit: validate,
				complete: function(xhr) {
						var result=xhr.responseText;
						
						var arr=result.split(":");
						if (arr[0]=="returnid") {							
							var return_url="<?php echo $_GET['return']; ?>";
							//window.location.href="item-edit.php?id="+arr[1]+"&result=true&return="+return_url;
							if (return_url=='add') {
								window.location.href='calibrate-service-add.php';
							} else {
								window.location.href='calibrate-service-edit.php?id=<?php echo $_GET['csrid']; ?>';
							}
						} else {							
								if (result=='102') { //save ไม่ได้
									$(".alert-danger").html("<b>เกิดข้อผิดพลาด!!</b><br> "+result);
									$(".alert-danger").fadeIn();	
									go_anchor("anchor1");							
								} else {
									$(".alert-danger").html(result);	
									$(".alert-danger").fadeIn();	
									go_anchor("anchor1");
								}
						}
				}
		}); 
		
		
		$("#customer_id").change(function() {
				var id=$(this).val();
				if (id!="") {
					$.post("item-script.php", {'act':'get_customer_info','id':id},function(data) {
						$("#box_comapny_info").html(data);
					});
				} else {
					$("#box_comapny_info").html('')	;
				}
		});
	});
	


	function validate(formData, jqForm, options) {
			$(".alert").hide();
			
			if ($("#equipment_name").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- ชื่อ Item");
						$("#equipment_name").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			} else if ($("#qty").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- จำนวน");
						$("#qty").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
						
		} else if ($("#qty").val()!="" && !IsNumber($("#qty").val())) {

						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- จำนวนต้องเป็นตัวเลขเท่านั้น");
						$("#qty").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
						
   		  } else if ($("#department_id").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- LAB");
						$("#department_id").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			} else if ($("#customer_id").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- ลูกค้า");
						$("#customer_id").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			}
	};
</script>
