<?php

class model_groupuser extends orm
{

	static $t = 'group_user';
	static $r = array(
		'user' => 'model_user'
	);
}