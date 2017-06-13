<?php get_header(); ?>

<div class="ts narrow container" style="padding-top: 20px;"><div class="ts stackable grid">
    <div class="twelve wide column">
		<div class="ts large heading slate">
			<span class="header"><?php esc_html_e( 'Oh, it seems a problem', 'Carter' ); ?></span>
			<span class="description"><?php esc_html_e( '😱Oops! That page can&rsquo;t be found. ', 'Carter' ); ?></span>
			<div class="action">
				<a class="ts primary button" title="<?php bloginfo('name'); ?>"  href="<?php echo home_url();  ?>"><?php esc_html_e( 'Back home', 'Carter' ); ?></a>
			</div>
		</div>
	</div>
    <div class="four wide column">
		<?php get_sidebar(); ?>
	</div>
</div></div>

<?php get_footer(); ?>