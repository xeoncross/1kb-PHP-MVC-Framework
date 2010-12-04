<?php
// Handles Object-Database record mapping
class ORM extends Stateful
{
static$db,$t,$k='id';public$l;
function __construct($d=0){if($d){$t=$this;if(is_numeric($d))$t->d[$t::$k]=$d;else{$t->d=(array)$d;$t->l=1;}}}
function __get($k){$this->load();return parent::__get($k);}
function save(){$t=$this;if($d=$t->changes()){$k=$t::$k;return$t->l=(empty($t->d[$k])?($t->$k=$t::$db->insert($t::$t,$d)):$t::$db->update($t::$t,$d,array($k=>$t->$k)));}}
function load(){$t=$this;if($t->l)return 1;$k=$t::$k;if(empty($t->d[$k]))return;if($r=$t->select(array($k=>$t->d[$k]))){$t->l=1;$t->c=0;return$t->d=$r[0]->values();}}
function select($w=0,$l=0,$o=0,$s=0,$c='*',$f='fetch'){$t=$this;$q="SELECT $c FROM `".$t::$t."`";list($w,$v)=DB::where($w);if($w)$q.=" WHERE $w";$r=$t::$db->$f($q.$t->s($s).($l?" LIMIT $o,$l":''),$v);if($f{0}=='f'){foreach($r as$k=>$v)$r[$k]=new$t($v);}return$r;}
function s($f){if($f){$s=' ORDER BY ';foreach($f as$k=>$v)$s.="\"$k\" $v,";return substr($s,0,-1);}}
function count($w=0){if($r=$this->select($w,0,0,0,'COUNT(*)','row'))return current($r);}
}