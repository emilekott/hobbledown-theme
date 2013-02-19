<?php ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
	<?php if ( ! have_posts() ) : ?>
        <article id="post-0" class="post error404 not-found">
            <h1>
				<?php _e( 'Not Found' ); ?></h1>
                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.' ); ?></p>
                <?php get_search_form(); ?>
        </article>
    <?php endif; ?>
    <?php ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php /* How to display standard posts and search results */ ?>

        <article class="article-archive left-surround" id="post-<?php the_ID(); ?>">
				<div class="left-surround-top"></div>
				<div class="left-surround-inner">
	                    <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	                    </h2>
	                    <p class="entry-meta">Posted: <time datetime="<?php the_date('Y-m-d', '', ''); ?>" pubdate><?php the_time('jS F Y \a\t g:ia') ?></time></p>
	                    
	                    
	                     <?php if(has_post_thumbnail()) { ?>
	                     
	                     
	                <div class="archive-thumb">    
		                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail("newsthumb"); ?></a>
		                <?php if ( in_category('1')) { ?>    
		                	<div class="commentcount"><?php comments_popup_link( __( '0' ), __( '1' ), __( '%' ) ); ?></div>
		                <?php } ?>
		                <?php $eventExists = get_post_meta($post->ID, 'eventdetailsdate', true); ?>    
		                
		                <?php if ( ( in_category('4')) && ($eventExists) ) { ?>   
		                 	<aside class="book-tickets-small">
		                 		<a href="<?php echo get_option('general_setting_booktickets');?>" title="Book Tickets Online">Book Tickets</a>
		                 	</aside>
		                <?php } ?>
	                </div>
	                
	                
	                <?php } ?>
	                
	            
				
				<?php ?>
	                <div class="entry-summary">
	                    <?php the_excerpt(); ?>
	                </div>
	                <a class="btn-readmore" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Read more...</a>
                </div>
				
	
            
		</article>

		<?php comments_template( '', true ); ?>


<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>

<div class="pagination">
	<?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
</div>
