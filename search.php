<?php get_header(); ?>
<div class="ts narrow container" style="padding-top: 20px;">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'preview', 'index' ); ?>
<?php endwhile; ?>
<?php else : ?>
<br>
	<?php get_template_part( 'search', '404' ); ?>
<?php endif; ?>
</div>

<?php get_footer(); ?>