<?php 
/**
	Template Name: Contact Map
 *
 * @package WordPress
 * @subpackage Hobbledown
 * @since Hobbledown 1.0
 */
 
 get_header(); ?>
<div class="full-top"></div>
<section class="full" role="main">
	<div class="inner-main">
		
		<?php cw_breadcrumb(); ?>
		
		
	
				
		
	
		<nav class="browse">
			<h4>Browse</h4>
			<ul>
			    <?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
			    <?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
			</ul>
                         <h4 class="spacer">Signup</h4>
                        <div class="signup">
                            <p><strong>Enter Email Address</strong><br />To receive offers, info, news &amp; more!</p>
                            <form id="ccsfg2" name="ccsfg" method="post" action="">
				<!-- ########## Email Address ########## -->
				<input type="email" name="EmailAddress" value="" id="EmailAddress2" /><br />
				<!-- ########## Contact Lists ########## -->
				<input type="hidden"  checked="checked"  value="Hobbledown" name="Lists[]" id="list_Hobbledown" />
				<button type="submit" name="signup" id="signup2">Sign up!</button>
				</form>	<?php $signup_form = TRUE; ?>
                        </div>
		</nav>
		
		
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBo6WTgBrJHm1fiZP63CTCuGqr62o7tdVQ&sensor=false"></script>
		
		<script>
		  	        function initialize() {
		  	            var myOptions = {
		  	                zoom: 16,
		  	                center: new google.maps.LatLng(<?php echo get_post_meta($post->ID, 'contactlat', true) ?>, <?php echo get_post_meta($post->ID, 'contactlong', true) ?>),
		  	                mapTypeId: google.maps.MapTypeId.ROADMAP
		  	            }
		  	            var map = new google.maps.Map(document.getElementById("map"), myOptions);
		  	            var image = '<?php echo bloginfo('template_directory'); ?>/assets/img/map-icon.png';
		  	            var myLatLng = new google.maps.LatLng(<?php echo get_post_meta($post->ID, 'contactlat', true) ?>, <?php echo get_post_meta($post->ID, 'contactlong', true) ?>);
		  	            var beachMarker = new google.maps.Marker({
		  	                position: myLatLng,
		  	                map: map,
		  	                icon: image
		  	            });
		  	        } 
		  	    
		  	google.maps.event.addDomListener(window, 'load', initialize);
		  	
		   </script>
		  <div class="thumb-right">
		  	<div id="map"></div>
		  </div>			
		
		
	
		<article class="main right">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		            <h1><?php the_title(); ?></h1>
		    
			        <?php the_content(); ?>
			        
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
	
			<?php endwhile; ?>
			
			</article>
		
	</div>
</section>
<?php get_footer(); ?>
