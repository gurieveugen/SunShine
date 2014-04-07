<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>
<div id="main">
	<div id="twocolumns">
		<div id="content" class="home">
		<?php while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'theme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

		<?php endwhile; ?>
		</div>
		<div class="aside">
			<div class="form-area">
				<?php
				if(is_active_sidebar("right-sidebar"))
				{
					dynamic_sidebar('right-sidebar');
				}
				?>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
