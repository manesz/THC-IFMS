<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 5/9/2558
 * Time: 22:07 น.
 */
 include("check-permission.php");
 
 
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
                        <h3><i class="fa fa-angle-right"></i> <a href="item-list.php">รายการอุปกรณ์</a> <i class="fa fa-angle-right"></i> สร้างอุปกรณ์</h3>
                    </div>
                </div>
            </div><!-- /.row title -->

            <form class="form-horizontal style-form" method="post">

            <div class="row" style="">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <div class="col-sm-12 col-md-12" style="text-align: center;">
                            <div class="form-group col-sm-12 col-md-6" style="text-align: center;">
                                <img class="" src="libs/img/portfolio/port04.jpg" style="text-align: center; width: 100%;" alt="">
                            </div>
                            <div class="form-group col-sm-12 col-md-6" style="text-align: left; padding-left: 20px;"><p class="col-md-12">รหัสสินค้า : THD - 001098/15</p></div>
                            <div class="form-group col-sm-12 col-md-6" style="text-align: left; padding-left: 20px;"><p class="col-md-12">Quotation NO. : THD - 001098/15</p></div>
                            <div class="form-group col-sm-12 col-md-6" style="text-align: left; padding-left: 20px;"><p class="col-md-12">Invoice : xxxxxxxxxx</p></div>
                            <div class="form-group col-sm-12 col-md-6" style="text-align: left; padding-left: 20px;"><p class="col-md-12">Status : On Account</p></div>
                        </div>
                        <div class="clearfix form-group col-sm-12 col-md-6">
                            <label class="col-sm-12 col-md-3 control-label">ชือ / Item</label>
                            <div class="col-sm-12 col-md-9">
