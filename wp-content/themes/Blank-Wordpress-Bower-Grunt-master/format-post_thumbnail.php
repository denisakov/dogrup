<?php 
/**
 * This file will hold the post thumnbnail information and use it in an include rather than copy and paste into multuple themes.
 * 
 * @package themetacular
 */

?>
<!-- Grab the featured image -->
<?php if ( '' != get_the_post_thumbnail() ) { ?>


	<!-- The anchor tag that will hold the post thumbnail -->
	<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

		<?php

			//The settings to be pased to the post_thumbnail
			$args = array(
				'class' => '',
				'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) )
			);

		 	the_post_thumbnail( 'large-image', $args );

		  ?>
	</a>

<?php } ?>