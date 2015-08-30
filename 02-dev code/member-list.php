<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 14:56 น.
 */
include("check-permission.php");

$department_listbox=$db->department_listbox('');
$position_listbox=$db->position_listbox('');
$permission_listbox=$db->permission_listbox('');
	

$content='';

$SQL="SELECT id, f_name, l_name, position_id, department_id, permission_id, update_dttm, is_active FROM "._TB_MEMBER." WHERE publish='1' ";
$re=mysql_query($SQL);
$num=mysql_num_rows($re);

if ($num>0) {
	while ($rs=mysql_fetch_array($re)) {
		$id=$rs['id'];
		$f_name=stripslashes($rs['f_name']);
		$l_name=stripslashes($rs['l_name']);
		
		$position_id=$rs['position_id'];
		$department_id=$rs['department_id'];
		$permission_id=$rs['permission_id'];
		$latest_update=$rs['update_dttm'];
		$is_active=$rs['is_active'];

		$name = "$f_name &nbsp; $l_name";
		
		$position_title=$db->get_position_title($position_id);
		$department_title=$db->get_department_title($department_id);
		$permission_title=$db->get_permission_title($permission_id);
		
		$active=($is_active=='1' ? '<span class="label label-success">On</span>' : '<span class="label label-danger">Off</span>');
		
		$content.='
			     <tr>
					<td>'.$id.'</td>
					<td>'.$name.' </td>
					<td>'.$position_title.'</td>
					<td>'.$department_title.'</td>
					<td>'.$permission_title.'</td>
					
					<td>'.$latest_update.'</td>
					<td>'.$active.'</td>
					<td>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								จัดการ
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="#"><i class="fa fa-eye"> ดู</i></a></li>
								<li><a href="member-edit.php?id='.$id.'"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
								<li><a href="#" onclick="delete_item(\''.$id.'\',\''.htmlspecialchars("$f_name $l_name").'\');return false;"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
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
             <div class="row vertical-align">
                <div class="col-sm-8"><h3><i class="fa fa-angle-right"></i> รายชื่อพนักงาน</h3></div>
                <div class="col-sm-4 text-right"><a class="btn btn-primary" href="member-add.php"><span class="glyphicon glyphicon-plus"></span> เพิ่มพนักงานใหม่</a></div>            
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> ค้นหาข้อมูล : </h4>

                        <form class="form-horizontal style-form" method="get">
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">ชื่อ - นามสกุล</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">ตำแหน่ง</label>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-control" name="position_id" id="position_id">
                                    <option value="">-- ทั้งหมด --</option>
                                       <?php echo $position_listbox; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">แผนก</label>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-control" name="department_id" id="department_id">
                                    	<option value="">-- ทั้งหมด --</option>
                                      <?php echo $department_listbox; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">สถานะเปิดใช้งาน</label>
                                <div class="col-sm-12 col-md-9">
                                   <select class="form-control" name="department_id" id="department_id">
                                    	<option value="">-- ทั้งหมด --</option>
                                         <option value="1">On</option>
                                         <option value="0">Off</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">สิทธิการใช้โปรแกรม</label>
                                <div class="col-sm-12 col-md-9">
                                       <select class="form-control" name="permission_id" id="permission_id">
                                    	<option value="">-- ทั้งหมด --</option>
                                      <?php echo $permission_listbox; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-md-push-2">
                                <button type="button" class="btn btn-primary btn-lg col-md-12" style="float: right; margin: 0 5px 0 5px;">ค้นหาข้อมูล</button>
                            </div>
                        </form>

                        <div class="clearfix"></div><hr/>
                        <table id="customerList" class="table table-bordered table-striped">
                            <thead>
                                <td width="100">#</td>
                                <td width="200">ชื่อ - นามสกุล</td>
                                <td width="100">ตำแหน่ง</td>
                                <td width="100">แผนก</td>
                                <td width="100">สิทธิการใช้งาน</td>
                                <td width="100">last updated</td>
                                <td width="50">สถานะ</td>
                                <td width="50">edit</td>
                            </thead>
                          <tbody>
                            	<?php echo $content; ?>
                            </tbody>   
                        </table>
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
<script>
$(document).ready(function() {
    $('#customerList').DataTable();
    $("#customerList_filter").add
} );

function delete_item(id, title) {
	var chk=confirm("โปรดยืนยันการลบข้อมูล "+title+" !!");
	if (chk) {
		$.post("member-script.php",{'act':'delete','id':id},function(data) {
			window.location.href="member-list.php";
		});
	} else { return false; }
}
</script>
