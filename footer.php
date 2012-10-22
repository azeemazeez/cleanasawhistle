<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Clean as a whistle
 * @since Clean as a whistle 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'clean_as_a_whistle_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'clean_as_a_whistle' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'clean_as_a_whistle' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'clean_as_a_whistle' ), 'clean_as_a_whistle', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>