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
		.row {
			/* margin-bottom: 20px; */
		}
		#map {
			width: 100%;
			height: 450px;
			background-color: grey;
			border: 1px solid gray;
		}
	</style>

	<!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span><?php echo $word['contactus_'.$lang];?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Breadcrumb End -->
	
	<!-- Map Section Begin -->
    <div class="map container">
	<div id="map"></div>
    </div>
	<!-- Map Section End -->
	
	
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="contact__address">
						<h4>Contact info</h4>
						<?php echo $row[$continut]; ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="contact__form">
						<h4>Leave a message</h4>
						<form id="contactform" action="index.php?p=<? echo $_REQUEST['p'] ?>&l=<?php echo $_REQUEST['l'] ?>" method="post">
							<div class="row">
								<div class="col-lg-6">
									<input name="contactname" type="text" placeholder="Name">
								</div>
								<div class="col-lg-6">
									<input name="email" type="text" placeholder="Email">
								</div>
								<div class="col-lg-12">
									<input name="telephone" type="text" placeholder="Phone Number">
									<textarea name="message" placeholder="Give us more detail..."></textarea>
									<button type="submit" class="site-btn">Submit</button>
								</div>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- Contact Section End -->
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: 54.7736229, lng: -2.8898185};
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
	

