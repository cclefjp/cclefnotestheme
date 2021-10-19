<!-- 全てのページのヘッダを記載 -->
<!DOCTYPE HTML>
<html lang="<?php bloginfo( 'language' ); ?>">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <?php echo cnt_include_webfonts(); ?>
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
        <title><?php get_the_title(); ?></title>
        <?php wp_head(); ?>
        <?php echo 'headタグまで終了しました'; ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <header id="header" style="background: <?php echo cnt_get_header_img_cssstyle( 'no-repeat' ); ?> background-size: cover;">
                <div class="header-inner">
                    <?php the_widget('CNT_LogoWidget'); ?>
                    <?php echo '1'; ?>
                    <div class="header-searchbox">
                        <?php get_search_form(true); ?>
                    </div>
                    <div class="header-navi">
                    <?php echo '2'; ?>
                        <nav class="header-navi">
                        <?php wp_nav_menu(
                            array ( 
                            'theme_location' => 'header-navi'
                        )
                        ); ?>
                        </nav>
                    </div> <!-- header-navi -->
                    <div class="<?php echo cnt_get_title_class(); ?>" style="
                    color: <?php echo cnt_get_header_font_color(); ?>;
                    font-family: <?php echo cnt_get_title_font_family(); ?>;
                    ">
                                            <?php echo '3'; ?>
                        <?php echo cnt_get_page_title(); ?>
                    </div><!-- page-title -->
                </div> <!-- header-inner -->
            </header>
            <div class="page-body">
            <?php echo '4'; ?>
            	<?php if ( function_exists( 'cnt_breadcrumb' )): ?>
              	<div class="breadcrumb">
									<?php cnt_breadcrumb(); ?>
								</div><!-- breadcrumb -->
							<?php endif; ?>
<?php
echo 'header.phpの読み込みが終了しました。';