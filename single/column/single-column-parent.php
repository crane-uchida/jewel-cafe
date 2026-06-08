<?php
/*
Template Name: コラム 親（カテゴリー）
*/
?>
<?php get_header( );?>

<div class="breadcrumbs">
    <div class="column-inner">
        <a href="<?php echo esc_url( home_url() );?>">TOP<span></span></a>
        <span><?php the_title();?></span>
    </div>
</div>

<nav class="gnavi">
  <div class="gnavi_inner">
    <ul>
        <li><a href="<?php echo esc_url( home_url('/column/') ) ?>"><span>お役立ちコラム TOP</span></a></li>
        <li><a href="<?php echo esc_url( home_url() ) ?>"><span>ジュエルカフェ TOP</span></a></li>
        <li class="shop"><a href="<?php echo esc_url( home_url('/shop/') ) ?>"><span>お近くのジュエルカフェを調べる</span></a></li>
        <li class="line"><a href="<?php echo esc_url( home_url('/about-line/') ) ?>"><span>LINEで今すぐお気軽査定！</span></a></li>
    </ul>
  </div>
</nav>

<div class="container cf">
    <main role="main" class="left">
        <div id="page-top"></div>


        <div class="column_inner">

            <h1 class="section-ja-title shop-detail-h1">
                <?php the_title();?>
            </h1>



            <?php $post_id = get_the_ID(); // 現在の投稿ID取得 ?>
            <ul class="blog-news-list">
                <?php
					$args = array( // WP_Queryのパラメータを指定
						'posts_per_page' => -1,
						'post_type' => 'column',
						'post_parent' => $post_id
					);
					$query = new WP_Query( $args ); // WP_Queryのオブジェクト（インスタンス）を作成
					while ( $query->have_posts() ) : // ループ開始
					$query->the_post(); // サブループの投稿データをセット
				?>

                <li>
                    <a class="post_image" href="<?php the_permalink();?>">
					
						<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
						
							<img src="<?php echo $post_thumbnail;?>" alt="<?php the_title();?>">

						<?php endif;?>
											
					</a>
					
                    <div class="txt_box">
                        <div class="dayDate"><time itemprop="dateCreated datePublished"><?php the_time("Y.m.d"); ?></time>up</div>
                        <a class="post_ttl" href="<?php the_permalink();?>"><?php the_title();?></a>


                        <?php if( wp_is_mobile()): //スマホ・タブレットの場合 ?>
                        <?php else: //PCの場合 ?>
                        <?php
                            echo ' <a class="more">';
                            if (mb_strlen($post->post_content,'UTF-8')>50) {
                                $content = strip_shortcodes($post-> post_content);   
                                $content = preg_replace('/<cite>.*?<\/cite>/is', "", $content); //preg_replace関数を使って特定のHTMLタグ（要素を含む）を削除
                                $content= str_replace('\n', '', mb_substr(strip_tags($content), 0, 50,'UTF-8'));
                                echo $content . '・・・<a href="' . get_permalink() . '"></a>';
                            } else {
                                echo str_replace('\n', '', strip_tags($post->post_content)) ;
                            }
                            echo '</a>';
                        ?>
                        <?php endif;?>
                    </div>
                </li>

                <?php
					endwhile; // ループ終了
					wp_reset_postdata(); // メインクエリの投稿データに戻す
				?>

            </ul>






        </div>
    </main>


    <?php get_template_part( 'template-parts/column-sidebar' );?>


</div>


<div class="section-inner">
    <section class="blog-search-shop">
        <h2 class="ttl-box-red">お近くのジュエルカフェ店舗を探す</h2>
        <p>商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定!スピード重視・ご相談重視なら来店買取がオススメです！</p>
    </section>

    <div>
        <?php get_template_part( 'template-parts/search-shop-new' );?>
    </div>

    <?php get_template_part( 'template-parts/common-tab' );?>
</div>


<?php get_footer( );?>