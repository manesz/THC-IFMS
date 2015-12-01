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
 $total_page='';
 
 $id=$_GET['id'];
 

if (isset($_GET['id']) && $id!="") {
	
		$sql="SELECT * FROM "._TB_CSR." WHERE id='$id' AND publish='1' LIMIT 1; ";
		$re=mysql_query($sql);
		
		if (mysql_num_rows($re)>0) {
					$rs=mysql_fetch_array($re);
						
						$code_year=$rs['code_year'];
						$code_no=$rs['code_no'];
						
						$code_sale=$rs['code_sale'];
						
						$quotation_no=$rs['quotation_no'];
						$contact_name=stripslashes($rs['contact_name']);
						$cert_for=stripslashes($rs['cert_for']);
						
						$address=stripslashes($rs['address']);
						$fax=stripslashes($rs['fax']);
						$telephone=stripslashes($rs['telephone']);			
						
						$customer_id=$rs['customer_id'];
						
						$csr_code="$code_no/$code_year";									
						$sale_name=$db->member_name($code_sale);
						
						$CSR_NO=$db->csr_no_format($code_no,$code_year);
						
						$is_status=$rs['status'];
						$Status=($is_status=='i' ? ' In-Lab ' : 'On-Site');
						
							//Get company information -----------------

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
								
								while ($rs2=mysql_fetch_array($re2)) {
									
										$item_id=$rs2['id'];
										$quotation_no=$rs2['quotation_no'];										
									
										
										$create_dttm=$rs2['create_dttm'];
										$update_dttm=$rs2['update_dttm'];
										
										
										$item_code_prefix=$rs2['item_code_prefix'];
										$item_code_day=$rs2['item_code_day'];
										$item_code_month=$rs2['item_code_month'];
										$item_code=$rs2['item_code'];
										$item_code_year=$rs2['item_code_year'];
										
										
										
										$equipment_name=stripslashes($rs2['equipment_name']);
										$model=stripslashes($rs2['model']);
										$resolution=stripslashes($rs2['resolution']);
										
										$serial_no=stripslashes($rs2['serial_no']);
										$id_no=stripslashes($rs2['id_no']);
										
										$manufacturer=stripslashes($rs2['manufacturer']);
										$calibrate_result=stripslashes($rs2['calibrate_result']);
										$iso017025=$rs2['iso017025'];
								
										$ISO=($iso017025=='1' ? 'Yes' : '-');
										
										if ($calibrate_result=='D') { $Calibrate="Done"; }
										if ($calibrate_result=='R') { $Calibrate="Repairing"; }
										if ($calibrate_result=='B') { $Calibrate="Broken"; }
										
										
										
										//$quotation_no=$db->quotation_format_from_id($quotation_no);
										$item_no=$db->item_no_format($item_code_prefix,$item_code_day,$item_code_month,$item_code,$item_code_year);
									
										$item_in_list.='   
										  <tr style="text-align: center;">
											<td>'.$n.'</td><!-- NO. -->
											<td>'.$equipment_name.'</td><!-- description -->
											<td>'.($manufacturer!="" ? $manufacturer : '-').'</td><!-- manufacturer -->
											<td>'.($model!="" ? $model : '-').'</td><!-- model -->
											<td>'.($serial_no!="" ? $serial_no : 'n/a').'</td><!-- serial no. -->
											<td>'.($id_no!="" ? $id_no : '-').'</td><!-- id no. -->
											<td>'.($calibrate_result!="" ? $calibrate_result : '-').'</td><!-- calibrate point -->
											<td><div id="item_no_'.$n.'">'.$item_no.'</div></td><!-- cert no. -->
											<td>'.$quotation_no.'</td><!-- quotation no. -->
											<td style="text-align: center;"><div id="barcode_'.$n.'"></div></td><!-- barcode -->
										</tr>';
										
										
										
						
										$n++;
										
									
								}
						}
						
			//end get item
		}//end csr info

} else {
$db->close();
exit;	
}


 $pages="1/$total_page";
 
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
</head>

