<div class="layui-header">
    <ul class="layui-nav layui-layout-right">
        <!-- <li class="layui-nav-item">
          <a href="">控制台<span class="layui-badge">9</span></a>
        </li>
        <li class="layui-nav-item">
          <a href="">个人中心<span class="layui-badge-dot"></span></a>
        </li> -->
        <li class="layui-nav-item" lay-unselect="">
            <a href="javascript:;"><img src="<?php echo user()->picture; ?>" class="layui-nav-img"><?php echo user()->name; ?></a>
            <dl class="layui-nav-child">
                <dd><a href="javascript:;">修改信息</a></dd>
                <dd><a href="<?php echo e(guard_url('logout')); ?>">退出</a></dd>
            </dl>
        </li>
    </ul>
</div>
