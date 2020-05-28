/*
*	FILE USED IN article.php TO CONTROL INPUTS 
*	AND VALIDATE THE FORM BEFORE POSTING ARTICLES
*/

$(document).ready(function (){
	var value = $('#media_value').val();
	var lastFour = value.substr(value.length - 4);

	if((lastFour) != ""){
		if(lastFour == ".pdf"){
			$("#pdf_div").show();
		} else {
			$("#media_div").show();
		}
	}
});