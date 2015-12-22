<?php

class companyModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function save($id,  $username,  $password,  $name,  $company_type_id,  $business_field_id,  $business_description,  $country_id,  $city_id,  $region,  $address,  $zip_code,  $phone1,  $phone2,  $mobile,  $fax,  $email,  $website,  $contact_person_title_id,  $contact_person_name,  $year_established,  $no_of_employees,  $hear_about_us_from, $activation_code)
	{
		if($id==0)
		{
			$sql="INSERT INTO `company` (`username`,  `password`,  `name`,  `company_type_id`,  `business_field_id`,  `business_description`,  `country_id`,  `city_id`,  `region`,  `address`,  `zip_code`,  `phone1`,  `phone2`,  `mobile`,  `fax`,  `email`,  `website`,  `contact_person_title_id`,  `contact_person_name`,  `year_established`,  `no_of_employees`,  `hear_about_us_from`,  `activation_code`)
			 VALUES ('$username',  '$password',  '$name',  '$company_type_id',  '$business_field_id',  '$business_description',  '$country_id',  '$city_id',  '$region',  '$address',  '$zip_code',  '$phone1',  '$phone2',  '$mobile',  '$fax',  '$email',  '$website',  '$contact_person_title_id',  '$contact_person_name',  '$year_established',  '$no_of_employees',  '$hear_about_us_from', '$activation_code')";
		
		}
		else
		{
			$sql="UPDATE `company` SET `username`='$username',  `password`='$password',  `name`='$name',  `company_type_id`='$company_type_id',  `business_field_id`='$business_field_id',  `business_description`='$business_description',  `country_id`='$country_id',  `city_id`='$city_id',  `region`='$region',  `address`='$address',  `zip_code`='$zip_code',  `phone1`='$phone1',  `phone2`='$phone2',  `mobile`='$mobile',  `fax`='$fax',  `email`='$email',  `website`='$website',  `contact_person_title_id`='$contact_person_title_id',  `contact_person_name`='$contact_person_name',  `year_established`='$year_established',  `no_of_employees`='$no_of_employees',  `hear_about_us_from`='$hear_about_us_from' WHERE `id`=$id";
		}
		
		$this->db->query($sql);
	}
	
	
	public function activate($activation_code)
	{
		$sql="UPDATE `company` SET `active`=1 WHERE `activation_code`='$activation_code'";
		$this->db->query($sql);
	}
	
	public function delete($id)
	{
		$sql="DELETE FROM `company` WHERE `id`=$id";
		$this->db->query($sql);
	}
	
	public function get_all()
	{		
		
		$sql="SELECT `id`,  `username`,  `password`,  `name`,  `company_type_id`,  `business_field_id`,  `business_description`,  `country_id`,  `city_id`,  `region`,  `address`,  `zip_code`,  `phone1`,  `phone2`,  `mobile`,  `fax`,  `email`,  `website`,  `contact_person_title_id`,  `contact_person_name`,  `year_established`,  `no_of_employees`,  `hear_about_us_from`  FROM `company`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_id($id)
	{		
		
		$sql="SELECT `id`,  `username`,  `password`,  `name`,  `company_type_id`,  `business_field_id`,  `business_description`,  `country_id`,  `city_id`,  `region`,  `address`,  `zip_code`,  `phone1`,  `phone2`,  `mobile`,  `fax`,  `email`,  `website`,  `contact_person_title_id`,  `contact_person_name`,  `year_established`,  `no_of_employees`,  `hear_about_us_from`  FROM `company` WHERE `id`=$id";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_by_username_and_password($username, $password)
	{		
		
		$sql="SELECT `id`,  `username`,  `password`,  `name`,  `company_type_id`,  `business_field_id`,  `business_description`,  `country_id`,  `city_id`,  `region`,  `address`,  `zip_code`,  `phone1`,  `phone2`,  `mobile`,  `fax`,  `email`,  `website`,  `contact_person_title_id`,  `contact_person_name`,  `year_established`,  `no_of_employees`,  `hear_about_us_from`  FROM `company` WHERE `username`='$username' and `password`='$password' and active=1";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_by_username($username)
	{		
		
		$sql="SELECT `id`,  `username`,  `password`,  `name`,  `company_type_id`,  `business_field_id`,  `business_description`,  `country_id`,  `city_id`,  `region`,  `address`,  `zip_code`,  `phone1`,  `phone2`,  `mobile`,  `fax`,  `email`,  `website`,  `contact_person_title_id`,  `contact_person_name`,  `year_established`,  `no_of_employees`,  `hear_about_us_from`  FROM `company` WHERE `username`='$username' ";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_by_email($email)
	{		
		
		$sql="SELECT `id`,  `username`,  `password`,  `name`,  `company_type_id`,  `business_field_id`,  `business_description`,  `country_id`,  `city_id`,  `region`,  `address`,  `zip_code`,  `phone1`,  `phone2`,  `mobile`,  `fax`,  `email`,  `website`,  `contact_person_title_id`,  `contact_person_name`,  `year_established`,  `no_of_employees`,  `hear_about_us_from`  FROM `company`  WHERE `email`='$email'";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_max_id()
	{		
		
		$sql="SELECT max(`id`) FROM `company`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
	public function get_count()
	{		
		
		$sql="SELECT count(`id`) FROM `company`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
}
