<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 23:34 น.
 */

include("check-permission.php");
$content='';

//`id`, `title`, `create_dttm`, `update_dttm`, `publish`, `parent_id`, `create_person`

$SQL="SELECT id, title, parent_id,  update_dttm FROM "._TB_ITEM_ACCESSORIES." WHERE publish='1' AND parent_id='0' ORDER BY id ";
$re=mysql_query($SQL);
$num=mysql_num_rows($re);

if ($num>0) {
	$n=1;
	
	while ($rs=mysql_fetch_array($re)) {
		$id=$rs['id'];
		$title=stripslashes($rs['title']);
		$parent_id=$rs['parent_id'];
		$latest_update=$rs['update_dttm'];
		
		$sub='';
		$sub=$db->item_accessories_list($n, $id);
		
		$content.='
			                  <tr>
                                <td>'.$n.'</td>
                                <td>'.$title.'</td>
                                <td>'.$latest_update.'</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-cog"> จัดการ</i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="item-accessories-edit.php?id='.$id.'"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
                                            <li><a href="#" onclick="delete_item(\''.$id.'\',\''.htmlspecialchars($title).'\');return false;"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                   	'.$sub;
		
		$n++;
					
					
		
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
                <div class="col-sm-8"><h3><i class="fa fa-angle-right"></i> รายชื่อ Accessories</h3></div>
                <div class="col-sm-4 text-right"><a class="btn btn-primary" href="item-accessories-add.php"><span class="glyphicon glyphicon-plus"></span> เพิ่ม Accessory ใหม่</a></div>            
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <table id="positionList" class="table table-bordered table-striped">
                            <thead>
                            <td width="100">#</td>
                            <td width="500">ตำแหน่ง</td>
                            <td width="100">last updated</td>
                            <td width="50">edit</td>
                            </thead>
                            <?php echo $content; ?>
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
        $('#positionList').DataTable();
//        $("#positionList_filter").add
    } );
	
function delete_item(id, title) {
	var chk=confirm("โปรดยืนยันการลบข้อมูล "+title+" !!");
	if (chk) {
		$.post("item-accessories-script.php",{'act':'delete','id':id},function(data) {
			window.location.href="item-accessories-list.php";
		});
	} else { return false; }
}
</script>