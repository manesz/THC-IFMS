<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 30/8/2558
 * Time: 13:01 น.
 */
 include("check-permission.php");
 
 $item_in_list='';
 $item_per_page=13;
 
 
 $id=$_GET['id'];
	$sql="SELECT * FROM "._TB_CSR." WHERE id='$id' AND publish<>'0' LIMIT 1; ";
		$re=mysql_query($sql);
		
		if (mysql_num_rows($re)>0) {
					$rs=mysql_fetch_array($re);
						
						$code_year=$rs['code_year'];
						$code_no=$rs['code_no'];
						
						$quotation_no=$rs['quotation_no'];
						$customer_id=$rs['customer_id'];
						
						$department_id=$rs['department_id'];	
						
						$contact_name=stripslashes($rs['contact_name']);									
						$department_name='-';
						$position_name='-';
						$is_status=$rs['status'];
						
						$CSR_NO=$db->csr_no_format($code_no,$code_year);
						
						$update_dttm=date("Y-m-d",strtotime($rs['update_dttm']));
						
						if ($is_status=='1') {
							$Status='In-Lab';	
							$LabCode='00';
						} else {
							$Status='On-Site';
							$LabCode='01';
						}
						
				
			
					//Get company information -----------------
					//$company_name=$db->customer_name($customer_id);
					$sql1="SELECT company_name, company_address, phone_no, fax_no, email FROM "._TB_CUSTOMER." WHERE id='$customer_id' LIMIT 1; ";
					$re1=mysql_query($sql1);
					if (mysql_num_rows($re1)>0) {
							$rs1=mysql_fetch_array($re1);
							
							$company_name=stripslashes($rs1['company_name']);
							$company_address=stripslashes($rs1['company_address']);
							$phone_no=stripslashes($rs1['phone_no']);
							$fax_no=stripslashes($rs1['fax_no']);
							$email=stripslashes($rs1['email']);
					}
			
			
					//Get All Item ---------------------------
					$sql2="	SELECT * 	FROM "._TB_ITEM." 
								WHERE csr_id='".$id."'
									AND publish='1' 
								ORDER BY id 
								
						 ";
							
					$re2=mysql_query($sql2);
					$num_items=mysql_num_rows($re2);
					$total_page=ceil($num_items/$item_per_page);
					
					if ($num_items>0) {
								$n=1;
								$j=1;
								
						
											
							$item_in_list='<div class="table-item">';
							$item_in_list.='							
               <div class="row">
                    <div class="head" style="width: 30px;">ลำดับ<br/>No.</div>
                    <div class="head" style="width: 350px;">รายการ<br/>Description</div>
                    <div class="head" style="width: 150px;">ผู้ผลิต<br/>Manufacturer</div>
                    <div class="head" style="width: 80px;">รุ่น<span style="color: red;">*</span><br/>Model</div>
                    <div class="head" style="width: 80px;">ID No.</div>
                    <div class="head" style="width: 80px;">หมายเลขเครื่อง<br/>S/N</div>
                    <div class="head" style="width: 200px;">จุดสอบเทียบ<span style="color: red;">*</span><br/>Calibration Point</div>
                    <div class="head" style="width: 60px;">จำนวน<br/>Quantity</div>
                    <div class="head" style="width: 80px;">Status</div>
                    <div class="head"  style="width: 80px;">ISO 17025<br/>Accredited</div>
                </div>';	
							
							while ($rs2=mysql_fetch_array($re2)) {
									$item_id=$rs2['id'];
									$quotation_no=$rs2['quotation_no'];
									
																			
									$item_code_prefix=$rs2['item_code_prefix'];
									$item_code_day=$rs2['item_code_day'];
									$item_code_month=$rs2['item_code_month'];
									$item_code=$rs2['item_code'];
									$item_code_year=$rs2['item_code_year'];
																			
									$quantity=$rs2['qty'];
									//$is_status=$rs2['is_status'];
									
									
									$equipment_name=stripslashes($rs2['equipment_name']);
									$model=stripslashes($rs2['model']);
									$resolution=stripslashes($rs2['resolution']);
									$calibration_point=stripslashes($rs2['calibration_point']);
									
									$serial_no=stripslashes($rs2['serial_no']);
									$id_no=stripslashes($rs2['id_no']);
									
									$manufacturer=stripslashes($rs2['manufacturer']);
									$calibrate_result=stripslashes($rs2['calibrate_result']);
									$iso017025=$rs2['iso017025'];
							
									$ISO=($iso017025=='1' ? 'Yes' : '-');
									
									if ($calibrate_result=='D') { $Calibrate="Done"; }
									if ($calibrate_result=='R') { $Calibrate="Repairing"; }
									if ($calibrate_result=='B') { $Calibrate="Broken"; }
													
											$item_in_list.='   
												  <div class="row">
																<div> '.$n.' </div>
																<div>'.$equipment_name.' </div>
																<div>'.($manufacturer!="" ? $manufacturer : '-').'</div>
																<div>'.($model!="" ? $model : '-').' </div>
																<div>'.($id_no!="" ? $id_no : '-').' </div>
																<div>'.($serial_no!="" ? $serial_no : '-').'</div>
																<div>'.$calibration_point.'</div>
																<div>'.number_format($quantity).'</div>
																<div> '.$Status.' </div>
																<div>'.$ISO.'</div>
													</div>';
													
									$n++;
									
								
							} // end while
							
							$item_in_list.='</div>';
					} //end item
					
}



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
<!--    <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />-->
<!--    <link href="libs/lineicons/style.css" rel="stylesheet">-->


    <!-- Custom styles for this template -->
    <link href="libs/css/paper.css" rel="stylesheet">
