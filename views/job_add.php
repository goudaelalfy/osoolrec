<?php
require_once __SITE_PATH.'/views/includes/header.php';
$lang=$_SESSION['lang'];
require_once __SITE_PATH.'/lang/'.$lang.'/job.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/job.js';?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/css/calendar/tcal.css';?>" />
<script type="text/javascript" src="<?php echo site_url .'/public/js/calendar/tcal.js';?>"></script> 

<script type="text/javascript">
 
$(document).ready(function(){

     $("#cmb_country").change(function () {
		
		$.ajax({  
    	type: "POST",  
    	url: "<?php echo  site_url; ?>/common/getCitiesByCountry/"+this.value,    
    	success: function(msg){  
   		
   		$("#cities").ajaxComplete(function(event, request, settings){ 
		$(this).html(msg);
		});

 		} 
   
  		});


     });
 
     
  });
</script>


<div id="apDiv23" align="center">
<br/><br/><br/>
<form action='<?php echo site_url;?>/job/save' method="post">

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
    <td> <input type="text" size="50" maxlength="100" id="txt_name" name="txt_name" value="<?php echo $name; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $business_field_id_lang; ?> <font color="red">*</font> </td>
    <td>  <select id="cmb_business_field" name="cmb_business_field">
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
    				$selected="selected=selected";
    			}
    	echo "<option value='$business_field_id_here' $selected>$business_field_name</option>";
    }
    ?>
    </select> </td>
  </tr>
  
    <tr>
    <td> <?php echo $job_type_lang; ?>  </td>
    <td>  <select id="cmb_job_type" name="cmb_job_type">
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
    				$selected="selected=selected";
    			}
    	echo "<option value='$job_type_id_here' $selected>$job_type_name</option>";
    }
    ?>
    </select> 
   </td>
  </tr>
  
  <tr>
    <td> <?php echo $description_lang; ?>  </td>
    <td> <textarea rows="3" cols="40" id="txt_description" name="txt_description"><?php echo $description; ?></textarea> </td>
  </tr>
 
   <tr>
    <td> <?php echo $date_from_lang; ?>  <font color="red">*</font></td>
    <td> <input type="text" id="txt_date_from" name="txt_date_from" readonly="readonly" class="tcal" value="<?php echo $date_from; ?>" /> 
    <?php echo $date_to_lang; ?>  <font color="red">*</font>
    <input type="text" id="txt_date_to" name="txt_date_to" readonly="readonly" class="tcal" value="<?php echo $date_to; ?>" /> </td>
   </tr>
 
 <tr>
    <td> <?php echo $country_lang; ?>  </td>
    <td>  <select id="cmb_country" name="cmb_country">
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
    	
    	$selected="";
    	if($country_id==$country_id_here)
    			{
    				$selected="selected=selected";
    			}
    	echo "<option value='$country_id_here' $selected>$country_name</option>";
    }
    ?>
    </select> </td>
  </tr>
 
 <tr>
    <td> <?php echo $city_lang; ?>  </td>
    <td> 
    <div id='cities' >

	<select id="cmb_city" name="cmb_city">
    <?php 
    $cities=$this->data['cities'];
    foreach($cities as $city)
    {
    	$city_id_here=$city[0];
    	
    	if($lang=='ar')
    	{
    		$city_name=$city[2];
    	}
    	else
    	{
    		$city_name=$city[1];
    	}
    	
    	$selected="";
    	if($city_id==$city_id_here)
    			{
    				$selected="selected=selected";
    			}
    	echo "<option value='$city_id_here' $selected>$city_name</option>";
    }
    ?>
    </select> 
	</div>
    </td>
  </tr>
 
 <tr>
    <td> <?php echo $location_lang; ?>  </td>
    <td> <input type="text" size="20" maxlength="50" id="txt_location" name="txt_location" value="<?php echo $location; ?>"> </td>
  </tr>
  
  <tr>
   <td> <?php echo $salary_from_lang; ?></td>
   <td> 
   <input type="text" size="10" maxlength="30" id="txt_salary_from" name="txt_salary_from" value="<?php echo $salary_from; ?>">  <?php echo $salary_to_lang; ?> 
   <input type="text" size="10" maxlength="30" id="txt_salary_to" name="txt_salary_to" value="<?php echo $salary_to; ?>"> 
   
    
    &nbsp; <select id="cmb_salary_currency" name="cmb_salary_currency">
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
    				$selected="selected=selected";
    			}
    	echo "<option value='$salary_currency_id_here' $selected>$salary_currency_name</option>";
    }
    ?>
    </select>
    </td>
  </tr>

  <tr>
    <td> <?php echo $education_lang; ?>  </td>
    <td> <input type="text" size="50" maxlength="10" id="txt_education" name="txt_education" value="<?php echo $education; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $major_lang; ?>  </td>
    <td> <input type="text" size="50" maxlength="10" id="txt_major" name="txt_major" value="<?php echo $major; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $grade_lang; ?>  </td>
    <td>  <select id="cmb_grade" name="cmb_grade">
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
    				$selected="selected=selected";
    			}
    	echo "<option value='$grade_id_here' $selected>$grade_name</option>";
    }
    ?>
    </select> 
   </td>
  </tr>
  
  
  
  <tr>
    <td> <?php echo $min_experience_lang; ?></td>
    <td> <input type="text" size="10" maxlength="11" id="txt_min_experience" name="txt_min_experience" value="<?php echo $min_experience; ?>"> </td>
  </tr>
  <tr>
    <td> <?php echo $max_experience_lang; ?></td>
    <td> <input type="text" size="10" maxlength="11" id="txt_max_experience" name="txt_max_experience" value="<?php echo $max_experience; ?>"> </td>
  </tr>
  <tr>
    <td> <?php echo $min_age_lang; ?></td>
    <td> <input type="text" size="10" maxlength="11" id="txt_min_age" name="txt_min_age" value="<?php echo $min_age; ?>"> </td>
  </tr>
  <tr>
    <td> <?php echo $max_age_lang; ?></td>
    <td> <input type="text" size="10" maxlength="11" id="txt_max_age" name="txt_max_age" value="<?php echo $max_age; ?>"> </td>
  </tr>
  
   <tr>
    <td> <?php echo $gender_lang; ?></td>
    <td>  <select id="cmb_gender" name="cmb_gender">
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
    				$selected="selected=selected";
    			}
    	echo "<option value='$gender_id_here' $selected>$gender_name</option>";
    }
    ?>
    </select> </td>
  </tr>
  
  <tr>
    <td> <?php echo $computer_skills_lang; ?>  </td>
    <td> <textarea rows="3" cols="40" id="txt_computer_skills" name="txt_computer_skills"><?php echo $computer_skills; ?></textarea> </td>
  </tr>
  
    <tr>
    <td> <?php echo $position_lang; ?>  </td>
    <td>  <select id="cmb_position" name="cmb_position">
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
    				$selected="selected=selected";
    			}
    	echo "<option value='$position_id_here' $selected>$position_name</option>";
    }
    ?>
    </select> 
   </td>
  </tr>
  
  <tr>
    <td> <?php echo $have_car_lang; ?> </td>
    <td> <input type='checkbox' id='chk_have_car' name='chk_have_car' 
    <?php 
    if($have_car==1)
    echo "checked='checked'";
    ?>
    
    /> </td>
  </tr>
  <tr>
    <td> <?php echo $have_driving_license_lang; ?> </td>
    <td> <input type='checkbox' id='chk_have_driving_license' name='chk_have_driving_license' 
    <?php 
    if($have_driving_license==1)
    echo "checked='checked'";
    ?>
    /> </td>
  </tr>
  
  <tr>
    <td> <input type="submit" name="smt_save" id="smt_save" value="<?php echo $submit_lang; ?>" onclick="return displaymessage('<?php echo $lang; ?>')"/> </td>
    <td> <!-- <input type="reset"> --> </td>
  </tr>
  
</tbody>
</table>

</form>
</div>

<?php 
require_once __SITE_PATH.'/views/includes/footer.php';
?>