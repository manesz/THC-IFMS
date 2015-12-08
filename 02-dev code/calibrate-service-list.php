<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 12/9/2558
 * Time: 10:44 น.
 */
include("check-permission.php"); 

$csr_list='';



$sql="SELECT * FROM "._TB_CSR." WHERE publish<>'0' ORDER BY create_dttm DESC ";
$re=mysql_query($sql);


//	//`id`, `code_no`, `code_year`, `code_sale`, `quotation_no`, `contact_name`, `cert_for`, `address`, `fax`, `telephone`, `create_dttm`, `update_dttm`, `publish`, `customer_id`, `create_person`

$Num=mysql_num_rows($re);
if ($Num>0) {
		while ($rs=mysql_fetch_array($re)) {
			$id=$rs['id'];
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
			
			$publish=$rs['publish'];
			
			$update_dttm=date("Y-m-d",strtotime($rs['update_dttm']));
			
			$csr_code="$code_no/$code_year";			
			
			$customer_name=$db->customer_name($customer_id);
			$num_item=count_item($id);
			
			$LotNo='-';
			$QuotationNo=$quotation_no;
			$InvoiceNo='-';
			
			$LotNo=$csr_code;
			
			$td_bg='';
			$text_status='';
			if ($publish=='2') { //สถานะยกเลิก
				$td_bg=' style="background-color:#bbb"; ';				
				$text_status=' <span style="color:#f00;font-size:16px;">** ยกเลิก **</span>';
			}
						
			$csr_list.='<tr>
                                    <td '.$td_bg.'>'.$id.'</td>
                                    <td '.$td_bg.'>'.$customer_name.' '.$text_status.'</td>
                                    <td '.$td_bg.'>'.$LotNo.'</td>
									<td '.$td_bg.'>'.$QuotationNo.'</td>
									<td '.$td_bg.'>'.$InvoiceNo.'</td>
                                    <td '.$td_bg.'>'.number_format($num_item).'</td>
									 <td '.$td_bg.'>'.$code_sale.'</td>
                                    <td '.$td_bg.'>'.$update_dttm.'</td>
                                    <td '.$td_bg.'>
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="fa fa-cog"> จัดการ</i>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <!--   <li><a href="paper_item_description.php"><i class="fa fa-eye"> ดู</i></a></li>-->
                                                <li><a class="fancybox" href="paper_calibration_service_request.php?id='.$id.'" target="_blank"><i class="fa fa-eye"> ดูใบ CSR</i></a></li>
												<li><a class="fancybox" href="paper_request_for_quotation.php?id='.$id.'" target="_blank"><i class="fa fa-eye"> ดูใบขอทราบราคาสอบเทียบ</i></a></li>
                                                <li><a href="calibrate-service-edit.php?id='.$id.'"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>   
												<li><a href="#" onclick="cancel_item(\''.$id.'\',\''.htmlspecialchars("$csr_code").'\');return false;"><i class="fa fa-times" style="color: red;"> ยกเลิก</i></a></li>                                          
												<li><a href="#" onclick="delete_item(\''.$id.'\',\''.htmlspecialchars("$csr_code").'\');return false;"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>';
			
		}
};


function count_item($csr_id) {
	global $conn;

	$re=mysql_query("SELECT COUNT(id) AS NumItem FROM "._TB_ITEM." WHERE csr_id='$csr_id' AND publish<>'0' ");
	$num_item=mysql_result($re,0);
	return $num_item;

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
        <section class="wrapper">
            <div class="row" style="">
                <div class="col-md-12">
                    <div class="content-panel col-sm-12 col-md-12">
                        <div class="col-md-6 left" style="">
                            <h3><i class="fa fa-angle-right"></i> รายการใบขอรับบริการสอบเทียบ</h3>
                        </div>
                        <div class="col-md-6 right" style=" text-align: right;">
                            <a href="calibrate-service-add.php"> <button class="btn btn-success">เพิ่มใบขอรับบริการสอบเทียบ</button> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel col-md-12">
                        <table id="departmentList" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <th width="30">#</th>
                            <th width="500">ชื่อลูกค้า</th>
                            <th width="300">Lot No.</th>
                            <th width="130">Quotation No.</th>
                            <th width="100">Invoice No.</th>
                            <th width="80">จำนวนอุปกรณ์</th>
                            <th width="80">Sale ID</th>
                            <th width="50">last updated</th>
                            <th width="50">edit</th>
                            </thead>
                        <tbody>
                        <?php echo $csr_list; ?>
                        </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
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
<script>
    $(document).ready(function() {
        $('#departmentList').DataTable();
//        $("#departmentList_filter").add
    } );
	
	function delete_item(id, title) {
		var chk=confirm("คำเตือน!!\nCSR จะถูกลบถาวร และ CSR No. นี้จะถูกแทนที่เมื่อมีการเพิ่ม CSR ใหม่\n\nโปรดยืนยันการลบ CSR No. ["+title+"] !!\n\n");
		if (chk) {
			$.post("calibrate-service-script.php",{'act':'delete-csr','id':id},function(data) {
				window.location.href="calibrate-service-list.php";
			});
		} else { return false; }
	}
	
	function cancel_item(id, title) {
		var chk=confirm("โปรดยืนยันการยกเลิก CSR No.  ["+title+"] !!\n\n");
		if (chk) {
			$.post("calibrate-service-script.php",{'act':'cancel-csr','id':id},function(data) {
				window.location.href="calibrate-service-list.php";				
			});
		} else { return false; }
	}
</script>