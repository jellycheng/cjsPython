#!/usr/bin/env python
# -*- coding: utf-8 -*-

'''
 socket tcp client
 '''

import socket

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
# 建立连接:
s.connect(('127.0.0.1', 9999))
# 接收欢迎消息:
#print s.recv(1024)
s.recv(1024)

for data in ['jelly||pwdabc!@#', 'tom||%^&','cjs', 'jdk||1234']:
    # 发送数据:
    s.send(data)
    resData = s.recv(1024)
    print resData.split(',', 1)
    print resData
    

s.send('exit')
s.close()

