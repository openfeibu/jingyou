<div class="w1200">
    <div class="footer-top fb-clearfix">
        <div class="footer-tell">
            <p>客服电话</p>
            ( 8:30-17:30 )<br>
            {{ setting('tel') }}
        </div>
        <div class="footer-link">
            <div class="footer-link-left">友情链接</div>
            <div class="footer-link-right">
                @foreach(app('link_repository')->allLinks() as $key => $item)
                <a href="{{ $item->url }}" target="_blank">{{ $item->name }}</a>
                @endforeach
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom-nav">
            @foreach(app('nav_repository')->top() as $key => $item)
                <a href="{{ $item->url }}">{{ $item->name }}</a>
            @endforeach
        </div>
        <div class="copy">
            {!! page('footer') !!}
        </div>
    </div>
</div>
<div class="gototop_backToTop" title="返回顶部" >返回顶部</div>