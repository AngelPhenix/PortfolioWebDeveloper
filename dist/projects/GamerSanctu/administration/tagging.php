<?php require_once '../partials/call.php' ?>
<?php require_once '../partials/session.php' ?>
<?php if(isset($_SESSION['auth']) && $_SESSION['auth']->rank >= 90){ ?>
<?php require_once '../partials/head.php' ?>
<body>
	<div id="big_container">
		<?php require_once '../partials/admin_menu.php';?>
		<?php
			$nb_tags = $database->query("SELECT count(*) as tag FROM tags")->fetch();
			$query2 = $database->query("SELECT id, nom FROM tags")->fetchAll();
			$query3 = $database->query("SELECT id, titre FROM articles")->fetchAll();
		?>
		<div id="wrapper_page">
			<form class="form_tagging_as" method="post" action="../controllers/traitement_tag.php">
				<fieldset>
					<legend> Ajouter un tag </legend>
			        <div>
						<input type="text" name="name" placeholder="Nom du tag à ajouter" required>
					</div>
					<div>
						<input type="text" name="desc" placeholder="Description du tag" required>
					</div>
					<input type="hidden" value="ajout" name="genre"/>
					<input type="submit" value="Valider">
				</fieldset>
			</form>

			<form class="form_tagging_as" method="post" action="../controllers/traitement_tag.php"">
				<fieldset>
					<legend> Supprimer un tag</legend>
					<select name="name">
						<?php foreach ($query2 as $tag): ?>
							<option value="<?=$tag->nom?>"><?=$tag->nom?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" value="suppression" name="genre"/>
					<input type="submit" value="Valider">
				</fieldset>
		    </form>

		    <div id="modification_article">
				<label for="article">Article concerné :</label>
				<select name="article" id="id_article_choisi">
						<option selected>Aucun article choisi</option>
					<?php foreach ($query3 as $article): ?>
						<option id="article_choisi" value="<?=$article->id?>"><?=$article->titre?></option>
					<?php endforeach ?>
				</select>
				<label for="tags">Tag à ajouter :</label>
				<select name="tags" id="id_tag_choisi">
					<?php foreach ($query2 as $tag): ?>
						<option value="<?=$tag->id?>"><?=$tag->nom?></option>
					<?php endforeach ?>
				</select>
				<button id="add_tag">Ajouter</button>

				<p>Article choisi : <span id="nom_article"></span></p>
				<p>Tags de l'article : <span id="tag_article"></span></p>
		    </div>
		</div>
	</div>
</body>
</html>
<?php } ?>