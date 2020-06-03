<?php
// expire cookie
setcookie ("loggedin", "", time() - 3600);
$mesaj = "<p class=\"continut\">Ati iesit din panoul de administrare.</p><br>";
$mesaj .= "<p class=\"continut\"><a href=\"index.php\">Autentificare noua</a></p><br>";
$mesaj .= "<p class=\"continut\"><a href=\"../index.php\">Pagina Firmei</a></p>";

include "sg_header.php";
echo $mesaj;
include "sg_footer.php";
?>
