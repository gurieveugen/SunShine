<?php
/**
 * @package WordPress
 * @subpackage Base_theme
 */
?>
<?php if ( is_active_sidebar('Right Sidebar') ) : ?>
<div id="sidebar">
<span style="text-align: center;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	<script type="text/javascript" src="http://www.angieslist.com/webbadge/insertwebbadge.js?bid=fc70f185543c0994c59ef28c8d260a7d"></script>	<script type="text/javascript">if (BADGEBOX) BADGEBOX.PlaceBadge();</script></span><br /><br />
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
	<!-- <ul class="left-nav">
		<li><a href="#">Water Heaters »</a></li>
		<li><a href="#">Sump Pumps »</a></li>
		<li><a href="#">Pressure Problems »</a></li>
		<li><a href="#">Toilets »</a></li>
		<li><a href="#">Furnaces and Boilers »</a></li>
		<li><a href="#">Air Conditioners »</a></li>
	</ul> -->
</div>
<?php endif; ?>