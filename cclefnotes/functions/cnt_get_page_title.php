<?php

/* ページタイトルを得る(ヘッダー部画像重ね表示用) */
function cnt_get_page_title() {
    echo '<!-- cnt_get_page_title -->';
    if( is_front_page() ) {
        echo '<!-- gpt_front -->';
        return get_bloginfo( 'name' );
    } else if (is_404() ) {
        echo '<!-- gpt_404 -->';
        return '404 Not Found';
    } else if (is_search()) {
        return '検索結果';
    } 
    else {
        echo '<!-- gpt_not_front -->';
        return get_the_title();
    }
}
