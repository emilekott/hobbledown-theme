<?php ?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6 oldie <?php page_bodyclass(); ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 oldie <?php page_bodyclass(); ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 oldie <?php page_bodyclass(); ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9 oldie <?php page_bodyclass(); ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js <?php page_bodyclass(); ?>" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	?>
</title>
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true); 
	} else {
	bloginfo('name'); echo " - "; bloginfo('description');
	}
?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="icon" type="image/png" href="<?php echo bloginfo('template_directory'); ?>/favicon.png" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo bloginfo('template_directory'); ?>/apple-touch-icon-precomposed.png" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="all" />
	
	<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<?php wp_enqueue_script( 'jquery' ); ?>
<?php
function wp_load_general() {
	wp_enqueue_script(
		'custom-script',
		get_template_directory_uri() . '/assets/js/general.js?v=2',
		array('jquery')
	);
}
add_action('wp_enqueue_scripts', 'wp_load_general');
?>


  

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="<?php echo get_post_meta($post->ID, 'popform', true) ?>">
<div class="tools">
	<div class="wrapper">
	<div class="social">
	<div class="addthis_toolbox addthis_default_style ">
		<a class="addthis_button_facebook_like" fb:like:layout="button_count" addthis:url="http://www.facebook.com/Hobbledownuk"></a>
		<a class="addthis_button_tweet" addthis:url="<?php echo get_site_url(); ?>/"></a>
	</div>
</div>
		<ul class="links">
			<li class="top-expand"><a href="<?php echo get_site_url(); ?>/grown-up-stuff/" title="Grown up stuff" class="grown-expand dropplease-link">Grown up stuff</a> <div class="grown-expanded dropplease-expand"><?php $args = array( 'menu' => 'Grown up Stuff', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?></div></li>
			<li><a href="<?php echo get_site_url(); ?>/feedback/" title="Feedback">Feedback</a></li>
			<li><a href="<?php echo get_site_url(); ?>/plan-your-visit/faqs/" title="FAQ's">FAQ's</a></li>
			<li><a href="<?php echo get_site_url(); ?>/contact-us/" title="Contact Us">Contact Us</a></li>
		</ul>
	</div>
</div>
<div class="full-wrapper">
<div class="moon"></div>
<div class="vine-left"></div>
<div class="vine-right"></div>
<div class="leaves-1"></div>
<div class="leaves-2"></div>
<div class="leaves-3"></div>
<div class="leaves-4"></div>
</div>
<div class="wrapper">
	<header>
		<h1>Hobbledown, On Great Big Adventure</h1>
		
		<?php if ( is_front_page() ) { ?>
			<img class="logo" src="<?php echo bloginfo('template_directory'); ?>/assets/img/logo.png" alt="Hobbledown, One Great Adventure" />
		<?php } else { ?>
		
		<a href="<?php get_site_url(); ?>/" title="Go to our Homepage"><img class="logo" src="<?php echo bloginfo('template_directory'); ?>/assets/img/logo.png" alt="Hobbledown, One Great Adventure" /></a>
		
		<?php } ?>
		
		<a class="book-party" href="<?php echo get_option('general_setting_bookparties');?>" title="Book Your Party">Book Your Party</a>
		<a class="book-tickets" href="<?php echo get_option('general_setting_booktickets');?>" title="Book Your Tickets">Book Your Tickets</a>
		<nav>
				<?php $args = array( 'menu' => 'Main Menu', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
		</nav>
	</header>
	<div class="useful-links">
		<a class="dropplease-link" href="#" title="Useful Links">Useful Links</a>
		<div class="useful-expanded dropplease-expand"><?php $args = array( 'menu' => 'Useful Links', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?><div class="dropplease-expand-btm"></div></div>
	</div>

	
