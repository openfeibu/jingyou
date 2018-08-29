<div class="header-bg">
    <div class=" fb-position-relative">
        <p>产品中心</p>
    </div>
</div>
<div class="goodList">
    <div class="goodList-title">
        <div class=" fb-clearfix">
            <p>{{ $category['name'] }}</p>
            <div class="goodList-search ">
                <form action="" method="get">
                    <input type="text" name="search" class="fb-inlineBlock" placeholder="输入要搜索的关键词"  value="{{ $search }}"/>
                    <input type="submit" class="fb-inlineBlock" value="搜索">
                </form>
            </div>
        </div>
    </div>
    <div class="goodList-con">
        <div class="goodList-con-list ">
            @foreach($products as $key => $product_item)
            <div class="goodList-item">
                <a href="{{ url('product/'.$product_item['id']) }}">
                    <div class="img"><img src="{!! url('image/sm/'.$product_item['image']) !!}" alt=""></div>
                    <div class="test">
                        <div class="name">{{ $product_item['title'] }}</div>
                        <div class="des">{{ $product_item['description'] }}</div>
                        <div class="money">{{ $product_item['price'] ? '¥'.$product_item['price'] : '咨询客服' }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        {!! $products->links('common.pagination') !!}
    </div>
</div>