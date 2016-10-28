from flask import render_template,url_for

from . import instance


@instance.route('/')
@instance.route('/index')
def blog_index():
	return render_template('index.html')


@instance.route('/about_us')
def about_us():
	return render_template('about.html')


@instance.route('/services')
def services():
	return render_template('services.html')


@instance.route('/blog')
def blog():
	return render_template('blog.html')


@instance.route('/login')
def login():
	return render_template('login.html')


@instance.route('/contact')
def contact():
	return render_template('contact.html')



