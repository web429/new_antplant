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
  <script src="js/modernizer.js"></script>


</head>

<body class="is-preload">
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
 
  <section class="slider_section" style = "padding-top: 35px;">
    <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">
       <div class="carousel-inner" style = "height: 80vh;"> 
          <div class="carousel-item active">
            <img class="first-slide" src="assets/img/1.jpg" alt="First slide" style = "width : 100%;">
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="assets/img/2.jpg" alt="Second slide" style = "width : 100%;">
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="assets/img/3.jpg" alt="Third slide" style = "width : 100%;">
          </div>
      </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev"><i class='fa fa-angle-right'></i></a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next"><i class='fa fa-angle-left'></i></a>      
    </div>
  </section>
  <!-- Hero Section End -->
  <div class="whyschose">
    <div class="container">
      <div class="row">
          <div class="col-md-7 offset-md-3">
            <div class="title">
                <h2>Why <strong class="black">choose us</strong></h2>
                <span>Fastest repair service with best price!</span>
            </div>
          </div>
      </div>
    </div>
  </div>
<div class="choose_bg">
    <div class="container">
      <div class="white_bg">
        <div class="row">
            <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
              <div class="for_box">
                  <i><img src="assets/icon/1.png"/></i>
                  <h3>Data recovery</h3>
                  <p>Perspiciatis eos quos totam cum minima autPerspiciatis eos quos</p>
              </div>
            </dir>
            <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
              <div class="for_box">
                  <i><img src="assets/icon/2.png"/></i>
                  <h3>Computer repair</h3>
                  <p>Perspiciatis eos quos totam cum minima autPerspiciatis eos quos</p>
              </div>
            </dir>
            <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
              <div class="for_box">
                  <i><img src="assets/icon/3.png"/></i>
                  <h3>Mobile service</h3>
                  <p>Perspiciatis eos quos totam cum minima autPerspiciatis eos quos</p>
              </div>
            </dir>
            <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
              <div class="for_box">
                  <i><img src="assets/icon/4.png"/></i>
                  <h3>Network solutions</h3>
                  <p>Perspiciatis eos quos totam cum minima autPerspiciatis eos quos</p>
              </div>
            </dir>
            <div class="col-md-12">
              <a class="read-more">Read More</a>
            </div>
        </div>
    </div>
</div>

<!-- end CHOOSE -->

<!-- service --> 
<div class="service">
    <div class="container">
      <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="title">
                <h2>Service <strong class="black">Process</strong></h2>
                <span>Easy and effective way to get your device repair</span>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="service-box">
              <i><img src="assets/icon/service1.png"/></i>
              <h3>Fast service</h3>
              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="service-box">
              <i><img src="assets/icon/service2.png"/></i>
              <h3>Secure payments</h3>
              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="service-box">
              <i><img src="assets/icon/service3.png"/></i>
              <h3>Expert team</h3>
              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="service-box">
              <i><img src="assets/icon/service4.png"/></i>
              <h3>Affordable services</h3>
              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="service-box">
              <i><img src="assets/icon/service5.png"/></i>
              <h3>90 Days warranty</h3>
              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="service-box">
              <i><img src="assets/icon/service6.png"/></i>
              <h3>Award winning</h3>
              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
          </div>
        </div>
      </div>
    </div>
</div>
      <!-- end service -->
<div class="product">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="title">
              <h2>our <strong class="black">products</strong></h2>
              <span>We package the products with best services to make you a happy customer.</span>
          </div>
        </div>
    </div>
  </div>
</div>
<div class="product-bg">
  <div class="product-bg-white">
  <div class="container">
    <div class="row">
     
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
          <div class="product-box">
              <i><img src="assets/img/p1.png"/></i>
              <h3>Norton Internet Security</h3>
              
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
          <div class="product-box">
              <i><img src="assets/img/p2.png"/></i>
              <h3>Norton Internet Security</h3>
              
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
          <div class="product-box">
              <i><img src="assets/img/p3.png"/></i>
              <h3>Norton Internet Security</h3>
              
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
          <div class="product-box">
              <i><img src="assets/img/p4.png"/></i>
              <h3>Norton Internet Security</h3>
              
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
          <div class="product-box">
              <i><img src="assets/img/p5.png"/></i>
              <h3>Norton Internet Security</h3>
              
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
          <div class="product-box">
              <i><img src="assets/img/p2.png"/></i>
              <h3>Norton Internet Security</h3>
              
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
          <div class="product-box">
              <i><img src="assets/img/p6.png"/></i>
              <h3>Norton Internet Security</h3>
              
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
          <div class="product-box">
              <i><img src="assets/img/p7.png"/></i>
              <h3>Norton Internet Security</h3>
              
          </div>
        </div>
      
       </div>  
      
        
      </div>
    </div>
    
    <div class="container">
      <div class="yellow_bg">
      <div class="row">
          <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <div class="yellow-box">
                <h3>REQUEST A FREE QUOTE<i><img src="assets/icon/calll.png"/></i></h3>
                
                <p>Get answers and advice from people you want it from.</p>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
            <div class="yellow-box">
                <a href="#">Get  Quote</a>
            </div>
          </div>
      </div>
    </div>  
 </div>


