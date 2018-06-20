<?php

if ( ! function_exists( 'ntt_comment_author') ) {
    function ntt_comment_author( $comment, $args ) {
        
        $comment_author = get_comment_author(); ?>

        <div class="cm-author comment-author p-author h-card author cp" data-name="Comment Author CP">
            <div class="cm-author---cr comment-author---cr">

            <?php if ( get_comment_author_url() ) {
                $anchor_tag_start = '<a href="'. get_comment_author_url(). '" class="comment-author-name---a p-name u-url a" title="'. $comment_author. '">';
                $anchor_tag_end = '</a>';
                
            } else {
                $anchor_tag_start = '';
                $anchor_tag_end = '';
            } ?>

                <span class="cm-glabel commented-by-glabel glabel obj">
                    <span class="commented---txt txt "><?php echo esc_html_x( 'Commented', 'Component: Comment Author | Usage: >Commented< by <Author Name>', 'ntt' ); ?></span>
                    <span class="by---txt txt "><?php echo esc_html_x( 'by', 'Component: Comment Author | Usage: Commented >by< <Author Name>', 'ntt' ); ?></span>
                </span>
                
                <span class="cm-author-name comment-author-name author-name name obj" data-name="Comment Author Name">
                    <?php echo $anchor_tag_start; ?>
                        <span class="comment-author-name---l l">
                            <span class="comment-author-name---txt txt"><?php echo esc_html( $comment_author ); ?></span>
                        </span>
                    <?php echo $anchor_tag_end; ?>
                </span>

                <span class="cm-avatar comment-author-avatar author-avatar avatar obj" data-name="Comment Author Avatar">
                    <?php echo $anchor_tag_start;
                    echo get_avatar(
                        $comment,
                        $size = '48',
                        $default = '',
                        $alt = $comment_author. ' '. 'Avatar',
                        $args = array( 'class' => 'comment-author-avatar---img author-avatar---img avatar---img u-photo img', )
                    );
                    echo $anchor_tag_end; ?>
                </span>

            </div>
        </div>
    <?php }
}