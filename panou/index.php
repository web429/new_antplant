<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("config.php");
$link = mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
mysql_select_db($database) or die("Eroare conectare baza de date.");
if ($result = mysql_query("select * from $xtable")) {
	$row = mysql_fetch_array($result);
}
else {
	$mesaj = "<p class=\"continut\">Aplicatia nu este instalata.</p>";
	$mesaj .= "<p class=\"continut\">Apasati butonul de mai jos pentru a crea tabelele necesare functionarii.</p>";
	$mesaj .= "<form action=\"install.php\" method=\"post\">";
	$mesaj .= "<p class=\"continut\"><input type=\"submit\" value=\"Instaleaza\"></p>";
	$mesaj .= "</form>";
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<meta http-equiv="Content-Language" content="ro" />
<title><?php echo $row['firma_nume']." - ".$row['firma_slogan']; ?></title>
<link rel="stylesheet" href="admin.css" type="text/css" />
</head>

<body>

<table style="width: 100%" cellspacing="0" cellpadding="0" class="margine">
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td style="width: 150px" class="table_margine_dr_gri">
		<h1 class="c3soft">Studiographic</h1>
		<h1 class="c3soft_slogan">CMS</h1>
		</td>
		<td style="width: 600px; background-color:#336699">
		<h1 class="company"><?php echo $row['firma_nume']; ?></h1>
		<h1 class="logo">Panou de administrare</h1>
		</td>
		<td style="background-color:#336699">&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td style="width: 150px" class="table_margine_dr_gri">&nbsp;</td>
		<td style="width: 600px" valign="top">
		<br />
		<?php 
		if (isset($mesaj)) {echo $mesaj;}			
		else {
		?>
		<div style="margin-left:30px">
		<form action="../sg_login.php" method="post">
		<table width="300">
		<tr>
			<td style="text-align:right; width:53px">Utilizator</td>
		    <td style="width:235px"><input type="text" name="username" size="20" /></td>
		</tr>
	    <tr>
    		<td align="right">Parola</td>
		    <td><input type="password" name="password" size="20" /></td>
	    </tr>
    	<tr>
      		<td>&nbsp;</td>
		    <td><input type="submit" value="Login" /></td>
	    </tr>
		</table>
		</form>
		</div>
		<?php } ?>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td style="width: 150px" class="table_margine_dr_gri">&nbsp;</td>
		<td style="width: 600px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td style="width: 150px" class="table_margine_dr_gri">&nbsp;</td>
		<td style="width: 600px">
		<p class="copyright">Copyright (c) 2010 <a target="_blank" href="http://www.studiographic.ro">Studiographic</a></p>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td style="width: 150px" class="table_margine_dr_gri">&nbsp;</td>
		<td style="width: 600px">&nbsp;
		</td>
		<td>&nbsp;</td>
	</tr>
</table>
</body>
</html>