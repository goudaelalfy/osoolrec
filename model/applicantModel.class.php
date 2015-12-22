<?php

class applicantModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function save($id,  $username,  $password,  $name,  $gender_id,  $birthdate,  $nationality_id,  $country_id,  $city_id,  $region,  $address,  $phone,  $mobile,  $email,  $marital_status_id,  $military_status_id,  $have_car,  $have_driving_license,  $university,  $faculty,  $major,  $grade_id,  $career_objective,  $position_id,  $job_type_id,  $business_field_id,  $minimum_salary,  $salary_currency_id,  $cv_name, $activation_code)
	{
		if($id==0)
		{
			$sql="INSERT INTO `applicant` (  `username`,  `password`,  `name`,  `gender_id`,  `birthdate`,  `nationality_id`,  `country_id`,  `city_id`,  `region`,  `address`,  `phone`,  `mobile`,  `email`,  `marital_status_id`,  `military_status_id`,  `have_car`,  `have_driving_license`,  `university`,  `faculty`,  `major`,  `grade_id`,  `career_objective`,  `position_id`,  `job_type_id`,  `business_field_id`,  `minimum_salary`,  `salary_currency_id`,  `cv_name`, `activation_code`)
			 VALUES ('$username',  '$password',  '$name',  '$gender_id',  '$birthdate',  '$nationality_id',  '$country_id',  '$city_id',  '$region',  '$address',  '$phone',  '$mobile',  '$email',  '$marital_status_id',  '$military_status_id',  '$have_car',  '$have_driving_license',  '$university',  '$faculty',  '$major',  '$grade_id',  '$career_objective',  '$position_id',  '$job_type_id',  '$business_field_id',  '$minimum_salary',  '$salary_currency_id',  '$cv_name', '$activation_code')";
		}
		else
		{
			$sql="UPDATE `applicant` SET `username`='$username',  `password`='$password',  `name`='$name',  `gender_id`='$gender_id',  `birthdate`='$birthdate',  `nationality_id`='$nationality_id',  `country_id`='$country_id',  `city_id`='$city_id',  `region`='$region',  `address`='$address',  `phone`='$phone',  `mobile`='$mobile',  `email`='$email',  `marital_status_id`='$marital_status_id',  `military_status_id`='$military_status_id',  `have_car`='$have_car',  `have_driving_license`='$have_driving_license',  `university`='$university',  `faculty`='$faculty',  `major`='$major',  `grade_id`='$grade_id',  `career_objective`='$career_objective',  `position_id`='$position_id',  `job_type_id`='$job_type_id',  `business_field_id`='$business_field_id',  `minimum_salary`='$minimum_salary',  `salary_currency_id`='$salary_currency_id' WHERE `id`=$id";
		}
		
		$this->db->query($sql);
	}
	
	public function activate($activation_code)
	{
		$sql="UPDATE `applicant` SET `active`=1 WHERE `activation_code`='$activation_code'";
		$this->db->query($sql);
	}
	
	public function delete($id)
	{
		$sql="DELETE FROM `applicant` WHERE `id`=$id";
		$this->db->query($sql);
	}
	
	public function get_by_id($id)
	{		
		
		$sql="SELECT `id`, `username`,  `password`,  `name`,  `gender_id`,  `birthdate`,  `nationality_id`,  `country_id`,  `city_id`,  `region`,  `address`,  `phone`,  `mobile`,  `email`,  `marital_status_id`,  `military_status_id`,  `have_car`,  `have_driving_license`,  `university`,  `faculty`,  `major`,  `grade_id`,  `career_objective`,  `position_id`,  `job_type_id`,  `business_field_id`,  `minimum_salary`,  `salary_currency_id`,  `cv_name` FROM `applicant` WHERE `id`=$id";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_all()
	{		
		
		$sql="SELECT `id`, `username`,  `password`,  `name`,  `gender_id`,  `birthdate`,  `nationality_id`,  `country_id`,  `city_id`,  `region`,  `address`,  `phone`,  `mobile`,  `email`,  `marital_status_id`,  `military_status_id`,  `have_car`,  `have_driving_license`,  `university`,  `faculty`,  `major`,  `grade_id`,  `career_objective`,  `position_id`,  `job_type_id`,  `business_field_id`,  `minimum_salary`,  `salary_currency_id`,  `cv_name` FROM `applicant` ";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_username_and_password($username, $password)
	{		
		
		$sql="SELECT `id`, `username`,  `password`,  `name`,  `gender_id`,  `birthdate`,  `nationality_id`,  `country_id`,  `city_id`,  `region`,  `address`,  `phone`,  `mobile`,  `email`,  `marital_status_id`,  `military_status_id`,  `have_car`,  `have_driving_license`,  `university`,  `faculty`,  `major`,  `grade_id`,  `career_objective`,  `position_id`,  `job_type_id`,  `business_field_id`,  `minimum_salary`,  `salary_currency_id`,  `cv_name` FROM `applicant` WHERE `username`='$username' and `password`='$password' and active=1";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_by_username($username)
	{		
		
		$sql="SELECT `id`, `username`,  `password`,  `name`,  `gender_id`,  `birthdate`,  `nationality_id`,  `country_id`,  `city_id`,  `region`,  `address`,  `phone`,  `mobile`,  `email`,  `marital_status_id`,  `military_status_id`,  `have_car`,  `have_driving_license`,  `university`,  `faculty`,  `major`,  `grade_id`,  `career_objective`,  `position_id`,  `job_type_id`,  `business_field_id`,  `minimum_salary`,  `salary_currency_id`,  `cv_name` FROM `applicant` WHERE `username`='$username' ";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_by_email($email)
	{		
		
		$sql="SELECT `id`, `username`,  `password`,  `name`,  `gender_id`,  `birthdate`,  `nationality_id`,  `country_id`,  `city_id`,  `region`,  `address`,  `phone`,  `mobile`,  `email`,  `marital_status_id`,  `military_status_id`,  `have_car`,  `have_driving_license`,  `university`,  `faculty`,  `major`,  `grade_id`,  `career_objective`,  `position_id`,  `job_type_id`,  `business_field_id`,  `minimum_salary`,  `salary_currency_id`,  `cv_name` FROM `applicant` WHERE `email`='$email'";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_by_condition($where)
	{		
		
		$sql="SELECT `applicant`.*, 
		 `business_field`.`name_en` as english_business_field, `business_field`.`name_ar` as arabic_business_field 
		FROM `applicant` 
		inner join `business_field` on `business_field`.id = `applicant`.business_field_id
		where $where
		order by `applicant`.`id` desc
		";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_max_id()
	{		
		
		$sql="SELECT max(`id`) FROM `applicant`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
	public function get_count()
	{		
		
		$sql="SELECT count(`id`) FROM `applicant`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
	public function apply_job($applicant_id, $job_id)
	{		
		
		$sql="INSERT INTO `applicant_job` (`job_id`, `applicant_id`)
			 VALUES ('$job_id',  '$applicant_id')";
		
		$this->db->query($sql);
	}
	
	
	public function get_applied_job_by_job_id($applicant_id, $job_id)
	{		
		
		$sql="SELECT * from applicant_job WHERE applicant_id=$applicant_id and job_id=$job_id";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_applicant_jobs($applicant_id)
	{
		$sql="SELECT `jobs`.*, 
		`business_field`.`name_en` as english_business_field, `business_field`.`name_ar` as arabic_business_field,  
		`company`.name as company
		FROM `jobs` 
		inner join `applicant_job` on `jobs`.id = `applicant_job`.job_id
		inner join `business_field` on `business_field`.id = `jobs`.business_field_id
		inner join `company` on `jobs`.company_id = `company`.id
		where applicant_job.applicant_id='$applicant_id'
		order by `jobs`.`id` desc
		";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
}
