<?php

header('Content-type: text/css');
require dirname( dirname( dirname( dirname( dirname( __FILE__ ))))) . '/wp-config.php';

print '/* global.css */

body {
	' . mframe_css( 'text' ) . '
	text-shadow: ' . mframe_option('color-text-shade') . ' 0px 1px;
	background-color: ' . mframe_option('color-bg') . ';
	' . ( mframe_option('nobgimage') ? '' : 'background-image: url(' . mframe_option('imgdir') . 'bg.png);') . '
}

a, a:link, a:visited, a:active { color: ' . mframe_option('color-link') . '; }
a:hover { color: ' . mframe_option('color-link-hover') . '; }

h1 { ' . mframe_css( 'h1' ) . ' }
h2 { ' . mframe_css( 'h2' ) . ' }
h3 { ' . mframe_css( 'h3' ) . 'margin-bottom: 10px; }
h4 { ' . mframe_css( 'h4' ) . ' }
h5 { ' . mframe_css( 'h5' ) . ' }
h6 { ' . mframe_css( 'h6' ) . ' }

#header h1 { color: ' . mframe_option('color-h1-head') . '; }
#header h1 span { color: ' . mframe_option('color-h1-head-alt') . '; }
#actions h2 { color: ' . mframe_option('color-h2-actions') . '; }
#content .widgetized h3 { color: ' . mframe_option('color-h3-side') . '; }
#popup-wrapper h3 { ' . mframe_css( 'h3-popup' ) . ' }

code, pre { border: 1px dashed ' . mframe_option('pre-border') . '; color: ' . mframe_option('pre-color') . '; background: #e1edf3; }
blockquote { border-left: 5px solid ' . mframe_option('blockquote-border') . '; }








#side {
	float: ' . ( mframe_option('layout') == 'right' ? 'left' : 'right' ) . ';
}

#main {
	float: ' . ( mframe_option('layout') == 'right' ? 'right' : 'left' ) . ';
	width: ' . ( mframe_option('layout') !== 'wide' ? '632px' : '100%' ) . ';
}

#header { background-image: url(' . mframe_option('imgdir') . 'header.png); }
#content { background-image: url(' . mframe_option('imgdir') . 'hline.png); }



#footer {
	background-color: ' . mframe_option('footer-bgcolor') . ';
	' . ( mframe_option('nobgimage') ? '' : 'background-image: url(' . mframe_option('imgdir') . 'footer.png);' ) . '
	text-shadow: ' . mframe_option('footer-text-shadow') . ' 0px 1px;
}
#footer a { color: ' . mframe_option('footer-link-color') . '; }
#footer a:hover { border-bottom: 1px dotted ' . mframe_option('footer-ahover-border') . '; }
#footer h3 { color: ' . mframe_option('footer-h3-color') . '; }
#style0 #nav a.toplevel { text-shadow: #000000 0px 1px; }




/* navigation.css */

#nav { background-image: url(' . mframe_option('imgdir') . 'nav-foot.png); }
#nav .logo { background-image: url(' . mframe_option('imgdir') . 'nav-sep.png); }

#nav .logo a {
	width: ' . mframe_option('logo-image-w') . 'px;
	' . mframe_css( 'logo' ) . '
}

#nav .logo.image a {
	height: ' . mframe_option('logo-image-h') . 'px;
}

#nav .head { background: url(' . mframe_option('imgdir') . 'nav-head.png) no-repeat top; }

#nav .loop {
	background-image: url(' . mframe_option('imgdir') . 'nav-loop.png);
	background-color: ' . mframe_option('nav-bgcolor') . ';
	border-left: 1px solid ' . mframe_option('nav-border') . ';
	border-right: 1px solid ' . mframe_option('nav-border') . ';
}

#nav .fill {
	border-left: 1px solid ' . mframe_option('nav-border-alt') . ';
	border-right: 1px solid ' . mframe_option('nav-border-alt') . ';
}

#nav ul a { color: ' . mframe_option('nav-color') . '; }

#nav ul li li a {
	color: ' . mframe_option('subnav-color') . ';
	background-color: ' . mframe_option('subnav-bgcolor') . ';
	text-shadow: ' . mframe_option('subnav-text-shadow') . ' 0 1px;
}

#nav ul li li a:hover {
	color: ' . mframe_option('nav-active') . ';
	background-color: ' . mframe_option('subnav-hover-bgcolor') . ';
}

#nav .feeds { background-image: url(' . mframe_option('imgdir') . 'icon-feeds.png); }
#nav .login { background-image: url(' . mframe_option('imgdir') . 'icon-login.png); }
#nav .tools { background-image: url(' . mframe_option('imgdir') . 'nav-sep.png); }

