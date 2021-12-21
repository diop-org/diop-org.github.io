<?php get_header(); ?>

		<div id="content">
					
					<div id="error">
						<div style="padding:10px;font-family:berlin sans fb, helvetica;font-size:50px;color:red;text-align:center;font-variant:small-caps;">
							Error 404
						</div>
						<div style="padding:10px;font-family:berlin sans fb, helvetica;font-size:34px;color:red;text-align:center;font-variant:small-caps;">
							Page not Found
						</div>
						<div style="padding:10px;font-family:Arial,Helvetica,sans-serif;font-size:17px;text-align:justify;color:blue;letter-spacing:2px;">
								<br>
								<?php
									$page = $_SERVER["REDIRECT_URL"];
									_e('Page: ', 'bluedesign'); echo $page;
								?>
								<br><br>
						</div>
						<div style="padding:10px;font-family:Arial,sans-serif;font-size:15px;text-align:justify;">
								<?php
									_e('The page you requested was not found. ', 'bluedesign');
									echo "<br />";
									_e('The page may have been removed, may have changed location or may be temporarily unavailable.', 'bluedesign');
								?>
						</div>
					</div>
		
		</div><!-- content -->

<?php get_footer(); ?>