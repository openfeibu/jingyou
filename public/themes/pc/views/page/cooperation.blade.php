<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>合作共赢</p>
    </div>
</div>
<div class="jion">
    {!! $page['content'] !!}
    <div class="jion-part4">
        <div class="w1200">
            <div class="about-title">
                <p>国内外亿万客户见证</p>
            </div>
            <div class="about-case-con">
                <div class="fb-seamlessScrolling">
                    <div class="fb-seamlessScrolling-overflow fb-position-relative">
                        @foreach(app('page_repository')->getAllPagesByCategorySlug('cooperator') as $key => $cooperation_item)
                        <div class="fb-seamlessScrolling-item fb-float-left"><img src="{{ url('image/original/'.$cooperation_item['image']) }}" alt=""><p>{{ $cooperation_item['title'] }}</p></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>