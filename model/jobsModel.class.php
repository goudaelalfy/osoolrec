<?php

class jobsModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function save($id,  $company_id,  $business_field_id,  $name,  $job_type_id,  $description,  $date_from,  $date_to, $country_id,  $city_id,  $location,  $salary_from,  $salary_to,  $salary_currency_id,  $education,  $major,  $grade_id,  $min_experience,  $max_experience,  $min_age,  $max_age,  $gender_id,  $computer_skills,  $position_id,  $have_car,  $have_driving_license)
	{
		if($id==0)
		{
			$sql="INSERT INTO `jobs` (`company_id`,  `business_field_id`,  `name`,  `job_type_id`,  `description`,  `date_from`,  `date_to`, `country_id`,  `city_id`,  `location`,  `salary_from`,  `salary_to`,  `salary_currency_id`,  `education`,  `major`,  `grade_id`,  `min_experience`,  `max_experience`,  `min_age`,  `max_age`,  `gender_id`,  `computer_skills`,  `position_id`,  `have_car`,  `have_driving_license`)
			 VALUES ('$company_id',  '$business_field_id',  '$name',  '$job_type_id',  '$description',  '$date_from',  '$date_to', '$country_id',  '$city_id',  '$location',  '$salary_from',  '$salary_to',  '$salary_currency_id',  '$education',  '$major',  '$grade_id',  '$min_experience',  '$max_experience',  '$min_age',  '$max_age',  '$gender_id',  '$computer_skills',  '$position_id',  '$have_car',  '$have_driving_license')";
		
		}
		else
		{
			$sql="UPDATE `jobs` SET `company_id`='$company_id',  `business_field_id`='$business_field_id',  `name`='$name',  `job_type_id`='$job_type_id',  `description`='$description',  `date_from`='$date_from',  `date_to`='$date_to',`country_id`= $country_id, `city_id`= $city_id,  `location`='$location',  `salary_from`='$salary_from',  `salary_to`='$salary_to',  `salary_currency_id`='$salary_currency_id',  `education`='$education',  `major`='$major',  `grade_id`='$grade_id',  `min_experience`='$min_experience',  `max_experience`='$max_experience',  `min_age`='$min_age',  `max_age`='$max_age',  `gender_id`='$gender_id',  `computer_skills`='$computer_skills',  `position_id`='$position_id',  `have_car`='$have_car',  `have_driving_license`='$have_driving_license' WHERE `id`=$id";
		}
		
		$this->db->query($sql);
	}
	
	public function delete($id)
	{
		$sql="DELETE FROM `jobs` WHERE `id`=$id";
		$this->db->query($sql);
	}
	
	public function get_all()
	{		
		
		$sql="SELECT `id`, `company_id`,  `business_field_id`,  `name`,  `job_type_id`,  `description`,  `date_from`,  `date_to`, `country_id`,`city_id`,  `location`,  `salary_from`,  `salary_to`,  `salary_currency_id`,  `education`,  `major`,  `grade_id`,  `min_experience`,  `max_experience`,  `min_age`,  `max_age`,  `gender_id`,  `computer_skills`,  `position_id`,  `have_car`,  `have_driving_license`  FROM `jobs`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_hot_jobs()
	{		
		
		$sql="SELECT `jobs`.`id`,  `jobs`.`name`,  `jobs`.`description`,  `jobs`.`location`, 
		 `business_field`.`name_en` as english_business_field, `business_field`.`name_ar` as arabic_business_field,  
		 `company`.name as company
		FROM `jobs` 
		inner join `business_field` on `business_field`.id = `jobs`.business_field_id
		inner join `company` on `jobs`.company_id = `company`.id
		order by `jobs`.`id` desc limit 12
		";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_condition($where)
	{		
		
		$sql="SELECT `jobs`.*, 
		 `business_field`.`name_en` as english_business_field, `business_field`.`name_ar` as arabic_business_field,  
		 `company`.name as company
		FROM `jobs` 
		inner join `business_field` on `business_field`.id = `jobs`.business_field_id
		inner join `company` on `jobs`.company_id = `company`.id
		where $where
		order by `jobs`.`id` desc
		";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_company_id($company_id)
	{		
		
		$sql="SELECT `id`, `company_id`,  `business_field_id`,  `name`,  `job_type_id`,  `description`,  `date_from`,  `date_to`, `country_id`, `city_id`,  `location`,  `salary_from`,  `salary_to`,  `salary_currency_id`,  `education`,  `major`,  `grade_id`,  `min_experience`,  `max_experience`,  `min_age`,  `max_age`,  `gender_id`,  `computer_skills`,  `position_id`,  `have_car`,  `have_driving_license`  FROM `jobs` where `company_id`=$company_id order by id desc";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_id($id)
	{		
		
		$sql="SELECT `id`, `company_id`,  `business_field_id`,  `name`,  `job_type_id`,  `description`,  `date_from`,  `date_to`, `country_id`, `city_id`,  `location`,  `salary_from`,  `salary_to`,  `salary_currency_id`,  `education`,  `major`,  `grade_id`,  `min_experience`,  `max_experience`,  `min_age`,  `max_age`,  `gender_id`,  `computer_skills`,  `position_id`,  `have_car`,  `have_driving_license`  FROM `jobs` WHERE `id`=$id";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_max_id()
	{		
		
		$sql="SELECT max(`id`) FROM `jobs`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
	public function get_count()
	{		
		
		$sql="SELECT count(`id`) FROM `jobs`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
}
