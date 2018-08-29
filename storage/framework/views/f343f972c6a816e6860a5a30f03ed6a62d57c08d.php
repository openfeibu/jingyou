<div class="header-bg">
    <div class=" fb-position-relative">
        <p>精油学院</p>
    </div>
</div>
<div class="newList-con">
    <div class="goodList-title">
        <div class=" fb-clearfix">
            <p>精油学院</p>
            <div class="goodList-search ">
                <form action="">
                    <input type="text" name="search" class="fb-inlineBlock" placeholder="输入要搜索的关键词" value="<?php echo e($search); ?>"/>
                    <input type="submit" class="fb-inlineBlock" value="搜索">
                </form>
            </div>
        </div>
    </div>
    <div >
        <div class="newList-tab ">
            <dl>
                <?php $__currentLoopData = $knowledge_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <dd <?php if($category_item['id'] == $category_id): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('knowledge/')); ?>?category_id=<?php echo e($category_item['id']); ?>"><?php echo e($category_item['name']); ?></a></dd>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </dl>
        </div>
        <div class="newList-con-list ">
            <?php $__currentLoopData = $knowledge_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $knowledge_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="newList-item">
                    <a href="<?php echo e(url('knowledge/'.$knowledge_item['id'])); ?>">
                        <div class="img"><img src="<?php echo e(url('image/original/'.$knowledge_item['image'])); ?>" alt="<?php echo e($knowledge_item['title']); ?>"></div>
                        <div class="test">
                            <div class="name"><?php echo e($knowledge_item['title']); ?></div>
                            <div class="date"><?php echo e($knowledge_item['updated_at']); ?></div>
                            <div class="des"><?php echo e($knowledge_item['description']); ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo $knowledge_list->links('common.pagination'); ?>

</div>