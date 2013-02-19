<?php get_header(); ?>
<div class="full-top"></div>
<section class="full" role="main">
	<div class="inner-main">
		
		<?php cw_breadcrumb(); ?>
		
		
		<?php get_sidebar(); ?>

	
		
<?php
	if ( have_posts() )
		the_post();
?>
   
    <article class="main">

			<h1>
				<?php single_cat_title('Latest '); ?>
			</h1>
			<p>
				<?php echo category_description(); ?>
			</p>

			

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archives.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'archive' );
?>
    </article>
    
    
	</div>
</section>
<?php get_footer(); ?>
