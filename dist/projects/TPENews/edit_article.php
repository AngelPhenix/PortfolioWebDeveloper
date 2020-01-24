<?php session_start();
	// If not connected : Redirected to index.php.
	if(!isset($_SESSION["auth"]) || $_SESSION["auth"]->rank != "Administrateur"){
		header("Location: index.php");
	}
	// If connected :
	else {
		$member = $_SESSION["auth"];
		require_once "controllers/db.php";

		$req = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
		$req->execute([$_GET['id']]);
		$data = $req->fetch();
	}

	if(!empty($_POST)){
		if(!file_exists($_FILES['media']['tmp_name']) || !is_uploaded_file($_FILES['media']['tmp_name'])) {
				$media = $_POST['media_video'];
		} else {
			// PDF Variables used in checks
			$fileName = $_FILES['media']['name'];
			$fileTmpName = $_FILES['media']['tmp_name'];
			$fileSize = $_FILES['media']['size'];
			$fileError = $_FILES['media']['error'];

			// Explode file name in an array
			$fileExt = explode('.', $fileName);
			// Get file extension by getting the last index of the array $fileExt
			$fileActualExt = strtolower(end($fileExt));
			// The extensions allowed by the uploader
			$allowedPdfFormat = array('pdf');

			if(in_array($fileActualExt, $allowedPdfFormat)){
				if($fileError === 0){
					// 2 Mo MAX SIZE (2 * 1024 * 1024)
					if($fileSize < 2097152){
						// Get a unique ID so nothing gets deleted by another user's file.
						$media = uniqid('', true) . "." . $fileActualExt;
						// Set destination to "uploads" folder with the new name.
						$fileDestination = "uploads/pdf/".$media;
						// Process to upload the finalized file with the new name in the right folder.
						move_uploaded_file($fileTmpName, $fileDestination);
					} else {
						$errors["pdf_size"] = "Le fichier téléchargé est trop volumineux. (2 Mo max)";
					}
				} else {
					$errors['pdf_error'] = "Une erreur s'est produite lors de l'upload du PDF.";
				}
			} else {
				$errors['pdf'] = "Ce type de fichier n'est pas autorisé. Il faut un fichier ayant l'extension .pdf";
			}
		}

		$req = $pdo-> prepare("UPDATE articles SET title = ?, media = ?, resume = ?, territory = ?, activity = ?, sector = ?, weblink = ? WHERE id = ?");

		$req->execute([$_POST['title'], $media, $_POST['resume'], $_POST['article_territory'], $_POST['article_activity'], $_POST['article_sector'], $_POST['weblink'], $_GET['id']]);
		header("Location: articles.php");
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mon profil - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
	<script src="scripts/control_article_modification_form.js"></script>
</head>
<body>
	<div id="member_page_container">
		<?php require_once "partials/member_nav.php"?>

		<div id="member_body">
			<form id="article_form" action="" method="POST" enctype="multipart/form-data">
			    <input type="text" name="title" id="title" placeholder="Titre de l'article (80 caractères max.)" maxlength="80" value="<?=$data->title?>">

				<div>
				    <select id="select_territory_article_form" name="article_territory" >
				    	<option value="<?=$data->territory?>">Choisir Territoire</option>
						<option value="france">#France</option>
						<option value="outre_mer">#Outre-Mer</option>
						<option value="francophonie">#Francophonie</option>
				    </select>
				    <select id="select_activity_article_form" name="article_activity" >
				    	<option value="<?=$data->activity?>">Choisir Activité</option>
						<option value="artisants">#Artisants</option>
						<option value="commercants">#Commerçants</option>
						<option value="liberaux">#Libéraux</option>
						<option value="microentreprises">#Microentreprises</option>
						<option value="startups">#Startups</option>
						<option value="tpe">#TPE</option>
				    </select>
				    <select id="select_sector_article_form" name="article_sector" >
				    	<option value="<?=$data->sector?>">Choisir Secteur</option>
						<option value="commercial">#Commercial</option>
						<option value="comptabilite">#Comptabilité</option>
						<option value="digital">#Digital</option>
						<option value="entreprise">#Entreprise</option>
						<option value="expertise">#Expertise</option>
						<option value="formation">#Formation</option>
						<option value="finance">#Finance</option>
						<option value="fiscalite">#Fiscalité</option>
						<option value="luxe">#Luxe</option>
						<option value="mode">#Mode</option>
						<option value="sport">#Sport</option>
				    </select>
				</div>

			    <input type="text" name="resume" id="resume" placeholder="Petit résumé de l'article : (140 caractères max.)" maxlength="140" value="<?=$data->resume?>">

			    <input type="hidden" id="media_value" value="<?=$data->media?>">

				<div id="pdf_div">
					<p id="pdf_name">Nom du PDF actuel : <?=$data->media?></p>
					<label id="pdf_file">Fichier PDF :</label>
				    <input type="file" name="media" id="pdf" accept=".pdf">
				</div>

				<div id="media_div">
					<input type="text" name="media_video" id="media_article" placeholder="Lien externe de la vidéo de l'article (Attention à bien fournir le lien embed)" maxlength="140" value="<?=$data->media?>">
				</div>

			    <input type="text" name="weblink" id="weblink" placeholder="Lien vers votre site personnel" value="<?=$data->weblink?>">

			    <button type="submit">Valider la modification</button>
			</form>
		</div>
	</div>
</body>
</html>