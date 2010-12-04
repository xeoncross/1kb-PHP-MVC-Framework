## 1kb PHP MVC

A working 1kb PHP framework with additional 1kb classes if needed. 

Connecting to a database is easy.

	$db = new DB(c('db.dsn'),c('db.user'),c('db.pass'));

All queries are prepared statements to prevent SQL injection.

	$statement = $db->query($sql, $params);

You can also use the helper functions if you wish to request one or more results.

	$rows = $db->fetch($sql, $params);
	// OR
	$row = $db->row($sql,$params);

To use the ORM create classes that map to database tables.

	class User extends ORM
	{
		static $t = 'user';
		static $k = 'id';
	}

You also need to set the database connection the ORM will use.

	ORM::$db = $db;

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