<?php
require_once __SITE_PATH.'/views/includes/header.php';
$lang=$_SESSION['lang'];
require_once __SITE_PATH.'/lang/'.$lang.'/company.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/company.js';?>"></script>



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
<form action='<?php echo site_url;?>/company/save' method="post">

<?php 

if(isset( $this->data['current_company']))
{
	$id=$this->data['current_company'][0];
	$username=$this->data['current_company'][1];  
	$password=$this->data['current_company'][2];  
	$name=$this->data['current_company'][3];  
	$company_type_id=$this->data['current_company'][4];  
	$business_field_id=$this->data['current_company'][5];  
	$business_description=$this->data['current_company'][6];  
	$country_id=$this->data['current_company'][7];  
	$city_id=$this->data['current_company'][8];  
	$region=$this->data['current_company'][9];  
	$address=$this->data['current_company'][10];  
	$zip_code=$this->data['current_company'][11];  
	$phone1=$this->data['current_company'][12];  
	$phone2=$this->data['current_company'][13];  
	$mobile=$this->data['current_company'][14];  
	$fax=$this->data['current_company'][15];  
	$email=$this->data['current_company'][16];  
	$website=$this->data['current_company'][17];  
	$contact_person_title_id=$this->data['current_company'][18];  
	$contact_person_name=$this->data['current_company'][19];  
	$year_established=$this->data['current_company'][20];  
	$no_of_employees=$this->data['current_company'][21];  
	$hear_about_us_from=$this->data['current_company'][22];
}
else
{
	$id=0;
	$username='';  
	$password='';  
	$name='';  
	$company_type_id='';  
	$business_field_id='';  
	$business_description='';  
	$country_id='';  
	$city_id='';  
	$region='';  
	$address='';  
	$zip_code='';  
	$phone1='';  
	$phone2='';  
	$mobile='';  
	$fax='';  
	$email='';  
	$website='';  
	$contact_person_title_id='';  
	$contact_person_name='';  
	$year_established='';  
	$no_of_employees='';  
	$hear_about_us_from='';
	
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
    <td> <input type="text" size="30" maxlength="30" id="txt_username" name="txt_username" value="<?php echo $username; ?>"> </td>
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
    <td> <?php echo $company_type_id_lang; ?> <font color="red">*</font> </td>
    <td>  <select id="cmb_company_type" name="cmb_company_type">
    <?php 
    $company_types=$this->data['company_types'];
    foreach($company_types as $company_type)
    {
    	$company_type_id_here=$company_type[0];
    	
    	if($lang=='ar')
    	{
    		$company_type_name=$company_type[2];
    	}
    	else
    	{
    		$company_type_name=$company_type[1];
    	}
    	
    	$selected="";
    	if($company_type_id==$company_type_id_here)
    			{
    				$selected="selected=selected";
    			}
    	echo "<option value='$company_type_id_here' $selected>$company_type_name</option>";
    }
    ?>
    </select> </td>
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
    <td> <?php echo $business_description_lang; ?>  </td>
    <td> <textarea rows="3" cols="40" id="txt_business_description" name="txt_business_description"><?php echo $business_description; ?></textarea> </td>
  </tr>
 
  <tr>
    <td> <?php echo $country_id_lang; ?>  </td>
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
    <td> <?php echo $zip_code_lang; ?>  </td>
    <td> <input type="text" size="10" maxlength="10" id="txt_zip_code" name="txt_zip_code" value="<?php echo $zip_code; ?>"> </td>
  </tr>
  
  
  <tr>
    <td> <?php echo $phone1_lang; ?> <font color="red">*</font> </td>
    <td> <input type="text" size="20" maxlength="20" id="txt_phone1" name="txt_phone1" value="<?php echo $phone1; ?>"> </td>
  </tr>
  <tr>
    <td> <?php echo $phone2_lang; ?>  </td>
    <td> <input type="text" size="20" maxlength="20" id="txt_phone2" name="txt_phone2" value="<?php echo $phone2; ?>"> </td>
  </tr>
  <tr>
    <td> <?php echo $mobile_lang; ?> <font color="red">*</font> </td>
    <td> <input type="text" size="20" maxlength="20" id="txt_mobile" name="txt_mobile" value="<?php echo $mobile; ?>"> </td>
  </tr>
  <tr>
    <td> <?php echo $fax_lang; ?>  </td>
    <td> <input type="text" size="20" maxlength="20" id="txt_fax" name="txt_fax" value="<?php echo $fax; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $email_lang; ?> <font color="red">*</font> </td>
    <td> <input type="text" size="40" maxlength="100" id="txt_email" name="txt_email" value="<?php echo $email; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $website_lang; ?> </td>
    <td> <input type="text" size="40" maxlength="100" id="txt_website" name="txt_website" value="<?php echo $website; ?>"> </td>
  </tr>
  
	<tr>
    <td> <?php echo $contact_person_name_lang; ?> <font color="red">*</font> </td>
    <td>  <select id="cmb_contact_person_tite" name="cmb_contact_person_tite">
    <?php 
    $titles=$this->data['titles'];
    foreach($titles as $title)
    {
    	$title_id_here=$title[0];
    	
    	if($lang=='ar')
    	{
    		$title_name=$title[2];
    	}
    	else
    	{
    		$title_name=$title[1];
    	}
    	
    	$selected="";
    	if($contact_person_title_id==$title_id_here)
    			{
    				$selected="selected=selected";
    			}
    	echo "<option value='$title_id_here' $selected>$title_name</option>";
    }
    ?>
    </select> 
    &nbsp;
    <input type="text" size="29" maxlength="100" id="txt_contact_person_name" name="txt_contact_person_name" value="<?php echo $contact_person_name; ?>">
    </td>
  </tr>

  <tr>
    <td> <?php echo $year_established_lang; ?> </td>
    <td> <input type="text" size="15" maxlength="10" id="txt_year_established" name="txt_year_established" value="<?php echo $year_established; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $no_of_employees_lang; ?> </td>
    <td> <input type="text" size="10" maxlength="10" id="txt_no_of_employees" name="txt_no_of_employees" value="<?php echo $no_of_employees; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $hear_about_us_from_lang; ?> </td>
    <td> <input type="text" size="50" maxlength="100" id="txt_hear_about_us_from" name="txt_hear_about_us_from" value="<?php echo $hear_about_us_from; ?>"> </td>
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