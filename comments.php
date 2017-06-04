<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
	<?php 
    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
        // if there's a password
        // and it doesn't match the cookie
    ?>
    <div class="ts message">
        <div class="header">留言</div>
        <p>請先登入。</p>
    </div>
    <?php 
        } else if ( !comments_open() ) {
    ?>
    <div class="ts message">
        <div class="header">留言</div>
        <p>留言功能已關閉!😢</p>
    </div>
    <?php 
        } else if ( !have_comments() ) { 
    ?>
    <div class="ts message">
        <div class="header">留言</div>
        <p>還沒有留言，來插根頭香吧!🌚👏👏</p>
    </div>
    <?php 
        } else {
            wp_list_comments('type=comment&callback=aurelius_comment');
        }
    ?>
<?php 
if ( !comments_open() ) :
// If registration required and not logged in.
elseif ( get_option('comment_registration') && !is_user_logged_in() ) : 
?>
<p><a href="<?php echo wp_login_url( get_permalink() ); ?>">登入來留言</a></p>
<?php else  : ?>
<a name="respond"></a>
<a name="comments"></a>
<form class="ts form"  id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <?php if ( !is_user_logged_in() ) : ?>
		<div class="fields">
			
			<div class="field">
				<label>名稱</label>
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="23" tabindex="1" />
				<small>若非必要，請勿填寫真實姓名</small>
			</div>
			<div class="field">
				<label>電子郵件</label>
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="23" tabindex="2" />
				<small>這將不會被公開</small>
			</div>
			<div class="field">
				<label>網址</label>
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="23" tabindex="3" />
				<small>選填</small>
			</div>
		
		</div>
       <?php else : ?>
		<div class="field">
			<label>名稱</label>
			<span class="text"><?php echo $user_identity; ?></span>
		</div>
    <?php endif; ?>
    <div class="resizable field">
        <label>你的留言</label>
        <textarea id="message comment" name="comment"  tabindex="4"></textarea>
    </div> 
	<a href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()" class="ts button">留言</a> 
	<?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; ?>