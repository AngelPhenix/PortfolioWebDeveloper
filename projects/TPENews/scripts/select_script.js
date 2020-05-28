// FILE USED IN : index.php
// INTERACTING WITH <select>s FROM partials/nav.php TO DISPLAY BLOCKS IN FRONT OF LIVESTREAM 
// **************** GETTING DATA FROM CONTROLLERS/SELECT_SEARCH FOR PREVIEW-ARTICLES ****************
// SETINTERVAL ON THE AD BLOCK TO SHOW IT AFTER 3 SECONDS.
// COMPLETE THE #full_article / #media_article HTML IN index.php USING QUERY IN select_full_article.php
$(document).ready(function() {
	var refreshInterval;

	// Hide everything that's not the first div in #slideshow / #slideshow2
	$("#slideshow > div:gt(0)").hide();

	// Function used on a setTimeout. Show the div 30 seconds after the page is loaded
	// Starts the slideshow for the #pub_horizontal to change the image after 3 seconds
	// until the div is closed.
	function showHorizontalAds() {
		$("#pub_horizontal").toggle();

		refreshInterval = setInterval(function() { 
		  $('#slideshow > div:first')
		    .fadeOut(500)
		    .next()
		    .fadeIn(500)
		    .end()
		    .appendTo('#slideshow');
		},  3000);
	}

	setTimeout(showHorizontalAds, 30000); // 30 Secondes

	// Targetting the <select>s to get the value of the three selects.
	// Does an AJAX call to see if there's a result depending on the choosen value.
	// If there's a result : display the hidden div having the id #article, if not : hides it or doesn't do anything
	$("#territory_select, #activity_select, #sector_select").on('change', function() {
		var territory = $("#territory_select").val();
		var activity = $("#activity_select").val();
		var sector = $("#sector_select").val();
		$.get("./controllers/select_search.php?territory=" + territory + "&activity=" + activity + "&sector=" + sector, function(data){
			// If there's no data, hide. Else, display.
			if(!$.trim(data)){
				if($("#article").css("display") == "block"){
					$("#article").hide();
				}
			} else {
				$("#article").html(data);
				if($("#article").css("display") == "none"){
					$("#article").show();
				}
			}
		});
	});

	// Targeting the id article_button ("Suite").
	// Sends an AJAX request to the database and return the full article depending on the id of the article
	$("#website_body").on("click", "#article_button", function(e){
		e.preventDefault();
		var id = $("#article_id_preview").html();
		$.get("./controllers/select_full_article.php?id=" + id, function(data){
			// if the type of data returned is "article" or "com_press" : Put everything in the div #full_article in index.php
			$("#resume_article").html("<span id='underline'>Résumé du communiqué de presse : </span>" + data.resume)
			$("#title_article").html(data.title);
			$("#author_article").html("Par: " + data.author);
			$("#date_article").html("Le: " + data.date);
			$("#type_article").html("Classé: " + data.theme)

			// If a weblink exists in this article : change the HREF of the a inside it
			// Else, avoid reloading the page when clicking on it
			if(data.weblink != ""){
				$("#weblink_article").attr("href", data.weblink);
			} else {
				$("#weblink_article").attr("href", "javascript:void(0);");
			}

			// If com_press, add a pdf, else add a video
			if(data.type == "com_press"){
				$('#right_container_full_article').append('<embed id="pdf_article" src="" type="application/pdf">');
				$("#pdf_article").attr("src", "uploads/pdf/" + data.media);
			} else {
				$('#right_container_full_article').append('<div id="media"><iframe src="" allowfullscreen></iframe></div>');
				$("#media iframe").attr("src", data.media);
			}

			// If the div #full_article isn't showing yet : Make it visible
			if($("#full_article").css("display") == "none"){
				$("#full_article").show();
			}
		}, "json");
	});

	// Targeting the button to close the #full_article div
	$(document.body).on("click", "#hide_article", function(){
		$("#full_article").hide();
		$("#pdf_article").remove();
		$("#media").remove();
	});

	// Targeting the button to close the #full_media div
	$(document.body).on("click", "#hide_media", function(){
		$("#full_media").hide();
		$("#media iframe").attr("src", "");
	});

	// Targeting the button to remove entirely the #pub_horizontal div
	// Clear the Interval where the image ads are being switched, stopping it.
	$(document.body).on("click", "#close_horizontal_ad", function(){
		$("#pub_horizontal").remove();
		clearInterval(refreshInterval);
	});
});