<?php
/**
 * Understrap Theme Customizer
 *
 * @package sos-chapter-base
 */

/**
 * Register basic customizer support.
 *
 * @param object $wp_customize Customizer reference.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {	

	function understrap_customize_register( $wp_customize ) {
		$color_scheme = sos_chapter_get_color_scheme();

		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'color_scheme', array(
			'default'           => 'default',
			'sanitize_callback' => 'sos_chapter_sanitize_color_scheme',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'color_scheme', array(
			'label'    => __( 'Chapter Color Scheme', 'understrap' ),
			'section'  => 'colors',
			'type'     => 'select',
			'choices'  => sos_chapter_get_color_scheme_choices(),
			'priority' => 1,
		) );


	}
}
add_action( 'customize_register', 'understrap_customize_register' );


/**
 * Remove customizer defaults.
 *
 * @param object $wp_customize Customizer reference.
 */
if ( ! function_exists( 'understrap_customize_remove' ) ) {	

	function understrap_customize_remove( $wp_customize ) {

		$wp_customize->remove_section( 'themes' );
		$wp_customize->remove_section( 'understrap_theme_layout_options' );
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'header_image' );
		$wp_customize->remove_section( 'static_front_page' );
		$wp_customize->remove_section( 'custom_css' );
		$wp_customize->remove_control( 'background_color' );
		$wp_customize->remove_control( 'blogdescription' );
		$wp_customize->remove_control( 'site_icon' );
	}
}
add_action( 'customize_register', 'understrap_customize_remove', 20 );


/**
 * Registers color schemes for Chapter theme.
 *
 * Can be filtered with {@see 'sos_chapter_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Primary
 * 2. Secondary
 * 3. Accent
 *
 *
 * @return array An associative array of color scheme options.
 */
function sos_chapter_get_color_schemes() {
	/**
	 *
	 * 
	 *
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, page
	 *                              background, link, main text, secondary text.
	 *     }
	 * }
	 */
	return apply_filters( 'sos_chapter_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'understrap' ),
			'colors' => array(
				'#091F40',
				'#005DA6',
				'#00A8E1',
			),
		),
		'dark' => array(
			'label'  => __( 'University of British Colombia', 'understrap' ),
			'colors' => array(
				'#091F40',
				'#005DA6',
				'#00A8E1',
			),
		),
		'gray' => array(
			'label'  => __( 'University of Windsor', 'understrap' ),
			'colors' => array(
				'#005596',
				'#58585B',
				'#FFCE00',

			),
		),
		'red' => array(
			'label'  => __( 'Wilfred Laurier University', 'understrap' ),
			'colors' => array(
				'#3C2886',
				'#8A650B',
				'#83261F',

			),
		),
		'yellow' => array(
			'label'  => __( 'McMaster University', 'understrap' ),
			'colors' => array(
				'#7C0040',
				'#949CA1',
				'#FEC057',
			),
		),
	) );
}

if ( ! function_exists( 'sos_chapter_get_color_scheme' ) ) :
/**
 * Retrieves the current Twenty Sixteen color scheme.
 *
 * Create your own sos_chapter_get_color_scheme() function to override in a child theme.
 *
 *
 * @return array An associative array of either the current or default color scheme HEX values.
 */
function sos_chapter_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$color_schemes       = sos_chapter_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; // sos_chapter_get_color_scheme

if ( ! function_exists( 'sos_chapter_get_color_scheme_choices' ) ) :
/**
 * Retrieves an array of color scheme choices registered for Twenty Sixteen.
 *
 * Create your own sos_chapter_get_color_scheme_choices() function to override
 * in a child theme.
 *
 *
 * @return array Array of color schemes.
 */
function sos_chapter_get_color_scheme_choices() {
	$color_schemes                = sos_chapter_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}
endif; // sos_chapter_get_color_scheme_choices


if ( ! function_exists( 'sos_chapter_sanitize_color_scheme' ) ) :
/**
 * Handles sanitization for sos color schemes.
 *
 * Create your own sos_chapter_sanitize_color_scheme() function to override
 * in a child theme.
 *
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function sos_chapter_sanitize_color_scheme( $value ) {
	$color_schemes = sos_chapter_get_color_scheme_choices();

	if ( ! array_key_exists( $value, $color_schemes ) ) {
		return 'default';
	}

	return $value;
}
endif; // sos_chapter_sanitize_color_scheme

/**
 * Enqueues front-end CSS for color scheme.
 *
 *
 * @see wp_add_inline_style()
 */
function sos_chapter_color_scheme_css() {

	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );


	$color_scheme = sos_chapter_get_color_scheme();

	// Convert main text hex color to rgba.
	//$color_textcolor_rgb = sos_chapter_hex2rgb( $color_scheme[3] );

	// If the rgba values are empty return early.
	// if ( empty( $color_textcolor_rgb ) ) {
	// 	return;
	// }

	// If we get this far, we have a custom color scheme.
	$colors = array(
		'primary'      		=> $color_scheme[0],
		'secondary' 		=> $color_scheme[1],
		'accent'            => $color_scheme[2],

	);

	$color_scheme_css = sos_chapter_color_scheme_css( $colors );

	wp_add_inline_style( 'sos-chapter-style', $color_scheme_css );
}
//add_action( 'wp_enqueue_scripts', 'sos_chapter_color_scheme_css' );


// /**
//  * Binds the JS listener to make Customizer color_scheme control.
//  *
//  * Passes color scheme data as colorScheme global.
//  *
//  */
// function sos_chapter_customize_control_js() {
// 	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/assets/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20160816', true );
// 	wp_localize_script( 'color-scheme-control', 'colorScheme', sos_chapter_get_color_schemes() );
// }
// add_action( 'customize_controls_enqueue_scripts', 'sos_chapter_customize_control_js' );



// /**
//  * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
//  */
// if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
// 	/**
// 	 * Setup JS integration for live previewing.
// 	 */
// 	function understrap_customize_preview_js() {
// 		wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js',
// 			array( 'customize-preview' ), '20130508', true );
// 	}
// }
// add_action( 'customize_preview_init', 'understrap_customize_preview_js' );
