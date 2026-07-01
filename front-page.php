<?php get_header(); ?>

<div class="two-column">
<?php $the_query = new WP_Query( array( 
	'post_type' => 'post', 
	'posts_per_page' => 3 ) ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="article two-third-left">
<h3 class="heading-style02">お知らせ</h3>
<ul class="news mb20">
<?php $the_query = new WP_Query( array( 
	'post_type' => 'post', 
	'posts_per_page' => 3 ) ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<li><span><?php the_time( 'Y.m.d' ); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>
<?php else : ?>
<p><?php esc_html_e( '最新情報はありません' ); ?></p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<div class="button-style02"><a href="<?php echo esc_url( home_url( '/' ) ); ?>news">お知らせ一覧を見る</a></div>
</div><!-- two-third-left out -->



<!--投稿カテゴリー背景ACFでカラー指定の場合-->
<?php $this_categories = get_the_category();
					if ( $this_categories ) {
						$this_category_color = get_field( 'color', 'category_' . $this_categories[0]->term_id );
						$this_category_name  = $this_categories[0]->name;
						echo '<span class="news-list__category"" style="' . esc_attr( 'background:' . $this_category_color ) . ';">' . esc_html( $this_category_name ) . '</span>';
					} ;?>


<!--カスタム投稿タクソノミー背景ACFでカラー指定の場合-->
<?php
$taxonomy = 'recruit_cat';
$this_terms = get_the_terms( get_the_ID(), $taxonomy );
if ( $this_terms && ! is_wp_error( $this_terms ) ) {
    $this_term = $this_terms[0];
    $this_term_color = get_field( 'color', $taxonomy . '_' . $this_term->term_id );
    $this_term_name = $this_term->name;
    echo '<span class="news-list__category" style="' . esc_attr( 'background:' . $this_term_color ) . ';">' . esc_html( $this_term_name ) . '</span>';
}
?>



<?php get_footer(); ?>