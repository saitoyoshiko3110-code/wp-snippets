<?php

add_action( 'init', 'create_post_type01' );
function create_post_type01() {
  register_post_type( 'custom_post01',//カスタム投稿名
    array(
      'labels' => array(
        'name' => __( 'カスタム投稿タイプ名' ), //カスタム投稿のラベル
        'singular_name' => __( 'カスタム投稿タイプ名' ),
        'add_new_item' => __('カスタム投稿タイプ名を追加'),
        'edit_item' => __('カスタム投稿タイプ名を編集'),
        'new_item' => __('カスタム投稿タイプ名を追加')
      ),
　　　'description' => '説明文',
      'public' => true, //投稿の公開
      'supports' => array('title','editor','thumbnail','revisions'),//タイトル本文サムネイルリビジョンを有効化
      'menu_position' =>5, //メニューの位置
      'show_ui' => true, //カスタム投稿タイプを表示するかどうか
      'has_archive' => true, //アーカイブの生成
      'hierarchical' => false, //階層構造の有無
      'show_in_rest' => true,  //Gutenberg(ブロックエディタ)に対応
      'rewrite' => array('width_front' => false), //パーマリンクの設定
    )
  );
  //カスタムタクソノミー
   register_taxonomy(
     'custom_post01_cat',
     'custom_post01',
     array(
       'hierarchical' => true,//階層構造の有無。falseでタグ形式
       'label' => '売買マンションカテゴリー', //タクソノミーのラベル
       'singular_label' => '売買マンションカテゴリー',//タクソノミーのラベル
       'public' => true,//検索可能にするかどうか　trueで可能
       'show_ui' => true,//タームを管理するためにデフォルトのUIを用意
       'show_in_rest' => true  //Gutenberg(ブロックエディタ)に対応
     )
   );
}


//カスタム投稿タイプのパーマリンクを数字ベースにする
function ラベル名_post_type_link( $link, $post ){
  if ( $post->post_type === 'ラベル名' ) {
    return home_url( '/ラベル名/' . $post->ID );
  } else {
    return $link;
  }
}
add_filter( 'post_type_link', 'ラベル名_post_type_link', 1, 2 );

function ラベル名_rewrite_rules_array( $rules ) {
  $new_rewrite_rules = array( 
    'ラベル名/([0-9]+)/?$' => 'index.php?post_type=ラベル名&p=$matches[1]',
  );
  return $new_rewrite_rules + $rules;
}
add_filter( 'rewrite_rules_array', 'ラベル名_rewrite_rules_array' );
