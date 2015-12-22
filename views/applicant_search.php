<?php
require_once __SITE_PATH.'/views/includes/header.php';
$lang=$_SESSION['lang'];
require_once __SITE_PATH.'/lang/'.$lang.'/applicant.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/applicant.js';?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/css/table.css';?>" />


<div id="apDiv23" align="center">
<br/>

<?php 
if(isset( $this->data['search_applicants']))
{

	$search_applicants=$this->data['search_applicants'];
	
	if(count($search_applicants)>0)
	{
		echo "
		<table id='hor-minimalist-b' summary='Most Favorite Movies' >
				<thead style='font-weight:bold'>
    			<tr>
				<td> $name_lang</td>
				<td> $mobile_lang</td>
				<td> $business_field_lang</td>
				<td> $view_link_lang</td>
				</tr>
				</thead>
		";
		
	 	foreach($search_applicants as $search_applicant)
	    {
	    	$id=$search_applicant['id'];
	    	$name=$search_applicant['name'];
			$mobile=$search_applicant['mobile'];  
			$business_field=$search_applicant['business_field_id'];  
		
		    if($lang=='ar')
	    	{
	    		$business_field=$search_applicant['arabic_business_field'];
	    	}
	    	else
	    	{
	    		$business_field=$search_applicant['english_business_field'];
	    	}
			
			echo 
			"
			<tr>
			<td>$name </td>
			<td>$mobile </td>
			<td>$business_field </td>
			<td><a target='_blank' href='".site_url."/applicant/details/$id'>$view_link_lang</a> </td>
			</tr>
			";
	    }
	    
	    echo "</table>";
	}
	else
	{
		echo "There Is No applicants With This Search.";
	}
	
}
else
{
?>
<form action='<?php echo site_url;?>/applicant/search' method="post">

<table>
  <tbody>
 
   <tr>
    <td> <?php echo $keyword_lang; ?></td>
    <td> <input type="text" size="50" maxlength="100" id="txt_text" name="txt_text" > </td>
  </tr>
  
  <tr>
    <td> <?php echo $business_field_lang; ?>  </td>
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
    	
    
    	echo "<option value='$business_field_id_here' >$business_field_name</option>";
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
    	

    	echo "<option value='$job_type_id_here' >$job_type_name</option>";
    }
    ?>
    </select> 
   </td>
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
    	

    	echo "<option value='$country_id_here' >$country_name</option>";
    }
    ?>
    </select> </td>
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
    	
    	echo "<option value='$gender_id_here' >$gender_name</option>";
    }
    ?>
    </select> </td>
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
    	
    	
    	echo "<option value='$position_id_here' >$position_name</option>";
    }
    ?>
    </select> 
   </td>
  </tr>
  

  
  <tr>
    <td> <input type="submit" name="smt_search" id="smt_search" value="<?php echo $smt_search_lang; ?>" /> </td>
    <td> <!-- <input type="reset"> --> </td>
  </tr>
  
</tbody>
</table>

</form>
<?php 
}
?>


</div>

<?php 
require_once __SITE_PATH.'/views/includes/footer.php';
?>