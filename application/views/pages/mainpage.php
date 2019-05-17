<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>站址资源战略管理系统-四川移动天府新区分公司</title>

    <!-- Bootstrap -->
    <link href="resource/jsframework/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="resource/jsframework/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="resource/jsframework/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="resource/jsframework/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="resource/jsframework/build/css/custom.css" rel="stylesheet">
    <!-- Custom Domain Style -->
    <?php foreach ($domaincss as $item): ?>
        <link href="<?php echo $item; ?>" rel="stylesheet">
    <?php endforeach; ?>
</head>


<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>站址资源管理系统</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="resource/img/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>欢迎,</span>
                        <h2><?php echo $userinfo['franname'].'，<br />'.$userinfo['usertruename']; ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <?php echo $pagemenu; ?>

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="pages/logout.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="resource/img/img.jpg" alt=""><?php echo $userinfo['usertruename']; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href="pages/logout.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="resource/img/img.jpg" alt="Profile Image"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="resource/img/img.jpg" alt="Profile Image"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="resource/img/img.jpg" alt="Profile Image"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="resource/img/img.jpg" alt="Profile Image"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <?php echo $pagecontent; ?>

        <!-- loading modal -->
        <div class="modal hide fade" id="loading">
            <img style="width: 2%;height: 4%;position: absolute;margin:0 auto;top: 30%;left: 0;right: 0;bottom: 0;"
                 src="resource/img/009.gif"/>
        </div>
        <!-- /loading modal -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<!-- jQuery -->
<script src="resource/jsframework/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="resource/jsframework/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="resource/jsframework/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="resource/jsframework/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="resource/jsframework/vendors/Chart.js/dist/Chart.min.js"></script>
<script src="resource/jsframework/vendors/echarts/dist/echarts.min.js"></script>
<!-- jQuery Sparklines -->
<script src="resource/jsframework/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Flot -->
<script src="resource/jsframework/vendors/Flot/jquery.flot.js"></script>
<script src="resource/jsframework/vendors/Flot/jquery.flot.pie.js"></script>
<script src="resource/jsframework/vendors/Flot/jquery.flot.time.js"></script>
<script src="resource/jsframework/vendors/Flot/jquery.flot.stack.js"></script>
<script src="resource/jsframework/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="resource/jsframework/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="resource/jsframework/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="resource/jsframework/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="resource/jsframework/vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="resource/jsframework/vendors/moment/min/moment.min.js"></script>
<script src="resource/jsframework/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Custom Common -->
<script src="resource/js/domain/customcommon.js"></script>
<!-- Custom Domain Scripts -->
<?php //未知原因，此处domainscript需要在customscript之前，估计是custom脚本里有一些会影响全局js的操作。
foreach ($domainscripts as $item):?>
    <script src="<?php echo $item; ?>"></script>
<?php endforeach; ?>
<!-- Custom Theme Scripts -->
<script src="resource/jsframework/build/js/custom.js"></script>

</body>
</html>
