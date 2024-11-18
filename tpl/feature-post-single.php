<?php
$feature_post = '';
global $themesflat_thumbnail;

	$size = is_single() ? 'themesflat-blog' : $themesflat_thumbnail;
	
	$thumb = get_the_post_thumbnail( get_the_ID(), $size );
	if ( empty( $thumb ) )
		return;

	$feature_post .= get_the_post_thumbnail( get_the_ID(), $size );

if ( $feature_post )
	echo '<div class="featured-post">' . $feature_post . '</div>';
?>
