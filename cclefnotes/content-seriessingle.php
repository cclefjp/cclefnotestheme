<!-- 個別の投稿ページの表示 -->
<article class="postdetail">
		<div class="post-container">
            <div class="series_sidebar">
                <?php if ( is_active_sidebar( 'cnt_left_sidebar') ): ?>
                <ul id="left_sidebar">
                    <?php dynamic_sidebar( 'cnt_left_sidebar' ); ?>
                </ul>
                <?php else: ?>
                    <?php echo '左サイドバーがactiveではありません。'; ?>
                <?php endif; ?>
            </div><!-- series_sidebar -->
			<div class="post-body"><?php the_content(); ?></div><!-- post-body -->
			<div class="toc-sidebar">
				<?php //echo 'sidebar!'; ?>
				<?php if ( is_active_sidebar( 'cnt_right_sidebar' ) ) : ?>
				<ul id="right_sidebar">
				<?php dynamic_sidebar( 'cnt_right_sidebar' ); ?>
				</ul>
				<?php else: ?>
				<?php echo '右サイドバーがactiveではありません。'; ?>
				<?php endif; ?>
				<?php // $result = dynamic_sidebar( 'cnt_right_sidebar' ); echo $result; ?>
			</div><!-- toc-sidebar -->
		</div><!-- post-container -->
</article><!-- postdetail -->


<div class="adjacent-posts">

<?php
$next_post = get_next_post();
$prev_post = get_previous_post();
if ( $prev_post ):
?>
  
  <span class="adjacent-posts">
    <a class="prev-link" href="<?php echo get_permalink( $prev_post->ID ); ?>">PREV</a>

<?php
endif;
if ($next_post ):
?>  

  	<a class="next-link" href="<?php echo get_permalink( $next_post->ID ); ?>">NEXT</a>
	</span>
<?php endif; ?>  
</div><!-- adjacent-posts -->