
{% with messages = get_flashed_messages(with_categories=true) %}
    {% if messages %}
        {% for type,message in messages %}
            <!-- 登录失败提示 -->
            <div class="alert alert-{{ type }}" role="alert">
              <i class="fa fa-info-circle"></i> {{ message }}
            </div>
        {% endfor %}
    {% endif %}
{% endwith %}

<form class="form-horizontal form-account" action="/user/login" method="POST">
  <div class="form-group phone-number login">
    <div class="input-group">
      <input type="phone" name="phone" class="form-control" id="user-phone" placeholder="您的手机号">
    </div>
    <!-- <div class="form-note form-note-error">
      请输入正确的手机号
    </div> -->
  </div>
  <div class="form-group">
    <div class="">
      <input type="password" name="password" class="form-control" id="user-password" placeholder="输入密码">
    </div>
  </div>
  <div class="form-group">
    <div class="">
      <button type="submit" class="form-control btn btn-success">登录</button>
    </div>
  </div>
</form>