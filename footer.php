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
				<?php esc_html_e( '版權所有 © ', 'Carter' ); ?><?php bloginfo('name'); ?>
				<br>
				<?php esc_html_e( '由好棒棒的', 'Carter' ); ?> <a title="WordPress" href="//wordpress.org/">WordPress</a> <?php esc_html_e( '在背後撐腰', 'Carter' ); ?>
				<br>
				<?php esc_html_e( '載入時間', 'Carter' ); ?>：<?php timer_stop(1); ?> <?php esc_html_e( '秒', 'Carter' ); ?>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>