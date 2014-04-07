<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php 
	$title = wp_title( ' ', false, 'right' ); 
if(empty($title))
{
  $title = "Home";
}
echo get_bloginfo("name")." | ".$title;
?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='<?php bloginfo("template_url")?>/css/bootstrap.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	<script src="<?php echo TDU; ?>/js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo TDU; ?>/js/jquery.main.js"></script>
	<script src="<?php echo TDU; ?>/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo TDU; ?>/js/pie.js"></script>
		<script src="<?php echo TDU; ?>/js/init-pie.js"></script>
		<script src="<?php echo TDU; ?>/js/html5.js"></script>
	<![endif]-->
	<!--[if lte IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.placeholder.js"></script>
		<script type="text/javascript">
			 $(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	<script>
	jQuery(function() {
		jQuery('.slider').carousel();
	});	
	</script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-2601663-38', 'sunshineplumbingheating.com');
  ga('send', 'pageview');
  </script>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<header id="header">
			<?php if(is_front_page()): ?>
				<h1 class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<?php else: ?>
				<strong class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></strong>
			<?php endif; ?>
			<div class="header-area">
				<div class="top-row">
					<!--COMMENTING OUT EMERGENCY SERVICES <a href="/emergency-services" class="btn-yellow">NEED EMERGENCY SERVICE? »</a> -->
					<p class="phone">&nbsp;&nbsp;&nbsp;Contact us to schedule a plumbing or HVAC service:<span style="color: #005195; font-size: 27px;"> <?php echo get_option('s_phone')?></span></p>
				</div>
				<?php wp_nav_menu( array(
					'container' => 'nav',
					'container_id' => 'nav',
					'theme_location' => 'primary_nav'
				)); ?>
			</div>
		</header>
		<div class="visual">
			<ul class="slider" id="carousel-example-generic">
				<?php echo implode( "", get_all_carousel_items()); ?>				
			</ul>
			<a href="#carousel-example-generic" data-slide="prev" class="prev">previous</a>
			<a href="#carousel-example-generic" data-slide="next" class="next">next</a>
		</div>
