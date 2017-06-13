<?php
/*
   翻譯支持
   Translations can be filed in the /languages/ directory.
   翻譯文件在 /languages/
*/
  load_theme_textdomain( 'Carter', get_template_directory() . '/languages' );
/*
	特色圖片支持！
*/
	add_theme_support( 'post-thumbnails' );
/*
	讓文本小工具可以支援短code
*/
	add_filter('widget_text', 'do_shortcode');
/*
    頁首圖片支持！
*/
$defaults = array(
	'default-image'          => '',
	'width'                  => 1800,
	'height'                 => 500,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
/*
	留言框架
*/
function aurelius_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
   
	<div class="ts comments">
		<div class="comment">
			<a class="avatar">
				<?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
			</a>
			<div class="content">
				<?php printf(__('%s'), get_comment_author_link()); ?>
				<div class="metadata">
					<div><?php echo get_comment_time('Y-m-d H:i'); ?></div>
					<a name="comment-<?php comment_ID() ?>"></a>
				</div>
				<div class="text">
					<?php comment_text(); ?>
				</div>
				<div class="actions">
					<?php comment_reply_link(array_merge( $args, array('reply_text' => __( 'Reply', 'Carter' ),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
					<?php edit_comment_link(__( 'Edit', 'Carter' )); ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php
/*
	本日更新!
	<?php update_today();?> 來使用
	預設在 sidebarowo 有套用在最上面
*/         
function update_today(){
    $args = array('date_query' => array(
        array(
            'year'  => date('Y'),
            'month' => date('m'),
            'day' => date('d')
        ),
    ),'ignore_sticky_posts' => 1);
    $postslist = get_posts( $args );
    if($postslist){
        echo '<div class="ts card"><div class="content"><div class="header">'.__( 'Updated today', 'Carter' ).'</div><div class="description">'.__( 'Updated today', 'Carter' ).' '. count($postslist) .__( ' item,', 'Carter' ). '<a href="' . home_url('/').date('Y/m/d') . '">'.__( 'Read More', 'Carter' ).'</a>。</div></div></div>';
    }else{
        return false;
    }
}

/*
	側邊欄
*/
add_action( 'widgets_init', 'register_Right_sidebar' );
function register_Right_sidebar() {
    register_sidebar( array(
       	'name' => __( 'Sidebar', 'Carter' ),
		'id' => 'sidebar',
		'description' => __( 'Displayed on the right side of each page.', 'Carter' ),
		'before_widget' => '<div class="ts segment sidebarowo">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="ts header" style="margin-bottom: 5px;">',
		'after_title' => '</h5>'
    ) );
}

/*
	註冊選單
*/
register_nav_menus( 
	array('headernav' => __( 'Top menu', 'Carter' ),
		  'footernav' => __(  'Footer menu', 'Carter' )
         ) 
);

/*
	切頁連結加class
*/
add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_previous');
function posts_link_attributes_next() {
    return 'class="ts primary right labeled icon button click load"';
}
function posts_link_attributes_previous() {
    return 'class="ts inverted labeled icon button click load"';
}


/*
	登入介面美化
*/
function gnehs_login_css() {
    echo '<style type="text/css">
            .login h1 a{
                background-color: white;
                border-radius: 100%;
            }
            .login-action-login{
                background-image: url(//i.imgur.com/73fVUB6.jpg);
                background-position: center;
            }
            .login form {
                background: rgba(255, 255, 255, 0.9);
            }
            .login #backtoblog a, .login #nav a {
                text-shadow: 0 0 3px white;
            }
            .login #backtoblog a:hover, .login #nav a:hover{
                color: #000000;
            }
            .login #login_error, .login .message {
                background: rgba(255, 255, 255, 0.9);
            }
            </style>';
}
add_action('login_head', 'gnehs_login_css');
?>