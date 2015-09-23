<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 23:49 น.
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
            <div class="row" style=";">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <h3><i class="fa fa-angle-right"></i> <a href="department-list.php">รายการแผนก</a> <i class="fa fa-angle-right"></i> สร้างแผนกใหม่</h3>
                    </div>
                </div>
            </div>

            <div class="row" style=";">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <h4 class="mb"></h4>

                        <div class="alert alert-success"><b>บันทึกข้อมูลสำเร็จ</b> You successfully read this important alert message.</div>
                        <div class="alert alert-warning"><b>กรุณากรอกข้อมูลให้ครบถ้วน</b> Better check yourself, you're not looking too good.</div>
                        <div class="alert alert-danger"><b>ไม่สามารถสร้างแผนกได้</b> Change a few things up and try submitting again.</div>

                        <form class="form-horizontal style-form" method="get">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-sm-12 col-md-3 control-label">ชือแผนก</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-sm-12 col-md-3 control-label">รายละเอียด</label>
                                <div class="col-sm-12 col-md-9">
                                    <textarea class="form-control" rows="10"></textarea>
                                </div>
                            </div>

                    </div><!-- /content-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->

            <div class="row" style=";">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <div class="form-group col-lg-12">
                            <button type="button" class="btn btn-success btn-lg col-md-6" style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูล</button>
                            <button type="button" class="btn btn-default btn-lg col-md-3" style="float: right; margin: 0 5px 0 5px;">เคลียร์ข้อมูล</button>
                        </div>
                    </div>
                </div>
            </div>

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
    } );
</script>