apt-get update
apt-get install apache2 php5 libapache2-mod-php5
apt-get install openssl libssl-dev zlib1g-dev ruby rubygems make gcc python python2.6-dev python2.7-dev libxml2*
/etc/init.d/apache2 restart
gem install eventmachine -- --with-ssl-dir=/usr/bin/openssl
gem install CFPropertyList httparty json uuidtools thin
wget http://hosted.nickwhyte.com/projects/siri/SiriProxyGui_2_current.zip
rm -R /var/www/
mkdir /var/www
chmod 777 /var/www
unzip SiriProxyGui_2_current.zip -d /var/www/
chmod -R 777 /var/www
echo "www-data ALL=NOPASSWD: ALL" >> /etc/sudoers
echo "Installation Is Complete. You can now finish the tutorial :) "
