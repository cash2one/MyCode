{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}
  <div class="main-content" id="index-content">
    <div class="content page profile-page">
      <div class="content-wrapper">
        <div class="row">

          <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 settings-content">
            <div class="settings-content-wrapper log-in-out" id="form-account">
              <h3><span>注册新账号</span></h3>

              {% include 'wanshua.tv/1.0/macros/form-signup.php' %}

              {% include 'wanshua.tv/1.0/macros/social-login.php' %}

            </div>
            <div class="form-account-add">
              <a href="/login" class="pull-left">&laquo; 登录</a>
              <a href="/findpwd" class="pull-right">忘记密码？ &raquo;</a>
            </div>
          </div>
        </div>
      </div>

      {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}
    </div>

  </div>

{% endblock %}
