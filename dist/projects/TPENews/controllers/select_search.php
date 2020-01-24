<?php
/*
*	FILE USED IN : scripts/select_script.js
*	USING SELECTED VALUE IN THE NAV TO QUERY AND SEND BACK
*	THE LAST ARTICLE
*/ 
?>
	<?php 
		require_once 'db.php';
		$territory = $_GET['territory']; 
		$activity = $_GET['activity'];
		$sector = $_GET['sector'];

		if(!empty($territory) && empty($activity) && empty($sector)){
			$req = $pdo->prepare("SELECT * FROM articles WHERE territory = ? ORDER BY id DESC LIMIT 1");
			$req->execute([$territory]);
		} elseif (!empty($territory) && !empty($activity) && empty($sector)){
			$req = $pdo->prepare("SELECT * FROM articles WHERE territory = ? AND activity = ? ORDER BY id DESC LIMIT 1");
			$req->execute([$territory, $activity]);
		} elseif (!empty($territory) && !empty($activity) && !empty($sector)){
			$req = $pdo->prepare("SELECT * FROM articles WHERE territory = ? AND activity = ? AND sector = ? ORDER BY id DESC LIMIT 1");
			$req->execute([$territory, $activity, $sector]);
		} elseif (!empty($territory) && empty($activity) && !empty($sector)){
			$req = $pdo->prepare("SELECT * FROM articles WHERE territory = ? AND sector = ? ORDER BY id DESC LIMIT 1");
			$req->execute([$territory, $sector]);
		}
		$article = $req->fetch();

		// If something has been found by the query contained in $req, store the article as an object in $article
		if(!empty($article)){ 
			if($article->type == "com_press"){
				$icon = "img/compress_icon.png";
			} else {
				$icon = "img/video_icon.png";
			}

			$dateNonConforme = explode(" ", $article->date);
			$dateConforme = explode("-", $dateNonConforme[0]);
			?>

			<span id="article_id_preview"><?= $article->id ?></span>
			<div id="preview_article">
				<img src=<?=$icon?>>
				<h3 id="article_title"><?= $article->title ?></h3>
				<?php 
				if(!empty($article->media)){?>
					<a id="article_button" href="#">Suite</a>
				<?php }?>
			</div>
			<p id="article_text"><?= $article->resume ?></p>
			<p id="article_date"><?= $dateConforme[2] .' - '. $dateConforme[1] .' - '. $dateConforme[0] ?></p>
			<?php
		}
	?>