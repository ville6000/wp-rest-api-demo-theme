<?php

add_action( 'wp_enqueue_scripts', 'wprestapidemo_enqueue_styles' );
function wprestapidemo_enqueue_styles() {
    wp_enqueue_style(
        'style',
        get_template_directory_uri() . '/assets/css/styles.min.css',
        false,
        date( 'dmYhi', filemtime( get_template_directory() . '/assets/css/styles.min.css' ) )
    );

    wp_enqueue_script(
        'vendor',
        get_template_directory_uri() . '/assets/js/vendor.min.js',
        array( 'jquery' ),
        date( 'dmYhi', filemtime( get_template_directory() . '/assets/js/vendor.min.js' ) ),
        true
    );

    wp_enqueue_script(
        'app',
        get_template_directory_uri() . '/assets/js/app.min.js',
        array( 'vendor' ),
        date( 'dmYhi', filemtime( get_template_directory() . '/assets/js/app.min.js' ) ),
        true
    );
}

add_action( 'rest_api_init', 'slug_register_siglings' );
function slug_register_siglings() {
    register_api_field( 'post',
        'siblings',
        array(
            'get_callback'    => 'slug_get_siglings',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function slug_get_siglings( $object, $field_name, $request ) {
    $next_post = get_adjacent_post( false, '', false);
    $prev_post = get_adjacent_post( false, '', true);

    return array(
        'next' => $next_post->ID,
        'prev' => $prev_post->ID,
    );
}
