<div class="header-bg"><p>产品中心</p></div>
<div class="goods-list">
    @foreach($product_categories as $key => $category_item)
    <div class="goods-item">
        <div class="goods-item-title">
            <p>{{ $category_item['name'] }}</p>
            <span>{{ $category_item['en_name'] }}</span>
        </div>
        <div class="goods-item-con">
            <div class="goods-item-con-bgimg"><img src="{!! $category_item['image'] !!}" alt=""></div>
            <div class="goods-item-img-con">
                @foreach($category_item['products'] as $product_key => $product_item)
                <div class="goods-item-img-item">
                    <a href="{{ url('product/'.$product_item['id']) }}">
                        <div class="img"><img src="{{ $product_item['image'] }}" alt=""></div>
                        <div class="name">{{ $product_item['title'] }}</div>
                        <div class="money">{{ $product_item['price'] ? '¥'.$product_item['price'] : '咨询客服' }}</div>
                    </a>
                </div>
                @endforeach
                <div class="goods-item-img-title">
                    <p>{{ $category_item['name'] }}</p>
                    <span>{{ $category_item['en_description'] }}</span>
                    <span>{{ $category_item['description'] }}</span>
                    <a href="{{ url('product/category/'.$category_item['slug']) }}">了解更多</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>