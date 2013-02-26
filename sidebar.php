<?php ?>

<section role="complementary" class="single-right">
    <?php if (!function_exists('dynamic_sidebar')
            || !dynamic_sidebar()) :
        ?>
    <?php endif; ?>
<?php if (in_category('1')) { ?>  
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
<?php if (in_category('4')) { ?>    

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

    

        <div class="signup">
        <form id="ccsfg2" name="ccsfg" method="post" action="">
            <p><strong>Enter Email Address</strong><br />To receive offers, info, news &amp; more!</p>
            <!-- ########## Email Address ########## -->
            <input type="email" name="EmailAddress" value="" id="EmailAddress2" style="float:left;" />
            <!-- ########## Contact Lists ########## -->
            <input type="hidden"  checked="checked"  value="Hobbledown" name="Lists[]" id="list_Hobbledown" />
            <button type="submit" name="signup" id="signup2" style="float:right; margin-right:10px;">Sign up!</button>
        </form>	<?php $signup_form = TRUE; ?>
        </div>
        <div class="single-right-btm"></div>
</section>


