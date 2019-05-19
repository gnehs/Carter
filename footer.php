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
		<nav class="ts fluid navfix borderless menu">
			<?php wp_nav_menu(
				array(
					'container' => '',
					'fallback_cb' => false, 
					'items_wrap' => '<div id="%1$s" class="%2$s ts narrow container">%3$s</div>',
					'depth' => 1,
					'walker' =>  new tocas_menu(),
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