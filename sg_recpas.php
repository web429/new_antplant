<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("panou/config.php");
$link = mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
mysql_select_db($database) or die("Eroare conectare baza de date.");
$result = mysql_query("select * from $xtable");
$row = mysql_fetch_array($result);
$_EMAIL_ =  $row['email_contact'];
?>
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
	if (isset($_POST['utilizator'])) {
		$result = mysql_query("select * from $xtable where nume = '".$_POST['utilizator']."'") or die ("Eroare: ".mysql_error());
		if (mysql_num_rows($result) == 1) {
				$row = mysql_fetch_array($result);
                // 1 trimite email la client              				
				$_EMAIL_ =  $row['email_contact'];
                $body = "Recuperare date logare.<br/> \n";
                $body.= "<br/> \n";
                $body.= "Utilizator - ".$row['nume']."<br/> \n";
                $body.= "Parola - ".$row['parola'];
                $headers = "From: [ Administrator ] \r\n";
				$headers .= "Reply-To: ".$_EMAIL_."\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1 ";
				$headers .= "MIME-Version: 1.0 ";

				include (dirname(__FILE__).'/mail.php');
				$send_email = new email_sender( array(	'to' => $_EMAIL_,
				    									'from' => "Administrator",
														'message' => $body,
														'subject' => 'Recuperare parola'." ( ".date("d.m.Y H:i")." )"
													) );
               // 0 trimite email la client            
			echo "Nnume utilizator si parola au fost trimise la emailul specificat de dumneavoastra in admin.";				
			echo "<p class=\"continut\"><b><a href=index.php>Inapoi la pagina de autentificare</a></b></p>";
		}
		else {
			echo "<p>Nume utilizator inexistent</p>";
			echo "<p class=\"continut\"><b><a href=sg_login.php>Incerca din nou</a></b></p>";
		}
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
		<p class="copyright">Copyright (c) 2007 <a target="_blank" href="http://www.webdesigntm.uv.ro">C3 Soft</a></p>
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