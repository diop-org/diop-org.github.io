<?php 
/**
* Footer template used by Neuro.
*
* Authors: Tyler Cunningham, Trent Lapinski
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Neuro.
* @since 2.0
*/

	global $options, $themeslug // call globals

?>
	
<?php if ($options->get($themeslug.'_disable_footer') != "0"):?>	

</div><!--end container wrap-->

    <div id="footer" class="container">
     		<div class="row" id="footer_container">
    			<div id="footer_wrap">	
	<!-- Begin @response footer hook content-->
		<?php response_footer(); ?>
	<!-- End @response footer hook content-->
				</div>
			<div class="row" >
				<div id="credit" class="twelve columns">
					<a href="http://cyberchimps.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/achimps.png" alt="credit" /></a>
				
				</div>
			</div>
	<?php endif;?>
	

			</div><!--end footer_wrap-->
	</div><!--end footer-->
</div> 

<?php if ($options->get($themeslug.'_disable_afterfooter') != "0"):?>

	<div id="afterfooter" class="container">
		<div class="row" id="afterfooterwrap">	
		<!-- Begin @response afterfooter hook content-->
			<?php response_secondary_footer(); ?>
		<!-- End @response afterfooter hook content-->
				
		</div> <!--end afterfooter-->	
	</div> 	
	<?php endif;?>
	
	<?php wp_footer(); ?>	
</body>

</html>
