<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('product.category.name')); ?>管理</cite></a>
        </div>
    </div>

    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm " data-type="add" data-events="add"><?php echo e(trans('app.add')); ?><?php echo e(trans('product.category.name')); ?></button>
                    
                </div>
                <!--  <div class="layui-inline">
                   <input class="layui-input" name="id" id="demoReload" placeholder="搜索轮播图" autocomplete="off">
                 </div>
                 <button class="layui-btn" data-type="reload">搜索</button> -->

            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    
</script>
<script type="text/html" id="barDemo">

    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><?php echo e(trans('app.delete')); ?></a>
</script>
<script type="text/html" id="imageTEM">
    <img src="{{d.image}}" alt="" height="28">
</script>
<script>
    var main_url = "<?php echo e(guard_url('product/category')); ?>";
    var delete_all_url = "<?php echo e(guard_url('product/category/destroyAll')); ?>";

    layui.use(['element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'name',title:'<?php echo e(trans('app.name')); ?>',edit: 'text'}
                ,{field:'en_name',title:'<?php echo e(trans('app.name')); ?>',edit: 'text'}
                ,{field:'slug',title:'<?php echo e(trans('app.slug')); ?>',edit: 'text'}
                ,{field:'description',title:'<?php echo e(trans('app.description')); ?>',edit: 'text'}
                ,{field:'en_description',title:'<?php echo e(trans('app.description')); ?>',edit: 'text'}
                ,{field:'image',title:'<?php echo e(trans('product.category.label.image')); ?>',toolbar:'#imageTEM'}
                ,{field:'order',title:'<?php echo e(trans('app.order')); ?>',edit: 'text'}
                ,{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: false
            ,height: 'full-200'
        });
        //监听工具条
        table.on('tool(fb-table)', function(obj){
            var data = obj.data;
            data['_token'] = "<?php echo csrf_token(); ?>";
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看操作');
            } else if(obj.event === 'del'){
                layer.confirm('真的删除行么', function(index){
                    layer.close(index);
                    var load = layer.load();
                    $.ajax({
                        url : main_url+'/'+data.id,
                        data : data,
                        type : 'delete',
                        success : function (data) {
                            obj.del();
                            layer.close(load);
                        },
                        error : function (jqXHR, textStatus, errorThrown) {
                            layer.close(load);
                            layer.msg('服务器出错');
                        }
                    });
                });
            }
        });

        var $ = layui.$, active = {
            reload: function(){
                var demoReload = $('#demoReload');

                //执行重载
                table.reload('fb-table', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        name: demoReload.val()
                    }
                });
            },
            del:function(){
                var checkStatus = table.checkStatus('fb-table')
                        ,data = checkStatus.data;
                var data_id_obj = {};
                var i = 0;
                data.forEach(function(v){ data_id_obj[i] = v.id; i++});
                data.length == 0 ?
                        layer.msg('请选择要删除的数据', {
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        })
                        :
                        layer.confirm('是否删除已选择的数据',{title:'提示'},function(index){
                            layer.close(index);
                            var load = layer.load();
                            $.ajax({
                                url : delete_all_url,
                                data :  {'ids':data_id_obj,'_token' : "<?php echo csrf_token(); ?>"},
                                type : 'POST',
                                success : function (data) {
                                    var nPage = $(".layui-laypage-curr em").eq(1).text();
                                    //执行重载
                                    table.reload('fb-table', {

                                    });
                                    layer.close(load);
                                },
                                error : function (jqXHR, textStatus, errorThrown) {
                                    layer.close(load);
                                    layer.msg('服务器出错');
                                }
                            });
                        })  ;

            },
            add:function(){
                layer.prompt({
                    formType: 0,
                    value: '',
                    title: '提示',
                }, function(value, index, elem){
                    layer.close(index);
                    // 加载样式
                    var load = layer.load();
                    $.ajax({
                        url : main_url,
                        data : {'name':value,'_token':"<?php echo csrf_token(); ?>"},
                        type : 'POST',
                        success : function (data) {
                            layer.close(load);
                            var nPage = $(".layui-laypage-curr em").eq(1).text();
                            //执行重载
                            table.reload('fb-table', {

                            });
                        },
                        error : function (jqXHR, textStatus, errorThrown) {
                            layer.close(load);
                            layer.msg('服务器出错');
                        }
                    });
                });

            }
        };
        $('.tabel-message .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>