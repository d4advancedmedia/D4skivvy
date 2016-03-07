<?php #03Mar16
//		Menu
//		Javascripts & Styles
//		wp_head() hooks
//		wp_foot() hooks
//		<html> classes
//		<body> classes
//		Widgets Area
//		Theme Setup



//	REGISTER - Menus
	register_nav_menus( array(
		'main' => __( 'Main Menu' ),
		'mobile' =>  __( 'Mobile Menu' ),
		'sitemap' => __( 'Site Map' ),
	) );




//	REGISTER - Javascripts & Styles
	function skivvy_scriptnstyle_enqueuer() {

		// SCRIPTS - wp_register_script( $handle, $src, $deps, $ver, $in_footer );
			wp_register_script( 'skivvy-custom', get_stylesheet_directory_uri(). '/js/custom.js', array('jquery'), '1', true );

		// STYLES - wp_register_style( $handle, $src, $deps, $ver, $media );
			wp_register_style( 'skivvy-func',  get_template_directory_uri() . '/css/func.css', false, '04Mar16', 'all');
			wp_register_style( 'skivvy-style', get_template_directory_uri() . '/style.css', array('skivvy-func'), '1', 'all');

		// ENQUEUE
			// NOTE: Comment out here if undesired.
				wp_enqueue_script('skivvy-custom');
				wp_enqueue_style ('skivvy-style');

	} add_action('wp_enqueue_scripts', 'skivvy_scriptnstyle_enqueuer');




//  WP_HEAD()

	function skivvy_head() {
		$head_meta = array(
		// Standard Meta
			// HTML character set encoding. NOTE - Needs to be close to the opening HEAD tag
				'<meta charset="'. get_bloginfo( 'charset' ). '">',

		// Mobile Meta
			// Sets default width and scale to be dependent on the device.
				'<meta content="width=device-width, initial-scale=1.0" name="viewport">',
			// Don't autodetect phonenumbers and create links in iphone safari & blackberry
			#	'<meta name="format-detection" content="telephone=no"><meta http-equiv="x-rim-auto-match" content="none">',

		// IE specific
			// Force IE to render most recent engine for installed browser. And enable Chrome Frame
				'<!--[if IE]><meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"><![endif]-->',
			// HTML5 Shiv for < IE9
				'<!--[if lt IE 9]><script src="' . get_template_directory_uri() . '/js/html5.js"></script><![endif]-->',

		// WordPress items
			#	'<link rel="profile" href="http://gmpg.org/xfn/11">',
		);

		foreach ($head_meta as $meta) {
			echo $meta. "\r\n";
		}
	} add_action( 'wp_head', 'skivvy_head', 0 );


//  WP_FOOT()
/*
	function skivvy_foot() {


	} add_action( 'wp_footer', 'skivvy_foot' ); //*/



//  REGISTER - HTML Classes 
	function skivvy_html_classes( $classes ) {

		$query = $_SERVER["QUERY_STRING"];
		
		if ( $query != '' ) {
			$classes = array_merge( $classes, explode( '&', str_replace( '=' , '_' , $query ) ) );
		}

		return $classes;
	} add_filter('html_classes','skivvy_html_classes');


	function skivvy_body_classes($classes) {
		global $wpdb, $post;

		// .subpage for all non-front_page
			if ( ! is_front_page() ) {
				$classes[] = 'subpage';
			}

		// page classes
		if (is_page()) {

			// .section-{$parentpage} - Parent Page Post class -- Add the top level parent page to the body class
				if ($post->post_parent) {
					$parent  = end(get_post_ancestors($current_page_id));
				} else {
					$parent = $post->ID;
				}
				$post_data = get_post($parent, ARRAY_A);
				$classes[] = 'section-' . $post_data['post_name'];

		}

		return $classes;

	} add_filter('body_class','skivvy_body_classes');


// REGISTER - Widget Areas
/*
	function skivvy_register_sidebars() {
		register_sidebar( array(
			'name' => __( 'Sidebar name', 'skivvy' ),
			'id' => 'primary-widget-area',
			'description' => 'The primary widget area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	} add_action( 'widgets_init', 'skivvy_register_sidebars' ); //*/



// Basic Theme Setup Setup
	function skivvy_setup() {

		// WP-Theme Support - http://codex.wordpress.org/Function_Reference/add_theme_support
				add_theme_support( 'title-tag' );
				add_theme_support( 'post-thumbnails' );
				add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption','widgets') );
				add_theme_support( 'automatic-feed-links' );
			#	add_theme_support( 'post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video') );
			#	add_theme_support( 'woocommerce' );

		// Add Widget/sidebar functionality
			#	add_filter('widget_text', 'do_shortcode'); // Widget Support - Shortcodes
			#	add_filter('widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
			#	add_filter('widget_text', array( $wp_embed, 'autoembed'), 8 ); // Widget Support - oEmbed & oEmbed 2

	} add_action( 'after_setup_theme', 'skivvy_setup' );



?>