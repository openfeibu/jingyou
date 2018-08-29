<div class="footer-top fb-clearfix">
    <div class="footer-tell">
        <img src="{{ Theme::asset()->url('images/wbgs.png') }}" alt="">
        <p>客服电话<br>
            ( 8:30-17:30 )<br>
            {{ setting('tel') }}</p>
    </div>
    <div class="footer-code">
        <img src="{{ url('image/original/'.setting('wechat_img')) }}" alt="">
        <p>更多惊喜欢迎关注<br>IAA微信公众号</p>
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
<div class="gototop_backToTop" title="返回顶部" >TOP</div>