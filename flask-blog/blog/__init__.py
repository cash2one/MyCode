# _*_ coding:utf-8 _*_
# Author:Jazpenn
from blog.application import create_app

# from flask import Flask
# from flask.ext.sqlalchemy import SQLAlchemy
# from flask.ext.bootstrap import Bootstrap
# from flask.ext.login import LoginManager
# from blog.configs import config
#
# db = SQLAlchemy()
# bootstrap = Bootstrap()
# loging_manager = LoginManager()
# loging_manager.session_protection = 'strong'
# loging_manager.login_view = 'admin.login'
# loging_manager.login_message = u'请登入帐号再进行下一步操作！'
#
# def create_app(config_name):
#     app = Flask(__name__)
#     app.config.from_object(config[config_name])
#     config[config_name].init_app(app)
#
#     db.init_app(app)
#     bootstrap.init_app(app)
#     loging_manager.init_app(app)
#
#     from .views import blog as main_blueprint
#     app.register_blueprint(main_blueprint)
#
#     from .admin import admin as admin_blueprint
#     app.register_blueprint(admin_blueprint, url_prefix='/admin')
#
#
#     return app
