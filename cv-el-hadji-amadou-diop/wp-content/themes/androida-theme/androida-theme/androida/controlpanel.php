<?php
function andro_options(){
$themename = "Androida";
$shortname = "andro";
$zm_categories_obj = get_categories('hide_empty=1&');
$zm_categories = array();
foreach ($zm_categories_obj as $zm_cat) {
$zm_categories[$zm_cat->cat_ID] = $zm_cat->category_nicename;
}
$categories_tmp = array_unshift($zm_categories, "Select a category:");	
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20" );
$layouts = array("Select a layout","business","blog" );
$options = array (

   
			
	array(  "name" => "Front Page Setup",
            "type" => "heading",
			"desc" => "Select a layout between, business template and blog layout for your front page.",
       ),
		
		array( 	"name" => "Front page Layout",
			"desc" => "Select a layout for front page.",
			"id" => $shortname."_layout",
			"std" => "",
			"type" => "select",
			"options" => $layouts ),		

    array(  "name" => "Sliding Panel Settings",
            "type" => "heading",
			"desc" => "This section customizes the sliding panel area .",
       ),

	array( 	"name" => "Sliding Panel category",
			"desc" => "Select the category that you would like to have displayed on the sliding.",
			"id" => $shortname."_gldcat",
			"std" => "uncategorized",
			"type" => "select",
			"options" => $zm_categories),
			
	 array(  "name" => "Three Featured posts",
            "type" => "heading",
			"desc" => "This section customizes the three featured posts located below the slider.",
       ),

	array( 	"name" => "Featured Category-1",
			"desc" => "Select the category of the first featured post.",
			"id" => $shortname."_mini_category1",
			"std" => "uncategorized",
			"type" => "select",
			"options" => $zm_categories),
			
	array( 	"name" => "Featured Category-2",
			"desc" => "Select the category of the second featured post.",
			"id" => $shortname."_mini_category2",
			"std" => "uncategorized",
			"type" => "select",
			"options" => $zm_categories),

array( 	"name" => "Featured Category-3",
			"desc" => "Select the category of the third featured post.",
			"id" => $shortname."_mini_category3",
			"std" => "uncategorized",
			"type" => "select",
			"options" => $zm_categories),

			
			
	array(  "name" => "Featured Video",
            "type" => "heading",
			"desc" => " Displays a video embedded on your sidebar .",
       ),
	   
	array("name" => "Video embed code",
			"desc" => "You can find the embed code for videos on all video sharing sites.",
            "id" => $shortname."_video",
            "std" => "Enter the video embed code here. Remember to change the size to 310 x 250 in the embed code. ",
            "type" => "textarea"),   
   
	
	   
	array(  "name" => "125 x 125 banner Settings",
            "type" => "heading",
			"desc" => "You can setup four 125x125 banners on your sidebar from here",
       ), 
	   
	array("name" => "Banner-1 Image",
			"desc" => "Enter your 125x125 banner image url here.",
            "id" => $shortname."_banner1",
            "std" => "http://web2feel.com/gamezine/wp-content/uploads/tf.jpg",
            "type" => "text"),    
	   
	array("name" => "Banner-1 Url",
			"desc" => "Enter the banner-1 url here.",
            "id" => $shortname."_url1",
            "std" => "Target link",
            "type" => "text"),    
	      
	 
	array("name" => "Banner-2 Image",
			"desc" => "Enter your 125x125 banner image url here.",
            "id" => $shortname."_banner2",
            "std" => "http://web2feel.com/gamezine/wp-content/uploads/aj.jpg",
            "type" => "text"),    
	   
	array("name" => "Banner-2 Url",
			"desc" => "Enter the banner-2 url here.",
            "id" => $shortname."_url2",
            "std" => "Target link",
            "type" => "text"), 

	array("name" => "Banner-3 Image",
			"desc" => "Enter your 125x125 banner image url here.",
            "id" => $shortname."_banner3",
            "std" => "http://web2feel.com/gamezine/wp-content/uploads/aj.jpg",
            "type" => "text"),    
	   
	array("name" => "Banner-3 Url",
			"desc" => "Enter the banner-3 url here.",
            "id" => $shortname."_url3",
            "std" => "Target link",
            "type" => "text"),

		array("name" => "Banner-4 Image",
			"desc" => "Enter your 125x125 banner image url here.",
            "id" => $shortname."_banner4",
            "std" => "http://web2feel.com/gamezine/wp-content/uploads/tf.jpg",
            "type" => "text"),    
	   
	array("name" => "Banner-4 Url",
			"desc" => "Enter the banner-4 url here.",
            "id" => $shortname."_url4",
            "std" => "Target link",
            "type" => "text"),
		
		
	array(  "name" => "About Us",
            "type" => "heading",
			"desc" => " Setup your about us section.",
       ),
	   
	array("name" => "My image",
			"desc" => "Enter the url of the image you want to display in the about section",
            "id" => $shortname."_img",
            "std" => "http://img386.imageshack.us/img386/7153/aboutzm7.jpg",
            "type" => "text"),   
			
	array("name" => "About Me text",
			"desc" => "Enter some description text about you",
            "id" => $shortname."_about",
            "std" => "Hi, welcome to my website.<br/> I will post some more information about us here soon.",
            "type" => "textarea"),   		
			
			
	array(  "name" => "Feedburner email subscription",
            "type" => "heading",
			"desc" => " Setup you feed burner subscription form .",
       ),
	   
	array("name" => "Feedburner id",
			"desc" => "Enter your  feedburner id here. You can locate the id in the email subscription widget code from feedburner.com",
            "id" => $shortname."_feed",
            "std" => "",
            "type" => "text"),   
			
	
			
			
   
);
update_option('andro_template',$options);update_option('andro_themename',$themename);update_option('andro_shortname',$shortname);  
		  
	}