<!--    <link href="libs/css/style.css" rel="stylesheet">-->
<!--    <link href="libs/css/style-responsive.css" rel="stylesheet">-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
@media print {
    @page {
      margin: 2.5cm;   
    }

	.table-item {
		display: table;
		border-spacing: 0px;
		width:100%;
		border-collapse:collapse;
		width: 1320px; margin: -1px 0 10px 0;
	}
	.row {
		display: table-row;
	}
	.row > div {
		display: table-cell;
		border: solid 1px #000;
		padding: 2px;
	   text-align:center;
	   vertical-align:middle;
	   height:30px;
	}	
	.row > div.head {
		display: table-cell;
		border: solid 1px #000;
		padding: 2px;
		text-align:center;
		font-weight:normal;
		height:50px;
		background:#fafafa;
	}	
	
	 footer {page-break-after: always;}
	
}


.table-item {
    display: table;
    border-spacing: 0px;
	
	border-collapse:collapse;
	width: 1330px; margin: -1px 0 10px 0;
}
.row {
    display: table-row;
}
.row > div {
    display: table-cell;
    border: solid 1px #000;
    padding: 2px;
	text-align:center;
	vertical-align:middle;
	height:30px;
}	
.row > div.head {
    display: table-cell;
    border: solid 1px #000;
    
	text-align:center;
	font-weight:normal;
	height:50px;
	background:#fafafa;
}	



</style>
</head>

