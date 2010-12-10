<?php
// Setup system and load controller
define('T',microtime(TRUE));
define('M',memory_get_usage());
define('AJAX',strtolower(getenv('HTTP_X_REQUESTED_WITH'))==='xmlhttprequest');
require('functions.php');
require('bootstrap.php');
set_error_handler(function($c,$e,$f=0,$l=0){$v=new View('error');$v->e=$e;$v->f=$f;$v->l=$l;echo$v;_log("$e [$f:$l]");});
function exception($e){$v=new View('exception');$v->e=$e;_log($e->getMessage().' '.$e->getFile());die($v);}
set_exception_handler('exception');
register_shutdown_function(function(){if($e=error_get_last())exception(new ErrorException($e['message'],$e['type'],0,v($e['file']),$e['line']));});
$c='controller_'.(url(0)?:'home');$m=url(1)?:'index';if(!is_file(p("classes/$c"))||!($c=new$c)||$m=='render'||!method_exists($c,$m)){$c=new controller;$m='show_404';}
call_user_func_array(array($c,$m),array_slice(url(),2));
$c->render();