<input type="hidden" name="<?php echo $field; ?>" id="<?php echo $field; ?>" value="<?php if($files): ?><?php echo e($files['path']); ?><?php endif; ?>"/>
<div class="layui-input-block">
    <div class="layui-upload-drag" id="<?php echo $field; ?>_uploadImage">
        <i class="layui-icon layui-icon-upload-drag"></i>
        <p>点击上传，或将文件拖拽到此处</p>
        <?php if($files): ?>
            <img id="<?php echo $field; ?>_image" src="<?php echo url("/image/original".$files['path']); ?>" style="position:absolute;height:120px;width:100%;left:0px;top: 0px;">
        <?php else: ?>
            <img id="<?php echo $field; ?>_image" src="" style="position:absolute;height:120px;width:100%;left:0px;top: 0px;display: none;">
        <?php endif; ?>

    </div>
</div>
<script>
    layui.use(['jquery','element','form','table','upload'], function(){
        var $ = layui.$;
        var form = layui.form;
        var upload = layui.upload;
        upload.render({
            elem: '#<?php echo $field; ?>_uploadImage'
            ,accept:'images'
            //,multiple:true
            ,url: '<?php echo $url; ?>'
            ,data: {
                '_token':$('meta[name="csrf-token"]').attr('content')
            }
            ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
                layer.load(); //上传loading
                obj.preview(function(index, file, result){
                    $('#<?php echo $field; ?>_image').show().attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res, index, upload){
                console.log(res)
                $("#<?php echo $field; ?>").val(res.data.path);
                layer.closeAll('loading'); //关闭loading
                layer.msg(res.msg);

            }
            ,error: function(index, upload){
                layer.closeAll('loading'); //关闭loading
            }
        });
    });
</script>