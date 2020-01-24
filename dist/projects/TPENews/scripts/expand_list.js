// FILE USED IS : a-propos.php / faq.php
$(document).ready(function () {
    $('.toggle').hide();
    
    $('a.togglelink').on('click', function (e) {
        e.preventDefault();
        var elem = $(this).next('.toggle');
        $('.toggle').not(elem).hide('fast');
        elem.toggle('fast');
    });
});

$('#articles').click(function(event){
	event.preventDefault();
	$('.cache').not('#articles').addClass('hidden');
	$('#articles').toggleClass('hidden');
});