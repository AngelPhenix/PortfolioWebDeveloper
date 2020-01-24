<?php require_once '../partials/call.php' ?>
<?php
	$data = $database->query("SELECT phrase FROM phrases_presentation ORDER BY RAND() LIMIT 1")->fetch();
?>

<div class="bar_titre">
		<a href="index.php"><img src="../public/IMG/logo.png" alt="Logo GamerSanctuary"/></a>
		<p>"<?= $data->phrase ?>"</p>
</div>

<?php
// Si l'utilisateur vient de créer un nouveau compte valide, provenant de la page inscription.php
if(isset($_SESSION['new_account'])) { ?>
	<div class="valid_message">
		<p>Votre compte a bien été créé.</p>
	</div>
<?php 
	unset($_SESSION['new_account']);
} ?>