add_action('init','andro_options'); 	

function mytheme_add_admin() {

    $options =  get_option('andro_template'); $themename =  get_option('andro_themename');$shortname =  get_option('andro_shortname');   

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=controlpanel.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=controlpanel.php&reset=true");
            die;

        }
    }

      add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

	$options =  get_option('andro_template');$themename =  get_option('andro_themename');$shortname =  get_option('andro_shortname'); 
	
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
    
?>
<div class="wrap">
<h2><b><?php echo $themename; ?> theme options</b></h2>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) { 
    
	
if ($value['type'] == "text") { ?>
        
<tr align="left"> 
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
				
    </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small> <hr /></td></tr>

<?php } elseif ($value['type'] == "textarea") { ?>
<tr align="left"> 
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
                   <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="50" rows="8"/>
				   <?php if ( get_settings( $value['id'] ) != "") { echo stripslashes (get_settings( $value['id'] )); } 
				   else { echo $value['std']; 
				   } ?>
</textarea>

				
    </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small> <hr /></td></tr>


<?php } elseif ($value['type'] == "select") { ?>

    <tr align="left"> 
        <th scope="top"><?php echo $value['name']; ?>:</th>
	        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; }?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
			
        </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small> <hr /></td></tr>



<?php } elseif ($value['type'] == "heading") { ?>

   <tr valign="top"> 
		    <td colspan="2" style="text-align: left;"><h2 style="color:green;"><?php echo $value['name']; ?></h2></td>
		</tr>
<tr><td colspan=2> <small> <p style="color:red; margin:0 0;" > <?php echo $value['desc']; ?> </P> </small> <hr /></td></tr>

<?php } ?>
<?php 
}
?>
</table>
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<h2>Preview (updated when options are saved)</h2>
<iframe src="../?preview=true" width="100%" height="600" ></iframe>
<p> For more <a href="http://web2feel.com" >wordpress themes </a>and support, contact the <a href="http://web2feel.com/forum/" > support forums </a> </p>
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>
