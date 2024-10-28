<?php
if ( ! get_theme_mod( 'show_related_post' ) )
    return;
$layout = get_theme_mod( 'related_post_style', 'blog-grid' );
$carousel = 1;
$grid_columns  = themesflat_get_opt( 'grid_columns_post_related' );
$readmore_text = themesflat_get_opt('blog_archive_readmore_text');
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$args = array(                    
    'post_status'         => 'publish',
    'post_type'           => 'post',
    'paged' => $paged,
    'ignore_sticky_posts' => true,
    'posts_per_page'      => themesflat_get_opt( 'number_related_post' ),
    'post__not_in' => array($post->ID),
); 

$categories = (array) get_the_category();

if ( empty( $categories ) )
    return;

$args['category'] = wp_list_pluck( $categories, 'slug' );

if ( $layout != '' ) {
    $class[] = $layout;
}
if ( $grid_columns != '' ) {
    $class[] = 'columns-' . $grid_columns ;
}
if ( $carousel == 1 ) {
    $class[] = 'has-carousel';
}
global $themesflat_thumbnail;
$imgs = array(
    'blog-grid' => 'themesflat-blog-grid',
    'blog-list' => 'themesflat-blog',
    );
$themesflat_thumbnail = $imgs[$layout];
?>
<div class="related-post related-posts-box">
    <div class="box-wrapper">
        <h3 class="box-title"><?php esc_html_e( 'Related articles', 'healingy' ) ?></h3>
        <p><?php esc_html_e( 'Your go-to source for mental health insights, tools, and advice.', 'healingy' ) ?></p>
        <div class="box-content">
            <div class="<?php echo esc_attr( implode( ' ', $class ) ) ?>">
                <?php
            $query = new WP_Query($args);
            if( $query->have_posts() ) {
                while ($query->have_posts()) : $query->the_post(); ?>
                <div class="item">
                    <article <?php echo esc_attr(post_class('entry'));?>>
                        <div class="entry-border">
                            <?php if (has_post_thumbnail()):  ?>
                            <div class="featured-post">
                            <?php 
                                echo '<div class="post-meta">';
                                  $meta_elements = themesflat_layout_draganddrop(themesflat_get_opt( 'meta_elements' ));
                                  foreach ( $meta_elements as $meta_element ) :
                                  if ( 'date' == $meta_element ) {
                                  echo '<span class="item-meta post-date">';   
                                  $archive_year  = get_the_time('Y'); 
                                  $archive_month = get_the_time('m'); 
                                  $archive_day   = get_the_time('d');                 
                                echo '<a class="meta-text" href="'.get_day_link( $archive_year, $archive_month, $archive_day).'">'.get_the_date('d M ').'</a>';
                                echo '</span>';
                                }
                                endforeach;
                                echo '</div>';
                            ?>
                                <a href="<?php the_permalink();?>">
                                    <?php  the_post_thumbnail( $themesflat_thumbnail ); ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <div class="content-post">
                                <?php get_template_part( 'tpl/entry-content/entry-content-meta' ); ?>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_title();?>
                                    </a>
                                </h2>
                                <?php 
                                 echo '<div class="post-content post-excerpt clearfix">';
                                 if( strpos( get_the_content(), 'more-link' ) === false ) {
                                     add_filter( 'excerpt_more', 'themesflat_excerpt_not_more' );
                                     the_excerpt();     
                                 };
                             echo '</div>';
                                ?>
                            </div>
                        </div>
                    </article><!-- /.entry -->
                </div>
                <?php
                endwhile;
            }
            wp_reset_postdata();            
            ?>
            </div>
        </div>
    </div>
</div>