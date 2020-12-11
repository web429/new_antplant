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
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="hw-copyright">
            Copyright © 2020 All rights reserved
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
	
	<header>
         <!-- header inner -->
         <div class="header">
            <div class="head_top" style = "padding:15px;">
               <div class="container">
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" >
                       <div class="top-box">
                       <div class="ht-widget">
                            <ul>
                                <li style="padding-top: 3px;"><i class="fa fa-clock-o"></i> Working Hours: Monday - Friday, 9:00 AM ~ 16:00 PM</li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12"  style = "margin:auto !important">
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
         </div>
         <div class="container">
            <div class="row">
               <!-- <div class="humberger-menu humberger-open">
                  <i class="fa fa-bars"></i>
               </div> -->
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
						         <a href="index.php?l=<?php echo $_REQUEST['l'] ?>"><img src="assets/img/f-logo.png" alt=""></a>
                           <!-- <a href="index.php"><img src="assets/img/logo.png" alt="logo"/></a> -->
                        </div>
                     </div>
						</div>
               </div>
               <style>
                  .menu-area span {
                     font-weight: bold;
                  }
               </style>
               <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9" style="padding-top:10px;">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
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
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner --> 
      </header>
