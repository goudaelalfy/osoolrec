<?php 
$lang=$_SESSION['lang'];
require_once __SITE_PATH.'/lang/'.$lang.'/admin.php';
require_once __SITE_PATH.'/lang/'.$lang.'/header.php';
require_once __SITE_PATH.'/lang/'.$lang.'/applicant.php';
require_once __SITE_PATH.'/lang/'.$lang.'/company.php';
require_once __SITE_PATH.'/lang/'.$lang.'/job.php';

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML 
<?php
if($lang=='ar')
echo "dir='rtl'";
?>
>
<HEAD>
<TITLE><?php echo $website_title_lang; ?></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/css/admin/style.css';?>" />
<script type="text/javascript" src="<?php echo site_url .'/public/js/jquery-1.7.1.min.js';?>"></script>


<!-- Menu -->
<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/superfish_menu/';?>css/superfish.css" media="screen">


<script type="text/javascript" src="<?php echo site_url .'/public/superfish_menu/';?>js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo site_url .'/public/superfish_menu/';?>js/superfish.js"></script>
<script type="text/javascript">

		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});

</script>


</HEAD>

<BODY>

<div class="div_container">

<div>

<!-- By Gouda -->
<?php 
if($_SESSION['lang']=='ar')
{
?>
<style type="text/css">
.sf-menu li {
	float:			right;
	position:		relative;
}
</style>
<?php 
}
?>
<ul class="sf-menu">
			<!-- 
			<li>
				<a href="#a"><?php echo $companies_lang;?></a>
				<ul>
					<li>
						<a href="#aa"><?php echo $all_companies_lang;?></a>
					</li>
					<li>
						<a href="#aa"><?php echo $companies_jobs_lang;?></a>
					</li>
				</ul>
			</li>
			 -->
			
			<li>
				<a href="#a"><?php echo $jobs_lang;?></a>
				<ul>
					<li>
						<a href="<?php echo site_url;?>/job/admin_add"><?php echo $add_new_job_link;?></a>
					</li>
					<li>
						<a href="<?php echo site_url;?>/job/view_admin_jobs"><?php echo $my_jobs_lang;?></a>
					</li>
				</ul>
			</li>
			
			<li>
				<a href='<?php echo site_url;?>/applicant/admin_search/get'><?php echo $applicanties_lang;?></a>
			</li>
			
			<li>
				<a href="#"><?php echo $search_lang;?></a>
				<ul>
					<li>
						<a href="<?php echo site_url;?>/job/admin_search"><?php echo $find_jobs_lang;?></a>
					</li>
					<li>
						<a href="<?php echo site_url;?>/applicant/admin_search"><?php echo $find_applicants_lang;?></a>
					</li>
				</ul>
			</li>
			<li>
				<a href='<?php echo site_url;?>/osool_about_us/edit/1'><?php echo $about_us_lang;?></a>
			</li>
			<li>
				<a href='<?php echo site_url;?>/osool_contact_us/edit/1'><?php echo $contact_us_lang;?></a>
			</li>
			
			<li>
				<?php
				if($_SESSION['lang']=='ar')
				{?> 
				 <a href='<?php echo site_url;?>/common/language/en' ><?php echo $english_lang; ?> </a>
				<?php 
				}
				else
				{
				?>
				<a href='<?php echo site_url;?>/common/language/ar' ><?php echo $arabic_lang; ?> </a>
				<?php 
				}
				?>
				</a>
			</li>
				
		</ul>
</div>	
<br></br><br></br>
		
<div align="center">

