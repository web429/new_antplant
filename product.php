<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
<?php
include "panou/config.php";
$link = mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
mysql_select_db($database) or die("Eroare conectare baza de date.");

if (!isset($_REQUEST['id'])) {
	
}
else {
$_REQUEST['id'] = strip_tags ($_REQUEST['id']);
$_REQUEST['id'] = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);
}
if (!isset($_REQUEST['l'])) {
	$_REQUEST['l'] = "en";
}
else {
$_REQUEST['l'] = strip_tags ($_REQUEST['l']);
$_REQUEST['l'] = htmlspecialchars($_REQUEST['l'], ENT_QUOTES);
}

$cat = $_REQUEST['cat'];
$lang = $_REQUEST['l'];

if ($cat<>"all")
$result = mysql_query("select * from $tab_pagini where pagina_id='".$_REQUEST['cat']."'");
else
$result = mysql_query("select * from $tab_pagini where nume_en='Stocklist'");
$row=mysql_fetch_array($result);
echo "<title>".$row['pagina_title']."</title>\n";
echo "<meta name=\"keywords\" content=\"".$row['pagina_keywords']."\" />\n";
echo "<meta name=\"subject\" content=\"".$row['pagina_subject']."\" />\n";
echo "<meta name=\"description\" content=\"".$row['pagina_description']."\" />\n";
echo "<meta name=\"abstract\" content=\"".$row['pagina_abstract']."\" />\n";
echo "<meta name=\"copyright\" content=\"".$row['pagina_copyright']."\" />\n";
?>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/favicon.png">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="css/custom.css">

	<script src="js/old/vendor/modernizr-2.6.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css">
    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

	
<?php
	function curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
?>
<?php
	if (isset($_POST['submit'])) {
		$price = $_POST['price'];
		$email = $_POST['email'];
		
		$queryz = mysql_query ( " SELECT * FROM $xtable ");
		$rowz = mysql_fetch_array($queryz);
		$to = $rowz['email_contact'];
		
		$subject = 'Offer for a machine';
		$message = "Machine:&nbsp;&nbsp;&nbsp;".curPageUrl()."\r\n";
		$message .="Offer:&nbsp;&nbsp;&nbsp;";
		$message .= $price;
		$headers = 'From:'.$email. "\r\n" .
			'Reply-To:'.$email. "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		if (mail($to, $subject, $message, $headers)) {
			echo "<script type=\"text/javascript\">alert('Offer sent!')</script>";
		}
		else {
			echo "<script type=\"text/javascript\">alert('Unable to send offer at this time!')</script>";
		}
	}

?>
	<style>		
		.main_img {
			width: 100%;
			border-radius: 5%;
		}
		.etc_img {
			width: 30%;
			border-radius: 5%;
			margin-top: 10px;
		}
		.big-tagline p {
			font-size: 21px;
			text-align: left;
			margin: 0;
			line-height: inherit;
			color: #ffffff;
		}
	</style>
    </head>
	<body class="is-preload">
	<div id="wrapper">
		<div id="main">
			<div class="inner">
				<?php include "language.php"; ?>
				<?php include "header.php"; ?>
				
				<div class="row">
					<p style="width:100%;">You are here now: <a class="crumb" href="index.php">Home ></a>
					<a class="crumb" href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1">
					<?php $queryz = mysql_query( " SELECT * FROM $tab_produse ");
						?>
					Stocklist (<?php echo mysql_num_rows($queryz) ?>) >
					</a>
					<a class="crumb" href="products.php?cat=<?php echo $_REQUEST['cat'] ?>&l=<?php echo $_REQUEST['l'] ?>&page=1"> 
					<?php $queryz = mysql_query( " SELECT * FROM $tab_produse where parinte='".$_REQUEST['cat']."'");
						?>
					<?php
						$queryz1 = mysql_query ( " SELECT * FROM $tab_pagini where pagina_id='".$_REQUEST['cat']."' ");
						$rowz1 = mysql_fetch_array($queryz1);
						$nume = "nume_".$_REQUEST['l'];
						echo $rowz1[$nume];
					?>
					(<?php echo mysql_num_rows($queryz) ?>) >
					</a>
					<a class="crumb" href="product.php?id=<?php echo $_REQUEST['id'] ?>&l=<?php echo $_REQUEST['l'] ?>&cat=<?php echo $_REQUEST['cat']?>">
					<?php
						$queryz1 = mysql_query ( " SELECT * FROM $tab_produse where id='".$_REQUEST['id']."' ");
						$rowz1 = mysql_fetch_array($queryz1);
						echo $rowz1['nume_en'];
					?>
					</a>
					<a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1" style="float:right;">View all MACHINES</a>
					</p>
				</div>
				<section class="left-image" style="margin-top:20px;">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-7 col-sm-12">
							<?php 
								$queryzz = mysql_query ( " SELECT * FROM $tab_fisiere where tip='".$_REQUEST['id']."' order by id LIMIT 0 ,1 ");
								$rowzz = mysql_fetch_array($queryzz);
							
							?>
							<a href="<?php echo "upload/".$rowzz['numefisier'] ?>" rel="shadowbox['<?php echo $_REQUEST['id'] ?>']"><img src="<?php echo "upload/".$rowzz['numefisier'] ?>" alt="ANT PLANT LTD." class="main_img"/></a><br/>
							
							<?php 
								$queryzz = mysql_query ( " SELECT * FROM $tab_fisiere where tip='".$_REQUEST['id']."' order by id LIMIT 1 ,4 ");
								while ( $rowzz = mysql_fetch_array($queryzz) ) {
								?>
								<a href="<?php echo "upload/".$rowzz['numefisier'] ?>" rel="shadowbox['<?php echo $_REQUEST['id'] ?>']"><img src="<?php echo "upload/".$rowzz['numefisier'] ?>" alt="ANT PLANT LTD." class="etc_img"/></a>
								<?php
								}						
							?>
							</div>
							<div class="col-md-5 col-sm-12">
								<div class="right-content">
								<h3>General Information</h3>
								<table>
									<tr>
										<td>Stock No:</td>
										<td ><?php echo $rowz1['stock'] ?></td>
									</tr>
									<tr>
										<td>Make:</td>
										<td><?php echo $rowz1['make'] ?></td>
									</tr>
									<tr>
										<td>Model:</td>
										<td><?php echo $rowz1['model'] ?></td>
									</tr>
									<tr>
										<td>Year:</td>
										<td><?php echo $rowz1['year'] ?></td>
									</tr>
									<tr>
										<td>Hours:</td>
										<td><?php echo $rowz1['hours'] ?></td>
									</tr>
									<tr>
										<td>Price:</td>
										<td><?php echo $rowz1['price'] ?> &pound;</td>
									</tr>
									<tr>
										<td>Location:</td>
										<td><?php echo $rowz1['location'] ?></td>
									</tr>
								</table>
								<hr>
								<h4>Specifications</h4>
								<div style="margin-left:15px"><?php
									$specs= "specs_".$_REQUEST['l'];
									echo $rowz1[$specs];
								?></div>
								<div>
									<button id='print'><i class='fa fa-print'></i> Print this page</button>
									<button onclick="location.href='mailto:?Subject=I found this great machine!&Body=<?php echo curPageURL(); ?>'"><i class="fa fa-send"></i> Send to a friend</button>
								</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<?php include "sidebar.php"; ?>
	</div>
    
        				
		<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
		<script type="text/javascript">
		Shadowbox.init();
		</script>

		<?php include "footer.php" ?>
