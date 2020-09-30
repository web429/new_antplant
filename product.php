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
	<!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<!-- Modernizer for Portfolio -->
	<script src="js/old/vendor/modernizr-2.6.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css">
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
			/* border-radius: 5%; */
		}
		.etc_img {
			width: 30%;
			/* border-radius: 5%; */
			/* margin-top: 10px;
			margin-left: 10px; */
		}
		.big-tagline p {
			font-size: 21px;
			text-align: left;
			margin: 0;
			line-height: inherit;
			color: #ffffff;
        }
        .review-loader {
            padding-right: 5px;
        }
	</style>
    </head>
	<?php include "language.php"; ?>
	<?php include "header.php"; ?>
	<body class="is-preload">
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <?php
                            $queryz1 = mysql_query ( " SELECT * FROM $tab_produse where id='".$_REQUEST['id']."' ");
                            $rowz1 = mysql_fetch_array($queryz1);
                        ?>
                        <a href="index.php"><i class="fa fa-home"></i> Home </a>
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
                        <span class="crumb" href="product.php?id=<?php echo $_REQUEST['id'] ?>&l=<?php echo $_REQUEST['l'] ?>&cat=<?php echo $_REQUEST['cat']?>">
                        <?php
                            $queryz1 = mysql_query ( " SELECT * FROM $tab_produse where id='".$_REQUEST['id']."' ");
                            $rowz1 = mysql_fetch_array($queryz1);
                            echo $rowz1['nume_en'];
                        ?>
                        </span>
                        <a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1" style="float:right;">View all MACHINES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Courses Details Section Begin -->
    <section class="course-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course__details__desc">
                        <div class="lp-slider owl-carousel">
                            <?php 
                                $queryzz = mysql_query ( " SELECT * FROM $tab_fisiere where tip='".$_REQUEST['id']."' order by id LIMIT 1 ,4 ");
                                while ( $rowzz = mysql_fetch_array($queryzz) ) {
                                ?>
                                <div class="lp-item">
                                    <a class="lp-pic" data-setbg="upload/">
                                    <div class="review-loader">
                                        <a href="<?php echo "upload/".$rowzz['numefisier'] ?>" rel="shadowbox['<?php echo $_REQUEST['id'] ?>']"><img src="<?php echo "upload/".$rowzz['numefisier'] ?>" alt="PENRITH PLANT LTD." class="etc_img"/></a>
                                    </div>
                                    </a>
                                </div>
                                <?php
                                }						
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="course__details__title">
                                    <h3><?php echo $rowz1[$nume]; ?></h3>
                                    <div class="price"><?php echo $rowz1['model'] ?></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="course__details__rating">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>( 25 Reviews )</p>
                                </div>
                            </div>
                        </div>
                        <p class="course__details__text">We provide free pick up and drop off at home or school for all
                            behind-the-wheel lessons. And, we offer a payment plan at no additional charge. Also, the
                            student will choose from one of the following driving programs: The Basic Course includes 6
                            hours of in-car driving & 6 hours of in-car observation; The Advantage Plus Program includes
                            8 hours of all private lessons (no need to do any observation); The Classic Experience
                            includes 12 hours of all private lessons. All programs earn state certification and meet all
                            high school graduation requirements. We also offer 25 and 50 hours behind-the-wheel
                            programs.</p>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-md-3 col-sm-6">
                                <div class="course__details__feature">
                                    <h5>Properties</h5>
                                    <ul>
                                        <li>
                                            <div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Engine: </div>
												<div class="col-sm-7">8.6</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Condition: </div>
												<div class="col-sm-7">8.0</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Transimission: </div>
												<div class="col-sm-7">8.3</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Capacity: </div>
												<div class="col-sm-7">9.2</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-md-3 col-sm-6">
                                <div class="course__details__feature">
                                    <h5>Eligibility Requirements</h5>
                                    <ul>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Stock No: </div>
												<div class="col-sm-7"><?php echo $rowz1['stock'] ?></div>
											</div>
                                        </li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Make: </div>
												<div class="col-sm-7"><?php echo $rowz1['make'] ?></div>
											</div>
                                        </li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Model: </div>
												<div class="col-sm-7"><?php echo $rowz1['model'] ?></div>
											</div>
                                        </li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Year: </div>
												<div class="col-sm-7"><?php echo $rowz1['year'] ?></div>
											</div>
                                        </li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Hours: </div>
												<div class="col-sm-7"><?php echo $rowz1['hours'] ?></div>
											</div>
                                        </li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Price: </div>
												<div class="col-sm-7"><?php echo $rowz1['price'] ?></div>
											</div>
                                        </li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Location: </div>
												<div class="col-sm-7"><?php echo $rowz1['location'] ?></div>
											</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="best-of-post">
                        <div class="section-title">
                        <h5>Best of</h5>
                        </div>
                        <?php 
                        $rating = 100;
                        $queryp = mysql_query ( " SELECT * FROM $tab_produse ORDER BY id LIMIT 0, 5");
                        while ( $rowp = mysql_fetch_array($queryp) ) {
                        $query2 = mysql_query ( " SELECT * FROM $tab_fisiere where tip = '".$rowp['id']."' ");
                        $row2 = mysql_fetch_array($query2);
                        $while_cat = $_REQUEST['cat'];
                        $while_id = $rowp['id'];
                        $while_l = $_REQUEST['l'];
                        $rating = $rating - 3;
                        $show_rating = rand($rating, $rating + 3);
                        $pshow_rating = $show_rating / 10;
                        ?>
                        <div class="bp-item">
                            <div class="bp-loader">
                            <div class="loader-circle-wrap">
                                <div class="loader-circle">
                                <span class="circle-progress-1" data-cpid="id-1" data-cpvalue="<?php echo $show_rating;?>" data-cpcolor="#c20000"></span>
                                <div class="review-point"><?php echo $pshow_rating;?></div>
                                </div>
                            </div>
                            </div>
                            <div class="bp-text">
                            <h6><a href="product.php?cat=<?php echo $cat; ?>&id=<?php echo $while_id ?>&l=<?php echo $while_l; ?>"><?php echo $rowp['nume_en']; ?></a></h6>
                            <ul>
                                <li>by <span><?php echo $rowp['make'] ?></span></li>
                                <li><i class='fa fa-money'></i><?php echo $rowp['price'] ?> &pound;</li>
                                <li><i class='fa fa-calendar-o'></i><?php echo $rowp['year'] ?></li>
                            </ul>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Courses Details Section End -->
                               
        <?php include "page-footer.php";?>
		<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
		<script type="text/javascript">
            Shadowbox.init();
		</script>
        <?php include "footer.php" ?>

