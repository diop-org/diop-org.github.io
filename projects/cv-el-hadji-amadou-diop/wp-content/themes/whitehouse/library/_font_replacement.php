<?php if(pagelines('fontreplacement')):?>
<!-- Font Replacement -->
	<script type="text/javascript" src="<?php echo CORE_JS.'/cufon-yui.js';?>" ></script>	
	<?php if(pagelines('font_file')):?>
		<script type="text/javascript" src="<?php echo pagelines('font_file'); ?>" ></script>
	<?php else:?>
		<!-- A font by Jos Buivenga (exljbris) -> www.exljbris.nl -->
		<script type="text/javascript" src="<?php echo THEME_JS.'/Carto.font.js';?>" ></script>
	<?php endif;?>
	<script type="text/javascript">
	/* <![CDATA[ */
		<?php if(pagelines('replace_font')): ?>
			Cufon.replace('<?php echo pagelines("replace_font"); ?>', {hover: true});
		<?php endif;?>
	/* ]]> */
	</script>	
<?php endif;?>