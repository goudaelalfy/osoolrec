<?php
class osool_contact_usController Extends baseController 
{
	public function index()
	{
		if(!isset($_SESSION['admin']))
		{
			$view = new viewModel('admin/login');
		}
		else
		{
			$osool_contact_usModel = new osool_contact_usModel;
			$current_osool_contact_us = $osool_contact_usModel->get_by_id(1);
		
			$view = new viewModel('admin/osool_contact_us');
			$view->assign('current_osool_contact_us',$current_osool_contact_us);
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
		
		$page_text_en=$_POST['txt_page_text_en'];  
		$page_text_ar=$_POST['txt_page_text_ar'];  
		
		$osool_contact_usModel = new osool_contact_usModel;
		
		$osool_contact_usModel->save($id,$page_text_en,  $page_text_ar);
		
		$current_osool_contact_us = $osool_contact_usModel->get_by_id(1);
	
		$view = new viewModel('admin/osool_contact_us');
		$view->assign('current_osool_contact_us',$current_osool_contact_us);
		
	}
	
	public function edit($id)
	{
		$osool_contact_usModel = new osool_contact_usModel;
		$current_osool_contact_us = $osool_contact_usModel->get_by_id($id);
		$osool_contact_uss = $osool_contact_usModel->get_all();
		
		$view = new viewModel('admin/osool_contact_us');
		$view->assign('current_osool_contact_us',$current_osool_contact_us);
		$view->assign('osool_contact_uss',$osool_contact_uss);	
	}
	
	public function delete($id)
	{
		$osool_contact_usModel = new osool_contact_usModel;
		$osool_contact_usModel->delete($id);
		$osool_contact_uss = $osool_contact_usModel->get_all();
		$view = new viewModel('osool_contact_us');
		$view->assign('osool_contact_uss',$osool_contact_uss);	
	}
	
	function view()
	{
			$osool_contact_usModel = new osool_contact_usModel;
			$current_osool_contact_us = $osool_contact_usModel->get_by_id(1);
		
			$view = new viewModel('osool_contact_us');
			$view->assign('current_osool_contact_us',$current_osool_contact_us);
	}
	
}