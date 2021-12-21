<?php
/**
 * Template Name: Portfolio Flickr Fullsize Gallery
 * 
 * @package WordPress
 * @subpackage Invictus
 */

if ( !post_password_required() ) {
	wp_register_script('flickr-fullsize', get_template_directory_uri() .'/js/supersized.flickr.js', 'jquery');
	wp_enqueue_script('flickr-fullsize');
	wp_enqueue_style('supersized-css', get_template_directory_uri().'/css/supersized.css', false, false);
}
//Get the page meta informations and store them in an array
$meta = max_get_cutom_meta_array();

$isFullsizeFlickr = true;

get_header(); ?>

<?php 
// get the password protected login template part
if ( post_password_required() ) {
	get_template_part( 'includes/page', 'password.inc' );
}
?>

<?php if ( !post_password_required() ) { ?>
<?php
	// get fullsize gallery sidebar if it is a fullsize gallery template				
	if ( is_active_sidebar('sidebar-fullsize-flickr') ) {
	?>
	<div id="sidebar" class="fullsize-sidebar">
	<?php
		dynamic_sidebar('sidebar-fullsize-flickr');
	?>
	</div>
<?php } ?>

<?php
// Check if to show fullsize Background overlay on homepage
if ( get_option_max( 'flickr_scanlines' ) == 'true' ) { 
?>
<div id="scanlines" class="overlay-<?php get_option_max( 'fullsize_overlay_pattern' , true ) ?>"></div>	
<?php } ?>


<!--Control Bar--> 
<div id="controls-wrapper"> 

	<?php if ( get_option_max('flickr_thumbnail_navigation') == 'true' ){ ?>
	<div id="prevthumb" class="tooltip" title="<?php _e('Show previous Image', MAX_SHORTNAME) ?>"></div>
	<div id="nextthumb" class="tooltip" title="<?php _e('Show next Image', MAX_SHORTNAME) ?>"></div>
	<?php } ?>
	
	<div id="flickrThumbs">
	
	</div>

	<div id="controls" <?php if ( get_option_max('flickr_thumbnail_navigation') == 'true' ){ ?>class="has_thumbs"<?php }?>> 
	
		<?php if( get_option_max('flickr_slide_captions') == "true" || get_option_max('flickr_slide_counter') == "true" ){ ?>
		<!--Slide counter-->
		<div id="slidecounter"> 
			<span class="slidenumber"></span>
			/
			<span class="totalslides"></span>
		</div>			
		<!--Slide captions displayed here--> 
		<div id="slidecaption"></div> 
		<?php } ?>
		
		<?php if ( get_option_max('flickr_navigation') == 'true' ) { ?>
		<!--Navigation--> 
		<div id="controls-nav">
			<div class="clearfix">
				<a href="#prev" id="prevslide" class="fullsize-link fullsize-prev" title="Prev Image">Prev</a>
				<a href="#start" id="pauseplay" class="fullsize-control fullsize-stop" title="Stop Slideshow">Stop Slideshow</a>
				<a href="#next" id="nextslide" class="fullsize-link fullsize-next" title="Next Image">Next</a>
			</div>
		</div> 
		<?php } ?>
	
	</div> 
</div> 

<script type="text/javascript">

	jQuery(function($){
			
		jQuery.supersized({
			
				//Functionality
				autoplay				:	<?php $autoplay = get_option_max('flickr_autoplay') == 'true' ? '1' : '0'; echo $autoplay; ?>, //Slideshow starts playing automatically
				random					:	<?php $random = $meta['max_fullsize_flickr_sorting'] == 'true' ? '1' : '0'; echo $random; ?>,
				slide_interval		    :   <?php get_option_max('flickr_slideshow_interval', true) ?>,	//Length between transitions
				transition              :   <?php get_option_max('flickr_transition', true) ?>, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left
				transition_speed		:	<?php get_option_max('flickr_transition_speed', true) ?>,	//Speed of transition
				
				//Size & Position
				fit_always				:	<?php $fit_always = get_option_max('flickr_always_fit') == 'true' ? '1' : '0'; echo $fit_always; ?>, //Image will never exceed browser width or height (Ignores min. dimensions)
				
				//Components
				navigation              :   <?php $s_nav = get_option_max('flickr_navigation') == 'true' ? '1' : '0'; echo $s_nav; ?>,	//Slideshow controls on/off
				thumbnail_navigation    :   <?php $s_thumbs = get_option_max('flickr_thumbnail_navigation') == 'true' ? '1' : '0'; echo $s_thumbs; ?>, //Thumbnail navigation
				slide_counter           :   <?php $s_counter = get_option_max('flickr_slide_counter') == 'true' ? '1' : '0'; echo $s_counter; ?>, //Display slide numbers
				slide_captions          :   <?php $s_captions = get_option_max('flickr_slide_captions') == 'true' ? '1' : '0'; echo $s_captions; ?>, //Slide caption (Pull from "title" in slides array)
				
				//Flickr
				source					:	<?php echo $meta['max_fullsize_flickr_source']; ?>,	//1-Set, 2-User, 3-Group
				<?php if( $meta['max_fullsize_flickr_source'] == 1 ){ ?>
				set						:	'<?php echo $meta['max_fullsize_flickr_set']; ?>', //Flickr set ID (found in URL)
				<?php } ?>
				<?php if( $meta['max_fullsize_flickr_source'] == 2 ){ ?> 
				user					:	'<?php echo $meta['max_fullsize_flickr_user']; ?>', //Flickr user ID (http://idgettr.com/)
				<?php } ?>
				<?php if( $meta['max_fullsize_flickr_source'] == 3 ){ ?>
				group					:	'<?php echo $meta['max_fullsize_flickr_group']; ?>', //Flickr group ID (http://idgettr.com/)
				<?php } ?>
				total_slides			:	<?php echo $meta['max_fullsize_flickr_total_slides']; ?>, //How many pictures to pull (Between 1-500)
				image_size              :   '<?php echo $meta['max_fullsize_flickr_image_size']; ?>', //Flickr Image Size - t,s,m,z,b  (Details: http://www.flickr.com/services/api/misc.urls.html)

				slides 					: 	[{}],	//Initiate slides array

				/**
	    		FLICKR API KEY
	    		NEED TO GET YOUR OWN -- http://www.flickr.com/services/apps/create/
	    		**/
				api_key					:	'<?php get_option_max('flickr_api_key', true) ?>' //Flickr API Key
					
			}); 					
			
			// place the prev and next thumb bottom to the colophons height
			jQuery('#controls-wrapper').css({ bottom: jQuery('#colophon').outerHeight() });
			
			$('body').addClass('fullsize-gallery fullsize-gallery-flickr');	
		});
		
	</script>	
<?php } ?>
<?php get_footer(); ?>