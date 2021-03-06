<?php get_header(); ?>

<div id="content" class="ts narrow container" style="padding-top: 20px;">
	<!-- Blog Post -->
		<div class="index">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part( 'preview', 'index' ); ?>
			<?php endwhile; ?>
		</div>
		<!-- Blog Navigation -->
		<div class="ts fluid buttons">
			<?php previous_posts_link('<i class="arrow left icon"></i>'. __( 'Previous page', 'Carter' )); ?>
			<?php next_posts_link('<i class="arrow right icon"></i>'. __( 'Next page', 'Carter' )); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>