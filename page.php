<?php get_header(); ?>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
	<div id="content" class="page">
		<div class="header-wrapper">
			<div class="bg" style="background-image:url('<?php echo(has_post_thumbnail()?the_post_thumbnail_url():"https://picsum.photos/1200#".rand()) ?>')"></div>
		</div>
		<div class="ts narrow container header">
			<div class="title"><?php the_title(); ?></div>
			<div class="meta">
				<div><i class="calendar icon outline"></i><?php the_time('Y/n/j') ?> </div>
				<div><i class="comment icon outline"></i><?php comments_number(__( 'No one commented', 'Carter' ),__( '1 Comment', 'Carter' ),__( '% Comments', 'Carter' )); ?></div>
				<div><i class="user icon outline"></i><?php the_author() ;?></div>
			</div>
		</div>
		<div class="ts narrow container" style="padding-top: 20px;">
				<post>
					<?php the_content(); ?>
				</post>
				<div class="ts hidden clearing divider"></div>
		</div>
	</div>
<?php endif; ?>
<?php get_footer(); ?>