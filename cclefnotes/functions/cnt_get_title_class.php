<?php

/* タイトルクラスを返す関数 */
function cnt_get_title_class() {
    if ( is_page() ) { /* 固定ページ */
        return 'page-title';
    }
    elseif ( is_single() ) { /* 投稿ページ */
        return 'post-title';
    }
    else { /* デフォルトはpage-title */
        return 'page-title';
    }
}