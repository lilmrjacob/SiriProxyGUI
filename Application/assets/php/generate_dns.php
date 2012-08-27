<?php
$common = $_POST['addr'];
//$common = 'ddeeee';
$str = "apt-get install dnsmasq
echo \"address=/guzzoni.apple.com/$common\" >> /etc/dnsmasq.conf
/etc/init.d/dnsmasq restart 
";

$realpath = realpath('');
$myfile =  'dns.sh';
$fh = fopen($myfile, 'w+') or die("can't open file");
fwrite($fh, $str);
fclose($fh);
echo $myfile;
exec('sudo /var/www/SiriProxy/installdns.sh > /dev/null &');


?>
