<?php defined('T') OR die(); ?>

<ul id="groups">
<?php foreach($groups as $group) {
	print "<li data-id=\"" . $group->id . "\">" . $group->group;

	$user_groups = $group->group_user();

	// Does this group have users?
	if($user_groups) {

		print '<ul id="users">';
		foreach($user_groups as $user_group) {
			$user = new model_user($user_group->user_id);
			print "<li data-id=\"" . $user->id . "\">" . $user->name . "</li>\n";
		}
		print '</ul>';
 	}

 	print "</li>\n";
} ?>
</ul>