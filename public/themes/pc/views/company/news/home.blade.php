<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>关于我们</p>
    </div>
</div>
<div class="newList">
    <div class="w1200">
        <div class="goodList-title">
            <div class="w1200 fb-clearfix">
                <p>企业动态</p>
                <div class="goodList-search ">
                    <form action="{{ url('company/news') }}">
                        <input type="text" name="search" value="{{ $search }}" class="fb-inlineBlock" placeholder="输入要搜索的关键词"/>
                        <input type="submit" class="fb-inlineBlock" value="搜索">
                    </form>
                </div>
            </div>
        </div>
        <div class="newList-con">
            <div class="fb-clearfix">
                <div class="newList-con-list fb-float-right" style="width:100%">
                    @foreach($news_list as $key => $news_item)
                    <div class="newList-item">
                        <a href="{{ url('company/news/'.$news_item['id']) }}">
                            <div class="img"><img src="{{ url('image/original/'.$news_item['image']) }}" alt=""></div>
                            <div class="test">
                                <div class="name">{{ $news_item['title'] }}</div>
                                <div class="date">{{ $news_item['updated_at'] }}</div>
                                <div class="des">{{ $news_item['description'] }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            {!! $news_list->links('common.pagination') !!}
        </div>
    </div>
</div>