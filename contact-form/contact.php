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
			margin-bottom: 20px;
		}
		#map {
			width: 100%;
			height: 400px;
			background-color: grey;
			border: 1px solid gray;
		}
	</style>
	<div class="page-heading">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo $word['contactus_'.$lang];?></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-sm-12">
					<div id="map"></div>
				</div>
				<div class="col-md-5 col-sm-12">
					<p><?php echo $row[$continut]; ?></p>
				</div>
			</div>
			<form id="contactform" action="index.php?p=<? echo $_REQUEST['p'] ?>&l=<?php echo $_REQUEST['l'] ?>" method="post">
				<div class="row">
					<div class="col-md-6">
						<fieldset>
							<input name="contactname" type="text" class="form-control" id="contactname" placeholder="Your name..." required="">
						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset>
							<input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<fieldset>
							<input name="telephone" type="text" class="form-control" id="telephone" placeholder="Your phone number...">
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<textarea name="message" id="message" placeholder="Give us more details..." rows="6" style="width:100%;padding:.375rem .75rem;"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-sm-12"></div>
					<div class="col-md-4 col-sm-12">
						<button type="submit" id="form-submit" class="button" style="width:100%;">Send Message</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: 54.7506958, lng: -1.6049426};
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
	

