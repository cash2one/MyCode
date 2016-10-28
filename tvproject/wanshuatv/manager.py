import os
import sys
curr_path = os.path.normpath(
    os.path.join(os.getcwd(),os.path.dirname(__file__))
)
sys.path.insert(0,curr_path)
from flask.ext.script import Manager, prompt_bool, Server
from wanshua import create_app
from wanshua import configs

app = create_app(configs.TestConfig)

manager = Manager(app)

manager.add_command('runserver',Server())

if __name__ == "__main__":
	app.debug = True
	app.use_debugger = True
	manager.run()
