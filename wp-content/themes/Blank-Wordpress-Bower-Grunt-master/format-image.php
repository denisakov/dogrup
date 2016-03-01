<?php
/**
 * This file is runs as the image post format.
 *
 * @package
 */
?>

<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>

	<!-- Get our featured image -->
	<?php get_template_part('format','post_thumbnail'); ?>

	<header class="post-header">
		<h1>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h1>
	</header>
	
	
	<div class="image-entry entry">
		<!-- themetacular_the_content makes 'read more' default -->
		<?php themetacular_the_content(); ?>
	</div>

	<!-- Load the comments template if single -->
	<?php load_comment_template(); ?>
	
	
</article> <!-- .post -->
