# _*_ coding:utf-8 _*_
import math
import time
import json
import uuid
from datetime import datetime, timedelta
from sqlalchemy import func
from sqlalchemy.orm import relationship
from sqlalchemy.ext.hybrid import hybrid_property
from sqlalchemy import Column, DateTime, Boolean, Sequence, Integer,\
	String, ForeignKey, Float
from sqlalchemy.sql.expression import text
from flask.ext.sqlalchemy import BaseQuery
from flask import abort
from flask import current_app as app
from wanshua.extensions import db
from wanshua import strutil
SIMPLE_USER = ['id','username','email','avatar','type','introduction']

gen_token = lambda: uuid.uuid1().hex

time_stamp = lambda: int(time.time)
GLOBAL_ID_GENERATOR = """
"""

def init_idgenerate():
	
	db.session.execute(text(GLOBAL_ID_GENERATOR))
	db.session.commit()
db.init_idgenerate = init_idgenerate

room_sequence = Sequence('room_id_seq', increment=1)

class UserQuery(BaseQuery):
	def simple(self, user_id):

		ret = db.session.query(User.id, User.username, User.email, User.avatar,
								User.type, User.introduction).filter(User.id == user_id).first()
	
		if ret is None:
			abort(404)
		_dict = dict(zip(SIMPLE_USER,ret))

		return _dict

class User(db.Model):
	__tablename__ = 'user_info'
	query_class = UserQuery

	id = db.Column(db.BigInteger, server_default=text('id_generator()'), primary_key=True)
	username = db.Column(db.Unicode(50), unique=True, nullable=False)
	nickname = db.Column(db.String(50))
	password = db.Column(db.String(100))
	avatar = db.Column(db.String(255))
	gender = db.Column(db.Boolean, default=True)
	status = db.Column(db.String(10), default='normal') # normal noauth blocked
	type = db.Column(db.String(20), default='normal') # normal certificated
	introduction = db.Column(db.Unicode(500), default=u'')
	recommended = db.Column(db.Boolean, default=False)
	date_create = db.Column(db.DateTime, default=datetime.now)
	date_update = db.Column(db.DateTime, default=datetime.now)

	qq = db.Column(db.String(50))
	email = db.Column(db.String(50))
	new_gender = db.Column(db.SmallInteger, default=0)
	phone_number = db.Column(db.String(50))

	token = db.Column(db.String(50), default=gen_token) # 仅限于客户端
	accept_push = db.Column(db.Boolean, default=True)
	exp_value = db.Column(db.Integer, default=0) # 经验值
	balance = db.Column(db.Float, default=0) # 充值的玩耍币
	cny_balance = db.Column(db.Float, default=0) # 财富值
	wsb_balance = db.Column(db.Float, default=0) # 收到的玩耍币

	# 直播字段
	board = db.Column(db.Text(),default='')
	live_status = db.Column(db.String(20))
	room_id = db.Column(db.Integer,Sequence('room_id_seq', increment=1))
	stream_id = db.Column(db.String(80))
	live_id = db.Column(db.BigInteger)

	# 关注 粉丝
	follower_count = db.Column(db.Integer, default=0)
	followering_count = db.Column(db.Integer, default=0)

	task = relationship('UserTask', backref='user')

	@hybrid_property
	def uid(self):
		return strutil.b57encode(self.id) if self.id else None
	
	@hybrid_property
	def level(self):
		if self.exp_value<5:
			return 1
		elif self.exp_value<15:
			return 2
		elif self.exp_value<30:
			return 3
		return int(math.sqrt(self.exp_value/15-1.75)+3.5)

	@staticmethod
	def level_exp(level):
		if level==1:
			return 5
		elif level==2:
			return 15
		return 30 + 15*(level-2)*(level-3)
	
	@staticmethod
	def generate_room_id(self):
		room_id = db.session.execute(room_sequence)
		print (room_id)
		self.room_id = room_id
		db.session.commit()
		print (db.session.execute(text('select id_generator()')).scalar())

	def __repr__(self):
		return "%s(%s)" % (self.__class__.__name__, self.id)



class Live(db.Model):
	

	__tablename__ = "live"
	
	id = db.Column(db.BigInteger, server_default=text('id_generator()'), primary_key=True)
	title = db.Column(db.String(100))
	game_id = db.Column(db.Integer)
	user_id = db.Column(db.BigInteger, ForeignKey('user_info.id'), nullable=False,)
	room_id = db.Column(db.Integer, nullable=False)
	stream_id = db.Column(db.String(100), index=True)
	time = db.Column(db.Integer, default=0)
	snapshot = db.Column(db.String(300))
	video_url = db.Column(db.String(300))
	show = db.Column(db.Boolean, default=False)
	recommended = db.Column(db.Boolean, default=False)
	status = db.Column(db.String(20), default='disconnected')
	phone_model = db.Column(db.String(50))
	reply_count = db.Column(db.Integer, default=0)
	play_count = db.Column(db.Integer, default=0)
	real_play_count = db.Column(db.Integer, default=0)
	live_user_count = db.Column(db.Integer, default=3)
	date_create = db.Column(db.DateTime, default=datetime.now)
	tag_id = db.Column(db.Integer, index=True)
	
	date_start = db.Column(db.Integer, default=time_stamp)
	date_end = db.Column(db.Integer, default=time_stamp)
	user = relationship('User', uselist=False)
	
	@hybrid_property
	def uid(self):
		return strutil.b57encode(self.id) if self.id else None



