import urllib
import urllib.request
import time as systemTime
import hashlib

SEND_URL = 'http://139.129.128.71:8086/msgHttp/json/mt'
ACCOUNT = 'xitu106'
PASSWORD = 'xitu123456'
import json

class SendMsg:
    """docstring for SendMsg"""
        
    def sendNotifyToAdmin(self, phone, getContent):
        timestamps = str(int(systemTime.time()) * 1000)
        password = ''.join([PASSWORD, phone, timestamps])
        password = hashlib.md5(password.encode('utf-8')).hexdigest()
        content = getContent
        content = content.encode('utf-8')
        postdata = urllib.parse.urlencode(
                {'account': ACCOUNT, 'password': password, 'mobile': phone, 'content': content,
                 'timestamps': timestamps})
        postdata = postdata.encode('utf-8')
        res = urllib.request.urlopen(SEND_URL, postdata, timeout=30)
        str_info = res.read().decode()
        jsondata_info = json.loads(str_info)
        isSend = False
        for i in range(len(jsondata_info['Rets'])):
            Rspcode = jsondata_info['Rets'][i]['Rspcode']
            if Rspcode == 0:
                isSend = True
                print ('==OK==')
                break
        if (isSend):
            respData = {'code': 1}
        else:
            respData = {'code': 0}

        return respData

mSendMsg = SendMsg()
mSendMsg.sendNotifyToAdmin('13718068200','测试')