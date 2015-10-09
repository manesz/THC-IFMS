<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 12/9/2558
 * Time: 10:44 น.
 */
include("check-permission.php");


$content='';


$SQL="SELECT id, company_name, phone_no, email, update_dttm FROM "._TB_CUSTOMER." WHERE publish='1' ";
$re=mysql_query($SQL);
$num=mysql_num_rows($re);

if ($num>0) {
	while ($rs=mysql_fetch_array($re)) {
		$id=$rs['id'];
		$company_name=stripslashes($rs['company_name']);
		$phone_no=stripslashes($rs['phone_no']);
		
		$email=$rs['email'];		
		$latest_update=$rs['update_dttm'];
		
		$content.='
			     <tr>
					<td>'.$id.'</td>
					<td>'.$company_name.' </td>
					<td>'.$phone_no.'</td>
					<td>'.$email.'</td>
					<td>'.$latest_update.'</td>
					<td>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								จัดการ
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="#"><i class="fa fa-eye"> ดู</i></a></li>
								<li><a href="customer-edit.php?id='.$id.'"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
								<li><a href="#" onclick="delete_item(\''.$id.'\',\''.htmlspecialchars("$comapny_name").'\');return false;"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
							</ul>
						</div>
					</td>
				</tr>
		';
		
	} //end whiel
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
                            <h3><i class="fa fa-angle-right"></i> รายการลูกค้า</h3>
                        </div>
                        <div class="col-md-6 right" style=" text-align: right;">
                            <a href="customer-add.php"> <button class="btn btn-success">เพิ่มลูกค้า</button> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel col-md-12">
                        <table id="departmentList" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <th width="50">#</th>
                            <th width="500">ชื่อลูกค้า</th>
                            <th width="100">เบอร์โทรศัพท์</th>
                            <th width="200">อีเมล</th>
                            <th width="100">last updated</th>
                            <th width="100">edit</th>
                            </thead>
                            <tbody>
                            	<?php echo $content; ?>
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
    });
	
	function delete_item(id, title) {
	var chk=confirm("โปรดยืนยันการลบข้อมูล "+title+" !!");
		if (chk) {
			$.post("customer-script.php",{'act':'delete','id':id},function(data) {
				window.location.href="customer-list.php";
			});
		} else { return false; }
	}
</script>