<div class="row" style="background: #f5f5f5 url('/assets/img/poster.jpg') no-repeat right; padding:60px;">
    <div class="col-md-7">
    </div>
    <div class="col-md-5">
        <ul class="nav nav-tabs">
            <li><a href="/login">登录</a></li>
            <li class="active"><a href="/register">注册</a></li>
        </ul>
        <div class="tab-pane well" id="signup">
            <form action="register" method="post">
                <div class="form-group">
                    <label>昵称</label>
                    <input type="text" class="form-control" name="nickname" value="">
                </div>
                <div class="form-group">
                    <label>邮箱</label>
                    <input type="text" class="form-control" name="email" value="">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" class="form-control" name="password" value="">
                </div>
                <div class="form-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">注册</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>