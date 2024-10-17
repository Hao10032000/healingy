<?php
/**
 * @package healingy
 */
global $themesflat_thumbnail;
$themesflat_thumbnail = 'themesflat-blog';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post blog-single' ); ?>>
	<!-- begin feature-post single  -->
	<div class="content-post-sigle-title">
		<?php if ( themesflat_get_opt('blog_featured_title') != '' ): ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>
	</div>

	<div class="content-post-single">
		<div class="meta">
			<?php 
				$content_elements = themesflat_layout_draganddrop(themesflat_get_opt( 'post_content_elements' ));
				foreach ( $content_elements as $content_element ) :
					if ( 'meta' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-meta' );
					} 
				endforeach;
			?>
		</div>
		<div class="social-share-article share ">
			<?php 
				if( themesflat_get_opt('show_social_share') == 1 ):
					$value = themesflat_get_json('social_links');
					$sharelink = themesflat_available_social_icons();
					?>
					<h5><?php echo esc_html__( 'Share this post:', 'healingy' ); ?></h5>        
					<ul class="themesflat-socials">
						<?php
							foreach ( $value as $key => $val ) {
								if ( $key != '__ordering__') {
									$link = $sharelink[$key]['share_link'].get_the_permalink();
									printf(
										'<li class="%1$s">
											<a href="%2$s" target="_blank" rel="alternate" title="%1$s">
												<i class="icon-healingy-%4$s"></i>
											</a>
										</li>',
										esc_attr( $key ),
										esc_url( $link ),
										esc_attr( $link ),
										esc_attr( $key )
									);
								}
							}
						?>
					</ul>
					
					<?php
				endif;
			?>
		</div>
				
	</div><!-- /.entry-post -->

	<?php get_template_part( 'tpl/feature-post-single'); ?>
	<!-- end feature-post single-->

	
	

	<div class="main-post">		
		<div class="entry-content clearfix">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'healingy' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>'
				) );
				?>
		</div><!-- .entry-content -->
	</div><!-- /.main-post -->
</article><!-- #post-## -->
<?php if( themesflat_get_opt('show_entry_footer_content') == 1 ): ?>		
	<?php themesflat_entry_footer(); ?>
<?php endif; ?>