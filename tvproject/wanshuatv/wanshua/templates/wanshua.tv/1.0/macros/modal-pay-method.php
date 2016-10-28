<div class="modal fade" id="pay-method" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">确认支付</h4>
        </div>
        <div class="modal-body">
          <div class="bill-selection">
            <h5>支付金额</h5>
            <div class="form-group">
              <div class="radio bill-count">
                <input type="radio" name="user-bill" id="bill-[[ charge_list[cur_charge].id ]]" value="[[ charge_list[cur_charge].id ]]" checked>
                <label for="bill-[[ charge_list[cur_charge].cost/100 ]]">
                  [[ charge_list[cur_charge].cost/100 ]]=[[ charge_list[cur_charge].count ]] 玩耍币
                </label>
              </div>
            </div>
          </div>
          <div class="bill-selection pay-method">
            <h5>支付方式</h5>
            <div class="form-group">
              <div class="bill-count">
                <input type="radio" name="pay-method" id="method-alipay" value="30" checked="">
                <label for="method-alipay">
                  <img src="/static/wanshua.tv/1.0/assets/images/alipay.png" class="img-responsive" alt="使用支付宝付款">
                </label>
              </div>
             <!--  <div class="bill-count">
                <input type="radio" name="pay-method" id="method-wechat" value="30">
                <label for="method-wechat">
                  <img src="/static/wanshua.tv/1.0/assets/images/wechat.png" class="img-responsive" alt="使用支付宝付款">
                </label>
              </div> -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-success btn-lg" @click="charge_submit">前往支付</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>