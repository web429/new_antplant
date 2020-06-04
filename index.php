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
  <section class="hero-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="hs-text">
            <div class="label"><span>Ant Plant ltd.</span></div>
            <h2 style="color:black;-webkit-text-stroke: 1px white;text-shadow:1px 1px 2px gray;font-weight:800;">
              <strong>Welcome To
                <em>ANT Plant Ltd</em>.</strong></h2>
            <div class="slider-text">
              <p><?php echo $textForCarousel; ?></p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 offset-lg-1 offset-xl-2">
          <div class="trending-post">
            <div class="section-title">
              <h5><?php echo $word['ourservice_'.$lang];?></h5>
            </div>
            <div class="trending-slider owl-carousel">
              <div class="single-trending-item">
                <div class="trending-item">
                  <div class="ti-text">
                    <h5><a href="#">Valve updates Steam's new Interactive Reco- mmender, teases
                        a...</a></h5>
                    <div class="ti-pic mt-50">
                      <img src="assets/img/1.jpg" alt="">
                    </div>
                    <ul>
                      <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                      <li><i class="fa fa-comment-o"></i> 12</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-trending-item">
                <div class="trending-item">
                  <div class="ti-pic">
                    <img src="img/trending/trending-5.jpg" alt="">
                  </div>
                  <div class="ti-text">
                    <h6><a href="#">Jalopy developer is making a game where you 'build stuff...</a>
                    </h6>
                    <ul>
                      <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                      <li><i class="fa fa-comment-o"></i> 12</li>
                    </ul>
                  </div>
                </div>
                <div class="trending-item">
                  <div class="ti-pic">
                    <img src="img/trending/trending-6.jpg" alt="">
                  </div>
                  <div class="ti-text">
                    <h6><a href="#">Valve updates Steam's new Interactive Reco- mmender, teases
                        a...</a></h6>
                    <ul>
                      <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                      <li><i class="fa fa-comment-o"></i> 12</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-slider owl-carousel">
      <div class="hs-item set-bg" data-setbg="assets/img/1.jpg"></div>
      <div class="hs-item set-bg" data-setbg="assets/img/2.jpg"></div>
      <div class="hs-item set-bg" data-setbg="assets/img/3.jpg"></div>
    </div>
  </section>
  <!-- Hero Section End -->
  
  <!-- Latest Preview Section Begin -->
  <section class="latest-preview-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h5>Latest Arrivals</h5>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="lp-slider owl-carousel">
          <?php 
              $query = mysql_query ( " SELECT * FROM $tab_produse where featured='1' LIMIT 10");
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
          <div class="col-lg-3">
            <div class="lp-item">
              <div class="lp-pic set-bg" data-setbg="upload/<?php echo $row2['numefisier']; ?>">
                <div class="review-loader">
                  <div class="loader-circle-wrap">
                    <div class="loader-circle">
                      <span class="circle-progress" data-cpid="id<?php echo $row['id'];?>"
                        data-cpvalue="<?php echo $disp_rating;?>" data-cpcolor="#c20000"></span>
                      <div class="review-point"><?php echo number_format($rating_val, 1);?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="lp-text">
                <h6><a
                    href="product.php?cat=<?php echo $row['parinte']; ?>&id=<?php echo $row['id'] ?>&l=<?php echo $_REQUEST['l']; ?>"><?php echo $row['nume_en']; ?></a>
                </h6>
                <ul>
                  <li><i class="fa fa-money"></i> <?php echo $row['price']; ?></li>
                  <li><i class="fa fa-calendar-o"></i> <?php echo $row['year']; ?></li>
                </ul>
              </div>
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

  <!-- Update News Section Begin -->
  <section class="update-news-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="section-title">
            <h5><span>News & update</span></h5>
          </div>
          <div class="tab-elem">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Platform</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Hardware</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Reviews</a>
              </li>
            </ul><!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabs-1" role="tabpanel">
                <div class="row">
                  <div class="un-slider owl-carousel">
                    <div class="col-lg-12">
                      <div class="un-big-item set-bg" data-setbg="img/news/news-1.jpg">
                        <div class="ub-text">
                          <div class="label"><span>Reviews</span></div>
                          <h5><a href="#">Get one of our favorite nvme ssds, the 2tb samsung
                              970 evo, for $120 less than nomal</a></h5>
                          <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-3.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-4.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-2.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="un-big-item set-bg" data-setbg="img/news/news-1.jpg">
                        <div class="ub-text">
                          <div class="label"><span>Reviews</span></div>
                          <h5><a href="#">Get one of our favorite nvme ssds, the 2tb samsung
                              970 evo, for $120 less than nomal</a></h5>
                          <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-3.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-4.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-2.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
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
              </div>
              <div class="tab-pane fade" id="tabs-2" role="tabpanel">
                <div class="row">
                  <div class="un-slider owl-carousel">
                    <div class="col-lg-12">
                      <div class="un-big-item set-bg" data-setbg="img/news/news-1.jpg">
                        <div class="ub-text">
                          <div class="label"><span>Reviews</span></div>
                          <h5><a href="#">Get one of our favorite nvme ssds, the 2tb samsung
                              970 evo, for $120 less than nomal</a></h5>
                          <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-3.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-4.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-2.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="un-big-item set-bg" data-setbg="img/news/news-1.jpg">
                        <div class="ub-text">
                          <div class="label"><span>Reviews</span></div>
                          <h5><a href="#">Get one of our favorite nvme ssds, the 2tb samsung
                              970 evo, for $120 less than nomal</a></h5>
                          <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-3.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-4.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-2.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
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
              </div>
              <div class="tab-pane fade" id="tabs-3" role="tabpanel">
                <div class="row">
                  <div class="un-slider owl-carousel">
                    <div class="col-lg-12">
                      <div class="un-big-item set-bg" data-setbg="img/news/news-1.jpg">
                        <div class="ub-text">
                          <div class="label"><span>Reviews</span></div>
                          <h5><a href="#">Get one of our favorite nvme ssds, the 2tb samsung
                              970 evo, for $120 less than nomal</a></h5>
                          <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-3.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-4.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-2.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="un-big-item set-bg" data-setbg="img/news/news-1.jpg">
                        <div class="ub-text">
                          <div class="label"><span>Reviews</span></div>
                          <h5><a href="#">Get one of our favorite nvme ssds, the 2tb samsung
                              970 evo, for $120 less than nomal</a></h5>
                          <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-3.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-4.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-2.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
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
              </div>
              <div class="tab-pane fade" id="tabs-4" role="tabpanel">
                <div class="row">
                  <div class="un-slider owl-carousel">
                    <div class="col-lg-12">
                      <div class="un-big-item set-bg" data-setbg="img/news/news-1.jpg">
                        <div class="ub-text">
                          <div class="label"><span>Reviews</span></div>
                          <h5><a href="#">Get one of our favorite nvme ssds, the 2tb samsung
                              970 evo, for $120 less than nomal</a></h5>
                          <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-3.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-4.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-2.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="un-big-item set-bg" data-setbg="img/news/news-1.jpg">
                        <div class="ub-text">
                          <div class="label"><span>Reviews</span></div>
                          <h5><a href="#">Get one of our favorite nvme ssds, the 2tb samsung
                              970 evo, for $120 less than nomal</a></h5>
                          <ul>
                            <li>by <span>Admin</span></li>
                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                            <li><i class="fa fa-comment-o"></i> 20</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-3.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-4.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
                              <ul>
                                <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 20</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="un-item">
                            <div class="un_pic set-bg" data-setbg="img/news/news-2.jpg">
                              <div class="label"><span>Reviews</span></div>
                            </div>
                            <div class="un_text">
                              <h6><a href="#">Downwell and space hulk: tactics are coming
                                  to...</a></h6>
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
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
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
            <div class="hardware-guides">
              <div class="section-title">
                <h5>Hardware guides</h5>
              </div>
              <div class="trending-item">
                <div class="ti-pic">
                  <img src="img/trending/trending-5.jpg" alt="">
                </div>
                <div class="ti-text">
                  <h6><a href="#">A Monster Prom poster got hijacked for a Papa Roach concert...</a>
                  </h6>
                  <ul>
                    <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                    <li><i class="fa fa-comment-o"></i> 12</li>
                  </ul>
                </div>
              </div>
              <div class="trending-item">
                <div class="ti-pic">
                  <img src="img/trending/trending-6.jpg" alt="">
                </div>
                <div class="ti-text">
                  <h6><a href="#">Facebook wants to read your thoughts with its augmented...</a></h6>
                  <ul>
                    <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                    <li><i class="fa fa-comment-o"></i> 12</li>
                  </ul>
                </div>
              </div>
              <div class="trending-item">
                <div class="ti-pic">
                  <img src="img/trending/trending-7.jpg" alt="">
                </div>
                <div class="ti-text">
                  <h6><a href="#">This gaming laptop with a GTX 1660 Ti and 32GB of RAM is down...</a>
                  </h6>
                  <ul>
                    <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                    <li><i class="fa fa-comment-o"></i> 12</li>
                  </ul>
                </div>
              </div>
              <div class="trending-item">
                <div class="ti-pic">
                  <img src="img/trending/trending-8.jpg" alt="">
                </div>
                <div class="ti-text">
                  <h6><a href="#">Jalopy developer is making a game where you 'build stuff...</a></h6>
                  <ul>
                    <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                    <li><i class="fa fa-comment-o"></i> 12</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Update News Section End -->

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
                                      <img src='upload/".$row2['numefisier']."' alt='ANT PLANT LTD'>
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
                                                data-cpcolor="#c20000"></span>
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
                                                data-cpcolor="#c20000"></span>
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
                                                data-cpcolor="#c20000"></span>
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
                                                data-cpcolor="#c20000"></span>
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