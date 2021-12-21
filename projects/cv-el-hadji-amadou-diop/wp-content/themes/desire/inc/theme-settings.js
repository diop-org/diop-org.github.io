/* THEME SETTINGS JAVASCRIPT */
jQuery(document).ready(function() {

    //Loading current tab using cookie
    if(getCookie("currtab") != "" && getCookie("currtab") != null) {
        jQuery('.settings-tab').removeClass('current-tab');
        var currtab = getCookie("currtab");
        jQuery('#' + currtab).addClass('current-tab');
        var currsection = currtab.replace('settings-tab','settings');
        jQuery('.settings-section').hide();
        jQuery('#' + currsection).show();
    }

    //Animating tabs
    jQuery(".settings-tab").click(function() {
        var currentId = jQuery(".current-tab").attr("id");
        var clickedId = jQuery(this).attr("id");
        var clickedSection = clickedId.replace("settings-tab","settings");
        if(clickedId != currentId) {
            jQuery("#" + currentId).removeClass("current-tab");
            jQuery("#" + clickedId).addClass("current-tab");
            jQuery(".settings-section").hide();
            jQuery("#" + clickedSection).show();
        }
    });

    //Upload image script
    var formfieldID;
    jQuery('.upload_img').click(function() {
	var btnId = jQuery(this).attr("id");
	formfieldID = btnId.replace("-button","");
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	return false;
    });
    window.send_to_editor = function(html) {
	imgurl = jQuery('img',html).attr('src');
	jQuery('#' + formfieldID).val(imgurl);
	jQuery('#' + formfieldID + '-error').html("");
        tb_remove();
    }

    //Validations
    jQuery('.img_field').blur(function() {
	var errorId = jQuery(this).attr("id") + '-error';
	var value = jQuery(this).val();
	var pattern = new RegExp("http:\\/\\/\\S+\\.[jJ][pP][eE]?[gG]");
	if(jQuery.trim(value) != "" && !pattern.test(value)) {
	    jQuery('#' + errorId).html("Invalid image url");
            jQuery('#' + errorId).fadeIn(700);
	} else {
            jQuery('#' + errorId).fadeOut(700);
	    jQuery('#' + errorId).html("");
	}
    });

    jQuery('.number_field').blur(function() {
	var errorId = jQuery(this).attr("id") + '-error';
	var value = jQuery(this).val();
	if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
            jQuery('#' + errorId).fadeOut(700);
	    jQuery('#' + errorId).html("");
	} else {
	    jQuery('#' + errorId).html("Please enter an integer number");
            jQuery('#' + errorId).fadeIn(700);
	}
    });

    //Setting background color based on color scheme
    jQuery('.settings-radio').click(function() {
	var value = jQuery(this).val();
	if(value == 'dark' && (jQuery('#bgcolorfield').val() == 'DDDDDD' || jQuery('#bgcolorfield').val() == 'dddddd')) {
	    jQuery('#bgcolorfield').val('111111');
	    jQuery('#bgcolorfield').css({"backgroundColor": "#111111", "color": "#ffffff"});
	} else if(value == 'light' && jQuery('#bgcolorfield').val() == '111111') {
	    jQuery('#bgcolorfield').val('DDDDDD');
	    jQuery('#bgcolorfield').css({"backgroundColor": "#dddddd", "color": "#000000"});
	}
    });

    //Setting cookie to remember last tab
    jQuery('#submit').click(function() {
        var currentTabId = jQuery('.current-tab').attr("id");
        setCookie("currtab",currentTabId,3);
    });

});

function confirmAction() {
    var confirmation = confirm("Do you want to delete your settings and restore to default settings ?");
    return confirmation;
}

function setCookie(name,value,secs) {
    if (secs) {
	var date = new Date();
	date.setTime(date.getTime()+(secs*1000));
	var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}