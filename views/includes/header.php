<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
<?php
if($_SESSION['lang']=='ar')
echo "dir='rtl'";

$lang=$_SESSION['lang'];
?>
>
<?php  
require_once __SITE_PATH .'/lang/'.$_SESSION['lang'].'/header.php';
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $website_title_lang; ?></title>
<script type="text/javascript" src="<?php echo site_url .'/public/js/jquery-1.3.2.js';?>"></script>


<link type="text/css" media="screen" href="<?php echo site_url .'/public/design/';?>style/style.css" rel="stylesheet"/>
<script src="<?php echo site_url .'/public/design/';?>stmenu.js" type="text/javascript"></script>
<script src="<?php echo site_url .'/public/design/';?>Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="<?php echo site_url .'/public/design/';?>stlib.js" type="text/javascript"></script>


<style type="text/css">
#apDiv1 {
	position:absolute;
	width:900px;
	height:1200px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	width:579px;
	height:141px;
	z-index:1;
	left: 132px;
	top: 208px;
}
#apDiv3 {
	position:absolute;
	width:696px;
	height:130px;
	z-index:1;
	left: 203px;
	top: 5px;
}
#apDiv4 {
	position:absolute;
	width:154px;
	height:140px;
	z-index:2;
}
#apDiv5 {
	position:absolute;
	width:195px;
	height:261px;
	z-index:2;
	left: 1px;
	top: 144px;
}
#apDiv6 {
	position:absolute;
	width:191px;
	height:1022px;
	z-index:2;
	margin-left:13px;
	margin-right:13px;
	top: 151px;
	background-color: #FFE7D7;
}
#apDiv7 {
	position:absolute;
	width:699px;
	height:337px;
	z-index:3;
	left: 198px;
	top: 151px;
}
a:link {
	color: #000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #006;
}
a:hover {
	text-decoration: underline;
	color: #FFF;
}
a:active {
	text-decoration: none;
	font-size: 12px;
}
#apDiv8 {
	position:absolute;
	width:130px;
	height:18px;
	z-index:1;
	left: 21px;
	top: 78px;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
}
#apDiv {
	position:absolute;
	width:188px;
	height:21px;
	z-index:1;
	left: -1px;
	top: 28px;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
	background-color: #FF6600;
}
#apDiv9 {	position:absolute;
	width:130px;
	height:21px;
	z-index:1;
	left: 21px;
	top: 28px;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
	background-color: #FFFFFF;
}
#apDiv10 {
	position:absolute;
	width:187px;
	height:24px;
	z-index:2;
	left: 0px;
	top: 54px;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
	background-color: #FF6600;
}
#apDiv11 {
	position:absolute;
	width:188px;
	height:24px;
	z-index:3;
	left: 0px;
	top: 83px;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
	background-color: #FF6600;
}
#apDiv12 {
	position:absolute;
	width:188px;
	height:21px;
	z-index:4;
	top: 113px;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
	left: 0px;
	background-color: #FF6600;
}
#apDiv13 {
	position:absolute;
	width:187px;
	height:21px;
	z-index:5;
	left: 1px;
	top: 140px;
	text-align: center;
	font-weight: bold;
	font-size: 18px;
	background-color: #FF6600;
}
#apDiv14 {
	position:absolute;
	width:187px;
	height:22px;
	z-index:6;
	left: 0px;
	top: 167px;
	text-align: center;
	font-weight: bold;
	font-size: 18px;
	background-color: #FF6600;
}
#apDiv15 {
	border:solid #F60;
	position:absolute;
	width:654px;
	height:272px;
	z-index:3;
	left: 119px;
	top: 349px;
}
#apDiv16 {
	position:absolute;
	width:660px;
	height:52px;
	z-index:4;
	left: 130px;
	top: 265px;
}
#apDiv17 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:5;
	left: 2px;
	top: 345px;
}
#apDiv18 {
	position:absolute;
	width:188px;
	height:130px;
	z-index:7;
	left: 0px;
	top: 241px;
	font-size: 14px;
	background-color: #333333;
	color: #FFF;
	text-align: center;
}
#apDiv19 {
	position:absolute;
	width:194px;
	height:145px;
	z-index:5;
	margin-left:13px;
	margin-right:13px;
	top: 7px;
}
#apDiv20 {
	position:absolute;
	width:690px;
	height:1209px;
	z-index:6;
	margin-left:212px;
	margin-right:212px;
	top: 5px;
}
#apDiv21 {
	position:absolute;
	width:659px;
	height:130px;
	z-index:1;
}
#apDiv22 {
	position:absolute;
	width:649px;
	height:59px;
	z-index:2;
	top: 136px;
}
#apDiv23 {
	position:absolute;
	width:654px;
	height:272px;
	z-index:3;
	top: 180px;
	/* border:#F60 solid */
}
#apDiv24 {
	position:absolute;
	width:654px;
	height:746px;
	z-index:4;
	left: 12px;
	top: 464px;
}
#apDiv25 {
	position:absolute;
	width:247px;
	height:86px;
	z-index:1;
	left: 16px;
	top: 7px;
	font-weight: bold;
	font-size: 18px;
}
#apDiv26 {
	position:absolute;
	width:249px;
	height:46px;
	z-index:2;
	left: 366px;
	top: 44px;
}
#apDiv27 {
	position:absolute;
	width:186px;
	height:413px;
	z-index:8;
	left: 0px;
	top: 434px;
}
#apDiv28 {
	position:absolute;
	width:188px;
	height:31px;
	z-index:1;
	text-align: center;
	font-size: 24px;
	background-color: #FF6600;
}
#apDiv29 {
	position:absolute;
	width:184px;
	height:306px;
	z-index:2;
	top: 0px;
	left: 1px;
}
#apDiv30 {
	position:absolute;
	width:645px;
	height:606px;
	z-index:3;
	left: 11px;
	top: 101px;
	font-size: 24px;
	background-color: #CCCCCC;
}
#apDiv31 {
	position:absolute;
	width:900px;
	height:185px;
	z-index:7;
	top: 1213px;
	text-align: center;
	background-color: #CCCCCC;
}
</style>

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />


