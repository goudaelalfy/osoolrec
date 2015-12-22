<?php
class commonController Extends baseController 
{

	public function index()
	{
	}
	
	public function language($lang)
	{
		if($lang=='ar')
		{
			$_SESSION['lang']='ar';
		}
		else
		{
			$_SESSION['lang']='en';
		}
		
		$page=$_SERVER['HTTP_REFERER'];
		header("Refresh: 0; url=$page");
	}
	
	function getCitiesByCountry($country_id=1000)
	{
    	$combosModel = new combosModel;
		$cities = $combosModel->get_all_city($country_id);
	
    	echo "
    	<select id='cmb_city' name='cmb_city'>
    	";
	    foreach($cities as $city)
	    {
	    	$city_id=$city[0];
	    	
	    	if($lang=='ar')
	    	{
	    		$city_name=$city[2];
	    	}
	    	else
	    	{
	    		$city_name=$city[1];
	    	}

	    	echo "<option value='$city_id' >$city_name</option>";
	    }
    	
    	echo"</select>";	
	
    	
    	exit;
	}
	
	
}