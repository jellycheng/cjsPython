#!/usr/bin/env python
# -*- coding: utf-8 -*-

'''
    启动upd服务
'''
import socket

s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
# 绑定端口:10.59.80.13
host = socket.gethostbyname(socket.gethostname())
port = 9991
s.bind((host, port))
print 'Bind UDP on %s:%s...' % (host, port)

while True:
    # 接收数据
    try:
        data, addr = s.recvfrom(1024)
        print '数据来源 %s:%s' % addr
        print '接收数据: %s' % data
        s.sendto('1', addr)
    except:
        pass

