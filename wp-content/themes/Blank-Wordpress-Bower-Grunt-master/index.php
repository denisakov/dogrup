<?php
/**
 * The main template file. 
 * 
 * Loads all of the different post types. If post type is standard, format.php runs.
 * 
 * @package awesome
 */

?>

<?php get_header(); ?>

<!-- This div for the blog/archive/single section of the theme -->
<div class="pure-g">
	<div class="pure-u-1 pure-u-md-1">

		<!-- Hold all of our posts in the main tag -->
		<main id="main">

			<!-- Do we have any posts? -->
			<?php if(have_posts()) :?> 

				<!-- If so, loop around all of them and display them according to its format type -->
				<?php while(have_posts()) : the_post(); ?>

					<!-- Will try to find a format-POST_TYPE.php file, if not, will just run format.php (ie, standard post); -->

					<!-- Get our the posts that are available -->
					<?php get_template_part( 'format', get_post_format() ); ?>

				<?php endwhile; else : ?>

				<!-- If there isn't any posts, load this one -->
				<?php get_template_part('format', 'none'); ?>

			<?php endif; ?>

			<?php post_nav_links(); ?>

		</main>



	</div><!-- 	pure-u-md-1 -->
</div> <!-- pure-g -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>
