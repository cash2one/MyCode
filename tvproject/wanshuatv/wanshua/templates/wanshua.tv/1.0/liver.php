{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}
<style type="text/css">
ol li {font-size: 12px}
</style>
  <div class="main-content" id="index-content">
    <div class="content page profile-page">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 settings-sidebar">
            <div class="sidebar-wrapper">
              <h2><i class="fa fa-microphone"></i> 主播中心</h2>
              <ul class="">
                <li class="active"><a href="{{ url_for('web.user_balance_index') }}">概览</a></li>
                <li><a href="{{ url_for('web.user_earnings') }}">我的收入</a></li>
                <li><a href="{{ url_for('web.user_balance') }}">我的余额</a></li>
                <li><a href="{{ url_for('web.user_board') }}">我的排名</a></li>
              </ul>
            </div>
          </div>


          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 settings-content">
            <div class="settings-content-wrapper">
              <h3>主播中心</h3>
              <div class="settings-section">
                <div class="settings-section-wrapper row">
                  <div class="col-lg-4 settings-grid">
                    <div class="grid-wrapper">
                      <h4>我的余额</h4>
                      <div class="grid-data">¥{{ g.user.cny_balance }}</div>
                      <div class="grid-link"><small><a href="{{ url_for('web.user_balance') }}" class="grid-jump">查看详情 &raquo;</a></small></div>
                    </div>
                  </div>
                  <div class="col-lg-4 settings-grid">
                    <div class="grid-wrapper">
                      <h4>收到的玩耍币</h4>
                      <div class="grid-data">{{ g.user.wsb_balance }}</div>
                      <div class="grid-link"><small><a href="{{ url_for('web.user_earnings') }}" class="grid-jump">查看详情 &raquo;</a></small></div>
                    </div>
                  </div>
                  <div class="col-lg-4 settings-grid">
                    <div class="grid-wrapper">
                      <h4>我的排名</h4>
                      <div class="grid-data">{{ rank_num }}</div>
                      <div class="grid-link"><small><a href="{{ url_for('web.user_board') }}" class="grid-jump">查看详情 &raquo;</a></small></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="settings-section">
                <h4 class="section-title">主播规则：</h4>
                <h5>玩耍直播认证主播临时工资制度和规则</h5><br/>
                  <p style="font-size: 12px;">解说主播每月直播需满60小时，当月结算600元（超出时间按1元一小时结算上限60小时）目标20名，最低10名）未满时间按照8元一小时结算。<br/>
