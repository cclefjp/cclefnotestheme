<?php

/* 使用するWebフォントをインクルードするHTMLコードを返す */
function cnt_include_webfonts() {
    echo '<!-- cnt_include_webfonts -->';
    $webfonts_src = get_option('cnt_webfonts');
    $exploded = explode("\n", $webfonts_src);
    $result = '';
    foreach ( $exploded as $url) {
        if ( $url ) {
            $result = $result . '<link rel="stylesheet" href="' . $url . '">';
        }
    }
    return $result;
}
