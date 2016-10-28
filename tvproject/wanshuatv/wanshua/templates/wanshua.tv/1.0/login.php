{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}
  <div class="main-content" id="index-content">
    <div class="content page profile-page">
      <div class="content-wrapper">
        <div class="row">

          <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 settings-content">
            <div class="settings-content-wrapper log-in-out" id="form-account">
              <h3><span>登录</span></h3>

              {% include 'wanshua.tv/1.0/macros/form-login.php' %}

              {% include 'wanshua.tv/1.0/macros/social-login.php' %}

            </div>
            <div class="form-account-add">
              <a href="/findpwd" class="pull-left">&laquo; 忘记密码？</a>
              <a href="/signup" class="pull-right">注册账号 &raquo;</a>
            </div>
          </div>
        </div>
      </div>

      {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}
    </div>

  </div>

{% endblock %}