{% extends 'wanshua.tv/1.0/base.php' %}
{% block main %}
  <div class="main-content" id="index-content">
    <div class="content page profile-page">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 settings-sidebar">
            <ul class="">
              <li class="active"><a href="/user/set">个人设置</a></li>
              <!-- <li><a href="/user/set/password">修改密码</a></li> -->
              <li><a href="/user/set/billing">充值</a></li>
            </ul>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 settings-content">
            <div class="settings-content-wrapper">
              <h3>充值</h3>
              <form class="form-horizontal bill-selection">
                <div class="form-group">

                  <!-- Item -->
                  <div class="radio bill-count" v-for="charge in charge_list" @click="cur_charge=$index">
                    <input type="radio" name="user-bill" id="bill-[[ charge.id ]]" value="[[ charge.id ]]" :checked="cur_charge==$index">
                    <label for="bill-[[ charge.cost/100 ]]">
                      [[ charge.cost/100 ]]元=[[ charge.count ]] 玩耍币
                    </label>
                  </div>
                  <!-- Item End -->

                  <!-- <div class="radio bill-count">
                    <input type="radio" name="user-bill" id="bill-10" value="10">
                    <label for="bill-10">
                      10元=1000 玩耍币
                    </label>
                  </div>
                  <div class="radio bill-count">
                    <input type="radio" name="user-bill" id="bill-20" value="20">
                    <label for="bill-20">
                      20元=2200 玩耍币
                    </label>
                  </div>
                  <div class="radio bill-count">
                    <input type="radio" name="user-bill" id="bill-30" value="30">
                    <label for="bill-30">
                      30元=3500 玩耍币
                    </label>
                  </div>
                  <div class="radio bill-count">
                    <input type="radio" name="user-bill" id="bill-50" value="50">
                    <label for="bill-50">
                      50元=6000 玩耍币
                    </label>
                  </div>
                  <div class="radio bill-count">
                    <input type="radio" name="user-bill" id="bill-50" value="50">
                    <label for="bill-50">
                      50元=6000 玩耍币
                    </label>
                  </div>
                  <div class="radio bill-count">
                    <input type="radio" name="user-bill" id="bill-50" value="50">
                    <label for="bill-50">
                      50元=6000 玩耍币
                    </label>
                  </div>
                  <div class="radio bill-count">
                    <input type="radio" name="user-bill" id="bill-50" value="50">
                    <label for="bill-50">
                      50元=6000 玩耍币
                    </label>
                  </div> -->
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="text-align: center;">
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#pay-method">前往充值  </button>
                </div>
              </form>

              {% include 'wanshua.tv/1.0/macros/modal-pay-method.php' %}

            </div>
          </div>
        </div>
      </div>
      {% include 'wanshua.tv/1.0/template-parts/footer-main.php' %}
    </div>

  </div>

{% endblock %}
{% block script %}
<script>
user_set.billing(); 
</script>
{% endblock %}