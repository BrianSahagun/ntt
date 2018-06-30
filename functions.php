<?php

$GLOBALS['ntt_name'] = 'NTT';

// Functions
$r_functions = array(
    
    // First things first
    'settings',
    'hooks',
    'styles-scripts',
    
    'body-css',
    'comments-css',
    'comment-form',
    'custom-fonts',
    'custom-visuals',
    'wp-customizer',
    'wp-customizer-custom-colors',
    'entry-content',
    'entry-css',
    'excerpt',
    'gallery',
    'features',
    'html-css',
    'icons',
    'pingback-header',
    'widgets-asides',
);

foreach ( $r_functions as $file_name ) {
    require( get_parent_theme_file_path( '/includes/functions/'. $file_name. '.php' ) );
}

// Tags
$r_tags = array(
    'breadcrumbs-navigation',
    'comment',
    'comment-actions',
    'comment-author',
    'comment-datetime',
    'comments-actions-snippet',
    'comments-nav',
    'entity-navigation',
    'entries-navigation',
    'entry-actions',
    'entry-author',
    'entry-content-navigation',
    'entry-datetime',
    'entry-meta',
    'entry-navigation',
    'entry-taxonomy',
    'show-more-action',
    'view-name',
);

foreach ( $r_tags as $file_name ) {
    require( get_parent_theme_file_path( '/includes/tags/'. $file_name. '.php' ) );
}