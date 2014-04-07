<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>
<div id="content" class="site-content" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<ul class="breadcrumbs">
			<?php echo get_the_breadcrumb();?>
			</ul>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div>
		</div>
		<div id="nav-below" class="navigation nav-single">
			<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous Post', 'theme' ) ); ?></span>
			<span class="nav-next"><?php next_post_link( '%link', __( 'Next Post <span class="meta-nav">&rarr;</span>', 'theme' ) ); ?></span>
		</div>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
