<?php get_header(); ?>


<main id="main" role="main">
	<article class="page post">

		<header class="post-header">

			<p>404 :'(</p>

			<h2>Oops something has gone wrong.</h2>

			<p class="404-description">
				Something appears to have gone wrong - perhaps the page you were looking for does not exist anymore?
			</p>


		</header>

		<div class="entry">
			<?php 

			/**
			 *  Display a list of articles that have been created
			 * 	in the last month for the user
			 */
				$args = array(
					'type' = 'montly',
					'format' = 'html'
					);

				wp_get_archives($args);
			?>
		</div>

	</article> <!-- .post -->
</main>



<?php get_sidebar(); ?>

<?php get_footer(); ?>