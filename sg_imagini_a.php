<?php
if (!isset($_COOKIE['loggedin']))
{
include "sg_header.php";
echo "Nu sunteti autentificat!<br /><a href=index.php>Click aici</a>";
include "sg_footer.php";
die;
}

include "panou/config.php";
$link = mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
mysql_select_db($database) or die("Eroare conectare baza de date.");
if (isset($_POST['save'])) {
  if ($_FILES['userfile']['name']<>"") {
	$uploaddir = $ftp_upload;
	$tip = $_POST['tip'];
	
	$nume_fisier= uniqid().basename($_FILES['userfile']['name']);
	$uploadfile = $uploaddir.$nume_fisier;
	
	$nume_fisier1= uniqid().basename($_FILES['userfile1']['name']);
	$uploadfile1 = $uploaddir.$nume_fisier1;
	
	$nume_fisier2= uniqid().basename($_FILES['userfile2']['name']);
	$uploadfile2 = $uploaddir.$nume_fisier2;
	
	$nume_fisier3= uniqid().basename($_FILES['userfile3']['name']);
	$uploadfile3 = $uploaddir.$nume_fisier3;
	
	$nume_fisier4= uniqid().basename($_FILES['userfile4']['name']);
	$uploadfile4 = $uploaddir.$nume_fisier4;
	
			move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
			chmod("$uploadfile",0777);
		    echo "<p style=\"color:#CC0000\">Fisier salvat cu succes.</p>";
			mysql_query("insert into $tab_fisiere (tip,numefisier) values ('$tip','$nume_fisier')") or die("Eroare: ".mysql_error());
			
			if ($_FILES['userfile1']['name']<>"") {
			move_uploaded_file($_FILES['userfile1']['tmp_name'], $uploadfile1);
			chmod("$uploadfile1",0777);
		    echo "<p style=\"color:#CC0000\">Fisier salvat cu succes.</p>";
			mysql_query("insert into $tab_fisiere (tip,numefisier) values ('$tip','$nume_fisier1')") or die("Eroare: ".mysql_error());
			}
			
			if ($_FILES['userfile2']['name']<>"") {
			move_uploaded_file($_FILES['userfile2']['tmp_name'], $uploadfile2);
			chmod("$uploadfile2",0777);
		    echo "<p style=\"color:#CC0000\">Fisier salvat cu succes.</p>";
			mysql_query("insert into $tab_fisiere (tip,numefisier) values ('$tip','$nume_fisier2')") or die("Eroare: ".mysql_error());
			}
			
			if ($_FILES['userfile3']['name']<>"") {
			move_uploaded_file($_FILES['userfile3']['tmp_name'], $uploadfile3);
			chmod("$uploadfile3",0777);
		    echo "<p style=\"color:#CC0000\">Fisier salvat cu succes.</p>";
			mysql_query("insert into $tab_fisiere (tip,numefisier) values ('$tip','$nume_fisier3')") or die("Eroare: ".mysql_error());
			}
			
			if ($_FILES['userfile4']['name']<>"") {
			move_uploaded_file($_FILES['userfile4']['tmp_name'], $uploadfile4);
			chmod("$uploadfile4",0777);
		    echo "<p style=\"color:#CC0000\">Fisier salvat cu succes.</p>";
			mysql_query("insert into $tab_fisiere (tip,numefisier) values ('$tip','$nume_fisier4')") or die("Eroare: ".mysql_error());
			}
	}
else {
	echo "<p style=\"color:#CC0000\">Alegeti un fisier</p>";
}
}
?>
<br />

<form action="sg_index.php?pagina=sg_imagini_a" method="post" enctype="multipart/form-data">
<table>
<col span="1" align="right">
<tr>
  <td>Imagine</td>
  <td>
  	<div align="left">
    	  <input name="MAX_FILE_SIZE" type="hidden" value="22097152" />
    	  <input name="userfile" type="file" />
		</div>  </td>
</tr>
<tr>
  <td>Imagine</td>
  <td>
  	<div align="left">
    	  <input name="MAX_FILE_SIZE" type="hidden" value="22097152" />
    	  <input name="userfile1" type="file" />
		</div>  </td>
</tr>
<tr>
  <td>Imagine</td>
  <td>
  	<div align="left">
    	  <input name="MAX_FILE_SIZE" type="hidden" value="22097152" />
    	  <input name="userfile2" type="file" />
		</div>  </td>
</tr>
<tr>
  <td>Imagine</td>
  <td>
  	<div align="left">
    	  <input name="MAX_FILE_SIZE" type="hidden" value="22097152" />
    	  <input name="userfile3" type="file" />
		</div>  </td>
</tr>
<tr>
  <td>Imagine</td>
  <td>
  	<div align="left">
    	  <input name="MAX_FILE_SIZE" type="hidden" value="22097152" />
    	  <input name="userfile4" type="file" />
		</div>  </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>
	
  </td>
</tr>

<tr>
	<td>Produs</td>
	<td>
	<select name="tip">
		<?php 
			$query = mysql_query ( " SELECT * FROM $tab_produse order by id ");
			while ( $row = mysql_fetch_array($query) ) {
			?>
			<option value="<?php echo $row['id']?>"><?php echo $row['nume_en'] ?></option>
			
			<?php }
		
		?>
	</select>
	</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><div align="left">
  <input name="save" type="submit" value="Adauga" />
</div></td>
</tr>
</table>
</form>





