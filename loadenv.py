#!/usr/bin/env python
# -*- coding: utf-8 -*-

import os

def load_dotenv(dotenv_path):
    if not os.path.exists(dotenv_path):
        return None
    for k, v in parse_dotenv(dotenv_path):
        os.environ.setdefault(k, v)
    return True

def parse_dotenv(dotenv_path):
    with open(dotenv_path) as f:
        for line in f:
            line = line.strip()
            if not line or line.startswith('#') or '=' not in line:
                continue
            k, v = line.split('=', 1)
            v = v.strip("'").strip('"')
            yield k, v

def initEnv():
    _d = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    #print _d + '.env'
    load_dotenv(_d + '.env')




