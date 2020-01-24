$(document).ready(function() {
	$('#select_article').on('change', function(){
		var article = $('#select_article :selected').val();
		$.get("../controllers/traitement_article.php?id=" + article, function(data){
			$('#article_id').val(data.id);
			$('#article_name').val(data.titre);
			$('#image').val(data.image_titre);
			$('#categorie').val(data.categorie);
			$('#article_text').val(data.article);
		}, "json");
	});
});