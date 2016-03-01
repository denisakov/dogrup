	
<!-- gallery post format file	 -->


<article class="gallery-post post " id="<?php the_ID(); ?>">
	
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

	<div class="post-gallery">
		<?php get_post_gallery(); ?>
	</div>
	
	<div class="gallery-entry entry">
		<!-- themetacular_the_content makes 'read more' default -->
		<?php themetacular_the_content(); ?>
	</div>

	<?php load_comment_template(); ?>
	
	
</article> <!-- .post -->
