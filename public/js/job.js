function displaymessage(lang)
{
	if (document.getElementById('txt_name').value=="")
	 {
		if(lang=='ar')
		{
		 alert('الاسم مطلوب');
		}
		else
		{
		 alert('Name Required.');
		}
		 document.getElementById('txt_name').focus();
	     return false;
	 }
	
	if (document.getElementById('cmb_business_field').value==null)
	 {
		if(lang=='ar')
		{
		 alert('مجال العمل مطلوب');
		}
		else
		{
		 alert('Business Field Required.');
		}
		 document.getElementById('cmb_business_field').focus();
	     return false;
	 }
	
	if (document.getElementById('txt_date_from').value=="")
	 {
		if(lang=='ar')
		{
		 alert('تاريخ بداية الاعلان مطلوب');
		}
		else
		{
		 alert('From Date Required.');
		}
		 document.getElementById('txt_date_from').focus();
	     return false;
	 }
	
	if (document.getElementById('txt_date_to').value=="")
	 {
		if(lang=='ar')
		{
		 alert('تاريخ نهاية الاعلان مطلوب');
		}
		else
		{
		 alert('To Date Required.');
		}
		 document.getElementById('txt_date_to').focus();
	     return false;
	 }
	

   return true;
}