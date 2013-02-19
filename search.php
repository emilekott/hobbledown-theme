<?php get_header(); ?>

<div class="full-top"></div>
<section class="full" role="main">
	<div class="inner-main">
		
			<?php if ( have_posts() ) : ?>
				<article class="main">
			        <h1 class="result-listing"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			        <?php get_template_part( 'loop', 'search' ); ?>
					<?php else : ?>
			            <h1 class="entry-title"><?php _e( 'Nothing Found' ); ?></h1>
			            <article class="entry-content">
			                <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ); ?></p>
			                <?php /*?><?php get_search_form(); ?><?php */?>
			            </article><!-- .entry-content -->
			        <?php endif; ?>
			
			</article>
		
	</div>
</section>
<?php get_footer(); ?>
