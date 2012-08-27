<?php
require('../config.php');
$proxy  = @fsockopen($CONFIG['siriCapture_host'], $CONFIG['siriCapture_port']);
if (!$proxy) {
	echo '0';
}
else {
	echo '1';	
}
?>
