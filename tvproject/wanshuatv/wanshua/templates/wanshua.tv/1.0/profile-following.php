{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}
  <div class="main-content" id="index-content">
      <div class="content page profile-page">
        <div class="content-wrapper">
          {% include 'wanshua.tv/1.0/template-parts/content-profile.php' %}

          <h2>Ta 的关注 (19)</h2>
          <div class="content-inner video-list">

            {% include 'wanshua.tv/1.0/template-parts/profile-userlist.php' %}

            <!-- 如果没有关注任何用户 -->
            <?php //include('template-parts/profile-follower-none.php'); //没有视频 ?>

          </div>

          <div class="content-load-more">

          </div>

        </div>
      </div>

    </div>

{% endblock %}