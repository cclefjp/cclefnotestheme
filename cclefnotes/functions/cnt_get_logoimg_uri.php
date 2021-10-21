<?php

/* ロゴ画像を得る */
function cnt_get_logoimg_uri() {
    $logoimgpath = get_site_url() . '/' . get_option( 'cnt_logo_img' );
    return esc_url( $logoimgpath );
}
