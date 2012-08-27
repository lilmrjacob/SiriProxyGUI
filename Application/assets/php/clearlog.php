<?php
$realpath = realpath('../../SiriProxy');
$myFile = $realpath . "/log.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "[Info - SiriProxyGui] SiriProxy Logs have been successfully cleared \n";
fwrite($fh, $stringData);
fclose($fh);

?>