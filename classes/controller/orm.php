<?php
class controller_orm Extends Controller
{

	public function index($user = 'bob')
	{
		$db = new db(c('db'));
		$group = new model_group();

		model_group::$db = $db;

		$view = new View('orm/index');
		
		$view->groups = $group->get();

		$this->content = $view;
	}
	
}

/* SQL for this looks like:


CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `group` (`id`, `group`) VALUES
(1, 'Soccer'),
(2, 'Chess'),
(3, 'Photography');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `group_user` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 3);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(1, 'Bob', ''),
(2, 'John', '');
*/