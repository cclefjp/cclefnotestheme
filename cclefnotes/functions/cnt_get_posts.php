<?php

include_once('cnt_get_customposts.php');

/* 公開ブログ投稿一覧を得る */
function cnt_get_posts() {
    return cnt_get_customposts('post');
}
