<?php 
/**
	Template Name: FAQ - Landing
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
		
		
	
				
		
	
		<nav class="browse right">
			<h4><?php the_title(); ?></h4>
			<?php
			$has_subpages = false;
			// Check to see if the current page has any subpages
			$children = wp_list_pages('&child_of='.$post->ID.'&echo=0');
			if($children) {
			    $has_subpages = true;
			}
			// Reseting $children
			$children = "";
			
			// Fetching the right thing depending on if we're on a subpage or on a parent page (that has subpages)
			if(is_page() && $post->post_parent) {
			    // This is a subpage
			    $children .= wp_list_pages("title_li=&child_of=".$post->ID ."&echo=0");
			    //$children .= wp_list_pages("title_li=&child_of=".$post->post_parent ."&echo=0");
			} else if($has_subpages) {
			    // This is a parent page that have subpages
			    
			}
			?>
			<?php // Check to see if we have anything to output ?>
			<?php if ($children) { ?>
				<ul>
				    <?php echo $children; ?>
				</ul>
			<?php } ?>
		</nav>
		
		
		<?php if(has_post_thumbnail()) { ?>
				
			<div class="thumb-left">
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
		
		
		
	
		<article class="main left">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		    
			        <?php the_content(); ?>
			        
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
	
			<?php endwhile; ?>
			
			</article>
			
			<aside class="left-surround">
				<div class="left-surround-top"></div>
				<ul>
					<?php $pages = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=asc&parent='.$post->ID);
					$count = 0;
					foreach($pages as $page)
					{
						$content = $page->post_content;
					?>
					<li>
						<a href="<?php echo get_page_link($page->ID) ?>"><h3><?php echo $page->post_title ?></h3></a>
						<a class="btn-view" href="<?php echo get_page_link($page->ID) ?>">View</a>
					</li>
					<?php } ?>
				</ul>
			</aside>
		
	</div>
</section>
<?php get_footer(); ?>
