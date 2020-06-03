<?php
include("panou/config.php");
// connect to the mysql server
$link = mysql_connect($server, $db_user, $db_pass) or die ("Eroare la conectare MySQL: ".mysql_error());

// select the database
if (mysql_select_db($database))
{
	$match = "select * from $xtable where nume ='".$_POST['username']."' and parola = '".md5($_POST['password'])."'"; 
	$qry = mysql_query($match) or die ("Eroare: ".mysql_error());
	$num_rows = mysql_num_rows($qry); 

	if ($num_rows <= 0) 
	{
		$qry = mysql_query($match) or die ("Eroare: ".mysql_error());
		$num_rows = mysql_num_rows($qry); 
		$mesaj = "<p class=\"continut\">Utilizator sau parola incorecte</p>";
		$mesaj .= "<p class=\"continut\"><b><a href=panou/index.php>Incerca din nou</a></b></p>";
		$rec = 1;
	}
	else 
	{
		setcookie("loggedin", "TRUE", time()+(3600 * 24));
		setcookie("mysite_username", $_POST['username']);
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		header( 'Location: sg_index.php' ) ;
	} 

}
$result = mysql_query("select * from $xtable");
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<meta http-equiv="Content-Language" content="ro" />
<title><?php echo $row['firma_nume']." - ".$row['firma_slogan']; ?></title>
<link rel="stylesheet" href="css/sg_admin.css" type="text/css" />
</head>

<body>

<table style="width: 100%" cellspacing="0" cellpadding="0" class="margine">
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td style="width: 150px" class="table_margine_dr_gri">
		<h1 class="c3soft">C3 Soft</h1>
		<h1 class="c3soft_slogan">Content Management System v<?php echo $versiune; ?></h1>
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
		<div style="margin-left:30px">
		<?php 
		echo $mesaj; 
		if ($rec == 1) { ?>
		<div class="login" style="width: 260px">
			<form action="sg_recpas.php" method="post">
				<p>Recuperare parola</p>
				<p>Utilizator<br /> <input name="utilizator" type="text" /></p>
				<p><input name="recuperare" type="submit" value="Recuperare" /></p>
			</form>
		</div>
		<?php
		}
		?>
		</div>
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
		<p class="copyright">Copyright (c) 2007 <a  target="_blank" href="http://www.webdesigntm.uv.ro">C3 Soft</a></p>
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