非解说主播每月直播需满60小时，当月结算300元（超出时间按1元一小时结算上限60小时）目标10名。未满时间按照4元一小时结算.<br/>
根据每周人气榜排名对主播进行适当实物和现金奖励。</p>
                  <ol start="一">
                  <li><h5>一、认证主播直播规则</h5></li>
                      <ol start="1">
                          <li>1.每日直播时长为4小时，超过时间不计入总时间。人气榜，勤劳榜不受直播时间限制。</li>
                          <li>2.前一日直播时长（截止24点）会在第二天12点左右玩耍活动群459451617公布.当日如果有疑问请在6点前联系玩耍哥。</li>
                          <li>3.解说主播如果每月发现超过3次超过20分钟没有解说，取消认证资格。</li>
                          <li>4.非解说主播在观众送礼和询问没有回答，取消认证资格。</li>
                          <li>5.每日直播时间为凌晨1点到8点直播时间不计入奖励。</li>
                          <li>6.直播时间按照每日以半小时为单位计算，不满半小时不计入时间。掉线五分钟内重连继续计入之前直播时间。每日12点如果没有断网，前日直播时间可能累积到当日。</li>
                          <li>7.有急事突然离开，请打开记事本或者有文字区域和在直播间内注明离开原因，房管等待超过10分钟没有归来扣除2小时，20分钟没有归来扣除当日全部时间。</li>
                          <li>8.每月系统检测后台发现挂机，谩骂玩家观众，直播非游戏类视频，直播PC游戏，扣除当日直播时间两小时，第二次发现扣除当天时间，第三次发现扣除当周时间，第四次发现直接取消认证资格。</li>
                          <li>9.系统检测后台发现外挂，淫秽，涉及政治，恐怖，违反法律和竞品推广等情况，直接永久封禁直播间，登记的手机号码和相关资料交给相关部门处理。</li>
                          <li>10.开摄像头和解说有特色的主播优先签约。</li>
                          <li>11.每月直播奖励于第二个月的10到20日进行发放。节日可能适当延期。</li>
                          <li>12.非解说主播申请转换解说主播，第二月必须按照解说主播条件进行直播，补贴按照上月认证条件发放。解说主播可直接申请非解说主播，条件当即生效。</li>
                          <li>13.最低直播带宽不低于1MBPS.直播中请保持网速稳定不要进行高传输（如看视频，下载）的活动。</li>

                      </ol>
                  <li><h5>二、认证主播享受福利</h5></li>
                      <ol>
                          <li>1.当月直播补贴</li>
                          <li>2.礼物提现和平台礼物补贴</li>
                          <li>3.玩耍直播主播冠名常规联赛</li>
                          <li>4.作为合作方参与活动合作</li>
                          <li>5.参与活动额外条件</li>
                          <li>6.玩耍直播软文曝光和渠道推广</li>
                          <li>7.主播培训和专业主播的提携</li>
                          <li>8.淘宝店铺等直播相关辅助和分成</li>
                          <li> 9.玩耍直播发展顾问权利</li>
                          <li>10.玩耍直播独特身份标识</li>
                          <li>注：非解说主播的权益力度小于非解说主播。</li>
                      </ol>
                  <li><h5>三、见习主播制度</h5></li>
                      <ol>
                          <li>1.非平台邀请认证主播需要一个月的见习期。见习期需直播满30小时，直播完成后经过审核可以成为认证主播。每月见习主播名额20到30名，认证主播名额20到30名。</li>
                          <li>2.见习期如果直播时间未满，下个月依旧按照见习条件继续见习。两月共计30小时共计一个月补贴。于下月成为认证主播。</li>
                          <li>3.见习期享受玩耍直播新人补贴100元。并且根据直播状况享受平台礼物补贴。</li>
                          <li>4.见习期满后可选择成为解说和非解说主播，享受不同的培养和推广待遇。</li>
                          <li>5.见习主播需遵守玩耍直播主播规章制度</li>
                      </ol>
                  <li><h5>四、签约主播制度</h5></li>
                      <ol>
                            <li>1.签约直播享受平台固定直播底薪和平台工作人员待遇（如节日奖励，年终奖励等）</li>
                            <li>2.签约主播享受平台最高级别推广。</li>
                            <li>3.签约主播有权参与平台规则制定和活动。</li>
                            <li>4.签约主播享受一切主播条件。</li>
                            <li>5.签约主播享受线下赛嘉宾待遇。</li>
                            <li>6.签约主播需遵守玩耍直播主播规章制度</li>
                      </ol>
                  <li><h5>五、名人堂主播制度</h5></li>
                      <ol>
                          <li>1.名人堂主播指的是为一起玩耍做出卓越贡献的主播，终身享受一起玩耍荣誉主播待遇。</li>
                          <li>2.名人堂主播将在未来一起玩耍相关产品上拥有独特身份标识。</li>
                          <li>3.名人堂主播优先参与一起玩耍发展建议。</li>
                          <li>4.名人堂主播有权直接和老板反馈问题。</li>
                          <li>5.未来玩耍直播将邀请名人堂主播参与各类活动出席，享受一起玩耍名誉成员待遇。</li>
                          <li>6.名人堂主播需遵守玩耍直播主播规章制度。</li>

                      </ol>
                      <hr/>
                      <p>最终解释权归玩耍直播所有，在不侵害主播合理利益的条件下有权完善和解释本工资制度施行</p>
                </ol>
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