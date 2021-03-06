<?php  
require_once __SITE_PATH .'/views/admin/includes/header.php';
?>

<link rel="stylesheet" type="text/css" href="<?php echo site_url .'/public/username_availability/username_checker.css';?>" />
<script type="text/javascript" src="<?php echo site_url .'/public/js/admin/osool_about_us.js';?>"></script>
<script type="text/javascript" src="<?php echo site_url .'/public/tiny_mce/tiny_mce.js';?>"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<?php 

if(isset( $this->data['current_osool_about_us']))
{
	$id=$this->data['current_osool_about_us'][0];
	$title_en=$this->data['current_osool_about_us'][1];  
	$title_ar=$this->data['current_osool_about_us'][2];  
	$page_text_en=$this->data['current_osool_about_us'][3];  
	$page_text_ar=$this->data['current_osool_about_us'][4]; 
}
else
{
	$id=0;
	$title_en='';  
	$title_ar='';  
	$page_text_en='';  
	$page_text_ar=''; 
	
}
?>

<div align="center">
<form action='<?php echo site_url;?>/osool_about_us/save' method="post">
<table>
  <tbody>
   <tr>
    <td></td>
    <td> <input type="hidden"  id="hdn_id" name="hdn_id" value="<?php echo $id; ?>" ></input> </td>
  </tr>
  
  <tr>
    <td> <?php echo $english_title_lang;?> </td>
    <td> <input type="text" id="txt_title_en" name="txt_title_en" value="<?php echo $title_en; ?>"> </td>
  </tr>
  
  <tr>
    <td> <?php echo $arabic_title_lang;?>  </td>
    <td> <input type="text" id="txt_title_ar" name="txt_title_ar" value="<?php echo $title_ar; ?>"> </td>
  </tr> 
 
   <tr>
    <td> <?php echo $english_text_lang;?>  </td>
    <td> 
    <textarea id="txt_page_text_en" name="txt_page_text_en" rows="15" cols="80" style="width: 80%">
	<?php echo $page_text_en; ?>
	</textarea>
	</td>
  </tr>
  
  <tr>
    <td> <?php echo $arabic_text_lang;?>   </td>
    <td> 
    <textarea id="txt_page_text_ar" name="txt_page_text_ar" rows="15" cols="80" style="width: 80%">
	<?php echo $page_text_ar; ?>
	</textarea>
    </td>
  </tr>
 
  <tr>
    <td> <input type="submit" name="smt_save" id="smt_save" value="Submit"/> </td>
    <td>  </td>
  </tr>
  
</tbody>
</table>
</form>
</div>

<?php  
require_once __SITE_PATH .'/views/admin/includes/footer.php';
?>