import os
import sys
from datetime import datetime,timedelta
curr_path = os.path.normpath(
    os.path.join(os.getcwd(), os.path.dirname(__file__)))
sys.path.insert(0, curr_path)

from flask.ext.script import Manager, prompt_bool, Server
from blog import create_app
from blog import configs

app = create_app(configs.DefaultConfig)

manager = Manager(app)

manager.add_command('runserver', Server())

if __name__ == "__main__":
    app.debug = True
    app.user_debug = True
    manager.run()
