{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}

  <div class="main-content" id="index-content">
    <div class="content page profile-page">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 settings-sidebar">
            <div class="sidebar-wrapper">
              <h2><i class="fa fa-microphone"></i> 主播中心</h2>
              <ul class="">
                <li><a href="{{ url_for('web.user_balance_index') }}">概览</a></li>
                <li><a href="{{ url_for('web.user_earnings') }}">我的收入</a></li>
                <li><a href="{{ url_for('web.user_balance') }}">我的余额</a></li>
                <li class="active"><a href="{{ url_for('web.user_board') }}">我的排名</a></li>
              </ul>
            </div>
          </div>


          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 settings-content">
            <div class="settings-content-wrapper">
              <h3>我的排名</h3>
              <div class="settings-section">
                <div class="settings-section-wrapper row">
                  <div class="col-lg-12 settings-grid">
                    <div class="grid-wrapper">
                      <h4>当前排名</h4>
                      <div class="grid-data">{{ rank_num }}
                        <span class="badge badge-success"><i class="fa fa-arrow-circle-up"></i> 2</span> <!-- 排名相对上个月或昨天上涨 -->
                        <!-- <span class="badge badge-danger"><i class="fa fa-arrow-circle-down"></i> 4</span> --> <!-- 排名相对上个月或昨天下降 -->
                      </div>
                      <div class="grid-attr"><small>历史最佳排名 <span class="badge">4</span></small></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="settings-section">
                <h4 class="section-title">
                  主播排行榜(前20)
                  <!--<select id="earnings-period" class="pull-right">
                    <option id="201601">2016年1月</option>
                    <option id="201602">2016年2月</option>
                    <option id="201603">2016年3月</option>
                    <option id="201604">2016年4月</option>
                    <option id="201605">2016年5月</option>
                    <option id="201606">2016年6月</option>
                    <option id="201607">2016年7月</option>
                  </select>-->
                </h4>
                <div class="section-table">
                  <div class="section-table-header">
                    <div class="table-items">
                      <div class="table-item table-liver">
                        玩家名字
                      </div>
                      <div class="table-item table-board-now">
                        当前排名
                      </div>
                      <div class="table-item table-best">
                        最佳排名
                      </div>
                    </div>
                  </div>
                  <div class="section-table-body">
                    {% for user in users %}
                   <div class="table-items">
                      <div class="table-item table-liver">
                        {{ user.username }}
                      </div>
                      <div class="table-item table-board-now">
                        {{ loop.index }}<span class="badge badge-success"><i class="fa fa-arrow-circle-up"></i> {{ user.rank_value }}</span>
                      </div>
                      <div class="table-item table-best">
                        1
                      </div>
                    </div>
                    {% endfor %}
                   <!--<div class="table-items">
                      <div class="table-item table-liver">
                        爱玩游戏的王二小
                      </div>
                      <div class="table-item table-board-now">
                        1 <span class="badge badge-success"><i class="fa fa-arrow-circle-up"></i> 3</span>
                      </div>
                      <div class="table-item table-best">
                        1
                      </div>
                    </div>


                    <div class="table-items">
                      <div class="table-item table-liver">
                        爱玩游戏的王3小
                      </div>
                      <div class="table-item table-board-now">
                        2 <span class="badge badge-danger"><i class="fa fa-arrow-circle-down"></i> 1</span>
                      </div>
                      <div class="table-item table-best">
                        1
                      </div>
                    </div>
                    <div class="table-items">
                      <div class="table-item table-liver">
                        爱玩游戏的王4小
                      </div>
                      <div class="table-item table-board-now">
                        3 <span class="badge badge-success"><i class="fa fa-arrow-circle-up"></i> 3</span>
                      </div>
                      <div class="table-item table-best">
                        1
                      </div>
                    </div>
                    <div class="table-items">
                      <div class="table-item table-liver">
                        爱玩游戏的王4小
                      </div>
                      <div class="table-item table-board-now">
                        3 <span class="badge badge-success"><i class="fa fa-arrow-circle-up"></i> 3</span>
                      </div>
                      <div class="table-item table-best">
                        1
                      </div>
                    </div>
                    <div class="table-items">
                      <div class="table-item table-liver">
                        爱玩游戏的王4小
                      </div>
                      <div class="table-item table-board-now">
                        3 <span class="badge badge-success"><i class="fa fa-arrow-circle-up"></i> 3</span>
                      </div>
                      <div class="table-item table-best">
                        1
                      </div>
                    </div>
                    <div class="table-items">
                      <div class="table-item table-liver">
                        爱玩游戏的王4小
                      </div>
                      <div class="table-item table-board-now">
                        3 <span class="badge badge-success"><i class="fa fa-arrow-circle-up"></i> 3</span>
                      </div>
                      <div class="table-item table-best">
                        1
                      </div>
                    </div>
                    <div class="table-items">
                      <div class="table-item table-liver">
                        爱玩游戏的王4小
                      </div>
                      <div class="table-item table-board-now">
                        3 <span class="badge badge-success"><i class="fa fa-arrow-circle-up"></i> 3</span>
                      </div>
                      <div class="table-item table-best">
                        1
                      </div>
                    </div>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}
    </div>

  </div>

  {% include 'wanshua.tv/1.0/macros/modal-pay-method.php' %}
{% endblock %}