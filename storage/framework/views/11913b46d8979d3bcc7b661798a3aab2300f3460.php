<div class="header-bg">
    <div class=" fb-position-relative">
        <p>关于我们</p>
    </div>
</div>
<div>
    <div class="goodList-title">
        <div class=" fb-clearfix">
            <p>关于我们</p>
        </div>
    </div>
    <div class="about">
        <div class="about-introduce">
            <div class="about-introduce-video fb-float-left">
                <div class="video">
                    <embed src="<?php echo e(setting('video_url')); ?>" allowFullScreen="true" quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
                </div>
                <span>点击观看IAA国际香氛品牌宣传短片</span>
            </div>
            <div class="about-introduce-test">
                <?php echo $about['content']; ?>

            </div>
        </div>
        <div class="about-his">
            <div class="about-title">
                <p>发展历程</p>
                <span>IAA九年匠心质造，从心出发！</span>
            </div>
            <ul class="about-time">
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="about-time-odd month fb-inlineBlock fb-position-relative">
                    <span class="circle"></span>
                    <div class="arrowbox">
                        <i class="lfwhi fb-inlineBlock"></i>
                        <p class=" fb-inlineBlock"><?php echo e($course_item['year']); ?></p>
                        <i class="rgcol  fb-inlineBlock"></i>
                    </div>
                    <div class="details" >

                        <div class="popbox">
                            <div class="popboxBg">
                                <div class="conts"><?php echo e($course_item['description']); ?><br></div>
                                <span class="date" data-info="<?php echo e($course_item['year']); ?>-<?php echo e($course_item['month']); ?>" data-set="yearmonth"><?php echo e($course_item['year']); ?>-<?php echo e($course_item['month']); ?></span>
                            </div>
                        </div>

                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

        </div>
        <div class="about-map">
            <div class="about-title">
                <p>经销商分布图</p>
                <?php echo $dealer['content']; ?>

            </div>
            <div class="about-map-con">
                <div class="img"><img src="<?php echo e(url('image/original/'.$dealer['image'])); ?>" alt=""></div>
            </div>
        </div>
        <div class="about-case">
            <div class="about-title">
                <p>经典案例</p>
                <span>CASE SHOW</span>
            </div>
            <div class="about-case-con">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $case_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="fb-seamlessScrolling-item fb-float-left">
                                <img src="<?php echo e(url('image/original/'.$case_item['image'])); ?>" alt="<?php echo e($case_item['title']); ?>">
                                <p><?php echo e($case_item['title']); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    var mySwiper = new Swiper ('.swiper-container', {
        autoplay:1,//自动滚动
        loop:true,//循环
        speed:5000,//滚动速度
        slidesPerView : 1.5,//slide可见数量
        spaceBetween : 10//slide之间的距离（单位px）
    })
</script>

