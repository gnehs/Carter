<?php get_header(); ?>
	<!-- Column 1 /Content -->
	<div id="content" class="ts narrow container" style="padding-top: 20px;"><div class="ts stackable grid">
		<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
		<div class="twelve wide column">
			<div class="ts vertically very padded left aligned slate post">
				<div class="image">
					<?php if ( has_post_thumbnail() ) { ?>  
						<?php the_post_thumbnail(); ?>
					<?php } else {?>  
						<script src="//gnehs.github.io/RandomPic/randompicture.js"></script>  
					<?php } ?> 
				</div>
				<span class="header"><?php the_title(); ?></span>
				<span class="description"><?php the_time('Y/n/j') ?>  <a><?php edit_post_link( __( 'Edit', 'Carter' ), ''); ?></a></span>
			</div>
			
			<div class="ts hidden divider"></div>
			<post>
				<?php the_content(); ?>
			</post>
			<div class="ts hidden clearing divider"></div>
		</div>
		<?php endif; ?>
		
		<div class="four wide column">
			<?php get_sidebar(); ?>
		</div>
	</div></div>
<?php get_footer(); ?>