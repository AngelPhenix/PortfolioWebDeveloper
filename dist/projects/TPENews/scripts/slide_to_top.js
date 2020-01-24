// FILE USED IN : partials/footer.php
$('#return_to_top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});