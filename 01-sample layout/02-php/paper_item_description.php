<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 5/9/2558
 * Time: 21:15 น.
 */
?><?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 30/8/2558
 * Time: 13:01 น.
 */
?><?php

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
		$item_code=$rs['item_code'];
		$item_code_postfix=$rs['item_code_postfix'];
		
		$item_code_string=$item_code_prefix.' - '.$rs['item_code'].'/'.$item_code_postfix;
		
		
		
		$equipment_name=stripslashes($rs['equipment_name']);		
		$department_id=$rs['department_id'];	
		$model=stripslashes($rs['model']);	
		$resolution=stripslashes($rs['resolution']);	
		$calibration_range=stripslashes($rs['calibration_range']);	
		$serial_no=stripslashes($rs['serial_no']);	
		$id_no=$rs['id_no'];
		
		$attb1_1=($rs['attb1_1'] =='1' ? '<li class="child">1.1 สายไฟ Probe/Sensor, Data link</li>' : '');
		$attb1_2=($rs['attb1_2']=='1' ? '<li class="child">1.2 สาย Adapter, หม้อแปลงไฟฟ้า</li>' : '');
		$attb1_3=($rs['attb1_3']=='1' ? '<li class="child">1.3 ขั้วต่อเครื่องมือ</li>' : '');
		$attb1_4=($rs['attb1_4']=='1' ? '<li class="child">1.4 คู่มือการใช้งาน</li>' : '');
		$attb1_5=($rs['attb1_5']=='1' ? '<li class="child">1.5 Battery Charger</li>' : '');
		
		if ($rs['attb1_6']=='1' && $attb1_6_other!="") {
			$attb1_6_other=stripslashes($rs['attb1_6_other']);
		} else {
			$attb1_6_other='';
		}
		
		if ($attb1_1=="" && $attb1_2=="" && $attb1_3=="" && $attb1_4=="" && $attb1_5=="" &&  $attb1_6_other=="") {
			$no_acc1="(ไม่มี)";
		} else { $no_acc1=""; }
		
		$attb2_1=($rs['attb2_1']=='1' ? '<li class="child">2.1 กล่องเครื่องมือ/ซองใส่เครื่อง</li>' : '');
		$attb2_2=($rs['attb2_2']=='1' ? '<li class="child">2.2 หุ้มด้วยพลาสติกกันกระแทกเครื่องมือ</li>' : '');
		$attb2_3=($rs['attb2_3']=='1' ? '<li class="child">2.3 กล่องกระดาษเครื่องมือ</li>' : '');
		
		if ($rs['attb2_4']=='1' && $attb2_4_other!="") {
			$attb2_4_other=stripslashes($rs['attb2_4_other']);
		} else {
			$attb2_4_other='';	
		}
		
		if ($attb2_1=="" && $attb2_2=="" && $attb2_3=="" &&  $attb2_4_other=="") {
			$no_acc2="(ไม่มี)";
		} else { $no_acc2=""; }
		
		
		if ($attb1_1=="" && $attb1_2=="" && $attb1_3=="" && $attb1_4=="" && $attb1_5=="" && $attb1_6=="" &&  $attb1_6_other=="") {
			$no_acc1="(ไม่มี)";
		} else { $no_acc1=""; }
		
		
		$calibrate_result=stripslashes($rs['calibrate_result']);	
		
		$calibrate_result_D='<i class="fa fa-circle-o"></i>';
		$calibrate_result_R='<i class="fa fa-circle-o"></i>';
		$calibrate_result_B='<i class="fa fa-circle-o"></i>';
		
		if ($calibrate_result=="D") { $calibrate_result_D='<i class="fa fa-circle"></i>'; }
		if ($calibrate_result=="R") { $calibrate_result_R='<i class="fa fa-circle"></i>'; }
		if ($calibrate_result=="B") { $calibrate_result_B='<i class="fa fa-circle"></i>'; }
		
		
		
		
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
		
	
}

