<?php
function pandora_user_author_panel(){	
	$id = get_the_author_meta('ID');
	$avatar = get_avatar($id, 150);
	$datas = get_userdata($id);
	
	$panel = "
		<div class=\"comment_avatar\">".$avatar."</div>
		<div class=\"user-info\"><p>
		".__( 'Name', 'pandora' ).": ".$datas->display_name."<br />
		".__( 'Webpage', 'pandora' ).": ".$datas->user_url."<br />
		".__( 'Description', 'pandora' ).": ".$datas->user_description."<br /></p></div>
	";
	return $panel;
}
?>