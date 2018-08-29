<div class="header-bg">
    <div class=" fb-position-relative">
        <p>成功案例</p>
    </div>
</div>
<div class="newList-con">
    <div class="goodList-title">
        <div class=" fb-clearfix">
            <p>案例详情</p>
            <a href="{{ url('case') }}" class="back">返回列表></a>
        </div>
    </div>
    <div class="new-detail-con">
        <div class="new-detail-top">
            <div class="name">{{ $case['title'] }}</div>
            <div class="des">
                <span>来源:{{ $case['source'] }}</span>
                <span>作者:{{ $case['author'] }}</span>
                <span>发布时间: {{ date('Y-m-d',strtotime($case['updated_at'])) }}</span>
                <span>{{ $case['views'] }} 次浏览</span>
            </div>
        </div>
        <div class="new-detail-body">
            {!! $case['content'] !!}
        </div>
        <div class="detail-page">
            @if($previous)
                <div class="detail-page-prev">
                    <a href="{{ url('case/'.$previous['id']) }}">上一篇：{{ $previous['title'] }}</a>
                </div>
            @endif
            @if($next)
                <div class="detail-page-next">
                    <a href="{{ url('case/'.$next['id']) }}">下一篇：{{ $next['title'] }}</a>
                </div>
            @endif
        </div>
    </div>
</div>