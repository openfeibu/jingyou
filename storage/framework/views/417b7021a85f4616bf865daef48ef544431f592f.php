<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="default" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <!-- uc强制竖屏 -->
    <meta content="portrait" name="screen-orientation"/>
    <!-- UC应用模式 -->
    <meta content="application" name="browsermode"/>
    <!-- QQ强制竖屏 -->
    <meta content="portrait" name="x5-orientation"/>
    <!-- QQ应用模式 -->
    <meta content="app" name="x5-page-mode"/>
    <!-- UC禁止放大字体 -->
    <meta content="no" name="wap-font-scale"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>
        <?php echo e(setting('station_name')); ?> <?php echo Theme::getTitle(); ?>

    </title>
    <?php echo Theme::asset()->styles(); ?>

    <script src='<?php echo e(asset('js/jquery-1.7.2.min.js')); ?>'></script>
    <!--[if lt IE 9]>
    <?php echo Theme::asset()->container('ie9')->scripts(); ?>

    <![endif]-->
    <?php echo Theme::asset()->scripts(); ?>


</head>
<body>
<!-- PC头部 -->
<?php echo Theme::partial('header'); ?>

<!-- PC头部 -->
<div class="main">
    <?php echo Theme::content(); ?>

</div>
<div class="footer">
    <?php echo Theme::partial('footer'); ?>

</div>
</body>
<script>

</script>
</html>
