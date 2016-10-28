{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}
  <div class="main-content" id="index-content">
    <div class="content page profile-page">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 settings-sidebar">
            <ul class="">
              <li class="active"><a href="/user/set">个人设置</a></li>
              <!-- <li><a href="/user/set/password">修改密码</a></li> -->
              <li><a href="/user/set/billing">充值</a></li>
            </ul>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 settings-content">
            <div class="settings-content-wrapper">
              <h3>个人设置</h3>
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="user-email" class="col-sm-3 control-label">头像</label>
                  <div class="col-sm-9">
                    <div class="profile-avatar-wrapper">
                      <img :src="avatar" class="avatar img-responsive" alt="{{ g.user.username }}">
                      <div class="camera-icon">
                        <div class="camera-icon-wrapper">
                          <input type="file" id="change-avatar" class="avatar-change">
                          <i class="fa fa-camera"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="user-email" class="col-sm-3 control-label">账号</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="user-email" value="{{ g.user.email }}" disabled>
                    <p class="form-note">账号邮箱不能修改</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="user-nickname" class="col-sm-3 control-label">昵称</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="username" id="user-nickname" placeholder="昵称">
                    <p class="form-note form-note-error">昵称不能为空</p> <!-- 提交为空时出现 -->
                  </div>
                </div>
                <div class="form-group">
                  <label for="user-gender" class="col-sm-3 control-label">性别</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="usergender" v-model="new_gender" id="user-male" value="1">
                        男
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="usergender" v-model="new_gender" id="user-female" value="2">
                        女
                      </label>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="user-weibo" class="col-sm-3 control-label">微博</label>
                  <div class="col-sm-9">
                    <span>@巴拉巴拉小魔仙</span>
                    <a href="#"><small>解除绑定</small></a>
                  </div>
                </div>
                <div class="form-group">
                  <label for="user-wechat" class="col-sm-3 control-label">微信</label>
                  <div class="col-sm-9">
                    <a href="#"><small>绑定微信</small></a>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" @click.stop.prevent="updateUser" class="btn btn-success">保存设置</button>
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
{% block script %}
<script>
user_set.sets();
</script>
{% endblock %}