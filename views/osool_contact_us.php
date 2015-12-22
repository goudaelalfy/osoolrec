<?php  
require_once __SITE_PATH .'/views/includes/header.php';
?>

<?php 

if(isset( $this->data['current_osool_contact_us']))
{
	$id=$this->data['current_osool_contact_us'][0];
	$page_text_en=$this->data['current_osool_contact_us'][1];  
	$page_text_ar=$this->data['current_osool_contact_us'][2];  
	
}
else
{
	$id=0;  
	$page_text_en='';  
	$page_text_ar=''; 
	
}
?>

<div id="apDiv23" align="center">
<br/><br/><br/>

<table>
  <tbody>
   <tr>
    <td></td>
    <td> <input type="hidden"  id="hdn_id" name="hdn_id" value="<?php echo $id; ?>" ></input> </td>
  </tr>


   <tr>
    <td>  </td>
    <td> 
     <?php 
    if($_SESSION['lang']=='en')
    echo $page_text_en; 
    else
    echo $page_text_ar;
    ?>
	
	</td>
  </tr>

</tbody>
</table>
</div>

<?php  
require_once __SITE_PATH .'/views/includes/footer.php';
?>