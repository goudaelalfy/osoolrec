<?php
require_once __SITE_PATH.'/views/includes/header.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/role.js';?>"></script>

<div align="center">
<form action='<?php echo site_url;?>/role/save' method="post">
<?php 

if(isset( $this->data['current_role']))
{
	$id=$this->data['current_role'][0];
	$name=$this->data['current_role'][1];
}
else
{
	$id=0;
	$name='';
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
    <td> <input type="text" size="40" maxlength="50" id="txt_name" name="txt_name" value="<?php echo $name; ?>" > </td>
  </tr>
  
  <tr>
    <td colspan="2"> 
    <table>
  	<tbody>
  	<tr>
    <td>All Screens</td>
  	</tr>
  	
  	<?php 
   
    $screens=$this->data['screens'];
    foreach($screens as $screen)
    {
    	$screen_id=$screen[0];
    	$screen_name=$screen[1];
    	
    	$checked="";
    	if(isset($this->data['role_screens']))
    	{
    		foreach($this->data['role_screens'] as $role_screen)
    		{
    			if($screen_id==$role_screen[0])
    			{
    				$checked="checked=checked";
    			}
    		}
    	}
    	
    	echo 
    	"
    	<tr>
	    <td> <input type='checkbox' id='screens[]' name='screens[]' value='$screen_id' $checked /> $screen_name </td>
	  	</tr>
    	";
    }
    ?>
  	
  	</tbody>
	</table>
    </td>
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
    <td width='200px'> Role Name </td>
    <td width='100px'> Edit</td>
    <td width='100px'> Delete</td>
  </tr>
  
   <?php 
   
    $roles=$this->data['roles'];
    foreach($roles as $role)
    {
    	$role_id=$role[0];
    	$role_name=$role[1];
    	echo 
    	"
    	 <tr>
	    <td> $role_name </td>
	    <td> <a href='".site_url."/role/edit/$role_id'>Edit</a> </td>
	    <td> <a href='".site_url."/role/delete/$role_id' onclick='return confirm(\"Are You Want To Delete This Row?\");'>Delete</a> </td>
	  	</tr>
    	";
    }
    ?>
    
  

</tbody>
</table>
</form>

</div>