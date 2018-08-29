<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>公司信息管理</cite></a><span lay-separator="">/</span>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('setting/updateCompany')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">公司名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="company_name" lay-verify="companyName" autocomplete="off" placeholder="请输入公司名称" class="layui-input" value="{{$company['company_name']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">地址</label>
                        <div class="layui-input-inline">
                            <input type="text" name="address" lay-verify="address" autocomplete="off" placeholder="请输入地址" class="layui-input" value="{{$company['address']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">客服电话</label>
                        <div class="layui-input-inline">
                            <input type="text" name="tel" lay-verify="tel" autocomplete="off" placeholder="请输入电话" class="layui-input" value="{{$company['tel']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">客服手机</label>
                        <div class="layui-input-inline">
                            <input type="text" name="phone" lay-verify="tel" autocomplete="off" placeholder="请输入客服手机" class="layui-input" value="{{$company['phone']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">QQ</label>
                        <div class="layui-input-inline">
                            <input type="text" name="qq" lay-verify="tel" autocomplete="off" placeholder="请输入QQ" class="layui-input" value="{{$company['qq']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" lay-verify="tel" autocomplete="off" placeholder="请输入邮箱" class="layui-input" value="{{$company['email']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">微信公众号名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="wechat_name" lay-verify="tel" autocomplete="off" placeholder="请输入微信公众号名称" class="layui-input" value="{{$company['wechat_name']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">微信公众号图片</label>
                        {!! $company['wechat_img']->files('value')->field('wechat_img')
                        ->url($company['wechat_img']->getUploadUrl('value'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    layui.use(['jquery','element','form','table','upload'], function(){
        var form = layui.form;
        var $ = layui.$;
        //监听提交
        form.on('submit(demo1)', function(data){
            data = JSON.stringify(data.field);
            data = JSON.parse(data);
            data['_token'] = "{!! csrf_token() !!}";
            var load = layer.load();
            $.ajax({
                url : "{{guard_url('setting/updateCompany')}}",
                data :  data,
                type : 'POST',
                success : function (data) {
                    layer.close(load);
                    layer.msg('更新成功');
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    layer.msg('服务器出错');
                }
            });
            return false;
        });

    });
</script>