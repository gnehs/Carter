<!DOCTYPE html>
<html>
	<head>
		<!-- <?php esc_html_e( 'Loading time', 'Carter' ); ?>：<?php timer_stop(1); ?> <?php esc_html_e( 's', 'Carter' ); ?> -->
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
		<link rel="stylesheet" href="<?php echo get_theme_file_uri('/tocas-ui/tocas.css'); ?>">
		<link rel="stylesheet" href="<?php echo get_theme_file_uri('/css/style.css'); ?>">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<!-- /CSS -->
		
		<!-- Script -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="<?php echo get_theme_file_uri('/carter.js'); ?>"></script>
		<script>
		// ===== 夜間模式 =====
		// NightMode("auto"|"disabled"|"enabled")
		// auto：啟用根據時間自動切換
		// disabled：停用
		// enabled：強制啟用
		window.onload = ()=>{ NightMode("disabled") };
		</script>
		<!-- /Script -->

		<!-- wp_head -->
		<?php wp_head(); ?>
		<!-- /wp_head -->
	</head>
	
	<body <?php body_class( $class ); ?> >
		<header class="ts huge slate">
			<div class="image"> 
				<img src="<?php header_image() ?>" id="headerImg">  
			</div>
			<div class="ts narrow container">
				<a href="<?php echo home_url(); ?>" id="backToHome">
			 		<span class="header" style="text-align: left;"><?php bloginfo('name'); ?></span>
			 		<span class="description" style="text-align: left;"><?php bloginfo('description'); ?></span>
				</a>
			</div>  
		</header>
		<nav class="ts fluid navfix borderless menu">
			<?php wp_nav_menu(
				array(
				'menu' => '', 
				'container' => '',
				'container_class' => '', 
				'container_id' => '', 
				'menu_class' => '',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu', 
				'before' => '', 
				'after' => '',
				'link_before' => '', 
				'link_after' => '',
				'items_wrap' => '<div id="%1$s" class="%2$s ts narrow container">%3$s</div>',
				'item_spacing' => 'preserve',
				'depth' => 1,
				'walker' =>  new Walker_Quickstart_Menu(),
				'theme_location' => 'headernav'
 				));
			 ?>
		</nav>
