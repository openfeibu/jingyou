<div class="header-bg">
    <div class=" fb-position-relative">
        <p>成功案例​</p>
    </div>
</div>
<div class="goodList">
    <div class="goodList-con">
        <div class="title fb-clearfix">
            <div class="title-bold fb-inlineBlock">C</div>
            <div class="title-text fb-inlineBlock">
                <p>ASE SHOWS</p>
                <span>成功案例​</span>
            </div>
        </div>
        <div class="caseList-con">
            <div class="caseList-con-list fb-clearfix">
                <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $case_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="caseList-item">
                        <a href="<?php echo e(url('case/'.$case_item['id'])); ?>">
                            <div class="img fb-inlineBlock"><img  src="<?php echo e(url('image/sm/'.$case_item['image'])); ?>" alt=""></div>
                            <div class="test fb-inlineBlock">
                                <div class="name"><?php echo e($case_item['title']); ?></div>
                                <div class="des"><?php echo e($case_item['description']); ?></div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo $cases->links('common.pagination'); ?>

        </div>

    </div>
</div>