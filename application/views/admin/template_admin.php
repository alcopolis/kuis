<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Kuis | <?php echo $title; ?></title>
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
        <?php
        if ($this->uri->segment(1) != 'article' && $this->uri->segment(2) != 'edit') {
            ?>
            <!-- start: CSS UI-MODAL -->
            <link href="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
            <!-- end: CSS UI-MODAL -->
            <?php
        }
        ?>
        <!-- start: CSS FORM-ELEMENT -->
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/select2/select2.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/datepicker/css/datepicker.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
        <!-- end: CSS FORM-ELEMENT -->
        <!-- start: CSS DATA TABLE -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/plugins/select2/select2.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/DataTables/media/css/DT_bootstrap.css" />
        <!-- end: CSS DATA TABLE -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/admin'); ?>/favicon.ico" />
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/css/custom.css" />
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body>
        <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header">
                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href="index.html">
                        CLIP<i class="clip-clip"></i>ONE
                    </a>
                    <!-- end: LOGO -->
                </div>
                <div class="navbar-tools">
                    <!-- start: TOP NAVIGATION MENU -->
                    <ul class="nav navbar-right">
                        <!-- start: TO-DO DROPDOWN -->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="clip-list-5"></i>
                                <span class="badge"> 12</span>
                            </a>
                            <ul class="dropdown-menu todo">
                                <li>
                                    <span class="dropdown-menu-title"> You have 12 pending tasks</span>
                                </li>
                                <li>
                                    <div class="drop-down-wrapper">
                                        <ul>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc" style="opacity: 1; text-decoration: none;">Staff Meeting</span>
                                                    <span class="label label-danger" style="opacity: 1;"> today</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc" style="opacity: 1; text-decoration: none;"> New frontend layout</span>
                                                    <span class="label label-danger" style="opacity: 1;"> today</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc"> Hire developers</span>
                                                    <span class="label label-warning"> tommorow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc">Staff Meeting</span>
                                                    <span class="label label-warning"> tommorow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc"> New frontend layout</span>
                                                    <span class="label label-success"> this week</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc"> Hire developers</span>
                                                    <span class="label label-success"> this week</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc"> New frontend layout</span>
                                                    <span class="label label-info"> this month</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc"> Hire developers</span>
                                                    <span class="label label-info"> this month</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc" style="opacity: 1; text-decoration: none;">Staff Meeting</span>
                                                    <span class="label label-danger" style="opacity: 1;"> today</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc" style="opacity: 1; text-decoration: none;"> New frontend layout</span>
                                                    <span class="label label-danger" style="opacity: 1;"> today</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="icon-check-empty"></i>
                                                    <span class="desc"> Hire developers</span>
                                                    <span class="label label-warning"> tommorow</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="view-all">
                                    <a href="javascript:void(0)">
                                        See all tasks <i class="icon-circle-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: TO-DO DROPDOWN-->
                        <!-- start: NOTIFICATION DROPDOWN -->
                        <li class="dropdown">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                                <i class="clip-notification-2"></i>
                                <span class="badge"> 11</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li>
                                    <span class="dropdown-menu-title"> You have 11 notifications</span>
                                </li>
                                <li>
                                    <div class="drop-down-wrapper">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-primary"><i class="icon-user"></i></span>
                                                    <span class="message"> New user registration</span>
                                                    <span class="time"> 1 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="icon-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> 7 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="icon-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> 8 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="icon-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> 16 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-primary"><i class="icon-user"></i></span>
                                                    <span class="message"> New user registration</span>
                                                    <span class="time"> 36 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-warning"><i class="icon-shopping-cart"></i></span>
                                                    <span class="message"> 2 items sold</span>
                                                    <span class="time"> 1 hour</span>
                                                </a>
                                            </li>
                                            <li class="warning">
                                                <a href="javascript:void(0)">
                                                    <span class="label label-danger"><i class="icon-user"></i></span>
                                                    <span class="message"> User deleted account</span>
                                                    <span class="time"> 2 hour</span>
                                                </a>
                                            </li>
                                            <li class="warning">
                                                <a href="javascript:void(0)">
                                                    <span class="label label-danger"><i class="icon-shopping-cart"></i></span>
                                                    <span class="message"> Transaction was canceled</span>
                                                    <span class="time"> 6 hour</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="icon-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-primary"><i class="icon-user"></i></span>
                                                    <span class="message"> New user registration</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-primary"><i class="icon-user"></i></span>
                                                    <span class="message"> New user registration</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="icon-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="icon-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="view-all">
                                    <a href="javascript:void(0)">
                                        See all notifications <i class="icon-circle-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: NOTIFICATION DROPDOWN -->
                        <!-- start: MESSAGE DROPDOWN -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                                <i class="clip-bubble-3"></i>
                                <span class="badge"> 9</span>
                            </a>
                            <ul class="dropdown-menu posts">
                                <li>
                                    <span class="dropdown-menu-title"> You have 9 messages</span>
                                </li>
                                <li>
                                    <div class="drop-down-wrapper">
                                        <ul>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="<?php echo base_url('assets/admin'); ?>/images/avatar-2.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Nicole Bell</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time"> Just Now</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="<?php echo base_url('assets/admin'); ?>/images/avatar-1.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Peter Clark</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time">2 mins</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="<?php echo base_url('assets/admin'); ?>/images/avatar-3.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Steven Thompson</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time">8 hrs</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="<?php echo base_url('assets/admin'); ?>/images/avatar-1.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Peter Clark</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time">9 hrs</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="<?php echo base_url('assets/admin'); ?>/images/avatar-5.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Kenneth Ross</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time">14 hrs</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="view-all">
                                    <a href="pages_messages.html">
                                        See all messages <i class="icon-circle-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: MESSAGE DROPDOWN -->
                        <!-- start: USER DROPDOWN -->
                        <li class="dropdown current-user">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img src="<?php echo base_url('assets/admin'); ?>/images/avatar-1-small.jpg" class="circle-img" alt="">
                                <span class="username"><?php
                                    echo $this->session->userdata('full_name');
                                    ?></span>
                                <i class="clip-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="pages_user_profile.html">
                                        <i class="clip-user-2"></i>
                                        &nbsp;My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="pages_calendar.html">
                                        <i class="clip-calendar"></i>
                                        &nbsp;My Calendar
                                    </a>
                                <li>
                                    <a href="pages_messages.html">
                                        <i class="clip-bubble-4"></i>
                                        &nbsp;My Messages (3)
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="utility_lock_screen.html"><i class="clip-locked"></i>
                                        &nbsp;Lock Screen </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/logout'); ?>">
                                        <i class="clip-exit"></i>
                                        &nbsp;Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: USER DROPDOWN -->
                        <li>
                            <a href="#register" data-toggle="modal" class="">
                                Register Demo
                            </a>
                            <div id="register" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">Register Demo</h4>
                                </div>
                                <form method="post" role="form" class="form-horizontal" action="<?php echo site_url('user/register'); ?>" id="form">
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="errorHandler alert alert-danger no-display">
                                                <i class="icon-remove-sign"></i> You have some form errors. Please check below.
                                            </div>
                                            <div class="successHandler alert alert-success no-display">
                                                <i class="icon-ok"></i> Your form validation is successful!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="email">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="full_name">Nama Lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="full_name" name="full_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="pwd">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="pwd" name="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="pwd_again">Ulangi Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="pwd_again" name="pwd_again">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-blue">
                                            Save changes
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </li>
                    </ul>
                    <!-- end: TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                <div class="main-navigation navbar-collapse collapse">
                    <!-- start: MAIN MENU TOGGLER BUTTON -->
                    <div class="navigation-toggler">
                        <i class="clip-chevron-left"></i>
                        <i class="clip-chevron-right"></i>
                    </div>
                    <!-- end: MAIN MENU TOGGLER BUTTON -->
                    <!-- start: MAIN NAVIGATION MENU -->
                    <ul class="main-navigation-menu">
                        <li <?php echo $page == 'dashboard' ? 'class="active open"' : ''; ?>>
                            <a href="<?php echo site_url('user/dashboard_admin'); ?>"><i class="clip-home-3"></i>
                                <span class="title"> Dashboard </span><span class="selected"></span>
                            </a>
                        </li>
                        <li <?php echo $page == 'admin' ? 'class="active open"' : ''; ?>>
                            <a href="javascript:void(0)"><i class="clip-user-2"></i>
                                <span class="title">Manage Admin</span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo site_url('user/view_admin'); ?>">
                                        <span class="title">View Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/add_admin'); ?>">
                                        <span class="title">Tambah Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php echo $page == 'member' ? 'class="active open"' : ''; ?>>
                            <a href="javascript:void(0)"><i class="clip-user-2"></i>
                                <span class="title">Manage Member</span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo site_url('user/view_member'); ?>">
                                        <span class="title">View Member</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php echo $page == 'article' ? 'class="active open"' : ''; ?>>
                            <a href="javascript:void(0)"><i class="clip-user-2"></i>
                                <span class="title">Manage Artikel</span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo site_url('category/view'); ?>">
                                        <span class="title">View Kategori</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('article/view'); ?>">
                                        <span class="title">View Artikel</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- end: MAIN NAVIGATION MENU -->
                </div>
                <!-- end: SIDEBAR -->
            </div>
            <!-- start: PAGE -->
            <div class="main-content">
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE -->
                            <div class="page-header">
                                <h1><?php echo $title; ?> <small>Passionate &amp; crazy </small></h1>
                            </div>
                            <!-- end: PAGE TITLE  -->
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                    <?php $this->load->view($view); ?>
                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <div class="footer clearfix">
            <div class="footer-inner">
                2013 &copy; clip-one by cliptheme.
            </div>
            <div class="footer-items">
                <span class="go-top"><i class="clip-chevron-up"></i></span>
            </div>
        </div>
        <!-- end: FOOTER -->
        <div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title">Event Management</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                            Close
                        </button>
                        <button type="button" class="btn btn-danger remove-event no-display">
                            <i class='icon-trash'></i> Delete Event
                        </button>
                        <button type='submit' class='btn btn-success save-event'>
                            <i class='icon-ok'></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var siteURL = "<?php echo site_url(); ?>";
            var baseURL = "<?php echo base_url(); ?>";
        </script>
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
        <?php
        if ($this->uri->segment(1) != 'article' && $this->uri->segment(2) != 'edit') {
            ?>
            <!-- start: JAVASCRIPTS UI-MODAL -->
            <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
            <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
            <script src="<?php echo base_url('assets/admin'); ?>/js/ui-modals.js"></script>
            <!-- end: JAVASCRIPTS UI-MODAL -->
            <?php
        }
        ?>
        <!-- start: JAVASCRIPTS FORM-ELEMENT -->
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/autosize/jquery.autosize.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/select2/select2.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-colorpicker/js/commits.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/form-elements.js"></script>
        <!-- end: JAVASCRIPTS FORM-ELEMENT -->
        <!-- start: JAVASCRIPTS FORM-VALIDATION -->
        <script src="<?php echo base_url('assets/admin'); ?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/form-validation.js"></script>
        <!-- end: JAVASCRIPTS FORM-VALIDATION -->
        <!-- start: JAVASCRIPTS DATA TABLE -->
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/plugins/DataTables/media/js/DT_bootstrap.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/table-data.js"></script>
        <!-- end: JAVASCRIPTS DATA TABLE -->
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo base_url('assets/admin'); ?>/js/custom.js"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
<?php
if ($this->uri->segment(1) != 'article' && $this->uri->segment(2) != 'edit') {
    ?>
                    UIModals.init();
    <?php
}
?>
                FormElements.init();
                FormValidator.init();
                TableData.init();
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