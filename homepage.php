<?php
/**
  Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Hobbledown
 * @since Hobbledown 1.0
 */
get_header();
?>

<div class="full-top"></div>
<section class="full">
    <div class="gallery-show flexslider">
        <ul class="slides">
            <?php
            $args = array(
                'post_type' => 'banner',
                'posts_per_page' => '10'
            );
            query_posts($args);
            ?>
            <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                    <li><?php the_post_thumbnail("homebanner"); ?></li>
    <?php endwhile; wp_reset_query(); ?>	
        </ul>
    </div>
    <aside class="book-tickets">
        <a href="<?php echo get_option('general_setting_booktickets'); ?>" title="Book Tickets Online"><h2>Book <span>Tickets Online</span></h2></a>
    </aside>
    <aside class="times">
        <a href="<?php get_site_url(); ?>/plan-your-visit/opening-times-membership-and-day-ticket-prices/" title="Times Membership &amp; Prices"><h2>Times <span class="medium">Membership</span> <span>&amp; Prices</span></h2></a>
    </aside>
    <div class="home-connect">
        <div class="wrapper">
            <div class="footer-email">
                <h5>Enter Email Address <span>Receive Offers, Information, News &amp; More!</span></h5>
                <form id="ccsfg" name="ccsfg" method="post" action="">
                    <!-- ########## Email Address ########## -->
                    <input type="email" name="EmailAddress" value="" id="EmailAddress" /><br />
                    <!-- ########## Contact Lists ########## -->
                    <input type="hidden"  checked="checked"  value="Hobbledown" name="Lists[]" id="list_Hobbledown" />
                    <button type="submit" name="signup" id="signup">Sign up!</button>
                </form>		
            </div>
            <div class="footer-social">
                <h5>Connect With Us <span>Never A Magical Moment Missed.</span></h5>
                <a class="footer-tw" href="https://twitter.com/#!/<?php echo get_option('general_setting_twitter'); ?>" title="Find us on Twitter">Twitter</a><a class="footer-fb" href="<?php echo get_option('general_setting_facebook'); ?>" title="Find us on Facebook">Facebook</a>
                <div class="footer-links">
                    <div class="addthis_toolbox addthis_default_style ">
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count" addthis:url="http://www.facebook.com/Hobbledownuk"></a>
                        <a class="addthis_button_tweet" addthis:url="<?php echo get_site_url(); ?>/"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>	

    <div class="inner">
        <div class="home-divide">
            <h3 class="left"><a href="<?php get_site_url(); ?>/events/" title="Events">Events</a></h3>
            <h3 class="right"><a href="<?php get_site_url(); ?>/news/" title="News">News</a></h3>
        </div>


        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => '2',
            'cat' => '4'
        );
        query_posts($args);
        ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

                <aside class="home-summary">
                    <a href="<?php the_permalink() ?>" title="Read more about <?php the_title() ?>"><?php the_post_thumbnail("homethumb") ?></a>
                    <h4><a href="<?php the_permalink() ?>" title="Read more about <?php the_title() ?>"><?php the_title() ?></a></h4>
        <?php the_excerpt(); ?>
                    <time class="date" datetime="<?php the_date('Y-m-d', '', ''); ?>" pubdate><?php the_time('D jS F') ?></time>
                    <a class="readmore" href="<?php the_permalink() ?>" title="Read more about <?php the_title() ?>">&nbsp;Read more</a>
                </aside>

    <?php endwhile; wp_reset_query(); ?>	



        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => '2',
            'cat' => '1'
        );
        query_posts($args);
        ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

                <aside class="home-summary">
                    <a href="<?php the_permalink() ?>" title="Read more about <?php the_title() ?>"><?php the_post_thumbnail("homethumb") ?></a>
                    <h4><a href="<?php the_permalink() ?>" title="Read more about <?php the_title() ?>"><?php the_title() ?></a></h4>
        <?php the_excerpt(); ?>
                    <time class="date" datetime="<?php the_date('Y-m-d', '', ''); ?>" pubdate><?php the_time('D jS F') ?></time>
                    <a class="readmore" href="<?php the_permalink() ?>" title="Read more about <?php the_title() ?>">&nbsp;Read more</a>
                </aside>

            <?php endwhile; wp_reset_query(); ?>	
    </div>
    <article>
        <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    <?php endwhile; ?>
        <a class="home-more" href="<?php get_site_url(); ?>/plan-your-visit/">More Information</a>
    </article>
</section>

</div>

<?php get_footer(); ?>