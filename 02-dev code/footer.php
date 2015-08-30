<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 18/8/2558
 * Time: 22:51 น.
 */
?>

<!-- js placed at the end of the document so the pages load faster -->
<script src="libs/js/jquery.js"></script>
<script src="libs/js/jquery-1.8.3.min.js"></script>
<script src="libs/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="libs/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="libs/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="libs/js/jquery.scrollTo.min.js"></script>
<script src="libs/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="libs/js/jquery.sparkline.js"></script>

<!--custom switch-->
<script src="libs/js/bootstrap-switch.js"></script>
<!--custom tagsinput-->
<script src="libs/js/jquery.tagsinput.js"></script>
<!--custom checkbox & radio-->
<!--<script type="text/javascript" src="libs/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>-->
<!--<script type="text/javascript" src="libs/js/bootstrap-daterangepicker/date.js"></script>-->
<!--<script type="text/javascript" src="libs/js/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<!--<script type="text/javascript" src="libs/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>-->
<script src="libs/js/form-component.js"></script>


<!--common script for all pages-->
<script src="libs/js/common-scripts.js"></script>
<script type="text/javascript" src="libs/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="libs/js/gritter-conf.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="libs/js/jquery.backstretch.min.js"></script>
<script>
    //        $.backstretch("libs/img/login-bg-1.jpg", {speed: 500});
</script>

<!--script for this page-->
<script src="libs/js/chart-master/Chart.js"></script>
<script src="libs/js/sparkline-chart.js"></script>
<script src="libs/js/zabuto_calendar.js"></script>

<script src="libs/js/plublic-js.js"></script>

<script type="application/javascript">
    $(document).ready(function () {
		
		
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
//                url: "show_data.php?action=1",
//                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", badge: "00"}
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>

<script>
    var doughnutData = [
        {
            value: 70,
            color:"#68dff0"
        },
        {
            value : 30,
            color : "#fdfdfd"
        }
    ];
//    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
</script>


</body>
</html>
<?php $db->close(); //ห้ามลบ ?>