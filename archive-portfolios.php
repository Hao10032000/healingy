<?php
/**
 * The template for displaying archive portfolios.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package healingy
 */

get_header(); ?>
<?php 
$columns = themesflat_get_opt('portfolio_grid_columns');
$themesflat_paging_style = themesflat_get_opt('portfolio_archive_pagination_style');
$orderby = themesflat_get_opt('portfolio_order_by');
$order = themesflat_get_opt('portfolio_order_direction');
$exclude = themesflat_get_opt('portfolio_exclude');
$show_filter = themesflat_get_opt('portfolio_show_filter');
$filter_category_order = themesflat_get_opt('portfolio_filter_category_order');		
$terms_slug = wp_list_pluck( get_terms( 'portfolios_category','hide_empty=0'), 'slug' );
$filters =      wp_list_pluck( get_terms( 'portfolios_category','hide_empty=0'), 'name','slug' );
$show_filter_class = '';

$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

$args = array(
    'post_type' => 'portfolios',
    'orderby'   => $orderby,
    'order' => $order,
    'paged' => $paged,
    'posts_per_page' => 9,
    'tax_query' => array(
        array(
            'taxonomy' => 'portfolios_category',   
            'field'    => 'slug',                   
        	'terms'    => $terms_slug,
        ),
    ),
);	

if ( ! empty( $exclude ) ) {				
	if ( ! is_array( $exclude ) )
		$exclude = explode( ',', $exclude );

	$args['post__not_in'] = $exclude;
}

$query = new WP_Query( $args );
?>
<div class="themesflat-portfolios-taxonomy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area">
                    <div id="primary" class="content-area"> 
                        <main id="main" class="main-content" role="main">
                            <?php
                                //Build the filter navigation
                                if ( $show_filter == 1 ) {  
                                    $show_filter_class = 'show-filter';         
                                    echo '<ul class="portfolio-filter posttype-filter">';
                                        echo '<li class="active"><a data-filter="*" href="#">' . esc_html__( 'All', 'healingy' ) . '</a></li>'; 
                                        if ($filter_category_order == '') { 

                                            foreach ($filters as $key => $value) {
                                                echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $value ) . '">' . esc_html( $value ) . '</a></li>'; 
                                            }
                                        
                                        }
                                        else {
                                            $filter_category_order = explode(",", $filter_category_order);
                                            foreach ($filter_category_order as $key) {
                                                $key = trim($key);
                                                echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $filters[$key] ) . '">' . esc_html( $filters[$key] ) . '</a></li>'; 
                                            }
                                        }
                                    echo '</ul>';
                                }  
                            ?>
                            <div class="container-filter wrap-portfolios-post row column-<?php echo esc_attr($columns); ?> <?php echo esc_attr($show_filter_class); ?>">
                                <?php 
                                if( $query->have_posts() ) {
                                    while ( $query->have_posts() ) : $query->the_post(); 
                                    	global $post;
                        		        $id = $post->ID;
                        		        $termsArray = get_the_terms( $id, 'portfolios_category' );
                        		        $termsString = "";

                        		        if ( $termsArray ) {
                        		        	foreach ( $termsArray as $term ) {
                        		        		$itemname = strtolower( $term->slug ); 
                        		        		$itemname = str_replace( ' ', '-', $itemname );
                        		        		$termsString .= $itemname.' ';
                        		        	}
                        		        }
                                    	?>           
                                        <div class="item <?php echo esc_attr( $termsString ); ?>">
                                            <div class="portfolios-post portfolios-post-<?php the_ID(); ?>">
                                                <div class="featured-post">
                                                    <a href="<?php echo get_the_permalink(); ?>">
                                                    <?php 
                                                        if ( has_post_thumbnail() ) { 
                                                            $themesflat_thumbnail = "themesflat-project-grid";                              
                                                            the_post_thumbnail( $themesflat_thumbnail );
                                                        }                                           
                                                    ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <div class="inner-content">                                
                                                        <div class="post-meta">
                                                            <?php echo the_terms( get_the_ID(), 'portfolios_category', '', ' , ', '' ); ?>
                                                        </div>
                                                        <h2 class="title">
                                                             <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                        </h2>                                               
                                                        <div class="tf-button-container">
                                                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="tf-button bt_icon_after"><i class="fas fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>                                              
                                                </div>
                                            </div>
                                        </div>                    
                                        <?php 
                                    endwhile; 
                                } else {
                                    get_template_part( 'template-parts/content', 'none' );
                                }
                                ?>            
                            </div>
                            <?php 
                            global $themesflat_paging_style, $themesflat_paging_for;
                            $themesflat_paging_for = 'portfolios';
                            $themesflat_paging_style = themesflat_get_opt('portfolio_archive_pagination_style');             
                            get_template_part( 'tpl/pagination' );
                            wp_reset_postdata();
                            ?> 
                        </main><!-- #main -->
                    </div><!-- #primary -->
                    <?php 
                    if ( themesflat_get_opt( 'portfolios_layout' ) == 'sidebar-left' || themesflat_get_opt( 'portfolios_layout' ) == 'sidebar-right' ) :
                        get_sidebar();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.themesflat-portfolios-taxonomy -->
<?php get_footer(); ?>