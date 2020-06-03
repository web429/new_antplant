<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"/><title>index</title>
<link rel="stylesheet" href="admin.css" type="text/css"/>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
</head>
<body>
<table cellpadding="0" cellspacing="0" class="margine" style="background-color: white; width: 100%;">
<tbody>
<tr>
<td class="table_dr_gri"></td>
<td class="table_margine_dr_gri" style="text-align: left; vertical-align: top; width: 150px;"></td>
<td style="width: 600px; ; background-color:#336699">
<h1 class="company">C3 Soft - CMS</h1>
<h1 class="logo">Instalare - Panou de administrare</h1></td>
<td style="background-color:#336699"></td>
</tr>
<tr>
<td class="table_dr_gri"></td>
<td class="table_margine_dr_gri" style="text-align: left; vertical-align: top; width: 150px;"></td>
<td style="text-align: left; vertical-align: top; width: 600px;">
<div style="margin-left:30px">
<?php
include "config.php";
$con = mysql_connect($server,$db_user,$db_pass);
if (!$con)
  {
  die('Eroare conectare la baza de date: ' . mysql_error());
  }

echo '<br />';
// Create database
if (mysql_query("CREATE DATABASE $database DEFAULT CHARACTER SET utf8",$con))
  {
  echo "Baza de date $database a fost creata";
  }
else
  {
  echo "Baza de date $database exista.";
  }

echo '<br />';

// Create table in my_db database
mysql_select_db($database, $con);


$result = mysql_query("SHOW TABLES LIKE '$tab_pagini'");
if (mysql_num_rows($result) == 1)
 {
 echo "Tabelul $tab_pagini exista";
 }
else
 {
 $sql = 'DROP TABLE IF EXISTS $tab_pagini';
 mysql_query($sql, $con );
$sql = "CREATE TABLE $tab_pagini (
	  pagina_id smallint(6) not null auto_increment,
   	  pagina_parent smallint(6) not null,
	  nume varchar(255) not null,
	  pagina_ordine smallint(6) not null,
  	  pagina_continut text not null,
	  pagina_title text not null,
   	  pagina_keywords text not null,	  
	  pagina_subject text not null,
	  pagina_description text not null,
	  pagina_abstract text not null,
	  pagina_copyright text not null,
	  primary key(pagina_id)) TYPE=MyISAM AUTO_INCREMENT=11";
 	if(mysql_query($sql,$con)) 
		{
		echo "Tabelul $tab_pagini a fost creat";
		}
	else 
		{echo "Tabelul $tab_pagini nu a fost creat";}
}
echo '<br />';

$result = mysql_query("SHOW TABLES LIKE '$tab_fisiere'");
if (mysql_num_rows($result) == 1)
 {
 echo "Tabelul $tab_fisiere exista";
 }
else
 {
 $sql = 'DROP TABLE IF EXISTS $tab_fisiere';
 mysql_query( $sql, $con );
 $sql = "CREATE TABLE $tab_fisiere (
	  id int(4) not null auto_increment, 		
	  tip text not null,
	  numefisier text not null,
	  numefisier1 text not null,	  
  	  descrierefisier_ro text not null,
  	  descrierefisier_en text not null,  	  
  	  primary key(id)) TYPE=MyISAM";
 	if(mysql_query($sql,$con))
		{echo "Tabelul $tab_fisiere a fost creat";}
		else
		{echo "Tabelul $tab_fisiere nu a fost creat";}
 }
echo '<br />';

$result = mysql_query("SHOW TABLES LIKE '$xtable'");
if (mysql_num_rows($result) == 1)
 {
 echo "Tabelul $xtable exista";
 }
else
 {
 $sql = 'DROP TABLE IF EXISTS $xtable';
	mysql_query( $sql, $con );
	$sql = "CREATE TABLE $xtable (
		nume text not null,
	  	parola text not null,
		email_contact text not null,	
		firma_nume text not null,
		firma_slogan text not null) TYPE=MyISAM";
 	if(mysql_query($sql,$con))
		{
		echo "Tabelul $xtable a fost creat";
		echo '<br />';
		$sql="INSERT INTO $xtable (nume, parola) VALUES ('admin', '".md5("123456")."')";
		if(mysql_query($sql,$con))
			{echo "Admin si parola adaugata";}
		else
			{echo "Eroarea adaugare admin si parola";} 
		}
	else
		{echo "Tabelul $xtable nu a fost creat";}
 }
  
echo '<br />';
echo "<p style=\"color: red\">Din motive de securitate va recomandam sa stergeti fisierul install.php</p>";
echo "<p style=\"color: red\">Pentru autentificare folositi Nume: admin si Parola: 123456</p>";
echo "<p style=\"color: red\">Dupa autentificare Numele si Parola pot fi schimbate</p>";
echo "<p style=\"color: red\">Pentru autentificare <a href=\"index.php\">click aici</a></p>";
mysql_close($con);
?>
</div></td>
<td></td>
</tr>
<tr>
<td class="table_dr_gri"></td>
<td class="table_margine_dr_gri" style="text-align: left; vertical-align: top;"></td>
<td style="width: 600px;">&nbsp;</td>
<td></td>
</tr>
<tr>
  <td class="table_dr_gri"></td>
  <td class="table_margine_dr_gri" style="text-align: left; vertical-align: top;"></td>
  <td style="width: 600px;">
  <p class="copyright">Copyright (c) 2007 
  <td></td>
</tr>
<tr>
  <td class="table_dr_gri"></td>
  <td class="table_margine_dr_gri" style="text-align: left; vertical-align: top;"></td>
  <td style="width: 600px;">&nbsp;</td>
  <td></td>
</tr>
</tbody>
</table>
<br />
</body>
</html>