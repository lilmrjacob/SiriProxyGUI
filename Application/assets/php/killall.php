<?php
$realpath = realpath('../../SiriProxy');
$file = fopen($realpath . "/stop", 'w+') or die('it failed');
$output = exec('sudo killall ruby');
$file2 = fopen($realpath . "/log.txt", 'w+');
fwrite($file2, "[Info - SiriProxyGui] SiriProxy Server Stopped. Server is ready \n");
fclose($file2);
?>