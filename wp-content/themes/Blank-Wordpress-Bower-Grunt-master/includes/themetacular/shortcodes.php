<?php
/**
* @package Themetacular Framework
*
* @author Themetactular
**/


// GRID shortcodes
// ===============

function one_third( $atts, $content = null ) {
	return '<div class="tt-shortcode col-md-4">' . do_shortcode($content) . '</div>';
}
add_shortcode('one-third', 'one_third');

function two_thirds( $atts, $content = null ) {
	return '<div class="tt-shortcode col-md-8 ">' . do_shortcode($content) . '</div>';
}
add_shortcode('two-thirds', 'two_thirds');

// 1-4 col 

function one_half( $atts, $content = null ) {
	return '<div class="tt-shortcode col-md-6">' . do_shortcode($content) . '</div>';
}
add_shortcode('one-half', 'one_half');


function one_quarter( $atts, $content = null ) {
	return '<div class="tt-shortcode col-md-3">' . do_shortcode($content) . '</div>';
}
add_shortcode('one-quarter', 'one_quarter');


function three_fourths( $atts, $content = null ) {
	return '<div class="tt-shortcode col-md-9">' . do_shortcode($content) . '</div>';
}
add_shortcode('three-quarters', 'three_fourths');


// Callouts

function st_callout( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'width' => '',
		'align' => ''
		), $atts));
	$style;
	if ($width || $align) {
		$style .= 'style="';
		if ($width) $style .= 'width:'.$width.'px;';
		if ($align == 'left' || 'right') $style .= 'float:'.$align.';';
		if ($align == 'center') $style .= 'margin:0px auto;';
		$style .= '"';
	}
	return '<div class="cta" '.$style.'>' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('callout', 'st_callout');



// Buttons
function button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'size' => 'medium',
		'color' => '',
		'target' => '_self',
		'caption' => '',
		'align' => 'right'
		), $atts));	
	$button;
	$button .= '<div class="button '.$size.' '. $align.'">';
	$button .= '<a target="'.$target.'" class="button '.$color.'" href="'.$link.'">';
	$button .= $content;
	if ($caption != '') {
		$button .= '<br /><span class="btn_caption">'.$caption.'</span>';
	};
	$button .= '</a></div>';
	return $button;
}
add_shortcode('button', 'button');


// Tabs
add_shortcode( 'tabgroup', 'st_tabgroup' );

function st_tabgroup( $atts, $content ){
	
	$GLOBALS['tab_count'] = 0;
	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
		
		foreach( $GLOBALS['tabs'] as $tab ){
			$tabs[] = '<li><a href="#'.$tab['id'].'">'.$tab['title'].'</a></li>';
			$panes[] = '<li id="'.$tab['id'].'Tab">'.$tab['content'].'</li>';
		}
		$return = "\n".'<!-- the tabs --><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><ul class="tabs-content">'.implode( "\n", $panes ).'</ul>'."\n";
	}
	return $return;

}

add_shortcode( 'tab', 'st_tab' );
function st_tab( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '%d',
		'id' => '%d'
		), $atts));

	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array(
		'title' => sprintf( $title, $GLOBALS['tab_count'] ),
		'content' =>  do_shortcode($content),
		'id' =>  $id );

	$GLOBALS['tab_count']++;
}


// Toggle
function st_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title' => '',
		'style' => 'list'
		), $atts));
	output;
	$output .= '<div class="'.$style.'"><p class="trigger"><a href="#">' .$title. '</a></p>';
	$output .= '<div class="toggle_container"><div class="block">';
	$output .= do_shortcode($content);
	$output .= '</div></div></div>';

	return $output;
}
add_shortcode('toggle', 'st_toggle');


/*-----------------------------------------------------------------------------------*/
// Latest Posts
// Example Use: [latest excerpt="true" thumbs="true" width="50" height="50" num="5" cat="8,10,11"]
/*-----------------------------------------------------------------------------------*/


function st_latest($atts, $content = null) {
	extract(shortcode_atts(array(
		"offset" => '',
		"num" => '5',
		"thumbs" => 'false',
		"excerpt" => 'false',
		"length" => '50',
		"morelink" => '',
		"width" => '100',
		"height" => '100',
		"type" => 'post',
		"parent" => '',
		"cat" => '',
		"orderby" => 'date',
		"order" => 'ASC'
		), $atts));
	global $post;
	
	$do_not_duplicate[] = $post->ID;
	$args = array(
		'post__not_in' => $do_not_duplicate,
		'cat' => $cat,
		'post_type' => $type,
		'post_parent'	=> $parent,
		'showposts' => $num,
		'orderby' => $orderby,
		'offset' => $offset,
		'order' => $order
		);
	// query
	$myposts = new WP_Query($args);
	
	// container
	$result='<div id="category-'.$cat.'" class="latestposts">';

	while($myposts->have_posts()) : $myposts->the_post();
		// item
	$result.='<div class="latest-item clearfix">';
		// title
	if ($excerpt == 'true') {
		$result.='<h4><a href="'.get_permalink().'">'.the_title("","",false).'</a></h4>';
	} else {
		$result.='<div class="latest-title"><a href="'.get_permalink().'">'.the_title("","",false).'</a></div>';			
	}
	
	
		// thumbnail
	if (has_post_thumbnail() && $thumbs == 'true') {
		$result.= '<img alt="'.get_the_title().'" class="alignleft latest-img" src="'.get_bloginfo('template_directory').'/thumb.php?src='.get_image_path().'&amp;h='.$height.'&amp;w='.$width.'"/>';
	}

		// excerpt		
	if ($excerpt == 'true') {
			// allowed tags in excerpts
		$allowed_tags = '<a>,<i>,<em>,<b>,<strong>,<ul>,<ol>,<li>,<blockquote>,<img>,<span>,<p>';
		 	// filter the content
		$text = preg_replace('/\[.*\]/', '', strip_tags(get_the_excerpt(), $allowed_tags));
			// remove the more-link
		$pattern = '/(<a.*?class="more-link"[^>]*>)(.*?)(<\/a>)/';
			// display the new excerpt
		$content = preg_replace($pattern,"", $text);
		$result.= '<div class="latest-excerpt">'.st_limit_words($content,$length).'</div>';
	}
	
		// excerpt		
	if ($morelink) {
		$result.= '<a class="more-link" href="'.get_permalink().'">'.$morelink.'</a>';
	}
	
		// item close
	$result.='</div>';
	
	endwhile;
	wp_reset_postdata();
	
	// container close
	$result.='</div>';
	return $result;
}
add_shortcode("latest", "st_latest");

