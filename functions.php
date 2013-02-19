<?php

// update site url
//define('WP_HOME','http://www.hobbledown.com/');
//define('WP_SITEURL','http://www.hobbledown.com/');

// add theme support
add_theme_support( 'menus' );
add_theme_support('post-thumbnails');

// Add Custom image sizes
// Note: 'true' enables hard cropping so each image is exactly those dimensions and automatically cropped
add_image_size( 'feature-image', 908, 239, true );
add_image_size( 'homebanner', 588, 268, true );
add_image_size( 'newsthumb', 556, 222, true );
add_image_size( 'homethumb', 188, 128, true );

 
 

define('HEADER_TEXTCOLOR', '14381a');
define('HEADER_IMAGE', '%s/assets/img/bg.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 1600); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 769);

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => __( 'Primary Widget Area' ),						   
		'before_widget' => '',
		'after_widget' => '<div class="single-right-btm"></div>',
		'before_title' => '<div class="title">',
		'after_title' => '</div>',
));

function header_style() {
    ?><style type="text/css">
        body {
            background: url(<?php header_image(); ?>) 50% 0 no-repeat #<?php header_textcolor(); ?>;
            
        }
    </style><?php
}
add_custom_image_header('header_style','');


function post_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div>

		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), ' ' );
			?>
		</div>

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
	<?php

		break;
	endswitch;
}


// CW Functions..

// add multiple thumbs per page
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => '2nd Feature Image',
        'id' => 'feature-image-2',
        'post_type' => 'page'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '3rd Feature Image',
        'id' => 'feature-image-3',
        'post_type' => 'page'
        )
    );     
};


// Custom Metas
// add custom meta for contact page only
add_action("admin_init", "contact_init");
	add_action('save_post', 'save_contact_meta');

	function contact_init(){
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
	if ($template_file == 'contact.php') {
		add_meta_box("contact-meta", "Longitude &amp; Latitude", "contact_meta_options", "page", "normal", "core");
		}
	}

	function contact_meta_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$contactlat = $custom["contactlat"][0];
		$contactlong = $custom["contactlong"][0];
?>
	<div>
	<i>Please enter the longitude and latitude of your office address, you can find it on Google Maps</i><br /><br />
		<label>Latitude:</label><br /><input name="contactlat" type="text" value="<?php echo $contactlat; ?>" class="large-text" /><br /><br />
		<label>Longitude:</label><br /><input name="contactlong" type="text" value="<?php echo $contactlong; ?>" class="large-text" /><br /><br />
<?php
	}

function save_contact_meta(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	return $post->ID;
	} else {
	update_post_meta($post->ID, "contactlat", $_POST["contactlat"]);
	update_post_meta($post->ID, "contactlong", $_POST["contactlong"]);
	}
}

// page summary
add_action("admin_init", "pagesummary_init");
add_action('save_post', 'save_pagesummary_meta');

	function pagesummary_init(){
		add_meta_box("pagesummary-meta", "Page Summary", "pagesummary_meta_options", "page", "normal", "core");
	}

	function pagesummary_meta_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$pagesummary = $custom["pagesummary"][0];
?>
	<div>
	<i>This will show on the main landing page per section</i><br /><br />
	<label>Enter Page Summary</label><br /><textarea name="pagesummary" type="text" value="<?php echo $pagesummary; ?>" class="large-text" rows="5"><?php echo $pagesummary; ?></textarea>
	</div>
<?php
	}

function save_pagesummary_meta(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	return $post->ID;
	} else {
	update_post_meta($post->ID, "pagesummary", $_POST["pagesummary"]);
	}
}

// for map only, link to map file
add_action("admin_init", "maplocation_init");
add_action('save_post', 'save_maplocation_meta');

	
	function maplocation_init(){
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
	if ($template_file == 'map.php') {
		add_meta_box("maplocation-meta", "PDF Map Location", "maplocation_meta_options", "page", "normal", "high");
		}
	}

	function maplocation_meta_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$maplocation = $custom["maplocation"][0];
?>
	<div>
	<i>Please enter the full link to the map PDF including the http:// </i><br /><br />
	<label>Enter PDF Link</label><br /><input name="maplocation" type="text" value="<?php echo $maplocation; ?>" class="large-text" /">
	</div>
<?php
	}

function save_maplocation_meta(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	return $post->ID;
	} else {
	update_post_meta($post->ID, "maplocation", $_POST["maplocation"]);
	}
}




// custom field for single post type only
add_action("admin_init", "eventdetails_init");
add_action('save_post', 'save_eventdetails_meta');

	function eventdetails_init(){
		add_meta_box("eventdetails-meta", "Event Details", "eventdetails_meta_options", "post", "normal", "core");
	}

	function eventdetails_meta_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$eventdetailsdate = $custom["eventdetailsdate"][0];
		$eventdetailsmonth = $custom["eventdetailsmonth"][0];
		$eventdetailsyear = $custom["eventdetailsyear"][0];
		$eventdetailstime = $custom["eventdetailstime"][0];
		$eventdetailsampm = $custom["eventdetailsampm"][0];

