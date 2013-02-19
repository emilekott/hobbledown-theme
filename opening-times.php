<?php 
/**
	Template Name: Opening Times
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
		
		
	
				
		
	
		
		
		
		<?php if(has_post_thumbnail()) { ?>
				
			<div class="thumb-full">
				<div class="flex-controls"></div>
				<div class="flexslider">
				  <ul class="slides">
					    <li>
						<?php the_post_thumbnail(); ?>
						</li>
						<?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('page', 'feature-image-2')) {
							?>
							<li>
							<? MultiPostThumbnails::the_post_thumbnail('page', 'feature-image-2'); ?>
							</li>
						<? } ?>
						<?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('page', 'feature-image-3')) {
							?>
							<li>
							<? MultiPostThumbnails::the_post_thumbnail('page', 'feature-image-3'); ?>
							</li>
						<? } ?>        
					</ul>
				</div>
			</div>
				
				
		
				<? } ?>
		
		
		
	
		<article class="main">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		            <h1><?php the_title(); ?></h1>
		    
			        <?php the_content(); ?>
			        
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
	
			<?php endwhile; ?>
			
			</article>
			
			<h3 class="opening-heading">Prices</h3>
			
			
			
			
			<nav class="opening-nav tabs">
				<ul>
					<li class="tab-active"><a href="#opening-day" title="Day Tickets">Day Tickets</a></li>
					<li><a href="#opening-annual" title="Annual Pass">Annual Pass</a></li>
					<li><a href="#opening-party" title="Party Prices">Party Prices</a></li>
				</ul>
			</nav>
			
			<div class="tab-container">
				<article class="opening" id="opening-day">
					<?php $args = array(
						'post_type' => 'opening',
						'p' => '162',
						'posts_per_page' => '1'
					);
					query_posts( $args );
					 ?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; wp_reset_query(); ?>	
				</article>
				<article class="opening" id="opening-annual">
					<?php $args = array(
						'post_type' => 'opening',
						'p' => '163',
						'posts_per_page' => '1'
					);
					query_posts( $args );
					 ?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						 <?php the_content(); ?>
					<?php endwhile; wp_reset_query(); ?>	
				</article>
				<article class="opening" id="opening-party">
					<?php $args = array(
						'post_type' => 'opening',
						'p' => '164',
						'posts_per_page' => '1'
					);
					query_posts( $args );
					 ?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; wp_reset_query(); ?>	
				</article>
			</div>
			
			<div class="btn-buy">
				<a href="<?php echo get_option('general_setting_booktickets');?>" title="Buy your tickets now!">Buy your tickets now!</a>
			</div>
	</div>
</section>
<?php get_footer(); ?>
