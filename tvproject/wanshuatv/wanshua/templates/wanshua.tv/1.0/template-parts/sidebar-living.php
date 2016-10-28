<div class="sidebar living-sidebar" id="video-sidebar">


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" id="aside-header">
    <li role="presentation" class="active"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">聊天</a></li>
    <li role="presentation"><a href="#board" aria-controls="board" role="tab" data-toggle="tab">土豪榜</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content aside-tab-wrapper" id="aside-container">

    <div role="tabpanel" class="tab-pane active" id="chat">
      <div class="chat-list-wrapper">


        <div id="chatWindow" class="chat-list"  >


          <div class="chat-list-inner"  style="height:100%">


            <div v-for="danmu in danmu_list"  transition="scroll-bottom" class="bubble" v-bind:class="{ 'player': danmu.role == 'host', 'mine': danmu.uid == user_id }">
              <span class="sender">[[ danmu.username ]]</span>: <span class="msg"> [[ danmu.content ]]  <img v-if="danmu.pic" src="[[  danmu.pic  ]]" width="30" height="auto"></span> 

            </div>

          </div>

        </div>
        <div id="inputWindow" class="chat-input-field">
          <div class="error-note" v-show="showErrMsg" ><span>发送消息太频繁了～</span></div>
          <input id="inp" type="text" v-model="danmu_words" v-on:keyup.enter="sendReply" placeholder="来一发弹幕...">
          <button id="btn" type="button"  v-on:click="sendReply"><i class="fa fa-rocket"></i></button>

        </div>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="board">
      <ul class="board-list">



          {% if not reward_7days_users %}
            还没人送礼物哈  
          {% endif %}



        {% for user in reward_7days_users %}

        <li>
          <span class="player-rate">{{loop.index}}</span>
          <span class="player-info">{{ user.username }}</span>
          <span class="player-karma">{{ user.reward_count }}</span>
        </li>

        {% endfor %}

      </ul>
    </div>

  </div>

</div>
