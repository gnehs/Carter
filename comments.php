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
        <div class="header"><?php esc_html_e( '留言', 'Carter' ); ?></div>
        <p><?php esc_html_e( '請先登入。', 'Carter' ); ?></p>
    </div>
    <?php 
        } else if ( !comments_open() ) {
    ?>
    <div class="ts message">
        <div class="header"><?php esc_html_e( '留言', 'Carter' ); ?></div>
        <p><?php esc_html_e( '留言功能已關閉!😢', 'Carter' ); ?></p>
    </div>
    <?php 
        } else if ( !have_comments() ) { 
    ?>
    <div class="ts message">
        <div class="header"><?php esc_html_e( '留言', 'Carter' ); ?></div>
        <p><?php esc_html_e( '還沒有留言，來插根頭香吧!🌚👏👏', 'Carter' ); ?></p>
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
<p><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php esc_html_e( '登入來留言', 'Carter' ); ?></a></p>
<?php else  : ?>
<a name="respond"></a>
<a name="comments"></a>
<form class="ts form"  id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <?php if ( !is_user_logged_in() ) : ?>
		<div class="fields">
			
			<div class="field">
				<label><?php esc_html_e( '名稱', 'Carter' ); ?></label>
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="23" tabindex="1" />
				<small><?php esc_html_e( '若非必要，請勿填寫真實姓名', 'Carter' ); ?></small>
			</div>
			<div class="field">
				<label><?php esc_html_e( '電子郵件', 'Carter' ); ?></label>
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="23" tabindex="2" />
				<small><?php esc_html_e( '這不會被公開', 'Carter' ); ?></small>
			</div>
			<div class="field">
				<label><?php esc_html_e( '網址', 'Carter' ); ?></label>
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="23" tabindex="3" />
				<small><?php esc_html_e( '選填', 'Carter' ); ?></small>
			</div>
		
		</div>
       <?php else : ?>
		<div class="field">
			<label><?php esc_html_e( '名稱', 'Carter' ); ?></label>
			<span class="text"><?php echo $user_identity; ?></span>
		</div>
    <?php endif; ?>
    <div class="resizable field">
        <label><?php esc_html_e( '留言', 'Carter' ); ?></label>
        <textarea id="message comment" name="comment"  tabindex="4"></textarea>
    </div> 
    <a href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()" class="ts fluid bottom button"><?php esc_html_e( '留言', 'Carter' ); ?></a> 
	<?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; ?>