<?php

/* 記事一覧ページでページャーを出力する */
function cnt_pagenavi( $the_query ) {

    echo '<!-- cnt_pagenavi -->';
    $big = 999999999;

    $param = array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '/page/%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $the_query->max_num_pages
    );

    echo paginate_links( $param );
    

}