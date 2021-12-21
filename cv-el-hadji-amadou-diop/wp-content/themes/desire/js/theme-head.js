/* DESIRE THEME JAVASCRIPT */

jQuery(document).ready(function() {
    //Animate Menu
    jQuery('.main-menu ul li').hover(function() {
        jQuery(this).find('ul:first').css({visibility:"visible",display:"none"}).slideDown(500);
    },
    function() {
        jQuery(this).find('ul:first').hide();
    });

    //Adding Last class
    jQuery('li:last-child').addClass('last');
    jQuery('.entry-content *:last-child').addClass('last');
    jQuery('.widget p:last-child').addClass('last');
    jQuery('.widget div:last-child').addClass('last');
    jQuery('blockquote *:last-child').addClass('last');

    //Animating tabbed content
    jQuery('.widget-tab').click(function() {
        var clickedId = jQuery(this).attr("id");
        var currentId = jQuery('.current-tab').attr("id");
        var showContentId = clickedId.replace('tab','tab-content');
        if(clickedId != currentId) {
            jQuery('.widget-tab').removeClass('current-tab');
            jQuery(this).addClass('current-tab');
            jQuery('.widget-tab-content').hide();
            jQuery('#' + showContentId).fadeIn(400);
        }
    });
});