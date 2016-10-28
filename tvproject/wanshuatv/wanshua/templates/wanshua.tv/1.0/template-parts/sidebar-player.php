<div class="sidebar" id="main-sidebar">
  <h2>推荐主播</h2>
  <ul id="home-player-list" class="player-list">

    <!-- 单独主播见 macros/player-状态.php -->
    
    {% for user in user_list %}
    <li>
      <div class="player-avatar">
        <img src="{{ user.avatar }}" class="avatar img-responsive" alt="{{ user.username }}">
        <a href="/room/{{ user.room_id }}" class="player-avatar-link" title="访问 {{ user.username }} 的页面">{{ user.username }}</a>
      </div>
      <div class="player-info">
        <h3><a href="/room/{{ user.room_id }}" title="访问 {{ user.username }} 的页面">{{ user.username }}</a></h3>
        <p class="recommended-note">{{ user.introduction }}</p>
        {% if user.live_status=='connected' %}
        <span class="live-sign">直播中</span>
        {% endif %}
      </div>

    </li>
    {% endfor %}

  </ul>
</div>