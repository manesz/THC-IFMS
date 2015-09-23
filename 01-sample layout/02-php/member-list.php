<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 14:56 น.
 */
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
            <div class="row" style=""><!-- row title -->
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <div class="col-lg-6" style="float: left;">
                            <h3><i class="fa fa-angle-right"></i> รายการผู้ใช้งาน</h3>
                        </div>
                        <div class="col-lg-6" style="float: right; text-align: right;">
                            <a href="member-add.php"> <button class="btn btn-success">เพิ่มผู้ใช้งาน</button> </a>
                        </div>
                    </div>
                </div>
            </div><!-- END : row title -->

            <div class="row" style=""><!-- row search  -->
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <p class="mb"><i class="fa fa-angle-right"></i> ค้นหาข้อมูล : </p>
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
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">แผนก</label>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">สถานะเปิดใช้งาน</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">สิทธิการใช้โปรแกรม</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-md-push-2">
                                <button type="button" class="btn btn-primary btn-lg col-md-12" style="float: right; margin: 0 5px 0 5px;">ค้นหาข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- END : row search -->

            <div class="row"><!-- END : row table content -->
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <table id="customerList" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <td width="100">#</td>
                                <td width="200">ชื่อ - นามสกุล</td>
                                <td width="100">ตำแหน่ง</td>
                                <td width="100">แผนก</td>
                                <td width="100">สิทธิการใช้งาน</td>
                                <td width="100">last updated</td>
                                <td width="50">edit</td>
                            </thead>
                            <?php for($i=1;$i<=100;$i++ ):?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            จัดการ
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">ดู</a></li>
                                            <li><a href="#">แก้ไข</a></li>
                                            <li><a href="#">ลบ</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endfor; ?>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- END : row table content -->

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
</script>
