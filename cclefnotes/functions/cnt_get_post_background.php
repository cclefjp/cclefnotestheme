<?php

/* 投稿一覧用の背景画像を呼び出し、URLを返す。
この関数はWordPressループ内で呼び出すこと */
function cnt_get_post_background() {

    $img_src = get_option( 'cnt_default_post_background');
    if ( $img_src ) {
        return get_site_url() . '/' . $img_src;
    }
}