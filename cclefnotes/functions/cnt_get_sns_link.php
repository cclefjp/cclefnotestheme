<?php

/* フッター部のSNS linkコードを出力する。 */
/* <li class="..."><a ...></li>の繰り返し */
function cnt_get_sns_link() {
    $statement = '';

    /* twitter */
    $twitter_account = get_option( 'cnt_twitter_account' );
    if ( $twitter_account) {
        $statement = $statement . '<li class="twitter"><a class="twitter-anker" href="https://twitter.com/';
        $statement = $statement . $twitter_account . '" target="_blank" rel="noopener noreferrer"></a></li>';
    }

    /* github */
    $github_account = get_option( 'cnt_github_account' );
    if ( $github_account) {
        $statement = $statement . '<li class="github">';
        $statement = $statement . '<a class="github-anker" href="https://github.com/';
        $statement = $statement . $github_account . '" target="_blank" rel="noopener noreferrer"></a></li>';
    }

    return $statement;
}

