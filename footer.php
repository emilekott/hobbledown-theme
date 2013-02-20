<?php if ( is_front_page() ) { ?>
<?php } else { ?>
	<div class="full-btm"></div>		
<?php } ?>


</div>



<div class="footer-advert">
	<div class="wrapper">
		<div class="parties">
		<a href="<?php echo get_option('general_setting_bookparties');?>" title="Parties At Hobbledown BOOK NOW!">Parties At Hobbledown <span>BOOK NOW!</span></a>
		</div>
		<div class="annual-pass">
			<a href="<?php echo get_option('general_setting_booktickets');?>" title="Come Here Often? SAVE WITH AN ANNUAL PASS">Come Here Often? <span>SAVE WITH AN ANNUAL PASS</span></a>
		</div>
	</div>
</div>
<div class="footer-surround">	

<div class="footer-connect"><?php if (!is_front_page()){ ?>
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
			<a class="footer-tw" href="https://twitter.com/#!/<?php echo get_option('general_setting_twitter');?>" title="Find us on Twitter">Twitter</a><a class="footer-fb" href="<?php echo get_option('general_setting_facebook');?>" title="Find us on Facebook">Facebook</a>
			<div class="footer-links">
				<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count" addthis:url="http://www.facebook.com/Hobbledownuk"></a>
					<a class="addthis_button_tweet" addthis:url="<?php echo get_site_url(); ?>/"></a>
				</div>
			</div>
		</div>
	</div><?php } ?>
</div>	

	<footer>
		<div class="wrapper">
			
			<ul>
				<li><span class="footer-title">Browse</span>
					<?php $args = array( 'menu' => 'Footer - Browse', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
				</li>
			</ul>
			<ul>
				<li><span class="footer-title">Useful Links</span>
					<?php $args = array( 'menu' => 'Footer - Useful Links', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
				</li>
			</ul>
			<ul>
				<li><span class="footer-title">Grown Up Stuff</span>
					<?php $args = array( 'menu' => 'Footer - Grown Up Stuff', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
				</li>
			</ul>
			<ul>
				<li><span class="footer-title">Get In Touch</span>
					<ul>
						<li>Tel: <?php echo get_option('general_setting_youtube');?></li>
						<li><a href="mailto:<?php echo get_option('general_setting_linkedin');?>" title="Email us"><?php echo get_option('general_setting_linkedin');?></a></li>
						<li><a class="btn location" href="<?php echo get_site_url(); ?>/plan-your-visit/find-us/" title="Location Map">Location Map</a></li>
					</ul>
				</li>
			</ul>
			<div class="footer-clear">
				<small>&copy; Copyright <?php echo date("Y"); ?> Hobbledown. All Rights Reserved</small>
				<p class="right">
					<a href="http://www.fhoke.com" title="Design + Code by FHOKE" target="_blank">Design + Code by FHOKE</a>
				</p>
			</div>
		</div>
	</footer>
</div>	
	<div class="wrapper">
		<div class="headerover">
			<nav>
				<?php $args = array( 'menu' => 'Main Menu', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
			</nav>
		</div>
	</div>	
	
<?php wp_footer(); ?>
<!--[if lte IE 8]>
		<script src="<?php echo bloginfo('template_directory'); ?>/assets/js/lteie8.js"></script>
<![endif]-->

<script src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fcf2baf6ae0ea4a"></script>
<script>
	var addthis_config = { data_use_cookies:false }
</script>

<?php if ( is_page()  ) { ?>

<div id="popform"></div>
<div class="popform" id="popform-standard">
	<div class="popform-inner contact-form">
		<?php echo do_shortcode( '[contact-form-7 id="209" title="Popup Form - Standard"]' ); ?>
		
	</div>
</div>
<div class="popform" id="popform-school">
	<div class="popform-inner contact-form">
		<?php echo do_shortcode( '[contact-form-7 id="208" title="Popup Form - School"]' ); ?>
	</div>	
</div>

<?php } ?> 

<?php if ( is_page_template( 'map.php' )  ) { ?>
 <div id="mapoverlaypop"></div>
 <div id="mapoverlay">
 	<div id="mapoverlay-inner">
	 	<a id="TB_closeWindow" title="Close Window">Close</a>
	 	<img src="<?php echo bloginfo('template_directory'); ?>/assets/img/map/overlay/1.jpg" alt="A closer look" />
		<p class="mapoverlay-title">A closer look</p>
	</div>
 </div>
 
 <script>
 	blogloc = "<?php echo bloginfo('template_directory'); ?>"
 </script>
 
 <script src="<?php echo bloginfo('template_directory'); ?>/assets/js/plugins/mousewheel.js"></script> 
 <script src="<?php echo bloginfo('template_directory'); ?>/assets/js/plugins/mapbox.js"></script> 
 
 <script> 
     jQuery(document).ready(function() { 
     	 i = 1;
         jQuery("#viewport").mapbox({ 
                     mousewheel: true, 
                     layerSplit: 2//smoother transition for mousewheel 
                 }); 
         jQuery(".map-control a").click(function(e) {
         			e.preventDefault();
                     var viewport = jQuery("#viewport"); 
                     //this.className is same as method to be called 
                     if(this.className == "zoom" || this.className == "back") { 
                     	jQuery('.mapcontent').show();
                         viewport.mapbox(this.className, 2);
                         // update zoomoutput bars
                         if( (this.className == "back") && (i > 1) ) {
                         	i--;
							jQuery('.map-control #zoomoutput').removeClass();
                         	jQuery('.map-control #zoomoutput').addClass("layer"+i);
                         }
                         if( (this.className == "zoom") && (i < 3) ) {
                         	i++;
                         	jQuery('.map-control #zoomoutput').removeClass();
                         	jQuery('.map-control #zoomoutput').addClass("layer"+i);
                         }
                     } 
                     else { 
                         viewport.mapbox(this.className); 
                     } 
                     return false; 
                 }); 
     }); 
 </script> 
 
<?php } ?> 

</body>
</html>