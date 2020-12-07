<!-- Footer Section Begin -->
<div class="footer">
	<div class="container">

	 <div class="row">
		<div class="col-lg-4 col-md-6">
			<?php 
				$query = mysql_query ( " select * from $xtable ");
				$row = mysql_fetch_array($query);
			?>
			<div class="editor-choice">
				<div class="section-title">
				<h5><?php echo $word['contact_details_'.$lang];?></h5>
				</div>
				<div class="un-item">
				<div class="label"><span>Email</span></div>
				<div class="un_text">
					<h6><a class="footer-a" href="mailto:<?php echo $row['email_contact']?>"><?php echo $row['email_contact'] ?></a></h6>
				</div>
				</div>
				<div class="un-item">
				<div class="label"><span>Url</span></div>
				<div class="un_text">
					<h6><a class="footer-a" href="#">www.antplant.co.uk</a></h6>
				</div>
				</div>
				<div class="un-item">
				<div class="label"><span>Phone</span></div>
				<div class="un_text">
					<h6><a href=""><?php $qr = mysql_query ( " select * from $xtable "); $rr = mysql_fetch_array($qr); echo $rr['numar_contact'] ?></a></h6>
				</div>
				</div>
			</div>
			</div>
		<div class="col-lg-4">
		<div class="footer-about">
            <div class="subscribe-option">
              <div class="section-title">
                <h5><?php echo $word['makeus_'.$lang];?></h5>
              </div>
              <p>Interested in our service ? Please contact us.. </p>
              <form action="#">
                <input type="text" placeholder="Name">
                <input type="text" placeholder="Email">
                <button type="submit"><span>Send Quote</span></button>
              </form>
            </div>
          </div>
		</div>
		<div class="col-lg-4 col-md-6">
		<div class="tags-cloud">
            <div class="section-title">
              <h5>Our Stock</h5>
            </div>
            <div class="tag-list">
              <a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1"><span>All Categories</span></a>
              <?php 
                $query1 = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent='999' ORDER BY pagina_id LIMIT 0 , 4 ");
                $nume1 = "nume_".$lang;
                while ( $row1 = mysql_fetch_array($query1) ) { 
                  ?>
                  <a href="products.php?cat=<?php echo $row1['pagina_id'];  ?>&l=<?php echo $_REQUEST['l'] ?>&page=1"><span><?php echo $row1[$nume1];?></span></a>
                <?php } ?>
              <a href="products.php?cat=stocklist&l=<?php echo $_REQUEST['l'] ?>&page=1"><span>More Categories</span></a>
            </div>
          </div>
		</div>
		
	</div>
	</div>
	<div class="copyright">
		<div class="row">
			<div class="col-lg-6">
				<div class="ca-text">
				<p>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
					document.write(new Date().getFullYear());
					</script> All rights reserved 
				</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="ca-links">
				<a href="index.php?p=About Us&l=<?php echo $lang;?>">About</a>
				<a href="index.php?p=Contact&l=<?php echo $lang;?>">Contact</a>
				<a href="#">Support</a>
				</div>
			</div>
			</div>
	</div>
	
</div>

  <!-- Footer Section End -->