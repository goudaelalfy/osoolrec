<?php  
require_once __SITE_PATH .'/views/includes/header.php';
?>

<div id="apDiv23" align="center" class="div_content">
<br></br><br></br><br></br>


<form action='<?php echo site_url.'/'.$this->data['controller'];?>/send_password' method="post">
<table>
  <tbody>
  <tr>
    <td> Email Address </td>
    <td> <input type="text" id="txt_email" name="txt_email"> </td>
  </tr>
  
  
  <tr>
    <td> <input type="submit" name="smt_send_password" id="smt_send_password" value="Submit" /> </td>
    <td>  </td>
  </tr>
  
</tbody>
</table>
</form>


</div>

<?php  
require_once __SITE_PATH .'/views/includes/footer.php';
?>