$(document).ready(function () {
	$('#menu_icon').click(function(event){
		event.preventDefault();
		$('#menu').toggleClass('visible');
	});
});