# -*- coding: utf-8 -*-
"""
Filename: task.py
@Author: jazpenn
E-mail: zhipeng_jia@subin.cn
Date: 2016-11-15
Description: 自动发短信任务
"""
import os, sys
sys.path.append(os.path.abspath(os.path.join(os.path.dirname(__file__), '..')))
import time
from SendMsgTask.SendAliMsg import SendAliMsg
from apscheduler.scheduler import Scheduler

TIME = '18:05:00'
mSendAliMsg = SendAliMsg()
scheduler = Scheduler(daemonic=False)


@scheduler.interval_schedule(hours=24, start_date=time.strftime('%Y-%m-%d', time.localtime(time.time())) + ' ' + TIME)
def _timer_send():
    _send()


def auto_send():
    scheduler.start()


def _send():
    mSendAliMsg.send()


auto_send()
