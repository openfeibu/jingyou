<div class="header-bg">
    <div class=" fb-position-relative">
        <p>产品中心</p>
    </div>
</div>
<div class="goodList">
    <div class="goodList-title">
        <div class=" fb-clearfix">
            <p>产品详情</p>
            <a href="<?php echo e(url('product/category/'.$category['slug'])); ?>" class="back">返回列表></a>
        </div>
    </div>
    <div class="goodList-con">
        <div class="product-detail-img">
            <div class="swiper-container swiper-container-img">
                <div class="swiper-wrapper">
                    <?php if(count($product['images'])): ?>
                        <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide"><a href="javascript:;"><img src="<?php echo e(url('image/original/'.$val)); ?>" alt=""></a></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination swiper-pagination-img"></div>
            </div>
        </div>
        <div class="good-detail-test">
            <div class="name"><?php echo e($product['title']); ?></div>
            <div class="des"><?php echo e($product['description']); ?></div>
            <div class="money">价格：<?php echo e($product['price'] ? '¥'.$product['price'] : '咨询客服'); ?></div>
        </div>
        <div class="good-detail-bottom">
            <div class="good-detail-title">
                <p>商品详情</p>
            </div>
            <div class="good-detail-con">
                <?php echo $product['content']; ?>

            </div>
            <!-- <div class="good-detail-page">
                    <div class="good-detail-page-item">上一个</div>
                    <div class="good-detail-page-item">下一个</div>
            </div> -->
            <div class="good-detail-title">
                <p>相关产品</p>
            </div>
            <div class="goodList-con-list">
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
</div>
<script>
    var mySwiper = new Swiper ('.swiper-container-img', {
        loop: true,
        autoplay:3000,
        autoHeight:true,
        autoplayDisableOnInteraction : false,
        // 如果需要分页器
        pagination: '.swiper-pagination-img',
    })
</script>