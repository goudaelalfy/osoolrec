<?php
require_once __SITE_PATH.'/views/includes/header.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/user.js';?>"></script>

<div align="center">
<form action='<?php echo site_url;?>/user/save' method="post">

<?php 

if(isset( $this->data['current_user']))
{
	$id=$this->data['current_user'][0];
	$name=$this->data['current_user'][3];
	$username=$this->data['current_user'][1];
	$password=$this->data['current_user'][2];
	$email=$this->data['current_user'][4];
	$telephone=$this->data['current_user'][5];
	$address=$this->data['current_user'][6];
	$role_id=$this->data['current_user'][7];
}
else
{
	$id=0;
	$name='';
	$username='';
	$password='';
	$email='';
	$telephone='';
	$address='';
	$role_id=0;
}
?>

<table>
  <tbody>
  <tr>
    <td></td>
    <td> <input type="hidden"  id="hdn_id" name="hdn_id" value="<?php echo $id; ?>" ></input> </td>
  </tr>
  
  <tr>
    <td> Name <font color="red">*</font></td>
    <td> <input type="text" size="50" maxlength="100" id="txt_name" name="txt_name" value="<?php echo $name; ?>"> </td>
  </tr>
  
  <tr>
    <td> Username <font color="red">*</font></td>
    <td> <input type="text" size="30" maxlength="30" id="txt_username" name="txt_username" value="<?php echo $username; ?>"> </td>
  </tr>
  <tr>
    <td> Password <font color="red">*</font></td>
    <td> <input type="password" size="30" maxlength="30" id="txt_password" name="txt_password" value="<?php echo $password; ?>"> </td>
  </tr>
  
  
  
  <tr>
    <td> E-mail Address <font color="red">*</font> </td>
    <td> <input type="text" size="40" maxlength="40" id="txt_email" name="txt_email" value="<?php echo $email; ?>"> </td>
  </tr>
  
  <tr>
    <td> Address  </td>
    <td> <textarea rows="3" cols="40" id="txt_address" name="txt_address"><?php echo $address; ?></textarea> </td>
  </tr>
  
  <tr>
    <td> Phone No. </td>
    <td> <input type="text" size="20" maxlength="20" id="txt_telephone" name="txt_telephone" value="<?php echo $telephone; ?>"> </td>
  </tr>
  
  
   <tr>
    <td> Role <font color="red">*</font> </td>
    <td>  <select id="dd_role" name="dd_role">
    <?php 
    $roles=$this->data['roles'];
    foreach($roles as $role)
    {
    	$role_id_here=$role[0];
    	$role_name=$role[1];
    	
    	$selected="";
    	if($role_id==$role_id_here)
    			{
    				$selected="selected=selected";
    			}
    	echo "<option value='$role_id_here' $selected>$role_name</option>";
    }
    ?>
    </select> </td>
  </tr>
  
  <tr>
    <td> <input type="submit" name="smt_save" id="smt_save" value="Submit" onclick="return displaymessage()"/> </td>
    <td> <input type="reset"> </td>
  </tr>
  
</tbody>
</table>

<table>
  <tbody>

  <tr style='background-color:gray'>
    <td width='200px'> Fullname </td>
    <td width='200px'> E-mail Address </td>
    <td width='200px'> Phone No. </td>
    <td width='200px'> Role </td>
    <td width='100px'> Edit</td>
    <td width='100px'> Delete</td>
  </tr>
  
   <?php 
   
    $users=$this->data['users'];
    foreach($users as $user)
    {
    	$user_id=$user[0];
    	$name=$user[3];
    	$email=$user[4];
    	$telephone=$user[5];
    	$rule_id=$user[7];
    	echo 
    	"
    	 <tr>
	    <td> $name </td>
	    <td> $email </td>
	    <td> $telephone </td>
	    <td> $rule_id </td>
	    <td> <a href='".site_url."/user/edit/$user_id'>Edit</a> </td>
	    <td> <a href='".site_url."/user/delete/$user_id' onclick='return confirm(\"Are You Want To Delete This Row?\");'>Delete</a> </td>
	  	</tr>
    	";
    }
    ?>
    
  

</tbody>
</table>
</form>


</div>