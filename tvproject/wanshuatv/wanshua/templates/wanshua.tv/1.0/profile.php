{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}
  <div class="main-content" id="index-content">
      <div class="content page profile-page">
        <div class="content-wrapper">
          {% include 'wanshua.tv/1.0/template-parts/content-profile.php' %}

          <!-- 如果有视频 -->
          {% include 'wanshua.tv/1.0/template-parts/content-related.php' %}

          <!-- 如果没有视频 -->
          <?php //include('template-parts/profile-video-none.php'); //没有视频 ?>
        </div>
      </div>

    </div>

{% endblock %}
{% block script %}
<script>
  USER = {{ user.json() | tojson }};
  IS_CURRENT = {{ is_current | tojson }};
  IS_FOLLOW = {{ is_follow | tojson }};
</script>
<script>
  user_profile.profile();
</script>
{% endblock %}