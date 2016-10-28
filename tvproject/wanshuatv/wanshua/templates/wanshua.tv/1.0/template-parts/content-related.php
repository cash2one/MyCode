<h2>他的视频</h2>
<div class="content-inner video-list">
  <div class="row">
    {% for live in lives %}
    <!-- 单个视频卡片 -->
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover" style="background-image:url({{ live.snapshot }});">
          {% if live.status=='connected' %}
          <a href="/room/{{ live.room_id }}" class="video-item-link">{{ live.title }}</a>
          <span class="live-sign">直播中</span>
          {% else %}
          <a href="/live/video/{{ live.uid }}" class="video-item-link">{{ live.title }}</a>
          {% endif %}
        </div>
        <div class="video-item-meta">
          {% if live.status=='connected' %}
          <h3><a href="/room/{{ live.room_id }}" title="{{ live.title }}">{{ live.title }}</a></h3>
          {% else %}
          <h3><a href="/live/video/{{ live.uid }}" title="{{ live.title }}">{{ live.title }}</a></h3>
          {% endif %}
          <div class="video-item-player">
            <a href="/user/{{ live.user.uid }}" title="{{ live.user.username }}"><img src="{{ live.user.avatar }}" class="avatar" alt="{{ live.user.username }}"></a>
            <a href="/user/{{ live.user.uid }}" title="{{ live.user.username }}">{{ live.user.username }}</a>
            <span class="watch-count pull-right"><i class="fa fa-eye"></i> {{ live.live_user_count }}</span>
          </div>
        </div>
      </div>
    </div>
    <!-- 单个视频卡片结束 -->
    {% endfor %}

    <!-- <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover">
          <img src="/static/wanshua.tv/1.0/assets/placeholder/videos/2.jpg" class="img-responsive" alt="直播名称">
          <a href="#" class="video-item-link">直播名称</a>
          <span class="live-sign">直播中</span>
        </div>
        <div class="video-item-meta">
          <h3><a href="#" title="直播名称">直播名称啊直播名称</a></h3>
          <div class="video-item-player">
            <a href="#" title="主播名称"><img src="/static/wanshua.tv/1.0/assets/placeholder/avatars/2.jpg" class="avatar" alt="主播名称"></a>
            <a href="#" title="主播名称">王爱玲</a>
            <span class="watch-count pull-right"><i class="fa fa-eye"></i> 263</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover">
          <img src="/static/wanshua.tv/1.0/assets/placeholder/videos/3.jpg" class="img-responsive" alt="直播名称">
          <a href="#" class="video-item-link">直播名称</a>
          <span class="live-sign">直播中</span>
        </div>
        <div class="video-item-meta">
          <h3><a href="#" title="直播名称">直播名称啊直播名称</a></h3>
          <div class="video-item-player">
            <a href="#" title="主播名称"><img src="/static/wanshua.tv/1.0/assets/placeholder/avatars/3.jpg" class="avatar" alt="主播名称"></a>
            <a href="#" title="主播名称">Justin</a>
            <span class="watch-count pull-right"><i class="fa fa-eye"></i> 263</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover">
          <img src="/static/wanshua.tv/1.0/assets/placeholder/videos/4.jpg" class="img-responsive" alt="直播名称">
          <a href="#" class="video-item-link">直播名称</a>
          <span class="live-sign">直播中</span>
        </div>
        <div class="video-item-meta">
          <h3><a href="#" title="直播名称">直播名称啊直播名称</a></h3>
          <div class="video-item-player">
            <a href="#" title="主播名称"><img src="/static/wanshua.tv/1.0/assets/placeholder/avatars/4.jpg" class="avatar" alt="主播名称"></a>
            <a href="#" title="主播名称">会飞的猪</a>
            <span class="watch-count pull-right"><i class="fa fa-eye"></i> 263</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover">
          <img src="/static/wanshua.tv/1.0/assets/placeholder/videos/5.jpg" class="img-responsive" alt="直播名称">
          <a href="#" class="video-item-link">直播名称</a>
          <span class="live-sign">直播中</span>
        </div>
        <div class="video-item-meta">
          <h3><a href="#" title="直播名称">直播名称啊直播名称</a></h3>
          <div class="video-item-player">
            <a href="#" title="主播名称"><img src="/static/wanshua.tv/1.0/assets/placeholder/avatars/5.jpg" class="avatar" alt="主播名称"></a>
            <a href="#" title="主播名称">妲己哒哒</a>
            <span class="watch-count pull-right"><i class="fa fa-eye"></i> 263</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover">
          <img src="/static/wanshua.tv/1.0/assets/placeholder/videos/6.jpg" class="img-responsive" alt="直播名称">
          <a href="#" class="video-item-link">直播名称</a>
          <span class="live-sign">直播中</span>
        </div>
        <div class="video-item-meta">
          <h3><a href="#" title="直播名称">直播名称啊直播名称</a></h3>
          <div class="video-item-player">
            <a href="#" title="主播名称"><img src="/static/wanshua.tv/1.0/assets/placeholder/avatars/6.jpg" class="avatar" alt="主播名称"></a>
            <a href="#" title="主播名称">龙少</a>
            <span class="watch-count pull-right"><i class="fa fa-eye"></i> 263</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover">
          <img src="/static/wanshua.tv/1.0/assets/placeholder/videos/7.jpg" class="img-responsive" alt="直播名称">
          <a href="#" class="video-item-link">直播名称</a>
        </div>
        <div class="video-item-meta">
          <h3><a href="#" title="直播名称">直播名称啊直播名称</a></h3>
          <div class="video-item-player">
            <a href="#" title="主播名称"><img src="/static/wanshua.tv/1.0/assets/placeholder/avatars/7.jpg" class="avatar" alt="主播名称"></a>
            <a href="#" title="主播名称">共冬冬</a>
            <span class="watch-count pull-right"><i class="fa fa-eye"></i> 263</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover">
          <img src="/static/wanshua.tv/1.0/assets/placeholder/videos/8.jpg" class="img-responsive" alt="直播名称">
          <a href="#" class="video-item-link">直播名称</a>
        </div>
        <div class="video-item-meta">
          <h3><a href="#" title="直播名称">直播名称啊直播名称</a></h3>
          <div class="video-item-player">
            <a href="#" title="主播名称"><img src="/static/wanshua.tv/1.0/assets/placeholder/avatars/8.jpg" class="avatar" alt="主播名称"></a>
            <a href="#" title="主播名称">ichada</a>
            <span class="watch-count pull-right"><i class="fa fa-eye"></i> 263</span>
          </div>
        </div>
      </div>
    </div> -->

  </div>
</div>

<div class="content-load-more">

</div>