<div class="pics_wrap">
    <div id="html5zoo-1">
        <ul class="html5zoo-slides" style="display:none;">
            @foreach($banners as $key => $banner_item)
            <li><a @if($banner_item['url']) href="{{ $banner_item['url'] }}" @else href="javascript:;" @endif"><img src="{{ url('image/original/'.$banner_item['image']) }}" /></a></li>
            @endforeach
        </ul>
    </div>
</div>
<div class="part1">
    <div class="title fb-clearfix">
        <div class="title-bold fb-inlineBlock">W</div>
        <div class="title-text fb-inlineBlock">
            <p>HY WE NEED AROMA</p>
            <span>为什么需要香氛 ​</span>
        </div>
    </div>
    <div class="part1-con w1200">
        <?php $i = 0;?>
        @foreach(app('page_repository')->getAllPagesByCategorySlug('why_need_aroma','asc') as $key => $page_item)
        <?php $i++; ?>
        <div class="part1-con-item part1-con-item{{ $i }}">
            <a href="">
                <div class="img"><img src="{{ url('image/original/'.$page_item['image']) }}" alt=""></div>
                <div class="text">{{ $page_item['title'] }}</div>
                <div class="part1-con-item-big fb-transition"><img src="{{ url('image/original/'.$page_item['other_image']) }}" alt=""></div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="part2">
    <div class="title fb-clearfix">
        <div class="title-bold fb-inlineBlock">H</div>
        <div class="title-text fb-inlineBlock">
            <p>HAT AROMA CAN BRING</p>
            <span>香氛能给我们带来什么</span>
        </div>
    </div>
    <div class="part2-con">
        <div class="w1200">
            <div class="img">
                <div class="img1"></div>
                <div class="img2"></div>
                <div class="img3"></div>
            </div>
            <div class="text">
                <?php $i = 0;?>
                @foreach(app('page_repository')->getAllPagesByCategorySlug('aroma_can_bring','asc') as $key => $page_item)
                <?php $i++; ?>
                <div class="part2-item">
                    <span>{{ $i }}</span>
                    <p>{{ $page_item['title'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="part3">
    <div class="title fb-clearfix">
        <div class="title-bold fb-inlineBlock">H</div>
        <div class="title-text fb-inlineBlock">
            <p>OT RECOMMEND</p>
            <span>热卖商品推荐 ​</span>
        </div>
    </div>
    <div class="part3-con">
        <div class="w1200">
            <div class="part3-list">
                <?php $i = 0;?>
                @foreach(app('page_repository')->getAllPagesByCategorySlug('hot_recommend','asc') as $key => $page_item)
                <?php $i++; ?>
                <div class="part3-list-item">
                    <img src="{{ url('image/original/'.$page_item['image']) }}" alt="">
                    <a href="{{ $page_item['url'] }}" class="fb-transition">READ MORE</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="part4">
    <div class="title fb-clearfix">
        <div class="title-bold fb-inlineBlock">A</div>
        <div class="title-text fb-inlineBlock">
            <p>PPLICABLE PLACE</p>
            <span>香氛使用场所​</span>
        </div>
        <div class="title-span">
            几乎所有行业都可以使用香氛，在不同领域，也能发挥出其独有的魅力！另外，除了各行业以香氛营销为主要目的来使用香氛外，在家中或是旅途中，我们也能利用香氛为我们增添情趣，缓和情绪、消疲解乏。
        </div>
    </div>
    <div class="part4-con">
        <div class="w1200">
            <div class="part4-list fb-clearfix">
                <?php $i = 0;?>
                @foreach(app('page_repository')->getAllPagesByCategorySlug('applicable_place','asc') as $key => $page_item)
                <?php $i++; ?>
                <div class="part4-list-item">
                    <div class="img"><img src="{{ url('image/original/'.$page_item['image']) }}" alt=""></div>
                    <div class="text">
                        <p>{{ $page_item['title'] }}</p>
                        <span>{{ $page_item['description'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="part5">
    <div class="title2 fb-clearfix">
        <div class="title2-p">IAA国际香氛<span>品牌优势</span></div>
        <div class="title2-span">
            一对一专业售后团队，定期售后回访，让你无忧 便于拆装与搬运，配套设施完善，若干增值服务
        </div>
    </div>
    <div class="part5-con">
        <div class="w1200">
            <div class="part5-con-list">
                <?php $i = 0;?>
                @foreach(app('page_repository')->getAllPagesByCategorySlug('brand_advantage','asc') as $key => $page_item)
                <?php $i++; ?>
                <div class="part5-con-item part5-con-item{{$i}}">
                    <p>{{ $page_item['title'] }}</p>
                    <span>{{ $page_item['description'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="part6">
    <div class="title2 fb-clearfix">
        <div class="title2-p">IAA国际香氛<span>品牌介绍</span></div>
        <div class="title2-span">
            一对一专业售后团队，定期售后回访，让你无忧 便于拆装与搬运，配套设施完善，若干增值服务
        </div>
    </div>
    <div class="part6-con">
        <div class="video">
            <embed src="{{ setting('video_url') }}" allowFullScreen="true" quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
        </div>
        <div class="part6-con-list w1200">
            <?php $i = 0;?>
            @foreach(app('page_repository')->getAllPagesByCategorySlug('brand_introduction','asc') as $key => $page_item)
            <?php $i++; ?>
            <div class="part6-con-item">
                <a href="{{ $page_item['url'] }}">
                    <div class="part6-con-item-title">
                        <p>{{ $page_item['en_title'] }}</p>
                        <span>{{ $page_item['title'] }}</span>
                    </div>
                    <div class="part6-con-item-img"><img src="{{ url('image/original/'.$page_item['image']) }}" alt=""></div>
                    <div class="part6-con-item-name">{{ $page_item['description'] }} ></div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="part7">
    <div class="w1200 fb-clearfix">
        <div class="part7-left">
            <div class="part7-title">最新活动</div>
            <div class="wechat-code">
                <div class="img"><img src="{{ url('image/original/'.setting('wechat_img')) }}" alt=""></div>
                <div class="test">更多惊喜<br>关注微信公众平台</div>
            </div>
            <div class="drop_box">
                <b>最新展会信息</b>
                <img src="{{ url('image/original/'.page('exhibition','image')) }}" alt="">
                <p>
                    {!! page('exhibition') !!}
                </p>
            </div>
        </div>
        <div class="part7-right">
            <div class="part7-title">资讯中心</div>
            <div class="part7-right-con">
                <div class="part7-imgNew">
                    <?php $i = 0;?>
                    @foreach(app('page_repository')->getAllPagesByCategorySlug('information_center','asc') as $key => $page_item)
                    <?php $i++; ?>
                    <div class="imgNew-item">
                        <a href="">
                            <div class="img"><img src="{{ url('image/original/'.$page_item['image']) }}" alt=""></div>
                            <div class="imgNew-title">{{ $page_item['title'] }} ></div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="article_list" >
                    <ul>
                        <?php $i = 0;?>
                        @foreach(app('page_repository')->getPagesByCategorySlug('news','3') as $key => $page_item)
                        <?php $i++; ?>
                        <li class="wpart-border-line">
                            <a href="{{ $page_item['url'] }}">
                                <div class="time">
                                    <span class="wp-new-ar-pro-time"  >{{ date('d',strtotime($page_item['updated_at'])) }}</span>
                                    <span class="date" >{{ date('Y-m',strtotime($page_item['updated_at'])) }}</span>
                                </div>
                                <div class="conts">
                                    <p class="conts-title">{{ $page_item['title'] }}</p>
                                    <p class="abstract">{{ $page_item['description'] }}</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="part8">
    <div class="w1200">
        <p>购买前产品、精油<span>免费试用</span>！免除您的后顾之忧！心动不如行动！</p>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin={{ setting('qq') }}&amp;site=qq&amp;menu=yes" class="qq">QQ联系</a>
    </div>
</div>