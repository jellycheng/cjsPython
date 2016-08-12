# -*- coding: utf-8 -*-
try:
    import ldap
except:
    pass
import config


def check_jira_login(username='chengjinsheng', password='Jelly'):
    ldap.set_option(ldap.OPT_X_TLS_REQUIRE_CERT, ldap.OPT_X_TLS_NEVER)
    l = ldap.initialize('ldaps://%s/' % config.LDAP_JIRA_HOST)
    l.set_option(ldap.OPT_REFERRALS, 0)
    l.set_option(ldap.OPT_PROTOCOL_VERSION, 3)
    l.set_option(ldap.OPT_NETWORK_TIMEOUT, 10.0)
    l.set_option(ldap.OPT_X_TLS,ldap.OPT_X_TLS_DEMAND)
    l.set_option(ldap.OPT_X_TLS_DEMAND, True)
    l.set_option(ldap.OPT_DEBUG_LEVEL, 255)
    dn = "cn=%s, ou=users, dc=ipo, dc=com" % username
    try:
        l.simple_bind_s(dn,password)
    except ldap.INVALID_CREDENTIALS:
        l.unbind()
        return 'fail'
    except ldap.SERVER_DOWN:
        return 'down'
    l.unbind()
    return 'ok'
