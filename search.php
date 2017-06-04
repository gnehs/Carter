<?php get_header(); ?>
<div class="ts narrow container" style="padding-top: 20px;"><div class="ts stackable grid">
    
<?php if ( have_posts() ) : ?>
<div class="twelve wide column"><div class="ts two stackable waterfall cards">
<?php while ( have_posts() ) : the_post(); ?>
<div class="ts card">
	<a class="image" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) { ?>  
			<?php the_post_thumbnail(); ?>  
		<?php } else {?>  
			<script src="//rawgit.com/gnehs/RandomPic/master/randompicture.js"></script> 
		<?php } ?> 
	</a>
	<div class="content">
		<a href="<?php the_permalink(); ?>" class="header"><?php the_title(); ?></a>
		<div class="meta">
			<a><?php the_time('Y年n月j日') ?> </a>
			<a><?php comments_popup_link('還沒有人留言', '1 則留言', '% 則留言', '', '已關閉留言'); ?></a>
			<a><?php edit_post_link('編輯', ''); ?></a>
		</div>
		<div class="description">
			<p><?php the_excerpt(); ?></p>
		</div>
	</div>
	<div class="ts fluid bottom attached buttons">
		<a class="ts button" href="<?php the_permalink(); ?>">查看文章</a>
	</div>
</div>
<?php endwhile; ?>
</div></div>
<?php else : ?>
<div class="twelve wide column"><br>
	<div class="ts large heading slate">
		<span class="header">搜尋結果</span>
		<span class="description">找不到你要的文章，要不要換個關鍵字看看?</span>
		<div class="action">
			<a class="ts primary button" title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">回去首頁</a>
		</div>
	</div>
</div>
<?php endif; ?>
    <div class="four wide column">
		<?php get_sidebar(); ?>
	</div>
</div></div>

<?php get_footer(); ?>