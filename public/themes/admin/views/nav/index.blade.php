<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>{{ trans("nav.name") }}管理</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{guard_url('nav/nav/create')}}">添加{{ trans("nav.name") }}</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="checkboxTEM">
    <input type="checkbox" name="home_recommend" value="@{{d.id}}" lay-skin="switch" lay-text="首页|否" lay-filter="lock" @{{ d.home_recommend == true ? 'checked' : '' }}>
</script>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="@{{d.image}}" alt="" height="28">
</script>

<script>
    var main_url = "{{guard_url('nav/nav')}}";
    var delete_all_url = "{{guard_url('nav/nav/destroyAll')}}";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, edit: 'text', sort: true}
                ,{field:'name',title:'名称', edit: 'text'}
               // ,{field:'image',title:'图标', toolbar:'#imageTEM',}
                ,{field:'url',title:'链接', edit: 'text'}
                ,{field:'order',title:'排序', edit: 'text'}
                ,{field:'score',title:'操作', align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: false
            ,limit: 10
            ,height: 'full-200'
        });
        table.on('edit(fb-table)', function(obj){
            var data = obj.data;
            var value = obj.value ? obj.value : '' //得到修改后的值
                    ,data = obj.data //得到所在行所有键值
                    ,field = obj.field; //得到字段
            var ajax_data = {};
            ajax_data['_token'] = "{!! csrf_token() !!}";
            ajax_data[field] = value;
            // 加载样式
            console.log(ajax_data);
            var load = layer.load();
            $.ajax({
                url : main_url+'/'+data.id,
                data : ajax_data,
                type : 'PUT',
                success : function (data) {
                    layer.close(load);
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    layer.msg('服务器出错');
                }
            });
        });
    });
</script>
{!! Theme::partial('common_handle_js') !!}