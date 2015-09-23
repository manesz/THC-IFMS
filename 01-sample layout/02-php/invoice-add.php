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
                <div class="col-md-12">
                    <div class="content-panel col-md-12">
                        <h3><i class="fa fa-angle-right"></i> <a href="request-quotation-list.php">รายการใบวางบิล</a> <i class="fa fa-angle-right"></i> สร้างรายการใบวางบิล</h3>
                    </div>
                </div>
            </div><!-- /.row title -->

            <form class="form-horizontal style-form" method="post">

                <div class="row" style="">
                    <div class="col-md-12">
                        <div class="content-panel col-md-12">
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">เลขที่ใบวางบิล </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-md-4 control-label">เอกสารใบวางบิล (PDF) </label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control"/>
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
                                <label class="col-sm-12 col-md-4 control-label">ชื่อลูกค้า</label>
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
                                            <td style="width: 30%;">ขื่อบริษัท</td>
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
                            <div class="col-md-12" style="">
                                <table id="requestList" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <th width="30">#</th>
                                    <th width="500">ชื่อลูกค้า</th>
                                    <th width="100">Invoice No.</th>
                                    <th width="100">จำนวนอุปกรณ์</th>
                                    <th width="100">Sale ID</th>
                                    <th width="100">edit</th>
                                    </thead>
                                    <?php for($i=1;$i<=100;$i++):?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>99</td>
                                            <td>23</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="fa fa-cog"> จัดการ</i>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <!--                                            <li><a href="paper_item_description.php"><i class="fa fa-eye"> ดู</i></a></li>-->
                                                        <li><a class="fancybox" href="paper_calibration_service_request.php" target="_blank"><i class="fa fa-eye"> ดู</i></a></li>
                                                        <li><a href="#"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
                                                        <li><a href="#"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </table><!-- END : customer content -->
                            </div>

                            <div class="clearfix form-group col-sm-12 col-md-12" style="float: right; text-align: right;">
                                <button class="btn btn-primary col-lg-4" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="float: right; text-align: center;">
                                    เพิ่มอุปกรณ์
                                </button>
                            </div><!-- /hidden button -->
                            <div class="collapse" id="itemDescription" style="margin-top: 20px;"><!-- itemDescription tab -->

                                <h4>รายการอุปกรณ์ทั้งหมด</h4>
                                <button class="btn btn-success col-md-12" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="margin: 0 0 20px 0;">
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
                                <button class="btn btn-success col-md-12" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="margin: 0 0 20px 0;">
                                    บันทึกข้อมูลจำนวนอุปกรณ์
                                </button>
                            </div>

                        </div><!-- /content-panel col-md-12 -->
                    </div><!-- /col-md-12 -->
                </div><!-- /.row -->

                <div class="row" style="">
                    <div class="col-md-12">
                        <div class="content-panel col-md-12">
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
