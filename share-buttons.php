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