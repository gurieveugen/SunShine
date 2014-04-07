<?php
/**
 * @package WordPress
 * @subpackage Base_theme
 */
?>
<?php if ( is_active_sidebar('Right Sidebar') ) : ?>
<div id="sidebar">
	<a style="width: 125px; margin: 0 auto; display: block; position: relative; left: -15px;" target="_new" href="http://www.angieslist.com/companylist/us/co/denver/sunshine-plumbing-heating-air-reviews-6420880.aspx?cid=ssabadge">
		<img style="border:0;" alt="DENVER heating &amp; air conditioning/hvac" src="http://www.angieslist.com/webbadge/fc70f185543c0994c59ef28c8d260a7d.png">
	</a>	
	
	<br>
	<br>
	<h4>We’re here for you.</h4>
	<div class="text-hoder">
		<p>We haven’t met a plumbing, heating or air problem we couldn’t fix. Give us a call. We can help!</p>
	</div>
	<?php
	if(is_active_sidebar("left-nav"))
	{
		dynamic_sidebar('left-nav');
	}
	?>		
</div>
<?php endif; ?>