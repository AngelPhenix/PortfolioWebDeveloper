<?php 
	require_once '../partials/call.php';
	$query = $database->query('SELECT * FROM articles ORDER BY id DESC LIMIT 0,5')->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="container_image_links">
	<a id="one" href="./article-<?=$query[0]['id']?>"><img src="../uploads/<?=$query[0]['image_titre']?>" alt="Image de remplacement"></a>
	<a id="two" href="./article-<?=$query[1]['id']?>"><img src="../uploads/<?=$query[1]['image_titre']?>" alt="Image de remplacement"></a>
	<a id="three" href="./article-<?=$query[2]['id']?>"><img src="../uploads/<?=$query[2]['image_titre']?>" alt="Image de remplacement"></a>
	<a id="four" href="./article-<?=$query[3]['id']?>"><img src="../uploads/<?=$query[3]['image_titre']?>" alt="Image de remplacement"></a>
	<a id="five" href="./article-<?=$query[4]['id']?>"><img src="../uploads/<?=$query[4]['image_titre']?>" alt="Image de remplacement"></a>
</div>