?>
	<div>
	<i>Enter all of your event details in here, if you leave all of these boxes blank then no book now button and no event details will appear for this post.</i><br /><br />
	<input name="eventdetailsdate" type="text" value="<?php echo $eventdetailsdate; ?>" class="small-text" /><label> Enter Date including th/st/rd (e.g. 26th)</label>
	<br /><br /><input name="eventdetailsmonth" type="text" value="<?php echo $eventdetailsmonth; ?>" class="small-text" /><label> Enter Month in 3 letters (e.g. JAN)</label>
	<br /><br /><input name="eventdetailsyear" type="text" value="<?php echo $eventdetailsyear; ?>" class="small-text" /><label> Enter Year in just 2 characters (e.g. 12)</label>
	<br /><br /><input name="eventdetailstime" type="text" value="<?php echo $eventdetailstime; ?>" class="small-text" /><label> Enter Time in this format: hh:mm (e.g. 06:30)</label>
	<br /><br />
		<select id="eventdetailsampm" name="eventdetailsampm">
		    <option value="am" <?php if ($eventdetailsampm == "am") { ?> selected="selected" <?php } ?>>AM</option>
		    <option value="pm" <?php if ($eventdetailsampm == "pm") { ?> selected="selected" <?php } ?>>PM</option>
		</select><label> AM or PM?</label>
	</div>
<?php
	}

function save_eventdetails_meta(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	return $post->ID;
	} else {
	update_post_meta($post->ID, "eventdetailsdate", $_POST["eventdetailsdate"]);
	update_post_meta($post->ID, "eventdetailsmonth", $_POST["eventdetailsmonth"]);
	update_post_meta($post->ID, "eventdetailsyear", $_POST["eventdetailsyear"]);
	update_post_meta($post->ID, "eventdetailstime", $_POST["eventdetailstime"]);
	update_post_meta($post->ID, "eventdetailsampm", $_POST["eventdetailsampm"]);
	}
}


// show form pop up for any .pdf link - adds class to body and we use jQuery to activate popup
add_action("admin_init", "popform_init");
add_action('save_post', 'save_popform_meta');

	function popform_init(){
		add_meta_box("popform-meta", "Show a Form Pop up?", "popform_meta_options", "page", "side", "high");
	}

	function popform_meta_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$popform = $custom["popform"][0];

?>
	<div>
	<i>If you'd like the website visitor to see a pop up form that they need to fill out before they any PDF on this page, select one of the following options</i><br /><br />
	
		<input type="radio" name="popform" id="popformstandard" <?php if ($popform == "popform-standard") { ?> checked="checked" <?php } ?> value="popform-standard" /> <label for="popformstandard">Show Standard Form</label><br />
		<input type="radio" name="popform" id="popformschool" <?php if ($popform == "popform-school") { ?> checked="checked" <?php } ?> value="popform-school" /> <label for="popformschool">Show School Form</label><br />
		<input type="radio" name="popform" id="popformnone" <?php if ( ($popform != "popform-standard") && ($popform != "popform-school") ) { ?> checked="checked" <?php } ?> value="popform-none" /> <label for="popformnone">No Form</label>
		
	</div>
<?php
	}

function save_popform_meta(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	return $post->ID;
	} else {
	update_post_meta($post->ID, "popform", $_POST["popform"]);
	}
}




function page_bodyclass() {  // add class to <body> tag
	global $wp_query;
	$page = '';
   	   $page = $wp_query->query_vars["pagename"];
		echo $page;
}



// CUSTOM POST TYPES

//front flexslider controller:

add_action('init', 'banner_register');
 
