<?php function_exists('p') OR die('Forbidden');
class controller_home
{
	public function index()
	{
		$this->content = new View('welcome');
		
		$this->render();
	}
	
	/*
	 * Render the content inside the global
	 * theme layout on script end
	 */
	protected function render()
	{
		$layout = new View('layout');
		$layout->content = $this->content;
		print $layout;
	}
}
