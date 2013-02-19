<?php ?>

<section role="complementary" class="single-right">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
<?php endif; ?>
<?php if ( in_category('1')) { ?>  
<div class="title">Categories</div> 
<ul>	
	<?php wp_list_categories('orderby=id&show_count=0&use_desc_for_title=0&child_of=1&title_li='); ?>
</ul>
<div class="single-right-btm"></div>
<div class="title">News Archive</div> 
<ul>	
	 <?php wp_get_archives('cat=1'); ?>
</ul>
<div class="single-right-btm"></div>

<?php } ?>
<?php if ( in_category('4')) { ?>    
	
<div class="title">Categories</div> 
<ul>	
	<?php wp_list_categories('orderby=id&show_count=0&use_desc_for_title=0&child_of=4&title_li='); ?>
</ul>
<div class="single-right-btm"></div>
<div class="title">Events Archive</div> 
<ul>	
	 <?php wp_get_archives('cat=4'); ?>
</ul>
<div class="single-right-btm"></div>

<?php } ?>
</section>


