<?php
/**
 * The template for displaying the footer.
 */
?>


 <?php $options = get_option('smartone'); if ($options['smt_pos_sidebar'] == "disable") { ?>

<?php } else { get_sidebar(); 

 } ?>


	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php

	get_sidebar( 'footer' );
?>


<?php

	wp_footer();
?>



		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->


<?php if ( current_user_can('level_1') ) { ?>

<script type='text/javascript'>
  $("div.post").mouseover(function() {
    $(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
    $("div.type-page").mouseover(function() {
    $(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
      $("div.type-attachment").mouseover(function() {
    $(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
  $("li.comment").mouseover(function() {
    $(this).find(".comment-edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $(this).find(".comment-edit-link").css('visibility', 'hidden');
  });
</script>

<?php } ?>

</body>
</html>
