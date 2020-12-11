<!-- Footer Section Begin -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<ul class="sociel">
					<li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
					<li> <a href="#"><i class="fa fa-twitter"></i></a></li>
					<li> <a href="#"><i class="fa fa-instagram"></i></a></li>
					<li> <a href="#"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
	</div>
	<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
			<?php 
				$query = mysql_query ( "select * from trampz_pagini where nume_en='Contact'");
				$row = mysql_fetch_array($query);
			?>
			</style>
			<div class="contact">
				<h3><?php echo $word['contact_details_'.$lang];?></h3>
				<?php echo $row['continut_en'];?>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
			<div class="contact">
				<h3>ADDITIONAL LINKS</h3>
				<ul class="lik" style="color:#c4c4c4;">
					<li> <a style="color:#c4c4c4;" href="index.php?p=About Us&l=<?php echo $lang;?>">About us</a></li>
					<li> <a style="color:#c4c4c4;" href="#">Terms and conditions</a></li>
					<li> <a style="color:#c4c4c4;" href="#">Privacy policy</a></li>
					<li> <a style="color:#c4c4c4;" href="#">News</a></li>
					<li> <a style="color:#c4c4c4;" href="index.php?p=Contact&l=<?php echo $lang;?>">Contact us</a></li>
				</ul>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
			<div class="contact">
				<h3>Our Stock</h3>
				<ul class="lik">
					<li><a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1"><span style="color:#c4c4c4;">All Categories</span></a></li>
				<?php 
					$query1 = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent='999' ORDER BY pagina_id LIMIT 0 , 4 ");
					$nume1 = "nume_".$lang;
					while ( $row1 = mysql_fetch_array($query1) ) { 
					?>
					<li><a href="products.php?cat=<?php echo $row1['pagina_id'];  ?>&l=<?php echo $_REQUEST['l'] ?>&page=1"><span style="color:#c4c4c4;"><?php echo $row1[$nume1];?></span></a></li>
					<?php } ?>
					<li><a href="products.php?cat=stocklist&l=<?php echo $_REQUEST['l'] ?>&page=1"><span style="color:#c4c4c4;">More Categories</span></a></li>
					</ul>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
			<div class="footer-about">
				<div class="contact subscribe-option">
					<h3><?php echo $word['makeus_'.$lang];?></h3>
					<p>Interested in our service ? Please contact us.. </p>
					<form action="#">
						<input type="text" placeholder="Name">
						<input type="text" placeholder="Email">
						<button type="submit"><span>Send Quote</span></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="copyright">
		<p>Copyright &copy;<script>
					document.write(new Date().getFullYear());
					</script> All rights reserved </p>
	</div>
	
</div>
  <!-- Footer Section End -->