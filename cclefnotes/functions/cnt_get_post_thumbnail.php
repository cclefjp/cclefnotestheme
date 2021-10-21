<?php

/* 投稿一覧用のサムネイル画像を呼び出し、<img>タグのHTMLコードを返す。
この巻数はWordPressループ内で呼び出すこと */
function cnt_get_post_thumbnail() {
    if ( has_post_thumbnail() ) {
        $img_id = get_post_thumbnail_id();
        $img_src = wp_get_attachment_image_src($img_id, 'full');

        if ($img_src) {
            $img_code = '<img class="post-thumbnail-img" src=' . $img_src[0] . '>';
            return $img_code;
        }
    }
    return '';
}