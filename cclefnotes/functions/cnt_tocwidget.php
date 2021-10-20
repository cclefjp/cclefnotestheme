<?php

/* 目次表示ウィジェット */
class CNT_TOCWidget extends WP_Widget {

    function __construct() {
		parent::__construct(
			'cnt_tocwidget', // Base ID
			'CNT目次表示', // Name
			array( 'description' => '投稿の見出しを抽出し、目次を表示します。', ) // Args
		);
    }
    

	/**
	 * 表側の Widget を出力する
	 *
	 * @param array $args      'register_toc_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        echo $args['before_title'];
        echo '目次';
        echo $args['after_title'];


        $dom = new DOMDocument('1.0', 'UTF-8');
        $html = get_the_content();
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xpath = new DOMXPath($dom);
        $xpath->registerNamespace("php", "http://php.net/xpath");
        $xpath->registerPHPFunctions();

        echo '<!-- before query -->';
        //$headers = $xpath->query('//[hH]?');
        //$headers = $xpath->query('//*');
        $headers = $xpath->query('//*[name()="h1" or name()="H1" or name()="h2" or name()="H2" or name()="h3" or name()="H3"]');
        echo '<!-- after query -->';
        echo '<div class="widget-toc">';
        foreach( $headers as $header ) {
            $nodename = $header->nodeName;
            $ankerid = $header->getAttribute('id');

            $matches = split('\n', $header->nodeValue);
            //preg_match('/^(?:.*+\n){0,1}+/', $header->nodeValue, $matches);

            if ( $matches[0] ):
                $text = $matches[0];
            else:
                $text = $header->nodeValue;
            endif;
            //$text = $matches[0];

            if ( $ankerid ) {
                $toc_code = '<a href="#' . $ankerid . '">' . $text . '</a>';
            }
            else {
                $toc_code = $text;
            }
        
            if($nodename == 'h1' || $nodename == 'H1' ) {
                echo '<h4>' . $toc_code . '</h4>';
            }
            elseif ($nodename == 'h2' || $nodename == 'H2' ) {
                // print_r($header->getAttribute('id'));
                echo '<h5>' . $toc_code . '</h5>';
            }
            elseif ( $nodename == 'h3' || $nodename == 'H3' ) {
                echo '<h6>' . $toc_code . '</h6>';
            }
        }
        echo '</div><!-- toc -->';
        echo '<!-- after output -->';

        echo $args['after_widget'];
    }
    
    /** Widget管理画面を出力する
     *
     * @param array $instance 設定項目
     * @return string|void
     */
    public function form( $instance ){
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

/* 目次を表示するサイドバー */
function cnt_register_toc_sidebar() {
    register_widget('CNT_TOCWidget');
    register_sidebar ( array (
        'name' => 'cnt投稿ページサイドバー右',
        'id' => 'cnt_right_sidebar',
        'description' => 'TFPの右サイドバー',
        'before_widget' => '<aside class="side-inner">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="sidebar_title">',
        'after_title' => '</h4>'
    ));
}

add_action( 'widgets_init', 'cnt_register_toc_sidebar');