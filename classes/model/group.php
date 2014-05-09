<?php

class model_group extends orm
{

	static $t = 'group';
	static $f = 'group_id';
	static $r = array(
		'group_user' => 'model_groupuser'
	);
}