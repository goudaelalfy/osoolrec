<?php
class jobController Extends baseController 
{

	public function index()
	{
		//$this->view_all();
	}
	
	public function view_by_company()
	{
		if(!isset($_SESSION['company']))
		{
			$view = new viewModel('company_login');
		}
		else
		{
		
			$company_id=$_SESSION['company'][0];
			$jobsModel = new jobsModel;
			$company_jobs=$jobsModel->get_by_company_id($company_id);
	
			$view = new viewModel('company_jobs');
			$view->assign('company_jobs',$company_jobs);
		}	
	}
	
	
	public function add()
	{
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
		
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_city(1000);
	
		
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('job_add');
		
		$view->assign('companys',$companys);
		$view->assign('business_fields',$business_fields);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('grades',$grades);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		
	}
	
	public function edit($id)
	{
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
		
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_cities();
	
		
		
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('job_add');
		
		$view->assign('companys',$companys);
		$view->assign('business_fields',$business_fields);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('grades',$grades);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		
		
		$jobsModel = new jobsModel;
		$current_job = $jobsModel->get_by_id($id);
		$view->assign('current_job',$current_job);
		
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
				
		if(isset($_SESSION['company']))
		{
			$company_id=$_SESSION['company'][0];
		}
		else
		{
			$company_id=0;
		}
		
		$business_field_id=$_POST['cmb_business_field'];  
		$name=$_POST['txt_name'];  
		$job_type_id=$_POST['cmb_job_type'];  
		$description=$_POST['txt_description'];  
		$date_from=$_POST['txt_date_from'];  
		$date_to=$_POST['txt_date_to']; 
		$country_id=$_POST['cmb_country'];  
		$city_id=$_POST['cmb_city']; 
		$location=$_POST['txt_location'];  
		$salary_from=$_POST['txt_salary_from'];  
		$salary_to=$_POST['txt_salary_to'];  
		$salary_currency_id=$_POST['cmb_salary_currency'];  
		$education=$_POST['txt_education'];  
		$major=$_POST['txt_major'];  
		$grade_id=$_POST['cmb_grade'];  
		$min_experience=$_POST['txt_min_experience'];  
		$max_experience=$_POST['txt_max_experience'];  
		$min_age=$_POST['txt_min_age'];  
		$max_age=$_POST['txt_max_age'];  
		$gender_id=$_POST['cmb_gender'];  
		$computer_skills=$_POST['txt_computer_skills'];  
		$position_id=$_POST['cmb_position'];  
		
		if(isset($_POST['chk_have_car']))
		$have_car=1; 
		else
		$have_car=0; 
		
		if(isset($_POST['chk_have_driving_license']))
		$have_driving_license=1; 
		else
		$have_driving_license=0; 
		
	
		$jobsModel = new jobsModel;
		$jobsModel->save($id,  $company_id,  $business_field_id,  $name,  $job_type_id,  $description,  $date_from,  $date_to, $country_id, $city_id , $location,  $salary_from,  $salary_to,  $salary_currency_id,  $education,  $major,  $grade_id,  $min_experience,  $max_experience,  $min_age,  $max_age,  $gender_id,  $computer_skills,  $position_id,  $have_car,  $have_driving_license);

		$this->view_by_company();
	}
		
	public function delete($id)
	{
		$jobsModel = new jobsModel;
		$jobsModel->delete($id);
		
		$this->view_by_company();	
	}
	
	
	public function admin_add()
	{
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
		
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_city(1000);
	
		
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('admin/job_add');
		
		$view->assign('companys',$companys);
		$view->assign('business_fields',$business_fields);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('grades',$grades);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		
	}
	
	public function admin_edit($id)
	{
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
		
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_cities();
	
		
		
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('admin/job_add');
		
		$view->assign('companys',$companys);
		$view->assign('business_fields',$business_fields);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('grades',$grades);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		
		
		$jobsModel = new jobsModel;
		$current_job = $jobsModel->get_by_id($id);
		$view->assign('current_job',$current_job);
		
	}
	
