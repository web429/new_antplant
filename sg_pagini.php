<?php
if (!isset($_COOKIE['loggedin']))
{
include "sg_header.php";
echo "Nu sunteti autentificat!<br /><a href=index.php>Click aici</a>";
include "sg_footer.php";
die;
}
include "panou/config.php";
$link = mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
mysql_select_db($database) or die("Eroare conectare baza de date.");
if(isset($_POST['save']))
{
   $content = $_POST['content'];
   if(!get_magic_quotes_gpc())
   {
      $content = addslashes($content);
   }

   $result = mysql_query("update $tab_pagini set continut_".$_POST['l']." ='".$content."'  where pagina_id='".$_POST['id_pagina']."'") or die ("Eroare: ".mysql_error());
   $status_msg = "Pagina salvata";
}
?>
<br />
<form action="sg_index.php?pagina=sg_pagini" method="post">
      <select style="width: 170px" name="paginaa" onchange="this.form.submit();">
      	<option value="-">--- alegeti pagina ---</option>
      <?php
     $result = mysql_query("select * from $tab_pagini where pagina_parent<>'2' ORDER BY pagina_parent , nume_en") or die ("Eroare: ".mysql_error());
      while($row = mysql_fetch_array($result))
      {
	  if ($row['pagina_id'] == $_POST['paginaa']) {
	  	echo "<option value=\"".$row['pagina_id']."\" SELECTED>".$row['nume_en']."</option>";}
		else { echo "<option value=\"".$row['pagina_id']."\" >".$row['nume_en']."</option>"; }
      }
      ?>
      </select>
</form>
<form action="sg_index.php?pagina=sg_pagini" method="post">
      <select style="width: 170px" name="l" onchange="this.form.submit();">
      	<option value="-">--- alegeti limba ---</option>
		<option value="fr" <? if ($_POST['l']=="fr") echo "SELECTED"; ?>>franceza</option>
		<option value="en" <? if ($_POST['l']=="en") echo "SELECTED"; ?>>engleza</option>
		<option value="de" <? if ($_POST['l']=="de") echo "SELECTED"; ?>>germana</option>
		<option value="es" <? if ($_POST['l']=="es") echo "SELECTED"; ?>>spaniola</option>
      </select>
	  <input type="hidden" name="paginaa" value="<?php echo $_POST['paginaa'] ?>" />
</form>

<br />
<!-- TinyMCE -->
<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
	<script language="javascript" type="text/javascript">
	tinyMCE.init({
			language : "ro",
			mode : "textareas",
			theme : "advanced",
			elements : "ajaxfilemanager",
			plugins : "advimage,advlink,media,contextmenu,preview,insertdatetime,paste,fullscreen,safari,table",
			paste_create_paragraphs : true,
			paste_create_linebreaks : true,
			paste_use_dialog : true,
			paste_auto_cleanup_on_paste : true,
			paste_convert_middot_lists : false,
			paste_unindented_list_class : "unindentedList",
			paste_convert_headers_to_strong : true,
			paste_insert_word_content_callback : "convertWord",
			plugin_insertdate_dateFormat : "%d.%m.%y",
			plugin_insertdate_timeFormat : "%H:%M:%S",
			plugin_preview_width : "80%",
			plugin_preview_height : "600",
			theme_advanced_resizing : true,
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_disable : "strikethrough",
			theme_advanced_buttons1_add : "styleselect,fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "",
			theme_advanced_buttons2_add_before: "fullscreen,cut,copy,paste,separator",
			theme_advanced_buttons3_add : "media,separator,forecolor,backcolor,liststyle,insertdate,inserttime,preview,pastetext,pasteword,selectall,tablecontrols",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			content_css : "css/style.css",			
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",	
			paste_use_dialog : true,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_p_newlines : true,	
			relative_urls : false,
			remove_script_host : false,
			convert_urls : false,
			extended_valid_elements : "iframe[src|width|height|name|align]"
		});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "../../../tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?editor=tinymce";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "../../../tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?editor=tinymce",
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });           
		}
	</script>
<!-- /TinyMCE -->
<form action="sg_index.php?pagina=sg_pagini" method="post">
<br/>
<textarea id="ajaxfilemanager" name="content" cols="80" rows="25">
<?php
$result1 = mysql_query("select * from $tab_pagini where pagina_id='".@$_POST['paginaa']."'") or die ("Eroare: ".mysql_error());
$row1 = mysql_fetch_row($result1);
if ($_REQUEST['l']=="fr") $conti='10';
if ($_REQUEST['l']=="en") $conti='7';
if ($_REQUEST['l']=="de") $conti='8';
if ($_REQUEST['l']=="es") $conti='9';
echo $row1[$conti];
?>
</textarea>
<br/>

<br />
<input name="id_pagina" type="hidden" value="<?php echo $_POST['paginaa']; ?>" />
<input name="l" type="hidden" value="<?php echo $_POST['l'] ?>" />
<input name="paginaa" type="hidden" value="<?php echo $_POST['paginaa'] ?>" />
<input name="save" type="submit" id="button" value="Salveaza pagina">
</form>