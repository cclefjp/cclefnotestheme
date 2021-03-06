<?php
/**
 * Template Name: Single
 * Description: Template for individual blog pages
 */
?>
<!-- 公開投稿ページの構造を記載 -->
<?php get_header(); ?>
    <div class="page-inner full-width">
        <div class="page-main" id="postdetail">
            <div class="main-container">
                <div class="main-wrapper">
<?php
 if ( have_posts() ):
    while (  have_posts() ) :
        the_post();
        if ( get_the_terms($post->ID, 'series' ) ):
            get_template_part( 'content-seriessingle' );
        else:
            get_template_part( 'content-single' );
        endif;
 endwhile;
 endif;
 ?>
		        </div><!-- main-wrapper -->
		    </div><!-- main-container -->
		</div><!-- postdetail -->
	</div><!-- page-inner -->
<?php get_footer(); ?>
