<?php
function_exists('p') OR die('Forbidden');
headers_sent() OR header('HTTP/1.0 500 Internal Server Error');
?>
<h1>System Error</h1>
<p><?php print $e; ?></p>
