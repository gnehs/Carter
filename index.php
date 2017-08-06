<?php get_header(); ?>

<div id="content" class="ts narrow container" style="padding-top: 20px;"><div class="ts stackable grid">
    <div class="twelve wide column">
		<!-- Blog Post -->
		<div class="ts two stackable waterfall cards">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'perview', 'index' ); ?>
		<?php endwhile; ?>
		</div>
		<!-- Blog Navigation -->
		<div class="ts clearing hidden divider"></div>
		<div class="ts fluid buttons">
			<?php previous_posts_link('<i class="arrow left icon"></i>'. __( 'Previous page', 'Carter' )); ?>
			<?php next_posts_link('<i class="arrow right icon"></i>'. __( 'Next page', 'Carter' )); ?>
		</div>
		<?php endif; ?>
	</div>
    <div class="four wide column">
		<?php get_sidebar(); ?>
	</div>
</div></div>

<?php get_footer(); ?>