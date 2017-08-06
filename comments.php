<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        
    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
        // if there's a password
        // and it doesn't match the cookie
    ?>
        
		<h3 class="ts header" id="LeaveAcomment">
            <?php esc_html_e( 'Leave a comment', 'Carter' ); ?>
            <div class="sub header"><?php esc_html_e( 'Please login first', 'Carter' ); ?></div>
        </h3>
    <?php 
        } else if ( !comments_open() ) {
    ?>
        
		<h3 class="ts header" id="LeaveAcomment">
            <?php esc_html_e( 'Leave a comment', 'Carter' ); ?>
            <div class="sub header"><?php esc_html_e( 'Comments are closed 😢', 'Carter' ); ?></div>
        </h3>
    <?php 
        } else if ( !have_comments() ) { 
    ?>
		<h3 class="ts header" id="LeaveAcomment">
            <?php esc_html_e( 'Leave a comment', 'Carter' ); ?>
            <div class="sub header"><?php esc_html_e( 'Leave a comment!🌚👏👏', 'Carter' ); ?></div>
        </h3>
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
<p><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php esc_html_e( 'Please login first', 'Carter' ); ?></a></p>
<?php else  : ?>
<a name="respond"></a>
<a name="comments"></a>
<form class="ts form"  id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <?php if ( !is_user_logged_in() ) : ?>
		<div class="fields">
			<div class="field">
                <label><?php esc_html_e( 'Name', 'Carter' ); ?></label>
                <div class="ts fluid input">
                    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="23" tabindex="1" />
                </div>
				<small><?php esc_html_e( 'Please do not fill in the real name', 'Carter' ); ?></small>
			</div>
			<div class="field">
				<label><?php esc_html_e( 'E-mail', 'Carter' ); ?></label>
                <div class="ts fluid input">
				    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="23" tabindex="2" />
                </div>
				<small><?php esc_html_e( 'This will not be made public', 'Carter' ); ?></small>
			</div>
			<div class="field">
				<label><?php esc_html_e( 'URL', 'Carter' ); ?></label>
                <div class="ts fluid input">
				    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="23" tabindex="3" />
                </div>
				<small><?php esc_html_e( 'Optional', 'Carter' ); ?></small>
			</div>
		
		</div>
       <?php else : ?>
		<div class="field">
			<label><?php esc_html_e( 'Name', 'Carter' ); ?></label>
			<span class="text"><?php echo $user_identity; ?></span>
		</div>
    <?php endif; ?>
    <div class="resizable field"><div class="ts fluid input">
        <textarea id="message comment" name="comment"  tabindex="4" style="max-width: 100%" placeholder="<?php esc_html_e( 'Leave a comment', 'Carter' ); ?>"></textarea>
    </div></div> 
    <a href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()" class="ts fluid bottom button"><?php esc_html_e( 'Leave a comment', 'Carter' ); ?></a> 
	<?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; ?>