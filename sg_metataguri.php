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
		$nume   = $_POST['nume_pagina'];
		$title   = $_POST['title'];
  		$keywords   = $_POST['keywords'];
		$subject   = $_POST['subject'];
		$description   = $_POST['description'];		
		$abstract   = $_POST['abstract'];
		$copyright   = $_POST['copyright'];

   if(!get_magic_quotes_gpc())
   {
		$title = addslashes($title);
		$keywords = addslashes($keywords);
		$subject = addslashes($subject);
		$description = addslashes($description);		
		$abstract = addslashes($abstract);
		$copyright = addslashes($copyright);
   }

   $result = mysql_query("update $tab_pagini set pagina_title ='".$title."', pagina_keywords ='".$keywords."', pagina_subject ='".$subject."', pagina_description ='".$description."', pagina_abstract ='".$abstract."', pagina_copyright ='".$copyright."' where nume_en='".$nume."'") or die ("Eroare: ".mysql_error());
   $status_msg = "Meta TAG-uri salvate.";
}
?>
<br />
<form action="sg_index.php?pagina=sg_metataguri" method="post">
      <select style="width: 170px" name="paginaa" onchange="this.form.submit();">
      	<option value="-">--- alegeti pagina ---</option>
      <?php
     $result = mysql_query("select * from $tab_pagini where pagina_parent<>'2'") or die ("Eroare: ".mysql_error());
      while($row = mysql_fetch_array($result))
      {
	  if ($row['nume_en'] == $_POST['paginaa']) {
	  	echo "<option value=\"".$row['nume_en']."\" SELECTED>".$row['nume_en']."</option>";}
		else { echo "<option value=\"".$row['nume_en']."\" >".$row['nume_en']."</option>"; }
      }
      ?>
      </select>
</form>
<?php 
$result = mysql_query("select * from $tab_pagini where nume_en='".$_POST['paginaa']."'") or die ("Eroare: ".mysql_error());
$row = mysql_fetch_array($result);
?>
<br />
<form action="sg_index.php?pagina=sg_metataguri" method="post">
 <table width="550" cellpadding="0">
	<tr bgcolor="#E6F2FF">
      <td width="120" valign="top"><strong>Nume tag </strong></td>
      <td width="430" align="center"><strong>Continut tag </strong></td>
    </tr>  
    <tr bgcolor="#FFF5EC">
      <td valign="top">Title <img style="cursor:help" alt="" height="16" src="panou/img/help.png" width="16" onmouseover="Tip('Titlu: De obicei trebuie sa aiba 2 sau 3 cuvinte care descriu cel mai bine  site-ul.Trebuie sa contina maxim 65 caractere lungime..')" onmouseout="UnTip()"></td>
      <td><input type="text" name="title" size="65" value="<?php echo $row['pagina_title']; ?>"/></td>    
    </tr>
    <tr bgcolor="#F0F8FF">
      <td valign="top"><p>Keywords <img style="cursor:help" alt="" height="16" src="panou/img/help.png" width="16" onmouseover="Tip('Keywords(cuvintele cheie): cuvinte care descriu cel mai bine site-ul despartite prin virgula.')" onmouseout="UnTip()"></p></td>
	  <td><p><textarea name="keywords" cols="49" rows="5"><?php echo $row['pagina_keywords']; ?></textarea></p></td>
    </tr>
    <tr bgcolor="#FFF5EC">
      <td valign="top">Subject <img style="cursor:help" alt="" height="16" src="panou/img/help.png" width="16" onmouseover="Tip('Subiectul site-ului, max 1 cuvant.')" onmouseout="UnTip()"></td>
      <td><input type="text" name="subject" size="65" value="<?php echo $row['pagina_subject']; ?>"/></td>    
	</tr>
   	<tr bgcolor="#F0F8FF">
      <td valign="top">Description <img style="cursor:help" alt="" height="16" src="panou/img/help.png" width="16" onmouseover="Tip('Descrierea: In acest paragraf este descris site-ul. Lungimea maxima este de 255 de caractere..')" onmouseout="UnTip()"></td>
      <td><textarea name="description" cols="49" rows="5"><?php echo $row['pagina_description']; ?></textarea></td>    
	</tr>
	<tr bgcolor="#FFF5EC">
      <td valign="top">Abstract <img style="cursor:help" alt="" height="16" src="panou/img/help.png" width="16" onmouseover="Tip('Abstract: scurt rezumat al paginii.')" onmouseout="UnTip()"></td>
      <td><textarea name="abstract" cols="49" rows="5"><?php echo $row['pagina_abstract']; ?></textarea></td>	
    
	<tr bgcolor="#F0F8FF">      
      <td valign="top" >Copyright <img style="cursor:help" alt="" height="16" src="panou/img/help.png" width="16" onmouseover="Tip('In mod normal numele dumneavoastra sau al firmei care detine site-ul.')" onmouseout="UnTip()"></td>
      <td><input type="text" name="copyright" size="65" value="<?php echo $row['pagina_copyright']; ?>"/></td>
    </tr>
    <tr>
	    <td valign="top">&nbsp;</td>
	    <td>&nbsp;</td>
    </tr>
  </table>
<input name="nume_pagina" type="hidden" value="<?php echo $_POST['paginaa']; ?>" />
<input name="save" type="submit" id="button" value="Salveaza Meta TAG-uri">
</form>