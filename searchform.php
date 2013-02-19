<?php
/**
 *
 * @package WordPress
 * @subpackage Hobbledown
 * @since Hobbledown 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
		<?php if ( in_category('1')) { ?>    
			<input type="text" class="field" name="s" id="s" placeholder="Search News" />
		<?php } else if ( in_category('4')) { ?>    
			<input type="text" class="field" name="s" id="s" placeholder="Search Events" />
		<?php } else { ?>    
			<input type="text" class="field" name="s" id="s" placeholder="Search" />
		<?php } ?>
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
	</form>
