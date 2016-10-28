class DefaultConfig(object):
	DEBUG = False
	SECRET_KEY = 'wanshua'


class TestConfig(object):
	CONFIG_TYPE = 'test'
	SQLALCHEMY_DATABASE_URI = 'postgresql+psycopg2://user:password@localhost/wanshua'
	SQLALCHEMY_ECHO = False
	HOST = 'localhost:8080'
	DEBUG = True
	TESTING = True

	CACHE_TYPE = 'redis'


