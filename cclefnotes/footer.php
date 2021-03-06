<!-- すべてのページのフッタ部分を記載 -->
</div><!-- page-body -->
            <footer class="footer" id="footer">
                <div class="footerContents">
                    <div class="footer-navi">
                        <nav class="footer-navi">
                        <?php
                        wp_nav_menu(
                            array (
                                'theme_location' => 'place_footer',
                                'container' => false,
                            )
                            );
                        ?>
                        </nav>
                    </div><!-- footer-navi -->
                    <div class="sns-link">
                        <ul class="sns-link">
                            <?php echo cnt_get_sns_link(); ?>
                        </ul>
                    </div><!-- sns-link -->
                    <div class="copyright"> &copy;<?php echo cnt_get_copyright_statement(); ?> </div>
                </div><!-- footerContents -->
            </footer>
        </div> <!-- container -->
        <?php wp_footer(); ?>
    </body>
</html>