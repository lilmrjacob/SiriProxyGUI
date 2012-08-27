#!/usr/bin/env ruby
require 'plugins/thermostat/siriThermostat'
require 'plugins/testproxy/testproxy'
require 'plugins/eliza/eliza'
require 'tweakSiri'
require 'siriProxy'

#Also try Eliza -- though it should really not be run "before" anything else.
PLUGINS = [TestProxy]
#File.new('log.txt', 'w')
def writelog(logmsg)
	open('log.txt', 'a') { |f|
  	f.puts logmsg
  	f.close
	}
end
writelog("[Info - SiriProxyGui]  SiriProxy Session has been started")
puts "[Info - SiriProxyGui] SiriProxy Session has been started"
proxy = SiriProxy.new(PLUGINS)

#that's it. :-)