<?php
/**
 * This file is runs as the status post format.
 *
 * @package
 */
?>

<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>

	<?php get_template_part('format','post_thumbnail'); ?>
	

	<!-- Wrap the title etc in a header for html5 goodness -->
	<header class="post-header">
		<h1>
			<a href="<?php the_permalink() ?>">
				<?php the_title(); ?>
			</a>
		</h1>
	</header>

	<!-- Get the content for out post -->
	<div class="status-entry entry">
		<!-- themetacular_the_content makes 'read more' default -->
		<?php themetacular_the_content(); ?>
	</div>

	<!-- Load the comments template -->
	<?php themetacular_load_comments_template(); ?>

	
</article> <!-- .post -->
