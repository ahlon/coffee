<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="/">Macitoo</a> 
            <ul class="nav">
                <li><a href="/admin/users">用户</a></li>
                <li><a href="/admin/groups">群组</a></li>
                <li><a href="/admin/resources">资源</a></li>
                <li><a href="/admin/categories">分类</a></li>
                <li><a href="/admin/mottos">箴言</a></li>
            </ul>
            <ul class="nav pull-right">
                <?php 
                if (empty($user_info)) {
                ?>
                <li><a href="/login">登录</a></li>
                <li><a href="/signup">注册</a></li>                
                <?php
                } else {
                ?>
                <li><a href="/msgs">消息</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $user_info['avatar_url']?>"/> <?php echo @$user_info['display_name'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu"> 
                        <li><a href="/settings"><i class="icon-cog"></i> 设置</a></li>
                        <li><a href="/logout"><i class="icon-off"></i> 退出</a></li>
                    </ul>
                </li>
                <?php
                }
                ?>
                <li class="divider-vertical"></li>
            </ul>
        </div>
    </div>
</div>