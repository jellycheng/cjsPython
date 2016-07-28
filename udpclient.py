#!/usr/bin/env python
# -*- coding: utf-8 -*-

'''
    启动upd服务
'''
import socket

s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
# 绑定端口:
s.bind(('10.59.80.13', 9991))
print 'Bind UDP on 9991...'
while True:
    # 接收数据:
    data, addr = s.recvfrom(1024)
    print '数据来源 %s:%s.' % addr
    s.sendto('1', addr)

