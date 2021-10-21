<?php

/* カスタム投稿タイプの投稿一覧を得る */
function cnt_get_customposts( $post_type ) {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array (
        'post_type' => $post_type,
        'order' => 'DESC',
        'paged' => $paged
    );
    $cnt_customposts = new WP_Query($args);
    return $cnt_customposts;
}