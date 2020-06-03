<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	if(trim($_POST['company']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['company']);
	}


	if(trim($_POST['person']) == '') {
		$hasError = true;
	} else {
		$person = trim($_POST['person']);
	}

	if(trim($_POST['telephone']) == '') {
		$hasError = true;
	} else {
		$telephone = trim($_POST['telephone']);
	}
	
	if(trim($_POST['goods']) == '') {
		$hasError = true;
	} else {
		$goods = trim($_POST['goods']);
	}
	
	if(trim($_POST['nhm']) == '') {
		$hasError = true;
	} else {
		$nhm = trim($_POST['nhm']);
	}
	
	if(trim($_POST['number']) == '') {
		$hasError = true;
	} else {
		$number = trim($_POST['number']);
	}
	
	if(trim($_POST['type']) == '') {
		$hasError = true;
	} else {
		$type = trim($_POST['type']);
	}
	
	if(trim($_POST['weight']) == '') {
		$hasError = true;
	} else {
		$weight = trim($_POST['weight']);
	}
	
	if(trim($_POST['volume']) == '') {
		$hasError = true;
	} else {
		$volume = trim($_POST['volume']);
	}
	
	if(trim($_POST['dimension']) == '') {
		$hasError = true;
	} else {
		$dimension = trim($_POST['dimension']);
	}
	
	if(trim($_POST['hazard']) == '') {
		$hasError = true;
	} else {
		$hazard = trim($_POST['hazard']);
	}

	if(trim($_POST['parity']) == '') {
		$hasError = true;
	} else {
		$parity = trim($_POST['parity']);
	}

	if(trim($_POST['sender']) == '') {
		$hasError = true;
	} else {
		$sender = trim($_POST['sender']);
	}	

	if(trim($_POST['dispatch']) == '') {
		$hasError = true;
	} else {
		$dispatch = trim($_POST['dispatch']);
	}	
	
	if(trim($_POST['recipient']) == '') {
		$hasError = true;
	} else {
		$recipient = trim($_POST['recipient']);
	}	

	if(trim($_POST['destination']) == '') {
		$hasError = true;
	} else {
		$destination = trim($_POST['destination']);
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
		
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	$subject = "Cerere de oferta";
	
	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'cristian@torrospedition.ro'; //Put your own email address here
		$body = "Companie: $company \n\nEmail: $email \n\nTelefon: $telephone \n\nPersoana : $person \n\nDenumire bunuri: $goods\n\nPozitie NHM: $nhm\n\nNum: $number\n\nTip pachete: $type
		\n\nGreutate: $weight\n\nVolum: $volume\n\nDimensiune: $dimension\n\nCategorie risc: $hazard\n\nParitate: $parity\n\nExpeditor: $sender\n\nLocul de expediere: $dispatch\n\nDestinatar: $recipient
		\n\nDestinatie: $destination\n\nMesaj:\n $comments";
		$headers = 'From: TorroSpedition <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}

if ($_REQUEST['p']=="Cerere de oferta") $l=1; else $l=0;
?>






	<div id="contactWrapper" role="form">
	


		<?php if(isset($hasError)) { //If errors are found ?>
			<p class="error">
			<? if ($l) echo "Va rugam sa verificati daca ati completat corect toate campurile. Va multumim." ?>
			<? if (!$l) echo "Please check if you've filled all the fields with valid information and try again. Thank you." ?>
			
			</p>
		<?php } ?>

		<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
			<div class="success">
				<p><strong>
				<? if ($l) echo "Cererea Dvs. a fost primita. Vom reveni cu o oferta de pret. Va multumim." ?>
				<? if (!$l) echo "Your request has been received. We will reply with an offer soon. Thank you." ?>
				</strong></p>

			</div>
		<?php } ?>

		<form method="post" action="index.php?p=<? if ($l) echo "Cerere de oferta" ; else echo "Request Quotation" ?>" id="contactform">
			<div class="stage clear">
				<label for="company"><strong><? if ($l) echo "Companie" ; else echo "Company" ?>: <em>*</em></strong></label>
				<input type="text" name="company" id="company" value="" class="required" role="input" aria-required="true" />
			</div>

			<div class="stage clear">
				<label for="person"><strong><? if ($l) echo "Persoana de contact" ; else echo "Contact Person" ?><em>*</em></strong></label>
				<input type="text" name="person" id="person" value="" class="required" role="input" aria-required="true" />
			</div>

			<div class="stage clear">
				<label for="email"><strong>Email: <em>*</em></strong></label>
				<input type="text" name="email" id="email" value="" class="required" role="input" aria-required="true" />
			</div>

			<div class="stage clear">
				<label for="telephone"><strong><? if ($l) echo "Telefon" ; else echo "Telephone" ?>: <em>*</em></strong></label>
				<input type="text" name="telephone" id="telephone" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="goods"><strong><? if ($l) echo "Denumirea bunurilor" ; else echo "Name of goods" ?>: <em>*</em></strong></label>
				<input type="text" name="goods" id="goods" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="nhm"><strong><? if ($l) echo "Pozitie NHM" ; else echo "NHM Position" ?>: <em>*</em></strong></label>
				<input type="text" name="nhm" id="nhm" class="required" role="input" aria-required="true"/>
			</div>
			
			
			<div class="stage clear">
				<label for="number"><strong><? if ($l) echo "Numar pachete" ; else echo "Number of packages" ?>: <em>*</em></strong></label>
				<input type="text" name="number" id="number" class="required" role="input" aria-required="true"/>
			</div>

			<div class="stage clear">
				<label for="type"><strong><? if ($l) echo "Tip Pachete" ; else echo "Package type" ?>: <em>*</em></strong></label>
				<input type="text" name="type" id="type" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="weight"><strong><? if ($l) echo "Greutate/kg" ; else echo "Weight/kg" ?>: <em>*</em></strong></label>
				<input type="text" name="weight" id="weight" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="volume"><strong><? if ($l) echo "Volum/mc" ; else echo "Volume/cbm" ?>: <em>*</em></strong></label>
				<input type="text" name="volume" id="volume" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="dimension"><strong><? if ($l) echo "Dimensiune / greutate pachete" ; else echo "Dimensions / weight of packages" ?>: <em>*</em></strong></label>
				<input type="text" name="dimension" id="dimension" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="hazard"><strong><? if ($l) echo "Categorie pericol" ; else echo "Hazard designation" ?>: <em>*</em></strong></label>
				<input type="text" name="hazard" id="hazard" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="parity"><strong><? if ($l) echo "Paritate" ; else echo "Parity" ?>: <em>*</em></strong></label>
				<input type="text" name="parity" id="parity" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="sender"><strong><? if ($l) echo "Expeditor" ; else echo "Sender" ?>: <em>*</em></strong></label>
				<input type="text" name="sender" id="sender" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="dispatch"><strong><? if ($l) echo "Locul de expediere" ; else echo "Place of dispatch" ?>: <em>*</em></strong></label>
				<input type="text" name="dispatch" id="dispatch" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="recipient"><strong><? if ($l) echo "Desinatar" ; else echo "Recipient" ?>: <em>*</em></strong></label>
				<input type="text" name="recipient" id="recipient" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="destination"><strong><? if ($l) echo "Destinatie" ; else echo "Place of destination" ?>: <em>*</em></strong></label>
				<input type="text" name="destination" id="destination" class="required" role="input" aria-required="true"/>
			</div>
			
			<div class="stage clear">
				<label for="message"><strong><? if ($l) echo "Remarci" ; else echo "Remark" ?>: <em>*</em></strong></label>
				<textarea rows="8" name="message" id="message" class="required" role="textbox" aria-required="true"></textarea>
			</div>
			
			<p class="requiredNote"><em>*</em><?if ($l) echo "Camp obligatoriu" ; else echo "Denotes a required field" ?>.</p>
			
			<input type="submit" value="<? if ($l) echo "Trimite" ; else echo "Send" ?>" name="submit" id="submitButton"  />
		</form>
		
	</div>
	

