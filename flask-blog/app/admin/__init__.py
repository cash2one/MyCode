# _*_ coding:utf-8 _*_
# Author:Jazpenn

from flask import Blueprint

admin = Blueprint('admin', __name__)

from . import views, forms
