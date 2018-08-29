<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>产品中心</p>
    </div>
</div>
<div class="good-detail w1200">
    <div class="goodList-title">
        <div class="w1200 fb-clearfix">
            <p>产品详情</p>
            <a href="<?php echo e(url('product/category/'.$category['slug'])); ?>" class="back">返回列表></a>
        </div>
    </div>
    <div class="good-detail-top fb-clearfix">
        <div class="good-detail-img">
            <div class="show">
                <img src="<?php echo e(url('image/original/'.$product['image'])); ?>" alt="">
                <div class="mask"></div>
            </div>
            <div class="smallshow">
                <p class="prev prevnone"></p>
                <div class="middle_box">
                    <ul class="middle">
                        <?php if(count($product['images'])): ?>
                            <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><img src="<?php echo e(url('image/original/'.$val)); ?>" alt=""></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <p class="next"></p>
            </div>
            <div class="bg_right">
                <div class="bigshow">
                    <div class="bigitem">
                        <img src="<?php echo e(url('image/original/'.$product['image'])); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="good-detail-test">
            <div class="name"><?php echo e($product['title']); ?></div>
            <div class="des"><?php echo e($product['description']); ?></div>
            <div class="money">价格：<?php echo e($product['price'] ? '¥'.$product['price'] : '咨询客服'); ?></div>
        </div>
    </div>
    <div class="good-detail-bottom">
        <div class="good-detail-title">
            <p>商品详情</p>
        </div>
        <div class="good-detail-con">
            <?php echo $product['content']; ?>

        </div>
        <div class="good-detail-title">
            <p>相关产品</p>
        </div>
        <div class="goodList-con-list w1200">
            <?php $product_repository = app('App\Repositories\Eloquent\ProductRepository'); ?>
            <?php $__currentLoopData = $product_repository->relation($category['id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="goodList-item">
                <a href="<?php echo e(url('product/'.$product_item['id'])); ?>">
                    <div class="img"><img src="<?php echo e(url('image/original/'.$product_item['image'])); ?>" alt="<?php echo e($product_item['title']); ?>"></div>
                    <div class="test">
                        <div class="name"><?php echo e($product_item['title']); ?></div>
                        <div class="des"><?php echo e($product_item['description']); ?></div>
                        <div class="money"><?php echo e($product_item['price'] ? '¥'.$product_item['price'] : '咨询客服'); ?></div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<script>
    $(function(){
        /*
         show  //正常状态的框
         bigshow   // 放大的框的盒子
         smallshow  //缩小版的框
         mask   //放大的区域（黑色遮罩）
         bigitem  //放大的框
         */
        var obj = new mag('.show', '.bigshow','.smallshow','.mask','.bigitem');
        obj.init();
    });

</script>