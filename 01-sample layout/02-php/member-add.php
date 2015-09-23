<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 21:01 น.
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
        <section class="wrapper" style="height: auto;">
            <div class="row" style=";">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <h3><i class="fa fa-angle-right"></i> <a href="member-list.php">รายการผู้ใช้งาน</a> <i class="fa fa-angle-right"></i> สร้างผู้ใช้งาน</h3>
                    </div>
                </div>
            </div>
            <div class="row" style=";">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">

                        <div class="alert alert-success"><b>บันทึกข้อมูลสำเร็จ</b> You successfully read this important alert message.</div>
                        <div class="alert alert-warning"><b>กรุณากรอกข้อมูลให้ครบถ้วน</b> Better check yourself, you're not looking too good.</div>
                        <div class="alert alert-danger"><b>ไม่สามารถสร้างผู้ใช้งานได้</b> Change a few things up and try submitting again.</div>

                        <form class="form-horizontal style-form" method="post">
                            <div class="form-group col-sm-12 col-md-6 text-center">
                                <div class="col-sm-12 col-md-12 text-center">
                                    <img src="libs/img/friends/fr-06.jpg" class="img-circle" width="150">
                                </div><br/>
                                <div class="col-sm-12 col-md-12 text-center">
                                    <input type="file" class="form-control" style="margin-top: 10px;"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 text-center">
                                <label class="col-sm-12 col-md-3 control-label">เปิดใช้งาน</label>
                                <div class="switch has-switch">
                                    <input type="checkbox" checked="" data-toggle="switch" />
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">ชือ</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">นามสกุล</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">เบอรติดต่อ</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">เบอร์มือถือ</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">อีเมล</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control">
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
                                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
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
                                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">สิทธิการใช้โปรแกรม</label>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                </div>
                            </div>
                    </div><!-- /content-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->

            <div class="row" style=";"><!-- row submit button -->
                <div class="col-lg-12"><!-- col-lg-12 submit button -->
                    <div class="content-panel col-lg-12" style="min-height: 75px;"><!-- content-panel -->
                        <div class="form-group">
                            <button type="button" class="btn btn-success btn-lg col-md-6" style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูล</button>
                            <button type="button" class="btn btn-default btn-lg col-md-3" style="float: right; margin: 0 5px 0 5px;">เคลียร์ข้อมูล</button>
                        </div>
                    </div><!-- END : content-panel -->
                </div><!-- END : col-lg-12 submit button -->
            </div><!-- END : row submit button -->

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
//        $("#customerList_filter").add
    } );
</script>
