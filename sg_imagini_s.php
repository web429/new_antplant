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
if(isset($_POST['sterge']))
{
	$result = mysql_query("select * from $tab_fisiere where numefisier='".$_REQUEST['numele_fisierului_sters']."'") or die (mysql_error());
		if (mysql_num_rows($result) == 1) {
			echo "Imaginea cu numele <strong>".$_REQUEST['numele_fisierului_sters']."</strong> a fost stearsa";	
			unlink($ftp_upload.$_REQUEST['numele_fisierului_sters']);
	}		
mysql_query("delete from $tab_fisiere where numefisier='".$_REQUEST['numele_fisierului_sters']."' and tip = '".$_REQUEST['tipul_fisierului_sters']."'") or die ("Eroare: ".mysql_error());
}
?>
<br />
<br />

<table width="100%">
  <?php
  	$i = 0;
	$result = mysql_query("select * from $tab_fisiere") or die (mysql_error());
	while($row = mysql_fetch_array($result)) {
		if (fmod($i,5) == 0) {
			echo "<tr>";
		}
		$i = $i+1;
		echo "<td><img src=\"".$ftp_upload.$row['numefisier']."\" width=\"100\" height=\"80\" /> \n";
		echo "<br/>";
		$queryzz = mysql_query ( " SELECT * FROM $tab_produse where id='".$row['tip']."' ");
		$rowzz = mysql_fetch_array($queryzz);
		echo $rowzz['nume_en'];
		echo "<form action=\"sg_index.php?pagina=sg_imagini_s\" method=\"post\" style=\"padding: 0px; margin: 0px\">";
		echo "<input name=\"numele_fisierului_sters\" type=\"hidden\" value=\"".$row['numefisier']."\"> \n";
		echo "<input name=\"tipul_fisierului_sters\" type=\"hidden\" value=\"".$row['tip']."\"> \n";
		echo "<input name=\"sterge\" type=\"submit\" value=\"Sterge\"> \n";
		echo "</form> \n";		
		echo "<p style=\"font-size:10px\">Nume fisier: <strong>".$row['numefisier']."</strong></p> \n";

		if (fmod($i,5) == 0) {
			echo "</tr>";
			$i=0;
		}		
	}
	mysql_close($link);
	?>
</table>