<?php  
require_once __SITE_PATH .'/views/admin/includes/header.php';
?>


<form action='<?php echo site_url;?>/login/authenticate' method="post">
<table>
  <tbody>
  <tr>
    <td width="200px"> Username </td>
    <td> <input type="text" id="txt_username" name="txt_username"> </td>
  </tr>
  
  <tr>
    <td>Old Password </td>
    <td> <input type="text" id="txt_password" name="txt_password"> </td>
  </tr>
  
  <tr>
    <td>New Password </td>
    <td> <input type="text" id="txt_password" name="txt_password"> </td>
  </tr>
  
  <tr>
    <td>Confirm Password </td>
    <td> <input type="text" id="txt_password" name="txt_password"> </td>
  </tr>
  
  <tr>
    <td> <input type="submit" name="smt_login" id="smt_login" value="Submit" class="submit"/> </td>
    
  </tr>
  
</tbody>
</table>
</form>







<?php  
require_once __SITE_PATH .'/views/admin/includes/footer.php';
?>


