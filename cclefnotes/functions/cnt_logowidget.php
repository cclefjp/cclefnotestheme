<?php
/* ロゴウィジェットを記述するための関数とクラス */

include_once('cnt_get_logoimg_uri.php');

/* ロゴ表示ウィジェット */
class CNT_LogoWidget extends WP_Widget {

    function __construct() {
		parent::__construct(
			'cnt_logowidget', // Base ID
			'CNTロゴ表示', // Name
			array( 'description' => 'サイトロゴを表示します。', ) // Args
		);
    }
    

	/**
	 * 表側の Widget を出力する
	 *
	 * @param array $args
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
        /* ウィジェットエリアでの指定があればその設定を優先して使用する。
        なければtfpテーマ管理画面によるグローバルな設定を使用する。 */
        if(array_key_exists('use_image', $instance)) {
            $use_img = $instance['use_image'];
        } else {
            $use_img = get_option('cnt_logowidget_use_image');
        }
        if(array_key_exists('use_titletext', $instance)) {
            $use_text = $instance['use_titletext'];
        } else {
            $use_text = get_option('cnt_logowidget_use_titletext');
        }
        ?>
        <div class="site-logo">
        <?php echo '<a class="logo-anker" href="' . home_url() . '">';
        echo '<span class="title-logo" style="color: '. get_option('cnt_header_font_color') . '">';

        if ($use_img == 'true') {
            echo '<img class="logo-img", src="';
            echo cnt_get_logoimg_uri();
            echo '" alt="logo img">';
        }
        if ($use_text == 'true') {
            bloginfo('name');
        }
        echo '</span></a></div><!-- logo -->';
    }
    
    /** Widget管理画面を出力する
     *
     * @param array $instance 設定項目
     * @return string|void
     */
    public function form( $instance ){
        $use_img_name = $this->get_field_name('use_image');
        $use_img_id = $this->get_field_id('use_image');

        $use_title_name = $this->get_field_name('use_titletext');
        $use_title_id = $this->get_field_id('use_titletext');

        ?>
        <p>
            <label for="<?php echo $use_img_id; ?>">ロゴ画像の表示:</label>
            <input class="selection"
                    id="<?php echo $use_img_id; ?>"
                    name="<?php echo $use_img_name; ?>"
                    type="radio"
                    value="TRUE">
            <?php _e('する'); ?>
            <input class="selection"
                    id="<?php echo $use_img_id; ?>"
                    name="<?php echo $use_img_name; ?>"
                    type="radio"
                    value="FALSE">
            <?php _e('しない'); ?>
        </p>
        <p>
            <label for="<?php echo $use_title_id; ?>">タイトル文字列の表示:</label>
            <input class="selection"
                    id="<?php echo $use_title_id; ?>"
                    name="<?php echo $use_title_name; ?>"
                    type="radio"
                    value="TRUE">
            <?php _e('する'); ?>
            <input class="selection"
                    id="<?php echo $use_title_id; ?>"
                    name="<?php echo $use_title_name; ?>"
                    type="radio"
                    value="FALSE">
            <?php _e('しない'); ?>
        </p>
        <?php
    }

    /** 新しい設定データが適切なデータかどうかをチェックする。
     * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
     *
     * @param array $new_instance  form()から入力された新しい設定データ
     * @param array $old_instance  前回の設定データ
     * @return array               保存（更新）する設定データ。falseを返すと更新しない。
     */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

}

/* ロゴウィジェットを登録する関数 */
function cnt_register_logowidget() {
    register_widget('CNT_LogoWidget');
}

add_action( 'widgets_init', 'cnt_register_logowidget' );