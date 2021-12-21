<?php
/**
 * Template Name: Portfolio Fullsize Background Video
 * 
 * @package WordPress
 * @subpackage Invictus
 */
global $meta;

//Get the page meta informations and store them in an array
$meta = max_get_cutom_meta_array();

$isFullsizeGallery = true;
$showSuperbgimage = true;

get_header(); ?>

<?php 
// get the password protected login template part
if ( post_password_required() ) {
	get_template_part( 'includes/page', 'password.inc' );
} 
?>

<?php if ( !post_password_required() ) { ?>	
	<?php $show_fullsize_title = $meta[MAX_SHORTNAME . '_show_page_fullsize_title']; ?>

		<div id="fullsizeVideoHolder" style="height: 100%; left: 0; margin: 0; position: fixed; top: 0; width: 100%;">
			<div id="fullsizeVideo" class="fullsize-video-<?php the_ID(); ?>">&nbsp;</div>
		</div>

		<?php
		
		// get fullsize gallery sidebar if it is a fullsize gallery template				
		if ( is_active_sidebar('sidebar-fullsize-video') ) {
		?>
		<div id="sidebar" class="fullsize-sidebar">
		<?php
			dynamic_sidebar('sidebar-fullsize-video');
		?>
		</div>
		<?php } ?>


		<div id="primary" class="template-fullsize-video">

			<div id="content" role="main">		
			<header <?php post_class('entry-header'); ?> id="post-<?php the_ID(); ?>" >
			
			
				<?php if($show_fullsize_title == true){ ?>
				<h1 class="page-title"><?php the_title() ?></h1>
				<?php } ?>
				<?php 
				// check if there is a excerpt
				if( max_get_the_excerpt() && $show_fullsize_title == true ){ 
				?>
				<h2 class="page-description"><?php max_get_the_excerpt(true) ?></h2>
				<?php } ?>
					
			</header>		
			</div>

			<div id="showtitle" class="clearfix"> 
				 <div class="title"><a href="#"><span class="imagetitle"><?php the_title() ?></span></a></div>
			</div>			
			
		</div>
				
			<script type="text/javascript">	

				jQuery(document).ready(function() {

					var dataString = 'postID=<?php echo $post->ID ?>&type=<?php echo str_replace(" ", "_", strtolower($meta[MAX_SHORTNAME.'_page_item_type_value'])) ?>&playerID=fullsizeVideo';
					
					var xhr = jQuery.ajax({
						type: "POST",
						url: "<?php echo get_template_directory_uri(); ?>/includes/post-video.ajax.php",
						data: dataString,
						success: function(data) {
							jQuery('#fullsizeVideo').html(data);						
						}
					});					
					
					$('body').addClass('fullsize-gallery');
					 
				});
				 
			</script> 
<?php } ?>
<?php get_footer(); ?>