<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Clean as a whistle
 * @since Clean as a whistle 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'clean_as_a_whistle' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<style>
/* - STRUCUTRE
------------------------------------------------------------*/
#page {width:600px; margin:20px auto 0;}
#masthead {text-align: center}
#page a {text-decoration: none; color:#555;}
#page a:hover {text-decoration: underline}

/* - SITE STRUCTURE
------------------------------------------------------------*/
.site-title {font-size:38px; color:#000; font-family: Georgia}
.site-title a {color:#000;}
.site-description {color:#666; font-size:13px;}
.menu {border-top:1px solid #cacaca; text-align: center; margin:10px 0 60px; padding-top:10px;}
.menu li {display: inline; float:none; font-size:12px; margin:0 6px;}
.main-navigation a {display:inline;}

/* - POST STRUCUTRE
------------------------------------------------------------*/
.entry-title {text-align:center; font-size: 24px; line-height: 26px; margin-top:60px; font-family: Georgia;}
.entry-title a {color:#444;}
.entry-meta {text-align:center; font-size:12px; color:#777;}
.entry-meta a {color:#777;}
.entry-content {font-size:14px; color:#333;}
#page .entry-content a {color:#000; text-decoration: underline}
#page .entry-content a:hover {color:#3b6ea5;}
blockquote {border-left:4px solid #cacaca; padding-left:14px; margin-left:20px;}
footer.entry-meta {border-bottom:1px solid #cacaca; padding-bottom:10px; padding-top:10px;}

/* - SIDEBAR (FOOTER)
------------------------------------------------------------*/
#secondary {float:left; width:100%;}
.sidebar {width:48%; font-size:14px; margin-top:20px; color:#	555;}
#secondary .sidebar a {color:#999; text-decoration: underline}
#secondary .sidebar a:hover {color:#3b6ea5;}
#sidebar-1 {float:left;}
#sidebar-2 {float:right;}
.sidebar ul {margin:0; padding:0;}
.sidebar li {margin:0 0 0 26px; padding:0 0 0 0;}

/* - FOOTER ABOUT
------------------------------------------------------------*/
#colophon {font-size:12px; text-align: center; clear:both; padding:60px 0 10px; color:#555;}
#colophon a {color:#555;}

/* - SINGLE PAGE
------------------------------------------------------------*/
.site-content .site-navigation {clear:both; font-size:12px;}
.site-content .nav-previous {font-size:16px;}

#nav-below {border-bottom:1px solid #cacaca; padding-bottom:10px;}
.post {margin-bottom:14px;}
#comments {font-size:13px; margin-top:40px; border-bottom:1px solid #cacaca; margin-bottom:20px;}
.comments-title, #reply-title {font-size:20px; font-family: Georgia; color:#333;}
.comment-notes {color:#999; font-size:12px;}
#comments p {margin-bottom:18px;}
#comments input {margin-right:250px; width:260px; float:right; }
.form-allowed-tags, .form-allowed-tags code {font-size:11px; color:#999;}
#comments .form-submit input {margin-right:0; float:none;}

.commentlist {margin:12px 0 30px 26px;}
.comment .avatar {float:left; margin:0 6px 6px 0;}

/* - ARCHIVES
------------------------------------------------------------*/
.archive .page-title, .search .page-title {background-color:#ffffcc; padding:6px; font-size:18px; line-height: 18px; text-align: center; font-family: Georgia; border:1px solid yellow;}
</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'clean_as_a_whistle' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'clean_as_a_whistle' ); ?>"><?php _e( 'Skip to content', 'clean_as_a_whistle' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
		</nav><!-- .site-navigation .main-navigation -->
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main">