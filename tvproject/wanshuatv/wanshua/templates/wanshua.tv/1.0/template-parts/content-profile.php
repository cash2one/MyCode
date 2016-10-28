<div class="content-inner profile">

    <div class="profile-content" style="background-image: url('assets/placeholder/profile-cover.jpg');">
      <div class="profile-content-inner">
        <div class="profile-meta">
          <div class="profile-avatar">
            <div class="profile-avatar-wrapper">
              <img src="{{ user.avatar }}" class="avatar img-responsive" alt="{{ user.username }}">

              {% if is_current %}
              <!-- 如果用户为当前用户 出现更换头像入口-->
              <a href="settings-avatar.php" class="avatar-change" title="更换头像" data-toggle="tooltip" data-placement="right"><i class="fa fa-camera"></i></a>
              {% endif %}

            </div>
          </div>
          <h1>
            <span class="profile-name">{{ user.username }}</span>
            {% if user.new_gender==1 %}
            <span class="gender gender-male"><i class="fa fa-mars"></i></span> <!-- 如果是男生 -->
            {% else %}
            <span class="gender gender-female"><i class="fa fa-venus"></i></span> <!-- 如果是女生 -->
            {% endif %}
          </h1>
          <div class="profile-desc">
            {{ user.introduction }}
          </div>
          <div class="profile-actions">
            <a v-if="!is_follow" href="#" @click="follow_user" title="关注 {{ user.username }}" class="btn btn-success btn-follow"><i class="fa fa-plus-circle"></i> <span class="text">关注 TA</span></a>
            <!-- 关注中 及 取消关注 的按钮 -->
            <a v-if="is_follow" href="#" @click="follow_user" title="关注 {{ user.username }}" class="btn btn-following">
              <span class="following"><i class="fa fa-check-circle-o"></i> <span class="text">已关注 TA</span></span>
              <span class="unfollow"><i class="fa fa-times-circle-o"></i> <span class="text">取消关注</span></span>
            </a>
            <a href="/room/{{ user.room_id }}" title="关注 {{ user.username }}" class="btn btn-success btn-follow"><i class="fa fa-video-camera"></i> <span class="text">直播间</span></a>

          </div>

        </div>
      </div>

      {% if is_current %}
      <!-- 如果当前页面是自己的 -->
      <div class="profile-change">
        <a href="#" class="btn btn-link pull-left">更改封面</a>
        <a href="/user/set" class="btn btn-link pull-right">更改资料</a>
      </div>
      {% endif %}

    </div>

    <div class="profile-tabs">

      <ul class="pull-left nav-tabs">
        <li class="active"><a href="/user/{{ user.uid }}">视频</a></li>
        <li><a href="/user/{{ user.uid }}/follower">关注 <span class="tab-count">{{ user.following_count }}</span></a></li>
        <li><a href="/user/{{ user.uid }}/following">粉丝 <span class="tab-count">{{ user.follower_count }}</span></a></li>
      </ul>


      <ul class="pull-right nav-tabs">

        <!-- 如果当前页面是自己 -->
        <li id="my-coins"><i class="fa fa-usd"></i> 我的玩耍币 <span>244</span> <small>(<a href="settings-bill.php">充值</a>)</small></li>
        <li><a href="profile-messages.php"><i class="fa fa-comments"></i> 消息 <span class="tab-count nav-count">3</span></a></li>

        <!-- 如果当前页面是他人 -->
        <!-- <li class="video-action dropdown pull-right">
          <a href="javascript:void(0);" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            分享
            <span class="caret"></span>
          </a>
          <?php //include('macros/dropdown-share.php'); ?>
        </li> -->

      </ul>
    </div>
  </div>