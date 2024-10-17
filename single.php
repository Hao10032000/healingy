<?php
/**
 * The template for displaying all single posts.
 *
 * @package healingy
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="primary" class="content-area">
				<main id="main" class="post-wrap" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
					<div class="main-single">	
					<?php if ( is_user_logged_in() ) : ?>
						<?php if ( get_the_author_meta( 'description' ) ): ?>
							<div class="author-post">			
								<div class="author-body clearfix">
									<div class="author-avatar">					
										<?php
										echo get_avatar(get_the_author_meta('user_email'),$size='170');
										?>					
									</div><!--/.author-avatarr -->									
									<div class="info">
										<div class="name">
											<h6><?php the_author_posts_link(); ?></h6>	
										</div>	
										<p class="intro">
											<?php 
											echo get_the_author_meta( 'description' );
											?>			
										</p>
										<?php themesflat_render_social(); ?>	        
									</div><!--/.author-info -->
								</div><!--/.author-info -->
							</div><!--/.author-body -->
						<?php endif; ?>
					<?php endif; ?>			
					<?php 			
					if ( 'post' == get_post_type() && themesflat_get_opt('show_post_navigator' ) == 1 ): 
						themesflat_post_navigation(); 				
					endif;
					?>
					
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
					
					</div><!-- /.main-single -->		
				<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php 
			if ( themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-right' ) :
				get_sidebar();
			endif;
			?>
		</div><!-- /.col-md-12 -->
		<div class="col-md-12">
			<?php get_template_part( 'tpl/related-post' )?>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->
<?php get_footer(); ?>