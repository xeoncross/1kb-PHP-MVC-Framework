<?php
// Query databases using PDO
class DB extends SQL
{
public$pdo,$i='`';static$q=array();
function __construct($c){extract($c);$this->pdo=new PDO($dns,$user,$pass,$args);}
function column($q,$p=NULL,$k=0){return($s=$this->query($q,$p))?$s->fetchColumn($k):0;}
function row($q,$p=NULL){return($s=$this->query($q,$p))?$s->fetch(PDO::FETCH_OBJ):0;}
function fetch($q,$p=NULL){return($s=$this->query($q,$p))?$s->fetchAll(PDO::FETCH_OBJ):0;}
function query($q,$p=NULL){$s=$this->pdo->prepare(self::$q[]=str_replace('"',$this->i,$q));$s->execute($p);return$s;}
}