<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>产品中心</p>
    </div>
</div>
<div class="good-detail w1200">
    <div class="goodList-title">
        <div class="w1200 fb-clearfix">
            <p>产品详情</p>
            <a href="{{ url('product/category/'.$category['slug']) }}" class="back">返回列表></a>
        </div>
    </div>
    <div class="good-detail-top fb-clearfix">
        <div class="good-detail-img">
            <div class="show">
                <img src="{{ url('image/original/'.$product['image']) }}" alt="">
                <div class="mask"></div>
            </div>
            <div class="smallshow">
                <p class="prev prevnone"></p>
                <div class="middle_box">
                    <ul class="middle">
                        @if(count($product['images']))
                            @foreach($product['images'] as $key => $val)
                            <li><img src="{{ url('image/original/'.$val) }}" alt=""></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <p class="next"></p>
            </div>
            <div class="bg_right">
                <div class="bigshow">
                    <div class="bigitem">
                        <img src="{{ url('image/original/'.$product['image']) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="good-detail-test">
            <div class="name">{{ $product['title'] }}</div>
            <div class="des">{{ $product['description'] }}</div>
            <div class="money">价格：{{ $product['price'] ? '¥'.$product['price'] : '咨询客服' }}</div>
        </div>
    </div>
    <div class="good-detail-bottom">
        <div class="good-detail-title">
            <p>商品详情</p>
        </div>
        <div class="good-detail-con">
            {!! $product['content'] !!}
        </div>
        <div class="good-detail-title">
            <p>相关产品</p>
        </div>
        <div class="goodList-con-list w1200">
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
<script>
    $(function(){
        /*
         show  //正常状态的框
         bigshow   // 放大的框的盒子
         smallshow  //缩小版的框
         mask   //放大的区域（黑色遮罩）
         bigitem  //放大的框
         */
        var obj = new mag('.show', '.bigshow','.smallshow','.mask','.bigitem');
        obj.init();
    });

</script>