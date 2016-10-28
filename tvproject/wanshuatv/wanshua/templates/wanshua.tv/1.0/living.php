
{% extends 'wanshua.tv/1.0/base.php' %}

{% block head %}

<link rel="stylesheet" type="text/css" href="{{ url_for('static',filename='danmaku/style.min.css') }}">


<style type="text/css">
  

  .user_is_gone {

    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: #000;
    z-index: 10000;
    text-align: center;

  }
</style>

{% endblock %}

{% block main %}

<!-- 请将下面两个文件在对接时放入 header 相应位置 -->
<!-- 视频需要的文件 -->
<link href="/static/wanshua.tv/1.0/assets/js/videojs/video-js.css" rel="stylesheet">
<script src="/static/wanshua.tv/1.0/assets/js/videojs/ie8/videojs-ie8.min.js"></script>


    <div class="main-content">
      <div class="content page">
        <div class="content-wrapper">

          <div class="content-section video-player-banner">
            <div class="section-wrapper">
              <div class="video-avatar">
                <a href="/room/{{ user.room_id }}" title="{{ user.username }}"><img src="{{ user.avatar }}" class="img-responsive avatar" alt="{{ user.username }}"></a>
              </div>
              <div class="video-info">
                <h1>
                  <span class="video-name">{{ live.title or user.username + '的直播间' }}</span>

                  {% if live.game_id %}
                  <span class="video-game">
                    <a href="#" title="{{ live.game_id }}"><i class="fa fa-gamepad"></i> {{ live.game_id }}</a>
                  </span>
                  {% endif %}

                  <span class="pull-right">
                    <a  v-if="!is_follow"  v-on:click="followSwitch"
                      class="btn btn-success btn-follow btn-follow-s"><i class="fa fa-plus-circle"></i> <span class="text">关注 TA</span></a>


                    <a v-else  v-on:click="followSwitch"
                      class="btn btn-success btn-following btn-follow-s"><i class="fa fa-times-circle-o"></i> <span class="text">取消关注</span></a>

                  </span>
                </h1>
                <div class="video-meta">
                  <span><i class="fa fa-user"></i> <a href="/room/{{ user.room_id }}" title="{{ user.username }}">{{ user.username }}</a></span>
                  <span><i class="fa fa-eye"></i> 观看人数 [[ live_user_count ]]</span>
                  <div class="video-action dropdown pull-right">
                    <a href="javascript:void(0);" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      手机观看
                      <span class="caret"></span>
                    </a>
                    {% include 'wanshua.tv/1.0/macros/dropdown-mobile-qrcode.php' %}
                  </div>

                  <div class="video-action dropdown pull-right">
                    <a href="javascript:void(0);" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      分享
                      <span class="caret"></span>
                    </a>
                    {% include 'wanshua.tv/1.0/macros/dropdown-share.php' %}
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="content-section video-content">

            <div class="video-wrapper">

              <div class="video-inner">
                <!-- <video id="my-video" class="video-js" controls preload="auto" poster="/static/wanshua.tv/1.0/assets/placeholder/videos/h8bg.png" data-setup="{}">
                  <source src="/static/wanshua.tv/1.0/assets/placeholder/videos/h8bg.mp4" type='video/mp4'>
                  <source src="/static/wanshua.tv/1.0/assets/placeholder/videos/h8bg.webm" type='video/webm'>
                  <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                  </p>
                </video> -->

                <div  class="abp" style="width:100%;height:480px;">
                    <div id="danmaku_container" class="container no_container" style="width: 100%">
                        <div id="player" style="width:100%;height:100%"></div>
                    </div>
<!--                     <div  v-show="status == 'disconnected' " style="position:absolute; top: 0; right: 0; bottom: 0; left: 0; z-index: 10000; background: #000;text-align: center;">
                        <img src="http://7u2tgb.com2.z0.glb.qiniucdn.com/user_is_gone.jpg" class="img-responsive" style="display:inline-block;" />
                    </div> -->
                </div>

<!--                 <div class="mask disconnected" v-show="status == 'disconnected' " >
                    <div class="">
                        <img src="http://7u2tgb.com2.z0.glb.qiniucdn.com/user_is_gone.jpg" class="img-responsive" />
                    </div>
                </div>
 -->
              </div>

              <div class="video-actions">
                <div class="video-wallet pull-left">
                  <!-- TODO: @Chada -->

                  <span class="wallet-balance">我的玩耍币: <em>[[ user_balance ]] </em></span>
                  <a href="/user/set/billing"  target="_blank" class="btn btn-primary">充值</a>

                </div>
                <div class="video-gifts pull-right">
                  <!-- TODO: @Chada -->
                  <ul>

                    {% for gift in gifts %}
                    <li class="gift dropdown">
                      <a style="cursor: pointer;" v-on:click="rewardGift({{ gift.id | tojson }})" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ gift.pic}}" class="img-responsive">
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dLabel">
                        <div class="gift-icon">
                          <img src="{{ gift.pic}}" class="img-responsive">
                        </div>
                        <div class="gift-info">
                          <h4>{{ gift.name  }} (<span>{{ gift.count }}玩耍币</span>)</h4>
                          <p>点击发射给主播，biu~</p>
                        </div>
                      </div>
                    </li>

                    {% endfor %}
                    </ul>

                </div>
              </div>

            </div>
            <!-- 请将下面这个文件在对接时放入 footer 相应位置 -->
            <!-- 视频需要的文件 -->
            <script src="/static/wanshua.tv/1.0/assets/js/videojs/video.min.js"></script>

          </div>

          <h2>房间简介</h2>
          <div class="content-section video-about">
            <p>{{ user.board  or '主播很懒，还没设置房间信息' }}</p>
          </div>



           <!--
           include 'wanshua.tv/1.0/template-parts/content-related.php'

           -->



          {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}

        </div>
      </div>

      <!-- 聊天模块 TODO: @Chada -->
      {% include 'wanshua.tv/1.0/template-parts/sidebar-living.php' %}

    </div>

{% endblock %}

{% block script %}
<script type="text/javascript" src="/static/ckplayer/ckplayer.js" charset="utf-8"></script>
<script src="{{ url_for('static',filename='danmaku/CommentCoreLibrary.min.js') }}"></script>
<script type="text/javascript" src="/static/js/pushstream.js" charset="utf-8"></script>
<script type="text/javascript" src="/static/js/vue.min.js" charset="utf-8"></script>

<script>

// 应以一个全局的变量
var jwt_token = '{{ jwt_token }}';
var chat_server = '{{ chat_server }}';
var curr_user =  {{ (g.user.json() if g.user else None) | tojson }};
var user = {{ user.json() | tojson }};
var is_follow = {{ is_follow | tojson }};
var user_id = '{{ g.user.id if g.user }}';
var uid = '{{ g.user.uid if g.user }}';
var username = '{{ g.user.username if g.user }}';
var room = '{{ user.room_id }}';
var rtmp_play_url = '{{  rtmp_play_url }}';
var hls_play_url = '{{ hls_play_url }}';
var http_flv_play_url = '{{ http_flv_play_url }}';
var live = {{  (live.json() if live else None) | tojson }};
var status = '{{ status  }}';
var chats = {{ chats | tojson }};

</script>

<script type="text/javascript" src="/static/js/live.js?t=1225"></script>
{% endblock %}