</head>

<body>
<div id="body">

<div align="right"> 
<br/>
<a href='<?php echo site_url;?>/common/language/ar' ><?php echo $arabic_lang; ?> </a> &nbsp;&nbsp;&nbsp;
<a href='<?php echo site_url;?>/common/language/en' ><?php echo $english_lang; ?> </a> &nbsp;&nbsp;&nbsp;
<?php
if(isset($_SESSION['applicant']))
{
?>

<a href='<?php echo site_url;?>/applicant/logout' ><?php echo $logout_lang; ?> </a> &nbsp;&nbsp;&nbsp;
<?php 
}
else if(isset($_SESSION['company']))
{
?>
<a href='<?php echo site_url;?>/company/logout' ><?php echo $logout_lang; ?> </a> &nbsp;&nbsp;&nbsp;
<?php 
}
?>
</div>
<br/>

<div id="apDiv1">
<div id="apDiv2"></div>
    <div id="apDiv6">
      <div id="apDiv27">
        <div id="apDiv29"><a href="http://www.dhtml-menu-builder.com"  style="display:none;visibility:hidden;">Drop Down Menu</a>
		<!--  <script type="text/javascript" src="<?php echo site_url .'/public/design/';?>style/a.js"></script> -->
		<script type="text/javascript" >
		
		stm_bm(["menu0a7f",970,"","blank.gif",0,"","",0,0,250,50,1000,1,0,0,"","",0,0,1,1,"default","hand","",1,25],this);
		stm_bp("p0",[1,4,0,0,0,2,16,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.20)",6,"",-2,90,0,0,"#7F7F7F","#000000","",3,0,0,"#666666","",0,0,0,"transparent","",3,"",-1,5,0,"#006666","",3,"",-1,-1,0,"transparent","",3,"",-1,5,0,"#006666","",3,"","","","",20,20,20,20,20,20,20,20]);
		stm_ai("p0i0",[0,"<?php echo $applicant_lang; ?>","","",-1,-1,0,"","_self","","","arrowaa.gif","arrowaa.gif",16,16,0,"","",0,0,0,0,1,"#FF6600",0,"#FF6600",0,"","",3,3,0,0,"#FFFFFF","#FFFFFF","#FFFFFF","#FFFFFF","bold 17pt Verdana","bold 17pt Verdana",0,0,"","","","",0,0,0],180,22);
		stm_aix("p0i1","p0i0",[0,"<?php echo $login_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/applicant/login","_self","","","arrow011.gif","arrow011.gif",7,7,0,"","",0,0,0,0,0,"#333333",0,"#333333",0,"","",3,3,0,0,"#FFFFFF","#FFFFFF","#FFFFFF","#FFFFFF","12pt Verdana","16pt Verdana"],180,0);
		stm_ai("p0i2",[6,2,"#000000","",-1,-1,0]);
		stm_aix("p0i3","p0i1",[0,"<?php echo $registration_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/applicant/register","_self","","","arrow011.gif","arrow011.gif",7,7,0,"","",0,0,0,0,0,"#333333",0,"#333333",0,"","",3,3,0,0,"#FFFFFF","#FFFFFF","#FFFFFF","#FFFFFF","12pt Verdana","16pt Verdana"],180,0);
		stm_aix("p0i4","p0i2",[]);
		stm_aix("p0i5","p0i1",[0,"<?php echo $find_job_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/job/search","_self","","","arrow011.gif","arrow011.gif",7,7,0,"","",0,0,0,0,0,"#333333",0,"#333333",0,"","",3,3,0,0,"#FFFFFF","#FFFFFF","#FFFFFF","#FFFFFF","12pt Verdana","16pt Verdana"],180,0);
		stm_aix("p0i6","p0i2",[]);
		stm_ep();
		stm_em();
		</script>
		
		
		<br/><br/>
		
		<script type="text/javascript" >
		
		stm_bm(["menu0a7f",970,"","blank.gif",0,"","",0,0,250,50,1000,1,0,0,"","",0,0,1,1,"default","hand","",1,25],this);
		stm_bp("p0",[1,4,0,0,0,2,16,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.20)",6,"",-2,90,0,0,"#7F7F7F","#000000","",3,0,0,"#666666","",0,0,0,"transparent","",3,"",-1,5,0,"#006666","",3,"",-1,-1,0,"transparent","",3,"",-1,5,0,"#006666","",3,"","","","",20,20,20,20,20,20,20,20]);
		stm_ai("p0i0",[0,"<?php echo $company_lang; ?>","","",-1,-1,0,"","_self","","","arrowaa.gif","arrowaa.gif",16,16,0,"","",0,0,0,0,1,"#FF6600",0,"#FF6600",0,"","",3,3,0,0,"#FFFFFF","#FFFFFF","#FFFFFF","#FFFFFF","bold 17pt Verdana","bold 17pt Verdana",0,0,"","","","",0,0,0],180,22);
		stm_aix("p0i1","p0i0",[0,"<?php echo $login_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/company/login","_self","","","arrow011.gif","arrow011.gif",7,7,0,"","",0,0,0,0,0,"#333333",0,"#333333",0,"","",3,3,0,0,"#FFFFFF","#FFFFFF","#FFFFFF","#FFFFFF","12pt Verdana","16pt Verdana"],180,0);
		stm_ai("p0i2",[6,2,"#000000","",-1,-1,0]);
		stm_aix("p0i3","p0i1",[0,"<?php echo $registration_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/company/register","_self","","","arrow011.gif","arrow011.gif",7,7,0,"","",0,0,0,0,0,"#333333",0,"#333333",0,"","",3,3,0,0,"#FFFFFF","#FFFFFF","#FFFFFF","#FFFFFF","12pt Verdana","16pt Verdana"],180,0);
		stm_aix("p0i4","p0i2",[]);
		stm_aix("p0i5","p0i1",[0,"<?php echo $find_applicants_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/applicant/search","_self","","","arrow011.gif","arrow011.gif",7,7,0,"","",0,0,0,0,0,"#333333",0,"#333333",0,"","",3,3,0,0,"#FFFFFF","#FFFFFF","#FFFFFF","#FFFFFF","12pt Verdana","16pt Verdana"],180,0);
		stm_aix("p0i6","p0i2",[]);
		stm_ep();
		stm_em();
		</script>
		
		
		</div>
      
      </div>
      <div id="apDiv12"><a href="<?php echo site_url;?>/job/search"><?php echo $find_job_lang; ?></a></div>
      <div id="apDiv10"><a href="<?php echo site_url;?>/osool_about_us/view"><?php echo $about_us_lang; ?></a></div>
      <div id="apDiv"><a href="<?php echo site_url;?>/index"><?php echo $home_page_lang; ?></a></div>
      <div id="apDiv11"><a href="<?php echo site_url;?>/tell_friends"><?php echo $tell_your_friends_lang; ?></a></div>
      
      <div id="apDiv18">
        <p>&nbsp; <span class="w">&nbsp; <?php echo $applicant_lang; ?>:</span><span class="sa"> <span class="ca">
        <?php 
        $applicantModel = new applicantModel;
		$applicants_count = $applicantModel->get_count();
		echo $applicants_count;
        ?>
        </span></span></p>
        <p>&nbsp;<span class="w">&nbsp;&nbsp; <?php echo $job_lang; ?>: </span><span class="r">
		<?php 
        $jobsModel = new jobsModel;
		$jobs_count = $jobsModel->get_count();
		echo $jobs_count;
        ?>
		</span></p>
        <p>&nbsp;&nbsp;&nbsp; <span class="f"><?php echo $company_lang; ?>:<span class="b"> 
		<?php 
        $companyModel = new companyModel;
		$companies_count = $companyModel->get_count();
		echo $companies_count;
        ?>
		</span></span></p>
      </div>
</div>
<div id="apDiv19"><a href="#"><img src="<?php echo site_url .'/public/design/';?>images/logo.jpg" width="190" height="146" /></a></div>
    <div id="apDiv20">
      <div id="apDiv21">
        <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="675" height="130">
          <param name="movie" value="<?php echo site_url .'/public/design/';?>flash/panar.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="8.0.35.0" />
          <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
          <param name="expressinstall" value="S<?php echo site_url .'/public/design/';?>scripts/expressInstall.swf" />
          <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="<?php echo site_url .'/public/design/';?>flash/panar.swf" width="675" height="130">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="8.0.35.0" />
            <param name="expressinstall" value="<?php echo site_url .'/public/design/';?>Scripts/expressInstall.swf" />
            <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
            <div>
              <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
              <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
        </object>
      </div>
      <div id="apDiv22" ><a href="http://www.dhtml-menu-builder.com"  style="display:none;visibility:hidden;">Drop Down Menu</a>
	  <!-- <script type="text/javascript" src="<?php echo site_url .'/public/design/';?>sttree.js"></script>  -->
<script type="text/javascript" >
   stm_bm(["menu79fb",970,"","<?php echo site_url .'/public/design/';?>blank.gif",0,"","",0,0,250,0,500,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
   stm_bp("p0",[0,4,0,0,0,0,0,0,100,"",-2,"",-2,50,0,0,"#999999","transparent","",3,0,0,"#000000"]);
   stm_ai("p0i0",[1,"<?php echo $home_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/index","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right.gif","<?php echo site_url .'/public/design/';?>2-right.gif",3,2,39],100,39);
<?php 
if(isset($_SESSION['company']))
{

?>
   stm_aix("p0i4","p0i0",[1,"<?php echo $my_account_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/company/register","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);
   stm_aix("p0i4","p0i0",[1,"<?php echo $my_jobs_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/job/view_by_company","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);
	
<?php 
}
else if(isset($_SESSION['applicant']))
{
?>
stm_aix("p0i4","p0i0",[1,"<?php echo $my_account_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/applicant/register","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);
stm_aix("p0i4","p0i0",[1,"<?php echo $applied_jobs_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/applicant/jobs","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);

<?php 
}
else
{
?>
stm_aix("p0i4","p0i0",[1,"<?php echo $company_login_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/company/login","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);
stm_aix("p0i4","p0i0",[1,"<?php echo $applicant_login_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/applicant/login","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);
<?php 
}
?>
   stm_aix("p0i4","p0i0",[1,"<?php echo $about_us_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/osool_about_us/view","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);
   stm_aix("p0i4","p0i0",[1,"<?php echo $tell_your_friends_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/tell_friends","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);
   stm_aix("p0i4","p0i0",[1,"<?php echo $contact_us_lang; ?>","","",-1,-1,0,"<?php echo site_url;?>/osool_contact_us/view","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#FFD602",1,"<?php echo site_url .'/public/design/';?>middle.gif","<?php echo site_url .'/public/design/';?>2-middle.gif",3,3,0,0,"#E6EFF9","#000000","#232323","#ffffff","bold 8pt Verdana","bold 8pt Verdana",1,1,"<?php echo site_url .'/public/design/';?>left.gif","<?php echo site_url .'/public/design/';?>2-left.gif","<?php echo site_url .'/public/design/';?>right-border.gif","<?php echo site_url .'/public/design/';?>2-right-border.gif",3,3],115,39);
   stm_ep();
   stm_em();
</script>


</div>