<?php  
require_once __SITE_PATH .'/views/includes/header.php';
?>

<div id="apDiv23"><img src="<?php echo site_url .'/public/design/';?>images/professionals.jpg" width="675" height="272" /></div>
      
<div id="apDiv24">
    
       <form action='<?php echo site_url;?>/job/search' method="post">
       
        <div >
        <br/>
        <table>
	  	  <tbody>
		  <tr>
		    <td> Keyword </td>
		    <td><input name="txt_text" type="text" id="txt_text" size="40" /></td>

		    <td> Jop Field </td>
		    <td> 
        
        <select id="cmb_business_field" name="cmb_business_field">
    	<?php 
		$business_fieldModel = new business_fieldModel;
		$business_fields = $business_fieldModel->get_all();

		foreach($business_fields as $business_field)
    	{
    	$business_field_id_here=$business_field[0];
    	
    	if($lang=='ar')
    	{
    		$business_field_name=$business_field[2];
    	}
    	else
    	{
    		$business_field_name=$business_field[1];
    	}

    	echo "<option value='$business_field_id_here' >$business_field_name</option>";
    }
    ?>
    </select>
	</td>
	</tr>
	
	<tr>
	<td> <input type="submit" name="smt_search_home" id="smt_search_home" value="Search" /> </td>
	</tr>
		  
		</tbody>
		</table>
        
	
	</div>
	
	
        <div id="apDiv30"><h3>&nbsp;&nbsp;&nbsp;&nbsp; Hot Jobs </h3>
          <table border="0" width="640">
            <tbody>
           
           <?php 
           	$jobsModel = new jobsModel;
			$jobs = $jobsModel->get_hot_jobs();
	
			foreach($jobs as $job)
	    	{
	    	$job_id=$job['id'];
           	$business_field=$job['english_business_field'];
           	$job_name=$job['name'];
           	
           	$location=$job['location'];
           	$company=$job['company'];
           ?>
              <tr>
                <td align="left"><a href="<?php echo site_url."/job/details/$job_id";?>"><?php echo $job_name; ?></a></td>
                <td align="center"> </td>
              </tr>
              <tr>
                <td align="center" bgcolor="#F4F8EE">Job Location: <?php echo $location; ?></td>
                <td align="center" bgcolor="#3792AE">Company: <?php echo $company; ?></td>
              </tr>
            
           <?php 
	    	}
           ?>
            
            </tbody>
          </table>
          <br />
          <p>&nbsp;</p>
        </div>
        
        </form>
        
      </div>
      
      

<?php  
require_once __SITE_PATH .'/views/includes/footer.php';
?>