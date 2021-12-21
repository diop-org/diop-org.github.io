#########################
INSTALLATION:
#########################


1. Upload the "diabolique-spring" folder to "wp-content/themes/"
2. Activate the theme within your WordPress admin panel.

#########################
CHANGE HORIZONTAL BACKGROUND:
#########################

Open a style.css file, find background-image:url("img/bg.png"); and change it for bg2, bg3, bg4

#########################
CHANGE HEADLINE	 BACKGROUND:
#########################

Open a style.css file, find background-image:url("img/bg-top.png"); inside the #container block and change it for bg-top2, bg-top3


#########################
PUT ADS:
#########################

There are 2 places for put the ads:


1. Wide banner under menu - in head.php between:

<div id="ad1">
</div><!--ad1 ends-->



2. Square Banner - in single.php, before:

<?php comments_template(); ?>


#########################
CHANGE AMOUNT OF RECENT POST IN FOOTER
#########################

1. Open a "wp-content/themes/diabolique-spring/footer.php" file.
2. Find and replace <ul><?php get_archives('postbypost', 15); ?></ul>


#########################
AVATAR:
#########################

If you want to change an avatar, you have to upload a new image to "wp-content/themes/diabolique-spring/img/photo.png"
You can change an avatar image size opening "wp-content/themes/diabolique-spring/info.php" and "wp-content/themes/diabolique-spring/info2.php"  files and modifying:
<img src="<?php bloginfo('template_url'); ?>/img/photo.png" alt="Photo" width="85" height="80" />






MORE HELP INFORMATIONS YOU CAN FIND HERE:
http://www.diaboliquedesign.com/diaboliquespring/