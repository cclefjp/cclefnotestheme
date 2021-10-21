<?php

/* ページタイトルの表示に使用するフォントファミリーを得る */
function cnt_get_title_font_family() {
    $family = get_option('cnt_title_fontfamily');
    if ( $family ) {
        return $family;
    }
    else {
        return 'sans-serif';
    }
}