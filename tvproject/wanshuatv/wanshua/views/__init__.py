from flask import Blueprint

instance = Blueprint('web','web')

from . import live
