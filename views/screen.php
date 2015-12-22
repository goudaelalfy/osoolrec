<?php
require_once __SITE_PATH.'/views/includes/header.php';
?>
<script type="text/javascript" src="<?php echo site_url .'/public/js/screen.js';?>"></script>

<div align="center">
<form action='<?php echo site_url;?>/screen/save' method="post">
<?php 

if(isset( $this->data['current_screen']))
{
	$id=$this->data['current_screen'][0];
	$name=$this->data['current_screen'][1];
}
else
{
	$id=0;
	$name='';
}
?>

<table>
  <tbody>

	<tr height="80px">
    <td colspan="2">Note: this screens must be added by developer. if you add screen, this screen must be in system.
    <input type="hidden"  id="hdn_id" name="hdn_id" value="<?php echo $id; ?>" ></input> </td>
  </tr>
  <tr>
    <td> Name <font color="red">*</font></td>
    <td> <input type="text" size="40" maxlength="50" id="txt_name" name="txt_name" value="<?php echo $name; ?>" > </td>
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
    <td width='200px'> screen Name </td>
    <td width='100px'> Edit</td>
    <td width='100px'> Delete</td>
  </tr>
  
   <?php 
   
    $screens=$this->data['screens'];
    foreach($screens as $screen)
    {
    	$screen_id=$screen[0];
    	$screen_name=$screen[1];
    	echo 
    	"
    	 <tr>
	    <td> $screen_name </td>
	    <td> <a href='".site_url."/screen/edit/$screen_id'>Edit</a> </td>
	    <td> <a href='".site_url."/screen/delete/$screen_id' onclick='return confirm(\"Are You Want To Delete This Row?\");'>Delete</a> </td>
	  	</tr>
    	";
    }
    ?>
    
  

</tbody>
</table>
</form>

</div>