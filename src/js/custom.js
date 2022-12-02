jQuery(document).ready(function(){
    jQuery('body #main-block').css('min-height','calc(100vh - '+jQuery('header').height()+'px - '+jQuery('footer').height()+'px)');
});