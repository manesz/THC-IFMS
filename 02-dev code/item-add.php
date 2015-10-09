<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 5/9/2558
 * Time: 22:07 น.
 */
 include("check-permission.php");
 
 $department_listbox=$db->department_inout_lab_listbox('');
 $customer_listbox=$db->customer_listbox('');
 
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
            
                <div class="alert alert-success"><b>บันทึกข้อมูลสำเร็จ</b> You successfully read this important alert message.</div>
            <div class="alert alert-warning"><b>กรุณากรอกข้อมูลให้ครบถ้วน</b> Better check yourself, you're not looking too good.</div>
            <div class="alert alert-danger"><b>ไม่สามารถสร้างผู้ใช้งานได้</b> Change a few things up and try submitting again.</div>
            
         
			      
                                <!-- Tab -->                                
                                <ul class="nav nav-tabs" role="tablist" id="pro_tab" style="margin-top:20px;">
                                  	<li role="presentation" class="active"><a href="#tab_general" role="tab" data-toggle="tab" class="bg-info"><h5>ข้อมูลทั่วไป</h5></a></li>     
                                    <li role="presentation"><a href="#tab_description" role="tab" data-toggle="tab" class="bg-info"><h5>รายละเอียดอุปกรณ์</h5></a></li>
                                    <li role="presentation" class="disabled"><a href="#tab_image"  class="bg-info" onclick="alert('กรุณาบันทึกข้อมูลทั่วไป และรายละเอียดอุปกรณ์ก่อน');"><h5>รูปภาพ</h5></a></li>
                                    <li role="presentation" class="disabled"><a href="#tab_calibration" class="bg-info" onclick="alert('กรุณาบันทึกข้อมูลทั่วไป และรายละเอียดอุปกรณ์ก่อน');"><h5>Calibration</h5></a></li>
                                    <li role="presentation" class="disabled"><a href="#tab_certification" class="bg-info" onclick="alert('กรุณาบันทึกข้อมูลทั่วไป และรายละเอียดอุปกรณ์ก่อน');"><h5>Certification</h5></a></li>
                                    <li role="presentation" class="disabled"><a href="#tab_invoice" class="bg-info" onclick="alert('กรุณาบันทึกข้อมูลทั่วไป และรายละเอียดอุปกรณ์ก่อน');"><h5>Invoice</h5></a></li>
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
                                                        <input type="text" class="form-control" name="qty" id="qty">
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
                                        <input type="text" class="form-control" name="serial_no" id="serial_no">
                                    </div>
                                </div><!-- /Serial No. -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ID No.</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" id="id_no" name="id_no">
                                    </div>
                                </div><!-- /ID No. -->
                                <div class="form-group col-sm-12 col-md-12" style="height: auto;">
                                    <label class="col-sm-12 col-md-12 control-label">1) อุปกรณ์เสริมของเครื่อง</label>
                                    
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_1" id="attb1_1" /> 1.1 สายไฟ Probe/Sensor, Data link
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_2" id="attb1_2" value="1"> 1.2 สาย Adapter, หม้อแปลงไฟฟ้า
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_3" id="attb1_3" value="1"> 1.3 ขั้วต่อเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_4" id="attb1_4" value="1"> 1.4 คู่มือการใช้งาน
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_5" id="attb1_5" value="1"> 1.5 Battery Charger
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_6" id="attb1_6" value="1" > 1.6 อื่น <input type="text" class="form-control" name="attb1_6_other" id="attb1_6_other">
                                    </div>
                                    
                                    <label class="col-sm-12 col-md-12 control-label">2) การบรรจุหีบห่อเครื่องมือจากลูกค้า</label>
                                    
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb2_1" id="attb2_1" value="1"> 2.1 กล่องเครื่องมือ/ซองใส่เครื่อง
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class=""  name="attb2_2" id="attb2_2" value="1"> 2.2 หุ้มด้วยพลาสติกกันกระแทกเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class=""  name="attb2_3" id="attb2_3" value="1"> 2.3 กล่องกระดาษเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class=""  name="attb2_4" id="attb2_4" value="1"> 2.4 อื่น <input type="text" class="form-control"  name="attb2_4_other" id="attb2_4_other">
                                    </div>
                                   <div class="clearfix"></div>
									<div style="margin-top:20px;">
                                       <label class="col-sm-12 col-md-12 control-label">3) ISO</label>
                                       <div class="col-sm-12 col-md-12"><input type="checkbox" name="iso017025" id="iso017025" value="1">  ISO 17025 Accredited</div>
									</div>
                                       
                                </div><!-- /Accessories -->
                                

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
							window.location.href="item-edit.php?id="+arr[1]+"&result=true";
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
