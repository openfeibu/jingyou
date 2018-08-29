<div class="layui-input-block">
    <button type="button" class="layui-btn layui-btn-primary" id="uploadImages">上传图片</button>
    <div class="upload_img_list" id="upload_img_list">
        <?php if($files): ?>
            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <dd class="item_img" id="<?php echo e($key); ?>">
                    <div class="operate">
                        <i class="to_left layui-icon layui-icon-left"></i>
                        <i class="to_right layui-icon layui-icon-right"></i><i class="close layui-icon layui-icon-delete img_del" attr-id="<?php echo e($key); ?>"></i>
                    </div>
                    <img src="<?php echo url("/image/original". $file['path']); ?>" class="img" ><input type="hidden" name="<?php echo $field; ?>" value="<?php echo e($file['path']); ?>" />
                </dd>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<script>
    layui.use(['jquery','element','form','table','upload'], function(){
        var $ = layui.$;
        var form = layui.form;
        var upload = layui.upload;
        var img_id = 100;
        var path = '';
        upload.render({
            elem: '#uploadImages'
            ,accept:'images'
            ,multiple:true
            ,url: '<?php echo $url; ?>'
            ,data: {
                '_token':$('meta[name="csrf-token"]').attr('content')
            }
            ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
                layer.load(); //上传loading
            }
            ,done: function(res, index, upload){
                console.log(res)
                $('.upload_img_list').append('<dd class="item_img" id="' + img_id + '"><div class="operate"><i class="to_left layui-icon layui-icon-left"></i><i class="to_right layui-icon layui-icon-right"></i><i class="close layui-icon layui-icon-delete img_del" attr-id="'+img_id+'"></i></div><img src="' + res.data.url + '" class="img" ><input type="hidden" name="<?php echo $field; ?>" value="' + res.data.path + '" /></dd>');
                img_id++;
                layer.closeAll('loading'); //关闭loading
            }
            ,error: function(index, upload){
                layer.closeAll('loading'); //关闭loading
            }
        });
        $("body").on("click",'.img_del',function() {
            var img_id = $(this).attr("attr-id");
            $("#"+img_id).remove();
        })
        /*
         多图上传变换左右位置
         */
        $("body").on("click",'.to_left', function() {
            var item = $(this).parent().parent(".item_img");
            var item_left = item.prev(".item_img");
            if ($("#upload_img_list").children(".item_img").length >= 2) {
                if (item_left.length == 0) {
                    item.insertAfter($("#upload_img_list").children(".item_img:last"))
                } else {
                    item.insertBefore(item_left)
                }
            }
        });
        $("body").on("click",'.to_right', function() {
            var item = $(this).parent().parent(".item_img");
            var item_right = item.next(".item_img");
            if ($("#upload_img_list").children(".item_img").length >= 2) {
                if (item_right.length == 0) {
                    item.insertBefore($("#upload_img_list").children(".item_img:first"))
                } else {
                    item.insertAfter(item_right)
                }
            }
        });

    });
</script>