<?php
/**
 * The template for displaying search forms in Clean as a whistle
 *
 * @package Clean as a whistle
 * @since Clean as a whistle 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'clean_as_a_whistle' ); ?></label>
		<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'clean_as_a_whistle' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'clean_as_a_whistle' ); ?>" />
	</form>
