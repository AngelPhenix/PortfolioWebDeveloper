<hr>
<div class="article_milieu">
		<?php while ($donnees = $reponse->fetch()){
			 $phrase_acceuil = mb_substr($donnees['article'], 0, 200);
		?>
			<div class="divise1">
					<img src="<?php echo $donnees['image_titre'];?>" alt="Image Article Accueil">
			</div>
			<div class="divise2"><h2> <?php echo $donnees['titre']?> </h2>
				<p> <?php echo $phrase_acceuil ?> ... <a href="./article-<?php echo $donnees['id'];?>">[Lire Plus]</a> </p>
				<?php $query2 = ('SELECT nom FROM articles, tags, article_tag WHERE tags.id = article_tag.tags_id AND article_tag.articles_id = articles.id AND articles.id = '.$donnees['id']);
				$reponse2 = $database->query($query2); ?>
				<p id="tags"> Tags :  <?php while($donnees2 = $reponse2->fetch()){  echo $donnees2['nom'].' '; } ?> </p>
			</div>
			<hr>
		<?php } ?>
</div>