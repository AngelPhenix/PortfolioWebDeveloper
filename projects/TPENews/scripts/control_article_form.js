/*
*	FILE USED IN article.php TO CONTROL INPUTS 
*	AND VALIDATE THE FORM BEFORE POSTING ARTICLES
*/

$(document).ready(function (){
	$("#select_type_article_form").on('change', function(){
		if($("#select_type_article_form").val() == "video"){
			$("#pdf_div").hide();
			$("#media_div").show();
			$("#media_article").prop('required', true);
		} else if ($("#select_type_article_form").val() == "com_press"){
			$("#pdf_div").show();
			$("#media_div").hide();
			$("#media_article").prop('required', false);
		} else {
			$("#pdf_div").hide();
			$("#media_div").hide();
			$("#media_article").prop('required', false);
		}
	});


	// Control the form when the submit button is clicked
	$("#article_form").submit(function(){
		var noErrors = true;

		// Control if title is empty
		if($("#title").val() == ""){
			$("#title").addClass("input_error");
			$("#title").next(".error").html("Veuillez remplir le titre de l'article.");
			noErrors = false;
		} else {
			$("#title").removeClass("input_error");
			$("#title").next(".error").html("");
		};

		// Control if type article is empty
		if($("#select_type_article_form").val() == ""){
			$("#select_type_article_form").addClass("input_error");
			noErrors = false;
		} else {
			$("#select_type_article_form").removeClass("input_error");
		}

		// Control if localisation article is empty
		if($("#select_localisation_article_form").val() == ""){
			$("#select_localisation_article_form").addClass("input_error");
			noErrors = false;
		} else {
			$("#select_localisation_article_form").removeClass("input_error");
		}

		// Control if theme article is empty
		if($("#select_theme_article_form").val() == ""){
			$("#select_theme_article_form").addClass("input_error");
			noErrors = false;
		} else {
			$("#select_theme_article_form").removeClass("input_error");
		}

		// Control if the categories are empty
		if($("#select_type_article_form").val() == "" || $("#select_localisation_article_form").val() == "" || $("#select_theme_article_form").val() == ""){
			$("#select_theme_article_form").next(".error").html("Veuillez saisir les catégories de l'article.");
			noErrors = false;
		} else {
			$("#select_theme_article_form").next(".error").html("");
		}

		// If there's an error : Do not send form to PHP file.
		if(!noErrors){
			return false;
		}
	});
});