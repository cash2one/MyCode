# _*_ coding:utf-8 _*_

from flask.ext.sqlalchemy import SQLAlchemy
from flask.ext.redis import FlaskRedis
from flask.ext.bootstrap import Bootstrap
from flask.ext.login import LoginManager

__all__ = ['db', 'redis']

db = SQLAlchemy()
redis = FlaskRedis()
bootstrap = Bootstrap()
loging_manager = LoginManager()
loging_manager.session_protection = 'strong'
loging_manager.login_view = 'admin.login'
loging_manager.login_message = u'请登入帐号再进行下一步操作！'
