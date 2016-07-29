#!/usr/bin/env python
# -*- coding: utf-8 -*-
import loadenv
import os

loadenv.load_dotenv('.env')

print os.environ.keys()

print os.environ.get('APP_ENV')
print os.environ.get('APP_DEBUG')

