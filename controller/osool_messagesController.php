<?php
class osool_messagesController Extends baseController 
{

	public function index()
	{
		$view = new viewModel('osool_messages');
	}
	
	public function admin()
	{
		if(!isset($_SESSION['admin']))
		{
			$view = new viewModel('admin/login');
		}
		else
		{
			$osool_messagesModel = new osool_messagesModel;
			$osool_messagess = $osool_messagesModel->get_all();
		
			$view = new viewModel('admin/osool_messages');
			$view->assign('osool_messagess',$osool_messagess);
		}
	}
	
	public function save()
	{
		if(isset($_POST['hdn_id']))
		{
			$id=$_POST['hdn_id'];
		}
		else
		{
			$id=0;
		}
		
		$person_name=$_POST['txt_person_name'];  
		$person_phone=$_POST['txt_person_phone'];  
		$person_moile=$_POST['txt_person_moile'];  
		$person_email=$_POST['txt_person_email'];  
		$message=$_POST['txt_message'];
		
		$osool_messagesModel = new osool_messagesModel;
		
		$osool_messagesModel->save($id,$person_name,  $person_phone,  $person_moile,  $person_email,  $message);
		
		
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
					$message="تم ارسال رسالتك بنجاح";
				}
				else
				{
					$message="Yor message sent successfully.";
				}
				
				
				$view->assign('message',$message);
		
	}
	
	public function edit($id)
	{
		$osool_messagesModel = new osool_messagesModel;
		$current_osool_messages = $osool_messagesModel->get_by_id($id);
		$osool_messagess = $osool_messagesModel->get_all();
		
		$view = new viewModel('osool_messages');
		$view->assign('current_osool_messages',$current_osool_messages);
		$view->assign('osool_messagess',$osool_messagess);	
	}
	
	public function delete($id)
	{
		$osool_messagesModel = new osool_messagesModel;
		$osool_messagesModel->delete($id);
		$osool_messagess = $osool_messagesModel->get_all();
		$view = new viewModel('admin/osool_messages');
		$view->assign('osool_messagess',$osool_messagess);	
	}
	
}