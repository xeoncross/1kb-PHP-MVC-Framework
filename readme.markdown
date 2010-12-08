## 1kb PHP MVC

A working 1kb PHP framework with additional 1kb classes if needed. To get started, copy config.sample.php to config.php and edit as needed.

Connecting to a database is easy.

	$db = new DB(c('db'));

All queries are prepared statements to prevent SQL injection.

	$statement = $db->query($sql, $params);

You can also use the helper functions if you wish to request one or more results.

	$rows = $db->fetch($sql, $params);		// All rows
	$row = $db->row($sql,$params);			// Single row
	$column = $db->column($sql,$params,3);	// Third column

To use the ORM create classes that map to database tables.

	class Model_User extends ORM
	{
		static $t = 'user';
		static $k = 'id';
		static $f = 'user_id';
		static $r = array(
			'posts' => 'Model_Post',		// Has many posts
			'roles' => 'Model_Role',		// Has many roles
			'profile' => 'Model_Profile',	// Has one profile
		);
		static $b = array('roles' => 'Model_Role');		// Belongs to roles
	}

You also need to set the database connection the ORM will use.

	ORM::$db = $db;
	//OR
	Model_User::$db = $db;

From there you can use the $user->get() and $user->count() methods to interact with database results. For example, you could approve inactive users like this:

	$user = new Model_User;
	foreach($user->get(array('active'=>FALSE)) as $user)
	{
		if($user->paid)
		{
			$user->active = TRUE;
			$user->save();
		}
	}

Or you can fetch a users posts:

	$user = new Model_User;
	$posts = $user->posts();

You can create users just as easily.

	$user = new Model_User;
	$user->name = 'John';
	$user->email = 'john@example.com';
	$user->save();

Lots of other fun things can be done in only 1kb.  
Read the code man, read the code.

[David Pennington](http://xeoncross.com/)  
Released under the MIT License