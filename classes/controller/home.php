<?php
class controller_home Extends Controller
{
	// Welcome page!
	public function index()
	{
		$this->content = new View('welcome');
		$this->render();
	}
	
	// Example exception handling
	public function exception()
	{
		$this->bad_method('Some arguments here...');
	}
	
	protected function bad_method($value)
	{
		throw new Exception('Not a flying toy!');
	}
	
	// Example using cookies for session storage
	public function session()
	{
		// Start session
		$_SESSION = Cookie::get('session');
		
		$this->content = dump($_SESSION);
		
		// Create a number counter
		if(isset($_SESSION['number']))
		{
			$_SESSION['number'] += 1;
		}
		else
		{
			$_SESSION['number']=1;
		}
		
		// Create token (for use in forms)
		$_SESSION['token'] = Cookie::token();
		
		// Save session
		Cookie::set('session',$_SESSION);
		
		$this->render();
	}
}
