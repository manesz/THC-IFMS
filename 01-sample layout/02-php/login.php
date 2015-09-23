<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 18/8/2558
 * Time: 22:51 น.
 */
include_once("header.php");
?>
    <div id="login-page">
        <div class="container">

            <form class="form-login" action="index.php">
                <h2 class="form-login-heading">THC<br/><br/>Management System</h2>
                <div class="login-wrap">
                    <div style="margin: 10px 0 10px 0; text-align: center;"><img src="libs/img/friends/fr-06.jpg" class="img-circle" width="150"></div>
                    <input type="text" class="form-control" placeholder="User ID" autofocus><br>
                    <input type="password" class="form-control" placeholder="Password"><br>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> เข้าสู่ระบบ</button><br>
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