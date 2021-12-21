function slideShow(speed) {
    //append a LI item to the UL list for displaying caption
    jQuery('ul.slideshow').append('<li id="slideshow-caption" class="caption"><div class="slideshow-caption-container"><h3></h3><p></p></div></li>');

    //Set the opacity of all images to 0
    jQuery('ul.slideshow li').css({opacity: 0.0});

    //Get the first image and display it (set it to full opacity)
    jQuery('ul.slideshow li:first').css({opacity: 1.0}).addClass('show');

    //Get the caption of the first image from REL attribute and display it
    jQuery('#slideshow-caption h3').html(jQuery('ul.slideshow li.show').find('img').attr('title'));
    jQuery('#slideshow-caption p').html(jQuery('ul.slideshow li.show').find('img').attr('alt'));

    //Display the caption
    jQuery('#slideshow-caption').css({opacity: 1.0, bottom:0});

    //Call the gallery function to run the slideshow
    var timer = setInterval('gallery()',speed);

    //pause the slideshow on mouse over
    jQuery('ul.slideshow').hover(
        function () {
            clearInterval(timer);
        },
        function () {
            timer = setInterval('gallery()',speed);
        }
    );
}

function gallery() {
    //if no IMGs have the show class, grab the first image
    var current = (jQuery('ul.slideshow li.show')?  jQuery('ul.slideshow li.show') : jQuery('#ul.slideshow li:first'));

    //trying to avoid speed issue
    if(current.queue('fx').length == 0) {
        //Get next image, if it reached the end of the slideshow, rotate it back to the first image
        var next = ((current.next().length) ? ((current.next().attr('id') == 'slideshow-caption')? jQuery('ul.slideshow li:first') :current.next()) : jQuery('ul.slideshow li:first'));

        //Get next image caption
        var title = next.find('img').attr('title');
        var desc = next.find('img').attr('alt');

        //Set the fade in effect for the next image, show class has higher z-index
        next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);

        //Hide the caption first, and then set and display the caption
        jQuery('#slideshow-caption').slideToggle(300, function () {
            jQuery('#slideshow-caption h3').html(title);
            jQuery('#slideshow-caption p').html(desc);
            jQuery('#slideshow-caption').slideToggle(500);
        });

        //Hide the current image
        current.animate({opacity: 0.0}, 1000).removeClass('show');
    }
}