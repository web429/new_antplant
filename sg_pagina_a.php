<?php
if (!isset($_COOKIE['loggedin']))
{
include "panou/header.php";
echo "Nu sunteti autentificat!<br><a href=admin.php>Click aici</a>";
include "panou/footer.php";
die;
}
include "panou/config.php";
$con = mysql_connect($server,$db_user,$db_pass) or die('Eroare conexiune MySQL');
mysql_select_db($database) or die("Eroare conectare baza de date.");

if (isset($_REQUEST['sterge'])) {
mysql_query("delete from $tab_pagini where pagina_id='".$_REQUEST['sterge']."'") or die ("Eroare: ".mysql_error());
}

if (isset($_POST['save_modificari'])) {
mysql_query("update $tab_pagini set nume_en='".$_REQUEST['nume_en']."' ,
									nume_de='".$_REQUEST['nume_de']."' ,
									nume_fr='".$_REQUEST['nume_fr']."' , 
									nume_es='".$_REQUEST['nume_es']."'  where pagina_id='".$_REQUEST['submeniu_ascunsa']."'") or die ("Eroare: ".mysql_error());
}
if (isset($_REQUEST['modifica'])) {
$result = mysql_query("select * from $tab_pagini where pagina_id='".$_REQUEST['modifica']."'") or die ("Eroare: ".mysql_error());
$row = mysql_fetch_array($result);
?>
<br />



<form action="sg_index.php?pagina=sg_pagina_a&modifica=<? echo $_REQUEST['modifica'] ?>" method="post">
<p><strong>Editare Pagini</strong></p>
<p>Nume Pagina ( EN )<br /><input name="nume_en" type="text" style="width:350px" value="<?php echo $row['nume_en'] ?>"/></p>
<p>Nume Pagina ( DE )<br /><input name="nume_de" type="text" style="width:350px" value="<?php echo $row['nume_de'] ?>"/></p>
<p>Nume Pagina ( ES )<br /><input name="nume_es" type="text" style="width:350px" value="<?php echo $row['nume_es'] ?>"/></p>
<p>Nume Pagina ( FR )<br /><input name="nume_fr" type="text" style="width:350px" value="<?php echo $row['nume_fr'] ?>"/></p>
<input type="hidden" name="oferta" value="0" />

<input name="submeniu_ascunsa" type="hidden" value="<?php echo $row['pagina_id']; ?>">
<p><input name="save_modificari" type="submit" value="Salveaza"></p>
</form>
<?php
$result = mysql_query("select * from $tab_pagini where nume_en='".$nume_en."'") or die (mysql_error());
}


else {

if (isset($_POST['save'])) {
	if ($_POST['nume_en']<>"") {
		$nume_en = $_POST['nume_en'];
		$nume_de = $_POST['nume_de'];
		$nume_es = $_POST['nume_es'];
		$nume_fr = $_POST['nume_fr'];

		$result = mysql_query("select * from $tab_pagini where nume_en='".$nume_en."'") or die (mysql_error());
		if (mysql_num_rows($result)<>0) {
			echo "<p style=\"color:#CC0000\">Pagina cu numele <strong>".$nume_en."</strong> exista !</p>";
		}
		else {
			if(!get_magic_quotes_gpc()) {
				$nume_en=addslashes($nume_en);
				$nume_de=addslashes($nume_de);
				$nume_es=addslashes($nume_es);
				$nume_fr=addslashes($nume_fr);
			}
			mysql_query("insert into $tab_pagini (nume_en,nume_de,nume_es,nume_fr) values ('$nume_en','$nume_de','$nume_es','$nume_fr') ") or die ("Eroare: ".mysql_error());
			
		}	
		unset($_POST['save']);
	}
	else {echo "<br /><p style=\"color:#CC0000\">Completati Numele paginii !</p>";}
}
//$result = mysql_db_query($database, "select * from $tab_submeniu") or die ("Eroare: ".mysql_error());
?>
<br />

<form action="sg_index.php?pagina=sg_pagina_a" method="post">

<p>Nume Pagina ( EN )<br /><input name="nume_en" type="text" style="width:350px"/></p>
<p>Nume Pagina ( DE )<br /><input name="nume_de" type="text" style="width:350px"/></p>
<p>Nume Pagina ( ES )<br /><input name="nume_es" type="text" style="width:350px"/></p>
<p>Nume Pagina ( FR )<br /><input name="nume_fr" type="text" style="width:350px"/></p>
<input type="hidden" name="oferta" value="0" />


<p><input name="save" type="submit" value="adauga pagina"></p>
</form>
<br/>
<br/>
<?php
}
$result = mysql_query("select * from $tab_pagini where pagina_parent<>'999' ORDER BY pagina_id ") or die ("Eroare: ".mysql_error());
if (mysql_num_rows($result)<>0) {
?>

<table width="500" border="1">
  <tr>
	<th width="100" scope="col" align="center">ID Pagina</th>
    <th width="170" scope="col" align="center">Nume Pagina</th>
	<th width="30" scope="col" >Modifica Pagina</th>
	<th width="30" scope="col" >Sterge</th>
  </tr>
   <?php
    //$result = mysql_db_query($database, "select * from $tab_submeniu") or die ("Eroare: ".mysql_error());
	while($row = mysql_fetch_array($result))
	{
    echo "<tr>";
	echo "<th scope=\"col\" align=\"right\">".$row['pagina_id']."</th>";
	echo "<th scope=\"col\" align=\"left\">".$row['nume_en']."</th>";
	echo "<th scope=\"col\" align=\"center\"><a href=sg_index.php?pagina=sg_pagina_a&modifica=".$row['pagina_id']."><img alt=\"Modifica\" src=\"panou/img/edit.png\" border=\"0\" /></a></th>";
	echo "<th scope=\"col\" align=\"center\"><a href=sg_index.php?pagina=sg_pagina_a&sterge=".$row['pagina_id']."><img alt=\"Sterge\" src=\"panou/img/delete.png\" border=\"0\" /></a></th>";
    echo "</tr>";	
	}	
	
	}
	?>
</table>