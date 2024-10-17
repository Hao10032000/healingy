<?php
/**
 * The template for displaying search results pages.
 *
 * @package healingy
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<div class="wrap-content-area clearfix">
				<div id="primary" class="content-area">
					<main id="main" class="post-wrap" role="main">
					<?php if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
							?>
						<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
					</main><!-- #main -->
					<div class="clearfix">
						<?php
							global $themesflat_paging_style, $themesflat_paging_for;
							$themesflat_paging_for = 'blog';
					        $themesflat_paging_style = themesflat_get_opt('blog_archive_pagination_style');		        
							get_template_part( 'tpl/pagination' );
						?>			
					</div>
				</div><!-- #primary -->
				<?php 
					if ( themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-right' ) :
						get_sidebar();
					endif;
				?>
			</div><!-- /.wrap-content-area -->
		</div><!-- /.col-md-12 -->
	</div>
</div>
<?php get_footer(); ?>