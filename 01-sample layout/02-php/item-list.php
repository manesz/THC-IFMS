<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 5/9/2558
 * Time: 22:07 น.
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
            <div class="row" style="">
                <div class="col-sm-12 col-md-12">
                    <div class="content-panel col-sm-12 col-md-12">
                        <div class="col-sm-6 col-sm-6 col-md-6 left" style="">
                            <h3><i class="fa fa-angle-right"></i> รายการอุปกรณ์</h3>
                        </div>
                        <div class="col-sm-6 col-md-6 right" style="text-align: right">
                            <a href="item-add.php"> <button class="btn btn-success">เพิ่มอุปกรณ์</button> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-12 col-md-12 content-panel" style="">
                        <form class="form-horizontal style-form">
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-sm-4 col-md-4 control-label">ชื่ออุปกรณ์</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="selectBox js-states form-control">
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-sm-4 col-md-4 control-label">ฝ่ายขาย</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="selectBox js-states form-control">
                                        <option value="23">23</option>
                                        <option value="35">35</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-sm-4 col-md-4 control-label">ลูกค้า</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="selectBox js-states form-control">
                                        <option value="Alabama">Alabama</option>
                                        <option value="Alabama">Alabama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <div class="col-sm-12 col-md-12">
                                    <a class="btn btn-primary col-sm-12 col-md-8 col-md-push-4" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription">
                                        ค้นหาข้อมูล
                                    </a>
                                </div><!-- /search button -->
                            </div>
                        </form>
                    </div>
                    <div class="content-panel col-md-12">
                        <table id="departmentList" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <th class="text-center" width="30">#</th>
                                <th class="text-center" width="500">ชื่ออุปกรณ์</th>
                                <th class="text-center" width="80">รุ่น</th>
                                <th class="text-center" width="100">S/N</th>
                                <th class="text-center" width="100">ID No.</th>
                                <th class="text-center" width="100">Lot no.</th>
                                <th class="text-center" width="300">ลูกค้า</th>
                                <th class="text-center" width="100">Step</th><!-- 1.N/A, 2.Store, 3.Lab, 4.Certificate, 5.Account, 6.Closed -->
                                <th class="text-center" width="50">last updated</th>
                                <th class="text-center" width="50">edit</th>
                            </thead>
                            <?php for($i=1;$i<=100;$i++):?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>Certification</td>
                                <td><?php echo date("d-m-Y"); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-cog"> จัดการ</i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
<!--                                            <li><a href="paper_item_description.php"><i class="fa fa-eye"> ดู</i></a></li>-->
                                            <li><a class="fancybox" href="paper_item_description.php" target="_blank"><i class="fa fa-eye">ดู</i></a></li>
                                            <li><a href="#"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
                                            <li><a href="#"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endfor; ?>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
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
        $('#departmentList').DataTable();
//        $("#departmentList_filter").add
    } );
</script>