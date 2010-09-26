<!DOCTYPE html><?php function_exists('p') OR die('Forbidden');?>
<html>
<head>
	<meta charset="utf-8"> 
    <title>1kb MVC Framework</title>
	<style>
	body { margin: 0; padding: 0; font: 12px Arial; }
	#content { margin: 0 auto; width: 500px; }
	</style>
</head>
<body>
<div id="container">
	<div id="header">
		<h1>1kb MVC Framework</h1>
	</div>
	<div id="content">
		<?php print $content; ?>
	</div>
</div>
</body>
</html>