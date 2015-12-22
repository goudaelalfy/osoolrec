<?php  
require_once __SITE_PATH .'/views/includes/header.php';
?>
<?php 
$lang=$_SESSION['lang'];
?>

<div id="apDiv23" align="center">
<br></br><br></br><br></br>

<form action='<?php echo site_url;?>/company/authenticate' method="post">
<table>
  <tbody>
  <tr>
    <td> Username </td>
    <td> <input type="text" id="txt_username" name="txt_username"> </td>
  </tr>
  
  <tr>
    <td> Password </td>
    <td> <input type="password" id="txt_password" name="txt_password"> </td>
  </tr>
  
  
  
  <tr>
    <td> <input type="submit" name="smt_login" id="smt_login" value="Submit" onclick="return loginvalidate('<?php echo $lang;?>')"/> </td>
    <td> <a href='<?php echo site_url;?>/company/send_password'>Fotget Password</a> </td>
  </tr>
  
</tbody>
</table>
</form>


</div>

<?php  
require_once __SITE_PATH .'/views/includes/footer.php';
?>