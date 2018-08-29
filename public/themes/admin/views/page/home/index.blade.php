<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>{{ $category['name'] }} 管理</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{guard_url('home/'.$slug.'/create/')}}">添加{{ $category['name'] }}</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="@{{d.image}}" alt="" height="28">
</script>
<script type="text/html" id="otherImageTEM">
    <img src="@{{d.other_image}}" alt="" height="28">
</script>

<script>
    var main_url = "{{guard_url('home/'.$slug)}}";
    var delete_all_url = "{{guard_url('home/'.$slug.'/destroyAll')}}";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'title',title:'{{ trans('app.title') }}',width:200,edit:'title'}
                ,{field:'en_title',title:'{{ trans('app.en_title') }}',edit:'title'}
                ,{field:'description',title:'{{ trans('app.description') }}',edit:'title'}
                ,{field:'url',title:'{{ trans('app.url') }}',edit:'title'}
                ,{field:'image',title:'{{ trans('app.image') }}', toolbar:'#imageTEM'}
                ,{field:'other_image',title:'{{ trans('app.other_image') }}', toolbar:'#otherImageTEM'}
                ,{field:'order',title:'{{ trans('app.order') }}',edit:'title'}
                ,{field:'score',title:'{{ trans('app.actions') }}', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,height: 'full-200'
        });


    });
</script>
{!! Theme::partial('common_handle_js') !!}