<?php

/* 投稿アーカイブを有効にしてスラッグを指定する */
function cnt_post_has_archive( $args, $post_type ) {

    $args['rewrite'] = true;
    if ( $post_type == 'post' ) {
        $urlslug = get_option( 'cnt_blogarchive_slug' );
        if (! $urlslug ) {
            $urlslug = 'blog';
        }
        
    } else {
        $urlslug = $post_type;
    }
    $args['has_archive'] = $urlslug;
    return $args;
}

add_filter( 'register_post_type_args', 'cnt_post_has_archive', 10, 2 );