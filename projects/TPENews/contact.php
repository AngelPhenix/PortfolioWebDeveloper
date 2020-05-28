<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
</head>
<body>
	<div id="title_bar">
		<a href="index.php"><img src="img/logo.png" alt="Logo TPENEWS.TV"/></a>
		<h1>Contact</h1>
		<?php require_once 'partials/title_bar.php'?>
	</div>


	<?php
	// Si des données ont été envoyées à cette page
	if(!empty($_POST)){
		require_once 'controllers/db.php';
		$errors= array();
		// Vérif. Si les champs "required" sont remplis ou non
		if(empty($_POST['date'])){
			$errors['date'] = "Veuillez remplir le champ date";
		}
		if(empty($_POST['prefix']) || empty($_POST['name']) || empty($_POST['surname'])){
			$errors['names'] = "Veuillez remplir les champs nom";
		}
		// Vérification mail : Si non-vide ou écriture spéciale
		if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
			$errors['mail'] = "Le mail n'est pas valide.";
		}
		if(empty($_POST['function'])){
			$errors['function'] = "Veuillez remplir le champ fonction";
		}
		if(empty($_POST['object'])){
			$errors['object'] = "Veuillez renseignez l'objet de votre message dans la partie objet";
		}
		if(empty($_POST['rgpd01']) || empty($_POST['rgpd02'])){
			$errors['rgpd'] = "Veuillez cocher la case concernant la protection des données RGPD";
		}

		// Si aucune erreur n'est survenue, nouvelle utilisateur créé 
		// Puis redirection page de connexion avec la variable de SESSION new_account
		if(empty($errors)){
			$req = $pdo-> prepare("INSERT INTO messages SET date = ?, prefix = ?, name = ?, surname = ?, mail = ?, phone = ?, mobile = ?, function = ?,
				adress1 = ?, adress2 = ?, city = ?, region = ?, postal = ?, country = ?, url = ?, object = ?, rgpd01 = ?, rgpd02 = ?");
			$req->execute([$_POST['date'],$_POST['prefix'],$_POST['name'],$_POST['surname'],$_POST['mail'],$_POST['phone'],$_POST['mobile'],$_POST['function'],$_POST['adress1'],$_POST['adress2'],$_POST['city'],$_POST['region'],$_POST['postal'],$_POST['country'],$_POST['url'],$_POST['object'],
				$_POST['rgpd01'],$_POST['rgpd02']]);
			$_SESSION['message_sent'] = "";
		}	
	} ?>



	<?php
	// Si des erreurs ont été détectées lors de l'inscription.
	if(!empty($errors)) { ?>
		<div class="error_message">
			<p>Vous n'avez pas rempli le formulaire correctement :</p>
			<ul>
			<?php foreach($errors as $error) { ?>
				<li><?php echo $error ?></li>
			<?php } ?>
			</ul>
		</div>
	<?php } ?>

	<!-- CONTENT -->
	<article>
		<?php
		// Si l'utilisateur vient d'envoyer un message via le formulaire de contact.
		if(isset($_SESSION['message_sent'])) { ?>
			<div class="valid_message">
				<p>Votre message a bien été envoyé.</p>
			</div>
		<?php 
			unset($_SESSION['message_sent']);
		} ?>
		<h2 id="contact_title">Contactez-nous</h2>

		<form id="contact_form" action="" method="POST">
		    <label for="date">Date <span class="imp">*</span></label>
		    <input type="date" name="date" id="date" required>

		    <label>Nom <span class="imp">*</span></label>
		    <div class="full_name_block">
		    	<select class="item_prefix_1" name="prefix" required>
		    		<option value="" selected="selected"></option>
		    		<option value="M.">M.</option>
		    		<option value="Mme">Mme</option>
		    		<option value="Mlle">Mlle</option>
		    		<option value="Dr">Dr</option>
		    		<option value="Prof.">Prof.</option>
		    		<option value="Rev.">Rev.</option>
		    	</select>
			    <p class="item_prefix_2">Préfixe</p>
			    <input class="item_surname_1" type="text" name="name" required>
			    <p class="item_surname_2">Prénom</p>
			    <input class="item_name_1" type="text" name="surname" required>
			    <p class="item_name_2">Nom</p>
			</div>

			<label for="mail">E-mail<span class="imp">*</span></label>
		    <input class="contact_50_width" type="email" name="mail" id="mail" required>

		    <label for="phone">Téléphone</label>
		    <input class="contact_50_width" type="text" name="phone" id="phone">

		    <label for="mobile">Téléphone Mobile</label>
		    <input class="contact_50_width" type="text" name="mobile">

		    <label for="function">Fonction<span class="imp">*</span></label>
		    <input class="contact_50_width" type="text" name="function" id="function" required>

			<label>Adresse</label>
			<div id="adress_block">
			    <input class="item_01" type="text" name="adress1">
			    <p class="item_02">Adresse postale</p>
			    <input class="item_03" type="text" name="adress2">
			    <p class="item_04">Adresse ligne 2</p>

			    <input class="item_05" type="text" name="city">
			    <p class="item_06">Ville</p>
			    <input class="item_07" type="text" name="region">
			    <p class="item_08">État / Province / Région</p>

			    <input class="item_09" type="text" name="postal">
			    <p class="item_10">ZIP / Code postal</p>
			    <select class="item_11" name="country">
			    	<option value="" selected="selected"></option>
					<option value="AFG">Afghanistan</option>
					<option value="ALA">Åland Islands</option>
					<option value="ALB">Albania</option>
					<option value="DZA">Algeria</option>
					<option value="ASM">American Samoa</option>
					<option value="AND">Andorra</option>
					<option value="AGO">Angola</option>
					<option value="AIA">Anguilla</option>
					<option value="ATA">Antarctica</option>
					<option value="ATG">Antigua and Barbuda</option>
					<option value="ARG">Argentina</option>
					<option value="ARM">Armenia</option>
					<option value="ABW">Aruba</option>
					<option value="AUS">Australia</option>
					<option value="AUT">Austria</option>
					<option value="AZE">Azerbaijan</option>
					<option value="BHS">Bahamas</option>
					<option value="BHR">Bahrain</option>
					<option value="BGD">Bangladesh</option>
					<option value="BRB">Barbados</option>
					<option value="BLR">Belarus</option>
					<option value="BEL">Belgium</option>
					<option value="BLZ">Belize</option>
					<option value="BEN">Benin</option>
					<option value="BMU">Bermuda</option>
					<option value="BTN">Bhutan</option>
					<option value="BOL">Bolivia, Plurinational State of</option>
					<option value="BES">Bonaire, Sint Eustatius and Saba</option>
					<option value="BIH">Bosnia and Herzegovina</option>
					<option value="BWA">Botswana</option>
					<option value="BVT">Bouvet Island</option>
					<option value="BRA">Brazil</option>
					<option value="IOT">British Indian Ocean Territory</option>
					<option value="BRN">Brunei Darussalam</option>
					<option value="BGR">Bulgaria</option>
					<option value="BFA">Burkina Faso</option>
					<option value="BDI">Burundi</option>
					<option value="KHM">Cambodia</option>
					<option value="CMR">Cameroon</option>
					<option value="CAN">Canada</option>
					<option value="CPV">Cape Verde</option>
					<option value="CYM">Cayman Islands</option>
					<option value="CAF">Central African Republic</option>
					<option value="TCD">Chad</option>
					<option value="CHL">Chile</option>
					<option value="CHN">China</option>
					<option value="CXR">Christmas Island</option>
					<option value="CCK">Cocos (Keeling) Islands</option>
					<option value="COL">Colombia</option>
					<option value="COM">Comoros</option>
					<option value="COG">Congo</option>
					<option value="COD">Congo, the Democratic Republic of the</option>
					<option value="COK">Cook Islands</option>
					<option value="CRI">Costa Rica</option>
					<option value="CIV">Côte d'Ivoire</option>
					<option value="HRV">Croatia</option>
					<option value="CUB">Cuba</option>
					<option value="CUW">Curaçao</option>
					<option value="CYP">Cyprus</option>
					<option value="CZE">Czech Republic</option>
					<option value="DNK">Denmark</option>
					<option value="DJI">Djibouti</option>
					<option value="DMA">Dominica</option>
					<option value="DOM">Dominican Republic</option>
					<option value="ECU">Ecuador</option>
					<option value="EGY">Egypt</option>
					<option value="SLV">El Salvador</option>
					<option value="GNQ">Equatorial Guinea</option>
					<option value="ERI">Eritrea</option>
					<option value="EST">Estonia</option>
					<option value="ETH">Ethiopia</option>
					<option value="FLK">Falkland Islands (Malvinas)</option>
					<option value="FRO">Faroe Islands</option>
					<option value="FJI">Fiji</option>
					<option value="FIN">Finland</option>
					<option value="FRA">France</option>
					<option value="GUF">French Guiana</option>
					<option value="PYF">French Polynesia</option>
					<option value="ATF">French Southern Territories</option>
					<option value="GAB">Gabon</option>
					<option value="GMB">Gambia</option>
					<option value="GEO">Georgia</option>
					<option value="DEU">Germany</option>
					<option value="GHA">Ghana</option>
					<option value="GIB">Gibraltar</option>
					<option value="GRC">Greece</option>
					<option value="GRL">Greenland</option>
					<option value="GRD">Grenada</option>
					<option value="GLP">Guadeloupe</option>
					<option value="GUM">Guam</option>
					<option value="GTM">Guatemala</option>
					<option value="GGY">Guernsey</option>
					<option value="GIN">Guinea</option>
					<option value="GNB">Guinea-Bissau</option>
					<option value="GUY">Guyana</option>
					<option value="HTI">Haiti</option>
					<option value="HMD">Heard Island and McDonald Islands</option>
					<option value="VAT">Holy See (Vatican City State)</option>
					<option value="HND">Honduras</option>
					<option value="HKG">Hong Kong</option>
					<option value="HUN">Hungary</option>
					<option value="ISL">Iceland</option>
					<option value="IND">India</option>
					<option value="IDN">Indonesia</option>
					<option value="IRN">Iran, Islamic Republic of</option>
					<option value="IRQ">Iraq</option>
					<option value="IRL">Ireland</option>
					<option value="IMN">Isle of Man</option>
					<option value="ISR">Israel</option>
					<option value="ITA">Italy</option>
					<option value="JAM">Jamaica</option>
					<option value="JPN">Japan</option>
					<option value="JEY">Jersey</option>
					<option value="JOR">Jordan</option>
					<option value="KAZ">Kazakhstan</option>
					<option value="KEN">Kenya</option>
					<option value="KIR">Kiribati</option>
					<option value="PRK">Korea, Democratic People's Republic of</option>
					<option value="KOR">Korea, Republic of</option>
					<option value="KWT">Kuwait</option>
					<option value="KGZ">Kyrgyzstan</option>
					<option value="LAO">Lao People's Democratic Republic</option>
					<option value="LVA">Latvia</option>
					<option value="LBN">Lebanon</option>
					<option value="LSO">Lesotho</option>
					<option value="LBR">Liberia</option>
					<option value="LBY">Libya</option>
					<option value="LIE">Liechtenstein</option>
					<option value="LTU">Lithuania</option>
					<option value="LUX">Luxembourg</option>
					<option value="MAC">Macao</option>
					<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
					<option value="MDG">Madagascar</option>
					<option value="MWI">Malawi</option>
					<option value="MYS">Malaysia</option>
					<option value="MDV">Maldives</option>
					<option value="MLI">Mali</option>
					<option value="MLT">Malta</option>
					<option value="MHL">Marshall Islands</option>
					<option value="MTQ">Martinique</option>
					<option value="MRT">Mauritania</option>
					<option value="MUS">Mauritius</option>
					<option value="MYT">Mayotte</option>
					<option value="MEX">Mexico</option>
					<option value="FSM">Micronesia, Federated States of</option>
					<option value="MDA">Moldova, Republic of</option>
					<option value="MCO">Monaco</option>
					<option value="MNG">Mongolia</option>
					<option value="MNE">Montenegro</option>
					<option value="MSR">Montserrat</option>
					<option value="MAR">Morocco</option>
					<option value="MOZ">Mozambique</option>
					<option value="MMR">Myanmar</option>
					<option value="NAM">Namibia</option>
					<option value="NRU">Nauru</option>
					<option value="NPL">Nepal</option>
					<option value="NLD">Netherlands</option>
					<option value="NCL">New Caledonia</option>
					<option value="NZL">New Zealand</option>
					<option value="NIC">Nicaragua</option>
					<option value="NER">Niger</option>
					<option value="NGA">Nigeria</option>
					<option value="NIU">Niue</option>
					<option value="NFK">Norfolk Island</option>
					<option value="MNP">Northern Mariana Islands</option>
					<option value="NOR">Norway</option>
					<option value="OMN">Oman</option>
					<option value="PAK">Pakistan</option>
					<option value="PLW">Palau</option>
					<option value="PSE">Palestinian Territory, Occupied</option>
					<option value="PAN">Panama</option>
					<option value="PNG">Papua New Guinea</option>
					<option value="PRY">Paraguay</option>
					<option value="PER">Peru</option>
					<option value="PHL">Philippines</option>
					<option value="PCN">Pitcairn</option>
					<option value="POL">Poland</option>
					<option value="PRT">Portugal</option>
					<option value="PRI">Puerto Rico</option>
					<option value="QAT">Qatar</option>
					<option value="REU">Réunion</option>
					<option value="ROU">Romania</option>
					<option value="RUS">Russian Federation</option>
					<option value="RWA">Rwanda</option>
					<option value="BLM">Saint Barthélemy</option>
					<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
					<option value="KNA">Saint Kitts and Nevis</option>
					<option value="LCA">Saint Lucia</option>
					<option value="MAF">Saint Martin (French part)</option>
					<option value="SPM">Saint Pierre and Miquelon</option>
					<option value="VCT">Saint Vincent and the Grenadines</option>
					<option value="WSM">Samoa</option>
					<option value="SMR">San Marino</option>
					<option value="STP">Sao Tome and Principe</option>
					<option value="SAU">Saudi Arabia</option>
					<option value="SEN">Senegal</option>
					<option value="SRB">Serbia</option>
					<option value="SYC">Seychelles</option>
					<option value="SLE">Sierra Leone</option>
					<option value="SGP">Singapore</option>
					<option value="SXM">Sint Maarten (Dutch part)</option>
					<option value="SVK">Slovakia</option>
					<option value="SVN">Slovenia</option>
					<option value="SLB">Solomon Islands</option>
					<option value="SOM">Somalia</option>
					<option value="ZAF">South Africa</option>
					<option value="SGS">South Georgia and the South Sandwich Islands</option>
					<option value="SSD">South Sudan</option>
					<option value="ESP">Spain</option>
					<option value="LKA">Sri Lanka</option>
					<option value="SDN">Sudan</option>
					<option value="SUR">Suriname</option>
					<option value="SJM">Svalbard and Jan Mayen</option>
					<option value="SWZ">Swaziland</option>
					<option value="SWE">Sweden</option>
					<option value="CHE">Switzerland</option>
					<option value="SYR">Syrian Arab Republic</option>
					<option value="TWN">Taiwan, Province of China</option>
					<option value="TJK">Tajikistan</option>
					<option value="TZA">Tanzania, United Republic of</option>
					<option value="THA">Thailand</option>
					<option value="TLS">Timor-Leste</option>
					<option value="TGO">Togo</option>
					<option value="TKL">Tokelau</option>
					<option value="TON">Tonga</option>
					<option value="TTO">Trinidad and Tobago</option>
					<option value="TUN">Tunisia</option>
					<option value="TUR">Turkey</option>
					<option value="TKM">Turkmenistan</option>
					<option value="TCA">Turks and Caicos Islands</option>
					<option value="TUV">Tuvalu</option>
					<option value="UGA">Uganda</option>
					<option value="UKR">Ukraine</option>
					<option value="ARE">United Arab Emirates</option>
					<option value="GBR">United Kingdom</option>
					<option value="USA">United States</option>
					<option value="UMI">United States Minor Outlying Islands</option>
					<option value="URY">Uruguay</option>
					<option value="UZB">Uzbekistan</option>
					<option value="VUT">Vanuatu</option>
					<option value="VEN">Venezuela, Bolivarian Republic of</option>
					<option value="VNM">Viet Nam</option>
					<option value="VGB">Virgin Islands, British</option>
					<option value="VIR">Virgin Islands, U.S.</option>
					<option value="WLF">Wallis and Futuna</option>
					<option value="ESH">Western Sahara</option>
					<option value="YEM">Yemen</option>
					<option value="ZMB">Zambia</option>
					<option value="ZWE">Zimbabwe</option>
				</select>
			    <p class="item_12">Pays</p>


			</div>

			<label for="url">Site Web</label>
		    <input type="url" name="url" id="url" placeholder="http://">

		    <label for="object">Objet <span class="imp">*</span> ( Saisir l'objet de la demande )</label>
		    <textarea class="contact_100_width" name="object" id="object" required></textarea>



			<label>Protection des données "RGPD" <span class="imp">*</span></label>
			<div class="contact_radio">
		    	<input type="radio" name="rgpd01" value="1" id="rgpd01" required><label id="inline_label" for="rgpd01">J'accepte l'enregistrement des données et publications.</label>
			</div>
			<p class="contact_under_radio">En cochant cette case, l'utilisateur reconnait consentir à l'enregistrement des données et publications contenues dans ce formulaire.</p>



			<div class="contact_radio">
		    	<input type="radio" name="rgpd02" value="1" id="rgpd02" required><label id="inline_label" for="rgpd02">J’ai lu et accepte la politique de confidentialité de ce site</label>
			</div>
			<p class="contact_under_radio">En cochant cette case, l'utilisateur reconnait avoir pris connaissance des "conditions générales des ventes" et la politique de confidentialité présentée dans les "Mentions légales".</p>

			<p><span class="imp">*</span>obligatoire</p>
		    <button type="submit" value="Submit" id="contact_button">Envoyer</button>
		</form>
	</article>

	<?php require_once 'partials/footer.php'?>
</body>
</html>