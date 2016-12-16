# _*_ coding:utf-8 _*_
import urllib
import urllib.request
from urllib.parse import quote
import time as systemTime
import hashlib
import hmac
import uuid

ACCESSKEY = b'4pk8LCqY3eAAMoVBB6l8wOgeRJnTBn'
SEND_URL = 'http://sms.aliyuncs.com/'


class SendAliMsg:


	def sendmsg(self, phone):
		Version='2016-09-27'
		RecNum = phone
		SignName = '箫雨寒枫'
		TemplateCode = 'SMS_25990316'
		SignatureMethod = 'HMAC-SHA1'
		SignatureNonce = str(uuid.uuid1())
		SignatureVersion = '1.0'
		AccessKeyId = 'LTAIoNnoicLfYDL6'
		Timestamp = systemTime.strftime('%Y-%m-%dT%H:%M:%SZ')
		ParamString = {'name':'Jia'}
		postdata = {'AccessKeyId':AccessKeyId, 'Action':'SingleSendSms', 'Format':'JSON', 'ParamString':ParamString, 'RecNum':RecNum,\
					'SignName':SignName, 'SignatureMethod':SignatureMethod, 'SignatureNonce':SignatureNonce, 'SignatureVersion':SignatureVersion,\
					'TemplateCode':TemplateCode, 'Timestamp':Timestamp, 'Version':Version
					}
		data_to_format = postdata
		data_formatted = self.formatBizQueryParaMapWithDate(data_to_format, False)
		data_formatted = quote(data_formatted)
		data_to_sign = 'POST&%2F&' + data_formatted
		Signature = self.sign(data_to_sign)
		postdata['Signature'] = Signature
		print (postdata)
		print (self.formatBizQueryParaMapWithDate(postdata, False))
		postdata = urllib.parse.urlencode(postdata)
		postdata = postdata.encode('utf-8')
		try:
			res = urllib.request.urlopen(SEND_URL, postdata, timeout=30)
			score_str_info = res.read().decode()
			print ('score_str_info----->' + str(score_str_info))
			jsondata_info = json.loads(score_str_info)  # 获取远程json
		except Exception as e:
			print(e)
           

	def sign(self, content):
		content = content.encode('utf8')
		myhmac = hmac.new(ACCESSKEY, content, hashlib.sha1)
		res = myhmac.hexdigest()
		return res


	def formatBizQueryParaMapWithDate(self, paraMap, urlencode):
		"""格式化参数，签名过程需要使用"""
		slist = sorted(paraMap)
		timestr = systemTime.strftime('%Y-%m-%d')
		buff = []
		for k in slist:
			v = quote(paraMap[k]) if urlencode else paraMap[k]
			if v:
				buff.append("{0}={1}".format(k, v))
		return "&".join(buff)


test = SendAliMsg()
test.sign('adadsadasdasd')
test.sendmsg('13718068200')
