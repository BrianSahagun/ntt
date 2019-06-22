<?php
/**
 * Show More Action
 */

function ntt_show_more_action( $excerpt ) {
    $show_more_of_text = _x( 'Show more of', 'Show more of Entry Name', 'ntt' );
    
    // Show More Attribute
    if ( get_the_title( get_the_ID() ) ) {
        $show_more_attr = $show_more_of_text. ' '. get_the_title( get_the_ID() );
    } else {
        $show_more_attr = $show_more_of_text. ' '. __( 'Entry', 'ntt' ). ' '. get_the_id();
    }

    // More Hash
    if ( ! is_search() ) {
        $more_hash = '#more-'. get_the_ID();
    } else {
        $more_hash = '';
    }

    $excerpt = '<div aria-label="'. esc_attr( $show_more_attr ).'" title="'. esc_attr( $show_more_attr ).'" class="ntt--show-more-axn ntt--axn ntt--obj" data-name="Show More Action">';
        $excerpt .= '<a href="'. esc_url( get_permalink( get_the_ID() ). $more_hash ). '">';
            $excerpt .= '<span class="ntt--txt">'. esc_html_x( 'More', 'Show More of Entry', 'ntt' ). '</span>';
        $excerpt .= '</a>';
    $excerpt .= '</div>';

    return $excerpt;
}

/**
 * <!--more--> Quicktag
 */

function ntt_more_quicktag_excerpt( $excerpt ) {
    
    if ( is_home() || is_archive() ) {
        return ntt_show_more_action( $excerpt );
    }
}
add_filter( 'the_content_more_link', 'ntt_more_quicktag_excerpt' );

/**
 * Auto-Excerpt Delimiter
 */

function ntt_auto_excerpt_delimiter( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'ntt_auto_excerpt_delimiter' );

/**
 * Manual Excerpt, Search Excerpt
 */

function ntt_manual_excerpt_search_excerpt( $excerpt ) {
    
    if ( is_search() ) {
        ?>
        <p class="ntt--content-snippet ntt--obj" data-name="Content Snippet">
            <a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><?php echo esc_html( $excerpt ); ?></a>
        </p>
        <?php
        echo ntt_show_more_action( $excerpt );
    } else {
        return $excerpt;
    }
}
add_filter( 'get_the_excerpt', 'ntt_manual_excerpt_search_excerpt' );