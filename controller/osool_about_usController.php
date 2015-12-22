<?php
class osool_about_usController Extends baseController 
{

	public function index()
	{
		if(!isset($_SESSION['admin']))
		{
			$view = new viewModel('admin/login');
		}
		else
		{
			$osool_about_usModel = new osool_about_usModel;
			$current_osool_about_us = $osool_about_usModel->get_by_id(1);
		
			$view = new viewModel('admin/osool_about_us');
			$view->assign('current_osool_about_us',$current_osool_about_us);
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
		
		$title_en=$_POST['txt_title_en'];  
		$title_ar=$_POST['txt_title_ar'];
		$page_text_en=$_POST['txt_page_text_en'];  
		$page_text_ar=$_POST['txt_page_text_ar'];  
		//$image=$_POST['txt_image'];
		//$image_type=$_POST['txt_image_type'];
		
		$osool_about_usModel = new osool_about_usModel;
		
		$osool_about_usModel->save($id,  $title_en,  $title_ar,  $page_text_en,  $page_text_ar);
		
		$current_osool_about_us = $osool_about_usModel->get_by_id(1);
	
		$view = new viewModel('admin/osool_about_us');
		$view->assign('current_osool_about_us',$current_osool_about_us);
		
	}
	
	public function edit($id)
	{
		$osool_about_usModel = new osool_about_usModel;
		$current_osool_about_us = $osool_about_usModel->get_by_id($id);
		$osool_about_uss = $osool_about_usModel->get_all();
		
		$view = new viewModel('admin/osool_about_us');
		$view->assign('current_osool_about_us',$current_osool_about_us);
		$view->assign('osool_about_uss',$osool_about_uss);	
	}
	
	public function delete($id)
	{
		$osool_about_usModel = new osool_about_usModel;
		$osool_about_usModel->delete($id);
		$osool_about_uss = $osool_about_usModel->get_all();
		$view = new viewModel('osool_about_us');
		$view->assign('osool_about_uss',$osool_about_uss);	
	}
	
	function view()
	{
			$osool_about_usModel = new osool_about_usModel;
			$current_osool_about_us = $osool_about_usModel->get_by_id(1);
		
			$view = new viewModel('osool_about_us');
			$view->assign('current_osool_about_us',$current_osool_about_us);
	}
	
}