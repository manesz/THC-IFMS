<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 12/9/2558
 * Time: 10:44 น.
 */
include("check-permission.php");

$content='';
$id=$_GET['id'];
$get_result=$_GET['result'];

$SQL="SELECT * FROM "._TB_CUSTOMER." WHERE id='$id' LIMIT 1; ";
$re=mysql_query($SQL);
$num=mysql_num_rows($re);

if ($num>0) {
	$rs=mysql_fetch_array($re);
	
	//id, company_name, company_address, tax_no, phone_no, fax_no, email, create_dttm, update_dttm, publish, create_person
	
		$company_name=stripslashes($rs['company_name']);		
		$company_address=stripslashes($rs['company_address']);	
		$phone_no=stripslashes($rs['phone_no']);	
		$tax_no=stripslashes($rs['tax_no']);	
		$fax_no=stripslashes($rs['fax_no']);	
		$email=stripslashes($rs['email']);	
		$contact_name=stripslashes($rs['contact_name']);
		$publish=$rs['publish'];
		$create_dttm=$rs['create_dttm'];
		$latest_update=$rs['update_dttm'];
	
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
        
          <div class="row vertical-align" id="anchor1">
                <div class="col-sm-8"><h3><i class="fa fa-angle-right"></i> แบบฟอร์มแก้ไขลูกค้า</h3></div>
                <div class="col-sm-4 text-right"><a class="btn btn-primary" href="customer-list.php"><span class="glyphicon glyphicon-chevron-left"></span> ย้อนกลับ</a></div>
            </div>
            
     <!-- /.row title -->
            
             <div class="alert alert-success"><b>บันทึกข้อมูลสำเร็จ</b> You successfully read this important alert message.</div>
            <div class="alert alert-warning"><b>กรุณากรอกข้อมูลให้ครบถ้วน</b> Better check yourself, you're not looking too good.</div>
            <div class="alert alert-danger"><b>ไม่สามารถสร้างผู้ใช้งานได้</b> Change a few things up and try submitting again.</div>

            <form class="form-horizontal style-form" action="customer-script.php" id="frm" method="post">

                <div class="row" style="">
                    <div class="col-lg-12">
                        <div class="content-panel col-lg-12">
                        
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อบริษัท</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo $company_name; ?>">
                                </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ที่อยู่</label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" rows="10" name="company_address" id="company_address"><?php echo $company_address; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">เบอร์โทรศัพท์</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="phone_no" id="phone_no" value="<?php echo $phone_no; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">โทรสาร </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="fax_no" id="fax_no" value="<?php echo $fax_no; ?>">
                                </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">อีเมล</label>
                                <div class="col-lg-8"><input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>"></div>
                            </div>
							 <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">เลขที่ผู้เสียภาษี </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="tax_no" id="tax_no" value="<?php echo $tax_no; ?>">
                                </div>
                            </div>
                            
                             <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อผู้ติดต่อ </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="contact_name" id="contact_name" value="<?php echo $contact_name; ?>">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                            
                        </div><!-- /content-panel col-lg-12 -->
                    </div><!-- /col-lg-12 -->
                </div><!-- /.row -->

                <div class="row" style="">
                    <div class="col-lg-12">
                        <div class="content-panel col-lg-12">
                            <div class="form-group" style="padding: 0; margin: 0;">
                                  <input type="hidden" name="act" id="act" value="edit" />
                                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                <button type="submit" id="btn_save" class="btn btn-success btn-lg col-md-6" style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูล</button>
                                <button type="reset" class="btn btn-default btn-lg col-md-3"  style="float: right; margin: 0 5px 0 5px;">เคลียร์ข้อมูล</button>      
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
		var get_result="<?php echo $get_result; ?>";
		if (get_result=="true") {
			$(".alert-success").fadeIn();	
		}
		
		
		
		$('#frm').ajaxForm( 
		{ 
				beforeSubmit: validate,
				complete: function(xhr) {
						var result=xhr.responseText;
					
						if (result=="") {
							window.location.href="customer-edit.php?id=<?php echo $id; ?>&result=true";		
						} else if (result=='102') { //save ไม่ได้
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
		); 
	});

	function validate(formData, jqForm, options) {
			$(".alert").hide();
			
			if ($("#company_name").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- ชื่อบริษัท");
						$("#company_name").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			} else if ($("#company_address").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- ที่อยู่");
						$("#company_address").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
   		  } else if ($("#phone_no").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- โทรศัพท์");
						$("#phone_no").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			} else if ($("#email").val()=="") {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- อีเมล");
						$("#email").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			} else if ($("#tax_no").val()!="" && $("#tax_no").val().length!=13 ) {
						$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- เลขที่ผู้เสียภาษีจะต้องมี 13 หลัก");
						$("#tax_no").focus();
						$(".alert-warning").fadeIn();
						go_anchor("anchor1");
						return false;
			}
	};
</script>
