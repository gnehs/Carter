<?php get_header(); ?>

<div class="ts narrow container" style="padding-top: 20px;"><div class="ts stackable grid">
    <div class="twelve wide column">
		<div class="ts large heading slate">
			<span class="header">哎呀，看來出了點問題</span>
			<span class="description">😱夭壽喔，我們伺服器查不到這個頁面</span>
			<div class="action">
				<a class="ts primary button" title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">回去首頁</a>
			</div>
		</div>
	</div>
    <div class="four wide column">
		<?php get_sidebar(); ?>
	</div>
</div></div>

<?php get_footer(); ?>