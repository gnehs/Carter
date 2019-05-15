<?php get_header(); ?>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<div id="content" class="single">
	<div class="header-wrapper">
		<div class="bg" style="background-image:url('<?php echo(has_post_thumbnail()?the_post_thumbnail_url():"https://picsum.photos/1200#".rand()) ?>')"></div>
	</div>
	<div class="ts narrow container header">
		<div class="title"><?php the_title(); ?></div>
		<div class="meta">
			<div><i class="calendar icon"></i><?php the_time('Y/n/j') ?> </div>
			<div><i class="comment icon"></i><?php comments_number(__( 'No one commented', 'Carter' ),__( '1 Comment', 'Carter' ),__( '% Comments', 'Carter' )); ?></div>
			<div><i class="user icon"></i><?php the_author() ;?></div>
		</div>
	</div>
	<div class="ts narrow container" style="padding-top: 20px;">
			<div class="ts hidden divider" data-dark></div>
			
			<post data-dark>
				<?php the_content(); ?>
			</post>

			<div class="ts clearing divider" data-dark></div>

    		<h3 class="ts header" data-dark>
				<?php esc_html_e( 'Share', 'Carter' ); ?>
				<div class="sub header"><?php esc_html_e( 'Share to your friends', 'Carter' ); ?></div>
			</h3>
			<div class="ts primary large icon separated buttons" id="share" data-dark='primary'>
    			<a class="ts button" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>"><i class="icon facebook f"></i></a>
    			<a class="ts button" href="https://telegram.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="icon telegram"></i></a>
    			<a class="ts button" href="https://www.tumblr.com/widgets/share/tool?shareSource=legacy&canonicalUrl=&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="icon tumblr"></i></a>
    			<a class="ts button" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="icon twitter"></i></a>
			</div>
			<div class="ts clearing divider" data-dark></div>
			<?php comments_template(); ?>

			<div class="ts clearing hidden divider" data-dark></div>
	</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>