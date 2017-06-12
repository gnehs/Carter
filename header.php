<!DOCTYPE html>
<html <？php language_attributes（）; ？>
	<head>
		<meta charset="<?php bloginfo('charset');?>" />
		<title><?php if ( is_home() ) {
		bloginfo('name');
	} elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} elseif (is_search() ) {
		echo "搜尋結果"; echo " - "; bloginfo('name');
	} elseif (is_404() ) {
		echo '找不到頁面!';
	} else {
		wp_title('',true);
	} ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- CSS -->
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/tocas-ui/tocas.css" rel="stylesheet" media="screen" />
		<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen" />
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<!-- /CSS -->

		<!-- Script -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
		$(function(){
			$(".click.load").click(function(){$(this).addClass("loading");}) //按下 .click.load 的按鈕，切換按鈕成讀取狀態
		});
		</script>
		<!-- /Script -->

		<?php wp_head(); ?>
	</head>
	
	<body  <?php body_class( $class ); ?>>
		<header class="ts fluid horizontally fitted padded heading slate">
			
			<div class="image"> 
				<?php if ( has_header_image() ) { ?>  
					<img src="<?php header_image(); ?>">  
				<?php } else {?>  
					<script src="//gnehs.github.io/RandomPic/randompicture.js"></script>  
				<?php } ?>
			</div>
			<div class="ts narrow container" style="text-shadow: 0 0 6px black;">
				<a href="<?php echo home_url ( ) ; ?>">
				<h1 class="ts left aligned inverted header">
            		<?php bloginfo('name'); ?>
            		<br> 
					<small class="sub header">
            			<?php bloginfo('description'); ?>
        			</small>
				</h1>
				</a>
			</div>  
		</header>
		<nav class="ts basic fluid menu">
			<?php wp_nav_menu(
				array(
				'menu' => '', 
				'container' => 'div',
				'container_class' => 'ts narrow container navfix', 
				'container_id' => 'headermenu', 
				'menu_class' => '',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu', 
				'before' => '', 
				'after' => '',
				'link_before' => '', 
				'link_after' => '',
				'items_wrap' => '%3$s',
				'item_spacing' => 'preserve',
				'depth' => 1,
				'walker' => '',
				'theme_location' => 'headernav'
 				));
			 ?>
		</nav>
