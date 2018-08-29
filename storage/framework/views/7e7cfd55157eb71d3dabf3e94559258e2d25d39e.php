<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('app.add')); ?><?php echo e(trans('course.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('course')); ?>" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.description')); ?></label>
                        <div class="layui-input-inline">
                            <textarea name="description"  placeholder="请输入<?php echo e(trans('app.description')); ?>"  class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <!--<div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('course.label.image')); ?></label>
                        <?php echo $course->files('image')
                        ->url($course->getUploadUrl('image'))
                        ->uploader(); ?>

                    </div>-->
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.date')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="date" class="layui-input" id="date" value="<?php echo e(date('Y-m')); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        laydate.render({
            elem: '#date' //指定元素,
            ,type:'month'
            ,value: '<?php echo e(date('Y-m')); ?>'
        });
    });
</script>