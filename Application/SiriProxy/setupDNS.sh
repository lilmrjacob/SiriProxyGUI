apt-get install dnsmasq
echo "address=/guzzoni.apple.com/192.168.8.130" >> /etc/dnsmasq.conf 
#for example, 
#echo "address=/guzzoni.apple.com/192.168.0.100" >> /etc/dnsmasq.conf
/etc/init.d/dnsmasq restart
