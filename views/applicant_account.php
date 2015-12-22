<?php
require_once __SITE_PATH.'/views/includes/header.php';

$lang=$_SESSION['lang'];
require_once __SITE_PATH.'/lang/'.$lang.'/applicant.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/applicant.js';?>"></script>
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


<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />
<SCRIPT type="text/javascript">
<!--
/*
Credits: Bit Repository
Source: http://www.bitrepository.com/web-programming/ajax/username-checker.html 
*/

pic1 = new Image(16, 16); 
pic1.src = "<?php echo site_url .'/public/username_availability/loader.gif';?>";

$(document).ready(function(){

$("#txt_username").change(function() { 

var usr = $("#txt_username").val();

if(usr.length >= 4)
{
$("#status").html('<img src="<?php echo site_url .'/public/username_availability/loader.gif';?>" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "check_username_availability",  
    data: "txt_username="+ usr,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#txt_username").removeClass('object_error'); // if necessary
		$("#txt_username").addClass("object_ok");
		$(this).html('&nbsp;<img src="<?php echo site_url .'/public/username_availability/tick.gif';?>" align="absmiddle">');
	}  
	else  
	{  
		$("#txt_username").removeClass('object_ok'); // if necessary
		$("#txt_username").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
	$("#txt_username").removeClass('object_ok'); // if necessary
	$("#txt_username").addClass("object_error");
	}

});

});

//-->
</SCRIPT>


	
<div id="apDiv23" align="center" class="div_content">
<form action='<?php echo site_url;?>/applicant/save' method="post" enctype='multipart/form-data'>

<?php 

if(isset( $this->data['current_applicant']))
{
	$id=$this->data['current_applicant'][0];
	$username=$this->data['current_applicant'][1];  
	$password=$this->data['current_applicant'][2];  
	$name=$this->data['current_applicant'][3];  
	$gender_id=$this->data['current_applicant'][4];  
	$birthdate=$this->data['current_applicant'][5];  
	$nationality_id=$this->data['current_applicant'][6];  
	$country_id=$this->data['current_applicant'][7];  
	$city_id=$this->data['current_applicant'][8];  
	$region=$this->data['current_applicant'][9];  
	$address=$this->data['current_applicant'][10];  
	$phone=$this->data['current_applicant'][11];  
	$mobile=$this->data['current_applicant'][12];  
	$email=$this->data['current_applicant'][13];  
	$marital_status_id=$this->data['current_applicant'][14];  
	$military_status_id=$this->data['current_applicant'][15];  
	$have_car=$this->data['current_applicant'][16];  
	$have_driving_license=$this->data['current_applicant'][17];  
	$university=$this->data['current_applicant'][18];  
	$faculty=$this->data['current_applicant'][19];  
	$major=$this->data['current_applicant'][20];  
	$grade_id=$this->data['current_applicant'][21];  
	$career_objective=$this->data['current_applicant'][22];  
	$position_id=$this->data['current_applicant'][23];  
	$job_type_id=$this->data['current_applicant'][24];  
	$business_field_id=$this->data['current_applicant'][25];  
	$minimum_salary=$this->data['current_applicant'][26];  
	$salary_currency_id=$this->data['current_applicant'][27];  
	$cv_name=$this->data['current_applicant'][28];
}
else
{
	$id=0;
	$username='';  
	$password='';  
	$name='';  
	$gender_id='';  
	$birthdate='';  
	$nationality_id='';  
	$country_id='';  
	$city_id='';  
	$region='';  
	$address='';  
	$phone='';  
	$mobile='';  
	$email='';  
	$marital_status_id='';  
	$military_status_id='';  
	$have_car='';  
	$have_driving_license='';  
	$university='';  
	$faculty='';  
	$major='';  
	$grade_id='';  
	$career_objective='';  
	$position_id='';  
	$job_type_id='';  
	$business_field_id='';  
	$minimum_salary='';  
	$salary_currency_id='';  
	$cv_name='';
	
}
?>

<table>
  <tbody>
  <tr>
    <td></td>
    <td> <input type="hidden"  id="hdn_id" name="hdn_id" value="<?php echo $id; ?>" ></input> </td>
  </tr>
  
  <tr>
    <td> <?php echo $username_lang; ?> <font color="red">*</font></td>
    <td> <input type="text" size="30" maxlength="30" id="txt_username" name="txt_username" value="<?php echo $username; ?>"  onblur="return check_username();"> </td>
  
    <td>
  <div id="status"></div>
   </td>
  
  </tr>

  <tr>
    <td> <?php echo $password_lang; ?> <font color="red">*</font></td>
    <td> <input type="password" size="30" maxlength="30" id="txt_password" name="txt_password" value="<?php echo $password; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $confirm_password_lang; ?> <font color="red">*</font></td>
    <td> <input type="password" size="30" maxlength="30" id="txt_password_confirm" name="txt_password_confirm" value="<?php echo $password; ?>"> </td>
  </tr>
    <tr>
    <td> <?php echo $name_lang; ?> <font color="red">*</font></td>
    <td> <input type="text" size="50" maxlength="100" id="txt_name" name="txt_name" value="<?php echo $name; ?>"> </td>
  </tr>
  
   <tr>
    <td> <?php echo $gender_lang; ?> <font color="red">*</font> </td>
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
    		continue;
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
    <td> <?php echo $birthdate_lang; ?>  <font color="red">*</font></td>
    <td> <input type="text" id="txt_birthdate" name="txt_birthdate" readonly="readonly" class="tcal" value="<?php echo $birthdate; ?>" /> </td>
  </tr>
 
 <tr>
    <td> <?php echo $nationality_lang; ?>  </td>
    <td>  <select id="cmb_nationality" name="cmb_nationality">
    <?php 
    $nationalitys=$this->data['countrys'];
    foreach($nationalitys as $nationality)
    {
    	$nationality_id_here=$nationality[0];
    	
    	if($lang=='ar')
    	{
    		$nationality_name=$nationality[3];
    	}
    	else
    	{
    		$nationality_name=$nationality[2];
    	}
    	
    	$selected="";
    	if($nationality_id==$nationality_id_here)
    			{
    				$selected="selected=selected";
    			}
    	echo "<option value='$nationality_id_here' $selected>$nationality_name</option>";
    }
    ?>
    </select> </td>
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
    <td> <?php echo $region_lang; ?>  </td>
    <td> <input type="text" size="20" maxlength="50" id="txt_region" name="txt_region" value="<?php echo $region; ?>"> </td>
  </tr>
 

  <tr>
    <td> <?php echo $address_lang; ?>  </td>
    <td> <textarea rows="3" cols="40" id="txt_address" name="txt_address"><?php echo $address; ?></textarea> </td>
  </tr>

  <tr>
    <td> <?php echo $phone_lang; ?>   </td>
    <td> <input type="text" size="20" maxlength="20" id="txt_phone" name="txt_phone" value="<?php echo $phone; ?>"> </td>
  </tr>
  <tr>
    <td> <?php echo $mobile_lang; ?> <font color="red">*</font> </td>
    <td> <input type="text" size="20" maxlength="20" id="txt_mobile" name="txt_mobile" value="<?php echo $mobile; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $email_address_lang; ?> <font color="red">*</font> </td>
    <td> <input type="text" size="40" maxlength="100" id="txt_email" name="txt_email" value="<?php echo $email; ?>"> </td>
  </tr>
  
	<tr>
    <td> <?php echo $marital_status_lang; ?>  </td>
    <td>  <select id="cmb_marital_status" name="cmb_marital_status">
    <?php 
    $marital_statuss=$this->data['marital_statuss'];
    foreach($marital_statuss as $marital_status)
    {
    	$marital_status_id_here=$marital_status[0];
    	
    	if($lang=='ar')
    	{
    		$marital_status_name=$marital_status[2];
    	}
    	else
    	{
    		$marital_status_name=$marital_status[1];
    	}
    	
    	$selected="";
    	if($marital_status_id==$marital_status_id_here)
    			{
    				$selected="selected=selected";
    			}
    	echo "<option value='$marital_status_id_here' $selected>$marital_status_name</option>";
    }
    ?>
    </select> 
   </td>
  </tr>

	<tr>
    <td> <?php echo $military_status_lang; ?>  </td>
    <td>  <select id="cmb_military_status" name="cmb_military_status">
    <?php 
    $military_statuss=$this->data['military_statuss'];
    foreach($military_statuss as $military_status)
    {
    	$military_status_id_here=$military_status[0];
    	
    	if($lang=='ar')
    	{
    		$military_status_name=$military_status[2];
    	}
    	else
    	{
    		$military_status_name=$military_status[1];
    	}
    	
    	$selected="";
    	if($military_status_id==$military_status_id_here)
    			{
    				$selected="selected=selected";
    			}
    	echo "<option value='$military_status_id_here' $selected>$military_status_name</option>";
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
    <td> <?php echo $university_lang; ?> </td>
    <td> <input type="text" size="30" maxlength="50" id="txt_university" name="txt_university" value="<?php echo $university; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $faculty_lang; ?> </td>
    <td> <input type="text" size="30" maxlength="50" id="txt_faculty" name="txt_faculty" value="<?php echo $faculty; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $major_lang; ?> </td>
    <td> <input type="text" size="30" maxlength="50" id="txt_major" name="txt_major" value="<?php echo $major; ?>"> </td>
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
    <td> <?php echo $career_objective_lang; ?>  </td>
    <td> <textarea rows="3" cols="40" id="txt_career_objective" name="txt_career_objective"><?php echo $career_objective; ?></textarea> </td>
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
    <td> <?php echo $business_field_lang; ?> <font color="red">*</font> </td>
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
    <td> <?php echo $minimum_salary_lang; ?>  </td>
  
    <td>
    <input type="text" size="10" maxlength="50" id="txt_minimum_salary" name="txt_minimum_salary" value="<?php echo $minimum_salary; ?>">
    
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
    <td> <?php echo $your_cv_lang; ?>  </td>
    <td> <input type='file' name='flcv' /></td>
  </tr>
  
  <tr>
    <td> <input type="submit" name="smt_save" id="smt_save" value="<?php echo $submit_lang; ?>" onclick="return displaymessage('<?php echo $lang;?>')"/> </td>
    <td><!--   <input type="reset"> --> </td>
  </tr>
  
</tbody>
</table>

</form>
</div>


<?php 
require_once __SITE_PATH.'/views/includes/footer.php';
?>