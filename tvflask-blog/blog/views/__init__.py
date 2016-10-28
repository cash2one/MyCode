# _*_ coding:utf-8 _*_

from flask import request, g ,session, render_template, Blueprint


instance = Blueprint('blog','blog')

from . import views
