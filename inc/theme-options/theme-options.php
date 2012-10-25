<?php
/**
 * Clean as a whistle Theme Options
 *
 * @package Clean as a whistle
 * @since Clean as a whistle 1.0
 */

/**
 * Register the form setting for our clean_as_a_whistle_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, clean_as_a_whistle_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_theme_options_init() {
	register_setting(
		'clean_as_a_whistle_options', // Options group, see settings_fields() call in clean_as_a_whistle_theme_options_render_page()
		'clean_as_a_whistle_theme_options', // Database option, see clean_as_a_whistle_get_theme_options()
		'clean_as_a_whistle_theme_options_validate' // The sanitization callback, see clean_as_a_whistle_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see clean_as_a_whistle_theme_options_add_page()
	);
	
	add_settings_field( 'site_title_case', __( 'Show site tite in:', 'clean_as_a_whistle' ), 'clean_as_a_whistle_settings_field_site_title_case', 'theme_options', 'general' );

	add_settings_field( 'title_color_radio_buttons', __( 'Title color:', 'clean_as_a_whistle' ), 'clean_as_a_whistle_settings_title_color_radio_buttons', 'theme_options', 'general' );
}
add_action( 'admin_init', 'clean_as_a_whistle_theme_options_init' );

/**
 * Change the capability required to save the 'clean_as_a_whistle_options' options group.
 *
 * @see clean_as_a_whistle_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see clean_as_a_whistle_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function clean_as_a_whistle_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_clean_as_a_whistle_options', 'clean_as_a_whistle_option_page_capability' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'clean_as_a_whistle' ),   // Name of page
		__( 'Theme Options', 'clean_as_a_whistle' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'theme_options',               // Menu slug, used to uniquely identify the page
		'clean_as_a_whistle_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'clean_as_a_whistle_theme_options_add_page' );

/**
 * Returns an array of sample radio options registered for Clean as a whistle.
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_site_title_case() {
	$site_title_case = array(
		'none' => array(
			'value' => 'none',
			'label' => __( 'Normal case', 'clean_as_a_whistle' )
		),
		'uppercase' => array(
			'value' => 'uppercase',
			'label' => __( 'Upper case', 'clean_as_a_whistle' )
		)
	);

	return apply_filters( 'clean_as_a_whistle_site_title_case', $site_title_case );
}


function clean_as_a_whistle_title_color_radio_buttons() {
	$site_title_case = array(
		'black' => array(
			'value' => 'black',
			'label' => __( 'Black', 'clean_as_a_whistle' )
		),
		'blue' => array(
			'value' => 'blue',
			'label' => __( 'Blue', 'clean_as_a_whistle' )
		)
	);

	return apply_filters( 'clean_as_a_whistle_title_color_radio_buttons', $site_title_case );
}


/**
 * Returns the options array for Clean as a whistle.
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_get_theme_options() {
	$saved = (array) get_option( 'clean_as_a_whistle_theme_options' );
	$defaults = array(
		'site_title_case'  => 'none',
		'title_color_radio_buttons'	=> 'black',
	);

	$defaults = apply_filters( 'clean_as_a_whistle_default_theme_options', $defaults );
	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );

	return $options;
}

/**
 * Renders the radio options setting field.
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_settings_field_site_title_case() {
	$options = clean_as_a_whistle_get_theme_options();

	foreach ( clean_as_a_whistle_site_title_case() as $button ) {
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="clean_as_a_whistle_theme_options[site_title_case]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['site_title_case'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	} ?><hr /><?php 
}
		 
function clean_as_a_whistle_settings_title_color_radio_buttons() {
	$options = clean_as_a_whistle_get_theme_options();

	foreach ( clean_as_a_whistle_title_color_radio_buttons() as $button ) {
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="clean_as_a_whistle_theme_options[title_color_radio_buttons]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['title_color_radio_buttons'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	} ?><hr /><?php 
}

/**
 * Renders the Theme Options administration screen.
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', 'clean_as_a_whistle' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'clean_as_a_whistle_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see clean_as_a_whistle_theme_options_init()
 * @todo set up Reset Options action
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_theme_options_validate( $input ) {
	$output = array();

	// Checkboxes will only be present if checked.
	if ( isset( $input['sample_checkbox'] ) )
		$output['sample_checkbox'] = 'on';

	// The sample text input must be safe text with no HTML tags
	if ( isset( $input['sample_text_input'] ) && ! empty( $input['sample_text_input'] ) )
		$output['sample_text_input'] = wp_filter_nohtml_kses( $input['sample_text_input'] );

	// The sample select option must actually be in the array of select options
	if ( isset( $input['sample_select_options'] ) && array_key_exists( $input['sample_select_options'], clean_as_a_whistle_sample_select_options() ) )
		$output['sample_select_options'] = $input['sample_select_options'];

	// The sample radio button value must be in our array of radio button values
	if ( isset( $input['site_title_case'] ) && array_key_exists( $input['site_title_case'], clean_as_a_whistle_site_title_case() ) )
		$output['site_title_case'] = $input['site_title_case'];

	if ( isset( $input['title_color_radio_buttons'] ) && array_key_exists( $input['title_color_radio_buttons'], clean_as_a_whistle_title_color_radio_buttons() ) )
		$output['title_color_radio_buttons'] = $input['title_color_radio_buttons'];

	// The sample textarea must be safe text with the allowed tags for posts
	if ( isset( $input['sample_textarea'] ) && ! empty( $input['sample_textarea'] ) )
		$output['sample_textarea'] = wp_filter_post_kses( $input['sample_textarea'] );

	return apply_filters( 'clean_as_a_whistle_theme_options_validate', $output, $input );
}
