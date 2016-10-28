<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
  <title>玩耍直播 wanshua.tv - 一起来玩耍手游直播</title>
  <meta name="description" content="玩耍直播 wanshua.tv - 一起来玩耍手游直播">
  <meta name="keywords" content="手游直播,直播,手游,玩耍,游戏主播">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/static/wanshua.tv/1.0/assets/images/favicon2/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/static/wanshua.tv/1.0/assets/images/favicon2/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/static/wanshua.tv/1.0/assets/images/favicon2/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/static/wanshua.tv/1.0/assets/images/favicon2/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/static/wanshua.tv/1.0/assets/images/favicon2/favicon-16x16.png">
  <link rel="manifest" href="/static/wanshua.tv/1.0/assets/images/favicon2/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/static/wanshua.tv/1.0/assets/images/favicon2/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- end Favicon -->

  <!-- CSS -->
  <link rel="stylesheet" href="/static/wanshua.tv/1.0/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/static/wanshua.tv/1.0/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="/static/wanshua.tv/1.0/assets/css/screen.css">
  <!-- end CSS-->

  <!-- HeadEx -->
  {% block head %}
  {% endblock %}


</head>
<body>
  <header id="main-header" class="main-header">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">玩耍直播</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">首页 <span class="sr-only">(current)</span></a></li>
            <li><a href="/lives">最新直播</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-mobile"></i> App 下载</a></li>
            <li><a href="#"><i class="fa fa-question"></i> 帮助</a></li>

            {% if not g.user %}
            <!-- 未登录 显示内容 开始 -->
            <li>
              <a href="javascript:void(0);" class="user-btn modal-btn" data-opentab="1"><i class="fa fa-user"></i>&nbsp; 注册</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="javascript:void(0);" class="user-btn modal-btn" data-opentab="0">登录</a>
            </li>
            <!-- 未登录 显示内容 结束 -->
            {% else %}
            <!-- 已登录 显示内容 开始 -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle user-info" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/static/wanshua.tv/1.0/assets/placeholder/avatar1.jpg" alt="用户名" class="img-responsive avatar"> Charles Chiu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/user/"><i class="fa fa-user"></i> 我的主页</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> 我的消息</a></li>
                <li><a href="/user/set"><i class="fa fa-cog"></i> 帐号设置</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/logout"><i class="fa fa-sign-out"></i> 退出登录</a></li>
              </ul>
            </li>
            <!-- 已登录 显示内容 结束 -->
            {% endif %}
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>
  <div class="wrapper">