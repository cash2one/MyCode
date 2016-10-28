{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}

    {% include 'wanshua.tv/1.0/macros/hero-index.php' %}

    <div class="main-content" id="index-content">
      <div class="content">
        <div class="content-wrapper">

          {% include 'wanshua.tv/1.0/template-parts/content-home.php' %}

          {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}

        </div>
      </div>

      {% include 'wanshua.tv/1.0/template-parts/sidebar-player.php' %}

    </div>

{% endblock %}


{% block script %}

<script type="text/javascript" src="/static/js/vue.min.js" charset="utf-8"></script>

<script>
  
// 应以一个全局的变量

var curr_user =  {{ (g.user.json() if g.user else None) | tojson }};

var _lives = {{   live_list | tojson   }};


</script>

<script type="text/javascript" src="/static/js/index.js?t=1225"></script>
{% endblock %}