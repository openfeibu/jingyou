<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>产品中心</p>
    </div>
</div>
<div class="goodList">
    <div class="goodList-title">
        <div class="w1200 fb-clearfix">
            <p><?php echo e($category['name']); ?></p>
            <div class="goodList-search ">
                <form action="" method="get">
                    <input type="text" name="search" class="fb-inlineBlock" placeholder="输入要搜索的关键词" value="<?php echo e($search); ?>"/>
                    <input type="submit" class="fb-inlineBlock" value="搜索">
                </form>
            </div>
        </div>
    </div>
    <div class="goodList-con">
        <div class="goodList-con-list w1200">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="goodList-item">
                <a href="<?php echo e(url('product/'.$product_item['id'])); ?>">
                    <div class="img"><img src="<?php echo url('image/sm/'.$product_item['image']); ?>" alt="<?php echo e($product_item['title']); ?>"></div>
                    <div class="test">
                        <div class="name"><?php echo e($product_item['title']); ?></div>
                        <div class="des"><?php echo e($product_item['description']); ?></div>
                        <div class="money"><?php echo e($product_item['price'] ? '¥'.$product_item['price'] : '咨询客服'); ?></div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo $products->links('common.pagination'); ?>

    </div>
</div>