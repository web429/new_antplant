<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>


    </head>
    <body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

            <?php include "language.php"; ?>
            <?php include "header.php"; ?>

            <?php
                $result = mysql_query("select * from $tab_pagini where nume_".$_REQUEST['l']."='".$_REQUEST['p']."'");
                $row = mysql_fetch_array($result);
                $continut = "continut_".$lang;

                $resultForCarousel = mysql_query("select * from trampz_pagini where nume_en = 'Home'");
                $rowForCarousel = mysql_fetch_array($resultForCarousel);
                $textForCarousel = $rowForCarousel[$continut];
            ?>
            <?php
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
                <section class="main-banner">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="banner-caption">
                                            <h4>Welcome To <em>ANT Plant Ltd</em>.</h4>
                                            <!-- <span>Most convenience &amp; Profit</span> -->
                                            <p><?php echo $textForCarousel; ?></p>
                                            <div class="primary-button">
                                            <a href="index.php?p=About Us&l=<?php echo $_REQUEST['l'];?>"><?php echo $word['readmore_'.$lang]?></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script src="assets/js/easy_background.js"></script>
                <script>
                    easy_background(".banner-content",
                        {
                            slide: ["assets/images/0.jpg", "assets/images/1.jpg", "assets/images/2.jpg", "assets/images/3.jpg", "assets/images/4.jpg", "assets/images/5.jpg"],

                            delay: [3000, 3000, 3000, 3000, 3000, 3000]
                        }
                    );
                </script>
            <?php        
                }
                
            ?>
            <!-- Banner -->
           
                <?php
                    if ($_REQUEST['p']=="search") {?>
                        <section class="top-image" style="padding-bottom:30px;">
                            <div class="container-fluid">
                                <div class="row">
                                        <?php
                                            if($_POST['search']){
                                                $search = $_POST['search'];
                                                echo '<img src="assets/images/search-banner.jpg" alt="">';
                                                echo '<h3 style="margin-top:20px;">Searching for: ' . $_POST['search'] . "</h3>";
                                                echo '<div class="down-content">';
                                                $str_query = " SELECT * FROM $tab_produse where nume_en like '%$search%' || stock like '%$search%' || make like '%$search%' || model like '%$search%' ";
                                                $result = mysql_query($str_query);
                                                if(mysql_num_rows($result) == 0){
                                                    $strDisplay = "No Result";
                                                } else {
                                                    $strDisplay = '<section class="services" style="margin-top:10px;">
                                                                        <div class="container-fluid">
                                                                            <div class="row">';
                                                    while($row = mysql_fetch_array($result)) {
                                                        $query2 = mysql_query ( " SELECT * FROM $tab_fisiere where tip = '".$row['id']."' ");
											            $row2 = mysql_fetch_array($query2);
                                                        $strDisplay .= "<div class='col-md-4 col-sm-12'><a href='product.php?cat=".$row['parinte']."&id=".$row['id']."&l=".$_REQUEST['l']."'><div class='service-item first-item' style='padding:25px;'>
                                                        <img src='upload/".$row2['numefisier']."' alt='ANT Plant LTD'/>
														<h4 style='margin-bottom:0;margin-top:20px;'>".$row['nume_en']."</h4></div></a></div>";
                                                    }
                                                }
                                                echo '</div>
                                                    </div>
                                                </section>';
                                            }
                                            echo $strDisplay;
                                        ?>
                                </div>
                            </div>
                            <div class="primary-button float-right" style="margin-top:15px;">
                                <a href="products.php?cat=all&l=en&page=1">View All Machines</a>
                            </div>
                            <div style="clear:both;"></div>
                        </section>
                <?php
                } 
                ?>
          </div>
          <?php include "page-footer.php" ?>
        </div>
        
        <?php include "sidebar.php";?>
    </div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <?php include "footer.php";?>
    
    