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
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="assets/css/barfiller.css" type="text/css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
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
			margin-top: 10px;
			margin-left: 10px;
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
	<?php include "language.php"; ?>
	<?php include "header.php"; ?>
	<body class="is-preload">
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg spad" data-setbg="assets/img/top-image-old.jpg">
		<div style="width:100%;height:100%;background-color: rgba(0, 0, 0, 0.5);padding:100px 0;">
			<div class="container">
			<div class="row">
				<div class="col-lg-12">
				<div class="breadcrumb-text">
					<?php
						$queryz1 = mysql_query ( " SELECT * FROM $tab_produse where id='".$_REQUEST['id']."' ");
						$rowz1 = mysql_fetch_array($queryz1);
					?>
					<h3 class="text-center"><?php echo $rowz1['nume_en'];?></h3>
					<div class="bt-option">
					<a href="index.php">Home ></a>
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
				</div>
				</div>
			</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->

	<!-- Latest Preview Section Begin -->
	<section class="latest-preview-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h5>Images</h5>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="lp-slider owl-carousel">
			<?php 
				$queryzz = mysql_query ( " SELECT * FROM $tab_fisiere where tip='".$_REQUEST['id']."' order by id LIMIT 1 ,4 ");
				while ( $rowzz = mysql_fetch_array($queryzz) ) {
				?>
				<div class="col-lg-3">
				  <div class="lp-item">
					<a class="lp-pic" data-setbg="upload/">
					  <div class="review-loader">
						  <a href="<?php echo "upload/".$rowzz['numefisier'] ?>" rel="shadowbox['<?php echo $_REQUEST['id'] ?>']"><img src="<?php echo "upload/".$rowzz['numefisier'] ?>" alt="ANT PLANT LTD." class="etc_img"/></a>
					  </div>
					</a>
				  </div>
				</div>
				<?php
				}						
			?>
        </div>
      </div>
    </div>
  </section>
  <!-- Latest Preview Section End -->
	<!-- Details Post Section Begin -->
    <section class="details-post-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="details-text">
                        <div class="dt-overall-rating">
                            <div class="or-heading">
                                <div class="or-item">
                                    <div class="or-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-2" data-cpid="id-5" data-cpvalue="85"
                                                    data-cpcolor="#c20000"></span>
                                                <div class="review-point">
                                                    <div>8.5</div>
                                                    <span>AVERAGE SCORE</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="or-text">
                                        <h5>Overall rating</h5>
                                        <div class="text-center">
											<button class="kill-btn" style="margin-bottom:10px;"><i class='fa fa-print'></i> <span>Print this Page</span></button>
											<button onclick="location.href='mailto:?Subject=I found this great machine!&Body=<?php echo curPageURL(); ?>';'" class="kill-btn"><i class="fa fa-send"></i> <span>Send to a friend</span></button>
										</div>
                                    </div>
                                </div>
                                <div class="or-skill">
                                    <div class="skill-item">
                                        <p>Engine</p>
                                        <div id="bar-1" class="barfiller">
                                            <span class="fill" data-percentage="80"></span>
                                            <div class="tipWrap" style="display: inline;">
                                                <span class="tip"></span>
                                                <span class="bar-point">8.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <p>Condition</p>
                                        <div id="bar-2" class="barfiller">
                                            <span class="fill" data-percentage="80"></span>
                                            <div class="tipWrap" style="display: inline;">
                                                <span class="tip"></span>
                                                <span class="bar-point">8.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <p>Transimission</p>
                                        <div id="bar-3" class="barfiller">
                                            <span class="fill" data-percentage="78"></span>
                                            <div class="tipWrap" style="display: inline;">
                                                <span class="tip"></span>
                                                <span class="bar-point">7.8</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <p>Capacity</p>
                                        <div id="bar-4" class="barfiller">
                                            <span class="fill" data-percentage="85"></span>
                                            <div class="tipWrap" style="display: inline;">
                                                <span class="tip"></span>
                                                <span class="bar-point">8.5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="or-qualities">
								<h5 style="color:white;">General Information</h5>
                                <div class="qualities-item">
                                    <ul>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Stock No: </div>
												<div class="col-sm-7"><?php echo $rowz1['stock'] ?></div>
											</li>
                                        <li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Make: </div>
												<div class="col-sm-7"><?php echo $rowz1['make'] ?></div>
											</li>
                                        <li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Model: </div>
												<div class="col-sm-7"><?php echo $rowz1['model'] ?></div>
											</li>
                                        <li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Year: </div>
												<div class="col-sm-7"><?php echo $rowz1['year'] ?></div>
											</li>
                                        <li>
                                    </ul>
                                </div>
                                <div class="qualities-item">
                                    <ul>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Hours: </div>
												<div class="col-sm-7"><?php echo $rowz1['hours'] ?></div>
											</li>
                                        <li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Price: </div>
												<div class="col-sm-7"><?php echo $rowz1['price'] ?></div>
											</li>
                                        <li>
                                        <li>
											<div class="row">
												<div class="col-sm-5"><i class="fa fa-check"></i> Location: </div>
												<div class="col-sm-7"><?php echo $rowz1['location'] ?></div>
											</li>
                                        <li>
                                    </ul>
                                </div>
                            </div>
                            <div class="or-qualities">
								<h5 style="color:white;">Specifications</h5>
                                <div>
								<?php
									$specs= "specs_".$_REQUEST['l'];
									echo $rowz1[$specs];
								?>
								</div>
                            </div>
                            <div class="or-rating">
                                <p><span>User Rating:</span> 4.5/5 ( 23 votes )</p>
                                <div class="rating-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="dt-share">
                            <div class="ds-title">Share</div>
                            <div class="ds-links">
                                <a href="#" class="wide"><i class="fa fa-heart-o"></i><span>120</span></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                        <div class="dt-comment">
                            <h4>3 comment</h4>
                            <div class="dc-item">
                                <div class="dc-pic">
                                    <img src="img/details/comment/comment-1.jpg" alt="">
                                </div>
                                <div class="dc-text">
                                    <h5>Brandon Kelley</h5>
                                    <span class="c-date">15 Aug 2017</span>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                        dolore magnam.</p>
                                    <a href="#" class="reply-btn"><span>Reply</span></a>
                                </div>
                            </div>
                            <div class="dc-item reply-item">
                                <div class="dc-pic">
                                    <img src="img/details/comment/comment-2.jpg" alt="">
                                </div>
                                <div class="dc-text">
                                    <h5>Brandon Kelley</h5>
                                    <span class="c-date">15 Aug 2017</span>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                        dolore magnam.</p>
                                    <a href="#" class="reply-btn"><span>Reply</span></a>
                                </div>
                            </div>
                            <div class="dc-item">
                                <div class="dc-pic">
                                    <img src="img/details/comment/comment-3.jpg" alt="">
                                </div>
                                <div class="dc-text">
                                    <h5>Matthew Nelson</h5>
                                    <span class="c-date">15 Aug 2017</span>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                        dolore magnam.</p>
                                    <a href="#" class="reply-btn"><span>Reply</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="dt-leave-comment">
                            <h4>Leave a comment</h4>
                            <form action="#">
                                <div class="input-list">
                                    <input type="text" placeholder="Name">
                                    <input type="text" placeholder="Email">
                                    <input type="text" placeholder="Website">
                                </div>
                                <textarea placeholder="Message"></textarea>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7">
                    <div class="sidebar-option">
                        <div class="social-media">
                            <div class="section-title">
                                <h5>Social media</h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="sm-icon"><i class="fa fa-facebook"></i></div>
                                    <span>Facebook</span>
                                    <div class="follow">1,2k Follow</div>
                                </li>
                                <li>
                                    <div class="sm-icon"><i class="fa fa-twitter"></i></div>
                                    <span>Twitter</span>
                                    <div class="follow">1,2k Follow</div>
                                </li>
                                <li>
                                    <div class="sm-icon"><i class="fa fa-youtube-play"></i></div>
                                    <span>Youtube</span>
                                    <div class="follow">2,3k Subs</div>
                                </li>
                                <li>
                                    <div class="sm-icon"><i class="fa fa-instagram"></i></div>
                                    <span>Instagram</span>
                                    <div class="follow">2,6k Follow</div>
                                </li>
                            </ul>
						</div>
						<div class="insta-media">
                            <div class="section-title">
                                <h5>Instagram</h5>
                            </div>
                            <div class="insta-pic">
                                <img src="img/instagram/ip-1.jpg" alt="">
                                <img src="img/instagram/ip-2.jpg" alt="">
                                <img src="img/instagram/ip-3.jpg" alt="">
                                <img src="img/instagram/ip-4.jpg" alt="">
                            </div>
                        </div>
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
        </div>
    </section>
    <!-- Details Post Section End -->
    
        <?php include "page-footer.php";?>
		<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
		<script type="text/javascript">
		Shadowbox.init();
		</script>

		<?php include "footer.php" ?>
