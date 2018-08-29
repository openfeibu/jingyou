<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>编辑 {{ $page['name'] }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('home/'.$category['slug'].'/'.$page['id'].'/')}}" method="post" lay-filter="fb-form">
                    <input type="hidden" name="category_id" value="{{ $page['category_id'] }}">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.title') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('app.title') }}" class="layui-input" value="{{ $page['title'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.en_title') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="en_title" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('app.en_title') }}" class="layui-input" value="{{ $page['en_title'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.url') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" autocomplete="off" placeholder="请输入{{  trans('app.url') }}" class="layui-input" value="{{ $page['url'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.description') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="description" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('app.description') }}" class="layui-input" value="{{ $page['description'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.image') }}</label>
                        {!! $page->files('image')
                        ->url($page->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.other_image') }}</label>
                        {!! $page->files('other_image')
                        ->url($page->getUploadUrl('other_image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.order') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="请输入{{  trans('app.order') }}" class="layui-input" value="{{ $page['order'] }}">
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