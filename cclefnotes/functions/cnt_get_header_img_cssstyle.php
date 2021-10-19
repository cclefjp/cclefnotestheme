<?php

/* ヘッダー画像をCSSスタイルで返す url(...) */
function cnt_get_header_img_cssstyle( $css_option ) {
    $imgurl = tfp_get_header_img();
    if ( $imgurl ) {
        $imgcss = 'url(' . $imgurl . ') ' . $css_option . ';';
        return $imgcss;
    }
    else {
        return '';
    }
}