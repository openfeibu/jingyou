<div class="headerTop">
    <div class="w1200 fb-clearfix">
        <div class="headerTop-left fb-float-left">欢迎进入<?php echo e(setting('station_name')); ?>！</div>
        <div class="headerTop-right fb-float-right">全国统一客服热线：<?php echo e(setting('tel')); ?></div>
    </div>
</div>
<div class="header">
    <div class="w1200">
        <div class="logo">
            <h1><a href="<?php echo e(route('pc.home')); ?>" alt=""><img src="<?php echo url("/image/original".setting('logo')); ?>" alt=""></a></h1>
            <p>专业为您定制精油<br>共享高端精油体验</p>
        </div>
        <nav>
            <?php echo Theme::widget('nav')->render(); ?>

        </nav>
    </div>
</div>