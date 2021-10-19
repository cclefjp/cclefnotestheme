<?php

/* パンくずナビを出力する */
function cnt_breadcrumb() {
    /* 404 not foundの場合は出力しない */
    if ( is_404() || is_search() ) {
        return;
    }
    $post = get_post( get_the_ID() );

    $parent_post = $post->post_parent;
    $parent_title = get_the_title( $parent_post );

    while( $parent_title != the_title( ' ', ' ', false) ) {

        /* 親がない場合はトップページの情報を表示 トップページ自身には表示しない */
        if ( ! $parent_post) {
            echo '<!-- top -->';
            $frontid = get_option( 'page_on_front' );
            if (! is_front_page() ) {
                echo '<a href="' . get_permalink( $frontid ) . '" title="トップページ"> トップページ</a>';
                echo ' &gt; ';
            }
        } else {
            echo '<!-- parent -->';
            echo '<!-- ';
            print_r($parent_post);
            echo ' -->';
            echo '<a href="' . get_permalink( $parent_post ) . '" title="' . $parent_title . '">' . $parent_title . '</a>';

        }
        
        if ( $parent_post ) {
            $parent_post = $parent_post->post_parent;
        }
        $parent_title = get_the_title($parent_post);
        if ( ! $parent_post ) {
            break;
        } else {
            echo ' &gt; ';
        }
        
    }

    // 続けて現在の投稿へのリンク
    if ( ! is_front_page() ) {

        /* 投稿では投稿アーカイブページのリンクを入れる */
        if ( is_single() ) {
            echo '<!-- 1 -->';
            $post_type = get_post_type();
            echo '<!-- 2 $post_type = ' . $post_type . ' -->';
            if ( $post_type == 'post' ) {
                $archive_slug = get_option('cnt_blogarchive_slug');
                $archive_link = get_site_url() . '/' . $archive_slug;
                $archive_page = get_page_by_path($archive_slug, OBJECT);
                $archive_title = $archive_page->post_title;
            }
            else {
                $archive_link = get_post_type_archive_link( $post_type );
                echo '<!-- 3 $archive_link = ' . $archive_link . ' -->';
                $page_path = basename( untrailingslashit( $archive_link ) );
                echo '<!-- 3.5 $page_path = ' . $page_path . ' -->';
                $archive_page = get_page_by_path( $page_path, OBJECT );
                echo '<!-- 3.6 $archive_page = ';
                print_r($archive_page);
                $archive_title = $archive_page->post_title;
                echo '<!-- archive $archive_title = ' . $archive_title . ' -->';
            }
            echo '<a href="' . $archive_link . '">' . $archive_title . '</a>';
            echo ' &gt; ';
        }

        echo '<!-- current -->';
        echo '<a href="';
        the_permalink();
        echo '" rel="bookmark" title="';
        the_title_attribute();
        echo '">';
        the_title();
        echo '</a>';
    }
}