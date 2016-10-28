# _*_ coding:utf-8 _*_
from flask import Flask
from wanshua import configs
from wanshua import views
__all__ = ['create_app']
DEFAULT_APP_NAME = 'wanshua'

REGISTER_BLUE_PRINTS = (
	(views.instance,None),
)

def create_app(config=None, app_name=None):
	if app_name is None:
		app_name = DEFAULT_APP_NAME
	
	app = Flask(app_name)
	
	configure_app(app,config)
	configure_blueprints(app)	
	
	return app

# app配置文件
def configure_app(app, config):
	app.config.from_object(configs.DefaultConfig())
# app蓝图注册
def configure_blueprints(app):
	for blue, url_prefix in REGISTER_BLUE_PRINTS:
		app.register_blueprint(blue, url_prefix=url_prefix)