<!-- end our product -->
<!-- map -->
<div class="container-fluid padi">
    <div class="map">
      <img src="assets/img/mapimg.jpg" alt="img"/>
    </div>
</div>
<!-- end map --> 


  
  <?php
    }
?>

<?php
if ($_REQUEST['p']=="search") {?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg spad" data-setbg="assets/img/top-image-old.jpg">
  <div style="width:100%;height:100%;background-color: rgba(0, 0, 0, 0.5);padding:100px 0;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb-text">
            <h3>Search For: <span><?php echo $_POST['search'] ? $_POST['search'] : '';?></span></h3>
            <div class="bt-option">
              <a href="#">Home</a>
              <a href="#">Search Result</a>
              <span><?php echo $_POST['search'] ? $_POST['search'] : '';?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Categories Grid Section Begin -->
<section class="categories-list-section spad">
    <div class="container">
        <div class="row">
          <div class="col-lg-8 p-0">
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
                          $strDisplay .= "
                            <div class='cl-item'>
                              <div class='cl-pic'>
                                <img src='upload/".$row2['numefisier']."' alt='TAYMIN LTD'>
                              </div>
                              <div class='cl-text'>
                                  <div class='label'><span>".$row['model']."</span></div>
                                  <h5><a href='product.php?cat=".$row['parinte']."&id=".$row['id']."&l=".$_REQUEST['l']."'>".$row['nume_en']."</a></h5>
                                  <ul>
                                    <li>by <span>".$row['make']."</span></li>
                                    <li><i class='fa fa-money'></i>".$row['price']." &pound;</li>
                                    <li><i class='fa fa-map-marker'></i>".$row['location']."</li>
                                  </ul>
                              </div>
                            </div>
                          ";
                      }
                  }
                }
                echo $strDisplay;
              ?>                  
            <div class="pagination-item" style="float:right;">
              <!-- <a href="#"><span>1</span></a>
              <a href="#"><span>2</span></a>
              <a href="#"><span>3</span></a> -->
              <a href="products.php?cat=all&l=en&page=1"><span>View All Machines</span></a>
            </div>  
          </div> 
          <div class="col-lg-4 col-md-7 p-0">
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
                  <div class="best-of-post">
                      <div class="section-title">
                          <h5>Best of</h5>
                      </div>
                      <div class="bp-item">
                          <div class="bp-loader">
                              <div class="loader-circle-wrap">
                                  <div class="loader-circle">
                                      <span class="circle-progress-1" data-cpid="id-1" data-cpvalue="95"
                                          data-cpcolor="#ffc221"></span>
                                      <div class="review-point">9.5</div>
                                  </div>
                              </div>
                          </div>
                          <div class="bp-text">
                              <h6><a href="#">This gaming laptop with a GTX 1660...</a></h6>
                              <ul>
                                  <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                  <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                          </div>
                      </div>
                      <div class="bp-item">
                          <div class="bp-loader">
                              <div class="loader-circle-wrap">
                                  <div class="loader-circle">
                                      <span class="circle-progress-1" data-cpid="id-2" data-cpvalue="85"
                                          data-cpcolor="#ffc221"></span>
                                      <div class="review-point">8.5</div>
                                  </div>
                              </div>
                          </div>
                          <div class="bp-text">
                              <h6><a href="#">This gaming laptop with a GTX 1660...</a></h6>
                              <ul>
                                  <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                  <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                          </div>
                      </div>
                      <div class="bp-item">
                          <div class="bp-loader">
                              <div class="loader-circle-wrap">
                                  <div class="loader-circle">
                                      <span class="circle-progress-1" data-cpid="id-3" data-cpvalue="80"
                                          data-cpcolor="#ffc221"></span>
                                      <div class="review-point">8.0</div>
                                  </div>
                              </div>
                          </div>
                          <div class="bp-text">
                              <h6><a href="#">This gaming laptop with a GTX 1660...</a></h6>
                              <ul>
                                  <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                  <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                          </div>
                      </div>
                      <div class="bp-item">
                          <div class="bp-loader">
                              <div class="loader-circle-wrap">
                                  <div class="loader-circle">
                                      <span class="circle-progress-1" data-cpid="id-4" data-cpvalue="75"
                                          data-cpcolor="#ffc221"></span>
                                      <div class="review-point">7.5</div>
                                  </div>
                              </div>
                          </div>
                          <div class="bp-text">
                              <h6><a href="#">This gaming laptop with a GTX 1660...</a></h6>
                              <ul>
                                  <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                  <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
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