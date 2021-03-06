<?php
/**
 * queensland_holidays functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package queensland_holidays
 */

if ( ! function_exists( 'queensland_holidays_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function queensland_holidays_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on queensland_holidays, use a find and replace
	 * to change 'queensland_holidays' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'queensland_holidays', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'queensland_holidays' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'queensland_holidays_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'queensland_holidays_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function queensland_holidays_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'queensland_holidays_content_width', 640 );
}
add_action( 'after_setup_theme', 'queensland_holidays_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function queensland_holidays_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'queensland_holidays' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'queensland_holidays' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Login Sidebar', 'queensland_holidays' ),
		'id'            => 'login-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'queensland_holidays' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'queensland_holidays' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'queensland_holidays' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'queensland_holidays_widgets_init' );

add_filter('show_admin_bar', '__return_false');
/**
 * Enqueue scripts and styles.
 */
function queensland_holidays_scripts() {
	wp_enqueue_style( 'queensland_holidays-style', get_stylesheet_uri() );
	wp_enqueue_style( 'queensland_holidays-owl-style', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'queensland_holidays-owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.min.css' );
	wp_enqueue_style( 'queensland_holidays-prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css' );

	wp_enqueue_script( 'queensland_holidays-prettyjs', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), '', true );
	wp_enqueue_script( 'queensland_holidays-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'queensland_holidays-owl-js', get_template_directory_uri() . '/js/owl.carousel.js', array(), '', true );
	wp_enqueue_script( 'queensland_holidays-owl-navigation-js', get_template_directory_uri() . '/js/owl.navigation.js', array(), '', true );
	wp_enqueue_script( 'queensland_holidays-custom-js', get_template_directory_uri() . '/js/custom.js', array(), '', true );

	wp_enqueue_script( 'queensland_holidays-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'queensland_holidays_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}
// Register Custom Post Type
function property_post_type() {

	$labels = array(
		'name'                  => _x( 'Properties', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Properties', 'text_domain' ),
		'name_admin_bar'        => __( 'Property', 'text_domain' ),
		'archives'              => __( 'Property Archives', 'text_domain' ),
		'attributes'            => __( 'Property Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Property:', 'text_domain' ),
		'all_items'             => __( 'All Properties', 'text_domain' ),
		'add_new_item'          => __( 'Add New Property', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Property', 'text_domain' ),
		'edit_item'             => __( 'Edit Property', 'text_domain' ),
		'update_item'           => __( 'Update Property', 'text_domain' ),
		'view_item'             => __( 'View Property', 'text_domain' ),
		'view_items'            => __( 'View Properties', 'text_domain' ),
		'search_items'          => __( 'Search Property', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Property', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Property', 'text_domain' ),
		'items_list'            => __( 'Properties list', 'text_domain' ),
		'items_list_navigation' => __( 'Properties list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Properties list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Property', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'property', $args );

}
add_action( 'init', 'property_post_type', 0 );

// Register Custom Taxonomy
function proprty_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Property Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Property Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Propety Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'property_category', array( 'property' ), $args );

}
add_action( 'init', 'proprty_taxonomy', 0 );


// Register Custom Taxonomy
function property_location() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Location', 'text_domain' ),
		'all_items'                  => __( 'All Locations', 'text_domain' ),
		'parent_item'                => __( 'Parent Location', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Location:', 'text_domain' ),
		'new_item_name'              => __( 'New Location Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Location', 'text_domain' ),
		'edit_item'                  => __( 'Edit Location', 'text_domain' ),
		'update_item'                => __( 'Update Location', 'text_domain' ),
		'view_item'                  => __( 'View Location', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Locations with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Locations', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Locations', 'text_domain' ),
		'search_items'               => __( 'Search Locations', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Locations', 'text_domain' ),
		'items_list'                 => __( 'Locations list', 'text_domain' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'property_location', array( 'property' ), $args );

}
add_action( 'init', 'property_location', 0 );

add_image_size( 'property_thumbnail', 280, 220, true );
add_image_size( 'property_slider', 825, 280, true );
add_image_size( 'left_banner', 330, 280, true );

function pn_get_attachment_id_from_url( $attachment_url = '' ) {
 
	global $wpdb;
	$attachment_id = false;
 
	// If there is no url, return.
	if ( '' == $attachment_url )
		return;
 
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
 
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
	}
 
	return $attachment_id;
}

function vit_property_map($prop_cat, $location){
	if($location){
		$args_map = array(
			'post_type'              => array( 'property' ),
			'post_status'            => array( 'publish' ),
			'nopaging'               => true,
			'posts_per_page'         => '-1',
			'order'                  => 'DESC',
			'orderby'                => 'date',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'property_location',
					'field'    => 'term_id',
					'terms'    => $location,
				),
				array(
					'taxonomy' => 'property_category',
					'field'    => 'term_id',
					'terms'    => $prop_cat,
				),
			),
		);
	}else{
		$args_map = array(
			'post_type'              => array( 'property' ),
			'post_status'            => array( 'publish' ),
			'nopaging'               => true,
			'posts_per_page'         => '-1',
			'order'                  => 'DESC',
			'orderby'                => 'date',
			'tax_query' => array(
				array(
					'taxonomy' => 'property_category',
					'field'    => 'term_id',
					'terms'    => $prop_cat,
				),
			),
		);	
	}
	

	// The Query
	$the_query = new WP_Query( $args_map );

	// The Loop
	$main_map_arr = array();
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post(); 
			$address = get_field('street_address').', '.get_field('suburb').', Queensland, Australia '.get_field('post_code');
			$Address = urlencode($address);
		  	$request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&key=".of_get_option('map_api');
		  	$xml = simplexml_load_file($request_url) or die("url not loading");
		  	$status = $xml->status;
		  	if ($status=="OK") {
		  		$single_map_arr = array();
		      	$Lat = $xml->result->geometry->location->lat;
		      	$Lon = $xml->result->geometry->location->lng;

		      	$Lat1 = "$Lat";
		      	$Lon1 = "$Lon";
		      	//print_r($LatLng);
		      	//exit();
		      	$single_map_arr[] = $address;
		      	$single_map_arr[] = $Lat1;
		      	$single_map_arr[] = $Lon1;
	  		} 
	  		$main_map_arr[] = $single_map_arr;
	  		
	  		$main_infoWindow[] = array('<div class="info_content"><img src="'.get_the_post_thumbnail_url(get_the_ID(),'property_thumbnail').'"><h3>'.get_the_title().'</h3><p>'.$address.'</p></div>');
	  		$title_infoWindow[] = array('<div class="info_content"><h3>'.get_the_title().'</h3></div>');
	  	} 

	  	?>
	  	<script type="text/javascript">
	  		jQuery(function($) {
			    // Asynchronously Load the map API 
			    var script = document.createElement('script');
			    script.src = "//maps.googleapis.com/maps/api/js?callback=initialize&key=<?php echo of_get_option('map_api'); ?>";
			    document.body.appendChild(script);
			});

			function initialize() {
			    var map;
			    var bounds = new google.maps.LatLngBounds();
			    var mapOptions = {
			        mapTypeId: 'roadmap'
			    };
			                    
			    // Display a map on the page
			    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			    map.setTilt(45);
			        
			    // Multiple Markers
			    var markers = <?php echo json_encode($main_map_arr); ?>;
			    //console.log(marker);
			                        
			    // Info Window Content
			    var infoWindowContent = <?php echo json_encode($main_infoWindow); ?>;
			    var infoWindowtitle = <?php echo json_encode($title_infoWindow); ?>;
			        
			    // Display multiple markers on a map
			    var infoWindow = new google.maps.InfoWindow(), marker, i;
			    
			    // Loop through our array of markers & place each one on the map  
			    for( i = 0; i < markers.length; i++ ) {
			    	//alert(markers[i][2]);
			        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
			        bounds.extend(position);
			        marker = new google.maps.Marker({
			            position: position,
			            map: map,
			            title: markers[i][0]
			        });
			        
			        // Allow each marker to have an info window    
			        google.maps.event.addListener(marker, 'click', (function(marker, i) {
			            return function() {
			                infoWindow.setContent(infoWindowContent[i][0]);
			                infoWindow.open(map, marker);
			            }
			        })(marker, i));
			         google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
			            return function() {
			                infoWindow.setContent(infoWindowtitle[i][0]);
			                infoWindow.open(map, marker);
			            }
			        })(marker, i));

			        // Automatically center the map fitting all markers on the screen
			        map.fitBounds(bounds);
			    }

			    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
			    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
			        this.setZoom(8);
			        google.maps.event.removeListener(boundsListener);
			    });
			    
			}
	  	</script>
  	<?php }
  	wp_reset_postdata();
}