	public function admin_save()
	{
		if(isset($_POST['hdn_id']))
		{
			$id=$_POST['hdn_id'];
		}
		else
		{
			$id=0;
		}
				
		$company_id=0;
		
		$business_field_id=$_POST['cmb_business_field'];  
		$name=$_POST['txt_name'];  
		$job_type_id=$_POST['cmb_job_type'];  
		$description=$_POST['txt_description'];  
		$date_from=$_POST['txt_date_from'];  
		$date_to=$_POST['txt_date_to']; 
		$country_id=$_POST['cmb_country'];  
		$city_id=$_POST['cmb_city']; 
		$location=$_POST['txt_location'];  
		$salary_from=$_POST['txt_salary_from'];  
		$salary_to=$_POST['txt_salary_to'];  
		$salary_currency_id=$_POST['cmb_salary_currency'];  
		$education=$_POST['txt_education'];  
		$major=$_POST['txt_major'];  
		$grade_id=$_POST['cmb_grade'];  
		$min_experience=$_POST['txt_min_experience'];  
		$max_experience=$_POST['txt_max_experience'];  
		$min_age=$_POST['txt_min_age'];  
		$max_age=$_POST['txt_max_age'];  
		$gender_id=$_POST['cmb_gender'];  
		$computer_skills=$_POST['txt_computer_skills'];  
		$position_id=$_POST['cmb_position'];  
		
		if(isset($_POST['chk_have_car']))
		$have_car=1; 
		else
		$have_car=0; 
		
		if(isset($_POST['chk_have_driving_license']))
		$have_driving_license=1; 
		else
		$have_driving_license=0; 
		
	
		$jobsModel = new jobsModel;
		$jobsModel->save($id,  $company_id,  $business_field_id,  $name,  $job_type_id,  $description,  $date_from,  $date_to, $country_id, $city_id , $location,  $salary_from,  $salary_to,  $salary_currency_id,  $education,  $major,  $grade_id,  $min_experience,  $max_experience,  $min_age,  $max_age,  $gender_id,  $computer_skills,  $position_id,  $have_car,  $have_driving_license);

		$this->view_admin_jobs();
	}
		
	public function admin_delete($id)
	{
		$jobsModel = new jobsModel;
		$jobsModel->delete($id);
		
		$this->view_admin_jobs();	
	}
	
	public function view_admin_jobs()
	{
		if(!isset($_SESSION['admin']))
		{
			$view = new viewModel('admin/login');
		}
		else
		{
		
			$company_id=0;
			$jobsModel = new jobsModel;
			$company_jobs=$jobsModel->get_by_company_id($company_id);
	
			$view = new viewModel('admin/view_jobs');
			$view->assign('company_jobs',$company_jobs);
		}	
	}
	
	public function search()
	{
		if(isset($_POST['smt_search']))
		{
			$keyword=$_POST['txt_text'];
			$business_field_id=$_POST['cmb_business_field'];  
			$job_type_id=$_POST['cmb_job_type']; 
			$country_id=$_POST['cmb_country'];  
			$location=$_POST['txt_location'];  
			$salary_from=$_POST['txt_salary_from'];  
			$salary_to=$_POST['txt_salary_to'];  
			$salary_currency_id=$_POST['cmb_salary_currency'];  
			$gender_id=$_POST['cmb_gender'];  
			$position_id=$_POST['cmb_position'];
			
			$where='1=1';
			if($keyword!='')
			{
				$where=$where." and (`jobs`.`name` like '%$keyword%' or `jobs`.`description` like '%$keyword%' or `jobs`.`computer_skills` like '%$keyword%' ) ";
			}
			if($business_field_id !='1')
			{
				$where=$where." and `jobs`.`business_field_id`='$business_field_id' ";
			}
			if($job_type_id !='1')
			{
				$where=$where." and `jobs`.`job_type_id`='$job_type_id' ";
			}
			if($country_id!='1000')
			{
				$where=$where." and `jobs`.`country_id`='$country_id' ";
			}
			if($location!='')
			{
				$where=$where." and `jobs`.`location` like '%$location%' ";
			}
			if($salary_from!='')
			{
				$where=$where." and `jobs`.`salary_from` >= $salary_from and `jobs`.`salary_currency_id`='$salary_currency_id' ";
			}
			if($salary_to!='')
			{
				$where=$where." and `jobs`.`salary_to` <= $salary_to and `jobs`.`salary_currency_id`='$salary_currency_id'";
			}
			if($gender_id !='1')
			{
				$where=$where." and `jobs`.`gender_id`='$gender_id' ";
			}
			if($position_id !='1')
			{
				$where=$where." and `jobs`.`position_id`='$position_id' ";
			}
			
			$jobsModel = new jobsModel;
			$search_jobs=$jobsModel->get_by_condition($where);
			
			$view = new viewModel('job_search');
			$view->assign('search_jobs',$search_jobs);
		}
		else if(isset($_POST['smt_search_home']))
		{
			$keyword=$_POST['txt_text'];
			$business_field_id=$_POST['cmb_business_field'];  

			$where='1=1';
			if($keyword!='')
			{
				$where=$where." and (`jobs`.`name` like '%$keyword%' or `jobs`.`description` like '%$keyword%' or `jobs`.`computer_skills` like '%$keyword%' ) ";
			}
			if($business_field_id !='1')
			{
				$where=$where." and `jobs`.`business_field_id`='$business_field_id' ";
			}
		
			$jobsModel = new jobsModel;
			$search_jobs=$jobsModel->get_by_condition($where);
			
			$view = new viewModel('job_search');
			$view->assign('search_jobs',$search_jobs);
		}
		else
		{
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
		
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_city(1000);
	
		
		
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('job_search');
		
		$view->assign('companys',$companys);
		$view->assign('business_fields',$business_fields);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('grades',$grades);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		}
	}
	
