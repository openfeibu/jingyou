<div class="header-bg">
    <div class=" fb-position-relative">
        <p>产品中心</p>
    </div>
</div>
<div class="goodList">
    <div class="goodList-title">
        <div class=" fb-clearfix">
            <p>产品详情</p>
            <a href="{{ url('product/category/'.$category['slug']) }}" class="back">返回列表></a>
        </div>
    </div>
    <div class="goodList-con">
        <div class="product-detail-img">
            <div class="swiper-container swiper-container-img">
                <div class="swiper-wrapper">
                    @if(count($product['images']))
                        @foreach($product['images'] as $key => $val)
                            <div class="swiper-slide"><a href="javascript:;"><img src="{{ url('image/original/'.$val) }}" alt=""></a></div>
                        @endforeach
                    @endif
                </div>
                <div class="swiper-pagination swiper-pagination-img"></div>
            </div>
        </div>
        <div class="good-detail-test">
            <div class="name">{{ $product['title'] }}</div>
            <div class="des">{{ $product['description'] }}</div>
            <div class="money">价格：{{ $product['price'] ? '¥'.$product['price'] : '咨询客服' }}</div>
        </div>
        <div class="good-detail-bottom">
            <div class="good-detail-title">
                <p>商品详情</p>
            </div>
            <div class="good-detail-con">
                {!! $product['content'] !!}
            </div>
            <!-- <div class="good-detail-page">
                    <div class="good-detail-page-item">上一个</div>
                    <div class="good-detail-page-item">下一个</div>
            </div> -->
            <div class="good-detail-title">
                <p>相关产品</p>
            </div>
            <div class="goodList-con-list">
                @inject('product_repository','App\Repositories\Eloquent\ProductRepository')
                @foreach($product_repository->relation($category['id']) as $key => $product_item)
                    <div class="goodList-item">
                        <a href="{{ url('product/'.$product_item['id']) }}">
                            <div class="img"><img src="{{ url('image/original/'.$product_item['image']) }}" alt="{{ $product_item['title'] }}"></div>
                            <div class="test">
                                <div class="name">{{ $product_item['title'] }}</div>
                                <div class="des">{{ $product_item['description'] }}</div>
                                <div class="money">{{ $product_item['price'] ? '¥'.$product_item['price'] : '咨询客服' }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    var mySwiper = new Swiper ('.swiper-container-img', {
        loop: true,
        autoplay:3000,
        autoHeight:true,
        autoplayDisableOnInteraction : false,
        // 如果需要分页器
        pagination: '.swiper-pagination-img',
    })
</script>