// Example Use: [latest excerpt="true" thumbs="true" width="50" height="50" num="5" cat="8,10,11"]

/*-----------------------------------------------------------------------------------*/
// Creates an additional hook to limit the excerpt
/*-----------------------------------------------------------------------------------*/

function st_limit_words($string, $word_limit) {
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
	$words = explode(' ', $string);
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
	return implode(' ', array_slice($words, 0, $word_limit));
}


// Related Posts - [related_posts]
add_shortcode('related_posts', 'skeleton_related_posts');
function skeleton_related_posts( $atts ) {
	extract(shortcode_atts(array(
		'limit' => '5',
		), $atts));

	global $wpdb, $post, $table_prefix;

	if ($post->ID) {
		$retval = '<div class="st_relatedposts">';
		$retval .= '<h4>Related Posts</h4>';
		$retval .= '<ul>';
 		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);

		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
		FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
		AND p.post_status = 'publish'
		AND p.post_date_gmt < NOW()
		GROUP BY tr.object_id
		ORDER BY count DESC, p.post_date_gmt DESC
		LIMIT $limit;";

		$related = $wpdb->get_results($q);
		if ( $related ) {
			foreach($related as $r) {
				$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
			}
		} else {
			$retval .= '
			<li>No related posts found</li>';
		}
		$retval .= '</ul>';
		$retval .= '</div>';
		return $retval;
	}
	return;
}

// Break
function st_break( $atts, $content = null ) {
	return '<div class="clear"></div>';
}
add_shortcode('clear', 'st_break');


// Line Break
function st_linebreak( $atts, $content = null ) {
	return '<hr /><div class="clear"></div>';
}
add_shortcode('clearline', 'st_linebreak');












// shortcodes

// Gallery shortcode

// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_tbs');

function gallery_shortcode_tbs($attr) {
	global $post, $wp_locale;

	$output = "";

	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
	$attachments = get_posts($args);
	if ($attachments) {
		$output = '<div class="row-fluid"><ul class="thumbnails">';
		foreach ( $attachments as $attachment ) {
			$output .= '<li class="span2">';
			$att_title = apply_filters( 'the_title' , $attachment->post_title );
			$output .= wp_get_attachment_link( $attachment->ID , 'thumbnail', true );
			$output .= '</li>';
		}
		$output .= '</ul></div>';
	}

	return $output;
}



// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => 'default', /* primary, default, info, success, danger, warning, inverse */
		'size' => 'default', /* mini, small, default, large */
		'url'  => '',
		'text' => '', 
		), $atts ) );
	
	if($type == "default"){
		$type = "";
	}
	else{ 
		$type = "btn-" . $type;
	}
	
	if($size == "default"){
		$size = "";
	}
	else{
		$size = "btn-" . $size;
	}
	
	$output = '<a href="' . $url . '" class="btn '. $type . ' ' . $size . '">';
	$output .= $text;
	$output .= '</a>';
	
	return $output;
}

add_shortcode('button', 'buttons'); 

// Alerts
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => 'alert-info', /* alert-info, alert-success, alert-error */
		'close' => 'false', /* display close link */
		'text' => '', 
		), $atts ) );
	
	$output = '<div class="fade in alert alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= $text . '</div>';
	
	return $output;
}

add_shortcode('alert', 'alerts');

// Block Messages
function block_messages( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => 'alert-info', /* alert-info, alert-success, alert-error */
		'close' => 'false', /* display close link */
		'text' => '', 
		), $atts ) );
	
	$output = '<div class="fade in alert alert-block alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= '<p>' . $text . '</p></div>';
	
	return $output;
}

add_shortcode('block-message', 'block_messages'); 

// Block Messages
function blockquotes( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'float' => '', /* left, right */
		'cite' => '', /* text for cite */
		), $atts ) );
	
	$output = '<blockquote';
	if($float == 'left') {
		$output .= ' class="pull-left"';
	}
	elseif($float == 'right'){
		$output .= ' class="pull-right"';
	}
	$output .= '><p>' . $content . '</p>';
	
	if($cite){
		$output .= '<small>' . $cite . '</small>';
	}
	
	$output .= '</blockquote>';
	
	return $output;
}

add_shortcode('blockquote', 'blockquotes'); 


?>
