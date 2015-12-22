<?php  
require_once __SITE_PATH .'/views/includes/header.php';
?>

<div id="apDiv23" align="center" class="div_content">
<br></br><br></br><br></br>

<table>
  <tbody>
  
  <tr>
    <td style="font-family: tahoma; font-size: 16; font-weight: bold; color: orange"> 
    <?php 
    if(isset( $this->data['message']))
	{
    	echo $this->data['message']; 
	}
    ?> 
  </tr>
  
  <tr>
    <td> 
    <?php 
    if(isset( $this->data['link']))
	{
    	echo $this->data['link']; 
	}
    ?> 
    </td>
  </tr>
  
 </tbody>
 </table>
 
 </div>