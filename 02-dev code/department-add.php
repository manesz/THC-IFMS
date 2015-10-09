<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 23:49 น.
 */
include("check-permission.php");
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

           
            
            <div class="row vertical-align">
                <div class="col-sm-8"><h3><i class="fa fa-angle-right"></i> สร้างแผนกใหม่</h3></div>
                <div class="col-sm-4 text-right"><a class="btn btn-primary" href="department-list.php"><span class="glyphicon glyphicon-chevron-left"></span> ย้อนกลับ</a></div>
            </div>
            
            
            <div class="row" id="anchor1">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <h4 class="mb"></h4>

                        <div class="alert alert-success"><b>บันทึกข้อมูลสำเร็จ</b> You successfully read this important alert message.</div>
                        <div class="alert alert-warning"><b>กรุณากรอกข้อมูลให้ครบถ้วน</b> Better check yourself, you're not looking too good.</div>
                        <div class="alert alert-danger"><b>ไม่สามารถสร้างแผนกได้</b> Change a few things up and try submitting again.</div>

                        <form class="form-horizontal style-form" action="department-script.php" id="frm" method="post">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-sm-12 col-md-3 control-label">ชือแผนก<span class="note-red">*</span></label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-sm-12 col-md-3 control-label">รายละเอียด</label>
                                <div class="col-sm-12 col-md-9">
                                    <textarea class="form-control" rows="10" name="description" id="description"></textarea>
                                </div>
                            </div>
                            
                             <div class="form-group col-sm-12 col-md-12">
								 <label class="col-sm-12 col-md-3 control-label">&nbsp;</label>
                                	<div class="col-sm-12 col-md-9">
                                        <input type="checkbox" name="is_in_lab" id="is_in_lab" value="1" /> In LAB<br />
                                        <input type="checkbox" name="is_on_site" id="is_on_site" value="1" /> On Site
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
							window.location.href="department-list.php";
						} else if (result=='103') {
							$(".alert-warning").html("<b>เกิดข้อผิดพลาด!!</b><br>- ชื่อแผนก <b>&quot;"+$("#title").val()+"&quot;</b> มีอยู่แล้วกรุณาตรวจสอบ");
							$(".alert-warning").fadeIn();
							$("#title").focus();
						} else {
							$(".alert-danger").fadeIn();	
							go_anchor("anchor1");
						}
						
				}
			} 
		); 
	});

	function validate(formData, jqForm, options) {
			$(".alert").hide();
			
			if ($("#title").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- ชื่อแผนก");
						$("#title").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			} 
			/*else if ($("#description").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- รายละเอียด ");				
						$("#description").focus();		
						$(".alert-warning").fadeIn();	
						go_anchor("anchor1");
						return false;
			} */
	};
		
</script>