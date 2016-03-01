<?php
/**
 * This file is runs as the link post format.
 *
 * @packaga
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
	<!-- Add the featured image if any -->
	<?php get_template_part('format','post_thumbnail'); ?>

	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

	<!-- Get our post meta -->
	<?php get_template_part('format','meta'); ?>

	<div class="link-entry entry">

		<!-- themetacular_the_content makes 'read more' default -->
		<?php themetacular_the_content(); ?>
		
	</div>

	<!-- Load the comments template -->
	<?php load_comments_template(); ?>

</article>