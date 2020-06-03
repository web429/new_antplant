```<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include("panou/config.php");
if (!isset($_COOKIE['loggedin']))
{
include "sg_header.php";
echo "<br /><p class=\"continut\">Nu sunteţi autentificat!</p>";
echo "<p class=\"continut\">Pentru a vă autentifica <a href=panou/index.php>(click aici).</a></p>";
include "sg_footer.php";
die;
}
?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="ro" http-equiv="Content-Language" />
<?php
$link = mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
mysql_select_db($database) or die("Eroare conectare baza de date.");
$result = mysql_query("select * from $xtable");
$row = mysql_fetch_array($result);
?>
<title><?php echo $row['firma_nume']." - ".$row['firma_slogan']; ?></title>
<link href="css/sg_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>

<script src="js/tooltip/wz_tooltip.js" type="text/javascript"></script>
<table cellpadding="0" cellspacing="0" class="margine" style="width: 100%">
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td class="table_margine_dr_gri" style="width: 160px">
		<h1 class="c3soft">Studiographic</h1>
		<h1 class="c3soft_slogan">CMS</h1>
		</td>
		<td style="width: 710px; background-color: #336699">
		<h1 class="company"><?php echo $row['firma_nume']; ?></h1>
		<h1 class="logo">Panou de administrare</h1>
		</td>
		<td style="background-color: #336699">&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td class="table_margine_dr_gri" style="width: 160px; vertical-align: top">
		<div class="meniu_div">
			<p class="meniu_grup">Home</p>
			<p class="meniu_id">
			<a href="sg_index.php" style="background-image: url('panou/img/home.png')">
			Pagina de start</a></p>
			<p class="meniu_id">
			<a href="index.php" style="background-image: url('panou/img/web.png')" target="_blank">
			Vizualizare site</a></p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_setari" style="background-image: url('panou/img/settings.png')">
			Setări generale</a></p>
			<p class="meniu_grup">Pagini</p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_pagini" style="background-image: url('panou/img/web_edit.png')">
			Editare pagini</a></p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_metataguri" style="background-image: url('panou/img/web_edit.png')">
			Editare metataguri</a></p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_pagina_a" style="background-image: url('panou/img/web.png')">
			Adaugare Pagini</a></p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_pagina_cat" style="background-image: url('panou/img/category.png')">
			Adaugare Categorii</a></p>
			<p class="meniu_grup">Produse</p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_pagina_cat" style="background-image: url('panou/img/category.png')">
			Adaugare Categorii</a></p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_produse" style="background-image: url('panou/img/web.png')">
			Adaugare Produse</a></p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_produse_a" style="background-image: url('panou/img/web_edit.png')">
			Editare Produse</a></p>
			<p class="meniu_grup">Galerie</p>
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_imagini_a" style="background-image: url('panou/img/addpic.png')">
			Adaugare Imagini</a></p> 
			<p class="meniu_id">
			<a href="sg_index.php?pagina=sg_imagini_s" style="background-image: url('panou/img/addpic.png')">
			Sterge Imagini</a></p>
			<p class="meniu_grup">Ieşire</p>
			<p class="meniu_id">
			<a href="sg_logout.php" style="background-image: url('panou/img/logout.png')">
			Logout</a></p>
			<p class="meniu_grup"></p>
		</div>
		</td>
		<td style="width: 710px" valign="top">
		<div style="margin-left: 30px">
			<?php
		mysql_close($link);
		if(isset($_REQUEST["pagina"])) { 
			if($_REQUEST["pagina"] != "") {
				include($_REQUEST["pagina"].".php");
			}
		}
		else { ?><br />
			<p class="continut">Bine ati venit in panoul de administrare.</p>
			<p class="continut">Pentru editarea paginilor s-a folosit aplicatia
			<a href="http://tinymce.moxiecode.com" target="_blank">TinyMCE</a></p>
			<?php } ?></div>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td class="table_margine_dr_gri" style="width: 160px">&nbsp;</td>
		<td style="width: 710px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td class="table_margine_dr_gri" style="width: 160px">&nbsp;</td>
		<td style="width: 710px">
		<p class="status"><?php echo $status_msg; ?></p>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td class="table_margine_dr_gri" style="width: 160px">&nbsp;</td>
		<td style="width: 710px">
		<p class="copyright">Copyright (c) 2010
		<a href="http://www.studiographic.ro" target="_blank">Studiographic</a></p>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="table_dr_gri">&nbsp;</td>
		<td class="table_margine_dr_gri" style="width: 160px">&nbsp;</td>
		<td style="width: 710px">&nbsp; </td>
		<td>&nbsp;</td>
	</tr>
</table>

</body>

</html>
