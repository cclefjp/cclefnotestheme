<li class="searchresult-box" style="
	background: url(<?php echo cnt_get_searchresult_background(); ?>) repeat;
">
  <a class="searchresult-link" href="<?php the_permalink(); ?>">
    <div class="link-container">
      <div class="post-thumbnail">
				<?php echo cnt_get_post_thumbnail(); ?>
    	</div><!-- image -->
    	<dl>
      	<dt><?php the_title(); ?></dt>
      		<dd class="description"><?php echo get_the_excerpt(); ?></dd>
    	</dl>
  	</div><!-- item-wrapper -->
  </a>
</li>