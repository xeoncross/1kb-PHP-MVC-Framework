<?php
// Handles working with HTML ouput templates
class View
{
function __construct($v){$this->v=p("views/$v");}
function set($a){foreach($a as$k=>$v)$this->$k=$v;}
function __toString(){extract((array)$this);require$v;return'';}
}