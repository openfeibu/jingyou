<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>添加<?php echo e(trans('product.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('product/product/'.$product->id)); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.title')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入<?php echo e(trans('app.title')); ?>" class="layui-input" value="<?php echo e($product->title); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('product.label.image')); ?></label>
                        <?php echo $product->files('image')->field('image')
                        ->url($product->getUploadUrl('image'))
                        ->uploader(); ?>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('product.label.images')); ?></label>
                        <?php echo $product->files('images')->field('images[]')
                        ->url($product->getUploadUrl('images'))
                        ->uploaders(); ?>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.price')); ?>（¥：）</label>
                        <div class="layui-input-inline">
                            <input type="text" name="price" autocomplete="off" placeholder="请输入<?php echo e(trans('app.price')); ?>" class="layui-input" value="<?php echo e($product->price); ?>" >
                        </div>
                        <div class="layui-form-mid layui-word-aux">留空则显示为：联系客服</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.description')); ?></label>
                        <div class="layui-input-inline">
                            <textarea name="description"  placeholder="请输入<?php echo e(trans('app.description')); ?>"  class="layui-textarea"><?php echo e($product->description); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('app.content')); ?></label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="width:1000px;height:240px;"><?php echo $product->content; ?></script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('product.category.name')); ?></label>
                        <div class="layui-input-block">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="radio" name="category_id" value="<?php echo e($category['id']); ?>" title="<?php echo e($category['name']); ?>" <?php if($category['id'] == $product->category_id): ?> checked <?php endif; ?>>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.order')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="请输入<?php echo e(trans('app.order')); ?>" class="layui-input" value="<?php echo e($product->order); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
<?php echo Theme::asset()->container('ueditor')->scripts(); ?>

<script>
    var ue = getUe();
</script>