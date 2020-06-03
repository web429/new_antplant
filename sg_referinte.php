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
	$result = mysql_query("select * from $tab_referinte where id='".$_REQUEST['sterge']."'") or die (mysql_error());
	$row = mysql_fetch_array($result);
		

mysql_query("delete from $tab_referinte where id='".$_REQUEST['sterge']."'") or die ("Eroare: ".mysql_error());
}

if (isset($_POST['save_modificari'])) {

mysql_query("update $tab_referinte set nume_ro='".$_REQUEST['nume_ro_modificata']."' , nume_en='".$_REQUEST['nume_en_modificata']."' where id='".$_REQUEST['submeniu_ascunsa']."'") or die ("Eroare: ".mysql_error());
}

if (isset($_REQUEST['modifica'])) {
$result = mysql_query("select * from $tab_referinte where id='".$_REQUEST['modifica']."'") or die ("Eroare: ".mysql_error());
$row = mysql_fetch_array($result);
?>
<br />



<form action="sg_index.php?pagina=sg_referinte" method="post" enctype="multipart/form-data">
<p><strong>Editare proiect</strong></p>
<p> Produs asociat <br/>
	<select DISABLED><option value="<? echo $row['tip'] ?>"><? echo $row['tip'] ?></option>
	</select></p>
<p>Nume proiect ( RO )<br /><input name="nume_ro_modificata" type="text" value="<?php echo $row['nume_ro']; ?>"></p>
<p>Nume proiect ( EN )<br /><input name="nume_en_modificata" type="text" value="<?php echo $row['nume_en']; ?>"></p>
<input name="submeniu_ascunsa" type="hidden" value="<?php echo $row['id']; ?>">
<p><input name="save_modificari" type="submit" value="Salveaza"></p>
</form>

<?php
$result = mysql_query("select * from $tab_referinte where nume_ro='".$nume_ro."'") or die (mysql_error());
}


else {

if (isset($_POST['save'])) {
	if ($_POST['nume_ro']<>"") {
		$nume_en = $_POST['nume_en'];
  		$nume_ro = $_POST['nume_ro'];  
		$tip = $_POST['tip'];
		$result = mysql_query("select * from $tab_referinte where nume_ro='".$nume_ro."'") or die (mysql_error());
		if (mysql_num_rows($result)<>0) {
			echo "<p style=\"color:#CC0000\">Categoria cu numele <strong>".$nume_ro."</strong> exista !</p>";
		}
		else {
			if(!get_magic_quotes_gpc()) {
				$nume_ro = addslashes($nume_ro);
				$nume_en = addslashes($nume_en);
			}
			mysql_query("insert into $tab_referinte (nume_ro,nume_en,tip) values ('$nume_ro','$nume_en','$tip')") or die ("Eroare: ".mysql_error());
		}	
		unset($_POST['save']);
	}
	else {echo "<br /><p style=\"color:#CC0000\">Completati numele proiectului</p>";}
}
//$result = mysql_db_query($database, "select * from $tab_submeniu") or die ("Eroare: ".mysql_error());
?>
<br />
<form action="sg_index.php?pagina=sg_referinte" method="post" enctype="multipart/form-data">
<p><strong>Adaugare proiect nou </strong></p>
<p>Produs asociat <br/> 
	<select name="tip">
		<? $query = mysql_query ( " select * from $tab_produse ORDER BY nume_ro ");
		   while ( $row = mysql_fetch_array($query) ) { ?>
		   <option value="<? echo $row['nume_ro'] ?>"><? echo $row['nume_ro'] ?></option>
		   <?
		   }
		   ?>
		   
	</select></p>
<p>Nume proiect ( RO )<br /><input name="nume_ro" type="text"></p>
<p>Nume proiect ( EN )<br /><input name="nume_en" type="text"></p>
<p><input name="save" type="submit" value="Adauga proiect"></p>
</form>
<?php
}
$result = mysql_query("select * from $tab_referinte ORDER BY nume_ro ") or die ("Eroare: ".mysql_error());
if (mysql_num_rows($result)<>0) {
?>
<br/>
<br/>
<br/>
<table width="700" border="1">
  <tr>
    <th width="200" scope="col" align="center">Nume proiect ( RO )</th>
	<th width="200" scope="col" align="center">Nume proiect ( EN )</th>
	<th width="200" scope="col" align="center">Tip</th>
	<th width="30" scope="col" >Modifica proiect</th>
	<th width="30" scope="col" >Sterge </th>
  </tr>
   <?php
    //$result = mysql_db_query($database, "select * from $tab_submeniu") or die ("Eroare: ".mysql_error());
	while($row = mysql_fetch_array($result))
	{
    echo "<tr>";
	echo "<th scope=\"col\" align=\"left\">".$row['nume_ro']."</th>";
	echo "<th scope=\"col\" align=\"left\">".$row['nume_en']."</th>";
	echo "<th scope=\"col\" align=\"left\">".$row['tip']."</th>";
	echo "<th scope=\"col\" align=\"center\"><a href=sg_index.php?pagina=sg_referinte&modifica=".$row['id']."><img alt=\"Modifica\" src=\"edit.png\" border=\"0\" /></a></th>";
	echo "<th scope=\"col\" align=\"center\"><a href=sg_index.php?pagina=sg_referinte&sterge=".$row['id']."><img alt=\"Sterge\" src=\"delete.gif\" border=\"0\" /></a></th>";
    echo "</tr>";	
	}	
	
	}
	?>
</table>