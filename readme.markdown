## 1kb PHP MVC

A working framework built using 1kb classes. To use the ORM create classes that map to database tables.

	class User extends ORM
	{
		static $t = 'user';
		static $k = 'id';
	}

From there you can use the $user->select() and $user->count() methods to interact with database results. For example, you could approve inactive users like this:

	$user = new User;
	foreach($user->select(array('active'=>FALSE)) as $user)
	{
		if($user->paid)
		{
			$user->active = TRUE;
			$user->save();
		}
	}

You can create users just as easily.

	$user = new User;
	$user->name = 'John';
	$user->email = 'john@example.com';
	$user->save();

Lots of other fun things can be done in only 1kb.  
Read the code man, read the code.

[David Pennington](http://xeoncross.com/)  
Released under the MIT License