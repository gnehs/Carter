<div class="preview-index">
	<div class="ts inverted dimmer">
        <div class="ts loader"></div>
	</div>
	<div>
		<?php edit_post_link( '<i class="write icon"></i>', '', '', '','ts large icon right floated edit opinion button m-8' ); ?> 
		<div class="header-wrapper">
			<div class="bg" style="background-image:url('<?php echo(has_post_thumbnail()?the_post_thumbnail_url():"https://picsum.photos/1200#".rand()) ?>')"></div>
		</div>
		<div class="header">
			<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<div class="meta">
				<div><i class="calendar icon outline"></i><?php the_time('Y/n/j') ?></div>
				<div><i class="comment icon outline"></i><?php comments_number(__( 'No one commented', 'Carter' ),__( '1 Comment', 'Carter' ),__( '% Comments', 'Carter' )); ?></div>
				<div><i class="user icon outline"></i><?php the_author() ;?></div>
			</div>
		</div>
		<div class="description">	
			<?php the_tags( '<div class="ts horizontal basic label">','</div><div class="ts horizontal basic label">' ,'</div>'); ?>
			<?php the_excerpt(); ?>
		</div>
		<div class="continue">
			<a href="<?php the_permalink(); ?>" 
			   class="ts right labeled icon button">
				<?php esc_html_e( 'Read More', 'Carter' ); ?>
				<i class="angle right icon"></i>
			</a>
		</div>
	</div>
</div>