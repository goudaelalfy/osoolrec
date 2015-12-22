<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<HTML dir="rtl" >
<HEAD>
<TITLE>3qar dot com</TITLE>
<META NAME="Keywords" CONTENT="form, username, checker">
<META NAME="Description" CONTENT="An AJAX Username Verification Script">

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/css/admin/style.css';?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/css/admin/menu.css';?>" />

<script type="text/javascript" src="<?php echo site_url .'/public/js/jquery-1.3.2.min.js';?>"></script>

</HEAD>

<BODY>

<div align="center">
<br/><br/><br/><br/><br/><br/>

<form action='<?php echo site_url;?>/admin/authenticate' method="post">
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
    <td> <input type="submit" name="smt_login" id="smt_login" value="Submit"/> </td>
    <td> <input type="reset"> </td>
  </tr>
  
</tbody>
</table>
</form>


</div>