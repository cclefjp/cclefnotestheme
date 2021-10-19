<?php
function cnt_get_pagetitle() {
    if ( is_post_type_archive() ):
        return(post_type_archive_title());
    else:
        return(get_the_title());
}