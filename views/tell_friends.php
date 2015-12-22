<?php  
require_once __SITE_PATH .'/views/includes/header.php';
?>

<div id="apDiv23" align="center" class="div_content">
<br></br><br></br><br></br>


<form action='<?php echo site_url;?>/tell_friends' method="post">
<table>
  <tbody>
  <tr>
    <td> Your Name </td>
    <td> <input type="text" id="txt_name" name="txt_name"> </td>
  </tr>
  
  <tr>
    <td> Email Address 1</td>
    <td> <input type="text" id="txt_email1" name="txt_email1"> </td>
  </tr>
  
  <tr>
    <td> Email Address 2</td>
    <td> <input type="text" id="txt_email2" name="txt_email2"> </td>
  </tr>
  
  <tr>
    <td> Email Address 3</td>
    <td> <input type="text" id="txt_email3" name="txt_email3"> </td>
  </tr>
  
  <tr>
    <td> Email Address 4</td>
    <td> <input type="text" id="txt_email4" name="txt_email4"> </td>
  </tr>
  
  <tr>
    <td> Email Address 5</td>
    <td> <input type="text" id="txt_email5" name="txt_email5"> </td>
  </tr>
  
  
  <tr>
    <td> <input type="submit" name="smt_go" id="smt_go" value="Submit" /> </td>
    <td>  </td>
  </tr>
  
</tbody>
</table>
</form>


</div>

<?php  
require_once __SITE_PATH .'/views/includes/footer.php';
?>