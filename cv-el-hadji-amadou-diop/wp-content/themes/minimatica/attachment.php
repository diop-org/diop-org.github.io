<?php
/**
 * Template to display post attachments
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>
<?php get_template_part( 'loop', 'attachment' ); ?>
<?php get_footer(); ?>