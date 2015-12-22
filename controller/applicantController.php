<?php
class applicantController Extends baseController 
{

	public function index()
	{
		//$this->view_all();
	}
	
	public function register()
	{
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_cities();
	
		
		$combosModel = new combosModel;
		$marital_statuss = $combosModel->get_all_marital_status();
	
		$combosModel = new combosModel;
		$military_statuss = $combosModel->get_all_military_status();
	
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
			
		$view = new viewModel('applicant_account');
			
		//$_SESSION['applicant']['id']=2;
		if(isset($_SESSION['applicant']))
		{
		$id=$_SESSION['applicant']['id'];
			
		$applicantModel = new applicantModel;
		$current_applicant = $applicantModel->get_by_id($id);
		$view->assign('current_applicant',$current_applicant);
		}
		
		$view->assign('genders',$genders);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('marital_statuss',$marital_statuss);
		$view->assign('military_statuss',$military_statuss);
		$view->assign('grades',$grades);
		$view->assign('positions',$positions);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('business_fields',$business_fields);
		
	}
	
	public function login()
	{
		if(isset($_SESSION['applicant']))
		{
			$view = new viewModel('home');
		}
		else
		{
			$view = new viewModel('applicant_login');
		}	
	}
	
	public function authenticate()
	{
		$username=$_POST['txt_username'];  
		$password=$_POST['txt_password']; 
		
		//$password=md5($password);
		
		$applicantModel = new applicantModel;
		$current_applicant = $applicantModel->get_by_username_and_password($username, $password);
		if($current_applicant)
		{
			$_SESSION['applicant']=$current_applicant;
			$view = new viewModel('home');
		}
		else
		{
			$view = new viewModel('applicant_login');
		}
	}
	
