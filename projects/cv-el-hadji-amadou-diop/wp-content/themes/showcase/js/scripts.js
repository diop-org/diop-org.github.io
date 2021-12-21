$(document).ready(function () {
 	/**
 	* Homepage slider
 	*/
 	var screens = $("#computer .screen"),
    	sc_flipScreen = function (index) {
        	$(screens).fadeOut();
        	$(screens[index]).fadeIn();
      	},
      	sc_parseTwitterDate = function (text) {
        	var newtext = text.replace(/(\+\S+) (.*)/, '$2 $1'),
        	date = new Date(Date.parse(newtext)).toJSON();
        	date = date.substring(0, date.length - 5);
        	date = date + "Z";
        	return date; 
      	};
    $(screens[0]).fadeIn();
    // initialize scrollable
    $(".scrollable").scrollable({
    	circular: true,
      	onSeek: function (event, index) {
        sc_flipScreen(index);
    }
    }).navigator({
    	navi: '#mantle-dots',
     	naviItem: 'li'
    });
	
	/**
 	* Twitter Widget
 	*/
	if(twitter_username)	{
		if ($("#sc-tweets")[0]) {
		  $("#sc-tweets").hide();
		  $.getJSON('http://twitter.com/statuses/user_timeline/' + twitter_username + '.json?count=3&callback=?', function (data) {
		  	$.each(data, function (i, item) {
				var date;
			  	if (typeof prettyDate(sc_parseTwitterDate(item.created_at)) === 'undefined') {
					date = item.created_at;
			  	} else {
					date = prettyDate(sc_parseTwitterDate(item.created_at));
			  	}
			  $("#sc-tweets").append('<article><div class="tweet"><div class="body"><a href="http://twitter.com/' + item.user.screen_name + '/status/' + item.id_str + '">'
				+ item.text
				+ '</a>'
				+ '</div><div class="footer">'
				+ date
				// + 2011-02-17T15:23:41Z
				+ '</div></div></article>');
			});
			$("#sc-tweets").slideDown();
		  });
	   };
	};
});
// woo closure
// z.g.s. 2011 a.d.