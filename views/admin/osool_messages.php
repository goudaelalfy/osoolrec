

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/css/table.css';?>" />
	
<div align="center">

<?php 

if(isset( $this->data['osool_messagess']))
{
	$osool_messages=$this->data['osool_messagess'];
	
	if(count($osool_messages)>0)
	{
		echo "
		<table id='hor-minimalist-b-width' summary='Most Favorite Movies' >
				<thead style='font-weight:bold'>
    			<tr>
				<td width='200px'> Contact Name</td>
				<td> Phone </td>
				<td> Mobile</td>
				<td> Email</td>
				<td width='300px'> Message</td>
				<td> Delete</td>
				</tr>
				</thead>
		";
		
	 	foreach($osool_messages as $osool_message)
	    {
	    	$id=$osool_message[0];
			$person_name=$osool_message[1];  
			$person_phone=$osool_message[2];  
			$person_moile=$osool_message[3];  
			$person_email=$osool_message[4];  
			$message=$osool_message[5];
			
			
			echo 
			"
			<tr>
			<td>$person_name </td>
			<td>$person_phone </td>
			<td>$person_moile </td>
			<td>$person_email </td>
			<td>$message </td>
			<td><a href='".site_url."/osool_messages/delete/$id' onclick='return confirm(\"Are You Want To Delete This Row?\");'>Delete</a>  </td>
			</tr>
			";
	    }
	    
	    echo "</table>";
	}
	else
	{
		echo "There Is No Messages.";
	}
}
else
{
	echo "There Is No Messages.";
}
?>
 </div>