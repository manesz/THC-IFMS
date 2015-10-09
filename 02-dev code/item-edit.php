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
	
	
	//`id`, `equipment_name`, `description`, `department_id`, `model`, `resolution`, `calibration_range`, `maker`, `attribute_name`, `serial_no`, `control_no`, `wo_no`, `id_no`, `attb1_1`, `attb1_2`, `attb1_3`, `attb1_4`, `attb1_5`, `attb1_6`, `attb1_6_other`, `attb2_1`, `attb2_2`, `attb2_3`, `attb2_4`, `attb2_4_other`, `calibrate_result`, `iso017025`, `manufacturer`, `calibration_point`, `cert_no`, `cer_pdf`, `inv_no`, `note`, `status`, `qty`, `create_dttm`, `receive_dttm`, `update_dttm`, `publish`, `customer_id`, `create_person`
	
		$item_code_prefix=$rs['item_code_prefix'];		
		$item_code_postfix=$rs['item_code_postfix'];
		$item_code=$item_code_prefix.' - '.$rs['item_code'].'/'.$item_code_postfix;
		
		
		
		$equipment_name=stripslashes($rs['equipment_name']);		
		$department_id=$rs['department_id'];	
		$model=stripslashes($rs['model']);	
		$resolution=stripslashes($rs['resolution']);	
		$calibration_range=stripslashes($rs['calibration_range']);	
		$serial_no=stripslashes($rs['serial_no']);	
		$id_no=$rs['id_no'];
		
		$attb1_1=($rs['attb1_1'] =='1' ? ' checked ' : '');
		$attb1_2=($rs['attb1_2']=='1' ? ' checked ' : '');
		$attb1_3=($rs['attb1_3']=='1' ? ' checked ' : '');
		$attb1_4=($rs['attb1_4']=='1' ? ' checked ' : '');
		$attb1_5=($rs['attb1_5']=='1' ? ' checked ' : '');
		$attb1_6=($rs['attb1_6']=='1' ? ' checked ' : '');
		$attb1_6_other=stripslashes($rs['attb1_6_other']);
		
		$attb2_1=($rs['attb2_1']=='1' ? ' checked ' : '');
		$attb2_2=($rs['attb2_2']=='1' ? ' checked ' : '');
		$attb2_3=($rs['attb2_3']=='1' ? ' checked ' : '');
		$attb2_4=($rs['attb2_4']=='1' ? ' checked ' : '');		
		$attb2_4_other=stripslashes($rs['attb2_4_other']);
		
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
                                                        <img class="" src="libs/img/portfolio/port04.jpg" style="text-align: center; width: 100%;" alt="">
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
                                    <label class="col-sm-12 col-md-12 control-label">1) อุปกรณ์เสริมของเครื่อง</label>
                                    
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_1" id="attb1_1" value="1" <?php echo $attb1_1; ?>> 1.1 สายไฟ Probe/Sensor, Data link
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_2" id="attb1_2" value="1" <?php echo $attb1_2; ?>> 1.2 สาย Adapter, หม้อแปลงไฟฟ้า
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_3" id="attb1_3" value="1" <?php echo $attb1_3; ?>> 1.3 ขั้วต่อเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_4" id="attb1_4" value="1" <?php echo $attb1_4; ?>> 1.4 คู่มือการใช้งาน
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_5" id="attb1_5" value="1" <?php echo $attb1_5; ?>> 1.5 Battery Charger
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb1_6" id="attb1_6" value="1" <?php echo $attb1_6; ?>> 1.6 อื่น <input type="text" class="form-control" name="attb1_6_other" id="attb1_6_other" value="<?php echo $attb1_6_other; ?>">
                                    </div>
                                    
                                    <label class="col-sm-12 col-md-12 control-label">2) การบรรจุหีบห่อเครื่องมือจากลูกค้า</label>
                                    
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" name="attb2_1" id="attb2_1" value="1" <?php echo $attb2_1; ?>> 2.1 กล่องเครื่องมือ/ซองใส่เครื่อง
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class=""  name="attb2_2" id="attb2_2" value="1" <?php echo $attb2_2; ?>> 2.2 หุ้มด้วยพลาสติกกันกระแทกเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class=""  name="attb2_3" id="attb2_3" value="1" <?php echo $attb2_3; ?>> 2.3 กล่องกระดาษเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class=""  name="attb2_4" id="attb2_4" value="1" <?php echo $attb2_4; ?>> 2.4 อื่น 
                                        <input type="text" class="form-control"  name="attb2_4_other" id="attb2_4_other" value="<?php echo $attb2_4_other; ?>">
                                    </div>
                                   <div class="clearfix"></div>
									<div style="margin-top:20px;">
                                       <label class="col-sm-12 col-md-12 control-label">3) ISO</label>
                                       <div class="col-sm-12 col-md-12"><input type="checkbox" name="iso017025" id="iso017025" value="1" <?php  echo $iso017025; ?>>  ISO 17025 Accredited</div>
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
                            				<div class="form-group col-sm-12 col-md-12 clearfix" style="height: auto; clear: both;">
                                                    <label class="col-sm-12 col-md-4 control-label">อัพโหลดรูปภาพ</label>
                                                    <div class="col-sm-12 col-md-8">
                                                        <input type="file" class="form-control"/>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="row mt">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                                                                <div class="project-wrapper">
                                                                    <div class="project">
                                                                        <div class="photo-wrapper">
                                                                            <div class="photo">
                                                                                <a class="fancybox" href="libs/img/portfolio/port04.jpg"><img class="img-responsive" src="libs/img/portfolio/port04.jpg" alt=""></a>
                                                                            </div>
                                                                            <div class="overlay"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- col-lg-4 -->
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                                                                <div class="project-wrapper">
                                                                    <div class="project">
                                                                        <div class="photo-wrapper">
                                                                            <div class="photo">
                                                                                <a class="fancybox" href="libs/img/portfolio/port05.jpg"><img class="img-responsive" src="libs/img/portfolio/port05.jpg" alt=""></a>
                                                                            </div>
                                                                            <div class="overlay"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- col-lg-4 -->
                
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                                                                <div class="project-wrapper">
                                                                    <div class="project">
                                                                        <div class="photo-wrapper">
                                                                            <div class="photo">
                                                                                <a class="fancybox" href="libs/img/portfolio/port06.jpg"><img class="img-responsive" src="libs/img/portfolio/port06.jpg" alt=""></a>
                                                                            </div>
                                                                            <div class="overlay"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- col-lg-4 -->
                                                        </div><!-- /row -->
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
		
		$(".alert").hide();	
		var get_result="<?php echo $get_result; ?>";
		if (get_result=="true") {
			$(".alert-success").fadeIn();	
		}
		
		change_customer("<?php echo $customer_id; ?>");
		
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
							} else {
									$(".alert-danger").html(result);	
									$(".alert-danger").fadeIn();	
									go_anchor("anchor1");
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
			}
	};
</script>