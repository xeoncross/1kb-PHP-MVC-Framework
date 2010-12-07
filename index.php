<?php
// Setup system and load controller
define('T',microtime(TRUE));
define('M',memory_get_usage());
require('functions.php');
define('AJAX',isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])==='xmlhttprequest');
require('bootstrap.php');
set_error_handler(function($c,$e,$f=0,$l=0){$v=new View('error');$v->e=$e;$v->f=$f;$v->l=$l;echo$v;_log("$e [$f:$l]");});
set_exception_handler(function($e){$v=new View('exception');$v->e=$e;_log($e->getMessage().' '.$e->getFile());die($v);});
$c='controller_'.(url(0)?:'home');$m=url(1)?:'index';if(!is_file(p("classes/$c"))||!($c=new$c)||!method_exists($c,$m)){$c=new controller;$m='show_404';}
call_user_func_array(array($c,$m),array_slice(url(),2));