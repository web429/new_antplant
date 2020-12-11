<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Check to make sure that the subject field is not empty
	if(trim($_POST['telephone']) == '') {
		$hasError = true;
	} else {
		$telephone = trim($_POST['telephone']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

    $subject = "Mesaj contact Trampz LTD";
	$query = mysql_query ( " SELECT * FROM $xtable ");
    $row = mysql_fetch_array($query);
	
	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = $row['email_contact']; //Put your own email address here
		$body = "Nume: $name \n\nEmail: $email \n\nTelefon: $telephone \n\nMesaj:\n $comments";
		$headers = 'From: TrampzLTD <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}


?>
	<style>
	
		#map {
			width: 100%;
			height: 250px;
			background-color: grey;
			border: 1px solid gray;
		}
	</style>
	<!-- Breadcrumb Section Begin -->
	<div class="brand_color" style="margin-top:27px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Breadcrumb Section End -->

<section class="contact-section spad" style="padding:20px 0 60px 0;background:white;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<div class="contact-text" style = "margin-top: 50px;">
                        <div class="contact-title">
                            <p style="color:gray;">We are always waiting for your quotes</p>
                        </div>
                        <div class="contact-form">
                            <div class="dt-leave-comment">
                                <form id="contactform" action="index.php?p=<? echo $_REQUEST['p'] ?>&l=<?php echo $_REQUEST['l'] ?>" method="post">
                                    <div class="input-list">
                                        <input name="contactname" type="text" placeholder="Name">
                                        <input name="email" type="text" placeholder="Email">
                                        <input name="telephone" type="text" placeholder="Phone Number">
                                    </div>
                                    <textarea name="message" placeholder="Give us more detail..."></textarea>
                                    <div class=" col-md-12">
                                        <button class="send">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- <div class="contact">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <form class="main_form">
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <div id="map"></div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <p><?php echo $row[$continut]; ?></p>
                            </div>  
                        </div>
                        <div class="row">
                        
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input class="form-control" placeholder="Your name" type="text" name="Your Name">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input class="form-control" placeholder="Email" type="text" name="Email">
                            </div>
                            <div class=" col-md-12">
                                <input class="form-control" placeholder="Phone" type="text" name="Phone">
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea" placeholder="Message"></textarea>
                            </div>
                            <div class=" col-md-12">
                                <button class="send">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Contact Section Begin -->
    
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: 53.7841137, lng: -2.7898546};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 16, center: uluru});
        // The marker, positioned at Uluru
        
        var marker = new google.maps.Marker({
            position: uluru, 
            map: map,
            title: "Office One Eco Tyres",
            animation: google.maps.Animation.DROP,
        });

        marker.setMap(map);
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhtpDqV3eFcqXbywJKMnvghzjQkvHAus8&callback=initMap">
</script>
	

