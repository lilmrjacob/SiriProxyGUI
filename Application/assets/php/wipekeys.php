<?php
$realpath = realpath('../../SiriProxy');
unlink($realpath . '/speechId');
unlink($realpath . '/assistantId');
unlink($realpath . '/sessionValidationData');

?>