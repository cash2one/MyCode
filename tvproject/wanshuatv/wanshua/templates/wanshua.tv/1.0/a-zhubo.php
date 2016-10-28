{% extends 'wanshua.tv/1.0/base.php' %}

{% block head %}
<link rel="stylesheet" href="/static/wanshua.tv/1.0/assets/css/a-active.css">
{% endblock %}

{% block header %}{% endblock %}


{% block main %}

<div class="active-wrapper">

<div class="img-block">
    <img src="/static/wanshua.tv/1.0/assets/images/active/a-zhubo-banner.jpg" class="img-responsive center-block" alt="" />
</div>

<div class="img-block">
    <img src="/static/wanshua.tv/1.0/assets/images/active/a-zhubo-1.jpg" class="img-responsive center-block" alt="" />

   
    <div class="inline-block">
        
        <img src="/static/wanshua.tv/1.0/assets/images/active/active-join.png" class="img-responsive center-block item go-btn" v-on:click="getWanShuaBi" />
        
        <a href="http://tieba.baidu.com/f?kw=%E4%B8%80%E8%B5%B7%E7%8E%A9%E8%80%8D&ie=utf-8" target="_blank">
            <img src="/static/wanshua.tv/1.0/assets/images/active/go-to-tieba.png" class="img-responsive center-block item tieba-btn" alt="" />
        </a>

    </div>




</div>

<div class="img-block">
    <img src="/static/wanshua.tv/1.0/assets/images/active/a-zhubo-2.jpg" class="img-responsive center-block" alt="" />
    <img src="/static/wanshua.tv/1.0/assets/images/active/a-zhubo-3.jpg" class="img-responsive center-block" alt="" />
    <img src="/static/wanshua.tv/1.0/assets/images/active/a-zhubo-4.jpg" class="img-responsive center-block" alt="" />
</div>


<div  id="success-dialog" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">来自玩耍直播的奖励</h4>
      </div>
      <div class="modal-body">
        <p>恭喜你获得玩耍直播的 5000 玩耍币，少年快去 high</p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>

{% endblock %}


{% block script %}
<script>


var curr_user =  {{ (g.user.json() if g.user else None) | tojson }};

 Zhubo = new Vue({
        el: '.active-wrapper',
        ready:function () {

        },
        data:{
            global_user:curr_user
        },
        methods:{
            getWanShuaBi:function(){
                if (!Zhubo.global_user) {
                    $('#modal-login').modal('show');
                    return;
                }

                $.post('/a/zhubo/getwanshuabi', function (rep) {

                    if (rep.errmsg) {
                        alert(rep.errmsg);
                        return;
                    }

                    $('#success-dialog').modal() 

                });

            }

        }
    });

</script>
{% endblock %}
