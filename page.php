<?php get_header(); ?>

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
                            <form id="ccsfg" name="ccsfg" method="post" action="">
				<!-- ########## Email Address ########## -->
				<input type="email" name="EmailAddress" value="" id="EmailAddress" /><br />
				<!-- ########## Contact Lists ########## -->
				<input type="hidden"  checked="checked"  value="Hobbledown" name="Lists[]" id="list_Hobbledown" />
				<button type="submit" name="signup" id="signup">Sign up!</button>
				</form>	<?php $signup_form = TRUE; ?>
                        </div>
		</nav>
		
		
		<?php if(has_post_thumbnail()) { ?>
				
			<div class="thumb-right">
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
