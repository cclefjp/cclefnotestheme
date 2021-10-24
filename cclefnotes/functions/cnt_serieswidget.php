<?php

/* シリーズ記事一覧表示ウィジェット */
class CNT_SeriesWidget extends WP_Widget {

    function __construct() {
		parent::__construct(
			'cnt_serieswidget', // Base ID
			'CNTシリーズ記事一覧表示', // Name
			array( 'description' => 'シリーズ記事の一覧を表示します。', ) // Args
		);
    }
    

	/**
	 * 表側の Widget を出力する
	 *
	 * @param array $args      'register_series_sidebar'で設定した'before_widget', 'after_widget'を入れる
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        $id = get_the_ID();
        $terms = get_the_terms($id, 'series');
        print_r($terms);
        $slug = 0;
        foreach ($terms as $term) {
            if ($term->taxonomy == 'series') {
                $slug = $term->slug;
            }
        }

        //見つからなかった時は終了する
        if (! $slug ) {
            echo 'シリーズ一覧が取得できませんでした';
            echo $args['after_widget'];
            return;
        }
        /*
        $queryargs = array(
            'tax_query' => array (
                array (
                    'taxonomy' => 'series',
                    'field' => 'slug',
                    'terms' => $slug
                )
            )
        );
        */

        echo $slug;

        /*
        $the_query = new WP_Query($queryargs);
        if( have_posts( $the_query )) {
            echo '<ul>';
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                echo '<li>' . the_title() . '</li>';
            }
            echo '</ul>';
        }

        wp_reset_postdata();
        */
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

/* シリーズ記事一覧を表示するサイドバー */
function cnt_register_series_sidebar() {
    register_widget('CNT_SeriesWidget');
    register_sidebar ( array (
        'name' => 'cnt投稿ページサイドバー左',
        'id' => 'cnt_left_sidebar',
        'description' => 'Cclef Notesの左サイドバー',
        'before_widget' => '<aside class="side-inner">',
        'after_widget' => '</aside>'
        //'before_title' => '<h4 class="sidebar_title">',
        //'after_title' => '</h4>'
    ));
}

add_action( 'widgets_init', 'cnt_register_series_sidebar');