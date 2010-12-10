<?php defined('T') OR die();
// Global site configuration
$config = array(

	// In development, debug mode unlocks extra error info
	'debug_mode' => TRUE,
	
	// Database Settings
	'db' => array(
		'dsn' => 'mysql:host=localhost;port=3306;dbname=test',
		'user' => 'root',
		'pass' => '',
		'args' => array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			//PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" // If using MySQL, force UTF-8
		)
	),
	
	// Cookie options
	'cookie' => array(
		'key' => 'a.very.long.secret.key.here',
		'expires' => time()+60*5, // 30 seconds
		'path' => '/',
		'domain' => '',
		'secure' => '',
		'httponly' => '',
	)
	
);


return $config;