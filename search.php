<?php get_header(); ?>
<div class="ts narrow container" style="padding-top: 20px;"><div class="ts stackable grid">
    
<?php if ( have_posts() ) : ?>
<div class="twelve wide column"><div class="ts two stackable cards">
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'perview', 'index' ); ?>
<?php endwhile; ?>
</div></div>
<?php else : ?>
<div class="twelve wide column"><br>
	<?php get_template_part( 'search', '404' ); ?>
</div>
<?php endif; ?>
    <div class="four wide column">
		<?php get_sidebar(); ?>
	</div>
</div></div>

<?php get_footer(); ?>