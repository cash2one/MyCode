# -*- coding: utf-8 -*-
"""
Filename: SendAliMsg.py
@Author: jazpenn
E-mail: zhipeng_jia@subin.cn
Date: 2016-11-15
Description: 阿里云短信接口
"""
from hashlib import sha1
import base64
import hmac
from datetime import *
import string, random
import urllib
from urllib import parse
import requests
import urllib.request
import http.client

# SETTING AREA

# SET YOUR ACCESS KEY ID and ACCESS KEY SECRET
AccessKeyID = "LTAIoNnoicLfYDL6"
AccessKeySecret = "4pk8LCqY3eAAMoVBB6l8wOgeRJnTBn"


# SET Your SMS signature, must be audited
SignName = "箫雨寒枫"

# SET Your Template Code, must be audited
TemplateCode = "SMS_26040220"


class SendAliMsg:

    def __init__(self):
        #self.RecNum = input('Target Phone number:')
        self.RecNum = '13718068200'
        festival = time.strftime('%Y年%m月%d日')
        smsparam = {'prefix':'亲爱', 'to_name':'用户', 'from_name':'Jazpenn', 'festival':festival, 'content':'开心快乐每一天'}
        smsparam = str(smsparam)
        self.smsparam = smsparam

    def id_generator(self, size=6, chars=string.ascii_uppercase + string.digits +string.ascii_lowercase):
        return ''.join(random.choice(chars) for _ in range(size))

    def percentEncode(self, string):
        return urllib.parse.quote(string, safe='-_.~')

    def getReqString(self, key, value):
        return key + "=" +value


#smsparam = input('SMS Param String with {}:')
#smsparam = {'prefix':'亲爱', 'to_name':'用户', 'from_name':'Jazpenn', 'festival':'2016年11月15日', 'content':'开心快乐每一天'}
#smsparam = str(smsparam)
# sms param example:
# {"name": "value", "name2", "value2"}

    def formatAndSign(self):
        # Random string
        SignatureNonce = self.id_generator(16)

        # Timestamp GMT
        timestamp = datetime.utcnow().strftime('%Y-%m-%dT%H:%M:%SZ')

        Params = (("AccessKeyId",AccessKeyID), ("Action","SingleSendSms"), ("Format","JSON"), ("ParamString", self.smsparam), ("RecNum", self.RecNum), ("RegionId","cn-hangzhou"), ("SignName", SignName), ("SignatureMethod", "HMAC-SHA1"), ("SignatureNonce", SignatureNonce), ("SignatureVersion","1.0"), ("TemplateCode", TemplateCode), ("Timestamp", timestamp), ("Version","2016-09-27"))

        paramstr = ""
        reqstr=""

        # Change param key and value, generate request/Paramstring
        for item in Params:
            paramstr = paramstr+self.getReqString(self.percentEncode(item[0]), self.percentEncode(item[1]))
            paramstr += "&"
            reqstr = reqstr+self.getReqString(item[0], item[1])
            reqstr += "&"

        paramstr = paramstr[0:len(paramstr)-1]
        reqstr = reqstr[0:len(reqstr)-1]

        StringToSign = "POST"+"&"+self.percentEncode('/')+"&"+self.percentEncode(paramstr)

        # Calculate Signature, HMAC-SHA1
        secretKey = AccessKeySecret+"&"
        hmac_obj = hmac.new(secretKey.encode('utf-8'), StringToSign.encode('utf-8'), sha1)
        signature = self.percentEncode(base64.b64encode(hmac_obj.digest()).decode('utf-8'))
        return (signature, reqstr)

    def send(self):
        (signature, reqstr) = self.formatAndSign()
        print("\n********RESULT********")
        reqbody = "Signature="+signature+"&"+reqstr
        print("Request Body:")
        print(reqbody)

        print("*****SENDING REQUEST*****")
        print("Method:","POST")
        headerdata = {
             "Content-Type": "application/x-www-form-urlencoded",
             "charset": "utf-8"
        }
        conn = http.client.HTTPSConnection('sms.aliyuncs.com')
        reqbody = "Signature="+signature+"&"+reqstr
        conn.request(method='POST', url='https://sms.aliyuncs.com/', body=reqbody.encode('utf-8'), headers=headerdata)
        response=conn.getresponse()
        res=response.read()
        print(res)
