$(document).ready(function() {
	// Lorsque l'article choisi est changé, changer l'article display en dessous.
	$('#id_article_choisi').on('change', function(){
		var article = $('#id_article_choisi :selected').text();
		$('#nom_article').html(article);
		var id_article_choisi = $('#id_article_choisi').val();
		$.get("../controllers/retraitement_tag.php?nom=" + id_article_choisi, function(data){
			$('#tag_article').html(data);
		});
	});

	// Ajout de tag à l'article choisi.
	$('#add_tag').click(function(){
		var id_article_choisi = $('#id_article_choisi').val();
		var id_tag_choisi = $('#id_tag_choisi').val();

		$.get("../controllers/retraitement_tag.php?article=" + id_article_choisi + "&tag=" + id_tag_choisi, function(data){
			$('#tag_article').html(data);
		});
	});

	// Suppression du tag de l'article choisi.
	$('#wrapper_page').on('click', ".article_tagged", function(){
		var id_article_choisi = $('#id_article_choisi').val();
		var id_tag_choisi = $(this).html();

		$.get("../controllers/delete.php?article=" + id_article_choisi + "&tag=" + id_tag_choisi, function(data){
			$('#tag_article').html(data);
		});
	});
});