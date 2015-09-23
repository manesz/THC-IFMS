<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 12/9/2558
 * Time: 10:44 น.
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
        <section class="wrapper" style="">
            <div class="row" style="">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <h3><i class="fa fa-angle-right"></i> <a href="customer-list.php">รายการลูกค้า</a> <i class="fa fa-angle-right"></i> สร้างลูกค้า</h3>
                    </div>
                </div>
            </div><!-- /.row title -->

            <form class="form-horizontal style-form" method="post">

                <div class="row" style="">
                    <div class="col-lg-12">
                        <div class="content-panel col-lg-12">
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อบริษัท</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ที่อยู่</label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">เบอร์โทรศัพท์</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">โทรสาร </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">อีเมล</label>
                                <div class="col-lg-8"><input type="text" class="form-control"/></div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                            
                        </div><!-- /content-panel col-lg-12 -->
                    </div><!-- /col-lg-12 -->
                </div><!-- /.row -->

                <div class="row" style="">
                    <div class="col-lg-12">
                        <div class="content-panel col-lg-12">
                            <div class="form-group" style="padding: 0; margin: 0;">
                                <button type="button" class="btn btn-success btn-lg col-md-6" style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default btn-lg col-md-3" style="float: right; margin: 0 5px 0 5px;">เคลียร์ข้อมูล</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row title -->

            </form><!-- /form -->

        </section><!-- /.wrapper -->
    </section><!-- /#main-content -->
</section><!-- /#container -->

<?php include_once("footer.php"); ?>
<!--script for this page-->
<script src="libs/js/jquery.dataTables.min.js"></script>
<script src="libs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#requestList').DataTable();
        $('#itemList').DataTable();
//        $("#departmentList_filter").add
    } );
</script>
