<?php
/**
 * This file holds the post meta - posting date, author etc.
 *
 * @packaga
 */
?>


<div class="post-meta">

	<ul class='meta-list'>

		<!-- If there are categories, display them -->
		<?php if( has_category() ) { ?>
		
		<li>Category: <?php the_category( ', '); ?></li>

		<?php } ?>

		<!-- If there are tags, display them -->
		<?php if( has_tag() ) { ?>
		
		<li>Tags: <?php the_tags( '' ); ?></li>

		<?php } ?>

		<!-- If there are Comments, display the amount of them -->
		
		<li>Comments: <?php comments_popup_link('0', '1', '%'); ?></li>

	</ul>
	
</div>