$db->close(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <!--    <link href="libs/css/bootstrap.css" rel="stylesheet">-->
    <!--external css-->
    <!--    <link href="libs/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
        <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="libs/lineicons/style.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="libs/css/paper.css" rel="stylesheet">
    <!--    <link href="libs/css/style.css" rel="stylesheet">-->
    <!--    <link href="libs/css/style-responsive.css" rel="stylesheet">-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<table id="itemDescription" class="table" width="250" style="border: none;"><!-- main table container -->
    <tr><!-- THC company name -->
        <td class="text-center"><h4>Thai Heart Calibration Co.,Ltd.</h4></td>
    </tr><!-- END : THC company name -->
    <tr><!-- item barcode image -->
        <td class="text-center"><!-- img src="libs/img/sample-barcode.png" style="width: 230px; height: auto; padding-top: 0px;"/ -->
        		<div id="bcTarget"></div>   
        </td>
    </tr><!-- END : item barcode image -->
    <tr><!-- item content -->
        <td>
            <table class="table table_no_border" style="width: 250px;"><!-- item description -->
                <tr><!-- Customer Company Name -->
                    <td class="text-center" colspan="3">S I K (THAILAND) LTD (HEAD OFFICE)</td>
                </tr><!-- END : Customer Company Name -->
                <tr><!-- Receive date -->
                    <td style="width: 100px;">Receive date</td>
                    <td style="width: 10px;">:</td>
                    <td style="width: 140px;"><?php echo DateNumberEN2TH($receive_dttm); ?></td>
                </tr><!-- END: Receive date -->
                <tr><!-- Equipment name -->
                    <td style="width: 100px;">Equipment name</td>
                    <td style="width: 10px;">:</td>
                    <td style="width: 140px;"><?php echo $equipment_name; ?></td>
                </tr><!-- END : Equipment name -->
                <tr><!-- Manufacturer -->
                    <td style="width: 100px;">Manufacturer</td>
                    <td style="width: 10px;">:</td>
                    <td style="width: 140px;"><?php echo $manufacturer; ?></td>
                </tr><!-- END : Manufacturer -->
                <tr><!-- Model -->
                    <td style="width: 100px;">Model</td>
                    <td style="width: 10px;">:</td>
                    <td style="width: 140px;"><?php echo ($model!="" ? $model : '-'); ?></td>
                </tr><!-- END : Model -->
                <tr><!-- Serial No. -->
                    <td style="width: 100px;">Serial No.</td>
                    <td style="width: 10px;">:</td>
                    <td style="width: 140px;"><?php echo ($serial_no!="" ? $serial_no : 'N/A'); ?></td>
                </tr><!-- END : Serial No. -->
                <tr><!-- ID No. -->
                    <td style="width: 100px;">ID No.</td>
                    <td style="width: 10px;">:</td>
                    <td style="width: 140px;"><?php echo ($id_no!="" ? $id_no : '-'); ?></td>
                </tr><!-- END : ID No. -->
                <tr><!-- Calibration Points -->
                    <td style="width: 100px;">Calibration Points</td>
                    <td style="width: 10px;">:</td>
                    <td style="width: 140px;"><?php echo ($calibration_range!="" ? $calibration_range : '-'); ?></td>
                </tr><!-- END : Calibration Points -->
                <tr><!-- Lot No. -->
                    <td style="width: 100px;">Lot No.</td>
                    <td style="width: 10px;">:</td>
                    <td style="width: 140px;">NO. 00628/15</td>
                </tr><!-- END : Lot No. -->
                <tr><!-- Title Accessories -->
                    <td colspan="3" style="font-weight: bold;">Accessories</td>
                </tr><!-- End : Title Accessories -->
                <tr><!-- Accessories list -->
                    <td colspan="3">
                        <ul class="list-style-none">
                        
                            <li>1. อุปกรณ์เสริมของเครื่อง <?php echo $no_acc1; ?></li>
                                                        
                            <?php echo $attb1_1; ?>
                            <?php echo $attb1_2; ?>
                            <?php echo $attb1_3; ?>
                            <?php echo $attb1_4; ?>
                            <?php echo $attb1_5; ?>
                            <?php echo $attb1_6_other; ?>
                            
                            <!--
                            <li class="child">	                           
                                <span style="width: 60px; border-bottom: none; float: left;"> <?php echo $attb1_6; ?> 1.6 อื่นๆ</span>
                                <span class="seperator" style="width: 150px; float: left; text-align: left;"><?php echo $attb1_6_other; ?></span>
                            </li>-->
                            <li style="clear: both;">2. การบรรจุหีบห่อเครื่องมือจากลูกค้า <?php echo $no_acc2; ?></li>
                            <?php echo $attb2_1; ?>
                            <?php echo $attb2_2; ?>
                            <?php echo $attb2_3; ?>
                            <?php echo $attb2_4_other; ?>
                        </ul>
                    </td>
                </tr><!-- End : Accessories list -->
                <tr><!-- Note -->
                    <td colspan="3" style="">
                        <b>Note:</b>
                        <p style="min-height: 100px;"><?php echo ($note!="" ? nl2br($note) : '-'); ?></p>
                    </td>
                </tr><!-- END : Note -->
                <tr><!-- item status -->
                    <td colspan="3">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 83px;"><?php echo $calibrate_result_D; ?> done</td>
                                <td style="width: 83px;"><?php echo $calibrate_result_R; ?> repainng</td>
                                <td style="width: 83px;"><?php echo $calibrate_result_B; ?> broken</td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- End : item status -->
                <tr><!-- Break line -->
                    <td colspan="3" style="width: 100px;"><p class="seperator"></p></td>
                </tr><!-- End : Break line -->
            </table><!-- END : item description -->
        </td>
    </tr><!-- END : item content -->
</table><!-- END : main table container -->

<script src="libs/js/jquery-1.8.3.min.js"></script>
<script src="libs/js/jquery-barcode-2.0.3/jquery-barcode.min.js"></script>

<script>
$(function() {
	
	//ดูตัวอย่างที่ http://barcode-coder.com/en/barcode-jquery-plugin-201.html
	/*
	type (string)
		codabar
		code11 (code 11)
		code39 (code 39)
		code93 (code 93)
		code128 (code 128)
		ean8 (ean 8)
		ean13 (ean 13)
		std25 (standard 2 of 5 - industrial 2 of 5)
		int25 (interleaved 2 of 5)
		msi
		datamatrix (ASCII + extended)
	*/
	$("#bcTarget").barcode("<?php echo "$item_code/$item_code_postfix"; ?>", "codabar",{barWidth:2, barHeight:40, fontSize:14});     
	//{barWidth:2, barHeight:30}
});
</script>
</body>
</html>