	public function logout()
	{
		unset($_SESSION['applicant']);
		$view = new viewModel('home');
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
			$applicantModel = new applicantModel;
			$result = $applicantModel->get_by_email($_POST['txt_email']);
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
					$link="<a href='".site_url."/applicant/send_password'>هنا</a>";
					$message="هذا البريد مسجل عندنا بالفعل, اذا كنت نسيت كلمة المرور اضغط $link";
				}
				else
				{
					$link="<a href='".site_url."/applicant/send_password'>Here</a>";
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
		$gender_id=$_POST['cmb_gender'];  
		
		$birthdate=$_POST['txt_birthdate'];  
		/*
		list($month, $day, $year) = split('[/.-]', $birthdate);
		//list($month, $day, $year) = explode("/", $birthdate);
		$birthdate=$year.'-'.$month.'-'.$day;
		*/
		$nationality_id=$_POST['cmb_nationality'];  
		$country_id=$_POST['cmb_country'];  
		$city_id=$_POST['cmb_city'];  
		$region=$_POST['txt_region'];  
		$address=$_POST['txt_address'];  
		$phone=$_POST['txt_phone'];  
		$mobile=$_POST['txt_mobile'];  
		$email=$_POST['txt_email'];  
		$marital_status_id=$_POST['cmb_marital_status'];  
		$military_status_id=$_POST['cmb_military_status'];
		  
		if(isset($_POST['chk_have_car']))
		$have_car=1; 
		else
		$have_car=0; 
		
		if(isset($_POST['chk_have_driving_license']))
		$have_driving_license=1; 
		else
		$have_driving_license=0; 
		
		
		$university=$_POST['txt_university'];  
		$faculty=$_POST['txt_faculty'];  
		$major=$_POST['txt_major'];  
		$grade_id=$_POST['cmb_grade'];  
		$career_objective=$_POST['txt_career_objective'];  
		$position_id=$_POST['cmb_position'];  
		$job_type_id=$_POST['cmb_job_type'];  
		$business_field_id=$_POST['cmb_business_field'];  
		$minimum_salary=$_POST['txt_minimum_salary'];  
		$salary_currency_id=$_POST['cmb_salary_currency'];  
		
		
		$applicantModel = new applicantModel;
		$max_id=$applicantModel->get_max_id();
		$id_insert=$max_id+1;
		$cv_name=$username.$id_insert;
		
		$activation_code=$this->genRandomString();
		
		
		$filename = $_FILES["flcv"]["name"];
		$file_ext = substr($filename, strripos($filename, '.')); // strip name
		if (($file_ext == ".pdf" || $file_ext == ".doc"|| $file_ext == ".docx"|| $file_ext == ".dot"))
		{
			//$newname = 'cvs/'.$filename;
			$newname = __SITE_PATH.'/views/cvs/'.$cv_name.$file_ext;
			if ((move_uploaded_file($_FILES['flcv']['tmp_name'],$newname))) 
			{
				//Activation link To send email
				//$link="<a href='".site_url."/applicant/activate/$activation_code'>Activate Your Acount At Osoolrec</a>";
			
				
				$applicantModel = new applicantModel;
				$applicantModel->save($id,  $username,  $password,  $name,  $gender_id,  $birthdate,  $nationality_id,  $country_id,  $city_id,  $region,  $address,  $phone,  $mobile,  $email,  $marital_status_id,  $military_status_id,  $have_car,  $have_driving_license,  $university,  $faculty,  $major,  $grade_id,  $career_objective,  $position_id,  $job_type_id,  $business_field_id,  $minimum_salary,  $salary_currency_id,  $cv_name.$file_ext, $activation_code);
				
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
		    else 
		    {
		    $error="Error: A problem occurred during file upload!";
		    echo $error;
		    }
		}
		elseif (empty($filename)) 
		{
			//Activation link To send email
			//$link="<a href='".site_url."/applicant/activate/$activation_code'>Activate Your Acount At Osoolrec</a>";
		
			$applicantModel = new applicantModel;
			$applicantModel->save($id,  $username,  $password,  $name,  $gender_id,  $birthdate,  $nationality_id,  $country_id,  $city_id,  $region,  $address,  $phone,  $mobile,  $email,  $marital_status_id,  $military_status_id,  $have_car,  $have_driving_license,  $university,  $faculty,  $major,  $grade_id,  $career_objective,  $position_id,  $job_type_id,  $business_field_id,  $minimum_salary,  $salary_currency_id,  $cv_name, $activation_code);
			
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
		 else 
		{
			$error = "Only .pdf or .doc format can be submitted online.";
			echo $error;
		}
		
		
	}
	
	public function apply()
	{
		if(isset($_POST['smt_apply']))
		{
			if(isset($_SESSION['applicant']))
			{
				$job_id=$_POST['hdn_id'];
				$applicant_id=$_SESSION['applicant']['id'];
				$applicantModel = new applicantModel;
				$apply=$applicantModel->apply_job($applicant_id,$job_id);
			
				if(isset($_SESSION['lang']))
				{
					$lang=$_SESSION['lang'];
				}
				else
				{
					$lang='en';
				}
				
				$view = new viewModel('result');
					
				if($lang=='ar')
				{
					$message="لقد تقدمت على هذة الوظيفة بنجاح";
				}
				else
				{
					$message="You are applied to this job successfully.";
				}
				
				
				$view->assign('message',$message);
				die;
			}
		}
	}
	
	public function check_username_availability()
	{
		if(isset($_POST['txt_username']))
		{
			$applicantModel = new applicantModel;
			$applicant = $applicantModel->get_by_username($_POST['txt_username']);
			if($applicant)
				{
				echo '<font color="red">The <STRONG>'.$applicant[1].'</STRONG> not available.</font>';
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
			
			$applicantModel = new applicantModel;
			$result = $applicantModel->get_by_email($email);
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
			$view->assign('controller','applicant');
		}
	}
	
	public function activate($activation_code)
	{
		$applicantModel = new applicantModel;
		$applicant = $applicantModel->activate($activation_code);
		
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
			$link="<a href='".site_url."/applicant/login'>دخول</a>";
		}
		else
		{
			$message='Your account activated successfully';
			$link="<a href='".site_url."/applicant/login'>login</a>";
		}
		
		
		$view->assign('message',$message);
		$view->assign('link',$link);
	}
	
	public function admin_search($to='')
	{
		if(!isset($_SESSION['admin']))
		{
			$view = new viewModel('admin/login');
		}
		else
		{
		
			if(isset($_POST['smt_search']))
			{
				$keyword=$_POST['txt_text'];
				$business_field_id=$_POST['cmb_business_field'];
				$job_type_id=$_POST['cmb_job_type']; 
				$country_id=$_POST['cmb_country'];  
				$gender_id=$_POST['cmb_gender'];  
				$position_id=$_POST['cmb_position'];
				
				$where='1=1';
				if($keyword!='')
				{
					$where=$where." and `applicant`.`career_objective` like '%$keyword%";
				}
				if($business_field_id !='1')
				{
					$where=$where." and `applicant`.`business_field_id`='$business_field_id' ";
				}
				if($job_type_id !='1')
				{
					$where=$where." and `applicant`.`job_type_id`='$job_type_id' ";
				}
				if($country_id!='1000')
				{
					$where=$where." and `applicant`.`country_id`='$country_id' ";
				}
				if($gender_id !='1')
				{
					$where=$where." and `applicant`.`gender_id`='$gender_id' ";
				}
				if($position_id !='1')
				{
					$where=$where." and `applicant`.`position_id`='$position_id' ";
				}
				
				$applicantModel = new applicantModel;
				$search_applicants=$applicantModel->get_by_condition($where);
				
				$view = new viewModel('admin/applicant_search');
				$view->assign('search_applicants',$search_applicants);
			}
			else if($to=='get')
			{
				$where='1=1';
				
				$applicantModel = new applicantModel;
				$search_applicants=$applicantModel->get_by_condition($where);
				
				$view = new viewModel('admin/applicant_search');
				$view->assign('search_applicants',$search_applicants);
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
			$job_types = $combosModel->get_all_job_type();
	
			$combosModel = new combosModel;
			$genders = $combosModel->get_all_gender();
		
			$combosModel = new combosModel;
			$positions = $combosModel->get_all_position();
		
			
			$view = new viewModel('admin/applicant_search');
			
			$view->assign('business_fields',$business_fields);
			$view->assign('countrys',$countrys);
			$view->assign('job_types',$job_types);
			$view->assign('genders',$genders);
			$view->assign('positions',$positions);
			}
		
		}	
	}
	
	public function admin_details($id)
	{
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_cities();
	
		
		$combosModel = new combosModel;
		$marital_statuss = $combosModel->get_all_marital_status();
	
		$combosModel = new combosModel;
		$military_statuss = $combosModel->get_all_military_status();
	
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
			
		
	
		
		$view = new viewModel('admin/applicant_details');
				
		$view->assign('genders',$genders);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('marital_statuss',$marital_statuss);
		$view->assign('military_statuss',$military_statuss);
		$view->assign('grades',$grades);
		$view->assign('positions',$positions);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('business_fields',$business_fields);
	
		
		
		$applicantModel = new applicantModel;
		$current_applicant=$applicantModel->get_by_id($id);

		$view->assign('current_applicant',$current_applicant);
		
	}
	
	public function download_cv($cv_name)
	{
		$fullPath = __SITE_PATH.'/views/cvs/'.$cv_name;
		
		if ($fd = fopen ($fullPath, "r")) {
		    $fsize = filesize($fullPath);
		    $path_parts = pathinfo($fullPath);
		    $ext = strtolower($path_parts["extension"]);
		    switch ($ext) {
		        case "pdf":
		        header("Content-type: application/pdf"); // add here more headers for diff. extensions
		        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
		        break;
		        default;
		        header("Content-type: application/octet-stream");
		        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
		    }
		    header("Content-length: $fsize");
		    header("Cache-control: private"); //use this to open files directly
		    while(!feof($fd)) {
		        $buffer = fread($fd, 2048);
		        echo $buffer;
		    }
		}
		fclose ($fd);
		exit;
	}
	
	public function edit($id)
	{
		$applicantModel = new applicantModel;
		$current_applicant = $applicantModel->get_by_id($id);
		$applicants = $applicantModel->get_all();
		
		$view = new viewModel('applicant');
		$view->assign('current_applicant',$current_applicant);
		$view->assign('applicants',$applicants);	
		
		$screenModel = new screenModel;
		$screens = $screenModel->get_all_screens();
		$applicant_screens = $screenModel->get_applicant_screens($id);
		$view->assign('screens',$screens);
		$view->assign('applicant_screens',$applicant_screens);
	}
	
	public function delete($id)
	{
		$applicantModel = new applicantModel;
		$applicantModel->delete($id);
		
		$screenModel = new screenModel;
		$screenModel->delete_applicant_screens($id);
		
		$this->view_all();	
	}
	
	public function search()
	{
		if(isset($_POST['smt_search']))
		{
			$keyword=$_POST['txt_text'];
			$business_field_id=$_POST['cmb_business_field'];
			$job_type_id=$_POST['cmb_job_type']; 
			$country_id=$_POST['cmb_country'];  
			$gender_id=$_POST['cmb_gender'];  
			$position_id=$_POST['cmb_position'];
			
			$where='1=1';
			if($keyword!='')
			{
				$where=$where." and `applicant`.`career_objective` like '%$keyword%";
			}
			if($business_field_id !='1')
			{
				$where=$where." and `applicant`.`business_field_id`='$business_field_id' ";
			}
			if($job_type_id !='1')
			{
				$where=$where." and `applicant`.`job_type_id`='$job_type_id' ";
			}
			if($country_id!='1000')
			{
				$where=$where." and `applicant`.`country_id`='$country_id' ";
			}
			if($gender_id !='1')
			{
				$where=$where." and `applicant`.`gender_id`='$gender_id' ";
			}
			if($position_id !='1')
			{
				$where=$where." and `applicant`.`position_id`='$position_id' ";
			}
			
			$applicantModel = new applicantModel;
			$search_applicants=$applicantModel->get_by_condition($where);
			
			$view = new viewModel('applicant_search');
			$view->assign('search_applicants',$search_applicants);
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
		$job_types = $combosModel->get_all_job_type();

		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		
		$view = new viewModel('applicant_search');
		
		$view->assign('business_fields',$business_fields);
		$view->assign('countrys',$countrys);
		$view->assign('job_types',$job_types);
		$view->assign('genders',$genders);
		$view->assign('positions',$positions);
		}
	}
	
	public function details($id)
	{
		$combosModel = new combosModel;
		$genders = $combosModel->get_all_gender();
	
		$combosModel = new combosModel;
		$countrys = $combosModel->get_all_country();
	
		$combosModel = new combosModel;
		$cities = $combosModel->get_all_cities();
	
		
		$combosModel = new combosModel;
		$marital_statuss = $combosModel->get_all_marital_status();
	
		$combosModel = new combosModel;
		$military_statuss = $combosModel->get_all_military_status();
	
		$combosModel = new combosModel;
		$grades = $combosModel->get_all_grade();
	
		$combosModel = new combosModel;
		$positions = $combosModel->get_all_position();
	
		$combosModel = new combosModel;
		$job_types = $combosModel->get_all_job_type();
	
		$combosModel = new combosModel;
		$currencys = $combosModel->get_all_currency();
	  
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();
			
		
	
		
		$view = new viewModel('applicant_details');
				
		$view->assign('genders',$genders);
		$view->assign('countrys',$countrys);
		$view->assign('cities',$cities);
		$view->assign('marital_statuss',$marital_statuss);
		$view->assign('military_statuss',$military_statuss);
		$view->assign('grades',$grades);
		$view->assign('positions',$positions);
		$view->assign('job_types',$job_types);
		$view->assign('currencys',$currencys);
		$view->assign('business_fields',$business_fields);
	
		
		
		$applicantModel = new applicantModel;
		$current_applicant=$applicantModel->get_by_id($id);

		$view->assign('current_applicant',$current_applicant);
		
	}
	
	function jobs()
	{
		if(isset($_SESSION['applicant']))
		{
			$applicant_id=$_SESSION['applicant']['id'];
			$applicantModel = new applicantModel;
			$applicant_jobs=$applicantModel->get_applicant_jobs($applicant_id);
				
			$view = new viewModel('job_search');
			$view->assign('search_jobs',$applicant_jobs);
		}
	}
	
	function genRandomString() 
	{
	    $length = 20;
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $txt ='';    
	
	    for ($p = 0; $p < $length; $p++) 
	    {
	        $txt=$txt.$characters[mt_rand(0, strlen($characters)-1)];
	    }
	
	    return $txt;
	}
	
}