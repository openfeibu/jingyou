<ul>
    <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="<?php echo e(active_class($item->active)); ?>">
        <a href="<?php echo e($item->url); ?>"><?php echo e($item->name); ?></a>
        <?php if(isset($item->sub) && count($item->sub) > 0): ?>
        <dl>
            <?php $__currentLoopData = $item->sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_key => $sub_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <dd><a href="<?php echo e($sub_item->url); ?>"><?php echo e($sub_item->name); ?></a></dd>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </dl>
        <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>