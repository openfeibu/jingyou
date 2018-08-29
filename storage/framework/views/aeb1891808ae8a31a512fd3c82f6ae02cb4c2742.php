<div class="header-bg"></div>
<div class="goods-list">
    <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="goods-item">
        <div class="w1200">
            <div class="goods-item-title">
                <p><?php echo e($category_item['name']); ?></p>
                <span><?php echo e($category_item['en_name']); ?></span>
            </div>
            <div class="goods-item-con">
                <div class="goods-item-con-bgimg"><img src="<?php echo $category_item['image']; ?>" alt=""></div>
                <div class="goods-item-img-con">
                    <div class="goods-item-img-title">
                        <p><?php echo e($category_item['name']); ?></p>
                        <span><?php echo e($category_item['description']); ?></span>
                        <span><?php echo e($category_item['en_description']); ?></span>
                        <a href="<?php echo e(url('product/category/'.$category_item['slug'])); ?>">了解更多</a>
                    </div>
                    <?php $__currentLoopData = $category_item['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_key => $product_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="goods-item-img-item">
                        <a href="<?php echo e(url('product/'.$product_item['id'])); ?>">
                            <div class="img"><img src="<?php echo e($product_item['image']); ?>" alt=""></div>
                            <div class="name"><?php echo e($product_item['title']); ?></div>
                            <div class="money"><?php echo e($product_item['price'] ? '¥'.$product_item['price'] : '咨询客服'); ?></div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>