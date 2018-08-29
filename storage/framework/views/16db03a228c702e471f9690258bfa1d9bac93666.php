<div class="footer-top fb-clearfix">
    <div class="footer-tell">
        <img src="<?php echo e(Theme::asset()->url('images/wbgs.png')); ?>" alt="">
        <p>客服电话<br>
            ( 8:30-17:30 )<br>
            <?php echo e(setting('tel')); ?></p>
    </div>
    <div class="footer-code">
        <img src="<?php echo e(url('image/original/'.setting('wechat_img'))); ?>" alt="">
        <p>更多惊喜欢迎关注<br>IAA微信公众号</p>
    </div>
</div>
<div class="footer-bottom">
    <div class="footer-bottom-nav">
        <?php $__currentLoopData = app('nav_repository')->top(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($item->url); ?>"><?php echo e($item->name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="copy">
        <?php echo page('footer'); ?>

    </div>
</div>
<div class="gototop_backToTop" title="返回顶部" >TOP</div>