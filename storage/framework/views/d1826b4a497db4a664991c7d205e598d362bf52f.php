<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>编辑 <?php echo e($page['name']); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('home/'.$category['slug'].'/'.$page['id'].'/')); ?>" method="post" lay-filter="fb-form">
                    <input type="hidden" name="category_id" value="<?php echo e($page['category_id']); ?>">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.title')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入<?php echo e(trans('app.title')); ?>" class="layui-input" value="<?php echo e($page['title']); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.en_title')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="en_title" lay-verify="title" autocomplete="off" placeholder="请输入<?php echo e(trans('app.en_title')); ?>" class="layui-input" value="<?php echo e($page['en_title']); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.url')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" autocomplete="off" placeholder="请输入<?php echo e(trans('app.url')); ?>" class="layui-input" value="<?php echo e($page['url']); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.description')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="description" lay-verify="title" autocomplete="off" placeholder="请输入<?php echo e(trans('app.description')); ?>" class="layui-input" value="<?php echo e($page['description']); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.image')); ?></label>
                        <?php echo $page->files('image')
                        ->url($page->getUploadUrl('image'))
                        ->uploader(); ?>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.other_image')); ?></label>
                        <?php echo $page->files('other_image')
                        ->url($page->getUploadUrl('other_image'))
                        ->uploader(); ?>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.order')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="请输入<?php echo e(trans('app.order')); ?>" class="layui-input" value="<?php echo e($page['order']); ?>">
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