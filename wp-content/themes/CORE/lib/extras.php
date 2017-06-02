<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;
use Roots\Sage\Extras;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

//Logo support
function theme_prefix_setup() {

	add_theme_support( 'custom-logo', array(
		'height'      => 42,
		'width'       => 120,
		'flex-width' => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\theme_prefix_setup' );


/*Security measures*/
if(function_exists('remove_action')) {
	remove_action('wp_head', 'wp_generator');
}

// Redefine password from name and email, globally
add_filter( 'wp_mail_from', __NAMESPACE__ . '\\wpse_new_mail_from' );
function wpse_new_mail_from( $old ) {
    return get_option('admin_email');
}

add_filter('wp_mail_from_name', __NAMESPACE__ . '\\wpse_new_mail_from_name');
function wpse_new_mail_from_name( $old ) {
    return get_option('blogname');
}
//end

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', __NAMESPACE__ . '\\my_login_logo_url' );

function my_login_logo_url_title() {
    return get_option('blogname');
}
add_filter( 'login_headertitle', __NAMESPACE__ . '\\my_login_logo_url_title' );

//change the default WP login screen logo
function my_login_logo() {

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	?>
    <style type="text/css">
        #login {
			width:50%  !important;
		}
		.login h1 a {
            background-image: url('<?php echo $logo[0]; ?>') !important;
            padding-bottom: 30px !important;
			background-size:100% auto !important;
			width:340px !important;
			height:130px !important;
        }
		@media (max-width: 768px) {
		  #login { width:100%;}
		  .login h1 a {
		  	width:240px !important;
		  }
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\\my_login_logo', 1 );


//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', __NAMESPACE__ . '\\add_file_types_to_uploads');



//Unset the tag body class as it conflicts with bootstrap css
function bs4_remove_tag_body_class( $classes ) {
    if ( false !== ( $class = array_search( 'tag', $classes ) ) ) {
        unset( $classes[$class] );
    }
    return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\\bs4_remove_tag_body_class' );


//Remove emoji scripts introduced by WP 4.2
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\\disable_emojicons_tinymce' );

}
add_action( 'init', __NAMESPACE__ . '\\disable_wp_emojicons' );


//Add options page
if( function_exists('acf_add_options_page') ) {

 	// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title' 	=> 'Theme Options',
		'parent_slug' 	=> 'options-general.php',
	));

}

/********************************************
/* Adding open graph sharing meta tags *****/
function hook_meta() {
	global $post;
	//default image, if there's no featured
	//image added via the options page under Settings --> Theme options
	$featured_img_url = get_field('social', 'option');

	//Facebook
	$output='<meta property="og:type" content="website">';
	$output.='<meta property="og:site_name" content="'.get_bloginfo("name").'">';
	
	//if single post, use the content of the post
	if (is_single()) {
		//check if featured image is set
		$featured = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large" );
		if( $featured ) {
			$featured_img_url = $featured[0];

			//Pull twitter card only if featured image is set
			//Twitter
			$twitter_handle = get_field('twitter_handle', 'option');

			$output.='<meta name="twitter:card" content="summary_large_image">';
			$output.='<meta name="twitter:site" content="@'.$twitter_handle.'">';
			$output.='<meta name="twitter:creator" content="@'.$twitter_handle.'">';		
			$output.='<meta name="twitter:title" content="'.str_replace('"','&quot;',get_the_title($post->ID)).'">';
			$output.='<meta name="twitter:description" content="'.str_replace('"','&quot;',get_the_excerpt($post->ID)).'">';
			$output.='<meta name="twitter:image" content="'.$featured_img_url.'">';
			$output.='<meta name="twitter:image:alt" content="'.str_replace('"','&quot;',get_the_title($post->ID)).'">';
		}

		//Description
		$output.='<meta property="description" content="'.str_replace('"','&quot;',get_the_excerpt($post->ID)).'">';
		
		//Facebook
		$output.='<meta property="og:url" content="'.get_the_permalink($post->ID).'">';
		$output.='<meta property="og:title" content="'.str_replace('"','&quot;',get_the_title($post->ID)).' | '.get_bloginfo("name").'">';
		$output.='<meta property="og:description" content="'.str_replace('"','&quot;',get_the_excerpt($post->ID)).'">';
		
	} else {
		//otherwise show general blog description and image
		$output.='<meta property="og:title" content="'.get_bloginfo("name").'">';
		$output.='<meta property="og:url" content="'.get_bloginfo("url").'">';
		$output.='<meta property="description" content="'.get_bloginfo('description').'">';
		$output.='<meta property="og:description" content="'.get_bloginfo("description").'">';
	}
	//Facebook image
	$output.='<meta property="og:image" content="'.$featured_img_url.'">';


	echo $output;
}
add_action('wp_head', __NAMESPACE__ . '\\hook_meta');
/* END meta tags ****************************/


//Shorten automatic excerpt
function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\\custom_excerpt_length', 999 );



/**** You can also make your custom sizes selectable from your WordPress admin. **/

add_filter( 'square', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'square' => __( 'Large Square' ),
    ) );
}


/**** Get posts with matchig tags **/
function get_related_posts($post) {
	$orig_post = $post;
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
  		$args=array(
  			'tag__in' => $tag_ids,
  			'post__not_in' => array($post->ID),
  			//'posts_per_page'=>3, // Number of related posts to display.
  			'ignore_sticky_posts'=>1,
  			'orderby' => 'rand'
  		);
  		$my_query = new \wp_query( $args );
  		if( $my_query->have_posts() ) {
  			//shuffle($my_query);
  			return $my_query;
  		} else {
  			return false;
  		}
	}
	wp_reset_query();
}

//get latest posts
/**
 * Custom query to get section posts
 *
 * @param int  $num_to_load  Posts per page
 * @param string  $paged  Current page number
 * @return array  $the_query  Posts result set
 */
function get_posts($pParamHash) {
	$args = array(
    'orderby'		   => 'date',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'post',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'	   => '',
    'author_name'	   => '',
    'post_status'      => 'publish',
    'suppress_filters' => true,
    'paged' => ( $pParamHash['paged'] ) ? $pParamHash['paged'] : 1,
    'posts_per_page' => ( $pParamHash['posts_per_page'] ) ? $pParamHash['posts_per_page'] : 10
  );

  $the_query = new \wp_query( $args );
  return $the_query;
  wp_reset_query();
}









