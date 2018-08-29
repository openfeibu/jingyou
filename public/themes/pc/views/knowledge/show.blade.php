<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>精油学院</p>
    </div>
</div>
<div class="new-detail w1200">
    <div class="goodList-title">
        <div class="w1200 fb-clearfix">
            <p>文章详情</p>
            <a href="{{ url('knowledge') }}" class="back">返回列表></a>
        </div>
    </div>
    <div class="new-detail-con">
        <div class="new-detail-top">
            <div class="name">{{ $knowledge['title'] }}</div>
            <div class="des">
                <span>来源:{{ $knowledge['source'] }}</span>
                <span>作者:{{ $knowledge['author'] }}</span>
                <span>发布时间: {{ date('Y-m-d',strtotime($knowledge['updated_at'])) }}</span>
                <span>{{ $knowledge['views'] }} 次浏览</span>
                <div class="share">
                    分享
                </div>
            </div>
        </div>
        <div class="new-detail-body">
            {!! $knowledge['content'] !!}
        </div>
        <div class="detail-page">
            @if($previous)
                <div class="detail-page-prev">
                    <a href="{{ url('knowledge/'.$previous['id']) }}">上一篇：{{ $previous['title'] }}</a>
                </div>
            @endif
            @if($next)
                <div class="detail-page-next">
                    <a href="{{ url('knowledge/'.$next['id']) }}">下一篇：{{ $next['title'] }}</a>
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