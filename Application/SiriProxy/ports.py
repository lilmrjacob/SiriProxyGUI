#! /usr/bin/python
# $Id: testupnpigd.py,v 1.4 2008/10/11 10:27:20 nanard Exp $
# MiniUPnP project
# Author : Thomas Bernard
# This Sample code is public domain.
# website : http://miniupnp.tuxfamily.org/

# import the python miniupnpc module
import miniupnpc
import os
import StringIO

fileObj = open("log.txt","w")
fileObj = open("log.txt","a+") # open for for write and append
# function definition

# create the object
u = miniupnpc.UPnP()
#print 'inital(default) values :'
#print ' discoverdelay', u.discoverdelay
#print ' lanaddr', u.lanaddr
#print ' multicastif', u.multicastif
#print ' minissdpdsocket', u.minissdpdsocket
u.discoverdelay = 400;
try:
	print 'Discovering... delay=%ums' % u.discoverdelay
	ndevices = u.discover()
	print ndevices, 'device(s) detected'
	# select an igd
	u.selectigd()
	# display information about the IGD and the internet connection
	print 'local ip address :', u.lanaddr
	externalipaddress = u.externalipaddress()
	print 'external ip address :', externalipaddress
	#print u.statusinfo(), u.connectiontype()
	siriserver_port = 443
	external_port = siriserver_port

	# find a free port for the redirection
	r = u.getspecificportmapping(external_port, 'TCP')
	print 'Trying to redirect %s port %u TCP => %s port %u TCP' % (externalipaddress, external_port, u.lanaddr, siriserver_port)
	print 'Trying to redirect %s port %u UDP => %s port %u UDP' % (externalipaddress, external_port, u.lanaddr, siriserver_port)
	b = u.addportmapping(external_port, 'TCP', u.lanaddr, siriserver_port, 'SiriProxyGUI Server Port %u' % external_port, '')
	c = u.addportmapping(external_port, 'UDP', u.lanaddr, siriserver_port, 'SiriProxyGUI Server Port %u' % external_port, '')
	if b & c:
		os.system('clear')
		warninglog = '[Info - SiriProxyGUI] SiriProxyGUI has forwarded the required ports.\n[Info - SiriProxyGUI] The server is accessiable at: https://%s:%u\n' % (externalipaddress , external_port)
		print '[Info - SiriProxyGUI] SiriProxyGUI has forwarded the required ports.\n[Info - SiriProxyGUI] The server is accessiable at: https://%s:%u' % (externalipaddress , external_port)
	else:
		warninglog = '[Info - SiriProxyGUI] SiriProxyGUI could not forward the required ports.\n[Info - SiriProxyGUI] Are you sure you\'ve got UPnP Enabled on your router or modem?\n'
		print '[Info - SiriProxyGUI] SiriProxyGUI could not forward the required ports.\n[Info - SiriProxyGUI] Are you sure you\'ve got UPnP Enabled on your router or modem?'

	fileObj.write(warninglog)
	fileObj.close()
except Exception, e:
	print 'Exception :', e
	print 'SiriProxyGUI could not forward the required ports. Are you sure you\'ve got UPnP Enabled on your router or modem?'
