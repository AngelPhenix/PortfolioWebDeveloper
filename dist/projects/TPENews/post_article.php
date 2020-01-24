<?php session_start();
	// If not connected : Redirected to index.php.
	if(!isset($_SESSION["auth"])){
		header("Location: index.php");
	}
	// If connected proceed to form verification by getting user info in $member
	else {
		require_once "controllers/db.php";
		$member = $_SESSION["auth"];

		/*
			1) Check if everything is correctly completed by the user. (If not, reload and echo the error.)
			2) Manage the file if one has been uploaded : Check if : .pdf / no error during upload / <= 2Mo size
			3) Manage the file if one has been uploaded : Check if : .jpg/.jpeg/.png / no error during upload / <= 1Mo size
		*/
		if(!empty($_POST)){
			$errors = array();

			// REQUIRED
			if(empty($_POST['title'])){
				$errors["title"] = "Le titre n'a pas été rempli.";
			}

			// REQUIRED
			if(empty($_POST['article_type'])){
				$errors["article_type"] = "Le type de l'article n'est pas valide";
			}

			// REQUIRED
			if(empty($_POST['article_territory'])){
				$errors["article_territory"] = "Le territoire de l'article n'est pas valide";
			}

			// REQUIRED
			if(empty($_POST['article_activity'])){
				$errors["article_activity"] = "L'activité de l'article n'est pas valide";
			}

			// REQUIRED
			if(empty($_POST['article_sector'])){
				$errors["article_sector"] = "Le secteur de l'article n'est pas valide";
			}

			/*
			*	IF TYPE ARTICLE = ARTICLE OR COM_PRESS : CHECK IF PDF IS UPLOADED AND SEND IT TO DATABASE/FOLDER
			*	ELSE TYPE = VIDEO :  CHECK IF MEDIA_LINK ISN'T EMPTY AND SEND IT TO DATABASE
			*/
			if($_POST['article_type'] == "com_press"){
				if(!file_exists($_FILES['media']['tmp_name']) || !is_uploaded_file($_FILES['media']['tmp_name'])) {
   					$media = "";
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
								// File is OK. Can be used if no errors was found on other user input checks.
								$fileState = true;
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
			} else {
				if(empty($_POST['media'])){
					$errors['media'] = "Vous n'avez pas fourni de lien vidéo.";
				} else {
					$media = $_POST['media'];
				}
			}

		// Everything worked out properly : Upload the file sent and insert the informations in articles.
		if(empty($errors)){
			// File has been checked and is OK.
			if(!empty($fileState)){
				if($fileState === true){
					// Get a unique ID so nothing gets deleted by another user's file.
					$media = uniqid('', true) . "." . $fileActualExt;
					// Set destination to "uploads" folder with the new name.
					$fileDestination = "uploads/pdf/".$media;
					// Process to upload the finalized file with the new name in the right folder.
					move_uploaded_file($fileTmpName, $fileDestination);
				}
			}

			// If weblink is empty because user is not premium or forgot it : Let it empty
			if(empty($_POST['weblink'])){
				$weblink = "";
			} else {
				$weblink = $_POST['weblink'];
			}

			$req = $pdo->prepare("INSERT INTO articles SET title = ?, media = ?, resume = ?, author = ?, type = ?, territory = ?, activity = ?, sector = ?, weblink = ?");
			$req->execute([
				$_POST['title'],
				$media,
				$_POST['resume'],
				$member->username,
				$_POST['article_type'],
				$_POST['article_territory'],
				$_POST['article_activity'],
				$_POST['article_sector'],
				$weblink]);

			$_SESSION['article_validated'] = "";
			header("Location: profil.php");
		}
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<title>Poster un article - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
	<script src="scripts/control_article_form.js"></script>
</head>
<body>
	<div id="member_page_container">
		<?php require_once "partials/member_nav.php"?>

		<div id="member_body">

			<?php
			// Si des erreurs ont été détectées lors de l'envoi de l'article
			if(!empty($errors)) { ?>
				<div class="error_message">
					<ul>
					<?php foreach($errors as $error) { ?>
						<li><?php echo $error ?></li>
					<?php } ?>
					</ul>
				</div>
			<?php } ?>

			<form id="article_form" action="" method="POST" enctype="multipart/form-data">
			    <input type="text" name="title" id="title" placeholder="Titre de l'article (80 caractères max.)" maxlength="80" required>
				<span class="error"></span>

				<div>
				    <select id="select_type_article_form" name="article_type" required>
				    	<option value="">Choisir Type</option>
						<option value="com_press">Communiqué</option>
						<option value="video">Vidéo</option>
				    </select>
				    <select id="select_territory_article_form" name="article_territory" required>
				    	<option value="">Choisir Territoire</option>
						<option value="france">#France</option>
						<option value="outre_mer">#Outre-Mer</option>
						<option value="francophonie">#Francophonie</option>
				    </select>
				    <select id="select_activity_article_form" name="article_activity" required>
				    	<option value="">Choisir Activité</option>
						<option value="artisants">#Artisants</option>
						<option value="commercants">#Commerçants</option>
						<option value="liberaux">#Libéraux</option>
						<option value="microentreprises">#Microentreprises</option>
						<option value="startups">#Startups</option>
						<option value="tpe">#TPE</option>
				    </select>
				    <select id="select_sector_article_form" name="article_sector" required>
				    	<option value=>Choisir Secteur</option>
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
				    <span class="error"></span>
				</div>

			    <input type="text" name="resume" id="resume" placeholder="Petit résumé de l'article : (140 caractères max.)" maxlength="140" required>
			    <span class="error"></span>

				<div id="pdf_div">
					<label id="pdf_file">Fichier PDF :</label>
				    <input type="file" name="media" id="pdf" accept=".pdf">
				    <span class="error"></span>
				</div>

				<div id="media_div">
					<input type="text" name="media" id="media_article" placeholder="Lien externe de la vidéo de l'article (Attention à bien fournir le lien embed)" maxlength="140">
			    	<span class="error"></span>
				</div>

			    <?php 
			    if($member->rank == "Administrateur" || $member->rank == "Editeur"){?>
			    	<input type="text" name="weblink" id="weblink" placeholder="Lien vers votre site personnel">
			    	<span class="error"></span>
			    <?php } ?>
			    <button type="submit">Valider l'article</button>
			</form>
		</div>
	</div>
</body>
</html>