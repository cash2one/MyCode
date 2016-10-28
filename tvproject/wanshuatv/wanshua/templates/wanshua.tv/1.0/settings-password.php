{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}
  <div class="main-content" id="index-content">
    <div class="content page profile-page">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 settings-sidebar">
            <ul class="">
              <li class="active"><a href="/user/set">个人设置</a></li>
              <li><a href="/user/set/password">修改密码</a></li>
              <li><a href="/user/set/billing">充值</a></li>
            </ul>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 settings-content">
            <div class="settings-content-wrapper">
              <h3>修改密码</h3>
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="user-password" class="col-sm-3 control-label">旧密码</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="user-password" placeholder="现有密码">
                  </div>
                </div>
                <div class="form-group">
                  <label for="user-password" class="col-sm-3 control-label">新密码</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="user-password" placeholder="现有密码">
                  </div>
                </div>
                <div class="form-group">
                  <label for="user-password" class="col-sm-3 control-label">确认新密码</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="user-password" placeholder="现有密码">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-success">确认修改</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}
    </div>

  </div>

{% endblock %}