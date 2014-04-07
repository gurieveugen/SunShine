<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
		<div class="text-area">
			<p>Why Sunshine? Let us explain our 12 points of <img src="<?php echo TDU; ?>/images/text-loving.png"  alt="Lowing"> our customers.</p>
			<a href="/about-us/what-you-can-expect/" class="btn-more">learn more »</a>
		</div>
		<div class="service-area">
			<?php echo get_all_blocks(); ?>			
		</div>
		<div class="info-box">
			<p>Need more info or to schedule a service? Give us a call at <?php echo get_option('s_phone')?></p>
		</div>
	</div>
	<footer id="footer">
		<div class="footer-holder">
			<div class="footer-left">
				<h3>quick LINKS</h3>
				<?php wp_nav_menu( array(
					'container' => 'nav',
					'container_class' => 'footer-nav',
					'theme_location' => 'bottom_nav'
				)); ?>
			</div>
			<div class="footer-area">
				<h1>Home of the 2 year warranty!</h1>
				<div class="text">
					<p>Should anything we fix for you fail or break within two years under normal use, we’ll will fix or repair it at absolutely no additional charge to you! *Restrictions apply. <a href="/our-guarantee/">Learn More »</a></p>
				</div>
				<h5>Sunshine Plumbing, Heating, and Air is a Woman Owned Business</h5>
				<ul class="logo-row">
					<?php
					if(is_active_sidebar("logo-row"))
					{
						dynamic_sidebar('logo-row');
					}
					?>					
				</ul>
				<div class="clearfix">
					<ul class="socials-row">
						<li>Connect with us</li>
						<li class="twitter"><a href="https://twitter.com/denverheating" target="_blank"><img src="<?php echo TDU; ?>/images/ico-twitter.png" alt="twitter"></a></li>
						<!--<li class="instagram"><a href="#" target="_blank"><img src="<?php echo TDU; ?>/images/ico-instagram.png" alt="instagram"></a></li> -->
						<li class="facebook"><a href="https://www.facebook.com/pages/Sunshine-Plumbing-Heating-Air/190429197636317" target="_blank"><img src="<?php echo TDU; ?>/images/ico-facebook.png" alt="Facebook"></a></li>
						<!-- <li class="youtube"><a href="#" target="_blank"><img src="<?php echo TDU; ?>/images/ico-youtube.png" alt="YouTube"></a></li> -->
					<!--	<li class="blogger"><a href="#" target="_blank"><img src="<?php echo TDU; ?>/images/ico-blogger.png" alt="blogger"></a></li> -->
						<!-- <li class="foursquare"><a href="#" target="_blank"><img src="<?php echo TDU; ?>/images/ico-foursquare.png" alt="foursquare"></a></li> -->
					</ul>
					<p class="copy">© 2013 Sunshine Plumbing Heating, and Air. All rights reserved.</p>
				</div>
				
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>