<?php
// Controller Class
class Controller
{
function render(){$l=new View('layout');$l->set($this);echo$l;}
function show_404(){header("HTTP/1.0 404 Not Found");$this->content=new View('404');}
}