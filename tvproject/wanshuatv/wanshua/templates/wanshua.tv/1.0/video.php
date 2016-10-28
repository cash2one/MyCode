{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}

<!-- 请将下面两个文件在对接时放入 header 相应位置 -->
<!-- 视频需要的文件 -->
<link href="/static/wanshua.tv/1.0/assets/js/videojs/video-js.css" rel="stylesheet">
<script src="/static/wanshua.tv/1.0/assets/js/videojs/ie8/videojs-ie8.min.js"></script>


    <div class="main-content">
      <div class="content">
        <div class="content-wrapper">

          <div class="content-section video-player-banner">
            <div class="section-wrapper">
              <div class="video-avatar">


                <a href="#" title="{{ live.user.username }}"><img src="{{ live.user.avatar }}" class="img-responsive avatar" alt="{{ live.user.username }}"> </a> 


              </div>
              <div class="video-info">
                <h1>
                  <span class="video-name">{{ live.title }}</span>
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
                  <span><i class="fa fa-user"></i> <a href="#" title="{{ live.user.username }}">{{ live.user.username }}</a></span>
                  <span><i class="fa fa-eye"></i> 观看人数 {{ live.play_count }}</span>


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
                <video id="my-video" class="video-js" controls preload="auto" poster="{{ live.snapshot }}" height="480" data-setup="{}">

                  {% if live.video_url and 'mp4' in live.video_url %}
                   <source src="{{ live.video_url }}" type='video/mp4'>
                  {% else %}
                  <source src="{{ live.video_url }}" type='application/x-mpegURL'>

                  {% endif %}
                  <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                  </p>
                </video>
              </div>

              {% if video_action %}
              <div class="video-actions">
                <div class="video-wallet pull-left">
                  我的玩耍币 <!-- TODO: @Chada -->
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
                          <h4>礼物名称 (<span>{{ gift.count }}玩耍币</span>)</h4>
                          <p>点击发射给主播，biu~</p>
                        </div>
                      </div>
                    </li>

                    {% endfor %}
                  </ul>
                </div>
                
              </div>
              {% endif  %}

            </div>
            <!-- 请将下面这个文件在对接时放入 footer 相应位置 -->
            <!-- 视频需要的文件 -->

          </div>

<!--           <h2>房间简介</h2>
          <div class="content-section video-about">
            <p>我不是萌妹子，但也照样可以活的精彩。 爱我你就关注我，不爱我，也要关注我。 跪求礼物思密达~ 四点开始直播，每个半点露脸！ 自由之战不败id：26641383124 房间开黑密码: 9876 主播qq群： 208358353</p>
          </div>
 -->

          <h2>评论</h2>
          <div class="content-section comment-wrapper comments">
            {% include 'wanshua.tv/1.0/template-parts/content-comments.php' %}
          </div>

          {% include 'wanshua.tv/1.0/template-parts/content-related.php' %}

          {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}

        </div>
      </div>

      <!-- 关联视频 TODO: @Chada -->
      {% include 'wanshua.tv/1.0/template-parts/sidebar-related-video.php' %}

    </div>

{% endblock %}
{% block script %}
<script src="/static/wanshua.tv/1.0/assets/js/videojs/video.min.js"></script>
<script src="/static/videojs-contrib/src/videojs-media-sources.js"></script>
<script src="/static/js/videojs.hls.min.js"></script>


<script type="text/javascript" src="/static/js/vue.min.js" charset="utf-8"></script>

<script>

// 应以一个全局的变量
var curr_user =  {{ (g.user.json() if g.user else None) | tojson }};
var user = {{ live.user.json() | tojson }};
var is_follow = {{ is_follow | tojson }};
var live = {{  (live.json() if live else None) | tojson }};
var _replys = {{  replys | tojson }};

</script>

<script type="text/javascript" src="/static/js/video_playback.js?t=1225"></script>

{% endblock %}
