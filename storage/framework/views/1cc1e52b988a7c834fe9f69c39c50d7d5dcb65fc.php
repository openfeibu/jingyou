<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>合作共赢</p>
    </div>
</div>
<div class="jion">
    <?php echo $page['content']; ?>

    <div class="jion-part4">
        <div class="w1200">
            <div class="about-title">
                <p>国内外亿万客户见证</p>
            </div>
            <div class="about-case-con">
                <div class="fb-seamlessScrolling">
                    <div class="fb-seamlessScrolling-overflow fb-position-relative">
                        <?php $__currentLoopData = app('page_repository')->getAllPagesByCategorySlug('cooperator'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cooperation_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="fb-seamlessScrolling-item fb-float-left"><img src="<?php echo e(url('image/original/'.$cooperation_item['image'])); ?>" alt=""><p><?php echo e($cooperation_item['title']); ?></p></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>