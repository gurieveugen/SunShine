<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

<?php if ( have_posts() ) : ?>

<div class="posts-holder">
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<h1><a href=" <?php the_permalink(); ?> "><?php the_title(); ?></a></h1>
			<?php 
				if($pos=strpos($post->post_content, '<!--more-->')){
					echo '<div class="entry-content">';
					the_content('');
					echo '</div>';
				}
				else{
					echo '<div class="entry-summary">';
					the_excerpt();
					echo '</div>';
				}
			?>
		</div><!-- .entry-content -->
		<a href="#" class="link-more">Read more</a>
	</article><!-- #post -->

<?php endwhile; ?>
</div> <!-- .post-holder -->
	
<?php theme_paging_nav(); ?>

<?php else: ?>
	
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'theme' ); ?></h1>
	</header>
	
	<div class="page-content">

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'theme' ); ?></p>
		<?php get_search_form(); ?>

	</div><!-- .page-content -->
	
<?php endif; ?>