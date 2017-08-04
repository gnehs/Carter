<br>
<div class="ts narrow container">
	<div class="ts three column stackable grid">
    	<div class="column"><?php dynamic_sidebar('footer1');?></div>
    	<div class="column"><?php dynamic_sidebar('footer2');?></div>
    	<div class="column"><?php dynamic_sidebar('footer3');?></div>
	</div>
</div>
<br>
<!-- Footer -->
		<nav class="ts basic fluid menu">
			<?php wp_nav_menu(
				array(
				'menu' => '', 
				'container' => 'div',
				'container_class' => 'ts narrow container navfix', 
				'container_id' => 'footermenu', 
				'menu_class' => '',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu', 
				'before' => '', 
				'after' => '',
				'link_before' => '', 
				'link_after' => '',
				'items_wrap' => '%3$s',
				'item_spacing' => 'preserve',
				'depth' => 1,
				'walker' => '',
				'theme_location' => 'footernav'
 				));
			 ?>
		</nav>
		<footer class="ts fluid slate" style="margin-bottom: 0;margin-top: 0;">
			<div class="ts narrow container">
				<?php esc_html_e( 'Copyright © ', 'Carter' ); ?><?php bloginfo('name'); ?>
				<br>
				<?php esc_html_e( 'Powered by', 'Carter' ); ?> <a title="WordPress" href="//wordpress.org/">WordPress</a>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>