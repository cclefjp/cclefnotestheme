<div class="wrap">
    <h2> Cclef Notes Themeの設定 </h2>
    <form method="post", action="options.php">

    <?php settings_fields('cnt_settings'); ?>
    <?php do_settings_sections('cnt_settings'); ?>

    <!-- ここから各フィールドの設定 -->
    <table class="form-table">
        <tbody>

					<tr>
            <th scope="row">
            	<label for="cnt_blogarchive_slug">ブログアーカイブページのslug</label>
            </th>
            <td>
            (パンくずナビで使用します)
            </td>
            <td>
            	<input type="text" id="cnt_blogarchive_slug" class="regular-text" name="cnt_blogarchive_slug" value="<?php echo get_option('cnt_blogarchive_slug'); ?>">
            </td>
          </tr>

            <tr>
            <th scope="row">
            <label for="cnt_logo_img">ロゴ画像</label>
            </th>
            <td>
            <?php echo get_site_url() . '/'; ?>
            </td>
            <td>
            <input type="text" id="cnt_logo_img" class="regular-text" name="cnt_logo_img" value="<?php echo get_option('cnt_logo_img'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_logowidget_use_image">ロゴウィジェットでの画像表示</label>
            </th>
            <td>
            <input type="radio" id="cnt_logowidget_use_image" name="cnt_logowidget_use_image" value="true"
            <?php if( get_option( 'cnt_logowidget_use_image') == 'true') { echo 'checked="checked"'; } ?>>する
            <input type="radio" id="cnt_logowidget_use_image" name="cnt_logowidget_use_image" value="false"
            <?php if( get_option( 'cnt_logowidget_use_image') == 'false') { echo 'checked="checked"'; } ?>>しない
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_logowidget_use_titletext">ロゴウィジェットでのサイト名テキスト表示</label>
            </th>
            <td>
            <input type="radio" id="cnt_logowidget_use_titletext" name="cnt_logowidget_use_titletext" value="true"
            <?php if( get_option( 'cnt_logowidget_use_titletext') == 'true') { echo 'checked="checked"'; } ?>>する
            <input type="radio" id="cnt_logowidget_use_titletext" name="cnt_logowidget_use_titletext" value="false"
            <?php if( get_option( 'cnt_logowidget_use_titletext') == 'false') { echo 'checked="checked"'; } ?>>しない
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_default_header_img">デフォルトのヘッダー背景画像</label>
            </th>
            <td>
            <?php echo get_site_url() . '/'; ?>
            </td>
            <td>
            <input type="text" id="cnt_default_header_img" class="regular-text" name="cnt_default_header_img" value="<?php echo get_option('cnt_default_header_img'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_default_post_background">デフォルトの投稿サムネイル背景画像</label>
            </th>
            <td>
            <?php echo get_site_url() . '/'; ?>
            </td>
            <td>
            <input type="text" id="cnt_default_post_background" class="regular-text" name="cnt_default_post_background" value="<?php echo get_option('cnt_default_post_background'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_default_searchresult_background">デフォルトの検索結果サムネイル背景画像</label>
            </th>
            <td>
            <?php echo get_site_url() . '/'; ?>
            </td>
            <td>
            <input type="text" id="cnt_default_searchresult_background" class="regular-text" name="cnt_default_searchresult_background" value="<?php echo get_option('cnt_default_searchresult_background'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_header_font_color">ヘッダー部のロゴとページタイトルのフォント色</label>
            </th>
            <td>
            <input type="text" id="cnt_header_font_color" class="regular-text" name="cnt_header_font_color" value="<?php echo get_option('cnt_header_font_color'); ?>">
            </td>
            </tr>

            <th scope="row">
            <label for="cnt_webfonts">使用するWebフォントのリスト</label>
            </th>
            <td>
            使用するWebフォントのURLを改行で区切って記載します。
            </td>
            <td>
            <textarea class="regular-text" name="cnt_webfonts" id="cnt_webfonts" cols="30" rows="5">
                <?php echo get_option('cnt_webfonts'); ?>    
            </textarea>
	        </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_title_fontfamily">ページタイトルのフォントファミリー</label>
            </th>
            <td>
            <input type="text" id="cnt_title_fontfamily" class="regular-text" name="cnt_title_fontfamily" value="<?php echo get_option('cnt_title_fontfamily'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_twitter_account">フッターからリンクするTwitterアカウント</label>
            </th>
            <td>
            @
            </td>
            <td>
            <input type="text" id="cnt_twitter_account" class="regular-text" name="cnt_twitter_account" value="<?php echo get_option('cnt_twitter_account'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="cnt_github_account">フッターからリンクするGitHubアカウント</label>
            </th>
            <td>
            https://github.com/
            </td>
            <td>
            <input type="text" id="cnt_github_account" class="regular-text" name="cnt_github_account" value="<?php echo get_option('cnt_github_account'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
                <label for="cnt_copyright_statement">著作権表示</label>
            </th>
            <td>
            <input type="text" id="cnt_copyright_statement" class="regular-text" name="cnt_copyright_statement" value="<?php echo get_option('cnt_copyright_statement'); ?>">
            </td>
            </tr>

        </tbody>
    </table>

    <?php submit_button(); ?>
    </form>
</div> <!-- wrap -->