function banner_register() {
 
	$labels = array(
		'name' => _x('Homepage Banners', 'post type general name'),
		'singular_name' => _x('Homepage Banner', 'post type singular name'),
		'add_new' => _x('Add New', 'banner item'),
		'add_new_item' => __('Add New Homepage Banner'),
		'edit_item' => __('Edit Homepage Banner'),
		'new_item' => __('New Homepage Banner'),
		'view_item' => __('View Homepage Banner'),
		'search_items' => __('Search Homepage Banner'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/functions/banner.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','thumbnail')
	  ); 
 
	register_post_type( 'banner' , $args );
}

add_action('init', 'banner_register');
 
 
// opening times

function opening_register() {
 
	$labels = array(
		'name' => _x('Opening Times etc.', 'post type general name'),
		'singular_name' => _x('Opening Time etc.', 'post type singular name'),
		'add_new' => _x('Add New', 'opening time etc.'),
		'add_new_item' => __('Add New Opening Time etc.'),
		'edit_item' => __('Edit Opening Time etc.'),
		'new_item' => __('New Opening Time etc.'),
		'view_item' => __('View Opening Time etc.'),
		'search_items' => __('Search Opening Time etc.'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/functions/event.png',
		'rewrite' => true,
		'capability_type' => 'page',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor')
	  ); 
 
	register_post_type( 'opening' , $args );
}

add_action('init', 'opening_register');



// —————Add Settings to General Settings—————–
function social_settings_api_init() {
// Add the section to general settings so we can add our
// fields to it
add_settings_section('social_setting_section',
'Additional Site Settings',
'social_setting_section_callback_function',
'general');
// Add the field with the names and function to use for our new
// settings, put it in our new section
add_settings_field('general_setting_facebook',
'Facebook Page',
'general_setting_facebook_callback_function',
'general',
'social_setting_section');
// Register our setting so that $_POST handling is done for us and
// our callback function just has to echo the <input>
register_setting('general','general_setting_facebook');
add_settings_field('general_setting_twitter',
'Twitter Account (Username only)',
'general_setting_twitter_callback_function',
'general',
'social_setting_section');
register_setting('general','general_setting_twitter');
add_settings_field('general_setting_googleplus',
'Google Plus Page',
'general_setting_googleplus_callback_function',
'general',
'social_setting_section');
register_setting('general','general_setting_googleplus');
add_settings_field('general_setting_youtube',
'Telephone Number',
'general_setting_youtube_callback_function',
'general',
'social_setting_section');
register_setting('general','general_setting_youtube');
add_settings_field('general_setting_linkedin',
'Contact Email',
'general_setting_linkedin_callback_function',
'general',
'social_setting_section');
register_setting('general','general_setting_linkedin');
add_settings_field('general_setting_booktickets',
'Book Tickets Link',
'general_setting_booktickets_callback_function',
'general',
'social_setting_section');
register_setting('general','general_setting_booktickets');
add_settings_field('general_setting_bookparties',
'Book Parties Link',
'general_setting_bookparties_callback_function',
'general',
'social_setting_section');
register_setting('general','general_setting_bookparties');
}
add_action('admin_init', 'social_settings_api_init');

// —————-Settings section callback function———————-
function social_setting_section_callback_function() {
echo '<p>You can update the social settings, contact details and book tickets &amp; parties links in this section.</p>';
}
function general_setting_facebook_callback_function() {
echo '<input name="general_setting_facebook" id="general_setting_facebook" type="text" value="'. get_option('general_setting_facebook') .'" />';
}
function general_setting_twitter_callback_function() {
echo '<input name="general_setting_twitter" id="general_setting_twitter" type="text" value="'. get_option('general_setting_twitter') .'" />';
}
function general_setting_googleplus_callback_function() {
echo '<input name="general_setting_googleplus" id="general_setting_googleplus" type="text" value="'. get_option('general_setting_googleplus') .'" />';
}
function general_setting_youtube_callback_function() {
echo '<input name="general_setting_youtube" id="general_setting_youtube" type="text" value="'. get_option('general_setting_youtube') .'" />';
}
function general_setting_linkedin_callback_function() {
echo '<input name="general_setting_linkedin" id="general_setting_linkedin" type="text" value="'. get_option('general_setting_linkedin') .'" />';
}
function general_setting_booktickets_callback_function() {
echo '<input name="general_setting_booktickets" id="general_setting_booktickets" type="text" value="'. get_option('general_setting_booktickets') .'" />';
}
function general_setting_bookparties_callback_function() {
echo '<input name="general_setting_bookparties" id="general_setting_bookparties" type="text" value="'. get_option('general_setting_bookparties') .'" />';
}
// ————— END Add Settings to General Settings—————–


// START : Show custom breadcrumb, based on http://wordpress.org/extend/plugins/really-simple-breadcrumb/

function cw_breadcrumb() {
    global $post;
    echo '<div class="breadcrumb"><span>You are here:</span> <ul>';
	if (!is_front_page()) {
		echo '<li><a href="/" title="Home">Home</a></li>';
		if ( is_category() || is_single() ) {
				echo "<li>";
				the_category(', ');
				echo "</li>";
			if ( is_single() ) {
				echo "<li>";
				the_title();
				echo "</li>";
			}
		} elseif ( is_page() && $post->post_parent ) {
			$home = get_page_by_title('home');
			for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
				if (($home->ID) != ($post->ancestors[$i])) {
					echo '<li><a href="';
					echo get_permalink($post->ancestors[$i]); 
					echo '">';
					echo get_the_title($post->ancestors[$i]);
					echo "</a></li>";
				}
			}
			echo "<li>";
			echo the_title();
			echo "</li>";
		} elseif (is_page()) {
			echo "<li>";
			echo the_title();
			echo "</li>";
		} elseif (is_404()) {
			echo "404";
		}
	} else {
		bloginfo('name');
	}
	echo '</ul></div>';
}
// END : custom breadcrumb

// page navigation

if(!function_exists('get_post_top_ancestor_id')){
/**
 * Gets the id of the topmost ancestor of the current page. Returns the current
 * page's id if there is no parent.
 * 
 * @uses object $post
 * @return int 
 */
function get_post_top_ancestor_id(){
    global $post;
    
    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    
    return $post->ID;
}} 


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// .. CW Functions







// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security 

?>