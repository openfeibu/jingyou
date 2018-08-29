<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>关于我们</p>
    </div>
</div>
<div class="newList">
    <div class="w1200">
        <div class="goodList-title">
            <div class="w1200 fb-clearfix">
                <p>公司简介</p>
            </div>
        </div>
        <div class="about">
            <div class="about-introduce">
                <div class="about-introduce-video fb-float-left">
                    <div class="video">
                        <embed src="{{ setting('video_url') }}" allowFullScreen="true" quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
                    </div>
                    <span>点击观看IAA国际香氛品牌宣传短片</span>
                </div>
                <div class="about-introduce-test">
                    {!! $about['content'] !!}
                </div>
            </div>
            <div class="about-his">
                <div class="about-title">
                    <p>发展历程</p>
                    <span>IAA九年匠心质造，从心出发！</span>
                </div>
                <ul class="about-time">
                    <?php $i = 0; ?>
                    @foreach($courses as $key => $course_item)
                    @if($i%2 == 0)
                    <li class="about-time-odd month fb-inlineBlock fb-position-relative">
                        <span class="circle"></span>
                        <div class="arrowbox">
                            <i class="lfwhi fb-inlineBlock"></i>
                            <p class=" fb-inlineBlock">{{ $course_item['year'] }}</p>
                            <i class="rgcol  fb-inlineBlock"></i>
                        </div>
                        <div class="details" >
                            <div class="icnbox"></div>
                            <div class="popbox">
                                <div class="popboxBg">
                                    <div class="conts">{{ $course_item['description'] }}<br></div>
                                    <span class="date" data-info="{{ $course_item['year'] }}-{{ $course_item['month'] }}" data-set="yearmonth">{{ $course_item['year'] }}-{{ $course_item['month'] }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @else
                    <li class="about-time-even month fb-inlineBlock fb-position-relative">
                        <span class="circle"></span>
                        <div class="arrowbox">
                            <i class="lfwhi fb-inlineBlock"></i>
                            <p class=" fb-inlineBlock">{{ $course_item['year'] }}</p>
                            <i class="rgcol  fb-inlineBlock"></i>
                        </div>
                        <div class="details" >

                            <div class="popbox">
                                <div class="popboxBg">
                                    <div class="conts">{{ $course_item['description'] }}<br></div>
                                    <span class="date" data-info="{{ $course_item['year'] }}-{{ $course_item['month'] }}" data-set="yearmonth">{{ $course_item['year'] }}-{{ $course_item['month'] }}</span>
                                </div>
                            </div>
                            <div class="icnbox"></div>
                        </div>
                    </li>
                    @endif
                    <?php $i++; ?>
                    @endforeach
                </ul>

            </div>
            <div class="about-map">
                <div class="about-title">
                    <p>经销商分布图</p>
                    {!! $dealer['content'] !!}
                </div>
                <div class="about-map-con">
                    <div class="img"><img src="{{ url('image/original/'.$dealer['image']) }}" alt=""></div>
                </div>
            </div>
            <div class="about-case">
                <div class="about-title">
                    <p>经典案例</p>
                    <span>CASE SHOW</span>
                </div>
                <div class="about-case-con">
                    <div class="fb-seamlessScrolling">
                        <div class="fb-seamlessScrolling-overflow fb-position-relative">
                            @foreach($cases as $key => $case_item)
                            <div class="fb-seamlessScrolling-item fb-float-left">
                                <img src="{{ url('image/original/'.$case_item['image']) }}" alt="{{ $case_item['title'] }}">
                                <p>{{ $case_item['title'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>