<?php

/**
 * cnt-settings.php
 * Cclef Notes Themeのサイト全体に影響するの設定画面に関する記載
 */

 /* メニューにcnt設定画面を追加 */
 add_action('admin_menu', 'cnt_setting_menu');
 function cnt_setting_menu() {
     add_options_page(
         'Cclef Notes Theme', //タイトル
         'CNT', //表示名
         'manage_options', //権限
         'cnt_settings', //ページid
         'cnt_setting_page' //Viewを読み出す関数
     );
 }

 /* 設定ページ内のフィールドの作成 */
add_action('admin_init', 'register_cnt_settings');
function register_cnt_settings() {
    $cnt_options = ['blogarchive_slug',
                    'logo_img',
                    'logowidget_use_image',
                    'logowidget_use_titletext',
                    'default_header_img',
                    'default_post_background',
                    'default_searchresult_background',
                    'header_font_color',
                    'webfonts',
                    'title_fontfamily',
                    'copyright_statement',
                    'twitter_account',
                    'github_account'];
    foreach($cnt_options as $cnt_option) {
        register_setting('cnt_settings', 'cnt_' . $cnt_option);
    }
}

/* Viewの設定 */
function cnt_setting_page() {
    include 'view-cntsettings.php';
}