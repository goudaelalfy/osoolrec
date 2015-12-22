<?php
require_once __SITE_PATH.'/views/includes/header.php';
$lang=$_SESSION['lang'];
require_once __SITE_PATH.'/lang/'.$lang.'/job.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/job.js';?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/css/table.css';?>" />
	
<div id="apDiv23" align="center">
<a href='<?php echo site_url;?>/job/add' ><?php echo $add_new_job_link;?></a>

<br>

<?php 

if(isset( $this->data['company_jobs']))
{
	$company_jobs=$this->data['company_jobs'];
	
	if(count($company_jobs)>0)
	{
		echo "
		<table id='hor-minimalist-b' summary='Most Favorite Movies' >
				<thead style='font-weight:bold'>
    			<tr>
				<td> $job_name_lang</td>
				<td> $start_date_lang</td>
				<td> $end_date_lang</td>
				<td> $edit_link_lang</td>
				<td> $delete_link_lang</td>
				</tr>
				</thead>
		";
		
	 	foreach($company_jobs as $company_job)
	    {
	    	$id=$company_job[0];
			$name=$company_job[3];    
			$date_from=$company_job[6];  
			$date_to=$company_job[7];
		
			echo 
			"
			<tr>
			<td>$name </td>
			<td>$date_from </td>
			<td>$date_to </td>
			<td><a href='".site_url."/job/edit/$id'>$edit_link_lang</a> </td>
			<td><a href='".site_url."/job/delete/$id' onclick='return confirm(\"Are You Want To Delete This Row?\");'>$delete_link_lang</a>  </td>
			</tr>
			";
	    }
	    
	    echo "</table>";
	}
	else
	{
		echo "There Is No Jobs For This Company";
	}
}
else
{
	echo "There Is No Jobs For This Company";
}
?>

</div>


<?php 
require_once __SITE_PATH.'/views/includes/footer.php';
?>