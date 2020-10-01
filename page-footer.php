<!-- Footer Section Begin -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="footer__widget">
                        <?php 
                          $query = mysql_query ( " select * from $xtable ");
                          $row = mysql_fetch_array($query);
                        ?>
                        <div class="footer__logo">
                            <h2 style="color: white; font-weight: 800">PENRITH PLANT LTD</h2>
                        </div>
                        <!-- <h5><?php echo $word['contact_details_'.$lang];?></h5> -->
                        <ul style="color: #e0e0e0;">
                            <li><strong>Email:</strong> <a class="footer-a" href="mailto:<?php echo $row['email_contact']?>"><?php echo $row['email_contact'] ?></a></li>
                            <li><strong>URL:</strong> <a class="footer-a" href="#">www.antplant.co.uk</a></li>
                            <li><strong>Phone:</strong> <a href=""><?php $qr = mysql_query ( " select * from $xtable "); $rr = mysql_fetch_array($qr); echo $rr['numar_contact'] ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="footer__widget mt-5">
                        <h5>Our Stock</h5>
                        <a class="s-category" href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1"><span>All Categories</span></a>
                          <?php 
                            $query1 = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent='999' ORDER BY pagina_id LIMIT 0 , 4 ");
                            $nume1 = "nume_".$lang;
                            while ( $row1 = mysql_fetch_array($query1) ) { 
                              ?>
                              <a class="s-category" href="products.php?cat=<?php echo $row1['pagina_id'];  ?>&l=<?php echo $_REQUEST['l'] ?>&page=1"><span><?php echo $row1[$nume1];?></span></a>
                            <?php } ?>
                            <a class="s-category" href="products.php?cat=stocklist&l=<?php echo $_REQUEST['l'] ?>&page=1"><span>More Categories</span></a>
                        
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h5><?php echo $word['makeus_'.$lang];?></h5>
                        <p style="color: #c4c4c4">Interested in our service ? Please contact us..</p>
                        <form action="#">
                          <input class="form-control" type="text" placeholder="Name">
                          <input class="form-control" type="text" placeholder="Email">
                          <button type="submit"><span>Send Quote</span></button>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                      <p class="float-left">Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved</p>
                      <div class="float-right">
                        <a href="index.php?p=About Us&l=<?php echo $lang;?>">About Us</a>
                        <a href="index.php?p=Contact&l=<?php echo $lang;?>">Contact</a>
                        <a href="#">Support</a>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->