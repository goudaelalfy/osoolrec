<?php
/**
 * This file handles the retrieval and serving of news articles
 */
class adminController Extends baseController 
{

	
	
	public function index()
	{	
		$view = new viewModel('admin/login');	
	}
	
	public function authenticate()
	{	
		if(isset($_POST['txt_username']) && isset($_POST['txt_password']))
		{
			$username=$_POST['txt_username'];
			$password=$_POST['txt_password'];
			
			$adminModel = new adminModel;
			$result = $adminModel->get_by_username_and_password($username, $password);
		
			
			if($result)
			{
				$_SESSION['admin']=$result;
				$view = new viewModel('admin/jobs');
			}
			else
			{
				$view = new viewModel('admin/login');
			}
		}	
	}
}
