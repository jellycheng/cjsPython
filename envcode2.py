#!/usr/bin/env python
# -*- coding: utf-8 -*-

import os

os.putenv('hello', '3333');
print '=========='
print os.getenv('hello', 'abcd')  #打印abcd 说明os.putenv()设置临时环境变量失败

