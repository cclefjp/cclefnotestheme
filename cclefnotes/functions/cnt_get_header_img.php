<?php

/* ヘッダー画像のURLを得る */
function cnt_get_header_img() {

    /* 'header_img' というカスタムフィールドを検索 */
    $header_img_url = get_post_meta(get_the_ID(), 'header_img', true);
    if ( $header_img_url ) {
        return $header_img_url;
    }
    else {
        /* デフォルトのヘッダー画像 */
        $img_src = get_option( 'cnt_default_header_img' );
        if ( $img_src ) {
            return get_site_url() . '/' . $img_src;
        }
    }
    return '';
}
