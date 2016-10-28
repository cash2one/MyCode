<ol class="comment-list">
  <li class="" id="comment-92" v-for="reply in replys" >
    <div class="comment-author-avatar">
      <img alt="" src="[[ reply.user.avatar ]]" class="avatar img-responsive">
    </div>
    <div class="comment-content">
      <div class="comment-header">
        <span class="comment-name"><a href="javascript:void(0);" title="玩家名字">[[ reply.user.username ]]</span>
        <span class="commented-time pull-right"></span>
      </div>
      <div class="comment-body">
        <p>[[ reply.content ]]</p>
      </div>
    </div>
    </li><!-- #comment-## -->
</ol>


  <div id="respond" class="comment-respond">
    <h3 id="reply-title" class="comment-reply-title">发表评论</h3>

    {% if not g.user %}
    <!-- 如果用户没有登录 -->
    <p class="must-log-in">您需要 <a href="javascript:void(0);" class="user-btn modal-btn" data-opentab="0">登录</a> 以发表评论。<br></p>

    {% else %}
    <!-- 如果用户登录了 -->
    <form action="" method="post" id="commentform" class="comment-form">
      <p class="logged-in-as">
        登录为 <a href="#" class="dJAX_internal">{{ g.user.username }}</a>.
      </p>
      <div class="comment-avatar">
        <img alt="" src="{{ g.user.avatar }}" class="avatar" height="60" width="60">
      </div>
      <div class="form-group comment-textarea">
        <textarea class="form-control" id="comment"  v-model="reply_words" v-on:keyup.enter="sendReply"  rows="5" placeholder="在这里撰写评论..."></textarea>
      </div>
      <p class="form-submit">
        <a name="submit"  id="submit"  v-on:click="sendReply" class="btn btn-success" value="发布">发布</a>
      </p>
    </form>
    {% endif %}

  </div>