<body>
<table class="table" width="1330" style="border: none;"><!-- main table container -->
    <tr><!-- header content -->
        <td>

            <div style="width: 200px; float: left;"><img src="libs/img/sample_logo.png"/></div>
            <div style="width: 700px; float: left; text-align: center;">
                <h2>THAI HEART CALIBRATION CO.,LTD.</h2>
                <p style="width: 100%; text-align: center;">2299/12-13  หมู่ที่ 4 ต.เทพารักษ์ อ.เมือง จ.สมุทรปราการ 10270 เบอร์โทรศัพท์: 0-2394-2162, 0-2757-8435, 0-2757-9496 เบอร์แฟ๊ก: 0-2757-8507</p>
                <p style="width: 100%; text-align: center;">2299/12-13 Moo4, Thepharak, Muang, Samut Prakan 10270 Tel: 0-2394-2162, 0-2757-8435, 0-2757-9496 Fax: 0-2757-8507</p>
            </div>
            <div style="width: 400px; float: right; margin: 25px 0 0 0;">
                <table class="table table_border" style="float: right; margin: 0 0 0 0;">
                    <tr>
                        <td colspan="4" style="padding: 5px; text-align: center;">
                            <span style="border-bottom: none; float: left;">CSR No. : </span>
                            <span class="seperator" style="width: 330px; float: left; text-align: center; font-size: 12px;">NO.<?php echo $CSR_NO; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" style="width: 90px; padding: 5px;"><?php echo $Status; ?></td>
                        <td class="text-center" style="width: 100px; padding: 5px;">
                            <span style="border-bottom: none; float: left;">Lab : </span>
                            <span class="seperator" style="width: 50px; float: left; text-align: center;">THE-00</span>
                        </td>
                        <td class="text-center" style="width: 110px; padding: 5px;">
                            <span style="width: 40px; border-bottom: none; float: left;">จำนวน : </span>
                            <span class="seperator" style="width: 50px; float: left; text-align: center;"><?php echo number_format($num_items); ?></span>
                        </td>
                        <td class="text-center" style="width: 100px; padding: 5px;">
                            <span style="width: 40px; border-bottom: none; float: left;">หน้า : </span>
                            <span class="seperator" style="width: 50px; float: left; text-align: center;"><?php echo $pages; ?></span>
                        </td>
                    </tr>
                </table>
            </div>

        </td>
    </tr><!-- END : header content -->
    <tr><!-- line -->
        <td><hr class="table_border"/></td>
    </tr><!-- END : line -->
    <tr><!-- table content -->
        <td>

            <h2 style="text-align: center; margin: 10px 0 10px 0;">ใบขอรับบริการสอบเทียบ / CALIBRATION SERVICE REUEST</h2>
            <table class="table " style="margin: 30px 0 10px 0;"><!-- customer content -->
                <tr>
                    <td width="700px"><b>1) รายละเอียดลูกค้า</b></td>
                    <td width="600px">
                        <span style="width: 100px; border-bottom: none; float: left;">ชื่อพนักงานขาย : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;"><?php echo $sale_name; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">ชื่อผู้ติดต่อ : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;"><?php echo ($contact_name !="" ? $contact_name : '&nbsp;');  ?></span>
                    </td>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">วันที่ : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;">&nbsp;</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">ชื่อบริษัท : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;"><?php echo $company_name;  ?></span>
                    </td>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">Cert สำหรับ : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;"><?php echo ($cert_for !="" ? $cert_for : '&nbsp;');  ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">ที่อยู่ : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;"><?php echo ($company_address !="" ? $company_address : '&nbsp;');  ?></span>
                    </td>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">ที่อยู่ : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;"><?php echo ($address !="" ? $address : '&nbsp;');  ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">โทรศัพท์ : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;"><?php echo ($phone_no !="" ? $phone_no : '&nbsp;');  ?></span>
                    </td>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">โทรศัพท์ : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;">&nbsp;</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">โทรสาร : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;"><?php echo ($fax_no !="" ? $fax_no : '&nbsp;');  ?></span>
                    </td>
                    <td>
                        <span style="width: 100px; border-bottom: none; float: left;">โทรสาร : </span>
                        <span class="seperator" style="width: 500px; float: left; text-align: left;">&nbsp;</span>
                    </td>
                </tr>
            </table><!-- END : customer content -->
            <table class="table " style="margin: 30px 0 10px 0;"><!-- item summary content -->
                <tr>
                    <td width="150px"><b>2) รายละเอียดเครื่องมือ : </b></td>
                    <td width="900px"></td>
                    <td width="250px"></td>
                </tr>
            </table><!-- END : item summary content -->
            <table class="table table_border" style="width: 1330px; margin: 10px 0 10px 0;"><!-- item content -->
                <thead>
                        <th style="width: 30px;">No.</th>
                        <th style="width: 300px;">Description</th>
                        <th style="width: 100px;">Manufacturer</th>
                        <th style="width: 100px;">Model</th>
                        <th style="width: 100px;">Serial No.</th>
                        <th style="width: 100px;">ID No.</th>
                        <th style="width: 300px;">Calibration Point</th>
                        <th style="width: 100px;">Cert No.</th>
                        <th style="width: 100px;">Quotation</th>
                        <th style="width: 100px;">Barcode</th>
                </thead>
                <tbody>
                  <?php echo $item_in_list; ?>
                </tbody>
            </table><!-- END : customer content -->
            <table class="table table_border" style="width: 100%; margin: 0; float: right;">
                <tr>
                    <td style="width: 75%; padding: 10px;">
                        <h4>ลูกค้ารับเครื่องมือ</h4>
                        <p>ข้าพเจ้าขอยืนยันว่าได้รับการตรวจรับเครื่องมือตามรายการข้างต้นทั้งหมดว่าครบถ้วนและอยู่ในสภาพเรียบร้อย</p>
                    </td>
                    <td style="width: 25%; padding: 10px;">
                        <p>
                            <span style="border-bottom: none; float: left; width: 50px;">ลงชื่อ</span>
                            <span class="seperator" style="width: 200px; float: left; text-align: center; font-size: 12px;">&nbsp;</span>
                        </p>
                        <p style="clear: both; margin-top: 30px;">
                            <span style="border-bottom: none; float: left; width: 50px;">วันที่</span>
                            <span class="seperator" style="width: 200px; float: left; text-align: center; font-size: 12px;">&nbsp;</span>
                        </p>
                    </td>
                </tr>
            </table>
