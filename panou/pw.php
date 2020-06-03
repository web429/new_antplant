<?php
include "config.php";
$con = mysql_connect($server,$db_user,$db_pass);
if (!$con)
  {
  die('Eroare conectare la baza de date: ' . mysql_error());
  }
  
  
 $sql="INSERT INTO $xtable (nume, parola) VALUES ('admin', '".md5("123456")."')";

 		if(mysql_query($sql,$con))
			{echo "Admin si parola adaugata";}
		else
			{echo "Eroarea adaugare admin si parola";} 

		?>