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
                <li class="active">
                  <a href="{{ url_for('web.user_earnings') }}">我的收入</a>
                </li>
                <li><a href="{{ url_for('web.user_balance') }}">我的余额</a></li>
                <li><a href="{{ url_for('web.user_board') }}">我的排名</a></li>
              </ul>
            </div>
          </div>


          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 settings-content">
            <div class="settings-content-wrapper">
              <h3>我的收入</h3>
              <div class="settings-section">
                <div class="settings-section-wrapper row">
                  <div class="col-lg-12 settings-grid">
                    <div class="grid-wrapper">
                      <h4>玩耍币</h4>
                      <div class="grid-data">{{ g.user.wsb_balance }} 币</div>
                      <div class="grid-attr"><small>累计玩耍币 {{ total_wsb }} 币</small></div>
                      <div class="grid-link"><small><a href="{{ url_for('web.user_balance') }}" class="btn btn-primary btn-sm">兑换</a></small></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="settings-section">
                <div class="alert alert-success" role="alert">
                  兑换比例：2000玩耍币 ＝ 人民币 ¥1.0 元
                </div>
              </div>
              <div class="settings-section">
                <h4 class="section-title">
                  兑换历史
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
                      <div class="table-item table-time">
                        时间
                      </div>
                      <div class="table-item table-desc">
                        兑换玩耍币数
                      </div>
                      <div class="table-item table-amount">
                        兑换金额
                      </div>
                      <div class="table-item table-status">
                        状态
                      </div>
                    </div>
                  </div>
                  <div class="section-table-body">
                    {% if wsb_list %}
                      {% for list in wsb_list %}
                      <div class="table-items">
                      <div class="table-item table-time">
                        {{ list.date_create|format_times }}
                      </div>
                      <div class="table-item table-desc">
                        {{ list.wsb_count }}
                      </div>
                      <div class="table-item table-amount">
                        ¥{{ list.cny_count }}
                      </div>
                      <div class="table-item table-status">
                        <span class="badge badge-processing">{{ list.status }}</span>
                      </div>
                    </div>
                      {% endfor %}
                    <!--<div class="table-items">
                      <div class="table-item table-time">
                        2016年1月15日
                      </div>
                      <div class="table-item table-desc">
                        8000
                      </div>
                      <div class="table-item table-amount">
                        ¥80.00
                      </div>
                      <div class="table-item table-status">
                        <span class="badge badge-processing">处理中</span>
                      </div>
                    </div>
                    <div class="table-items">
                      <div class="table-item table-time">
                        2016年1月15日
                      </div>
                      <div class="table-item table-desc">
                        8000
                      </div>
                      <div class="table-item table-amount">
                        ¥80.00
                      </div>
                      <div class="table-item table-status">
                        <span class="badge badge-success">已支付</span>
                      </div>
                    </div>
                    <div class="table-items">
                      <div class="table-item table-time">
                        2016年1月15日
                      </div>
                      <div class="table-item table-desc">
                        8000
                      </div>
                      <div class="table-item table-amount">
                        ¥80.00
                      </div>
                      <div class="table-item table-status">
                        <span class="badge badge-success">已支付</span>
                      </div>
                    </div>
                    <div class="table-items">
                      <div class="table-item table-time">
                        2016年1月15日
                      </div>
                      <div class="table-item table-desc">
                        8000
                      </div>
                      <div class="table-item table-amount">
                        ¥80.00
                      </div>
                      <div class="table-item table-status">
                        <span class="badge badge-success">已支付</span>
                      </div>
                    </div>-->
                  {% else %}
                    <div class="table-items table-empty">
                      没有兑换记录
                    </div>
                  {% endif %}
                  </div>
                </div>

              </div>
            {{ pager|safe }}
            </div>
          </div>
        </div>
      </div>
      {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}
    </div>

  </div>

  {% include 'wanshua.tv/1.0/macros/modal-pay-method.php' %}
{% endblock %}