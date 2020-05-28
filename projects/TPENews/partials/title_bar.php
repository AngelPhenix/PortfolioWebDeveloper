<?php 
if(session_status() == PHP_SESSION_NONE){
	session_start();
} ?>

<div id="title_bar_right"> 
<?php
	if(isset($_SESSION['auth'])){ ?>
	<a class="title_bar_button" href="profil.php">Mon compte</a>
<?php } else { ?>
	<a class="title_bar_button" href="connexion.php">Inscription/Connexion</a>
<?php } ?>
	<a href="#" id="menu_icon" data-transition="ease-in-out"><img src="img/menu_icon.png"></a>
</div>

<div id="menu">
	<a href="index.php">Accueil</a>
	<a href="faq.php">FAQ</a>
	<a href="publications-gratuites.php">Publications Gratuites</a>
	<a href="publications-payantes.php">Publications Payantes</a>
	<a href="tarifs.php">Tarifs</a>
	<a href="conditions-generales-de-vente.php">Conditions Générales des Ventes</a>
	<a href="contact.php">Contact</a>
	<a href="a-propos.php">Qui Sommes-nous?</a>
	<a href="mentions-legales.php">Mentions Légales</a>
</div>