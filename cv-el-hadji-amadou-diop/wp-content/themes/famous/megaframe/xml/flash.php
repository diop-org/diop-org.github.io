<?php
header('Content-type:text/xml');
require dirname( dirname( dirname( dirname( dirname( dirname( __FILE__ )))))) . '/wp-config.php';
echo '<?xml version="1.0" encoding="utf-8" ?>'; ?>

<Piecemaker>
	<Contents><?php
	if ( mframe_option( 'slider-auto-pull' ))
	{
		$query = new WP_Query( mframe_display( 'slider', 'auto' ));
		while ( $query->have_posts()) : $query->the_post();
			mframe_display( 'thumb', array( 'size' => 'large', 'output' => 'xml', 'nothumb' => 'large' ));
		endwhile; wp_reset_postdata();
	}
	else mframe_display( 'slider', 'custom-flash' ); ?>
	</Contents>

	<Settings ImageWidth="939" ImageHeight="320" LoaderColor="0x333333" InnerSideColor="0x222222" SideShadowAlpha="0.8" DropShadowAlpha="0.7" DropShadowDistance="25" DropShadowScale="0.95" DropShadowBlurX="40" DropShadowBlurY="4" MenuDistanceX="20" MenuDistanceY="50" MenuColor1="0xEEEEEE" MenuColor2="0xDDDDDD" MenuColor3="0xEEEEEE" ControlSize="50" ControlDistance="20" ControlColor1="0x222222" ControlColor2="0xFFFFFF" ControlAlpha="0.8" ControlAlphaOver="0.95" ControlsX="924" ControlsY="40" ControlsAlign="right" TooltipHeight="30" TooltipColor="0x222222" TooltipTextY="5" TooltipTextStyle="P-Italic" TooltipTextColor="0xFFFFFF" TooltipMarginLeft="5" TooltipMarginRight="7" TooltipTextSharpness="50" TooltipTextThickness="-100" InfoWidth="400" InfoBackground="0xFFFFFF" InfoBackgroundAlpha="0.95" InfoMargin="15" InfoSharpness="0" InfoThickness="0" Autoplay="<?php mframe_option( 'slider-timeout', 1 ); ?>" FieldOfView="45">
	</Settings>

	<Transitions>
		<Transition Pieces="9" Time="1.2" Transition="easeInOutBack" Delay="0.1" DepthOffset="300" CubeDistance="30"></Transition>
		<Transition Pieces="15" Time="3" Transition="easeInOutElastic" Delay="0.03" DepthOffset="200" CubeDistance="10"></Transition>
		<Transition Pieces="5" Time="1.3" Transition="easeInOutCubic" Delay="0.1" DepthOffset="500" CubeDistance="50"></Transition>
		<Transition Pieces="9" Time="1.25" Transition="easeInOutBack" Delay="0.1" DepthOffset="900" CubeDistance="5"></Transition>
	</Transitions>
</Piecemaker>