<?php function_exists('p') OR die('Forbidden');
Controller_Home
{
	public function index()
	{
		$this->content = new View('welcome');
	}
	
	/*
	 * Render the content inside the global
	 * theme layout on script end
	 */
	public function __destruct()
	{
		$layout = new View('layout');
		$layout->content = $this->content;
		print $layout;
	}
}