<!--                                    <input type="text" class="form-control">-->
                                <select class="selectBox js-states form-control">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div><!-- /name -->
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="col-sm-12 col-md-3 control-label">จำนวน / Quantity</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="text" class="form-control"/>
                            </div>
                        </div><!-- /quality -->
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="col-sm-12 col-md-3 control-label">Lab</label>
                            <div class="col-sm-12 col-md-9">
                                <select class="selectBox js-states form-control">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div><!-- /Lab -->
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="col-sm-12 col-md-3 control-label">ลูกค้า / Customer</label>
                            <div class="col-sm-12 col-md-9">
                                <select class="selectBox js-states form-control">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div><!-- /customer -->

                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-responsive">
                                <tr>
                                    <td style="width: 30%;">ชื่อ</td>
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

                        <div class="col-sm-12 col-md-3">
                            <a class="btn btn-primary col-md-12" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription">
                                รายละเอียดอุปกรณ์
                            </a>
                        </div><!-- /hidden button -->
                        <div class="col-sm-12 col-md-3">
                            <a class="btn btn-primary col-md-12" role="button" data-toggle="collapse" href="#itemCalibration" aria-expanded="false" aria-controls="itemCalibration">
                                ระบุข้อมูล Calibration
                            </a>
                        </div><!-- /hidden button -->
                        <div class="col-sm-12 col-md-3">
                            <a class="btn btn-primary col-md-12" role="button" data-toggle="collapse" href="#itemCertification" aria-expanded="false" aria-controls="itemCertification">
                                ระบุข้อมูล Certification
                            </a>
                        </div><!-- /hidden button -->
                        <div class="col-sm-12 col-md-3">
                            <a class="btn btn-primary col-md-12" role="button" data-toggle="collapse" href="#itemInvoice" aria-expanded="false" aria-controls="itemInvoice">
                                ระบุข้อมูล Invoice
                            </a>
                        </div><!-- /hidden button -->
                    </div><!-- /content-panel col-lg-12 -->
                </div><!-- /col-lg-12 -->
            </div><!-- /.row -->

            <div class="row" style="">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">

                        <div class="collapse" id="itemDescription" style="margin-top: 20px;"><!-- itemDescription tab -->
                            <div class=""><!-- class well -->

                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ผู้ผลิต / <br/>Manufacturer</label>
                                    <div class="col-sm-12 col-md-8">
                                        <select class="selectBox js-states form-control">
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>
                                </div><!-- /Manufacturer -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">รุ่น / Model</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control"/>
                                    </div>
                                </div><!-- /Model -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ความละเอียด / Resolution</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control"/>
                                    </div>
                                </div><!-- /Resolution -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">จุดสอบเทียบ / <br/>Calibration Range</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control"/>
                                    </div>
                                </div><!-- /Calibration Range -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">Serial No.</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control"/>
                                    </div>
                                </div><!-- /Serial No. -->
                                <div class="form-group col-sm-12 col-md-6" style="height: 60px;">
                                    <label class="col-sm-12 col-md-4 control-label">ID No.</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" class="form-control"/>
                                    </div>
                                </div><!-- /ID No. -->
                                <div class="form-group col-sm-12 col-md-12" style="height: auto;">
                                    <label class="col-sm-12 col-md-12 control-label">1) อุปกรณ์เสริมของเครื่อง</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />1.1 สายไฟ Probe/Sensor, Data link
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />1.2 สาย Adapter, หม้อแปลงไฟฟ้า
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />1.3 ขั้วต่อเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />1.4 คู่มือการใช้งาน
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />1.5 Battery Charger
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />1.6 อื่น <input type="text" class="form-control"/>
                                    </div>
                                    <label class="col-sm-12 col-md-12 control-label">2) การบรรจุหีบห่อเครื่องมือจากลูกค้า</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />2.1 กล่องเครื่องมือ/ซองใส่เครื่อง
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />2.2 หุ้มด้วยพลาสติกกันกระแทกเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />2.3 กล่องกระดาษเครื่องมือ
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="checkbox" class="" />2.4 อื่น <input type="text" class="form-control"/>
                                    </div>
                                </div><!-- /Accessories -->
                                <div class="form-group col-sm-12 col-md-12 clearfix" style="height: auto; clear: both;">
                                    <label class="col-sm-12 col-md-4 control-label">อัพโหลดรูปภาพ</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="file" class="form-control"/>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="row mt">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                                                <div class="project-wrapper">
                                                    <div class="project">
                                                        <div class="photo-wrapper">
                                                            <div class="photo">
                                                                <a class="fancybox" href="libs/img/portfolio/port04.jpg"><img class="img-responsive" src="libs/img/portfolio/port04.jpg" alt=""></a>
                                                            </div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col-lg-4 -->
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                                                <div class="project-wrapper">
                                                    <div class="project">
                                                        <div class="photo-wrapper">
                                                            <div class="photo">
                                                                <a class="fancybox" href="libs/img/portfolio/port05.jpg"><img class="img-responsive" src="libs/img/portfolio/port05.jpg" alt=""></a>
                                                            </div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col-lg-4 -->

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                                                <div class="project-wrapper">
                                                    <div class="project">
                                                        <div class="photo-wrapper">
                                                            <div class="photo">
                                                                <a class="fancybox" href="libs/img/portfolio/port06.jpg"><img class="img-responsive" src="libs/img/portfolio/port06.jpg" alt=""></a>
                                                            </div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- col-lg-4 -->
                                        </div><!-- /row -->
                                    </div>
                                </div><!-- /ID No. -->

                            </div>
                        </div><!-- /itemDescription tab -->
                        <div class="collapse" id="itemCalibration" style="margin-top: 20px;">
                            <div class="clearfix form-group col-sm-12 col-md-5">
                                <label class="col-sm-12 col-md-12 control-label" style="border-bottom: 1px #797979 solid; padding-bottom: 10px; margin-bottom: 20px;">ผลการ Calibrate</label>
                                <form>
                                    <div class="col-sm-12 col-md-12"><input type="radio" value="D">  Done</div>
                                    <div class="col-sm-12 col-md-12"><input type="radio" value="R">  Repairing</div>
                                    <div class="col-sm-12 col-md-12"><input type="radio" value="B">  Broken</div>
                                    <div class="col-sm-12 col-md-12"><input type="checkbox" value="ISO17025">  ISO 17025 Accredited</div>
                                </form>
                            </div><!-- /Calibration result -->
                            <div class="clearfix form-group col-sm-12 col-md-7">
                                <label class="col-sm-12 col-md-12 control-label" style="border-bottom: 1px #797979 solid; padding-bottom: 10px; margin-bottom: 20px;">หมายเหตุ</label>
                                <div class="col-sm-12 col-md-12">
                                    <textarea class="form-control" rows="10"></textarea>
                                </div>
                            </div><!-- /Certification Comment -->

                        </div><!-- itemCalibration tab -->
                        <div class="collapse" id="itemCertification" style="margin-top: 20px;">
<!--                            itemCertification-->
                            <div class="clearfix form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">Certification No.</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control"/>
                                </div>
                            </div><!-- /Certification No -->
                            <div class="clearfix form-group col-sm-12 col-md-6">
                                <label class="col-sm-12 col-md-3 control-label">Certification PDF File.</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="file" class="form-control"/>
                                </div>
                            </div><!-- /Certification No -->
                        </div><!-- itemCertification tab -->
                        <div class="collapse" id="itemInvoice" style="margin-top: 20px;">
                            <div class="clearfix form-group col-sm-12 col-md-12">
                                <label class="col-sm-12 col-md-2 control-label">Invoice No.</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" class="form-control"/>
                                </div>
                            </div><!-- /Invoice No -->
                        </div><!-- itemInvoice tab -->
                    </div>
                </div>
            </div><!-- ite, description -->

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
