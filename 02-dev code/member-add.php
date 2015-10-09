<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 21:01 น.
 */
include("check-permission.php");

$department_listbox=$db->department_listbox('');
$position_listbox=$db->position_listbox('');
$permission_listbox=$db->permission_listbox('');


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
        <section class="wrapper">

             <div class="row vertical-align" id="anchor1">
                <div class="col-sm-8"><h3><i class="fa fa-angle-right"></i> แบบฟอร์มเพิ่มพนักงาน</h3></div>
                <div class="col-sm-4 text-right"><a class="btn btn-primary" href="member-list.php"><span class="glyphicon glyphicon-chevron-left"></span> ย้อนกลับ</a></div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <h4 class="mb"></h4>

                        <div class="alert alert-success"><b>บันทึกข้อมูลสำเร็จ</b> You successfully read this important alert message.</div>
                        <div class="alert alert-warning"><b>กรุณากรอกข้อมูลให้ครบถ้วน</b> Better check yourself, you're not looking too good.</div>
                        <div class="alert alert-danger"><b>ไม่สามารถสร้างผู้ใช้งานได้</b> Change a few things up and try submitting again.</div>

                        <form class="form-horizontal style-form" action="member-script.php" id="frm" method="post">
                        	 <div class="panel panel-default" >
                                  <div class="panel-heading">ข้อมูลทั่วไป</div>
                                  <div class="panel-body">
                                  
                        	 <div class="form-group col-sm-12 col-md-6 text-center">
                                               <img src="libs/img/upload-image.jpg" class="img-circle" width="150">
                            </div>
                            <div class="clearfix"></div>
                                
                            <div class="form-group col-sm-12 col-md-6">
                            	 <label class="col-sm-12 col-md-3 control-label">รูปภาพ</label>
                                 <div class="col-sm-12 col-md-9">                                 			
                                    <input type="file" class="form-control" name="image_profile" id="image_profile">
                                     <span class="help-block">ภาพสี่เหลี่ยมจตุรัส .jpg .gif .png ขนาด 150 pixels ถึง 500 pixels </span>                               </div>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label class="col-sm-12 col-md-3 control-label">เปิดใช้งาน</label>
                                
                                <div class="switch has-switch">
                                    <div class="switch-on switch-animate">
                                        <input type="checkbox" data-toggle="switch" value="1" name="is_active" id="is_active" checked>
                                        <span class="switch-left">ON</span>
                                        <label>&nbsp;</label>
                                        <span class="switch-right">OFF</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">ชือ<span class="note-red">*</span></label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="f_name" id="f_name">
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">นามสกุล<span class="note-red">*</span></label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="l_name" id="l_name">
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">เบอรติดต่อ</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="phone_no" id="phone_no">
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">เบอร์มือถือ</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="mobile_no" id="mobile_no">
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">อีเมล</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">แผนก<span class="note-red">*</span></label>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-control" name="department_id" id="department_id">
                                    <option value="" selected>-- เลือก --</option>
                                     <?php echo $department_listbox; ?>
                                    </select>
                                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">ตำแหน่ง<span class="note-red">*</span></label>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-control" name="position_id" id="position_id">
                                    <option value="" selected>-- เลือก --</option>
                                     <?php echo $position_listbox; ?>
                                    </select>
                                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">สิทธิการใช้โปรแกรม<span class="note-red">*</span></label>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-control" name="permission_id" id="permission_id">
                                    <option value="" selected>-- เลือก --</option>
                                      <?php echo $permission_listbox; ?>
                                    </select>
                                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                </div>
                            </div>
                            
                         </div>
                         </div>  
                            
                            <div class="clearfix"></div>
                                                        
                            <div class="panel panel-default">
                                  <div class="panel-heading">Account สำหรับเข้าใช้งานระบบ</div>
                                  <div class="panel-body">
                                  				<div class="form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">Username<span class="note-red">*</span></label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <input type="text" class="form-control" name="username" id="username" />
                                                    </div>
                                                </div>
                                                
                                                   <div class="clearfix"></div>
                                                
                                                  <div class="form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">รหัสผ่าน<span class="note-red">*</span></label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <input type="password" class="form-control" name="password" id="password">
                                                    </div>
                                                </div>
                                                   <div class="clearfix"></div>
                                                  <div class="form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">ยืนยันรหัสผ่าน<span class="note-red">*</span></label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <input type="password" class="form-control" name="password2" id="password2">
                                                    </div>
                                                </div>
                                  </div>
                            </div>
                            
                            
                            

                            
                            <div class="clearfix"></div><hr/>

                            <div class="form-group col-sm-12 col-md-12">
	                            <input type="hidden" name="act" id="act" value="add" />
                                <button type="submit" id="btn_save" class="btn btn-success btn-lg col-md-6" style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูล</button>
                                <button type="reset" class="btn btn-default btn-lg col-md-3"  style="float: right; margin: 0 5px 0 5px;">เคลียร์ข้อมูล</button>                                     
                            </div>
                            
                       </form>

                    </div><!-- /content-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->

        </section><!-- /wrapper -->
    </section><!-- /main-content -->
