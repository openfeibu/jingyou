<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>添加<?php echo e(trans('page.cooperate.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <?php if(Session::has('status')  && Session::has('message')): ?>
                <?php if(Session::get('status') == 'success'): ?>
                    <div class="layui-alert layui-bg-gray">
                        <button type="button" class="layui-close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong><?php echo e(Session::get('message')); ?></strong>
                    </div>
                <?php elseif(Session::get('status') == 'error'): ?>
                    <div class="layui-alert layui-bg-red">
                        <button type="button" class="layui-close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong><?php echo e(Session::get('message')); ?></strong>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('page/cooperate/update/'.$page->id)); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.title')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入<?php echo e(trans('app.title')); ?>" class="layui-input" value="<?php echo e($page->title); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('app.content')); ?></label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="width:1000px;height:240px;"><?php echo $page->content; ?></script>
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