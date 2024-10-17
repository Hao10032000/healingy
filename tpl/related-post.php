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
        <h3 class="box-title"><?php esc_html_e( 'Related Post', 'healingy' ) ?></h3>
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
                                <a href="<?php the_permalink();?>">
                                    <?php  the_post_thumbnail( $themesflat_thumbnail ); ?>                                        
                                </a>
                                <div class="overlay"></div>
                            </div>
                            <?php endif; ?>
                            
                            <div class="content-post"> 
                                <?php get_template_part( 'tpl/entry-content/entry-content-meta' ); ?>    
                                <h2 class="entry-title"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h2>                                    
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