	public function admin_search()
	{
		if(isset($_POST['smt_search']))
		{
			$keyword=$_POST['txt_text'];
			$business_field_id=$_POST['cmb_business_field'];  
			$job_type_id=$_POST['cmb_job_type']; 
			$country_id=$_POST['cmb_country'];  
			$location=$_POST['txt_location'];  
			$salary_from=$_POST['txt_salary_from'];  
			$salary_to=$_POST['txt_salary_to'];  
			$salary_currency_id=$_POST['cmb_salary_currency'];  
			$gender_id=$_POST['cmb_gender'];  
			$position_id=$_POST['cmb_position'];
			
			$where='1=1';
			if($keyword!='')
			{
				$where=$where." and (`jobs`.`name` like '%$keyword%' or `jobs`.`description` like '%$keyword%' or `jobs`.`computer_skills` like '%$keyword%' ) ";
			}
			if($business_field_id !='1')
			{
				$where=$where." and `jobs`.`business_field_id`='$business_field_id' ";
			}
			if($job_type_id !='1')
			{
				$where=$where." and `jobs`.`job_type_id`='$job_type_id' ";
			}
			if($country_id!='1000')
			{
				$where=$where." and `jobs`.`country_id`='$country_id' ";
			}
			if($location!='')
			{
				$where=$where." and `jobs`.`location` like '%$location%' ";
			}
			if($salary_from!='')
			{
				$where=$where." and `jobs`.`salary_from` >= $salary_from and `jobs`.`salary_currency_id`='$salary_currency_id' ";
			}
			if($salary_to!='')
			{
				$where=$where." and `jobs`.`salary_to` <= $salary_to and `jobs`.`salary_currency_id`='$salary_currency_id'";
			}
			if($gender_id !='1')
			{
				$where=$where." and `jobs`.`gender_id`='$gender_id' ";
			}
			if($position_id !='1')
			{
				$where=$where." and `jobs`.`position_id`='$position_id' ";
			}
			
			$jobsModel = new jobsModel;
			$search_jobs=$jobsModel->get_by_condition($where);
			
			$view = new viewModel('admin/job_search');
			$view->assign('search_jobs',$search_jobs);
		}
		else
		{
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
		
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_city(1000);
	
		
		
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('admin/job_search');
		
		$view->assign('companys',$companys);
		$view->assign('business_fields',$business_fields);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('grades',$grades);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		}
	}
	
	public function getByCountriesCities($country_id=0,$city_id=0)
	{
			$where='1=1';
			if($country_id!=0)
			{
				$where=$where." and `jobs`.`country_id`='$country_id' ";
			}
			if($city_id !=0)
			{
				$where=$where." and `jobs`.`city_id`='$city_id' ";
			}
		
			$jobsModel = new jobsModel;
			$search_jobs=$jobsModel->get_by_condition($where);
			
			$view = new viewModel('job_search');
			$view->assign('search_jobs',$search_jobs);
	}
	
	public function details($id)
	{
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
		
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_cities();
		
		
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('job_details');
				
		$view->assign('companys',$companys);
		$view->assign('business_fields',$business_fields);
		
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('grades',$grades);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		
		
		$jobsModel = new jobsModel;
		$current_job = $jobsModel->get_by_id($id);
		$view->assign('current_job',$current_job);
		
	}
	
	public function admin_details($id)
	{
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
		
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_cities();
		
		
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('admin/job_details');
				
		$view->assign('companys',$companys);
		$view->assign('business_fields',$business_fields);
		
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('grades',$grades);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		
		
		$jobsModel = new jobsModel;
		$current_job = $jobsModel->get_by_id($id);
		$view->assign('current_job',$current_job);
		
	}
	
}