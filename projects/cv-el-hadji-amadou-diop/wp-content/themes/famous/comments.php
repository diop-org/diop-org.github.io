  <div id="comments"><?php

	if ( post_password_required())
	{
		echo '<p>' . __( 'This post is password protected. Enter the password to view any comments.', 'mframe' ) . '</p></div>';
		return;
	}

	if ( have_comments())
	{ ?>

   <div class="heading">
    <h2><?php comments_number( __( 'No Comments', 'mframe' ), __( '1 Comment', 'mframe' ), __( '% Comments', 'mframe' )); ?></h2><?php

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) && mframe_option( 'pages-above-comms' ))
		{ ?>

    <div class="pages above"><?php mframe_display( 'pages' ); ?></div><?php

		} ?>

   </div>
   <ul class="commentlist"><?php wp_list_comments( array( 'avatar_size' => 50, 'callback' => array( 'mFrameDisplay', 'comment' ))); ?></ul><?php

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) && mframe_option( 'pages-below-comms' ))
		{ ?>

   <div class="pages below"><?php mframe_display( 'pages' ); ?></div><?php

		}
	}
	if ( comments_open())
	{
		$fields = array(
			'author'	=> '<p><input type="text" name="author" value="" placeholder="' . __( 'Full Name', 'mframe' ) . ( $req ? ' *' : '' ) . '" tabindex="1" /></p>',
			'email'		=> '<p><input type="text" name="email" value="" placeholder="' . __( 'Email Address', 'mframe' ) . ( $req ? ' *' : '' ) . '" tabindex="2" /></p>',
			'url'		=> '<p><input type="text" name="url" value="" placeholder="' . __( 'Website URL', 'mframe' ) . '" tabindex="3" /></p>'
		);
		comment_form( $defaults = array(
			'fields'				=> apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'			=> '<p><textarea id="comment" name="comment" placeholder="' . __( 'Type your comment...', 'mframe' ) . '" tabindex="4"></textarea></p>',
			'comment_notes_after'	=> '',
			'cancel_reply_link'		=> __( '/ Cancel', 'mframe' ),
			'label_submit'			=> ''
		));
	}
	if ( !comments_open() && !is_page())
	{
		echo '<p>' . __( 'Comments are closed.', 'mframe' ) . '</p>';
	}
	?>

  </div>