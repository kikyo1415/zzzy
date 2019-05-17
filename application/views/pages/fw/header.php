<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>项目模糊登录系统-海信四川</title>

    <!-- Bootstrap -->
    <link href="resource/jsframework/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="resource/jsframework/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="resource/jsframework/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="resource/jsframework/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="resource/jsframework/build/css/custom.min.css" rel="stylesheet">

    <!-- Custom Domain Scripts -->
    <?php foreach ($domaincss as $item): ?>
        <link href="<?php echo $item; ?>" rel="stylesheet">
    <?php endforeach; ?>
</head>
