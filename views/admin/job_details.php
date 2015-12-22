<?php
require_once __SITE_PATH.'/views/admin/includes/header.php';
$lang=$_SESSION['lang'];
require_once __SITE_PATH.'/lang/'.$lang.'/job.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/job.js';?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/css/calendar/tcal.css';?>" />
<script type="text/javascript" src="<?php echo site_url .'/public/js/calendar/tcal.js';?>"></script> 


<div id="apDiv23" align="center">
<br/><br/><br/>

<form action='<?php echo site_url;?>/applicant/apply' method="post">

<?php 

if(isset( $this->data['current_job']))
{
	$id=$this->data['current_job'][0];
	$company_id=$this->data['current_job'][1];  
	$business_field_id=$this->data['current_job'][2];  
	$name=$this->data['current_job'][3];  
	$job_type_id=$this->data['current_job'][4];  
	$description=$this->data['current_job'][5];  
	$date_from=$this->data['current_job'][6];  
	$date_to=$this->data['current_job'][7];  
	$country_id=$this->data['current_job'][8];
	$city_id=$this->data['current_job'][9]; 
	$location=$this->data['current_job'][10];  
	$salary_from=$this->data['current_job'][11];  
	$salary_to=$this->data['current_job'][12];  
	$salary_currency_id=$this->data['current_job'][13];  
	$education=$this->data['current_job'][14];  
	$major=$this->data['current_job'][15];  
	$grade_id=$this->data['current_job'][16];  
	$min_experience=$this->data['current_job'][17];  
	$max_experience=$this->data['current_job'][18];  
	$min_age=$this->data['current_job'][19];  
	$max_age=$this->data['current_job'][20];  
	$gender_id=$this->data['current_job'][21];  
	$computer_skills=$this->data['current_job'][22];  
	$position_id=$this->data['current_job'][23];  
	$have_car=$this->data['current_job'][24];  
	$have_driving_license=$this->data['current_job'][25];
}
else
{
	$id=0;
	$company_id='';  
	$business_field_id='';  
	$name='';  
	$job_type_id='';  
	$description='';  
	$date_from='';  
	$date_to='';  
	$country_id='';
	$city_id=''; 
	$location='';  
	$salary_from='';  
	$salary_to='';  
	$salary_currency_id='';  
	$education='';  
	$major='';  
	$grade_id='';  
	$min_experience='';  
	$max_experience='';  
	$min_age='';  
	$max_age='';  
	$gender_id='';  
	$computer_skills='';  
	$position_id='';  
	$have_car='';  
	$have_driving_license='';
	
}
?>

