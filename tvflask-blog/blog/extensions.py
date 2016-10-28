# _*_ coding:utf-8 _*_

from flask.ext.sqlalchemy import SQLAlchemy
from flask.ext.redis import Redis

__all__ = ['db', 'redis']

db = SQLAlchemy()
redis = Redis()

