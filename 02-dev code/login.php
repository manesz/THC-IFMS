<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 18/8/2558
 * Time: 22:51 น.
 */
include("define.php"); 
include('class/db_connect.php');
include('class/db_class.php');
include("class/public-function.php");

$db = new db_class();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?php echo _SITENAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="libs/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="libs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="libs/lineicons/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="libs/css/style.css" rel="stylesheet">
    <link href="libs/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .dataTables_filter{ float: right; }
    </style>
</head>

<body>

    <div id="login-page">
        <div class="container">

            <form class="form-login" action="index.html">
                <h2 class="form-login-heading">sign in now</h2>
                <div class="login-wrap">
                    <input name="username" type="text" autofocus class="form-control" id="username" placeholder="User ID" maxlength="50"><br>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" maxlength="50"><br>
                    <button class="btn btn-theme btn-block" type="button" id="btn_login"><i class="fa fa-lock"></i> SIGN IN</button><br>        
		        	<div class="alert alert-danger text-center" role="alert" style="margin-top:10px;" id="alert"></div>
                    <hr>

                    <div class="login-social-link centered">
                        <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		                </span>
                        </label>

                    </div>

                </div>

                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-theme" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->

            </form>

        </div>
    </div>
    
    


<?php
include_once("footer.php");
?>

<script>
$(function() {
		$("#alert").hide();
			$("#username").focus();
			
		 	$("#btn_login").click(function() {
				var user=$("#username");
				var pass=$("#password");
				$("#alert").hide();
				
				if (user.val()=="") {
					$("#alert").html("กรุณาระบุชื่อเข้าใช้!!");
					$("#alert").fadeIn();
					user.focus();
				} else 	if (pass.val()=="") {
					$("#alert").html("กรุณาระบุรหัสผ่าน!!");
					$("#alert").fadeIn();
					pass.focus();
				} else {
					$.post("script.php",{act:'login',user:user.val(),pass:pass.val()},function(data) {		
					
							if (data=='') {
								window.location.href="index.php";
							} else if (data=='101') {
									$("#alert").html("ชื่อเข้าใช้หรือรหัสผ่านไม่ถูกต้อง!!");
									$("#alert").fadeIn();
									pass.focus();
							} else {
									$("#alert").html("เกิดข้อผิดพลาด!!"+data);
									$("#alert").fadeIn();									
							}
					});
				}
				
			});
});
</script>