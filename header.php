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

	<!-- Offcanvas Menu Begin -->
	<div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__search">
            <i class="fa fa-search search-switch"></i>
        </div>
        <div class="offcanvas__logo">
            <a href="index.php?l=<?php echo $_REQUEST['l'] ?>"><img src="assets/img/logo.png" alt=""></a>
        </div>
        <nav class="offcanvas__menu mobile-menu">
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
								<li><a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1"><span>All Categories</span></a></li>
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
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </div>
        <!-- <div class="offcanvas__btn">
            <a href="#" class="primary-btn">Get Started</a>
        </div> -->
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
		<div class="ht-options">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="ht-widget">
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Working Hours: Monday - Friday, 9:00 AM ~ 16:00 PM</li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="header__logo">
                        <a href="index.php?l=<?php echo $_REQUEST['l'] ?>"><img src="assets/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
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
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <div class="header__right__search">
                            <i class="fa fa-search search-switch"></i>
                        </div>
                        <!-- <div class="header__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div> -->
                        <!-- <div class="header__right__btn">
                            <a href="#" class="primary-btn">Get Started</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>
	<!-- Header Section End -->