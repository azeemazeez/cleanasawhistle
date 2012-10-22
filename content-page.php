<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Clean as a whistle
 * @since Clean as a whistle 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'clean_as_a_whistle' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'clean_as_a_whistle' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
