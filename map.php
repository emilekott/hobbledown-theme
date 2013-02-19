<?php 
/**
	Template Name: Interactive Map
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
		
	
		<article class="main">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		            <h1><?php the_title(); ?></h1>
		    
			        <?php the_content(); ?>
			     <div id="viewport-surround">   
			        <div id="viewport"> 
			            <div style="background: url(<?php echo bloginfo('template_directory'); ?>/assets/img/map/layer/1.jpg) no-repeat; width: 910px; height: 371px;"> 
			                <!--top level map content goes here--> 
			                <a style="margin: 205px 0 0 340px;" rel="1" href="#">1</a>
			                <a style="margin: 186px 0 0 244px;" rel="3" href="#">2</a>
			                <a style="margin: 224px 0 0 190px;" rel="6" href="#">3</a>
			                <a style="margin: 202px 0 0 790px;" rel="8" href="#">4</a>
			                <a style="margin: 196px 0 0 828px;" rel="12" href="#">5</a>
			                <a style="margin: 198px 0 0 80px;" rel="13" href="#">6</a>
			                <a style="margin: 143px 0 0 740px;" rel="16" href="#">7</a>
			                <a style="margin: 158px 0 0 824px;" rel="17" href="#">8</a>
			                <a style="margin: 97px 0 0 402px;" rel="19" href="#">9</a>
			                <a style="margin: 189px 0 0 520px;" rel="22" href="#">10</a>
			                <a style="margin: 170px 0 0 794px;" rel="25" href="#">11</a>
			            </div> 
			            <div style="height: 557px; width: 1365px;">
			                <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/map/layer/2.jpg" alt="" /> 
			                <div class="mapcontent layer2"> 
			                    <a style="margin: 308px 0 0 512px;" rel="1" href="#">1</a>
			                    <a style="margin: 280px 0 0 367px;" rel="3" href="#">2</a>
			                    <a style="margin: 337px 0 0 286px;" rel="6" href="#">3</a>
			                    <a style="margin: 304px 0 0 1190px;" rel="8" href="#">4</a>
			                    <a style="margin: 295px 0 0 1247px;" rel="12" href="#">5</a>
			                    <a style="margin: 298px 0 0 120px;" rel="13" href="#">6</a>
			                    <a style="margin: 215px 0 0 1115px;" rel="16" href="#">7</a>
			                    <a style="margin: 238px 0 0 1241px;" rel="17" href="#">8</a>
			                    <a style="margin: 146px 0 0 603px;" rel="19" href="#">9</a>
			                    <a style="margin: 285px 0 0 783px;" rel="22" href="#">10</a>
			                    <a style="margin: 258px 0 0 1191px;" rel="25" href="#">11</a>
			                </div> 
			            </div>
			            <div style="height: 742px; width: 1820px;"> 
			                <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/map/layer/3.jpg" alt="" /> 
			                 <div class="mapcontent layer3"> 
			               		 <a style="margin: 410px 0 0 680px;" rel="1" href="#">1</a>
			               		 <a style="margin: 372px 0 0 488px;" rel="3" href="#">2</a>
			               		 <a style="margin: 448px 0 0 380px;" rel="6" href="#">3</a>
			               		 <a style="margin: 404px 0 0 1580px;" rel="8" href="#">4</a>
			               		 <a style="margin: 392px 0 0 1656px;" rel="12" href="#">5</a>
			               		 <a style="margin: 396px 0 0 160px;" rel="13" href="#">6</a>
			               		 <a style="margin: 286px 0 0 1480px;" rel="16" href="#">7</a>
			               		 <a style="margin: 316px 0 0 1648px;" rel="17" href="#">8</a>
			               		 <a style="margin: 194px 0 0 805px;" rel="19" href="#">9</a>
			               		 <a style="margin: 378px 0 0 1040px;" rel="22" href="#">10</a>
			               		 <a style="margin: 348px 0 0 1598px;" rel="25" href="#">11</a>
			                </div> 
			            </div>
			        </div> 
			    </div>    
			        <div class="map-control">
			           <a href="#zoom" class="zoom">Zoom In</a>
			           <span id="zoomoutput"></span>
			           <a href="#zoom_out" class="back">Zoom Out</a>
			         </div>
			        <div id="viewportkey">
			        	<ul class="first">
			        		<li><a rel="1" href="#"><span>1</span> Crystallite Mine</a></li>
			        		<li><a rel="3" href="#"><span>2</span> Hobbledown Village</a></li>
			        		<li><a rel="6" href="#"><span>3</span> High Hobblers</a></li>
			        		<li><a rel="8" href="#"><span>4</span> The Hobblings Play Barn</a></li>
			        	</ul>
			        	<ul class="second">
			        		<li><a rel="12" href="#"><span>5</span> Hobnosh Restaurant</a></li>
			        		<li><a rel="13" href="#"><span>6</span> The Field of Confusion</a></li>
			        		<li><a rel="26" href="#"><span>7</span> Party Cottages</a></li>
			        		<li><a rel="17" href="#"><span>8</span> Bundles Barn</a></li>
			        	</ul>
			        	<ul class="third">
			        		<li><a rel="19" href="#"><span>9</span> Quercus Oak nic-pic spot</a></li>
			        		<li><a rel="22" href="#"><span>10</span> Wanderers Field</a></li>
			        		<li><a rel="25" href="#"><span>11</span> Hobbledown Market</a></li>
			        	</ul>
			        </div>
			        
			        <div id="maplink">
			        	<a class="btn downloadmap" href="<?php echo get_post_meta($post->ID, 'maplocation', true) ?>" title="Download the map">Download the map</a>
			        </div>
			        
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
	
			<?php endwhile; ?>
			
			</article>
		
	</div>
</section>




<?php get_footer(); ?>
