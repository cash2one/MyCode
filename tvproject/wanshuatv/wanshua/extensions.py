from flask.ext.sqlalchemy import SQLAlchemy
from flask.ext.redis import Redis
from flask.ext.rq import RQ
from flask.ext.cache import Cache

__all__ = ['db','redis','rq','cache']

db = SQLAlchemy()
redis = Redis()
rq = RQ()
cache = Cache()
redis_rank = type('',(),{})()


import rethinkdb
rethinkdb_conn = rethinkdb.connect(
	host='localhost', port=28015, db='17wanshua', auth_key='17wanshua')

from celery import Celery
celery = Celery('task', broker='redis://localhost:6379/0')

