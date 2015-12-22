<?php
class companyController Extends baseController 
{

	public function index()
	{
		//$this->view_all();
		
	}
	
	public function logout()
	{
		unset($_SESSION['company']);
		$view = new viewModel('home');
	}
	
	public function login()
	{
		if(isset($_SESSION['company']))
		{
			$view = new viewModel('home');
		}
		else
		{
			$view = new viewModel('company_login');
		}	
	}
	
	public function authenticate()
	{
		$username=$_POST['txt_username'];  
		$password=$_POST['txt_password']; 
		
		//$password=md5($password);
		
		$companyModel = new companyModel;
		$current_company = $companyModel->get_by_username_and_password($username, $password);
		if($current_company)
		{
			$_SESSION['company']=$current_company;
			$view = new viewModel('home');
		}
		else
		{
			$view = new viewModel('company_login');
		}
	}
	
	public function activate($activation_code)
	{
		$companyModel = new companyModel;
		$company = $companyModel->activate($activation_code);
		
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
			$message='تم تفعيل حسابك بنجاح ';
			$link="<a href='".site_url."/company/login'>دخول</a>";
		}
		else
		{
			$message='Your account activated successfully';
			$link="<a href='".site_url."/company/login'>login</a>";
		}
		
		
		$view->assign('message',$message);
		$view->assign('link',$link);
	}
	
	public function register()
	{
		$combosModel = new combosModel;
		$company_types = $combosModel->get_all_company_type();
	
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_cities();
		
		$combosModel = new combosModel;
		$titles = $combosModel->get_all_title();
	
			
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
		
		$view = new viewModel('company_account');
		
		if(isset($_SESSION['company']))
		{
		$id=$_SESSION['company']['id'];
			
		$companyModel = new companyModel;
		$current_company = $companyModel->get_by_id($id);
		$view->assign('current_company',$current_company);
		}
		
		$view->assign('company_types',$company_types);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('titles',$titles);
		$view->assign('business_fields',$business_fields);
			
		
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
		
		if($id==0)
		{
			$companyModel = new companyModel;
			$result = $companyModel->get_by_email($_POST['txt_email']);
			if($result)
			{
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
					$link="<a href='".site_url."/company/send_password'>هنا</a>";
					$message="هذا البريد مسجل عندنا بالفعل, اذا كنت نسيت كلمة المرور اضغط $link";
				}
				else
				{
					$link="<a href='".site_url."/company/send_password'>Here</a>";
					$message="This email already registered, If you forget password clik $link";
				}
				
				
				$view->assign('message',$message);
				die;
			}
		}
		
		
		
		
		$username=$_POST['txt_username'];  
		$password=$_POST['txt_password'];  
		
		//$password=md5($password);
		
		$name=$_POST['txt_name'];  
		$company_type_id=$_POST['cmb_company_type'];  
		$business_field_id=$_POST['cmb_business_field'];  
		$business_description=$_POST['txt_business_description'];  
		$country_id=$_POST['cmb_country'];  
		$city_id=$_POST['cmb_city'];  
		$region=$_POST['txt_region'];  
		$address=$_POST['txt_address'];  
		$zip_code=$_POST['txt_zip_code'];  
		$phone1=$_POST['txt_phone1'];  
		$phone2=$_POST['txt_phone2'];  
		$mobile=$_POST['txt_mobile'];  
		$fax=$_POST['txt_fax'];  
		$email=$_POST['txt_email'];  
		$website=$_POST['txt_website'];  
		$contact_person_title_id=$_POST['cmb_contact_person_tite'];  
		$contact_person_name=$_POST['txt_contact_person_name'];  
		$year_established=$_POST['txt_year_established'];  
		$no_of_employees=$_POST['txt_no_of_employees'];  
		$hear_about_us_from=$_POST['txt_hear_about_us_from'];
		
		$activation_code=$this->genRandomString();
		
		//Activation link To send email
		//$link="<a href='".site_url."/company/activate/$activation_code'>Activate Your Acount At Osoolrec</a>";
		
		$companyModel = new companyModel;
		$companyModel->save($id,  $username,  $password,  $name,  $company_type_id,  $business_field_id,  $business_description,  $country_id,  $city_id,  $region,  $address,  $zip_code,  $phone1,  $phone2,  $mobile,  $fax,  $email,  $website,  $contact_person_title_id,  $contact_person_name,  $year_established,  $no_of_employees,  $hear_about_us_from,$activation_code);
	
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
			$message='تم التسجيل بنجاح, و تم ارسال رابط التفعيل على الايميل, يجب عليك تفعيل حسابك اولا ';
		}
		else
		{
			$message='You are registered successfully, Your activation link send to your Email, You must activate your account before login';
		}
		
		
		$view->assign('message',$message);
		
	}
	
	
	public function check_username_availability()
	{
		if(isset($_POST['txt_username']))
		{
			$companyModel = new companyModel;
			$company = $companyModel->get_by_username($_POST['txt_username']);
			if($company)
				{
				echo '<font color="red">The <STRONG>'.$company[1].'</STRONG> not available.</font>';
				}
				else
				{
				echo 'OK';
				}
		}
	}
	
	
	public function send_password()
	{
		if(isset($_POST['smt_send_password']))
		{
			$email=$_POST['txt_email'];  
			
			$companyModel = new companyModel;
			$result = $companyModel->get_by_email($email);
			if($result)
			{
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
					$message="تم ارسال اسم المستخدم وكلمة المرور الى الايميل";
				}
				else
				{
					$message="The username and password are sent to email.";
				}
				
				
				$view->assign('message',$message);
				die;
			}
			else
			{
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
					$message="هذا الايميل غير موجود فى قاعدة البيانات";
				}
				else
				{
					$message="This email not exist in our database.";
				}
				
				
				$view->assign('message',$message);
				die;			
			}
		}
		else
		{
			
			$view = new viewModel('send_password');
			$view->assign('controller','company');
		}
	}
	
	public function view_all()
	{
		if(!isset($_SESSION['user']))
		{
			$view = new viewModel('login');
		}
		else
		{
		
		$companyModel = new companyModel;
		$companys = $companyModel->get_all();
	
		$view = new viewModel('company');
		$view->assign('companys',$companys);
		
		$screenModel = new screenModel;
		$screens = $screenModel->get_all_screens();
		$view->assign('screens',$screens);
		}	
	}
	
	public function edit()
	{
		//$id=$_SESSION['company']['id'];
		$id=1;
		
		$companyModel = new companyModel;
		$current_company = $companyModel->get_by_id($id);
		//$companys = $companyModel->get_all();
		
		
			$combosModel = new combosModel;
			$company_types = $combosModel->get_all_company_type();
	
			$combosModel = new combosModel;
			$countrys = $combosModel->get_all_country();
	
			
			$combosModel = new combosModel;
			$cities = $combosModel->get_all_city(1000);
		
			$combosModel = new combosModel;
			$titles = $combosModel->get_all_title();
	
			
			$business_fieldModel = new business_fieldModel;
			$business_fields = $business_fieldModel->get_all();
	
			
		
			$view = new viewModel('company_account');
			$view->assign('company_types',$company_types);
			$view->assign('countrys',$countrys);
			$city_id=$_POST['cmb_city'];  
			$view->assign('titles',$titles);
			$view->assign('business_fields',$business_fields);
		
		$view->assign('current_company',$current_company);
		//$view->assign('companys',$companys);	
		
	}
	
	public function delete($id)
	{
		$companyModel = new companyModel;
		$companyModel->delete($id);
		
		$screenModel = new screenModel;
		$screenModel->delete_company_screens($id);
		
		$this->view_all();	
	}
	
	function genRandomString() 
	{
	    $length = 20;
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $txt = '';    
	
	    for ($p = 0; $p < $length; $p++) 
	    {
	        $txt= $txt.$characters[mt_rand(0, strlen($characters)-1)];
	    }
	
	    return $txt;
	}
}