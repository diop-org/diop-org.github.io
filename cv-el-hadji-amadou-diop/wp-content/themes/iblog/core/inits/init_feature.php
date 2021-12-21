<?php

// ===============================
// = Hook JS Libraries to Footer =
// ===============================
add_action('wp_footer', 'feature_js');
function feature_js(){
	wp_register_script('cycle', CORE_JS.'/jquery.cycle.all.min.js', 'jquery', '1.0', true);
	wp_print_scripts('cycle');
}

// ==================================================================================================
// = Hoop the scripts controlling the feature to the wp_head, so they run after jquery is included =
// ==================================================================================================
add_action('wp_head', 'feature_script');

function feature_script(){?>
<script type="text/javascript">
/* <![CDATA[ */
	var $j = jQuery.noConflict();
	$j(document).ready(function () {
		<?php 
			global $post;
			
			$features = pagelines('features'); 
			
			if(isset($feature['page'])) echo 'hello';
			
			foreach($features as $key => $feature){
				
				$features[$key]['page'] 	= ( isset($feature['page']) ) ? $feature['page'] : ''; 
				$features[$key]['draft'] 	= ( isset($feature['draft']) ) ? $feature['draft'] : ''; 
				$features[$key]['name'] 	= ( isset($feature['name']) ) ? $feature['name'] : ''; 
				$features[$key]['thumb'] 	= ( isset($feature['thumb']) ) ? $feature['thumb'] : '';
			}
		?>
	//Feature Cycle Setup	
			$j('#cycle').cycle({ 
			    fx: '<?php if(pagelines('feffect')):?><?php echo pagelines('feffect');?><?php else:?>fade<?php endif;?>',
				sync: <?php if(pagelines('fremovesync')):?>0<?php else:?>1<?php endif;?>,
				timeout: <?php if(pagelines('timeout')):?><?php echo pagelines('timeout');?><?php else:?>0<?php endif;?>,
			    speed:  <?php if(pagelines('fspeed')):?><?php echo pagelines('fspeed');?><?php else:?>1500<?php endif;?>, 
				pager:  '#featurenav',
				cleartype:  true,
    			cleartypeNoBg:  true
			 });
			
		<?php if(pagelines('feature_nav_type') == 'names'):?>	
		//Overide page numbers on cycle feature with custom text
			$j("div#featurenav").children("a").each(function() {
				<?php $count = 1;?>
				<?php foreach($features as $key => $feature):?>
				<?php if(showfeature($feature['page'], $post->ID, $feature['draft'])):?>
					if($j(this).html() == "<?php echo $count;?>") { $j(this).html("<?php echo $feature['name'];?>");}
					<?php $count += 1;?>
				<?php endif;?>
				<?php endforeach;?>
			});
		<?php endif;?>
		
		<?php if(pagelines('feature_nav_type') == 'thumbs'):?>	
		//Overide page numbers on cycle feature with custom text
			$j("div#featurenav").children("a").each(function() {
				<?php $count = 1;?>
				<?php foreach($features as $key => $feature):?>
				<?php if(showfeature($feature['page'], $post->ID, $feature['draft'])):?>
					if($j(this).html() == "<?php echo $count;?>") {$j(this).html('<span class="nav_thumb" style="background: transparent url(<?php echo $feature["thumb"];?>) no-repeat 0 0;"><span class="nav_overlay">&nbsp;</span></span>');}
					<?php $count += 1;?>
				<?php endif;?>
				<?php endforeach;?>
			});
		<?php endif;?>
		
		<?php if(pagelines('feature_playpause')):?>	
		// Play Pause
			$j('.playpause').click(function() { 
				if ($j(this).hasClass('pause')) {
					$j('#cycle').cycle('pause');
				 	$j(this).removeClass('pause').addClass('resume');
				} else {
				   	$j(this).removeClass('resume').addClass('pause');
				    $j('#cycle').cycle('resume'); 	
				}
		    
			});
		<?php endif;?>
		
	});
/* ]]> */
</script>
<?php }