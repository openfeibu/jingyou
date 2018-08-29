<div class="header-bg">
    <div class=" fb-position-relative">
        <p>成功案例​</p>
    </div>
</div>
<div class="goodList">
    <div class="goodList-con">
        <div class="title fb-clearfix">
            <div class="title-bold fb-inlineBlock">C</div>
            <div class="title-text fb-inlineBlock">
                <p>ASE SHOWS</p>
                <span>成功案例​</span>
            </div>
        </div>
        <div class="caseList-con">
            <div class="caseList-con-list fb-clearfix">
                @foreach($cases as $key => $case_item)
                    <div class="caseList-item">
                        <a href="{{ url('case/'.$case_item['id']) }}">
                            <div class="img fb-inlineBlock"><img  src="{{ url('image/sm/'.$case_item['image']) }}" alt=""></div>
                            <div class="test fb-inlineBlock">
                                <div class="name">{{ $case_item['title'] }}</div>
                                <div class="des">{{ $case_item['description'] }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {!! $cases->links('common.pagination') !!}
        </div>

    </div>
</div>