<?php
// Handles working with HTML output templates
class View
{
function __construct($v){$this->v=p("views/$v");}
function set($a){foreach($a as$k=>$v)$this->$k=$v;}
function __toString(){try {extract((array)$this);require$v;return'';} catch(\Exception $e){print_r(DB::$q); return"$e";}}
}