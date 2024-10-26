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
        <?php 
                        echo '<div class=" post-categories">'.esc_html__("",'healingy');
                            the_category( ', ' );
                        echo '</div>';
                    ?>
        <?php if ( themesflat_get_opt('blog_featured_title') != '' ): ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php endif; ?>
    </div>
    <div class="content-post-single">
        <div class="meta">
            <?php 
                            // date 
                            echo '<span class="item-meta post-date">';   
                            $archive_year  = get_the_time('Y'); 
                            $archive_month = get_the_time('m'); 
                            $archive_day   = get_the_time('d');                 
                            echo '<i class="meta-icon icon-healingy-date" aria-hidden="true"></i><a class="meta-text" href="'.get_day_link( $archive_year, $archive_month, $archive_day).'">'.get_the_date().'</a>';
                            echo '</span>';
                            // author
                            echo '<span class="item-meta post-author">';
                            printf(
                            '<i class="meta-icon icon-healingy-user" aria-hidden="true"></i><a class="meta-text" href="%s" title="%s" rel="author">by: %s</a>',
                            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
                            esc_attr( sprintf( esc_html__( 'View all posts by %s', 'healingy' ), get_the_author() ) ),get_the_author());
                        echo '</span>';
		            	?>
        </div>
    </div>

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