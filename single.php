<?php get_header(); ?>
<div class="full-top"></div>
<section class="full" role="main">
	<div class="inner-main">
		
		<?php cw_breadcrumb(); ?>
		
		<?php get_sidebar(); ?>

				
			
				
				<article class="main left-surround" id="post-<?php the_ID(); ?>">
						<div class="left-surround-top"></div>
						<div class="left-surround-inner">
				
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
					    <hgroup>
					        <h1><?php the_title(); ?></h1>
					    </hgroup>
					    <p class="entry-meta">Posted: <time datetime="<?php the_date('Y-m-d', '', ''); ?>" pubdate><?php the_time('jS F Y \a\t g:ia') ?></time></p>
					    
					        
					         
					        			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
					        
					                    
					                    
					                    
					                    <?php if(has_post_thumbnail()) { ?>
					                         
					                         
					                    <div class="archive-thumb">    
					                        <?php the_post_thumbnail("newsthumb"); ?>
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
					                    
					                    <?php the_content(); ?>
					                    
					                    <p class="posted-in">Posted In: <strong>
					                    <?php 
					                    $category = get_the_category(); 
					                    if($category[0]){
					                    echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[1]->cat_name.'</a>';
					                    }
					                    ?>
					                    </strong></p>
					                    <div class="single-addthis">
					                    	<div class="addthis_toolbox addthis_default_style ">
						                    	<a class="addthis_button_facebook_like" fb:like:layout="button_count" addthis:url="<?php the_permalink(); ?>"></a>
						                    	<a class="addthis_button_tweet" addthis:url="<?php the_permalink(); ?>"></a>
						                    	<a class="addthis_button_google_plusone" g:plusone:size="medium" addthis:url="<?php the_permalink(); ?>"></a>
					                    	</div>
					                    </div>
					                    
					        </div>
					        
					                  
			
					<?php endwhile; ?>
					
					
					</article>
					
					
					
					
					<?php if ( ( in_category('4')) && ($eventExists) ) { ?>   
					 <div class="event-detail">
					 	<aside class="book-tickets">
					 		<a href="<?php echo get_option('general_setting_booktickets');?>" title="Book Tickets Online"><h2>Book <span>Tickets Online</span></h2></a>
					 	</aside>
					 	<div class="event-col left">
					 		<?php echo get_post_meta($post->ID, 'eventdetailsdate', true) ?>
					 		<span><?php echo get_post_meta($post->ID, 'eventdetailsmonth', true) ?>
					 		<?php echo get_post_meta($post->ID, 'eventdetailsyear', true) ?></span>
					 	</div>
					 	<div class="event-col">
						 	<?php echo get_post_meta($post->ID, 'eventdetailstime', true) ?>
						 	<span><?php echo get_post_meta($post->ID, 'eventdetailsampm', true) ?></span>
					 	</div>
					 </div>
					<?php } ?>
					
				 <?php if ( in_category('1')) { ?>    
				 	<div class="comments-surround">
				 		<div class="comments-top"></div>
				 		<div class="comments-inner">
				 			 <?php comments_template( '', true ); ?>
				 		</div>
				 		<div class="comments-btm"></div>
				  </div>
				 <?php } ?>
			</div>
			<div class="pagination single">
				<ul>
					<?php if ( ( in_category('4')) && ($eventExists) ) { ?>   
						<li class="page_info"><a href="<?php get_site_url(); ?>/events/" href="Back to Events">&laquo; Back To List</a></li>
					<?php } else { ?>
						<li class="page_info"><a href="<?php get_site_url(); ?>/news/" href="Back to News">&laquo; Back To List</a></li>
					<?php } ?>
				</ul>
			</div>
		</section>
		

<?php get_footer(); ?>