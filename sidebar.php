<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Clean as a whistle
 * @since Clean as a whistle 1.0
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			<div id="sidebar-1" class="sidebar">
                <?php if ( !dynamic_sidebar('sidebar-1') ) : ?>
                    <h1 class="widget-title">Archives</h1>
                    <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                    <br />
                    <h1 class="widget-title">Tags</h1>
                    <?php wp_tag_cloud( $args ); ?>
                <?php endif; ?>
            </div>
			<div id="sidebar-2" class="sidebar">
                <?php if ( !dynamic_sidebar('sidebar-2') ) : ?>
                    <h1 class="widget-title">Categories</h1>
                     <?php wp_list_categories('title_li='); ?> 
                <?php endif; ?>
            </div>
		</div><!-- #secondary .widget-area -->