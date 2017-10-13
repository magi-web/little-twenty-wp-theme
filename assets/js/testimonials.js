jQuery(document).ready(function () {
    jQuery('#btn-temoignage').click(function() {
        jQuery('#testimonial-form').slideDown();
        jQuery(this).fadeOut();
    });
    var submitLbl = jQuery('#testimonial-form').find('.submit label');
    jQuery( "<button id='testimonial-close-btn'>Annuler</button>" ).insertAfter( submitLbl );
    jQuery('#testimonial-close-btn').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        jQuery('#testimonial-form').slideUp();
        jQuery('#btn-temoignage').fadeIn();
    });
});