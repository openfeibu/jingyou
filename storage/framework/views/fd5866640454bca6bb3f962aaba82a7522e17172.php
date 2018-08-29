<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>关于我们</p>
    </div>
</div>
<div class="new-detail w1200">
    <div class="goodList-title">
        <div class="w1200 fb-clearfix">
            <p>动态详情</p>
            <a href="<?php echo e(url('company/news')); ?>" class="back">返回列表></a>
        </div>
    </div>
    <div class="new-detail-con">
        <div class="new-detail-top">
            <div class="name"><?php echo e($news['title']); ?></div>
            <div class="des">
                <span>来源:<?php echo e($news['source']); ?></span>
                <span>作者:<?php echo e($news['author']); ?></span>
                <span>发布时间: <?php echo e(date('Y-m-d',strtotime($news['updated_at']))); ?></span>
                <span><?php echo e($news['views']); ?> 次浏览</span>
                <div class="share">
                    分享
                </div>
            </div>
        </div>
        <div class="new-detail-body">
            <?php echo $news['content']; ?>

        </div>
        <div class="detail-page">
            <?php if($previous): ?>
                <div class="detail-page-prev">
                    <a href="<?php echo e(url('news/'.$previous['id'])); ?>">上一篇：<?php echo e($previous['title']); ?></a>
                </div>
            <?php endif; ?>
            <?php if($next): ?>
                <div class="detail-page-next">
                    <a href="<?php echo e(url('news/'.$next['id'])); ?>">下一篇：<?php echo e($next['title']); ?></a>
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