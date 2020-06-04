<!-- Header -->
<style>
	ul.language_bar {
		list-style: none;
		padding: 0;
		width: 200px;
		float: right;
		/* margin-top: 35px; */
	}
	ul.language_bar li {
		display: inline-block;
	}
</style>
<!-- Humberger Menu Begin -->
<div class="humberger-menu-overlay"></div>
    <div class="humberger-menu-wrapper">
        <div class="hw-logo">
            <a href="index.php?l=<?php echo $_REQUEST['l'] ?>"><img src="img/f-logo.png" alt=""></a>
        </div>
        <div class="hw-menu mobile-menu">
            <ul>
			<?php
				$query = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent<>'999' ORDER BY pagina_id LIMIT 0 , 6 ");
				$nume = "nume_".$lang;
				while ( $row = mysql_fetch_array($query) ) { 
					if ($row['nume_en']<>"Our Stock") { ?>
						<li><a href="index.php?p=<?php echo $row[$nume]; ?>&l=<?php echo $_REQUEST['l'] ?>"><?php echo $row[$nume]; ?></a></li>
					<?php }
					else { ?>
						<li>
							<a href="#"><?php echo $row[$nume]; ?><i class="fa fa-angle-down"></i></a>
							<ul class="dropdown">
								<li href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1">All Categories</li>
								<?php 
								$query1 = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent='999' ORDER BY pagina_id LIMIT 0 , 4 ");
								$nume1 = "nume_".$lang;
								while ( $row1 = mysql_fetch_array($query1) ) { 
									?>
									<li>
									<a href="products.php?cat=<?php echo $row1['pagina_id'];  ?>&l=<?php echo $_REQUEST['l'] ?>&page=1"><span><?php echo $row1[$nume1];?></span></a>
									</li>
								<?php } ?>
								<li><a href="products.php?cat=stocklist&l=<?php echo $_REQUEST['l'] ?>&page=1"><span>More Categories</span></a></li>
							</ul>
						</li>
				<?php }
				} 
			?>
            </ul>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="hw-copyright">
            Copyright © 2020 freelancer.com All rights reserved
        </div>
        <div class="hw-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
		
        <div class="hw-insta-media">
            <div class="section-title">
                <h5>Instagram</h5>
            </div>
            <div class="insta-pic">
                <img src="assets/img/instagram/ip-1.jpg" alt="">
                <img src="assets/img/instagram/ip-2.jpg" alt="">
                <img src="assets/img/instagram/ip-3.jpg" alt="">
                <img src="assets/img/instagram/ip-4.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Humberger Menu End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="ht-options">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="ht-widget">
                            <ul>
                                <li><i class="fa fa-sun-o"></i> <span>20<sup>c</sup></span> London</li>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li class="signup-switch signup-open"><i class="fa fa-sign-out"></i> Login / Sign up
                                </li>
                            </ul>
                        </div>
                    </div>
					<div class="col-lg-6 col-md-4">
						<ul class="language_bar">
							<li><a href="index.php?l=de"><img style="width:32px; height:32px;" src="img/de.png" alt="tramz ltd" /></a></li>
							<li><a href="index.php?l=en"><img style="width:32px; height:32px;" src="img/en.png" alt="tramz ltd" /></a></li>
							<li><a href="index.php?l=es"><img style="width:32px; height:32px;" src="img/es.png" alt="tramz ltd" /></a></li>
							<li><a href="index.php?l=fr"><img style="width:32px; height:32px;" src="img/fr.png" alt="tramz ltd" /></a></li>
						</ul>
					</div>
                </div>
            </div>
        </div>
        <div class="logo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                       <a href="./index.html"><img src="assets/img/logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-options">
            <div class="container">
                <div class="humberger-menu humberger-open">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="nav-search search-switch">
                    <i class="fa fa-search"></i>
                </div>
                <div class="nav-menu">
                    <ul>
					<?php
						$query = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent<>'999' ORDER BY pagina_id LIMIT 0 , 6 ");
						$nume = "nume_".$lang;
						while ( $row = mysql_fetch_array($query) ) { 
							if ($row['nume_en']<>"Our Stock") { ?>
								<li><a href="index.php?p=<?php echo $row[$nume]; ?>&l=<?php echo $_REQUEST['l'] ?>"><span><?php echo $row[$nume]; ?></span></a></li>
							<?php }
							else { ?>
								<li>
									<a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1"><span><?php echo $row[$nume]; ?><i class="fa fa-angle-down"></i></span></a>
									<ul class="dropdown">
										<?php 
										$query1 = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent='999' ORDER BY pagina_id LIMIT 0 , 4 ");
										$nume1 = "nume_".$lang;
										while ( $row1 = mysql_fetch_array($query1) ) { 
											?>
											<li>
											<a href="products.php?cat=<?php echo $row1['pagina_id'];  ?>&l=<?php echo $_REQUEST['l'] ?>&page=1"><?php echo $row1[$nume1];?></a>
											</li>
										<?php } ?>
										<li><a href="products.php?cat=stocklist&l=<?php echo $_REQUEST['l'] ?>&page=1">More Categories</a></li>
									</ul>
								</li>
						<?php }
						} 
					?>
                    </ul>
                </div>
            </div>
        </div>
    </header>