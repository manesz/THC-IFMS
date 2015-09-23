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
        <section class="wrapper">
            <div class="row" style="">
                <div class="col-md-12">
                    <div class="content-panel col-xs-12 col-md-12">
                        <div class="col-xs-6 col-sm-6 col-md-6 left" style="">
                            <h3><i class="fa fa-angle-right"></i> รายการใบวางบิล</h3>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 right" style="text-align: right;">
                            <a href="invoice-add.php"> <button class="btn btn-success">เพิ่มใบวางบิล</button> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel col-md-12">
                        <table id="departmentList" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <th width="30">#</th>
                            <th width="500">ชื่อลูกค้า</th>
                            <th width="100">Invoice No.</th>
                            <th width="100">จำนวนอุปกรณ์</th>
                            <th width="100">Sale ID</th>
                            <th width="100">last updated</th>
                            <th width="100">edit</th>
                            </thead>
                            <?php for($i=1;$i<=100;$i++):?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>a</td>
                                    <td>a</td>
                                    <td>99</td>
                                    <td>23</td>
                                    <td><?php echo date("d-m-Y"); ?></td>
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