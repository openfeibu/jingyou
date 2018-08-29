<div class="header-bg">
    <div class=" fb-position-relative">
        <p>合作共赢</p>
    </div>
</div>
<div>
    <div class="goodList-title">
        <div class=" fb-clearfix">
            <p>合作共赢</p>
        </div>
    </div>
    <div class="jion">
        {!! $page['content'] !!}
        <div class="jion-part4">
            <div class="">
                <div class="about-title">
                    <p>国内外亿万客户见证</p>
                </div>
                <div class="about-case-con">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach(app('page_repository')->getAllPagesByCategorySlug('cooperator') as $key => $cooperation_item)
                            <div class="swiper-slide"><img src="{{ url('image/original/'.$cooperation_item['image']) }}" alt=""><p>{{ $cooperation_item['title'] }}</p></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>