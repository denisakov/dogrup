<?php
/**
 * This file is runs as the video post format.
 *
 * @packaga
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<!-- Add the featured image if any -->
	<?php get_template_part('format','post_thumbnail'); ?>

	<!-- Wrap the title in a header tag -->
	<header class="post-header">
		<h1>
			<a href="<?php the_permalink() ?>">
				<?php the_title(); ?>
			</a>
		</h1>
	</header>

	<!-- Get our post meta -->
	<?php get_template_part('format','meta'); ?>

	<!-- Get the content for our video post -->
	<div class="video-entry entry">

		<!-- themetacular_the_content makes 'read more' default -->
		<?php themetacular_the_content(); ?>
		
	</div>

	<!-- Load the comments template -->
	<?php load_comments_template(); ?>

</article>