</section><!-- /coniainer -->

<?php
include_once("footer.php");
?>
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
					
						if (result=="") {
							window.location.href="member-list.php";
						} else if (result=='101') {
							$(".alert-warning").html("<b>โปรดตรวจสอบ!!</b><br>- Username <b>&quot;"+$("#username").val()+"&quot;</b> มีอยู่แล้ว");
							$(".alert-warning").fadeIn();
							$("#username").focus();
							go_anchor("anchor1");								
						} else if (result=='102') { //save ไม่ได้
							$(".alert-danger").html(result);	
							$(".alert-danger").fadeIn();	
							go_anchor("anchor1");							
						} else if (result=='103') {
							$(".alert-danger").html("<b>เกิดข้อผิดพลาด!!</b><br>- ไม่สามารถอัพโหลดไฟล์ภาพได้! ");
							$(".alert-danger").fadeIn();
							go_anchor("anchor1");							
						} else if (result=='104') {							
							$(".alert-warning").html("<b>โปรดตรวจสอบ!!</b><br>- ไฟล์ภาพที่อัพโหลดจะต้องเป็นนามสกุล .jpg .gif .png เท่านั้น! ");
							$(".alert-warning").fadeIn();
						} else {
							$(".alert-danger").html(result);	
							$(".alert-danger").fadeIn();	
							go_anchor("anchor1");
						}
						
				}
			} 
		); 
	});

	function validate(formData, jqForm, options) {
			$(".alert").hide();
			
			if ($("#f_name").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- ชื่อ");
						$("#f_name").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			} else if ($("#l_name").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- นามสกุล");
						$("#l_name").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
   		  } else if ($("#department_id").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- แผนก");
						$("#department_id").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			} else if ($("#position_id").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- ตำแหน่ง");
						$("#position_id").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
						
   		} else if ($("#permission_id").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- สิทธิการใช้งาน");
						$("#permission_id").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
		} else if ($("#username").val().length<4) {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- Username<br>- Username ต้องมีอย่างน้อย 4 ตัวอักษรขึ้นไป");
						$("#username").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
		} else if ($("#password").val().length<4) {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- Password<br>- รหัสผ่านต้องมีอย่างน้อย 4 ตัวอักษรขึ้นไป");
						$("#password").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
		} else if ($("#password2").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- ยืนยันรหัสผ่าน");
						$("#password2").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
		} else if ($("#password").val()!=$("#password2").val()) {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- รหัสผ่านไม่ถูกต้อง กรุณายืนยันรหัสผ่านให้เหมือนกันทั้ง 2 ช่อง");
						$("#password2").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
		}
	};
</script>
