<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>关于我们</p>
    </div>
</div>
<div class="new-detail w1200">
    <div class="goodList-title">
        <div class="w1200 fb-clearfix">
            <p>动态详情</p>
            <a href="{{ url('company/news') }}" class="back">返回列表></a>
        </div>
    </div>
    <div class="new-detail-con">
        <div class="new-detail-top">
            <div class="name">{{ $news['title'] }}</div>
            <div class="des">
                <span>来源:{{ $news['source'] }}</span>
                <span>作者:{{ $news['author'] }}</span>
                <span>发布时间: {{ date('Y-m-d',strtotime($news['updated_at'])) }}</span>
                <span>{{ $news['views'] }} 次浏览</span>
                <div class="share">
                    分享
                </div>
            </div>
        </div>
        <div class="new-detail-body">
            {!! $news['content'] !!}
        </div>
        <div class="detail-page">
            @if($previous)
                <div class="detail-page-prev">
                    <a href="{{ url('company/news/'.$previous['id']) }}">上一篇：{{ $previous['title'] }}</a>
                </div>
            @endif
            @if($next)
                <div class="detail-page-next">
                    <a href="{{ url('company/news/'.$next['id']) }}">下一篇：{{ $next['title'] }}</a>
                </div>
            @endif
        </div>
    </div>

</div>
<script>
    $(function(){
        $('.share').SmohanPopLayer({
            Shade : true, //是否显示遮罩层
            Event:'click', //触发事件
            Content : 'Share', //内容DIV ID
            Title : '分享文章' //显示标题
        });
    })

</script>