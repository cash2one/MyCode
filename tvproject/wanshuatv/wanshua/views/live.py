import jwt
from uuid import uuid4
from flask import render_template, request
from flask import g, current_app
from wanshua.extensions import db
from user_agents import parse
from wanshua.models.models import User, Live
from wanshua.models import backend
from pili import *

access_key = '9wLPqikPvlXdOWkC4SKTPSHbLCWORMXtipkya0GZ'
secret_key = 'hZCdW1Nih9i40dxo0kLG68GjT50JTXc3lz_reT_Y'





credentials = Credentials(access_key, secret_key)
hub = Hub(credentials,'wan123')


from . import instance

@instance.route('/')
@instance.route('/index')
def index():
	
	limit = 20

	live_list = backend.get_live_list(limit=limit)
	
	live_count = backend.get_live_list_count()

	user_list = backend.get_user_recommend_list(limit=20)

	#if user_list is None:
	#	user_list = []
	
	_lives = []
	
        if live_list == None:
            live_list = []
        for l in live_list:
		_l = l.json()
		_l['user'] = l.user.json()
		_lives.append(_l)

	return render_template('wanshua.tv/1.0/index.php',
							live_list=_lives,
							live_count=live_count,
							user_list=user_list)
	

@instance.route('/lives')
def lives():
	limit = 20
	live_list = backend.get_live_list(limit=limit)
	if live_list is None:
		live_list = []
	live_count = backend.get_live_list_count()
	user_list = backend.get_user_recommend_list(limit=limit)
	_lives = []
	for l in live_list:
		_l = l.json()
		_l['user'] = l.user.json()
		_lives.append(_l)

	return render_template('wanshua.tv/1.1/latest-living.php',
							live_list=_lives,
							live_count=live_count,
							user_list=user_list)


@instance.route('/room/<int:room_id>',methods=['GET','POST'])
def room_one(room_id):
	user_agent = parse(requset.user_agent.string)
	is_pc = False if user_agent.is_mobile or user_agent.is_tablet else True
	if not is_pc:
		pass
	user = User.query.filter_by(room_id=room_id).first()
	if user is None:
		abort(404)
	user = User.query.filter_by(room_id=room_id).first()
	if user is None:
		abort(404)
	user_id = g.user.id if g.user else uuid4().hex
	jwt_token = jwt.encode(
		{'user_id':user_id,'room':user.roomid},'yiqiwanshua')
	chat_server = 'http://101.200.144.186'
	if current_app.config['CONFIG_TYPE'] == 'development':
		chat_server = "http://182.92.152.61.9080"
	gifts = Gift.query.order_by('count asc').all()
	is_follow = False
	if g.user:
		is_follow = backend.is_follow_user(g.user.id, user.id)
	
	if not user.live_id:
		return render_template('wanshua.tv/1.0/living.php',
								user=user,
								live={},
								status='disconnected',
								jwt_token=jwt_token,
								chat_server=chat_server,
								is_follow=is_follow,
								gifts=gifts,
								chats=[])
	
	live = Live.query.get(user.live_id)

	if live is None:
		return render_template('wanshua.tv/1.0/living.php',
								user=user,
								live={},
								status='disconnected',
								jwt_token=jwt_token,
								chat_server=chat_server,
								is_follow=is_follow,
								gifts=gifts,
								chats=[])

	reward_7days_users = backend.get_live_reward_top_list(
		live.user_id, days=-7)
	reward_all_users = backend.get_live_reward_top_list(
		live.user_id, days=None)
	
	stream = hub.get_stream(live.stream_id)
	status = stream.status()['status']
	rtmp_play_url = stream.rtmp_live_urls()['ORIGIN']
	hls_play_url = stream.hls_live_urls()['ORIGIN']
	http_flv_play_url = stream.http_flv_live_urls()['ORIGIN']

	if status == 'connected':
		jwt_token = jwt.encode(
			{'user_id':user_id,'room':user.room_id,'live_id':live.id},'yiqiwanshua')

	chats = render_template('wanshua.tv/1.0/living.php',
							user=user,
							live=live,
							gifts=gifts,
							jwt_token=jwt_token,
							chat_server=chat_server,
							rtmp_play_url=rtmp_play_url,
							hls_play_url=hls_play_url,
							is_follow=is_follow,
							status=status,
							chats=chats,
							reward_7days_users=reward_7days_users,
							reward_all_users=reward_all_users)


@instance.route('/live/video/<live_id>')
def live_play_back(live_id):
	
	try:
		live_id = strutil.b57decode(live_id)
	except:
		abort(404)

	live = Live.query.get_or_404(live_id)

	if not live.show:
		abort(404)

	live.play_count += 1

	live.real_play_count += 1
	
	db.session.commit()

	is_follow = False

	if g.user:
		is_follow = backend.is_follow_user(g.user.id, live.user_id)

	user_list = backend.get_user_recommend_list(limit=20)
	
	replys = backend.get_object_replay_list(live_id, 'video', limit=100, offset=0)

	_replys = []

	for rep in replys:
		user = rep.creater.json()
		_rep = rep.json()
		_rep['user'] = user
		_replys.append(_rep)


	return render_template('wanshua.tv/1.0/video.php',
							live=live,
							user_list=user_list,
							is_follow=is_follow,
							replys=_replys)
