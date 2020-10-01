<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <?php
    include "panou/config.php";
    $link = mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
    mysql_select_db($database) or die("Eroare conectare baza de date.");

    if (!isset($_REQUEST['p'])) {
        $_REQUEST['p'] = "Home";
    }
    else {
    $_REQUEST['p'] = strip_tags ($_REQUEST['p']);
    $_REQUEST['p'] = htmlspecialchars($_REQUEST['p'], ENT_QUOTES);
    }
    if (!isset($_REQUEST['l'])) {
        $_REQUEST['l'] = "en";
    }
    else {
    $_REQUEST['l'] = strip_tags ($_REQUEST['l']);
    $_REQUEST['l'] = htmlspecialchars($_REQUEST['l'], ENT_QUOTES);
    }

    $pag = $_REQUEST['p'];
    $lang = $_REQUEST['l'];

    $result = mysql_query("select * from $tab_pagini where nume_".$_REQUEST['l']."='".$_REQUEST['p']."'");
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
  <link rel="apple-touch-icon" href="img/favicon.png"><!-- Bootstrap core CSS -->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">

  <!-- Modernizer for Portfolio -->
  <script src="js/modernizer.js"></script>


</head>

<body class="is-preload">
  <!-- Page Preloder -->
  <div id="preloder">
      <div class="loader"></div>
  </div>

  <?php include "language.php"; ?>
  <?php include "header.php"; ?>

  <?php
        $result = mysql_query("select * from $tab_pagini where nume_".$_REQUEST['l']."='".$_REQUEST['p']."'");
        $row = mysql_fetch_array($result);
        $continut = "continut_".$lang;

        $resultForCarousel = mysql_query("select * from trampz_pagini where nume_en = 'Home'");
        $rowForCarousel = mysql_fetch_array($resultForCarousel);
        $textForCarousel = $rowForCarousel[$continut];
    
        if ($row['nume_en']=="Contact") {
            include "contact-form/contact.php" ;
        } elseif ($row['nume_en'] == 'About Us') {
            include "aboutus.php";
        } elseif ($row['nume_en'] != 'Home') {
    ?>
  <div id="pageContinut">
    <?php echo $row[$continut]; ?>
  </div>
  <?php  
        } elseif ($row['nume_en'] == 'Home') {
    ?>

    <!-- Hero Section Begin -->
    <section class="hero hero-section" data-setbg="assets/img/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="hero__text">
                        <h2><strong>Welcome To
                <em>TAYMIN LTD</em>.</strong></h2>
                <style>
                  .hero h5 p {
                    color: white;
                  }
                  </style>
                        <h5><?php echo $textForCarousel; ?></h5>
                        <a href="index.php?p=Contact&l=en" class="primary-btn">Contact us</a>
                        <a href="products.php?cat=all&l=en&page=1" class="primary-btn second-bg">Our stock</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="assets/img/0.jpg"></div>
            <div class="hs-item set-bg" data-setbg="assets/img/1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="assets/img/2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="assets/img/3.jpg"></div>
        </div>
    </section>
    <!-- Hero Section End -->
  
    <section class="feature spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="feature__text">
                        <div class="section-title">
                            <span>Why choose us ?</span>
                            <h2>Our stock</h2>
                        </div>
                        <p>We Pride ourselves in personal relationships with our customers, from those down the street to those around the world. Whether you are across the country, know your construction needs are in good hands with our dedicated team. </p>
                        <a href="products.php?cat=all&l=en&page=1" class="primary-btn second-bg">See Stock</a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="feature__item right-column">
                                <img src="assets/img/feature/feature (2).png" alt="">
                                <h5>Backhoe Loaders</h5>
                            </div>
                            <div class="feature__item">
                                <img src="assets/img/feature/feature (18).png" alt="">
                                <h5>Tracked Excavators</h5>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="feature__item">
                                <img src="assets/img/feature/feature (13).png" alt="">
                                <h5>Telescopic Loaders</h5>
                            </div>
                            <div class="feature__item">
                                <img src="assets/img/feature/feature (23).png" alt="">
                                <h5>Mini Excavators</h5>
                            </div>
                            <div class="feature__item">
                                <img src="assets/img/feature/feature (25).png" alt="">
                                <h5>Tractors</h5>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="feature__item right-column">
                                <img src="assets/img/feature/feature (16).png" alt="">
                                <h5>Rollers</h5>
                            </div>
                            <div class="feature__item">
                                <img src="assets/img/feature/feature (20).png" alt="">
                                <h5>Bulldozer</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

    <!-- Application Form Section Begin -->
    <section class="application-form spad" id="latest_arrivals">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-title">
                        <span>Giving Best Options For You</span>
                        <h2>Latest Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              <?php 
                $query = mysql_query ( " SELECT * FROM $tab_produse where featured='1' LIMIT 4");
                while ($row = mysql_fetch_array($query)) {     
                  $query2 = mysql_query ( " SELECT * FROM $tab_fisiere where tip = '".$row['id']."' ");
                  $row2 = mysql_fetch_array($query2);
                  $while_parinte = $row['parinte'];
                  $while_id = $row['id'];
                  $while_l = $_REQUEST['l'];
                  $rating = rand(65, 95);
                  $disp_rating = $rating * 1;
                  $rating_val = $rating / 10;
              ?>
                <div class="col-lg-6">
                  <div class="team__item">
                    <div class="team__item__img">
                        <img src="upload/<?php echo $row2['numefisier']; ?>" alt="">
                    </div>
                    <div class="team__item__text">
                        <h5><a href="product.php?cat=<?php echo $row['parinte']; ?>&id=<?php echo $row['id'] ?>&l=<?php echo $_REQUEST['l']; ?>"><?php echo $row['nume_en']; ?></a></h5>
                        <span><i class="fa fa-star"> </i> <?php echo number_format($rating_val, 1);?></span>
                        <p><i class="fa fa-money"> </i> <?php echo $row['price']; ?></p>
                        <p><i class="fa fa-calendar-o"> </i> <?php echo $row['year']; ?></p>
                    </div>
                  </div>
                </div>
              <?php 
                }
              ?>
            </div>
        </div>
    </section>
    <!-- Application Form Section End -->

  <?php
    }
