<?php

class model_user extends orm
{

	static $t = 'user';
	static $f = 'user_id';
	static $r = array(
		'group_user' => 'model_groupuser'
	);
}