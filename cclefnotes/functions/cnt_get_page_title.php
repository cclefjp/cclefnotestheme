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
    } else if (is_post_type_archive()) { // 投稿アーカイブページの場合
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);
        $archive_title = $post_type_obj->labels->menu_name;
        if (! $archive_title ) {
            $archive_title = post_type_archive_title();
        }
        return $archive_title;
    }
    else {
        echo '<!-- gpt_not_front -->';
        return get_the_title();
    }
}
