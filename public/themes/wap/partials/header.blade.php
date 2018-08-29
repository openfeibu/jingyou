<div class="header">
    <div class="w1200">
        <div class="logo">
            <h1><a href="{{ route('pc.home') }}" alt=""><img src="{!!url("/image/original".setting('logo'))!!}" alt=""></a></h1>
            <p>专业为您定制精油<br>共享高端精油体验</p>
        </div>
        <nav>
            {!! Theme::widget('nav')->render() !!}
        </nav>
    </div>
</div>
<div class="headerTop">
    <div class="fb-clearfix">
        <div class="headerTop-left fb-float-left">欢迎进入{{ setting('station_name') }}！</div>
    </div>
</div>
<div class="header">
    <div class="logo">
        <h1><a href="{{ route('wap.home') }}" alt=""><img src="{!!url("/image/original".setting('logo'))!!}" alt=""></a></h1>
    </div>
    <div class="menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav>
        {!! Theme::widget('nav')->render() !!}

    </nav>
</div>