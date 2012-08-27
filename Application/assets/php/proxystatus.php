<?php
require('config.php');
$proxy  = @fsockopen($CONFIG['siriProxy_host'], $CONFIG['siriProxy_port']);
if (!$proxy) {
	echo '0';
}
else {
	echo '1';	
}
?>