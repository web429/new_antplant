<style>
    .footer-menuitem {
        padding: 15px;
        border-bottom: 1px dotted lightgray;
    }
    .footer-a {
        color: white;
        width: 100%;
        font-size: 20px;
    }
    .footer-a:hover {
        color: white;
        margin-left: 10px;
        transition: all 0.3s;
    }
    .offer-btn {
        border-color: white;
        color: white;
        width: 100%;
    }
    .offer-btn:hover {
        background: white;
        color: #fca836;
    }
</style>
<div id="page-footer" class="row">
    <div class="col-md-4 col-sm-12">
            <h3><strong><?php echo $word['information_link_'.$lang];?></strong></h3>
            <?php
                $query = mysql_query ( " SELECT * FROM $tab_pagini where pagina_parent<>'999' ORDER BY pagina_id LIMIT 0 , 6 ");
                $nume = "nume_".$lang;
                while ( $row = mysql_fetch_array($query) ) { ?>
                    <div class='footer-menuitem'><a class='footer-a' href="index.php?p=<?php echo $row[$nume]; ?>&l=<?php echo $_REQUEST['l'] ?>"><?php echo $row[$nume]; ?></a></div>
                <?php }
            ?>
    </div>
    <div class="col-md-4 col-sm-12">
        <h3><strong><?php echo $word['contact_details_'.$lang];?></strong></h3>
        <?php 
            $query = mysql_query ( " select * from $xtable ");
            $row = mysql_fetch_array($query);
        ?>
        <div class="footer-menuitem"><a class="footer-a" href="mailto:<?php echo $row['email_contact']?>"><?php echo $row['email_contact'] ?></a></div>
        <div class="footer-menuitem"><a class="footer-a" href="#">www.antplant.co.uk</a></div>
        <div class="footer-menuitem footer-a" style="cursor:pointer;"><?php $qr = mysql_query ( " select * from $xtable "); $rr = mysql_fetch_array($qr); echo $rr['numar_contact'] ?></div>
    </div>
    <div class="col-md-4 col-sm-12">
        <h3><strong><?php echo $word['makeus_'.$lang];?></strong></h3>
        <p style='color:white;'>Interested in the machine ? Tell us your price then.. </p>
        <form>
            <input class="form-control" style="width:100%" type="text" name="price" id="price" placeholder="Price" />
            <hr>
            <input class="form-control" style="width:100%" type="text" name="email" id="email" placeholder="Email" />
            <hr>
            <button type="submit" class="offer-btn">Send Offer</button>
        </form>
    </div>
</div>