#nav ul li:hover, #nav ul li.sfHover, #nav ul a:focus, #nav ul a:hover, #nav ul a:active,
#nav .current_page_parent a.toplevel, #nav .current_page_item a.toplevel { color: ' . mframe_option('nav-active') . '; }
#nav .sf-sub-indicator { background-image: url(' . mframe_option('imgdir') . 'nav-arr.png); }





/* Done */
.entry img {
	max-width: ' . ( mframe_option( 'layout' ) !== 'wide' ? '622px' : '960px' ) . ';
	height: auto;
}

img.thumb.small, img.avatar, .entry img, .comment .text img, #features img.thumb {
	background-color: ' . mframe_option( 'img-back' ) . ';
	border: 1px solid ' . mframe_option( 'img-border-color' ) . ';
}

img.thumb.small:hover, img.avatar:hover, .entry img:hover, .comment .text img:hover, #features img.thumb:hover {
	background-color: ' . mframe_option( 'img-back-over' ) . ';
}

#footer img.thumb.small, #footer img.avatar {
	background-color: ' . mframe_option( 'footer-img-back' ) . ';
	border: 1px solid ' . mframe_option( 'footer-img-border' ) . ';
}

#footer img.thumb.small:hover, #footer img.avatar:hover {
	background-color: ' . mframe_option( 'footer-img-back-over' ) . ';
}
/* Done */


/* Recent & Pupular Posts */
.widget_posts .date { background-image: url(' . mframe_option('imgdir') . 'icon-clock.png); }
.widget_posts .comments { background-image: url(' . mframe_option('imgdir') . 'icon-comment.png); }


/* Recent Comments */
.widget_comments .date { background-image: url(' . mframe_option('imgdir') . 'icon-clock.png); }
.widget_comments .author { background-image: url(' . mframe_option('imgdir') . 'icon-comment.png); }













/* Follow Us */
.widget_follow a { background-color: ' . mframe_option('img-back') . '; border: 1px solid ' . mframe_option('img-border-color') . '; }
.widget_follow a:hover { background-color: ' . mframe_option('img-back-over') . '; }

#footer .widget_follow a { background-color: ' . mframe_option('footer-img-back') . '; border: 1px solid ' . mframe_option('footer-img-border') . '; }
#footer .widget_follow a:hover { background-color: ' . mframe_option('footer-img-back-over') . '; border: 1px solid ' . mframe_option('footer-img-border') . '; }











#content .widgetized ul {
	border-top: 1px solid ' . mframe_option('side-link-hline') . ';
	border-bottom: 1px solid ' . mframe_option('hline-sub') . ';
}

#footer .widgetized ul {
	border-top: 1px solid ' . mframe_option('footer-hline') . ';
	border-bottom: 1px solid ' . mframe_option('footer-hline-sub') . ';
}

#content .widgetized ul li {
	border-bottom: 1px solid ' . mframe_option('side-link-hline') . ';
	border-top: 1px solid ' . mframe_option('hline-sub') . ';
	background-image: url(' . mframe_option('imgdir') . 'side-li.png);
}

#footer .widgetized ul li {
	border-bottom: 1px solid ' . mframe_option('footer-hline') . ';
	border-top: 1px solid ' . mframe_option('footer-hline-sub') . ';
	background-image: url(' . mframe_option('imgdir') . 'side-li.png);
}

#content .widgetized ul li.current-cat,
#content .widgetized ul li.current_page_item {
	background-color: ' . mframe_option('cat-active-bg') . ';
	background-image: url(' . mframe_option('imgdir') . 'side-li-active.png);
}

#content .widgetized li.current-cat a,
#content .widgetized li.current_page_item a { color: ' . mframe_option('cat-active-hover') . '; }






/* Post */

.desc { color: ' . mframe_option('cat-desc-color') . '; }
.post { border-top: 1px solid ' . mframe_option('hline') . '; }
.post .title { border-top: 1px solid ' . mframe_option('hline-sub') . '; border-bottom: 1px solid ' . mframe_option('hline') . '; }
.post .date { border-left: 1px solid ' . mframe_option('post-date-border') . '; }
.post .day { color: ' . mframe_option('post-day-color') . '; }
.post .month { color: ' . mframe_option('post-month-color') . '; }
.post .entry { border-top: 1px solid ' . mframe_option('hline-sub') . '; }
.post .entry ul li { background-image: url(' . mframe_option('imgdir') . 'bullet.png); }


/* Post Toolbar */

