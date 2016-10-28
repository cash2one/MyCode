<div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="z-index:10000">
      <div class="modal-content">
        <div class="modal-header">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#modal-signin" aria-controls="modal-signin" role="tab" data-toggle="tab">登录</a></li>
            <li role="presentation"><a href="#modal-signup" aria-controls="modal-signup" role="tab" data-toggle="tab">注册</a></li>
          </ul>
        </div>
        <div class="modal-body log-in-out">

          <div class="tab-content">

            <!-- 登录 Tab -->
            <div role="tabpanel" class="tab-pane active" id="modal-signin">
              {% include 'wanshua.tv/1.0/macros/form-login.php' %}
            </div>

            <!-- 注册 Tab -->
            <div role="tabpanel" class="tab-pane" id="modal-signup">
              {% include 'wanshua.tv/1.0/macros/form-signup.php' %}
            </div>

          </div>

          {% include 'wanshua.tv/1.0/macros/social-login.php' %}

          <div class="form-account-add">
            <a href="/findpwd" title="忘记密码">忘记密码？</a>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>