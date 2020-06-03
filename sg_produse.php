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
mysql_query("delete from $tab_produse where id='".$_REQUEST['sterge']."'") or die ("Eroare: ".mysql_error());
}

if (isset($_POST['save_modificari'])) {
mysql_query("update $tab_produse set nume_en='".$_REQUEST['nume_en']."' ,
									 stock='".$_REQUEST['stock']."' ,
									 model='".$_REQUEST['model']."' ,
									 make='".$_REQUEST['make']."' ,
									 year='".$_REQUEST['year']."' ,
									 hours='".$_REQUEST['hours']."' ,
									 price='".$_REQUEST['price']."' ,
									 parinte='".$_REQUEST['parinte']."' ,
									 location='".$_REQUEST['location']."' ,
									 featured = '".$_REQUEST['featured']."' where id='".$_REQUEST['submeniu_ascunsa']."'") or die ("Eroare: ".mysql_error());
}
if (isset($_REQUEST['modifica'])) {
$result = mysql_query("select * from $tab_produse where id='".$_REQUEST['modifica']."'") or die ("Eroare: ".mysql_error());
$row = mysql_fetch_array($result);
?>
<br />



<form action="sg_index.php?pagina=sg_produse&modifica=<? echo $_REQUEST['modifica'] ?>" method="post">
<p><strong>Editare Produs</strong></p>
<select name="parinte">
	<?
		$queryz = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent='999' ORDER BY pagina_id ");
		while ( $rowz = mysql_fetch_array($queryz) ) {
		?>
			<option value="<?php echo $rowz['pagina_id'] ?>" <?php if ($row['parinte']==$rowz['pagina_id']) echo "SELECTED" ?>><?php echo $rowz['nume_en'] ?></option>
		<?
		}
	?>
</select>
<p>Nume<br /><input name="nume_en" type="text" style="width:350px" value="<?php echo $row['nume_en'] ?>"/></p>
<p>Stock No.<br /><input name="stock" type="text" style="width:350px" value="<?php echo $row['stock'] ?>"/></p>
<p>Model<br /><input name="model" type="text" style="width:350px" value="<?php echo $row['model'] ?>"/></p>
<p>Make<br /><input name="make" type="text" style="width:350px" value="<?php echo $row['make'] ?>"/></p>
<p>Year<br /><input name="year" type="text" style="width:350px"  value="<?php echo $row['year'] ?>"/></p>
<p>Hours<br /><input name="hours" type="text" style="width:350px" value="<?php echo $row['hours'] ?>" /></p>
<p>Price<br /><input name="price" type="text" style="width:350px" value="<?php echo $row['price'] ?>" /></p>
<p>Location<br /><input name="location" type="text" style="width:350px" value="<?php echo $row['location'] ?>"/></p>
<p>Prima pagina?<input type="checkbox" name="featured" value="1" <?php if ($row['featured']=="1") echo "CHECKED"; ?>/></p>

<input name="submeniu_ascunsa" type="hidden" value="<?php echo $row['id']; ?>">
<p><input name="save_modificari" type="submit" value="salveaza"></p>
</form>
<?php
$result = mysql_query("select * from $tab_produse where nume_en='".$nume_en."'") or die (mysql_error());
}


else {

if (isset($_POST['save'])) {
	if ($_POST['nume_en']<>"") {
		$parinte = $_POST['parinte'];
		$nume_en = $_POST['nume_en'];
		$stock = $_POST['stock'];
		$model = $_POST['model'];
		$make = $_POST['make'];
		$year = $_POST['year'];
		$hours = $_POST['hours'];
		$price = $_POST['price'];
		$location = $_POST['location'];
		$featured = $_POST['featured'];

		$result = mysql_query("select * from $tab_produse where nume_en='".$nume_en."'") or die (mysql_error());
		if (mysql_num_rows($result)<>0) {
			echo "<p style=\"color:#CC0000\">Pagina cu numele <strong>".$nume_en."</strong> exista !</p>";
		}
		else {
			if(!get_magic_quotes_gpc()) {

				$nume_en=addslashes($nume_en);
				$stock = addslashes($stock);
				$model = addslashes($model);
				$make = addslashes($make);
				$year = addslashes($year);
				$hours = addslashes($hours);
				$price = addslashes($price);
				$location = addslashes($location);
			}
			mysql_query("insert into $tab_produse (nume_en,stock,model,make,year,hours,price,location,parinte,featured) values ('$nume_en','$stock','$model','$make','$year','$hours','$price','$location','$parinte','$featured') ") or die ("Eroare: ".mysql_error());
			
		}	
		unset($_POST['save']);
	}
	else {echo "<br /><p style=\"color:#CC0000\">Completati Numele paginii !</p>";}
}
//$result = mysql_db_query($database, "select * from $tab_submeniu") or die ("Eroare: ".mysql_error());
?>
<br />

<form action="sg_index.php?pagina=sg_produse" method="post">
<h1>adauga produs nou </h1>
<p>Categorie<br/>
<select name="parinte">
	<?
		$queryz = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent='999' ORDER BY pagina_id ");
		while ( $rowz = mysql_fetch_array($queryz) ) {
		?>
			<option value="<?php echo $rowz['pagina_id'] ?>"><?php echo $rowz['nume_en'] ?></option>
		<?
		}
	?>
</select></p>
<p>Nume<br /><input name="nume_en" type="text" style="width:350px"/></p>
<p>Stock No.<br /><input name="stock" type="text" style="width:350px"/></p>
<p>Model<br /><input name="model" type="text" style="width:350px"/></p>
<p>Make<br /><input name="make" type="text" style="width:350px"/></p>
<p>Year<br /><input name="year" type="text" style="width:350px"/></p>
<p>Hours<br /><input name="hours" type="text" style="width:350px"/></p>
<p>Price<br /><input name="price" type="text" style="width:350px"/></p>
<p>Location<br /><input name="location" type="text" style="width:350px"/></p>
<p>Prima pagina?<input type="checkbox" name="featured" value="1"/></p>
<input type="hidden" name="oferta" value="0" />


<p><input name="save" type="submit" value="adauga"></p>
</form>
<br/>
<br/>
<?php
}
$result = mysql_query("select * from $tab_produse  ORDER BY id ") or die ("Eroare: ".mysql_error());
if (mysql_num_rows($result)<>0) {
?>

<h1> lista produse </h1>
<table width="500" border="1">
  <tr>
	<th width="100" scope="col" align="center">ID</th>
    <th width="170" scope="col" align="center">Nume</th>
	<th width="30" scope="col" >Modifica</th>
	<th width="30" scope="col" >Sterge</th>
  </tr>
   <?php
    //$result = mysql_db_query($database, "select * from $tab_submeniu") or die ("Eroare: ".mysql_error());
	while($row = mysql_fetch_array($result))
	{
    echo "<tr>";
	echo "<th scope=\"col\" align=\"right\">".$row['id']."</th>";
	echo "<th scope=\"col\" align=\"left\">".$row['nume_en']."</th>";
	echo "<th scope=\"col\" align=\"center\"><a href=sg_index.php?pagina=sg_produse&modifica=".$row['id']."><img alt=\"Modifica\" src=\"panou/img/edit.png\" border=\"0\" /></a></th>";
	echo "<th scope=\"col\" align=\"center\"><a href=sg_index.php?pagina=sg_produse&sterge=".$row['id']."><img alt=\"Sterge\" src=\"panou/img/delete.png\" border=\"0\" /></a></th>";
    echo "</tr>";	
	}	
	
	}
	?>
</table>