<!--            <table class="table table_border" style="width: 1330px; margin: 0 0 0 0;"><!-- footer content -->
<!--                <tr>-->
<!--                    <td style="width: 15%; vertical-align: top;" rowspan="2">-->
<!--                        <h4>ลุกค้าผู้ส่งเครื่องมือ</h4>-->
<!--                        <p>ข้าพเข้าขอยืนยันว่าข้อความข้างต้นในเอกสารฉบับนี้ถูกต้องสมบรูณ์ และเป็นไปตามที่ข้าพเจ้าต้องการ</p><br/><br/><br/>-->
<!--                        <p>ลงชื่อ</p>-->
<!--                        <p>วันที่</p>-->
<!--                    </td>-->
<!--                    <td style="width: 10%; font-size: 12px;" colspan="5">-->
<!--                        <h4>หมายเหตุ : <span>1. อุปกรณ์เสริมของเครื่องมือ และ 2. การบรรจุหีบห่อเครื่องมือจากลูกค้า</span></h4>-->
<!--                        <p>-->
<!--                           1.1)สายไฟ, Probe/Sensor, Data Link  1.2)สาย Adapter, หม้อแปลงไฟฟ้า  1.3)ขั้วต่อเครื่องมือ  1.4)คู่มือการใช้งาน  1.5)Battery Charger  1.6)อื่นๆ(โปรดระบุ)<br/><br/>-->
<!--                           2.1)กล่องเครื่องมือ/ซองใส่เครื่องมือ  2.2)กล่องกระดาษ  2.3)หุ้มด้วยพลาสติกกันกระแทก  2.4)อื่นๆ(โปรดระบุ)<br/><br/>-->
<!--                        </p>-->
<!--                    </td>-->
<!--                    <td style="width: 15%; vertical-align: top;" rowspan="2">-->
<!--                        <h4>ลูกค้ารับเครื่องมือ</h4>-->
<!--                        <p>ข้าพเจ้าขอยืนยันว่าได้รับการตรวจรับเครื่องมือตามรายการข้างต้นทั้งหมดว่าครบถ้วนและอยู่ในสภาพเรียบร้อย</p><br/><br/>-->
<!--                        <p>ลงชื่อ</p>-->
<!--                        <p>วันที่</p>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td style="width: 10%">-->
<!--                        <h4>เจ้าหน้าที่รับเครื่องมือ</h4>-->
<!--                        <p>ลงชื่อ</p>-->
<!--                        <p>วันที่</p>-->
<!--                    </td>-->
<!--                    <td style="width: 10%">-->
<!--                        <h4>เจ้าหน้าที่สอบเทียบ</h4>-->
<!--                        <p>ลงชื่อ</p>-->
<!--                        <p>วันที่</p>-->
<!--                    </td>-->
<!--                    <td style="width: 10%">-->
<!--                        <h4>เจ้าหน้าที่ออกใบ Cert.</h4>-->
<!--                        <p>ลงชื่อ</p>-->
<!--                        <p>วันที่</p>-->
<!--                    </td>-->
<!--                    <td style="width: 10%">-->
<!--                        <h4>เจ้าหน้าที่การเงิน</h4>-->
<!--                        <p>ลงชื่อ</p>-->
<!--                        <p>วันที่</p>-->
<!--                    </td>-->
<!--                    <td style="width: 10%">-->
<!--                        <h4>เจ้าหน้าทส่งเครื่องมือ</h4>-->
<!--                        <p>ลงชื่อ</p>-->
<!--                        <p>วันที่</p>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            </table><!-- END : footer content -->

        </td>
    </tr><!-- END table content -->
    <tr><!-- remark -->
        <td>
            <p style="float: left;">F-008</p>
            <p style="float: right;">REV.02 23/03/54</p>
        </td>
    </tr><!-- END : remark -->
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
	
	
	var n_item="<?php echo $n; ?>";
	
	if (n_item>0) {
		for (n=1;n<n_item;n++) {
			var item_no=$("#item_no_"+n).html();
			$("#barcode_"+n).barcode(item_no, "code128",{barWidth:1, barHeight:25, fontSize:12,});     
		}
	
	}
	//{barWidth:2, barHeight:30}
});
</script>
</body>
</html><?php $db->close(); ?>