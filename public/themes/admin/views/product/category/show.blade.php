<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>{{ trans('app.edit') }}{{ trans('product.category.name') }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('product/category/'.$category->id)}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('product.category.label.name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('product.category.label.name') }}" class="layui-input" value="{{ $category->name }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('product.category.label.en_name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="en_name" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('product.category.label.en_name') }}" class="layui-input" value="{{ $category->en_name }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('product.category.label.description') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="description" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('product.category.label.description') }}" class="layui-input" value="{{ $category->description }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('product.category.label.en_description') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="en_description" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('product.category.label.en_description') }}" class="layui-input" value="{{ $category->en_description }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('product.category.label.image') }}</label>
                        {!! $category->files('image')->field('image')
                        ->url($category->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.order') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="请输入{{  trans('app.order') }}" class="layui-input" value="{{ $category->order }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();
</script>