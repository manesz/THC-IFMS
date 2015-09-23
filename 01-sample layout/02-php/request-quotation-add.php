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
            <h3><i class="fa fa-angle-right"></i> <a href="request-quotation-list.php">รายการใบขอทราบราคาสอบเทียบ</a> <i class="fa fa-angle-right"></i> สร้างใบขอทราบราคาสอบเทียบ</h3>
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
                    <input type="text" class="form-control"/>
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
                <label class="col-sm-12 col-md-4 control-label">แผนก</label>
                <div class="col-lg-8">
                    <select class="selectBox js-states form-control">
                        <option value="21">21</option>
                        <option value="21">35</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-12 col-md-4 control-label">ตำแหน่ง </label>
                <div class="col-lg-8">
                    <select class="selectBox js-states form-control">
                        <option value="21">21</option>
                        <option value="21">35</option>
                    </select>
                </div>
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
            <div class="col-lg-12" style="text-align: left;">
                <button class="btn btn-danger">ลบอุปกรณ์</button>
            </div>
            <div class="col-lg-12" style="">
                <table id="requestList" class="table table-bordered table-striped table-responsive" style="width: 100%; margin: 10px 0 20px 0;"><!-- item content -->
                    <thead>
                        <td class="text-center" width="30"><input type="checkbox" class=""/></td>
                        <td class="text-center height-50 bg-fafafa" style="width: 350px;">Description</td>
                        <td class="text-center height-50 bg-fafafa" style="width: 150px;">Manufacturer</td>
                        <td class="text-center height-50 bg-fafafa" style="width: 80px;">Model</td>
                        <td class="text-center height-50 bg-fafafa" style="width: 80px;">S/N or ID No.</td>
                        <td class="text-center height-50 bg-fafafa" style="width: 60px;">Quantity</td>
                        <td class="text-center height-50 bg-fafafa" style="width: 80px;">Status</td>
                        <td class="text-center height-50 bg-fafafa" style="width: 80px;">ISO 17025<br/>Accredited</td>
                    </thead>
                    <tbody>
                    <?php for($i=1;$i<=13;$i++):?>
                        <tr style="text-align: center;">
                            <td width="30"><input type="checkbox" class=""/></td>
                            <td class="height-30"> - </td>
                            <td class="height-30"> - </td>
                            <td class="height-30"> - </td>
                            <td class="height-30"> - </td>
                            <td class="height-30"> - </td>
                            <td class="height-30"> In Lab / On Site </td>
                            <td class="height-30"> - </td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table><!-- END : item content -->
            </div>

            <div class="clearfix form-group col-sm-12 col-md-12" style="float: right; text-align: right;">
                <button class="btn btn-primary col-lg-4" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="float: right; text-align: center;">
                    เพิ่มอุปกรณ์
                </button>
            </div><!-- /hidden button -->
            <div class="collapse" id="itemDescription" style="margin-top: 20px;"><!-- itemDescription tab -->
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