<table>
  <tbody>
  <tr>
    <td></td>
    <td> <input type="hidden"  id="hdn_id" name="hdn_id" value="<?php echo $id; ?>" ></input> </td>
  </tr>

   <tr>
    <td> <?php echo $name_lang; ?> <font color="red">*</font></td>
    <td> <?php echo $name; ?> </td>
  </tr>
  
  <tr>
    <td> <?php echo $business_field_id_lang; ?> <font color="red">*</font> </td>
    <td>  
    <?php 
    $business_fields=$this->data['business_fields'];
    foreach($business_fields as $business_field)
    {
    	$business_field_id_here=$business_field[0];
    	
    	if($lang=='ar')
    	{
    		$business_field_name=$business_field[2];
    	}
    	else
    	{
    		$business_field_name=$business_field[1];
    	}
    	
    	$selected="";
    	if($business_field_id==$business_field_id_here)
    	{
    		echo $business_field_name ;
    	}
    	
    }
    ?>
    </td>
  </tr>
  
    <tr>
    <td> <?php echo $job_type_lang; ?>  </td>
    <td>  
    <?php 
    $job_types=$this->data['job_types'];
    foreach($job_types as $job_type)
    {
    	$job_type_id_here=$job_type[0];
    	
    	if($lang=='ar')
    	{
    		$job_type_name=$job_type[2];
    	}
    	else
    	{
    		$job_type_name=$job_type[1];
    	}
    	
    	$selected="";
    	if($job_type_id==$job_type_id_here)
    			{
    				echo $job_type_name;
    			}
    	
    }
    ?>

   </td>
  </tr>
  
  <tr>
    <td> <?php echo $description_lang; ?>  </td>
    <td> <?php echo $description; ?></td>
  </tr>
 
   <tr>
    <td> <?php echo $date_from_lang; ?> </td>
    <td> <?php echo $date_from; ?> 
    <?php echo $date_to_lang; ?>  
    <?php echo $date_to; ?></td>
   </tr>
 
 <tr>
    <td> <?php echo $country_lang; ?>  </td>
    <td>  
    <?php 
    $countrys=$this->data['countrys'];
    foreach($countrys as $country)
    {
    	$country_id_here=$country[0];
    	
    	if($lang=='ar')
    	{
    		$country_name=$country[3];
    	}
    	else
    	{
    		$country_name=$country[2];
    	}
    	
    	if($country_id==$country_id_here)
    			{
    				echo $country_name;
    			}
    }
    ?>
  </td>
  </tr>
 
 
 <tr>
    <td> <?php echo $location_lang; ?>  </td>
    <td> <?php echo $location; ?> </td>
  </tr>
  
  <tr>
   <td> <?php echo $salary_from_lang; ?></td>
   <td> 
   <?php echo $salary_from; ?>  <?php echo $salary_to_lang; ?> 
   <?php echo $salary_to; ?>
   
    
    &nbsp; 
    <?php 
    $salary_currencys=$this->data['currencys'];
    foreach($salary_currencys as $salary_currency)
    {
    	$salary_currency_id_here=$salary_currency[0];
    	
    	if($lang=='ar')
    	{
    		$salary_currency_name=$salary_currency[3];
    	}
    	else
    	{
    		$salary_currency_name=$salary_currency[1];
    	}
    	
    	$selected="";
    	if($salary_currency_id==$salary_currency_id_here)
    			{
    				echo $salary_currency_name;
    			}
    }
    ?>
    </td>
  </tr>

  <tr>
    <td> <?php echo $education_lang; ?>  </td>
    <td> <?php echo $education; ?> </td>
  </tr>
  
  <tr>
    <td> <?php echo $major_lang; ?>  </td>
    <td> <?php echo $major; ?> </td>
  </tr>
  
  <tr>
    <td> <?php echo $grade_lang; ?>  </td>
    <td> 
    <?php 
    $grades=$this->data['grades'];
    foreach($grades as $grade)
    {
    	$grade_id_here=$grade[0];
    	
    	if($lang=='ar')
    	{
    		$grade_name=$grade[2];
    	}
    	else
    	{
    		$grade_name=$grade[1];
    	}
    	
    	$selected="";
    	if($grade_id==$grade_id_here)
    			{
    				echo $grade_name;
    			}
    }
    ?>
   </td>
  </tr>
  
  
  
  <tr>
    <td> <?php echo $min_experience_lang; ?></td>
    <td> <?php echo $min_experience; ?> </td>
  </tr>
  <tr>
    <td> <?php echo $max_experience_lang; ?></td>
    <td> <?php echo $max_experience; ?> </td>
  </tr>
  <tr>
    <td> <?php echo $min_age_lang; ?></td>
    <td> <?php echo $min_age; ?> </td>
  </tr>
  <tr>
    <td> <?php echo $max_age_lang; ?></td>
    <td> <?php echo $max_age; ?> </td>
  </tr>
  
   <tr>
    <td> <?php echo $gender_lang; ?></td>
    <td> 
    <?php 
    $genders=$this->data['genders'];
    foreach($genders as $gender)
    {
    	$gender_id_here=$gender[0];
    	
    	if($lang=='ar')
    	{
    		$gender_name=$gender[2];
    	}
    	else
    	{
    		$gender_name=$gender[1];
    	}
    	if($gender_id_here==0)
    	{
    		//continue;
    	}
    	$selected="";
    	if($gender_id==$gender_id_here)
    			{
    				echo $gender_name;

    			}
    }
    ?>
    
    </td>
  </tr>
  
  <tr>
    <td> <?php echo $computer_skills_lang; ?>  </td>
    <td> <?php echo $computer_skills; ?> </td>
  </tr>
  
    <tr>
    <td> <?php echo $position_lang; ?>  </td>
    <td> 
    <?php 
    $positions=$this->data['positions'];
    foreach($positions as $position)
    {
    	$position_id_here=$position[0];
    	
    	if($lang=='ar')
    	{
    		$position_name=$position[2];
    	}
    	else
    	{
    		$position_name=$position[1];
    	}
    	
    	$selected="";
    	if($position_id==$position_id_here)
    			{
    				echo $position_name;

    			}
    }
    ?>
     </td>
  </tr>
  
  <tr>
    <td> 
    <?php 
    if($have_car==1)
    echo $have_car_lang;
    ?>
    </td>
    <td> 
   </td>
  </tr>
  <tr>
  <td> 
    <?php 
    if($have_driving_license==1)
    echo $have_driving_license_lang;
    ?>
    </td>
    <td> 
   </td>
    
  </tr>
  
  
</tbody>
</table>

</form>
</div>

<?php 
require_once __SITE_PATH.'/views/admin/includes/footer.php';
?>