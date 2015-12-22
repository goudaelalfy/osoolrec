<?php
class tell_friendsController Extends baseController 
{

	public function index()
	{
		if(isset($_POST['smt_go']))
		{
			$name=$_POST['txt_name'];
			
			$email1=$_POST['txt_email1']; 
			$email2=$_POST['txt_email2'];
			$email3=$_POST['txt_email3'];
			$email4=$_POST['txt_email4'];
			$email5=$_POST['txt_email5']; 
			
			
			
			$view = new viewModel('result');
		
			if(isset($_SESSION['lang']))
			{
				$lang=$_SESSION['lang'];
			}
			else
			{
				$lang='en';
			}
			if($lang=='ar')
			{
				$message="تم ارسال الموقع لجميع اصدقائك بنجاح";
			}
			else
			{
				$message="The Website sended to your friends successfully.";
			}
				
				
			$view->assign('message',$message);
			die;			
			
		}
		else
		{
			$view = new viewModel('tell_friends');
		}
	}
	
	
}