<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>站址资源管理系统-进入系统</title>

    <!-- Bootstrap -->
    <link href="resource/jsframework/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="resource/jsframework/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="resource/jsframework/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="resource/jsframework/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Domain Style -->
    <?php foreach ($domaincss as $item): ?>
        <link href="<?php echo $item; ?>" rel="stylesheet">
    <?php endforeach; ?>
    <!-- Custom Theme Style -->
    <link href="resource/jsframework/build/css/custom.css" rel="stylesheet">
    <script>
        baseserviceurl = "<?php echo $baseserviceurl;?>";
    </script>
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form id="form-login"  method="post" >
                    <h1>进入模糊登录系统</h1>
                    <div>
                        <input id="lg-username" name="lg-username" type="text" class="form-control" placeholder="用户名" required="" />
                    </div>
                    <div>
                        <input id="lg-userpwd" name="lg-userpwd" type="password" class="form-control" placeholder="密码" required="" />
                    </div>
                    <div>
                        <button id="loginsub" class="btn btn-default submit" >进入</button>
                        <a class="reset_pass" href="#">忘记密码？</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">没有用户名？
                            <a href="pages/login.html#signup" class="to_register"> 申请注册用户 </a>
                        </p>

                        <p class="change_link">没有注册公司信息？
                            <a href="pages/login.html#signup" class="to_register"> 申请注册经销商 </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2018 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>申请注册</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="用户名" required="" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="真实姓名" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="密码" required="" />
                    </div>
                    <div>
                        <button class="btn btn-default submit" >提交</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">已有用户名？
                            <a href="pages/login.html#signin" class="to_register"> 直接登录 </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2018 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
<!-- jQuery -->
<script src="resource/jsframework/vendors/jquery/dist/jquery.min.js"></script>
<!-- Custom Domain Scripts -->
<?php
foreach ($domainscripts as $item):?>
    <script src="<?php echo $item; ?>"></script>
<?php endforeach; ?>
