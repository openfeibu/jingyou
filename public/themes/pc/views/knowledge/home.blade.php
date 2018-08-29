<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>精油学院</p>
    </div>
</div>
<div class="newList">
    <div class="w1200">
        <div class="goodList-title">
            <div class="w1200 fb-clearfix">
                <p>精油学院</p>
                <div class="goodList-search ">
                    <form action="{{ url('knowledge') }}" method="get">
                        <input type="text" name="search" class="fb-inlineBlock" placeholder="输入要搜索的关键词" value="{{ $search }}"/>
                        <input type="submit" class="fb-inlineBlock" value="搜索">
                    </form>
                </div>
            </div>
        </div>
        <div class="newList-con">
            <div class="fb-clearfix">
                <div class="newList-tab fb-float-left">
                    <dl>
                        <dt>常识分类</dt>
                        @foreach($knowledge_categories as $key => $category_item)
                        <dd @if($category_item['id'] == $category_id) class="active" @endif><a href="{{ url('knowledge/') }}?category_id={{ $category_item['id'] }}">{{ $category_item['name'] }}</a></dd>
                        @endforeach
                    </dl>
                </div>
                <div class="newList-con-list fb-float-right">
                    @foreach($knowledge_list as $key => $knowledge_item)
                    <div class="newList-item">
                        <a href="{{ url('knowledge/'.$knowledge_item['id']) }}">
                            <div class="img"><img src="{{ url('image/original/'.$knowledge_item['image']) }}" alt="{{ $knowledge_item['title'] }}"></div>
                            <div class="test">
                                <div class="name">{{ $knowledge_item['title'] }}</div>
                                <div class="date">{{ $knowledge_item['updated_at'] }}</div>
                                <div class="des">{{ $knowledge_item['description'] }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            {!! $knowledge_list->links('common.pagination') !!}
        </div>
    </div>
</div>