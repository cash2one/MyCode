from flask import Flask
from blog import configs
from blog.session import RedisSessionInterface
from blog.extensions import db, redis
from blog import views
from blog import admin
from blog import auth
from blog.extensions import bootstrap, loging_manager
from flask_wtf.csrf import CsrfProtect
from flask_moment import Moment

__all__ = ['create_app']

"""
blog
"""

moment = Moment()

DEFAULT_APP_NAME = 'blog'

REGISTER_BLUE_PRINTS = (
    (views.blog, None),
    (admin.admin, '/admin'),
    (auth.auth, '/auth'),)


def create_app(config=None, app_name=None):
    if app_name is None:
        app_name = DEFAULT_APP_NAME

    app = Flask(app_name)

    configure_app(app, config)
    configure_db(app)
    bootstrap_app(app)
    loging_manager_app(app)
    configure_session(app)
    configure_blueprints(app)
    CsrfProtect(app)
    moment.init_app(app)

    return app


def configure_app(app,config):
    app.config.from_object(configs.DefaultConfig())

    if config is not None:
        app.config.from_envvar('APP_CONFIG',silent=True)


def configure_db(app):
    db.init_app(app)


def bootstrap_app(app):
    bootstrap.init_app(app)


def loging_manager_app(app):
    loging_manager.init_app(app)


def configure_session(app):
    app.session_interface = RedisSessionInterface()


def configure_blueprints(app):
    for blue, url_prefix in REGISTER_BLUE_PRINTS:
        app.register_blueprint(blue, url_prefix=url_prefix)

