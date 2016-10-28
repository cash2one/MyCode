from wanshua.helpers import BackendError, register
from sqlalchemy.sql import and_, or_, not_
from sqlalchemy import desc, asc, func
from .models import User, Live
@register('get_live_list')
def get_live_list(limit=10, offset=0, live='all'):

	if live == 'all':
		lives = Live.query.filter(or_(Live.recommended == True, Live.status == 'connected')).\
			order_by(Live.status.asc(), Live.live_user_count.desc(), Live.date_create.desc()).\
			limit(limit).offset(offset).all()
	else:
		lives = Live.query.filter(Live.status == 'connected').\
			order_by(Live.live_user_count.desc()).\
			limit(limit).offset(offset).all()

	return lives

@register('get_live_list_count')
def get_live_list_count(live='all'):
	
	if live == 'all':
		count = Live.query.filter(or_(Live.recommended == True,Live.status == 'connected')).count()
	else:
		count = Live.query.filter(Live.status == 'connected').count()

	return count

@register('get_user_recommend_list')
def get_user_recommend_list(limit=20, offset=0):
	
	users = User.query.filter(User.recommended == True).\
				limit(limit).offset(offset).all()

	return users

@register('get_live_reward_top_list')
def get_live_reward_top_list(user_id, days=-7):

	user_list = db.session.query(Reward.from_id,func.sum(Reward.count).lable('reward_count')).\
					filter(Reward.to_id == user_id)

	if days:
		date_limit = datetime.now() + timedelta(days=-7)
		user_list = user_list.filter(Reward.date_create > date_limit).\
					group_by(Reward.from_id).order_by('reward_count desc').limit(10).all()
	else:
		user_list = user_list.group_by(Reward.from_id).order_by('reward_count desc').limit(10).all()

	if len(user_list) == 0: return []

	user_ids = [u[0] for u in user_list]
	
	_users = []

	for u in user_list:
		_u = User.query.get(u[0].json())
		_u['reward_count'] = u[1]
		_users.append(_u)
	
	return _users


@register('get_object_reply_list')
def get_object_reply_list(oid, otype, limit=10, offset=0, reverse=False):
	replys = Reply.query.filter(and_(Reply.post_id == oid, Reply.reply_type == otype))
	
	if reverse:
		replys = replys.order_by(Reply.date_create.desc())
	else:
		replys = replys.order_by(Reply.date_create.asc())

	replys = replys.limit(limit).offset(offset).all()

	return replys
