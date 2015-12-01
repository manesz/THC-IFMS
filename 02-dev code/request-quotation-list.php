<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 12/9/2558
 * Time: 10:44 น.
 */
include("check-permission.php");


$quotaton_list='';
$sql="SELECT id, code_sale, code_year, code_month, code_no, code_revise, customer_id,update_dttm FROM "._TB_QUOTATION." WHERE publish='1' ORDER BY create_dttm DESC ";
$re=mysql_query($sql);

if (mysql_num_rows($re)>0) {
		while ($rs=mysql_fetch_array($re)) {
			$id=$rs['id'];
			$code_sale=$rs['code_sale'];
			$code_year=$rs['code_year'];
			$code_month=$rs['code_month'];
			$code_no=$rs['code_no'];
			$code_revise=$rs['code_revise'];
			$customer_id=$rs['customer_id'];
			
			$update_dttm=date("Y-m-d",strtotime($rs['update_dttm']));
			
			$quotaton_code="$code_sale-$code_year$code_month$code_no $code_revise";			
			$customer_name=$db->customer_name($customer_id);
			$num_item=count_item($id);
			
			
			
			$quotaton_list.='<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$customer_name.'</td>
                                    <td>'.$quotaton_code.'</td>
                                    <td>'.number_format($num_item).'</td>
                                    <td>'.$update_dttm.'</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="fa fa-cog"> จัดการ</i>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <!--                                            <li><a href="paper_item_description.php"><i class="fa fa-eye"> ดู</i></a></li>-->
                                                <li><a class="fancybox" href="paper_request_for_quotation.php?id='.$id.'" target="_blank"><i class="fa fa-eye"> ดู</i></a></li>
                                                <li><a href="request-quotation-edit.php?id='.$id.'"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
                                             
												<li><a href="#" onclick="delete_item(\''.$id.'\',\''.htmlspecialchars("$quotaton_code").'\');return false;"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>';
		//	$num_item=count_item($id);
			
		}
};


function count_item($quotation_id) {
	global $conn;

	$re=mysql_query("SELECT COUNT(quotation_id) AS NumItem FROM "._TB_QUOTATION_ITEM." WHERE quotation_id='$quotation_id' ");
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
                    <div class="content-panel col-xs-12  col-md-12">
                        <div class="col-xs-6 col-md-6" style="">
                            <h3><i class="fa fa-angle-right"></i> รายการใบขอทราบราคาสอบเทียบ</h3>
                        </div>
                        <div class="col-xs-6 col-md-6" style="text-align: right;">
                            <a href="request-quotation-add.php"> <button class="btn btn-success">เพิ่มใบขอทราบราคาสอบเทียบ</button> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="content-panel col-md-12">
                        <table id="departmentList" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <th width="30">#</th>
                            <th width="500">ชื่อลูกค้า</th>
                            <th width="100">Quotation No.</th>
                            <th width="100">จำนวนอุปกรณ์</th>
                            <th width="80">last updated</th>
                            <th width="50">edit</th>
                            </thead>
                            <tbody>
                            <?php echo $quotaton_list; ?>
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
		var chk=confirm("โปรดยืนยันการลบข้อมูล "+title+" !!");
		if (chk) {
			$.post("quotation-script.php",{'act':'delete','id':id},function(data) {
				window.location.href="request-quotation-list.php";
			});
		} else { return false; }
	}
</script>