<div class="w1200">
    <div class="footer-top fb-clearfix">
        <div class="footer-tell">
            <p>客服电话</p>
            ( 8:30-17:30 )<br>
            <?php echo e(setting('tel')); ?>

        </div>
        <div class="footer-link">
            <div class="footer-link-left">友情链接</div>
            <div class="footer-link-right">
                <?php $__currentLoopData = app('link_repository')->allLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($item->url); ?>" target="_blank"><?php echo e($item->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

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
</div>
<div class="gototop_backToTop" title="返回顶部" >返回顶部</div>