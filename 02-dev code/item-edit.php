<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 5/9/2558
 * Time: 22:07 น.
 */
 include("check-permission.php");
 
 
$content='';
$id=$_GET['id'];
$get_result=$_GET['result'];

$SQL="SELECT * FROM "._TB_ITEM." WHERE id='$id' LIMIT 1; ";
$re=mysql_query($SQL);
$num=mysql_num_rows($re);

if ($num>0) {
	$rs=mysql_fetch_array($re);
	
		$item_code_prefix=$rs['item_code_prefix'];		
		$item_code_postfix=$rs['item_code_postfix'];
		$item_code=$item_code_prefix.' - '.$rs['item_code'].'/'.$item_code_postfix;
		
		$equipment_name=stripslashes($rs['equipment_name']);		
		$description=stripslashes($rs['description']);		
		
		$department_id=$rs['department_id'];	
		$model=stripslashes($rs['model']);	
		$resolution=stripslashes($rs['resolution']);	
		$calibration_range=stripslashes($rs['calibration_range']);	
		$serial_no=stripslashes($rs['serial_no']);	
		$id_no=$rs['id_no'];
		
		$item_accessories=stripslashes($rs['item_accessories']);
		$arr_accessories=explode("|",$item_accessories);		
		$n_arr=count($arr_accessories);
		
		$arr_accessory=array();
		for ($i=0;$i<=$n_arr;$i++) {
			if ($arr_accessories[$i]!="") {
				//$arr_accessory[]=$arr_accessories[$i];
				
				$arr_more = explode(":",$arr_accessories[$i]);
				$n_more=count($arr_more);
				for ($j=0;$j<=$n_more;$j++) {
					if ($arr_more[$j]!="") {
						$arr_accessory[]=$arr_more[$j];
						//echo $arr_more[$j]."<BR>";	
					}
				}
			}
		}
		$count_arr=count($arr_accessory);
		
	
		
		$calibrate_result=stripslashes($rs['calibrate_result']);	
		
		$calibrate_result_D='';
		$calibrate_result_R='';
		$calibrate_result_B='';
		
		if ($calibrate_result=="D") { $calibrate_result_D=' checked '; }
		if ($calibrate_result=="R") { $calibrate_result_R=' checked '; }
		if ($calibrate_result=="B") { $calibrate_result_B=' checked '; }
		
		
		
		
		$iso017025=($rs['iso017025']=='1' ? ' checked ' : '');		
		
		$manufacturer=stripslashes($rs['manufacturer']);	
		$cert_no=stripslashes($rs['cert_no']);	
		
		$cer_pdf=$rs['cer_pdf'];	
		if ($cer_pdf!="") {
			$certificate_pdf='<a href="'._PDF_ITEM_PATH.'/'.$cer_pdf.'" target="_blank">View Certification click here.</a><br>';
		} else {
			$certificate_pdf='';	
		}		
		$hidden_pdf_name='<input type="hidden" name="old_cer_pdf" id="old_cer_pdf" value="'.$cer_pdf.'" />';
		
		
		$inv_no=$rs['inv_no'];	
		$invoice=($inv_no!="" ? $inv_no : ' - ');
		
		$quotation='-';
		$status='-';
		
		
		$note=stripslashes($rs['note']);	
		$qty=$rs['qty'];	
		
		$create_dttm=$rs['create_dttm'];	
		$receive_dttm=$rs['receive_dttm'];	
		$update_dttm=$rs['update_dttm'];	
		
		$customer_id=$rs['customer_id'];	
		
		 $department_listbox=$db->department_inout_lab_listbox($department_id);
 		$customer_listbox=$db->customer_listbox($customer_id);
		
		//เลือกรูปภาพมา 1 ภาพ
		$thumb='';
		$IMG_PATH = _IMG_ITEM_PATH."/";
		$sql2="SELECT * FROM "._TB_ITEM_IMAGE." WHERE item_id='$id' ORDER BY id LIMIT 1; ";
		$re2=mysql_query($sql2);
		$n2=mysql_num_rows($re2);
		if ($n2>0) {
			$rs2=mysql_fetch_array($re2);
			$img_name=$rs2['name'];
			$thumb='<img  src="'.$IMG_PATH.$img_name.'" style="text-align: center; width: 100%;" alt="">';			
		} else {
			$thumb='<img class="" src="libs/img/no-image.gif" style="text-align: center; width: 100%;" alt="">';	
		}
	
}
mysql_free_result($re);

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
						
					
						
						$check="";
						if ( in_array("$id3",$arr_accessory) ) {
							$check=" checked ";
						}
					
						$txt='';	
						for ($k=0;$k<=$count_arr;$k++) {							
							if ($id3==$arr_accessory[$k]) {
								$txt=$arr_accessory[$k+1];
								break;
							}
						}
							
						if ($require_data3=='1') {
							$require_field='<input type="text" class="form-control" name="acc_more'.$id3.'" id="acc_more'.$id3.'" value="'.$txt.'">';
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
                                <ul class="nav nav-tabs" role="tablist" id="item_tab" style="margin-top:20px;">
                                  	<li role="presentation" class="active"><a href="#tab_general" role="tab" data-toggle="tab" class="bg-info"><h5>ข้อมูลทั่วไป</h5></a></li>     
                                    <li role="presentation"><a href="#tab_description" role="tab" data-toggle="tab" class="bg-info"><h5>รายละเอียดอุปกรณ์</h5></a></li>
                                    <li role="presentation"><a href="#tab_image" role="tab" data-toggle="tab" class="bg-info"><h5>รูปภาพ</h5></a></li>
                                    <li role="presentation"><a href="#tab_calibration" role="tab" data-toggle="tab" class="bg-info"><h5>Calibration</h5></a></li>
                                    <li role="presentation"><a href="#tab_certification" role="tab" data-toggle="tab" class="bg-info"><h5>Certification</h5></a></li>
                                    <li role="presentation"><a href="#tab_invoice" role="tab" data-toggle="tab" class="bg-info"><h5>Invoice</h5></a></li>
                                </ul>
                                
         <form class="form-horizontal style-form" action="item-script.php" id="frm" method="post">
            
     <!-- Tab panes -->
     <div class="tab-content">
            
      		<div role="tabpanel" class="tab-pane active" id="tab_general">   
						                                       
                                  <div class="row" style="">
                                        <div class="col-lg-12">
                                            <div class="content-panel col-lg-12">
                                                <div class="col-sm-12 col-md-12" style="text-align: center;">
                                                    <div class="form-group col-sm-12 col-md-6" style="text-align: center;">
                                                        <?php echo $thumb; ?>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6" style="text-align: left; padding-left: 20px;"><p class="col-md-12">รหัสสินค้า : <?php echo $item_code; ?></p></div>
                                                    <div class="form-group col-sm-12 col-md-6" style="text-align: left; padding-left: 20px;"><p class="col-md-12">Quotation NO. : <?php echo $quotation; ?></p></div>
                                                    <div class="form-group col-sm-12 col-md-6" style="text-align: left; padding-left: 20px;"><p class="col-md-12">Invoice : <?php echo $invoice; ?></p></div>
                                                    <div class="form-group col-sm-12 col-md-6" style="text-align: left; padding-left: 20px;"><p class="col-md-12">Status : <?php echo $status; ?></p></div>
                                                </div>
                                                <div class="clearfix form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">ชือ / Item</label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <input type="text" class="form-control" name="equipment_name" id="equipment_name" value="<?php echo $equipment_name; ?>"> 
                                                      
                                                    </div>
                                                </div><!-- /name -->
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">จำนวน / Quantity</label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <input type="text" class="form-control" name="qty" id="qty"  value="<?php echo $qty; ?>">
                                                    </div>
                                                </div><!-- /quality -->
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="col-sm-12 col-md-3 control-label">Lab</label>
                                                    <div class="col-sm-12 col-md-9">
                                                        <select class="selectBox js-states form-control" name="department_id" id="department_id"  value="<?php echo $department_id; ?>">
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
                        
                                                <div class="col-md-12" id="box_comapny_info"></div>
                        
                                  
                                      
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
                                      <input type="text" class="form-control" name="manufacturer" id="manufacturer" value="<?php echo $manufacturer; ?>">
                                    </div>
                                </div><!-- /Manufacturer -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">รุ่น / Model</label>
                                    <div class="col-sm-12 col-md-8">
                                         <input type="text" class="form-control" name="model" id="model" value="<?php echo $model; ?>">
                                    </div>
                                </div><!-- /Model -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ความละเอียด / Resolution</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" id="resolution" name="resolution" value="<?php echo $resolution; ?>">
                                    </div>
                                </div><!-- /Resolution -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">จุดสอบเทียบ / <br/>Calibration Range</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" name="calibration_range" id="calibration_range"  value="<?php echo $calibration_range; ?>">
                                    </div>
                                </div><!-- /Calibration Range -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">Serial No.</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" name="serial_no" id="serial_no"   value="<?php echo $serial_no; ?>">
                                    </div>
                                </div><!-- /Serial No. -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ID No.</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control" id="id_no" name="id_no"   value="<?php echo $id_no; ?>">
                                    </div>
                                </div><!-- /ID No. -->
                                
                                <div class="form-group col-sm-12 col-md-12" style="height: auto;">
                                		<?php echo $accessories; ?>
                                
                                <hr />
                              
                                       <div class="clearfix"></div>
									<div style="margin-top:20px;">
                                       <label class="col-sm-12 col-md-12 control-label">3) ISO</label>
                                       <div class="col-sm-12 col-md-12"><input type="checkbox" name="iso017025" id="iso017025" value="1" <?php  echo $iso017025; ?>>  ISO 17025 Accredited</div>
									</div>
                                    
                                  
                                       
                                </div><!-- /Accessories -->
                                
                                
                                   
                                  <div class="form-group col-sm-12 col-md-6">
                                            <label class="col-sm-12 col-md-3 control-label">Description</label>
                                        <div class="col-sm-12 col-md-9">
                                          <textarea name="description" id="description" class="form-control" rows="7"><?php echo $description; ?></textarea>
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
                            				<div class="form-group col-sm-12 col-md-12 clearfix" style="height: auto; clear: both;">
                                                    <label class="col-sm-12 col-md-4 control-label">อัพโหลดรูปภาพ</label>
                                                    <div class="col-sm-12 col-md-8">
                                                      		   <span class="btn btn-success fileinput-button">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                    <span>Select files...</span>
                                                                    <!-- The file input field used as target for the file upload widget -->
                                                                    <input id="fileupload" type="file" name="files[]" multiple>
                                                                     <input name="item_id[]" type="hidden" value="<?php echo $id; ?>">
                                                                </span>
                                                                <br>
                                                                <br>
                                                                <!-- The global progress bar -->
                                                                <div id="progress" class="progress">
                                                                    <div class="progress-bar progress-bar-success"></div>
                                                                </div>
                                                                <!-- The container for the uploaded files -->
                                                                <div id="files" class="files"></div>
                                                                <br>

                                                                   

                                                    </div>
                                                    
                                                      
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="row mt" id="box_images"></div>
                                                    </div>
                                                </div>
                            </div>
                         </div>
                      </div>
                </div><!-- // Tab Image -->
                
                <div role="tabpanel" class="tab-pane " id="tab_calibration">
              	 <div class="row" style="">
                        <div class="col-lg-12">
                            <div class="content-panel col-lg-12">
                            							 <div class="clearfix form-group col-sm-12 col-md-5">
                                                                <label class="col-sm-12 col-md-12 control-label" style="border-bottom: 1px #797979 solid; padding-bottom: 10px; margin-bottom: 20px;">ผลการ Calibrate</label>
                                                               
                                                                    <div class="col-sm-12 col-md-12"><input type="radio" value="D" name="calibrate_result" id="calibrate_result_D" <?php echo $calibrate_result_D; ?> >  Done</div>
                                                                    <div class="col-sm-12 col-md-12"><input type="radio" value="R" name="calibrate_result" id="calibrate_result_R" <?php echo $calibrate_result_R; ?>>  Repairing</div>
                                                                    <div class="col-sm-12 col-md-12"><input type="radio" value="B" name="calibrate_result" id="calibrate_result_B" <?php echo $calibrate_result_B; ?>>  Broken</div>
                                                                 
                                                               
                                                            </div><!-- /Calibration result -->
                                                            
                                                           <div class="clearfix form-group col-sm-12 col-md-7">
                                                                <label class="col-sm-12 col-md-12 control-label" style="border-bottom: 1px #797979 solid; padding-bottom: 10px; margin-bottom: 20px;">หมายเหตุ</label>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <textarea class="form-control" rows="10" name="note" id="note"><?php echo $note; ?></textarea>
                                                                </div>
                                                            </div><!-- /Certification Comment -->

                            </div>
                         </div>
                      </div>
                </div><!-- // Tab Calibration -->
                
                <div role="tabpanel" class="tab-pane " id="tab_certification">
                     <div class="row" style="">
                        <div class="col-lg-12">
                            <div class="content-panel col-lg-12">
                            					       <div style="margin-top: 20px;">
                                        <!--                            itemCertification-->
                                                                    <div class="clearfix form-group col-sm-12 col-md-6">
                                                                        <label class="col-sm-12 col-md-3 control-label">Certification No.</label>
                                                                        <div class="col-sm-12 col-md-9">
                                                                            <input type="text" class="form-control" id="cert_no" name="cert_no" value="<?php echo $cert_no; ?>">
                                                                        </div>
                                                                    </div><!-- /Certification No -->
                                                                    <div class="clearfix form-group col-sm-12 col-md-6">
                                                                        <label class="col-sm-12 col-md-3 control-label">Certification PDF File.</label>
                                                                        <div class="col-sm-12 col-md-9">
                                                                        	<?php echo $certificate_pdf; ?>
                                                                             <input type="checkbox" name="change_pdf" id="change_pdf" value="1" /> เปลี่ยนไฟล์ใหม่
                                                                            <input type="file" class="form-control" name="cer_pdf" id="cer_pdf" value="<?php echo $cer_pdf; ?>">
                                                                        </div>
                                                                    </div><!-- /Certification No -->
                                                                </div><!-- itemCertification tab -->
                            </div>
                         </div>
                      </div>
                </div><!-- // Tab Certification -->
                
                <div role="tabpanel" class="tab-pane " id="tab_invoice">
                       <div class="row" style="">
                        <div class="col-lg-12">
                            <div class="content-panel col-lg-12">
                            			    <div  style="margin-top: 20px;">
                            <div class="clearfix form-group col-sm-12 col-md-12">
                                <label class="col-sm-12 col-md-2 control-label">Invoice No.</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $inv_no; ?>">
                                </div>
                            </div><!-- /Invoice No -->
                        </div><!-- itemInvoice tab -->
                            </div>
                         </div>
                      </div>
                </div><!-- // Tab Invoice -->
                
            
            
     </div> <!-- // Tab panes -->
		
        
      
