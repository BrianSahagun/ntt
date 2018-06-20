<?php

// https://bavotasan.com/2012/a-better-wp_link_pages-for-wordpress/

if ( ! function_exists('ntt_entry_content_nav' ) ) {
    function ntt_entry_content_nav( $args = '' ) {

        // For Theme Check
        ob_start();
        wp_link_pages( $args );
        ob_end_clean();
        
        $navi_text = '';
        $navi_text .= '<span class="page---txt txt">'. esc_html__( 'Page', 'ntt' ). '</span>';
        $navi_text .= ' '. '<span class="page-number---txt num txt">%</span>';

        $defaults = array(
            'before' => '<ul class="entry-content-nav-group nav-group group list">',
            'after' => '</ul>',
            'text_before' => '',
            'text_after' => '',
            'next_or_number' => 'number', 
            'nextpagelink' => __( 'Next Page', 'ntt' ),
            'previouspagelink' => __( 'Previous Page', 'ntt' ),
            'pagelink' => $navi_text,
            'echo' => 1,
        );
        
        $r = wp_parse_args( $args, $defaults );
        $r = apply_filters( 'wp_link_pages_args', $r );
        extract( $r, EXTR_SKIP );

        global $post, $page, $numpages, $multipage, $more, $pagenow;
        
        if ( $multipage ) {

            $content_pagination_group = '';

            if ( 'number' == $next_or_number ) {
                $content_pagination_group .= $before;
                
                for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
                    $j = str_replace( '%', $i, $pagelink );
                    
                    $content_pagination_group .= ' ';
                    
                    if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) ) {
                        $content_pagination_group .= '<li class="entry-content-navi navi obj item">';
                        $content_pagination_group .= _wp_link_page( $i );
                        $content_pagination_group .= '<span class="entry-content-navi---l l">';
                    } else {
                        $content_pagination_group .= '<li class="entry-content-navi--current entry-content-navi navi obj item">';
                        $content_pagination_group .= '<span class="entry-content-navi---g g">';
                        $content_pagination_group .= '<span class="entry-content-navi---l l">';
                    }

                    $content_pagination_group .= $text_before . $j . $text_after;
                    
                    if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) ) {
                        $content_pagination_group .= '</span>';
                        $content_pagination_group .= '</a>';
                    } else {
                        $content_pagination_group .= '</span>';
                        $content_pagination_group .= '</span>';
                    }
                    $content_pagination_group .= '</li>';
                }
                $content_pagination_group .= $after;
            }

            else {
                
                if ( $more ) {
                    $content_pagination_group .= $before;
                    $i = $page - 1;
                    
                    if ( $i && $more ) {
                        $content_pagination_group .= _wp_link_page( $i );
                        $content_pagination_group .= $text_before . $previouspagelink . $text_after . '</a>';
                    }
                    $i = $page + 1;
                    
                    if ( $i <= $numpages && $more ) {
                        $content_pagination_group .= _wp_link_page( $i );
                        $content_pagination_group .= $text_before . $nextpagelink . $text_after . '</a>';
                    }
                    $content_pagination_group .= $after;
                }
            } ?>

            <div role="navigation" class="entry-content-nav nav pagination cp" data-name="Entry Content Navigation">
                <div class="entry-content-nav---cr">
                
                    <div class="entry-content-nav-name nav-name name obj" data-name="Entry Content Navigation Name">
                        <span class="content-nav---txt txt"><?php echo esc_html__( 'Entry Content Navigation', 'ntt' ); ?></span>
                    </div>
                
                <?php echo $content_pagination_group; ?>
                
                </div>
            </div>
            
        <?php }
    }
}