<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 23:34 น.
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

            <h3><i class="fa fa-angle-right"></i> รายชื่อแผนก</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <table id="departmentList" class="table table-bordered table-striped">
                            <thead>
                            <td width="100">#</td>
                            <td width="500">แผนก</td>
                            <td width="100">last updated</td>
                            <td width="50">edit</td>
                            </thead>
                            <tr>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-cog"> จัดการ</i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#"><i class="fa fa-eye"> ดู</i></a></li>
                                            <li><a href="#"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
                                            <li><a href="#"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>c</td>
                                <td>c</td>
                                <td>c</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-cog"> จัดการ</i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#"><i class="fa fa-eye"> ด</i>ู</a></li>
                                            <li><a href="#"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
                                            <li><a href="#"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-lg-12 -->
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