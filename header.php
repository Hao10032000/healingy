<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package healingy
 */
$blog_layout_sidebar = isset($_GET['sidebar_layout']) ? $_GET['sidebar_layout'] : themesflat_blog_layout();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta
  name="description"
  content="healingy – Finance, Consulting and Business WordPress Theme – healingy – Finance">
<link rel="profile" href="<?php echo THEMESFLAT_PROTOCOL ?>://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="themesflat-boxed">	
	<div class="header-boxed">
		<?php
			get_template_part( 'tpl/site-header');        		
		?>
	</div>
	<!-- Page Title -->
	<?php get_template_part( 'tpl/page-title'); ?>	
	<div id="main-content" class="site-main clearfix">
		<div id="themesflat-content" class="page-wrap <?php echo esc_attr( $blog_layout_sidebar ); ?>">