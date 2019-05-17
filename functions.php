<?php
/*
   翻譯支持
   Translations can be filed in the /languages/ directory.
   翻譯文件在 /languages/
*/
load_theme_textdomain( 'Carter', get_template_directory() . '/languages' );
/*
	特色圖片支持
*/
add_theme_support('post-thumbnails');
/*
	讓文本小工具可以支援短 code
*/
add_filter('widget_text', 'do_shortcode');
/*
    頁首圖片支持！
*/
$customHeader = array(
	'default-image'          => 'https://picsum.photos/1920/1080/?random',
	'width'                  => 1200,
	'height'                 => 300,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true
);
add_theme_support('custom-header', $customHeader);
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
<?php } 
/*
	本日更新!
	<?php update_today();?> 來使用
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
        echo '<div class="widget_text ts segment sidebarowo"><h5 class="ts header" style="margin-bottom: 5px;">'.__( 'Updated today', 'Carter' ).'</h5>'.__( 'Updated today', 'Carter' ).' '. count($postslist) .__( ' item,', 'Carter' ). '<a href="' . home_url('/').date('Y/m/d') . '">'.__( 'Read More', 'Carter' ).'</a>。</div>';
    }else{
        return false;
    }
}

/*
	底部欄 1
*/
function register_Footer1() {
    register_sidebar( array(
       	'name' => __( 'Footer 1', 'Carter' ),
		'id' => 'footer1',
		'description' => __( 'Displayed at the bottom of each page.', 'Carter' ),
		'before_widget' => '<div class="ts segment sidebarowo">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="ts header" style="margin-bottom: 5px;">',
		'after_title' => '</h5>'
    ) );
}
add_action( 'widgets_init', 'register_Footer1' );
/*
	底部欄 2
*/
function register_Footer2() {
    register_sidebar( array(
       	'name' => __( 'Footer 2', 'Carter' ),
		'id' => 'footer2',
		'description' => __( 'Displayed at the bottom of each page.', 'Carter' ),
		'before_widget' => '<div class="ts segment sidebarowo">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="ts header" style="margin-bottom: 5px;">',
		'after_title' => '</h5>'
    ) );
}
add_action( 'widgets_init', 'register_Footer2' );
/*
	底部欄 3
*/
function register_Footer3() {
    register_sidebar( array(
       	'name' => __( 'Footer 3', 'Carter' ),
		'id' => 'footer3',
		'description' => __( 'Displayed at the bottom of each page.', 'Carter' ),
		'before_widget' => '<div class="ts segment sidebarowo">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="ts header" style="margin-bottom: 5px;">',
		'after_title' => '</h5>'
    ) );
}
add_action( 'widgets_init', 'register_Footer3' );

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
function posts_link_attributes_next() {
    return 'class="ts primary right labeled icon button click load"';
}
function posts_link_attributes_previous() {
    return 'class="ts inverted labeled icon button click load"';
}
add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_previous');


/*
	登入介面美化
*/
function gnehs_login_css() { ?>
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/login-page.css" rel="stylesheet">
<?php }
add_action('login_head', 'gnehs_login_css');
/*
	餵給編輯器的 CSS
*/
function sig_add_editor_styles() {
    add_editor_style( '/tocas-ui/tocas.css' );
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'sig_add_editor_styles' );

function gutenberg_scripts() {
	wp_enqueue_style( 'gutenbergbase-style', get_theme_file_uri( '/css/style.css' ), false);
	wp_enqueue_style( 'gutenbergbase-tocas', get_theme_file_uri( '/tocas-ui/tocas.css' ), false);
}
add_action( 'enqueue_block_editor_assets', 'gutenberg_scripts' );
/*
	文章描述
*/
//長度
function wpdocs_custom_excerpt_length( $length ) {
    return 180;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
//後面的……
function wpdocs_excerpt_more( $more ) {
    return '……';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/*
	隱藏版本
*/
// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function shapeSpace_remove_version_scripts_styles($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('style_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);
/*
	menu walker 
*/
class Walker_Quickstart_Menu extends Walker {
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( "<a class='item' href='%s'%s>%s</a>",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }
}
/*
	主題設定頁面


function carter_menu() {
	add_options_page( 'Carter', 'Carter', 'manage_options', 'carter', 'carter_options' );
}
add_action( 'admin_menu', 'carter_menu' );
function carter_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
*/
/*
	密碼保護頁面
*/
function carter_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="ts form">
		<fieldset class="secondary">
			<div class="field">
				<p>' . __( 'This content is password protected. To view it please enter your password below:' ) . '</p>
				<div class="ts action fluid input">
					<input type="password" placeholder="'.__( "Password" ).'" id="' . $label . '" name="post_password">
					<button class="ts button">'.__( "Submit" ).'</button>
				</div>
			</div>
		</fieldset>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'carter_password_form' );
/*
	Meta Tag
*/
function meta_get_excerpt($post_id) {
    $temp = $post;
    $post = get_post( $post_id );
    setup_postdata( $post );

    $excerpt = esc_attr(strip_tags(get_the_excerpt()));
    
    wp_reset_postdata();
    $post = $temp;

    return $excerpt;
}

function custom_add_meta_tag() {
	$meta_desc = is_singular() ? meta_get_excerpt(get_the_ID()) : get_bloginfo('description');
	echo '<meta property="description" content="' . $meta_desc . '"/>';
	if ( !is_singular()) //if it is not a post or a page
        return;
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="'.get_bloginfo('name').'"/>';
    if(!has_post_thumbnail( $post->ID )) { 
        echo '<meta property="og:image" content="https://picsum.photos/1200"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="'. esc_attr( $thumbnail_src[0] ) .'"/>';
	}

}
add_action('wp_head', 'custom_add_meta_tag', 1);
?>