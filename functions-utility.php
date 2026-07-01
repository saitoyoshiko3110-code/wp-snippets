<?php 

//TOPページショートコード　hurl
add_shortcode('hurl', 'shortcode_hurl');
	function shortcode_hurl() {
	return home_url( '/' );
}

//画像パス　replaceImagePath
function replaceImagePath($arg) {
	$content = str_replace('"images/', '"' . get_bloginfo('template_directory') . '/images/', $arg);
	return $content;
}  
add_action('the_content', 'replaceImagePath');

//admin バー 非表示
add_filter('show_admin_bar', '__return_false');


//アイキャッチ有効化
add_theme_support( 'post-thumbnails' );




//投稿を新着情報に変更　　functions.phpに追記
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = '新着情報';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新しい'.$name;
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = '新着情報';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );


//投稿（post）をarchiveに表示する
function post_has_archive($args, $post_type){
  if('post'== $post_type){
    $args['rewrite']=true;
    $args['has_archive']='post';
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


/**
 * 投稿（post）のラベル変更とアーカイブ設定を一括管理
 */
function customize_post_setting($args, $post_type) {
    if ('post' === $post_type) {
        // ラベルの変更（ここでまとめて設定すると効率的です）
        $args['labels'] = array(
            'name' => 'お知らせ',
            'singular_name' => 'お知らせ',
            'add_new' => '追加',
            'add_new_item' => 'お知らせの新規追加',
            'edit_item' => 'お知らせの編集',
            'view_item' => 'お知らせを表示',
            'search_items' => 'お知らせを検索',
        );

        // URLとアーカイブの設定を「archives/topics」に変更
        $args['has_archive'] = 'archives/topics'; 
        $args['rewrite'] = array(
            'slug'       => 'archives/topics', // URLのベースを強制指定
            'with_front' => false,            // 数字ベース設定時の余計な干渉を防ぐ
        );
    }
    return $args;
}
add_filter('register_post_type_args', 'customize_post_setting', 10, 2);


// メニューの並び順や管理画面のラベル微調整
function change_post_menu_label() {
    global $menu;
    $menu[5][0] = 'お知らせ';
}
add_action('admin_menu', 'change_post_menu_label');



// ACFのテキストエリアでショートコードを実行可能にする
add_filter('acf/format_value/type=textarea', 'do_shortcode', 10);


// ACFでまとめてショートコードを実行可能にする
function my_acf_format_value_shortcode($value, $post_id, $field) {
    return do_shortcode($value);
}
add_filter('acf/format_value/type=text', 'my_acf_format_value_shortcode', 10, 3);
add_filter('acf/format_value/type=textarea', 'my_acf_format_value_shortcode', 10, 3);

//ACFプレビュー表示
function fix_post_id_on_preview($null, $post_id) {
    if (is_preview()) {
        // プレビュー時は現在のポストIDを返す
        return get_the_ID();
    } else {
        // プレビューでない場合は、渡された$post_idを検証して返す
        $acf_post_id = isset($post_id->ID) ? $post_id->ID : $post_id;
        if (!empty($acf_post_id)) {
            return $acf_post_id;
        } else {
            return $null;
        }
    }
}
add_filter('acf/pre_load_post_id', 'fix_post_id_on_preview', 10, 2);
