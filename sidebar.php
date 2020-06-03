<!-- Sidebar -->
<div id="sidebar">

<div class="inner">

  <!-- Search Box -->
  <section id="search" class="alt">
    <form id="search" method="post" action="index.php?p=search&l=<?php echo $_REQUEST['l'] ?>" enctype="multipart/form-data">
      <input type="text" name="search" id="search" placeholder="<?php echo $word['search_'.$lang];?>..." />
    </form>
  </section>
  <style>
    #menu ul li a:hover {
      transition: all 0.2s;
    }
  </style>
  <!-- Menu -->
  <nav id="menu">
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
                        <span class="opener"><?php echo $row[$nume]; ?></span>
                        <ul>
                            <li><a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1">All Stocks</a></li>
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
  <style>
    .open-time {
      text-align: center;
      padding-top: 50px;
      padding-bottom: 50px;
      background: url('img/img-02.jpg') no-repeat;
      margin-left: -50px;
      margin-right: -50px;
      margin-top: 10px;
    }
    .time-area {
      cursor: pointer;
    }
    .time-area:hover {
      margin-top: -3px;
      margin-bottom: 3px;
      transition: all 0.2s;
    }
  </style>
  <div class="open-time">
    <div class="row time-area">
      <div class="col-md-12" style='color:#fca836;font-size:20px;margin-bottom:10px;'>Working Hours</div>
      <div class="col-md-6" style='color:lightgray;'>Monday - Friday</div>
      <div class="col-md-6" style='color:lightgray;'>9:00 AM - 4:00 PM</div>
    </div>
  </div>
  <!-- Featured Posts -->
  <div class="featured-posts">
    <div class="heading">
      <h2><?php echo $word['latest_arrivals_'.$lang];?></h2>
    </div>
    <div class="owl-carousel owl-theme">
        <?php 
            $query = mysql_query ( " SELECT * FROM $tab_produse where featured='1' LIMIT 5");
            while ($row = mysql_fetch_array($query)) {     
                $query2 = mysql_query ( " SELECT * FROM $tab_fisiere where tip = '".$row['id']."' ");
                $row2 = mysql_fetch_array($query2);
                $while_parinte = $row['parinte'];
                $while_id = $row['id'];
                $while_l = $_REQUEST['l'];
        ?>
                <div class="featured-item">
                    <a href="product.php?cat=<?php echo $row['parinte']; ?>&id=<?php echo $row['id'] ?>&l=<?php echo $_REQUEST['l']; ?>">
                        <img src="upload/<?php echo $row2['numefisier']; ?>" alt="ANT PLANT LTD">
                    </a>    
                    <p><strong><?php echo $row['nume_en']; ?></strong></p>
                    <p>Price: <?php echo $row['price']; ?>, Year: <?php echo $row['year']; ?></p>
                    <button class="border-rectangular-button float-right" style="cursor:pointer;" onclick='location.href="product.php?cat=<?php echo $while_parinte; ?>&id=<?php echo $while_id ?>&l=<?php echo $while_l; ?>"'><?php echo $word['moreinfo_'.$lang];?></button>
                </div>
            
        <?php 
            }
       ?>
    </div>
  </div>

  <!-- Footer -->
  <footer id="footer">
    <p class="copyright">Copyright &copy; 2020 ANT Plant Ltd
  </footer>

</div>
</div>
