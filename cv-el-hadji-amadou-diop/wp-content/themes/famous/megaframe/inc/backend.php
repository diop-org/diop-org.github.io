<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

function mframe_errors( $args = array() )
{
	foreach ( (array) $args as $key => $value )
	{
		switch ( $key )
		{
			case 'user_login' : case 'user_email' : case 'email' : case 'name' : case 'subject' : case 'message' :
				if ( !$value )
				{
					$errors[] = 'Please enter your ' . $key . '.';
				}
			break;
		}

		switch ( $key )
		{
			case 'user_login' :
				if ( !empty( $value ) && !validate_username( $value ))
				{
					$errors[] = 'Username is invalid.';
				}

				if ( !empty( $value ) && username_exists( $value ))
				{
					$errors[] = 'Username already exists.';
				}
			break;

			case 'user_email' : case 'email' :
				if ( !empty( $value ) && !is_email( $value ))
				{
					$errors[] = 'Email address is invalid.';
				}

				if ( $key == 'user_email' && !empty( $value ) && email_exists( $value ))
				{
					$errors[] = 'Email address already exists.';
				}
			break;
		}
	}

	if ( isset( $errors ))
	{
		foreach ( (array) $errors as $error )
			echo '<li>' . $error . '</li>';
		die();
	}
}

function mframe_newsletter()
{
	check_ajax_referer( 'newsletter_data', 'security' );

	mframe_errors( $_POST );

	extract( $_POST, EXTR_SKIP );

	$mcapi = get_template_directory() . '/megaframe/inc/mcapi.php';

	if ( !file_exists( $mcapi ))
	{
		echo '<li>It seems that you don\'t have the pro version or it\'s corrupt.</li>'; die();
	}

	require_once $mcapi;

	$api = new MCAPI( mframe_option( 'mcapi' ));

	if ( $api->listSubscribe( $list, $email, '' ) === true )
	{
		echo '<li>Success! Check your email to confirm sign up.</li>';
	}
	else
	{
		echo '<li>Error: ' . $api->errorMessage . '</li>';
	}
	die();
}
add_action( 'wp_ajax_mframe_newsletter', 'mframe_newsletter' );
add_action( 'wp_ajax_nopriv_mframe_newsletter', 'mframe_newsletter' );

function mframe_contact()
{
	check_ajax_referer( 'contact_data', 'security' );

	mframe_errors( $_POST );

	extract( $_POST, EXTR_SKIP );

	$name		= trim( stripslashes( wp_filter_nohtml_kses( $name )));
	$subject	= trim( stripslashes( wp_filter_nohtml_kses( $subject )));
	$message	= trim( stripslashes( wp_filter_nohtml_kses( $message )));
	$message	= "Name: $name \nEmail: $email \nSubject: $subject \nMessage: $message";
	$headers	= "From: $name <$email>";

	if ( wp_mail( mframe_option( 'contact-form-email' ), $subject, $message, $headers ))
	{
		echo '<li>Success! The administrator will contact you as soon as possible.</li>';
	}
	else
	{
		echo '<li>Ajax Error!</li>';
	}
	die();
}
add_action( 'wp_ajax_mframe_contact', 'mframe_contact' );
add_action( 'wp_ajax_nopriv_mframe_contact', 'mframe_contact' );

function mframe_register()
{
	check_ajax_referer( 'register_data', 'security' );

	mframe_errors( $_POST );

	extract( $_POST, EXTR_SKIP );

	if ( wp_create_user( $user_login, wp_generate_password(), $user_email ))
	{
		echo '<li>Success! Check your email for the password.</li>';
	}
	else
	{
		echo '<li>Ajax Error!</li>';
	}
	die();
}
add_action( 'wp_ajax_register', 'mframe_register' );
add_action( 'wp_ajax_nopriv_register', 'mframe_register' );
?>