<body>
<table class="table" width="1330" style="border: none;"><!-- main table container -->
    <tr><!-- header content -->
        <td>
            <div style="width: 12%; float: left;"><img src="libs/img/sample_logo.png"/></div>
            <div style="width: 87%; float: left; text-align: center;">
                <h2>THAI HEART CALIBRATION CO.,LTD.</h2>
                <p style="width: 100%; text-align: center;">2299/12-13  หมู่ที่ 4 ต.เทพารักษ์ อ.เมือง จ.สมุทรปราการ 10270 เบอร์โทรศัพท์: 0-2394-2162, 0-2757-8435, 0-2757-9496 เบอร์แฟ๊ก: 0-2757-8507</p>
                <p style="width: 100%; text-align: center;">2299/12-13 Moo4, Thepharak, Muang, Samut Prakan 10270 Tel: 0-2394-2162, 0-2757-8435, 0-2757-9496 Fax: 0-2757-8507</p>
            </div>
        </td>
    </tr><!-- END : header content -->
    <tr><!-- line -->
        <td><hr class="table_border"/></td>
    </tr><!-- END : line -->
    <tr><!-- table content -->
        <td>

            <h2 style="text-align: center; margin: 10px 0 10px 0;">ใบขอทราบราคาสอบเทียบ / REQUEST FOR QUOTATION</h2>
            <table class="table text-left" style="width: 1330px; margin: 0 0 20px 0;"><!-- customer content -->
                <tr>
                    <td style="width: 33%">
                        <span style="width: 200px; border-bottom: none; float: left;">ชื่อผู้ติดต่อ / Customer's Name :</span>
                        <span class="seperator" style="width: 200px; float: left; text-align: left;"><?php echo $contact_name; ?></span>
                    </td>
                    <td style="width: 33%">
                        <span style="width: 150px; border-bottom: none; float: left;">แผนก / Dept. :</span>
                        <span class="seperator" style="width: 250px; float: left; text-align: left;"><?php echo $department_name; ?></span>
                    </td>
                    <td style="width: 33%">
                        <span style="width: 150px; border-bottom: none; float: left;">ตำแหน่ง / Position :</span>
                        <span class="seperator" style="width: 275px; float: left; text-align: left;"><?php echo $position_name; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width: 33%">
                        <span style="width: 200px; border-bottom: none; float: left;">ชื่อบริษัท / Company's Name :</span>
                        <span class="seperator" style="width: 1110px; float: left; text-align: left;"><?php echo $company_name; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width: 33%">
                        <span style="width: 200px; border-bottom: none; float: left;">ที่อยู่ / Address :</span>
                        <span class="seperator" style="width: 1110px; float: left; text-align: left;"><?php echo $company_address; ?></span>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%">
                        <span style="width: 200px; border-bottom: none; float: left;">โทรศัพท์ / Tel. :</span>
                        <span class="seperator" style="width: 200px; float: left; text-align: left;"><?php echo $phone_no; ?></span>
                    </td>
                    <td style="width: 33%">
                        <span style="width: 150px; border-bottom: none; float: left;">โทรสาร / Fax :</span>
                        <span class="seperator" style="width: 250px; float: left; text-align: left;"><?php echo $fax_no; ?></span>
                    </td>
                    <td style="width: 33%">
                        <span style="width: 150px; border-bottom: none; float: left;">อีเมล์ / E-mail :</span>
                        <span class="seperator" style="width: 275px; float: left; text-align: left;"><?php echo $email; ?></span>
                    </td>
                </tr>
            </table><!-- END : customer content -->
            <table class="table table_border" style="width: 1331px; margin: 10px 0 0 0;"><!-- item content -->
                <tr>
                    <td class="text-center" style=" height:50px; background:#f0f0f0;">ส่วนของลูกค้า</td>
                    <td class="text-center" style="width:181px; height:50px; background:#f0f0f0;">ส่วนของเจ้าหน้าที่</td>
                </tr>
               </table>
               <?php echo $item_in_list; ?><!-- END : item content -->
            <p style="text-align: right;">จำนวนหน้า 1/5</p>
            <p style="color: red;">หมายเหตุ : กรุณาใส่ข้อมูลให้ครบถ้วน โดยเฉพาะอย่างยิ่งช่องที่มีเครื่องหมาย * เพื่อประโยชน์ในการประเมินงานสอบเทียบ</p>
        </td>
    </tr><!-- END : table content -->
    <tr><!-- footer content -->
        <td>
            <p style="float: left;"></p>
            <p style="float: left;"><span style="border-bottom: none; float: left;">ข้อคิดเห็นเพิ่มเติม / Comment : </span><span class="seperator" style="width: 500px; float: right; "><?php echo " { CSR No. $CSR_NO }"; ?>&nbsp;</span></p>
            <p style="float: right;"><span style="border-bottom: none; float: left;">ร้องขอโดย / Request By : </span><span class="seperator" style="width: 500px; float: right; ">&nbsp;</span></p>
        </td>
    </tr><!-- END : footer content -->
    <tr><!-- remark -->
        <td>
            <p style="float: left;">F-016</p>
            <p style="float: right;">REV.03 05/06/56</p>
        </td>
    </tr><!-- END : remark -->
</table><!-- END : main table container -->
</body>
</html>
<?php $db->close(); ?>