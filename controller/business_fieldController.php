<?php
class business_fieldController Extends baseController 
{

	public function index()
	{
		if(!isset($_SESSION['user']))
		{
			$view = new viewModel('login');
		}
		else
		{
			$business_fieldModel = new business_fieldModel;
			$business_fields = $business_fieldModel->get_all();
		
			$view = new viewModel('business_field');
			$view->assign('business_fields',$business_fields);
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
		
		$name_en=$_POST['txt_name_en'];
		$name_ar=$_POST['txt_name_ar'];
		
		$business_fieldModel = new business_fieldModel;
		
		$business_fieldModel->save($id,$name_en,$name_ar);
		
		$business_fields = $business_fieldModel->get_all();
	
		$view = new viewModel('business_field');
		$view->assign('business_fields',$business_fields);
		
	}
	
	public function edit($id)
	{
		$business_fieldModel = new business_fieldModel;
		$current_business_field = $business_fieldModel->get_by_id($id);
		$business_fields = $business_fieldModel->get_all();
		
		$view = new viewModel('business_field');
		$view->assign('current_business_field',$current_business_field);
		$view->assign('business_fields',$business_fields);	
	}
	
	public function delete($id)
	{
		$business_fieldModel = new business_fieldModel;
		$business_fieldModel->delete($id);
		$business_fields = $business_fieldModel->get_all();
		$view = new viewModel('business_field');
		$view->assign('business_fields',$business_fields);	
	}
	
	
}