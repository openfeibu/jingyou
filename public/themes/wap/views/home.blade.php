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
    <div class="part1-con fb-clearfix">
        <?php $i = 0;?>
        @foreach(app('page_repository')->getAllPagesByCategorySlug('why_need_aroma','asc') as $key => $page_item)
        @if($i%3 == 0)
        <div class="fb-clearfix">
        @endif
            <?php $i++; ?>
            <div class="part1-con-item part1-con-item{{$i}}">
                <div class="img"><img src="{{ url('image/original/'.$page_item['image']) }}" alt=""></div>
            </div>
        @if($i%3 == 0)
        </div>
        @endif
        @endforeach
        </div>
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

<div class="part5">
    <div class="title2 fb-clearfix">
        <div class="title2-p">IAA国际香氛<span>品牌优势</span></div>
        <div class="title2-span">
            一对一专业售后团队，定期售后回访，让你无忧 便于拆装与搬运，配套设施完善，若干增值服务
        </div>
    </div>
    <div class="part5-con">
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
<div class="part6">
    <div class="title2 fb-clearfix">
        <div class="title2-p">IAA国际香氛<span>品牌介绍</span></div>
        <div class="title2-span">
            一对一专业售后团队，定期售后回访，让你无忧 便于拆装与搬运，配套设施完善，若干增值服务
        </div>
    </div>
    <div class="part6-con">
        <div class="part6-con-list ">
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

<div class="part8">
    <div class="w1200">
        <p>购买前产品、精油<span>免费试用</span>！免除您的后顾之忧！心动不如行动！</p>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin={{ setting('qq') }}&amp;site=qq&amp;menu=yes" class="qq">QQ联系</a>
    </div>
</div>