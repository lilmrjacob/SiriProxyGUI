<?php
if (file_exists('../../SiriProxy/speechId') && file_exists('../../SiriProxy/assistantId') && file_exists('../../SiriProxy/sessionValidationData')) {
	echo 1;
}
else {
	echo 0;	
}
?>