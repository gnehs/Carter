<?php get_header(); ?>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<div id="content" class="single">
	<?php edit_post_link( '<i class="write icon"></i>', '', '', '','ts large icon right floated edit opinion button m-16' ); ?>
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
		<div class="ts hidden divider"></div>

		<post>
			<?php the_content(); ?>
		</post>
		<div class="ts clearing divider"></div>
		<?php
			$categories = get_the_category();
			if (!empty($categories)) {
				$output = '<p>';
				foreach( $categories as $category ) {
					$output .= '<a class="ts horizontal basic label" href="' . esc_url( get_category_link( $category->term_id ) ) . '">
						<i class="th icon"></i>' . esc_html( $category->name ) . '
					</a>';
				}
				$output .= '</p>';
				echo $output;
			}
		?>
		<?php
		$tags = get_the_tags();
		if (!empty($tags)) {
			$output = '<p>';
			foreach( $tags as $tag ) {
				$output .= '<a class="ts horizontal basic label" href="' . esc_url( get_category_link( $tag->term_id ) ) . '">
					<i class="hashtag icon"></i>' . esc_html( $tag->name ) . '
				</a>';
			}
			$output .= '</p>';
			echo $output;
		}
		?>
		<div class="ts clearing divider"></div>

		<h3 class="ts header">
			<?php esc_html_e( 'Share', 'Carter' ); ?>
			<div class="sub header"><?php esc_html_e( 'Share to your friends', 'Carter' ); ?></div>
		</h3>
		<div class="ts primary large icon separated buttons" id="share">
			<a class="ts button" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>"><i class="icon facebook f"></i></a>
			<a class="ts button" href="https://t.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="icon telegram"></i></a>
			<a class="ts button" href="https://www.tumblr.com/widgets/share/tool?shareSource=legacy&canonicalUrl=&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="icon tumblr"></i></a>
			<a class="ts button" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="icon twitter"></i></a>
			<a class="ts button" href="https://www.pinterest.com/pin/create/button/?description=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="icon pinterest"></i></a>
		</div>
		<div class="ts clearing divider"></div>
		<?php comments_template(); ?>

		<div class="ts clearing hidden divider"></div>
	</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>