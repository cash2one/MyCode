<h2>热门视频</h2>
<div class="content-inner video-list">
  <div class="row">

    
    <!-- 单个视频卡片 -->
    <div  v-for="live in lives"  class="col-lg-3 col-md-4 col-sm-4 col-xs-6 video-item">
      <div class="video-item-wrapper">
        <div class="video-item-cover" style="background-image:url([[ live.snapshot ]]);">

          <div v-if="live.status == 'connected' ">
            <a  href="/room/[[ live.room_id ]]" class="video-item-link">[[ live.title ]]</a>
            <span class="live-sign">直播中</span>
          </div>
          
          <div v-else>
          <a href="/live/video/[[ live.uid ]]" class="video-item-link">[[ live.title ]]</a>
          </div>

        </div>
        <div class="video-item-meta">
         
          <h3 v-if="live.status == 'connected' " ><a href="/room/[[ live.room_id ]]" title="[[ live.title ]]">[[ live.title ]]</a></h3>
          
          <h3 v-else ><a href="/live/video/[[ live.uid ]]" title="[[ live.title ]]">[[ live.title ]]</a></h3>
         
          <div class="video-item-player">
            <a href="/room/[[ live.user.room_id ]]"  target="_blank"  title="[[ live.user.username ]]"><img :src="live.user.avatar" class="avatar" alt="[[ live.user.username ]]"></a>
            <a href="/room/[[ live.user.room_id ]]" title="[[ live.user.username ]]">[[ live.user.username ]]</a>
            <span v-if="live.status == 'connected' " class="watch-count pull-right"><i class="fa fa-eye"></i> [[ live.live_user_count ]]</span>
            <span v-else class="watch-count pull-right"><i class="fa fa-eye"></i> [[ live.play_count ]]</span>
          </div>
        </div>
      </div>
    </div>
    <!-- 单个视频卡片结束 -->
   

  </div>
</div>


<div v-show="loadmore" class="load-more-button-container">
    <a v-if="!loading" class="ss-button" v-on:click="loadMore">加载更多</a>
    <a v-else class="ss-button ss-loading" ></a>
</div>