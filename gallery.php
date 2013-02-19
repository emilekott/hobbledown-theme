<?php 
/**
	Template Name: Gallery - Landing
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
	
		<nav class="browse">
			<h4>Browse</h4>
			<ul>
			    <?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
			    <?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
			</ul>
		</nav>
		
		<article class="main right">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		            <h1><?php the_title(); ?></h1>
		    
			        <?php the_content(); ?>
			        
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
	
			<?php endwhile; ?>
			
			</article>
			
			<article class="main right galleryarticle">
			<?php $pages = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=asc&parent='.$post->ID);
			$count = 0;
			foreach($pages as $page)
			{
				$content = $page->post_content;
			?>
			
			<div class="gallery-item">
				<div class="gallery-item-inner">
					<a href="<?php echo get_page_link($page->ID) ?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?></a>
					<a href="<?php echo get_page_link($page->ID) ?>"><h2><?php echo $page->post_title ?></h2></a>
				</div>
				<div class="gallery-btm"><a href="<?php echo get_page_link($page->ID) ?>">View All</a></div>
			</div>
			
			<?php } ?>
			</article>
		
	</div>
</section>
<?php get_footer(); ?>
