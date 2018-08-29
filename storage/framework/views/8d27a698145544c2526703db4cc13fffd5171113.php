<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>关于我们</p>
    </div>
</div>
<div class="newList">
    <div class="w1200">
        <div class="goodList-title">
            <div class="w1200 fb-clearfix">
                <p>企业动态</p>
                <div class="goodList-search ">
                    <form action="<?php echo e(url('company/news')); ?>">
                        <input type="text" name="search" value="<?php echo e($search); ?>" class="fb-inlineBlock" placeholder="输入要搜索的关键词"/>
                        <input type="submit" class="fb-inlineBlock" value="搜索">
                    </form>
                </div>
            </div>
        </div>
        <div class="newList-con">
            <div class="fb-clearfix">
                <div class="newList-con-list fb-float-right" style="width:100%">
                    <?php $__currentLoopData = $news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="newList-item">
                        <a href="<?php echo e(url('company/news/'.$news_item['id'])); ?>">
                            <div class="img"><img src="<?php echo e(url('image/original/'.$news_item['image'])); ?>" alt=""></div>
                            <div class="test">
                                <div class="name"><?php echo e($news_item['title']); ?></div>
                                <div class="date"><?php echo e($news_item['updated_at']); ?></div>
                                <div class="des"><?php echo e($news_item['description']); ?></div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php echo $news_list->links('common.pagination'); ?>

        </div>
    </div>
</div>