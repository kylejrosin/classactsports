<?php
require_once( 'library/bones.php' );

function bones_ahoy() {

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
   
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
 
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper
  
  // launching this stuff after theme setup
  bones_theme_support();

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  
  //remove emojis
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
  
}

add_action( 'after_setup_theme', 'bones_ahoy' );

function load_admin_style() {
	wp_register_script( 'admin_js', get_stylesheet_directory_uri() . '/library/js/admin.js', array(), '1.0.0', false );
	wp_register_style( 'admin_css', get_template_directory_uri() . '/library/css/admin.css', false, '1.0.0' );
	wp_enqueue_style( 'admin_css' );
	wp_enqueue_script( 'admin_js' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

//google fonts
wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700,900');

function wp_title_func(){
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'wp_title_func' );

//thumb sizes
add_image_size( 'standard-640-360', 640, 360, true );
add_image_size( 'small-300-169', 300, 169, true );

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'standard-640-360' => __('640px by 360px'),
        'small-300-169' => __('300px by 169px'),
    ) );
}

//remove admin bar css
//add_action('get_header', 'remove_admin_login_header');
//function remove_admin_login_header() {
//	remove_action('wp_head', '_admin_bar_bump_cb');
//}
//add_filter('show_admin_bar', '__return_false');
add_action('get_header', 'my_filter_head');
function my_filter_head() {
   remove_action('wp_head', '_admin_bar_bump_cb');
}


/*register_post_type( 'instructor',
	array(
		'labels' => array(
			'name' 		=> __('Coaches'),
			'singular_name' => __('Coach'),
			'add_new'	=> __('Add New'),
			'add_new_item'	=> __('Add New Coach'),
			'edit_item'	=> __('Edit Coach'),
			'new_item'	=> __('New Coach'),
			'view_item'	=> __('View Coach'),
		),
		'public'		=> true,
		'has_archive' 		=> false,
		'show_ui'		=> true,
		'supports'      	=> array( 'author', 'revisions', 'editor', 'thumbnail', 'title' ),
		'publicly_queryable'	=> true,
		'menu_position'		=> 4,
	)
);

function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['discounturl'] = 'Discount URL';

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');
*/

?>