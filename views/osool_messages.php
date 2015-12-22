<?php
require_once __SITE_PATH.'/views/includes/header.php';
$lang=$_SESSION['lang'];
require_once __SITE_PATH.'/lang/'.$lang.'/osool_messages.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/osool_messages.js';?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />

<div id="adv-right">
<div id="inside">
<form action='<?php echo site_url;?>/osool_messages/save' method="post">

<?php 

if(isset( $this->data['current_osool_message']))
{
	$id=$this->data['current_osool_message'][0];
	$person_name=$this->data['current_osool_message'][1];  
	$person_phone=$this->data['current_osool_message'][2];  
	$person_moile=$this->data['current_osool_message'][3];  
	$person_email=$this->data['current_osool_message'][4];  
	$message=$this->data['current_osool_message'][5];
}
else
{
	$id=0;
	$person_name='';  
	$person_phone='';  
	$person_moile='';  
	$person_email='';  
	$message='';
}
?>


<table>
  <tbody>
  <tr>
    <td></td>
    <td> <input type="hidden"  id="hdn_id" name="hdn_id" value="<?php echo $id; ?>" ></input> </td>
  </tr>
  <tr>
    <td> <?php echo $person_name_lang; ?> <font color="red">*</font></td>
    <td> <input type="text" size="50" maxlength="100" id="txt_person_name" name="txt_person_name" value="<?php echo $person_name; ?>"> </td>
  </tr>
   <tr>
    <td> <?php echo $person_phone_lang; ?> <font color="red">*</font></td>
    <td> <input type="text" size="50" maxlength="100" id="txt_person_phone" name="txt_person_phone" value="<?php echo $person_phone; ?>"> </td>
  </tr>
   <tr>
    <td> <?php echo $person_moile_lang; ?> <font color="red">*</font></td>
    <td> <input type="text" size="50" maxlength="100" id="txt_person_moile" name="txt_person_moile" value="<?php echo $person_moile; ?>"> </td>
  </tr>
   <tr>
    <td> <?php echo $person_email_lang; ?> <font color="red">*</font></td>
    <td> <input type="text" size="50" maxlength="100" id="txt_person_email" name="txt_person_email" value="<?php echo $person_email; ?>"> </td>
  </tr>
    <tr>
    <td> <?php echo $message_lang; ?>  </td>
    <td> <textarea rows="3" cols="40" id="txt_message" name="txt_message"><?php echo $message; ?></textarea> </td>
  </tr>
  
  <tr>
    <td> <input type="submit" name="smt_save" id="smt_save" value="<?php echo $submit_lang; ?>" onclick="return displaymessage('<?php echo $lang; ?>')"/> </td>
    <td> <!-- <input type="reset"> --> </td>
  </tr>
  
</tbody>
</table>

</form>
</div>
</div>

<?php 
require_once __SITE_PATH.'/views/includes/footer.php';
?>