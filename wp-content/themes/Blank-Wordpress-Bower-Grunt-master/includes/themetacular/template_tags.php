<?php 
/**
 * 
 * This file holds custom functions for wordpress output to make using the wordpress tags easier
 * 
 * @package awesome
 * 
*/


/************************************************************
*
* Add the next post links at the bottom of the page
*
************************************************************/

if ( !function_exists( 'post_nav_links')) {
	
	function post_nav_links() {

		?>
		<div class="post-navigation clear">
			<div class="left"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="right"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>


		<?php
	}
}

/************************************************************
*
* Load the comments template if the page is single
*
************************************************************/

if ( !function_exists('themetacular_load_comments_template')) {

	function themetacular_load_comments_template() {

		if ( is_single() )	 {

			comments_template();
		}

	}
}


/*************************************************************
*
* Add the meta data if we are not in single page 
*
************************************************************/
if ( !function_exists('themetacular_post_meta')) {


	function themetacular_post_meta() {

		if ( !is_single() ) {
			
			get_template_part('format', 'meta');
		}
	}

}


/************************************************************
*
* Fetch the time/date that the post was created
* (Simply avoids duplication)
*
************************************************************/

if ( !function_exists('themetacular_post_date')) {

	function themetacular_post_date() {

		the_time('n F');

	}

}

/************************************************************
*
* The standard the_content but made more modular
* (Simply avoids duplication)
*
************************************************************/


if( !function_exists( 'themetacular_the_content' )) {

	function themetacular_the_content( $more_text = "Read More" ) {

		the_content( $more_text );

	}

}


/************************************************************
 *  Change the output of wordpress menu i.e
 * 	remove the ul and li tags and replace with simple
 * 	HTML 5 nav and a tags
************************************************************/
if ( !function_exists('themetacular_nav_menu')) {

	function themetacular_nav_menu( $menu, $allowed_tags ) {


		$args = array(

			'theme_location' => $menu,
			'container'       => 'nav',
			'container_id' => 'navigation',
			'echo'            => false,
			'items_wrap'      => '%3$s',
			'depth'           => 0
		);


		echo strip_tags( wp_nav_menu( $args ), $allowed_tags);


	}
}



?>