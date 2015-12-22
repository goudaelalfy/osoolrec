
function validateEmail(elementValue){  
	   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
	   return emailPattern.test(elementValue);  
	 }

function displaymessage(lang)
{
	if (document.getElementById('txt_username').value=="")
	 {
		if(lang=='ar')
		{
		 alert('اسم المستخدم مطلوب');
		}
		else
		{
		 alert('Username Required.');
		}
		 document.getElementById('txt_username').focus();
	     return false;
	 }
	
	if (document.getElementById('txt_password').value=="")
	 {
		if(lang=='ar')
		{
		 alert('كلمة المرور مطلوبة');
		}
		else
		{
		 alert('Password Required.');
		}
		 document.getElementById('txt_password').focus();
	     return false;
	 }
	
	if (document.getElementById('txt_password').value.length<6)
	 {
		if(lang=='ar')
		{
		 alert('يجب الا تقل كلمة المرور عن 6 حروف');
		}
		else
		{
			 alert('Password Length Must Not Be Less Than 6 Chars.');
		}
	     document.getElementById('txt_password').focus();
	     return false;
	 }
	
	if (document.getElementById('txt_password').value != document.getElementById('txt_password_confirm').value)
	 {
		if(lang=='ar')
		{
		 alert('كلمتي المرور غير متطابقتين');
		}
		else
		{
			 alert('Two password are not the same.');
		}
	     document.getElementById('txt_password').focus();
	     return false;
	 }
	
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
	
	if (document.getElementById('txt_phone1').value=="")
	 {
		if(lang=='ar')
		{
		 alert('التليفون1 مطلوب');
		}
		else
		{
		 alert('Phone1 Required.');
		}
		 document.getElementById('txt_phone1').focus();
	     return false;
	 }
	
	if (document.getElementById('txt_mobile').value=="")
	 {
		if(lang=='ar')
		{
		 alert('التليفون المحمول مطلوب');
		}
		else
		{
		 alert('Mobile Required.');
		}
		 document.getElementById('txt_mobile').focus();
	     return false;
	 }
	
	if (document.getElementById('txt_email').value=="")
	 {
		if(lang=='ar')
		{
		 alert('البريد الالكترونى مطلوب');
		}
		else
		{
		 alert('E-mail Required.');
		}
		 document.getElementById('txt_email').focus();
	     return false;
	 }
	
	if (document.getElementById('txt_email').value!="")
	 {
		 if(!validateEmail(document.getElementById('txt_email').value))
		 {
			 if(lang=='ar')
				{
				 alert('البريد الالكتروني غير صحيح');
				}
				else
				{
				 alert('Invalid Email Address.');
				}
	     	document.getElementById('txt_email').focus();
	     	return false;
		 }
	 }
	
	if (document.getElementById('txt_contact_person_name').value=="")
	 {
		if(lang=='ar')
		{
		 alert('الشخص المسئول مطلوب');
		}
		else
		{
		 alert('Contact Person Required.');
		}
		 document.getElementById('txt_contact_person_name').focus();
	     return false;
	 }
	
   return true;
}