<div style="padding: 0; margin: 0; margin-top:30px;">
       <input type="hidden" name="act" id="act" value="edit" />
      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
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
		
		load_item_images('<?php echo $id; ?>');
		
		$(".alert").hide();	
		var get_result="<?php echo $get_result; ?>";
		if (get_result=="true") {
			$(".alert-success").fadeIn();	
		}
		
		change_customer("<?php echo $customer_id; ?>");
		
		$("#cer_pdf").attr("disabled",true);		
		$("#change_pdf").click(function() {
			var chk=$("#change_pdf").attr("checked");
				if (chk=='checked') {
					$("#cer_pdf").attr("disabled",false);	
				} else {
					$("#cer_pdf").attr("disabled",true);	
				}
		});
		
		$('#frm').ajaxForm( 
		{ 
				beforeSubmit: validate,
				complete: function(xhr) {
						var result=xhr.responseText;
						
							if (result=='') {									
									window.location.href="item-edit.php?id=<?php echo $id; ?>&result=true";		
							} else if (result=='102') { //save ไม่ได้
									$(".alert-danger").html("<b>เกิดข้อผิดพลาด!!</b><br> "+result);
									$(".alert-danger").fadeIn();	
									go_anchor("anchor1");		
							} else if (result=='103') { //save ไม่ได้
									$(".alert-danger").html("<b>เกิดข้อผิดพลาด!!</b><br>ไม่สามารถอัพโหลดไฟล์ pdf ได้ ");
									$(".alert-danger").fadeIn();										
									go_anchor("anchor1");		
									$('#item_tab li:eq(4) a').tab('show')
							} else if (result=='104') { //เลือกไฟล์ pdf
									$(".alert-danger").html("<b>เกิดข้อผิดพลาด!!</b><br>กรุณาเลือกไฟล์ .pdf เท่านั้น ");
									$(".alert-danger").fadeIn();	
									go_anchor("anchor1");	
									$('#item_tab li:eq(4) a').tab('show')
							} else if (result=='105') { //เลือกไฟล์ pdf
									$(".alert-danger").html("<b>เกิดข้อผิดพลาด!!</b><br>กรุณาเลือกไฟล์ Certification PDF File (.pdf) เพื่ออัพโหลด ");
									$(".alert-danger").fadeIn();	
									go_anchor("anchor1");		
									$('#item_tab li:eq(4) a').tab('show')					
							} else {
									$(".alert-danger").html(result);	
									$(".alert-danger").fadeIn();	
									go_anchor("anchor1");
									$('#item_tab li:eq(4) a').tab('show')
							}
					
				}
		}); 
		
		
		$("#customer_id").change(function() {
				change_customer($(this).val());
		});
	});
	
	function change_customer(id) {
			if (id!="") {
				$.post("item-script.php", {'act':'get_customer_info','id':id},function(data) {
					$("#box_comapny_info").html(data);
				});
			} else {
				$("#box_comapny_info").html('')	;
			}
	}


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
			} else if ($("#change_pdf").is("checked") && $("#cer_pdf").val()=="") {
				$(".alert-warning").html("<b>กรุณากรอกข้อมูลให้ครบถ้วน!!</b><br>- กรุณาเลือกไฟล์ Certification PDF File.");
				$("#cer_pdf").focus();
				$(".alert-warning").fadeIn();
				go_anchor("anchor1");
				$('#item_tab li:eq(4) a').tab('show');
				return false;
				
			}
	};
	
	
	function load_item_images(item_id) {
		$.post("item-script.php",{'act':'load-images','item_id':item_id},function(data) {
			$("#box_images").html(data);
		});
	}
</script>


<script src="libs/js/jquery-multi-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="libs/js/jquery-multi-upload/js/jquery.iframe-transport.js"></script>
<script src="libs/js/jquery-multi-upload/js/jquery.fileupload.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    //var url = window.location.hostname === 'blueimp.github.io' ?
       //         '//jquery-file-upload.appspot.com/' : 'server/php/';

	var url='libs/class/php-upload/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
			$('.upl').remove();
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
			
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).on('fileuploadstop', function (e, data) {
		
		   load_item_images('<?php echo $id; ?>');
		   
	}).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>