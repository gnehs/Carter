<div class="ts card perview" data-dark>
	<a class="video" href="<?php the_permalink(); ?>">
		<div class="ts 16:9 embed">
			<?php if ( has_post_thumbnail() ) { ?>  
				<?php the_post_thumbnail(); ?>
			<?php } else {?>  
				<script>
					var perviewImg = Trianglify({
						width: 1600,
						height: 900,
						stroke_width: 180,
						cell_size: 140,
					});
					document.write('<img src="' + perviewImg.png() + '">');
				</script>
			<?php } ?> 
		</div>
	</a>
	<div class="content">
        <div class="header"><?php the_title(); ?></div>
       	<div class="meta">
            <div><?php the_time('Y/n/j') ?> </div>
			<div><?php comments_number(__( 'No one commented', 'Carter' ),__( '1 Comment', 'Carter' ),__( '% Comments', 'Carter' )); ?></div>
			<div>@<?php the_author() ;?></div>
		</div>
		<div class="description">
			<?php the_excerpt(); ?>
			<?php the_tags( '<div class="ts horizontal basic label" data-dark="basic">','</div><div class="ts horizontal basic label" data-dark="basic">' ,'</div>'); ?>
		</div>
	</div>
	<div class="ts fluid bottom attached buttons post operation" data-dark>
		<a class="ts labeled icon button click load" href="<?php the_permalink(); ?>"><i class="unhide icon"></i><?php esc_html_e( 'Read More', 'Carter' ); ?></a>
		<?php edit_post_link( '<i class="write icon"></i>' . __( 'Edit', 'Carter' ), '', '', '','ts labeled icon button click load' ); ?> 
	</div>
</div>