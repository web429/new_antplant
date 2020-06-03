<?php
if (!isset($_COOKIE['loggedin']))
{
include "sg_header.php";
echo "Nu sunteti autentificat!<br /><a href=index.php>Click aici</a>";
include "sg_footer.php";
die;
}
include "panou/config.php";
mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
mysql_select_db($database) or die("Eroare conectare baza de date.");
$result = mysql_query("select * from $xtable") or die ("Eroare: ".mysql_error());
$row = mysql_fetch_array($result);

if ($_POST['send'])
{
   if ($_POST['newpassword1'] == '') {   
	   $result = mysql_query("update $xtable set nume ='".$_POST['username'].
		   "', email_contact ='".$_POST['email_contact'].
		   "', numar_contact ='".$_POST['numar_contact']."' , firma_nume ='".addslashes($_POST['firma_nume']).
		   "', firma_slogan ='".$_POST['firma_slogan'].
		   "'") or die ("Eroare: ".mysql_error());
		   $mesaj = "Salvare cu succes.";	   
	$result = mysql_query("select * from $xtable") or die ("Eroare: ".mysql_error());
   	$row = mysql_fetch_array($result);	   
   }
   else {
	   if ($_POST['newpassword1'] == $_POST['newpassword2']) {
	   $result = mysql_query("update $xtable set nume ='".$_POST['username'].
	   "', parola ='".md5($_POST['newpassword1']).
	   "', numar_contact='".$_POST['numar_contact']."' , email_contact ='".$_POST['email_contact'].
	   "'") or die ("Eroare: ".mysql_error());
	   $mesaj = "Salvare cu succes (parola a fost modificata).";
	   $result = mysql_query("select * from $xtable") or die ("Eroare: ".mysql_error());
	   $row = mysql_fetch_array($result);
	   }
	   else {
	   $mesaj = "Parola noua incorecta.";
	   }
   }
}
else
{
$mesaj = "";
}
?>
<p class="continut"></p>
<form action="sg_index.php?pagina=sg_setari" method="post">
	<table width="512">
		<tr>
			<td align="right" width="171"></td>
			<td width="325"><strong>Setari generale administrator</strong></td>
		</tr>
		<tr>
			<td align="right">Nume utilizator </td>
			<td>
			<input name="username" size="20" type="text" value="<?php echo $row['nume']; ?>" />
			<img alt="" height="16" onmouseout="UnTip()" onmouseover="Tip('Pentru a modifica nume &lt;b&gt;utilizator&lt;/b&gt; scrieti noul nume dupa care apasati butonul &lt;b&gt;Salveaza&lt;/b&gt;.')" src="panou/img/help.png" style="cursor: help" width="16"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><strong>Schimbare parola</strong></td>
		</tr>
		<tr>
			<td align="right">Parola noua </td>
			<td><input name="newpassword1" size="20" type="password">
			<img alt="" height="16" onmouseout="UnTip()" onmouseover="Tip('In cazul in care doriti modificarea parolei curente, aici introduceti &lt;b&gt;Parola noua&lt;/b&gt;. Apoi completati campul &lt;b&gt;Verificare parola noua&lt;/b&gt; cu aceeasi parola.')" src="panou/img/help.png" style="cursor: help" width="16"></td>
		</tr>
		<tr>
			<td align="right">Verificare parola noua </td>
			<td><input name="newpassword2" size="20" type="password">
			<img alt="" height="16" onmouseout="UnTip()" onmouseover="Tip('Daca ati modificat parola, confirmati parola noua dupa care apasati butonul &lt;b&gt;Salveaza&lt;/b&gt;.')" src="panou/img/help.png" style="cursor: help" width="16"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="right"></td>
			<td><strong>Setari email formular contact</strong></td>
		</tr>
		<tr>
			<td align="right">E-mail </td>
			<td>
			<input name="email_contact" size="20" type="text" value="<?php echo $row['email_contact']; ?>" />
			<img alt="" height="16" onmouseout="UnTip()" onmouseover="Tip('Adresa de e-mail utilizata pentru a primi email-uri direct de pe site, prin formularul de contact.')" src="panou/img/help.png" style="cursor: help" width="16"></td>
		</tr>
		<tr>
			<td align="right">Numar telefon</td>
			<td>
			<input name="numar_contact" size="20" type="text" value="<?php echo $row['numar_contact']; ?>" />
			<img alt="" height="16" onmouseout="UnTip()" onmouseover="Tip('Adresa de e-mail utilizata pentru a primi email-uri direct de pe site, prin formularul de contact.')" src="panou/img/help.png" style="cursor: help" width="16"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="right"></td>
			<td><strong>Alte setari</strong></td>
		</tr>
		<tr>
			<td align="right">Titlu website</td>
			<td>
			<input name="firma_nume" size="20" type="text" value="<?php echo $row['firma_nume']; ?>" />
			<img alt="" height="16" onmouseout="UnTip()" onmouseover="Tip('Introduceti titlul pentru website. Va aparea in partea de sus a paginilor.')" src="panou/img/help.png" style="cursor: help" width="16"></td>
		</tr>
		<tr>
			<td align="right">Subtitlu website</td>
			<td>
			<input name="firma_slogan" size="20" type="text" value="<?php echo $row['firma_slogan']; ?>" />
			<img alt="" height="16" onmouseout="UnTip()" onmouseover="Tip('Introduceti subtitlul pentru website. Va aparea in partea de sus a paginilor, imediat sub titlu.')" src="panou/img/help.png" style="cursor: help" width="16"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><input name="send" type="submit" value="Salveaza"></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td style="color: #CC0000"><?php echo $mesaj;?></td>
		</tr>
	</table>
</form>
<p></p>
