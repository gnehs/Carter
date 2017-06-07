<?php get_header(); ?>

<div class="ts narrow container" style="padding-top: 20px;"><div class="ts stackable grid">
    <div class="twelve wide column">
		<!-- Blog Post -->
		<div class="ts two stackable waterfall cards">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="ts card">
			<a class="image" href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) { ?>  
					<?php the_post_thumbnail(); ?>
				<?php } else {?>  
					<script src="//gnehs.github.io/RandomPic/randompicture.js"></script>  
				<?php } ?> 
			</a>
			<div class="content">
        		<div class="header"><?php the_title(); ?></div>
       			<div class="meta">
            		<div><?php the_time('Y/n/j') ?> </div>
					<div><?php comments_number('還沒有人留言', '1 則留言', '% 則留言'); ?></div>
					<div>@<?php the_author() ;?></div>
        		</div>
				<div class="description">
					<?php the_excerpt(); ?>
				</div>
			</div>
			<div class="ts fluid bottom attached buttons post operation">
				<a class="ts labeled icon button click load" href="<?php the_permalink(); ?>"><i class="unhide icon"></i>繼續閱讀</a>
				<?php edit_post_link( '<i class="write icon"></i>編輯', '', '', '','ts labeled icon button click load' ); ?> 
			</div>
		</div>
		<?php endwhile; ?>
		</div>
		<!-- Blog Navigation -->
		<div class="ts fluid buttons">
			<?php previous_posts_link('<i class="arrow left icon"></i>上一頁'); ?><?php next_posts_link('<i class="arrow right icon"></i>下一頁'); ?>
		</div>
		<?php endif; ?>
	</div>
    <div class="four wide column">
		<?php get_sidebar(); ?>
	</div>
</div></div>

<?php get_footer(); ?>