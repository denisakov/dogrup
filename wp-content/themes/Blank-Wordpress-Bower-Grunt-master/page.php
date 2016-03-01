<?php
/**
 * This file is runs as the page post type
 *
 * @package awesome
 */
?>


<?php get_header(); ?>



<div class="page-g">
	<div class="pure-u-md-1">

		<main id="main">
			<!-- If we have posts, loop through and show them -->
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

				<!-- Wrap our post in a lovely article tag -->
				<article class="post" id="<?php the_ID(); ?>">

					<!-- Wrap the title etc in a header for html5 goodness -->
					<header class="post-header">
						<h1>
							<?php the_title(); ?>
						</h1>
					</header>

					<div class="entry">
						<?php themetacular_the_content(); ?>
					</div>

				</article> <!-- .post -->

			<?php endwhile; endif; ?>

		</main>
	</div>  <!-- pure-g -->
</div><!--  pure-u-md-1 -->




<?php get_sidebar(); ?>

<?php get_footer(); ?>