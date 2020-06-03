<?php
include("panou/config.php");
$link = mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
mysql_select_db($database) or die("Eroare conectare baza de date.");
$result = mysql_query("select * from $xtable");
$row = mysql_fetch_array($result);
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<meta http-equiv="Content-Language" content="ro" />
<title><?php $row['firma_nume']." - ".$row['firma_slogan']; ?></title>
<link rel="stylesheet" type="text/css" href="css/sg_admin.css" />
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
		<div style="margin-left:30px">
