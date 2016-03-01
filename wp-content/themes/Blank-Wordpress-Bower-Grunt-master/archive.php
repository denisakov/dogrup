<?php
/**
 * Archive Page Template
 *
 * @package
 */
?>
<?php get_header(); ?>


<div class="pure-g">
	<div class="pure-u-1 pure-u-md-1-1">

<main id="main">

<?php if(have_posts()) : ?>
	
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<h1>
		<?php
		if ( is_category() ) :
			_e( 'Category / ', 'themetacular' );
		single_cat_title();

		elseif ( is_tag() ) :
			_e( 'Tag / ', 'themetacular' );
		single_tag_title();

		elseif ( is_author() ) :
			printf( __( '<span>Author /</span> %s', 'themetacular' ), '<span class="vcard">' . get_the_author() . '</span>' );

		elseif ( is_day() ) :
			printf( __( 'Day / %s', 'themetacular' ), '<span>' . get_the_date() . '</span>' );

		elseif ( is_month() ) :
			printf( __( 'Month / %s', 'themetacular' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'themetacular' ) ) . '</span>' );

		elseif ( is_year() ) :
			printf( __( 'Year / %s', 'themetacular' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'themetacular' ) ) . '</span>' );

		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			_e( 'Asides', 'themetacular' );

		elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
			_e( 'Galleries', 'themetacular');

		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			_e( 'Images', 'themetacular');

		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			_e( 'Videos', 'themetacular' );

		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			_e( 'Quotes', 'themetacular' );

		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			_e( 'Links', 'themetacular' );

		elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
			_e( 'Statuses', 'themetacular' );

		elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
			_e( 'Audios', 'themetacular' );

		elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
			_e( 'Chats', 'themetacular' );

		else :
			_e( 'Archives', 'themetacular' );

		endif;
		?>
	</h1>

	<?php while(have_posts()) : the_post(); ?>


		<?php get_template_part('format', get_post_type()); ?>


	<?php endwhile; else : ?>

		<?php get_template_part('format', 'none') ?>

<?php endif; ?>

<div class="navigation clear">
	<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
	<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
</div>

</main>

	</div>
</div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>