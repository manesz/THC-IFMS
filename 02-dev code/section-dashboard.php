<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 13:55 น.
 */
 
?>
<section id="container" >
<!-- **********************************************************************************************************************************************************
TOP BAR CONTENT & NOTIFICATIONS
*********************************************************************************************************************************************************** -->
<?php
include_once("top-nav-bar.php");
include_once("sidebar-menu.php");
?>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
<section class="wrapper">

<div class="row">
    <div class="col-lg-12 main-chart">

    <div class="row">

        <div class="col-md-12 col-sm-12"><h1>SALE DASHBOARD.</h1><hr/></div>
        <div class="col-md-3 col-sm-3 mb">

            <div class="white-panel pn donut-chart">
                <div class="white-header">
                    <h5>WORKLOAD : Lab 1</h5>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                        <p><i class="fa fa-database"></i> 70%</p>
                    </div>
                </div>
                <canvas id="serverstatus01" height="120" width="120"></canvas>
            </div><! --/grey-panel -->
        </div><!-- /col-md-3-->
        <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
            <div class="box1">
                <span class="li_heart"></span>
                <h3>933</h3>
            </div>
            <p>933 People liked your page the last 24hs. Whoohoo!</p>
        </div>

    </div><!-- /row -->

    </div><!-- /col-lg-12 END SECTION MIDDLE -->
</div><! --/row -->
</section>
</section>
<?php include_once("section-footer.php"); ?>
</section>
