<?php
/**
 * @package healingy
 */
global $themesflat_thumbnail;
$themesflat_thumbnail = 'themesflat-blog';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post blog-single blog-single2' ); ?>>

	<?php get_template_part( 'tpl/feature-post-single'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="content-single-fullwidth">
                <div class="social-share-article share-absolute ">
		            	<?php 
		            		if( themesflat_get_opt('show_social_share') == 1 ):
		            			$value = themesflat_get_json('social_links');
		            			$sharelink = themesflat_available_social_icons();
		            			?>
		            			<h5><?php echo esc_html__( 'Share:', 'healingy' ); ?></h5>        
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
                <!-- blog title -->
                <div class="content-post-sigle-title">
                    <?php 
                        echo '<div class=" post-categories">'.esc_html__("",'healingy');
                            the_category( ', ' );
                        echo '</div>';
                    ?>
		            <?php if ( themesflat_get_opt('blog_featured_title') != '' ): ?>
		            <h1 class="entry-title"><?php the_title(); ?></h1>
		            <?php endif; ?>
	            </div>

                <!-- content meta -->
                <div class="content-post-single">
		            <div class="meta">
		            	<?php 
                            // date 
                            echo '<span class="item-meta post-date">';   
                            $archive_year  = get_the_time('Y'); 
                            $archive_month = get_the_time('m'); 
                            $archive_day   = get_the_time('d');                 
                            echo '<i class="meta-icon icon-healingy-ona-40" aria-hidden="true"></i><a class="meta-text" href="'.get_day_link( $archive_year, $archive_month, $archive_day).'">'.get_the_date().'</a>';
                            echo '</span>';
                            // author
                            echo '<span class="item-meta post-author">';
                            printf(
                            '<i class="meta-icon icon-healingy-grow7" aria-hidden="true"></i><a class="meta-text" href="%s" title="%s" rel="author">Posted by: %s</a>',
                            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
                            esc_attr( sprintf( esc_html__( 'View all posts by %s', 'healingy' ), get_the_author() ) ),get_the_author());
                        echo '</span>';
		            	?>
		            </div>
	            </div>

                <!-- content post -->
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

                </div>

            </div>
        </div>
    </div>

	

</article><!-- #post-## -->
<?php if( themesflat_get_opt('show_entry_footer_content') == 1 ): ?>		
	<?php themesflat_entry_footer(); ?>
<?php endif; ?>