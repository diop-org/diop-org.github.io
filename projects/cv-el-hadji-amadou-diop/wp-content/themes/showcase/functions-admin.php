<?php
// create custom plugin settings menu
add_action('admin_menu', 'sc_create_menu');

function sc_create_menu() {

	//create new theme menu
	add_theme_page('Showcase Theme Settings', 'Showcase Settings', 'edit_theme_options', basename(__FILE__), 'sc_settings_page');

	//call register settings function
	add_action( 'admin_init', 'sc_register_mysettings' );
}


function sc_register_mysettings() {
	//register our settings
	register_setting( 'sc-settings-group', 'sc_uni_mantle' );
	register_setting( 'sc-settings-group', 'sc_default_portfolio' );
	register_setting( 'sc-settings-group', 'sc_contact_email' );
	register_setting( 'sc-settings-group', 'sc_footer_text' );
}

function sc_settings_page() {
?>
<div class="wrap">
<h2>Showcase</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'sc-settings-group' ); ?>
    <table class="form-table">
		<tr valign="top">
	        <th scope="row" colspan="2">Default Mantle</th>
		</tr>
        <tr valign="top">
        	<td colspan="2">
				<textarea name="sc_uni_mantle" style="height: 4em; margin: 0px; width: 98%;"><?php echo get_option('sc_uni_mantle'); ?></textarea>
				<p style="	font-size: 11px; margin: 6px 6px 8px;">This will be shown if no mantle is set for a specific post or page.</p>
			</td>
        </tr>
		<tr valign="top">
        	<td colspan="2"></td>
		</tr>

		<tr valign="top">
			<th scope="row">Homepage portfolio</th>
			<td>
				<?php
				wp_dropdown_categories( array(
					'id' => 'sc_default_portfolio',
					'name' => 'sc_default_portfolio',
					'taxonomy' => 'portfolio',
					'selected' => get_option('sc_default_portfolio') ) );
				?>
			</td>
		</tr>
		<tr>
		<td colspan="2"><p style="	font-size: 11px; margin: 6px 6px 8px;">The items in this portfolio will be displayed in the homepage slider and "Recent Work."</p></td>
		</tr

        <tr valign="top">
        <th scope="row">Default Contact Form Email</th>
        <td><input type="text" name="sc_contact_email" size="40" value="<?php echo get_option('sc_contact_email'); ?>" /></td>
		<tr>
		<td colspan="2"><p style="	font-size: 11px; margin: 6px 6px 8px;">Where mail from the contact form goes by default. Can be changed inline. If not set, defaults to the WordPress admin email.</p></td>
		</tr>

		<tr valign="top">
		  <th scope="row">Footer text</th>
		  <td><input type="text" name="sc_footer_text" size="40" value="<?php echo get_option('sc_footer_text'); ?>" /></td>
    </table>

    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>

<h3>Documentation</h3>
<h4>Steps to get your site up and running:</h4>
<ol>
    <li>Create a new page to act as your homepage</li>
    <li>Assign the new page the template of "Homepage" from the right sidebar</li>
    <li>Under settings > Reading, select a static page for your front page, and choose the newly created page from the drop down</li>
</ol>

<h4>Add projects to your portfolio:</h4>
<ol>
    <li>Select Projects from the WordPress left Admin menu</li>
    <li>Select "Add New"</li>
    <li>Add a title and content. For the image, select the featured image on the bottom right of the new post page. Make sure to select "Use as featured image" when uploading or selecting your image in the media popup box. Save all changes.</li>
</ol>

<h4>Sidebar</h4>
<p>Update your sidebar as usual with Appearence > Widgets, and drag the widget you would like to your sidebar</p>

<h4>Contact Form shortcode</h4>
<p>You can put a contact form on any post using the <code>[contact form]</code> shortcode. This shortcode supports having multiple contact forms capable of sending to different recipients.</p>
<h5>Options</h5>
<p>
	<code>to</code>: Where the contact form sends to</br>
	<code>subject</code>: Subject of the sent emails</br>
	<code>sent_message</code>: Displayed to the user upon success</br>
	<code>error_message</code>: Displayed if user fills out invalid or blank forms
</p>
<p>
	The text in between <code>[contact form]</code> and <code>[/contact form]</code> is displayed above the form. It is not shown upon sent or error messages.
<p><strong>Example:</strong> <code>[contact form to="name@example.com" subject="Contact form message" sent_message="Thanks! Your message has been sent" error_message="Looks like you filled something out wrong :("]Send us an email![/contact form]</code>

<h4>Mantles</h4>
<p>You can add mantle text to every post, page and product. For you portfolios, the portfolio description will be placed in the mantle. If you do not add mantle text to an item, it will default to whatever 'universal' mantle you configure here.</p>

<h4>Footer</h4>
<p>The footer text will appear at the very bottom of the page. This is ideal for copyrights or other licenses.
</div>
<?php } ?>