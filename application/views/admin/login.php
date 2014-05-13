<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Clip-One - Responsive Admin Template</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link href="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/fonts/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/css/main-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/iCheck/skins/all.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/css/theme_light.css" id="skin_color">
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/admin'); ?>/favicon.ico" />
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="login example2">
        <div class="main-login col-sm-4 col-sm-offset-4">
            <div class="logo">CLIP<i class="clip-clip"></i>ONE
            </div>
            <!-- start: LOGIN BOX -->
            <div class="box-login">
                <h3>Sign in to your account</h3>
                <p>
                    Please enter your name and password to log in.
                </p>
                <form class="form-login" action="<?php echo $action; ?>" method="POST">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="icon-remove-sign"></i> You have some form errors. Please check below.
                    </div>
                    <fieldset>
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                                <i class="icon-envelope"></i> </span>
                        </div>
                        <div class="form-group form-actions">
                            <span class="input-icon">
                                <input type="password" class="form-control password" name="password" placeholder="Password">
                                <i class="icon-lock"></i>
                                <a class="forgot" href="#">
                                    I forgot my password
                                </a> </span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-bricky pull-right">
                                Login <i class="icon-circle-arrow-right"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- end: LOGIN BOX -->
            <!-- start: FORGOT BOX -->
            <div class="box-forgot">
                <h3>Forget Password?</h3>
                <p>
                    Enter your e-mail address below to reset your password.
                </p>
                <form class="form-forgot">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="icon-remove-sign"></i> You have some form errors. Please check below.
                    </div>
                    <fieldset>
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <i class="icon-envelope"></i> </span>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-light-grey go-back">
                                <i class="icon-circle-arrow-left"></i> Back
                            </button>
                            <button type="submit" class="btn btn-bricky pull-right">
                                Submit <i class="icon-circle-arrow-right"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- end: FORGOT BOX -->
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                2013 &copy; clip-one by cliptheme.
            </div>
            <!-- end: COPYRIGHT -->
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/respond.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/excanvas.min.js"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/blockUI/jquery.blockUI.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/iCheck/jquery.icheck.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-growl-master/jquery.bootstrap-growl.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/main.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/login.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function() {
                Main.init();
                Login.init();
            });
        </script>
        <?php
        if ($notif) {
            ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        $.bootstrapGrowl("<?php echo $notif; ?>");
                    });
                });
            </script>
            <?php
        }
        ?>
    </body>
    <!-- end: BODY -->
</html>