<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>成功案例</p>
    </div>
</div>
<div class="new-detail w1200">
    <div class="goodList-title">
        <div class="w1200 fb-clearfix">
            <p>案例详情</p>
            <a href="<?php echo e(url('case')); ?>" class="back">返回列表></a>
        </div>
    </div>
    <div class="new-detail-con">
        <div class="new-detail-top">
            <div class="name"><?php echo e($case['title']); ?></div>
            <div class="des">
                <span>来源:<?php echo e($case['source']); ?></span>
                <span>作者:<?php echo e($case['author']); ?></span>
                <span>发布时间: <?php echo e(date('Y-m-d',strtotime($case['updated_at']))); ?></span>
                <span><?php echo e($case['views']); ?> 次浏览</span>
                <div class="share">
                    分享
                </div>
            </div>
        </div>
        <div class="new-detail-body">
            <?php echo $case['content']; ?>

        </div>
        <div class="detail-page">
            <?php if($previous): ?>
            <div class="detail-page-prev">
                <a href="<?php echo e(url('case/'.$previous['id'])); ?>">上一篇：<?php echo e($previous['title']); ?></a>
            </div>
            <?php endif; ?>
            <?php if($next): ?>
            <div class="detail-page-next">
                <a href="<?php echo e(url('case/'.$next['id'])); ?>">下一篇：<?php echo e($next['title']); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<script>
    $(function(){
        $('.share').SmohanPopLayer({
            Shade : true, //是否显示遮罩层
            Event:'click', //触发事件
            Content : 'Share', //内容DIV ID
            Title : '分享文章' //显示标题
        });
    })

</script>