.toolbar-shadow { background-image: url(' . mframe_option('imgdir') . 'toolbar-shadow.png); }
.toolbar { background-color: ' . mframe_option('toolbar-bgcolor') . '; background-image: url(' . mframe_option('imgdir') . 'toolbar.png); border: 1px solid ' . mframe_option('toolbar-border') . '; }
.toolbar .link-comments { background-image: url(' . mframe_option('imgdir') . 'icon-comments.png); border-right: 1px dotted ' . mframe_option('toolbar-separator') . '; }

.toolbar .link-more { border-left: 1px dotted ' . mframe_option('toolbar-separator') . '; }

/* Pagination */
.pages a { background-image: url(' . mframe_option('imgdir') . 'page-buttonbg.png); border: 1px solid ' . mframe_option('page-link-border') . '; }
.pages a:hover { background: ' . mframe_option('page-link-hover-back') . '; }

/* Comments */

#comments .commentlist { border-top: 1px solid ' . mframe_option('hline-sub') . '; }
#comments .comment { background: ' . mframe_option('comment-back') . '; border: 1px solid ' . mframe_option('comment-border') . '; }
#comments .comment.odd { background: ' . mframe_option('comment-back-odd') . '; }

#comments .heading { border-bottom: 1px solid ' . mframe_option('hline') . '; }

.comment .text { border-top: 1px solid ' . mframe_option('comment-border') . '; }
.comment .text ul li { background-image: url(' . mframe_option('imgdir') . 'bullet.png); }

.comment-reply-link { border-left: 1px dotted ' . mframe_option('toolbar-separator') . '; }

/* Comment Form */
#respond h3 { border-bottom: 1px solid ' . mframe_option('hline') . '; }
#respond form { border-top: 1px solid ' . mframe_option('hline-sub') . '; }









/* Done */
/* Misc */

#popup-wrapper {
	border: 1px solid ' . mframe_option( 'popup-border' ) . ';
	background: ' . mframe_option( 'popup-bg' ) . ' url(' . mframe_option( 'imgdir' ) . 'loginbg.png) no-repeat center top;
}

#popup-wrapper p { color: ' . mframe_option( 'color-text' ) . '; }
/* Done */





.adbox.ad-posts { text-align: ' . mframe_option('adbox-posts-align') . '; }













/* Table Styles */

#content .widget_text th,
#content .widget_calendar th,
.entry th, .comment th, .comment td.label { color: ' . mframe_option('post-table-head-color') . '; border: 1px solid ' . mframe_option('post-table-border') . '; background-image: url(' . mframe_option('imgdir') . 'bg-table-head.png); }

#content .widget_text td,
#content .widget_calendar td,
.entry td, .comment td { border: 1px solid ' . mframe_option('post-table-border') . '; background-color: ' . mframe_option('post-table-bgcolor') . '; color: ' . mframe_option('post-table-text-color') . '; }

#content .widget_text td.alt,
#content .widget_calendar td#today,
#content .widget_calendar tfoot td,
.entry td.alt { background: #eff5f8; }



















textarea { background-image: url(' . mframe_option('imgdir') . 'textarea.png); }
#content .one textarea { background-image: url(' . mframe_option('imgdir') . 'textarea-small.png); }
#footer .one textarea { background-image: url(' . mframe_option('imgdir') . 'textarea-small-alt.png); }
#respond textarea { background-image: url(' . mframe_option('imgdir') . 'textarea-large.png); }
.comment #respond textarea { background-image: url(' . mframe_option('imgdir') . 'textarea.png); }
.page-template-template-contact-php #content .entry .one textarea { background-image: url(' . mframe_option('imgdir') . 'textarea.png); }

input[type="text"], input[type="password"] { background-image: url(' . mframe_option('imgdir') . 'input-text.png); }
#footer input[type="text"], #footer input[type="password"] { background-image: url(' . mframe_option('imgdir') . 'input-text-alt.png); }
form.wide input[type="text"], form.wide input[type="password"] { background-image: url(' . mframe_option('imgdir') . 'input-text-wide.png); }
#footer form.wide input[type="text"], #footer form.wide input[type="password"] { background-image: url(' . mframe_option('imgdir') . 'input-text-wide-alt.png); }
#popup-wrapper input[type="text"], #popup-wrapper input[type="password"] { background-image: url(' . mframe_option('imgdir') . 'input-text.png); }

input[type="submit"] { background-image: url(' . mframe_option('imgdir') . 'input-submit.png); }
#footer input[type="submit"] { background-image: url(' . mframe_option('imgdir') . 'input-submit-alt.png); }
#footer .registerform input[type="submit"], .registerform input[type="submit"] { background-image: url(' . mframe_option('imgdir') . 'input-submit-register.png); }
'; ?>