<?php get_header(); ?>
<div class="page-inner">
  <div class="page-main" id="pg-search">
		<?php get_search_form( true ); ?>
    <div class="searchResult-wrapper">
			<?php if ( get_search_query() ): ?>		    
      <div class="searchResult-head">
        <h3 class="title">「<?php the_search_query(); ?>」の検索結果</h3>
          <div class="total">全<?php echo $wp_query->found_posts; ?>件</div>
      </div><!-- searchResult-head -->
			<?php endif; ?>		    
    	<ul class="postLists">
			<?php		      
 				if ( have_posts() && get_search_query() ) :
 				while ( have_posts() ) : the_post();
				      get_template_part('content-search');
				endwhile; ?>		      
      </ul>
      <div class="pager">
        <ul class="pagerList">
				<?php
					if ( function_exists( 'cnt_pagenavi' ) ):
						cnt_pagenavi( $wp_query );
					endif;
				?>			
        </ul>
      </div><!-- pager -->
		<?php elseif( ! get_search_query() ): ?>
			<p> 検索ワードが入力されていません</p>
		<?php else: ?>
			<p>該当する記事は見つかりませんでした。</p>
		<?php endif; ?>
  	</div><!-- searchResult-wrapper -->
	</div><!-- page-main -->
</div><!-- page-inner -->
<?php  get_footer(); ?>