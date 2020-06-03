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
$_REQUEST['p']="Stocklist";
if (!isset($_REQUEST['cat'])) {
	
}
else {
$_REQUEST['cat'] = strip_tags ($_REQUEST['cat']);
$_REQUEST['cat'] = htmlspecialchars($_REQUEST['cat'], ENT_QUOTES);
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
$page = $_REQUEST['page'];
$page_offset = 10 * ($page - 1);

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


    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>


    </head>
	<body class="is-preload">
	<div id="wrapper">
		<div id="main">
			<div class="inner">
			<?php include "language.php" ?>
			<?php include "header.php" ?>
				<h1><?php echo $_REQUEST['p'];?></h1>
				<div class="row">
					<p style="width:100%;">You are here now: <a class="crumb" href="index.php">Home ></a>
						
					<a class="crumb" href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1">
					<?php $queryz = mysql_query( " SELECT * FROM $tab_produse ");
						?>
					Stocklist (<?php echo mysql_num_rows($queryz) ?>) >
					</a>
					<?php if ($_REQUEST['cat']<>'all') { ?>
					<a class="crumb" href="#"> 
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
					<?php } ?>
					<a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1" style="float:right;">View all MACHINES</a>
					</p>
				</div>
				<?php
				if ($_REQUEST['cat'] <> 'stocklist') {
				?>
					<div class="row">
						<div class="alternate-table" style="margin-top:0;width:100%;">
							<table style="text-align:center;">
								<thead>
									<tr>
										<th style='text-align:center;'>Image</th>
										<th style='text-align:center;'>Product</th>
										<th style='text-align:center;'>Model</th>
										<th style='text-align:center;'>Year</th>
										<th style='text-align:center;'>Price</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if ($_REQUEST['cat']<>'all') { 
										$queryp = mysql_query ( " SELECT * FROM $tab_produse where parinte = '".$_REQUEST['cat']."' LIMIT ".$page_offset.", 10");
										while ( $rowp = mysql_fetch_array($queryp) ) { 
											$query2 = mysql_query ( " SELECT * FROM $tab_fisiere where tip = '".$rowp['id']."' ");
											$row2 = mysql_fetch_array($query2);
											$while_cat = $_REQUEST['cat'];
											$while_id = $rowp['id'];
											$while_l = $_REQUEST['l'];
								?>
											<tr style="cursor:pointer;" onclick="location.href='product.php?cat=<?php echo $cat; ?>&id=<?php echo $while_id ?>&l=<?php echo $while_l; ?>'">
												<td><img src="upload/<?php echo $row2['numefisier'] ?>" alt="ANT PLANT LTD" style="max-height:80px;width:auto;height:auto;"></td>
												<td><?php echo $rowp['make'] ?></td>
												<td><?php echo $rowp['model'] ?></td>
												<td><?php echo $rowp['year'] ?></td>
												<td><?php echo $rowp['price'] ?> &pound;</td>
											</tr>
								<?php } 
								} else {
									$queryp = mysql_query ( " SELECT * FROM $tab_produse ORDER BY id LIMIT ".$page_offset.", 10");
									while ( $rowp = mysql_fetch_array($queryp) ) {
										$query2 = mysql_query ( " SELECT * FROM $tab_fisiere where tip = '".$rowp['id']."' ");
										$row2 = mysql_fetch_array($query2);
										$while_cat = $_REQUEST['cat'];
										$while_id = $rowp['id'];
										$while_l = $_REQUEST['l'];
								?>
										<tr style="cursor:pointer;" onclick="location.href='product.php?cat=<?php echo $cat; ?>&id=<?php echo $while_id ?>&l=<?php echo $while_l; ?>'">
											<td><img src="upload/<?php echo $row2['numefisier'] ?>" alt="ANT PLANT LTD" style="max-height:80px;width:auto;height:auto;"></td>
											<td><?php echo $rowp['make'] ?></td>
											<td><?php echo $rowp['model'] ?></td>
											<td><?php echo $rowp['year'] ?></td>
											<td><?php echo $rowp['price'] ?> &pound;</td>
										</tr>
								<?php }
								}	
								?>
								</tbody>
							</table>
							<ul class="table-pagination">
								<?php
									if($page == 1) {
										echo "<li><a href='#'>Previous</a></li>";
									} else {
										$j = $page - 1;
										echo '<li><a href="products.php?cat='.$_REQUEST['cat'].'&l='.$_REQUEST['l'].'&page='.$j.'">Previous</a></li>';
									}
									if($_REQUEST['cat'] <> 'all') {
										$page_query = mysql_query("SELECT COUNT(id) AS count FROM ".$tab_produse." WHERE parinte='".$_REQUEST['cat']."'");
									} else {
										$page_query = mysql_query("SELECT COUNT(id) AS count FROM ".$tab_produse);
									}
									$total_num = mysql_fetch_array($page_query);
									$total_page = floor($total_num['count'] / 10) + 1;
									for($i = 1; $i <= $total_page; $i++){
										echo '<li><a href="products.php?cat='.$_REQUEST['cat'].'&l='.$_REQUEST['l'].'&page='.$i.'">'.$i.'</a></li>';
									}
									if($total_page == $page) {
										echo "<li><a href='#'>Next</a></li>";
									} else {
										$j = $page + 1;
										echo '<li><a href="products.php?cat='.$_REQUEST['cat'].'&l='.$_REQUEST['l'].'&page='.$j.'">Next</a></li>';
									}
								?>
							</ul>
						</div>
					</div>
				<?php	
				}
				?>
				
				<!-- Services -->
				<section class="services" style="margin-top:20px;">
					<div class="container-fluid">
						<div class="row">
							<?php
							if ($_REQUEST['cat']=='stocklist') { 
								$queryzzz = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent='999' ORDER BY pagina_id ");
								$nume = "nume_".$lang;
								$echoStr = "";
								while ( $row = mysql_fetch_array($queryzzz) ) { 
									$echoName = $row[$nume] ? $row[$nume] : $row['nume_en'];
									// $echoStr .= "<a href='products.php?cat=".$row['pagina_id']."&l=".$_REQUEST['l']."'>";
									$echoStr .= "<div class='col-md-4 col-sm-12'>
													<a href='products.php?cat=".$row['pagina_id']."&l=".$_REQUEST['l']."&page=1'>
													<div class='service-item first-item'>
														<div class='icon'></div>
														<h3>".$echoName."</h3>
													</div>
													</a>
												</div>";
									// $echoStr .= "</a>";
								} 
								// $echoStr .= '</div>';
								echo $echoStr;
							} ?>
						</div>
					</div>
				</section>
				
			</div>
		</div>

		<?php include "sidebar.php"; ?>
	</div>
<?php include "footer.php"; ?>