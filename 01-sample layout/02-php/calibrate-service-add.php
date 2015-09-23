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
                        <h3><i class="fa fa-angle-right"></i> <a href="calibrate-service-list.php">รายการใบขอรับบริการสอบเทียบ</a> <i class="fa fa-angle-right"></i> สร้างใบขอรับบริการสอบเทียบ</h3>
                    </div>
                </div>
            </div><!-- /.row title -->

            <form class="form-horizontal style-form" method="post">

                <div class="row" style="">
                    <div class="col-lg-12">
                        <div class="content-panel col-lg-12">
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">Quotation No.</label>
                                <div class="col-lg-8">
                                    <select class="selectBox js-states form-control">
                                        <option value="27-1509005">27-1509005</option>
                                        <option value="27-1509092">27-1509002</option>
                                        <option value="27-1510035">27-1510035</option>
                                        <option value="27-1511025">27-1511025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อผู้ติดต่อ</label>
                                <div class="col-lg-8">
                                    <select class="selectBox js-states form-control">
                                        <option value="21">21</option>
                                        <option value="21">35</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อพนักงานขาย</label>
                                <div class="col-lg-8">
                                    <select class="selectBox js-states form-control">
                                        <option value="21">21</option>
                                        <option value="21">35</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">Cert สำหรับ </label>
                                <div class="col-lg-8">
                                    <select class="selectBox js-states form-control">
                                        <option value="21">21</option>
                                        <option value="21">35</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ที่อยู่</label>
                                <div class="col-lg-8"><input type="text" class="form-control"/></div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">โทรสาร</label>
                                <div class="col-lg-8"><input type="text" class="form-control"/></div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">โทรศัพท์</label>
                                <div class="col-lg-8"><input type="text" class="form-control"/></div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">ชื่อบริษัท</label>
                                <div class="col-lg-8">
                                    <select class="selectBox js-states form-control">
                                        <option value="21">21</option>
                                        <option value="21">35</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-responsive">
                                        <tr>
                                            <td style="width: 30%;">ขื่อ</td>
                                            <td style="width: 70%;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;">ที่อยู่</td>
                                            <td style="width: 70%;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;">โทรศัพท์</td>
                                            <td style="width: 70%;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;">โทรสาร</td>
                                            <td style="width: 70%;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;">อีเมล</td>
                                            <td style="width: 70%;"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6" style="">
                                <button class="btn btn-danger">ลบอุปกรณ์</button>
                            </div>
                            <div class="col-lg-12" style="">
                                <table id="requestList" class="table table-bordered table-striped table-responsive" style="width: 100%; margin: 10px 0 10px 0;"><!-- item content -->
                                    <thead>
                                        <th class="text-center" style="width: 30px;"><input type="checkbox"/></th>
                                        <th class="text-center" style="width: 300px;">Description</th>
                                        <th class="text-center" style="width: 100px;">Manufacturer</th>
                                        <th class="text-center" style="width: 100px;">Model</th>
                                        <th class="text-center" style="width: 120px;">Serial No.</th>
                                        <th class="text-center" style="width: 100px;">ID No.</th>
                                        <th class="text-center" style="width: 300px;">Calibration Point</th>
                                        <th class="text-center" style="width: 100px;">Cert No.</th>
                                        <th class="text-center" style="width: 100px;">Quotation</th>
                                    </thead>
                                    <tbody>
                                    <?php for($i=1;$i<=10;$i++):?>
                                        <tr style="text-align: center;">
                                            <td><input type="checkbox"/></td><!-- NO. -->
                                            <td>Steel Ruler</td><!-- description -->
                                            <td>SHINWA</td><!-- manufacturer -->
                                            <td>-</td><!-- model -->
                                            <td>n/a</td><!-- serial no. -->
                                            <td>01</td><!-- id no. -->
                                            <td>0-2000 mm. </td><!-- calibrate point -->
                                            <td>THD-00109/15</td><!-- cert no. -->
                                            <td>27-1510034</td><!-- quotation no. -->
                                        </tr>
                                    <?php endfor; ?>
                                    </tbody>
                                </table><!-- END : customer content -->
                            </div>

                            <div class="clearfix form-group col-sm-12 col-md-12" style="float: right; text-align: right;">
                                <button class="btn btn-primary col-lg-4" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="float: right; text-align: center;">
                                    เพิ่มอุปกรณ์
                                </button>
                            </div><!-- /hidden button -->
                            <div class="collapse" id="itemDescription" style="margin-top: 20px;"><!-- itemDescription tab -->

                                <h4>รายการอุปกรณ์ทั้งหมด</h4>
                                <button class="btn btn-success col-lg-12" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="margin: 0 0 20px 0;">
                                    บันทึกข้อมูลจำนวนอุปกรณ์
                                </button>
                                <table id="itemList" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <th width="30"><input type="checkbox" class=""/></th>
                                    <th width="30">#</th>
                                    <th width="500">ชื่ออุปกรณ์</th>
                                    <th width="80">Manufacturer</th>
                                    <th width="80">Model</th>
                                    <th width="300">Customer</th>
                                    <th width="100">last updated</th>
                                    </thead>
                                    <?php for($i=1;$i<=100;$i++):?>
                                        <tr>
                                            <td><input type="checkbox" class="form-control"/></td>
                                            <td><?php echo $i; ?></td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td><?php echo date("d-m-Y"); ?></td>
                                        </tr>
                                    <?php endfor; ?>
                                </table>
                                <button class="btn btn-success col-lg-12" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="margin: 0 0 20px 0;">
                                    บันทึกข้อมูลจำนวนอุปกรณ์
                                </button>
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
