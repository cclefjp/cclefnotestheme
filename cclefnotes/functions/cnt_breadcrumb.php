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
                $post_type_obj = get_post_type_object($post_type);
                $archive_title = $post_type_obj->labels->menu_name;
                $archive_link = get_post_type_archive_link( $post_type );
            }
            echo '<a href="' . $archive_link . '">' . $archive_title . '</a>';
            echo ' &gt; ';
        }


        echo '<!-- current -->';
        if (is_post_type_archive()) {
        /* カスタム投稿タイプのアーカイブページの場合 */
            $post_type = get_post_type();
            $post_type_obj = get_post_type_object($post_type);
            $archive_title = $post_type_obj->labels->menu_name;
            $archive_slug1 = get_option('cnt_blogarchive_slug');
            $archive_slug2 = $post_type_obj->name;
            $archive_link = get_site_url() . '/' . $archive_slug1 . '/' . $archive_slug2;
        } else {
            $archive_title = get_the_title();
            $archive_link = get_the_permalink();
        }
        echo '<a href="';
        echo $archive_link;
        echo '" rel="bookmark" title="';
        echo $archive_title;
        echo '">';
        echo $archive_title;
        echo '</a>';
    }
}