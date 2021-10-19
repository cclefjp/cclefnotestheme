<?php
/* functions.php - cclef notes theme用の関数群 */

echo 'functions.phpを読み込んでいます。';

/* カスタムメニューを有効化する */
register_nav_menus(
    array(
    'header-navi' => 'Header Menu',
    'footer-navi' => 'Footer Menu'
    )
);

/* アイキャッチ画像を使用可能にする */
add_theme_support('post-thumbnails');

/* 個別に記載された関数のインクルード */
include_once('functions/cnt_include_webfonts.php');
include_once('functions/cnt_get_header_img_cssstyle.php');
include_once('functions/cnt_logowidget.php');
include_once('functions/cnt_get_title_class.php');
include_once('functions/cnt_get_header_font_color.php');
include_once('functions/cnt_get_title_font_family.php');
include_once('functions/cnt_get_page_title.php');
include_once('functions/cnt_breadcrumb.php');
include_once('functions/cnt_get_sns_link.php');
include_once('functions/cnt_get_copyright_statement.php');
include_once('functions/cnt_get_customposts.php');
include_once('functions/cnt_get_posts.php');
include_once('functions/cnt_pagenavi.php');
include_once('functions/cnt_post_has_archive.php');
include_once('functions/cnt_get_post_background.php');
include_once('functions/cnt_get_post_thumbnail.php');
include_once('functions/cnt_get_searchresult_background.php');
include_once('functions/cnt_post_has_archive.php');
include_once('functions/cnt_tocwidget.php');

/* サイト全体の設定項目を管理する設定ページ */
include_once('cnt-settings.php');

/* 検索フォームにHTML5マークアップのサポートを追加 */
add_theme_support('html5', array('search-form'));

echo 'function.phpの読み込みが終了しました。';