?>

    <?php
    if ($_REQUEST['p']=="search") {?>
      <!-- Breadcrumb Section Begin -->
      <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Search: <?php echo $_POST['search']; ?></span>
                        <a href="products.php?cat=all&l=<?php echo $_REQUEST['l'] ?>&page=1" style="float:right;">View all MACHINES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Breadcrumb Section End -->

      <!-- Categories Grid Section Begin -->
      <section class="courses spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="section-title">
                        <span>Search</span>
                        <h2>Results</h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="courses__all">
                        <a href="products.php?cat=all&l=en&page=1" class="primary-btn second-bg">View all</a>
                    </div>
                </div>
            </div>
              <div class="row">
              <?php
                if($_POST['search']){
                    $search = $_POST['search'];
                    $str_query = " SELECT * FROM $tab_produse where nume_en like '%$search%' || stock like '%$search%' || make like '%$search%' || model like '%$search%' ";
                    $result = mysql_query($str_query);
                    if(mysql_num_rows($result) == 0){
                        $strDisplay = "No Result";
                    } else {
                        $strDisplay = '';
                        while($row = mysql_fetch_array($result)) {
                            $query2 = mysql_query ( " SELECT * FROM $tab_fisiere where tip = '".$row['id']."' ");
                            $row2 = mysql_fetch_array($query2);
                            $strDisplay .= '
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="course__item">
                                    <img src="upload/'.$row2['numefisier'].'" alt="TAYMIN LTD">
                                    <h5>'.$row['nume_en'].'</h5>
                                    <h4>'.$row['model'].'</h4>
                                    <p><i class="fa fa-money"></i> '.$row['price'].' &pound;</p>
                                    <p><i class="fa fa-calendar-o"></i> '.$row['year'].'</p>
                                    <a href="product.php?cat='.$row['parinte'].'&id='.$row['id'].'&l='.$_REQUEST['l'].'">View detail</a>
                                </div>
                            </div>
                            ';
                        }
                    }
                }
                echo $strDisplay;
                ?>   
                </div>
                <div class="pagination__option text-center" style="">
                    <?php
                        if($page == 1) {
                        echo "<a href='#'>Previous</a>";
                        } else {
                        $j = $page - 1;
                        echo '<a href="products.php?cat='.$_REQUEST['cat'].'&l='.$_REQUEST['l'].'&page='.$j.'">Previous</a>';
                        }
                        if($_REQUEST['cat'] <> 'all') {
                        $page_query = mysql_query("SELECT COUNT(id) AS count FROM ".$tab_produse." WHERE parinte='".$_REQUEST['cat']."'");
                        } else {
                        $page_query = mysql_query("SELECT COUNT(id) AS count FROM ".$tab_produse);
                        }
                        $total_num = mysql_fetch_array($page_query);
                        $total_page = floor($total_num['count'] / 10) + 1;
                        for($i = 1; $i <= $total_page; $i++){
                        echo '<a href="products.php?cat='.$_REQUEST['cat'].'&l='.$_REQUEST['l'].'&page='.$i.'" class="'.($i == $page ? "active" : "").'">'.$i.'</a>';
                        }
                        if($total_page == $page) {
                        echo "<a href='#'>Next</a>";
                        } else {
                        $j = $page + 1;
                        echo '<a href="products.php?cat='.$_REQUEST['cat'].'&l='.$_REQUEST['l'].'&page='.$j.'">Next</a>';
                        }
                    ?>
                </div>
            </div>
          </div>
      </section>
      <!-- Categories Grid Section End -->
    <?php
    } 
    ?>


  <?php include "page-footer.php";?>

  <!-- Sign Up Section Begin -->
  <div class="signup-section">
    <div class="signup-close"><i class="fa fa-close"></i></div>
    <div class="signup-text">
      <div class="container">
        <div class="signup-title">
          <h2>Sign up</h2>
          <p>Fill out the form below to recieve a free and confidential</p>
        </div>
        <form action="#" class="signup-form">
          <div class="sf-input-list">
            <input type="text" class="input-value" placeholder="User Name*">
            <input type="text" class="input-value" placeholder="Password">
            <input type="text" class="input-value" placeholder="Confirm Password">
            <input type="text" class="input-value" placeholder="Email Address">
            <input type="text" class="input-value" placeholder="Full Name">
          </div>
          <div class="radio-check">
            <label for="rc-agree">I agree with the term & conditions
              <input type="checkbox" id="rc-agree">
              <span class="checkbox"></span>
            </label>
          </div>
          <button type="submit"><span>REGISTER NOW</span></button>
        </form>
      </div>
    </div>
  </div>
  <!-- Sign Up Section End -->

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form id="search" method="post" action="index.php?p=search&l=<?php echo $_REQUEST['l'] ?>" enctype="multipart/form-data"
        class="search-model-form">
        <input type="text" id="search-input" name="search" placeholder="<?php echo $word['search_'.$lang];?>...">
      </form>
    </div>
  </div>
  <!-- Search model end -->


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <?php include "footer.php"; ?>