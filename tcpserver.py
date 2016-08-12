#!/usr/bin/env python
# -*- coding: utf-8 -*-

'''
 tcp server
'''

import time, socket, threading
from  jiralogin import check_jira_login

def tcplink(sock, addr):
    print 'Accept new connection from %s:%s...' % addr
    sock.send('welcome')
    while True:
    	#接收内容
        data = sock.recv(1024)
        time.sleep(1)
        if data == 'exit' or not data:
            break
        dataAry = data.split('||', 1)
        uLen = len(dataAry)
        if uLen==2:
            result = check_jira_login(dataAry[0], dataAry[1])
            sock.send('Hello,%s,%s,%s' % (data,dataAry[0],result))
        else:
        	sock.send('fail')
        	
    sock.close()
    print 'Connection from %s:%s closed.' % addr

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
# 监听端口:
s.bind(('127.0.0.1', 9999))
s.listen(5)
print 'Waiting for connection...'
while True:
    # 接受一个新连接:
    sock, addr = s.accept()
    # 创建新线程来处理TCP连接:
    t = threading.Thread(target=tcplink, args=(sock, addr))
    t.start()
