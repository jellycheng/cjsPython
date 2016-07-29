#!/usr/bin/env python
# -*- coding: utf-8 -*-

'''
环境变量语法: 跟os包有关

'''
import os

print "PATH环境变量值：%s" % os.environ['PATH']

#使用os.environ['环境变量名']获取环境变量值时，如果变量不存在则抛异常
try:
    print os.environ['Jelly']
except Exception:
    print "使用os.environ['环境变量名']获取环境变量值时，如果变量不存在则抛异常"

#os.getenv('环境变量名', '默认值')
print "os.getenv('环境变量名', '默认值'): %s " % os.getenv('JAVA_HOME', '没配java_home')

#os.getenv('环境变量名', '默认值') 其实调用的（等价） os.environ.get('环境变量名', '默认值')
print os.environ.get('JAVA_HOME2', 'no java_home')

#设置临时环境变量，程序关闭就消失了 方式1
print '=======start 1'
os.environ.setdefault('abc', 'abcval8')  #使用此方法定义的变量不能被覆盖，已经存在的变量也不能更改
os.environ.setdefault('abc', '19191919')
os.environ.setdefault('abc', '')
print os.getenv('abc', 'no JAVA_HOME')
os.environ.setdefault('PATH', 'pathvaltest')

print '=========end 1'
#设置临时环境变量，程序关闭就消失了 方式2
os.environ['jelly1'] = "jelly1val"
print os.environ['jelly1']

#判断环境变量是否存在key
print os.environ.has_key('jellytest')  #False
print os.environ.has_key('PATH')  #True

#获取所有环境变量名
allK = os.environ.keys();
print allK

for _i in allK:
    print _i   #打印变量名


