<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>{{ trans('knowledge.name') }}管理</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message layui-form">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{guard_url('knowledge/knowledge/create')}}">{{ trans('app.add') }}{{ trans('knowledge.name') }}</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">{{ trans('app.delete') }}</button>
                </div>
                <div class="layui-inline">
                    <select name="category_id" class="layui-select search_key " lay-verify="">
                        <option value="">全部分类</option>
                        @foreach($categories as $key => $category)
                            <option value="{{$category['id']}}" @if($category['id'] == $category_id) selected @endif>{{$category['name']}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="layui-inline">
                    <input class="layui-input search_key" name="title" id="demoReload" placeholder="{{ trans('app.search') }}{{ trans('app.title') }}" autocomplete="off">
                </div>
                <button class="layui-btn" data-type="reload">{{ trans('app.search') }}</button>
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

<script>
    var main_url = "{{guard_url('knowledge/knowledge')}}";
    var delete_all_url = "{{guard_url('knowledge/knowledge/destroyAll')}}";
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
                ,{field:'title',title:'{{ trans('app.title') }}',edit: 'text', width:200}
                ,{field:'image',title:'{{ trans('knowledge.label.image') }}', toolbar:'#imageTEM',}
                ,{field:'description',title:'{{ trans('app.description') }}',edit: 'text'}
                ,{field:'order',title:'{{ trans('app.order') }}',edit: 'text'}
                ,{field:'category_name',title:'{{ trans('app.category') }}', width:200}
                ,{field:'score',title:'{{ trans('app.actions') }}', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });

        //监听锁定
        form.on('switch(lock)', function(obj){
            $.post("{{guard_url('business/updateRecommend')}}",{"id":this.value,"home_recommend":obj.elem.checked,'_token':"{!! csrf_token() !!}" },function(){

            })
            // layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
        });

    });
</script>
{!! Theme::partial('common_handle_js') !!}