<?php
require_once __SITE_PATH.'/views/admin/includes/header.php';
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
    <td> <?php echo $name_lang; ?> </td>
    <td><?php echo $name; ?> </td>
  </tr>
  
   <tr>
    <td> <?php echo $gender_lang; ?>  </td>
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
    		continue;
    	}
    	$selected="";
    	if($gender_id==$gender_id_here)
    	{
    				echo "$gender_name";
    	}
    	
    }
    ?>
 </td>
  </tr>
  
   <tr>
    <td> <?php echo $birthdate_lang; ?>  </td>
    <td><?php echo $birthdate; ?>"  </td>
  </tr>
 
 <tr>
    <td> <?php echo $nationality_lang; ?>  </td>
    <td>  
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
    		echo "$nationality_name";
    	}
    	
    }
    ?>
	</td>
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
    	
    	$selected="";
    	if($country_id==$country_id_here)
    	{
    	echo "$country_name";

    	}
    }
    ?>
     </td>
  </tr>
 
 <tr>
    <td> <?php echo $city_lang; ?>  </td>
    <td> 
    <div id='cities' >

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
    	echo "$city_name";

    			
    			}
    }
    ?>

	</div>
    </td>
  </tr>
  
  
  <tr>
    <td> <?php echo $region_lang; ?>  </td>
    <td> <?php echo $region; ?> </td>
  </tr>
 

  <tr>
    <td> <?php echo $address_lang; ?>  </td>
    <td> <?php echo $address; ?></td>
  </tr>

  <tr>
    <td> <?php echo $phone_lang; ?>   </td>
    <td><?php echo $phone; ?></td>
  </tr>
  <tr>
    <td> <?php echo $mobile_lang; ?>  </td>
    <td> <?php echo $mobile; ?></td>
  </tr>
  
  <tr>
    <td> <?php echo $email_address_lang; ?> </td>
    <td> <?php echo $email; ?></td>
  </tr>
  
	<tr>
    <td> <?php echo $marital_status_lang; ?>  </td>
    <td> 
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
    	echo "$marital_status_name";

    			}
    }
    ?>
   </td>
  </tr>

	<tr>
    <td> <?php echo $military_status_lang; ?>  </td>
    <td>  
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
    	echo "$military_status_name";

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
  
  <tr>
    <td> <?php echo $university_lang; ?> </td>
    <td><?php echo $university; ?> </td>
  </tr>
  
  <tr>
    <td> <?php echo $faculty_lang; ?> </td>
    <td> <?php echo $faculty; ?> </td>
  </tr>
  
  <tr>
    <td> <?php echo $major_lang; ?> </td>
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
    	echo "$grade_name";

    			}
    }
    ?>
   </td>
  </tr>
  
  <tr>
    <td> <?php echo $career_objective_lang; ?>  </td>
    <td> <?php echo $career_objective; ?> </td>
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
    	echo "$position_name";

    			}
    }
    ?>
    </select> 
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
    <td> <?php echo $business_field_lang; ?></td>
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
    	echo "$business_field_name";

    			}
    }
    ?>
     </td>
  </tr>
   
  
  <tr>
    <td> <?php echo $minimum_salary_lang; ?>  </td>
  
    <td>
    <?php echo $minimum_salary; ?>
    
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
    	echo "$salary_currency_name";

    			}
    }
    ?>
    </td>
  </tr>

	<tr>
    <td colspan="2"> <a target='_blank' href='<?php  echo site_url."/applicant/download_cv/$cv_name"; ?>'><?php echo $download_cv_lang; ?></a>  </td>
  	</tr>

</tbody>
</table>

</form>
</div>


<?php 
require_once __SITE_PATH.'/views/admin/includes/footer.php';
?>