<?php get_header();?>

<style>
body.overlay{
    background-color:rgba(0,0,0,0.7);
}
.wrap-inner.line-ad{
    max-width: 500px;
    margin:0 auto;
    box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.25);
}
header{
    max-width: 500px;
}
header .only-pc {
    display: none !important;
}

header .only-sp {
    display: block !important;
}
header #humberger{
    position: absolute;
}
body{
    container-type: inline-size;
}
@container (min-width: 500px){
    header #drawernav .drawer-fixed{
        box-shadow: none;
    }
}
main#line-ad .stores .contents .title::after{
    content:"<?php echo ucfirst($post -> post_name);?> Stores";
}
</style>

<main id="line-ad">

<section class="mv">
    <div class="contents">
        <div class="pic">        
            <img src="<?php echo get_field('line-ad_mv')['url']; ?>" alt="買取専門店ジュエルカフェ">
            <a class="button" href="/">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/shop_btn.jpg" alt="店舗のご案内はこちら">
            </a>
        </div>
    </div>
</section>

<section class="line">
    <div class="contents">
        <div class="pic">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/line.jpg" alt="LINEでお友達登録">
        </div>

        <div class="expiration_date">2023.4.1 ～ 5.31</div>
        <ul class="notice">
            <li>お1人様1回限りとなります。</li>
            <li>金券 / 切手 / ハガキのみの査定は対象外となります。 </li>
            <li>予告なしに終了する場合がございます。</li>
        </ul>


        <div class="button">
            <a href="http://line.me/ti/p/RFfCsZmBex">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/line_btn.jpg" alt="ジュエルカフェの公式LINEにお友達登録する">
            </a>
        </div>
    </div>
</section>

<section class="tel">
    <div class="contents">
        <div class="pic">
            <a class="button" href="tel:<?php the_field('line-ad_tel'); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/tel_btn.png" alt="電話でご相談ください！">
            </a>
            <p class="text">
            ジュエルカフェ<?php the_field('line-ad_tel_shop'); ?>にお繋ぎします。<br>お近くの店舗もご案内いたします。
            </p>
        </div>
    </div>
</section>

<section class="assessed_items">
    <div class="contents">
        <div class="title">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_items_title.jpg"
                alt="お買取対象アイテム">
        </div>
        <ul class="primary">
            <li>
                <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_item1.jpg" alt="金・プラチナ製品"></div>
                <div class="name">金・プラチナ製品</div>
            </li>
            <li>
                <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_item2.jpg" alt="ダイヤモンド"></div>
                <div class="name">ダイヤモンド</div>
            </li>
            <li>
                <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_item3.jpg" alt="ブランドバッグ"></div>
                <div class="name">ブランドバッグ</div>
            </li>
            <li>
                <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_item4.jpg" alt="宝石・ジュエリー"></div>
                <div class="name">宝石・ジュエリー</div>
            </li>
            <li>
                <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_item5.jpg" alt="ブランド時計"></div>
                <div class="name">ブランド時計</div>
            </li>
            <li>
                <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_item6.jpg" alt="金券・商品券"></div>
                <div class="name">金券・商品券</div>
            </li>
            <li>
                <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_item7.jpg" alt="切手・ハガキ"></div>
                <div class="name">切手・ハガキ</div>
            </li>
            <li>
                <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/assessed_item8.jpg" alt="洋　酒"></div>
                <div class="name">洋　酒</div>
            </li>

        </ul>
        <p class="text">その他にも幅広い商品をお取り扱いしています。<br>査定は無料ですのでお気軽にご相談ください。</p>
    </div>
</section>

<section class="real_time">
    <div class="contents">
        <div class="title">
            <?php echo $post -> post_title;?>内リアルタイム買取情報
        </div>

        <!-- 店舗ページの最新買取事例 -->
					<div class="swiper">
					<ul class="blog-archive-list swiper-wrapper">
					<?php
					$args = array(
						'post_type' => 'blog', 
						'posts_per_page' => 10,
						'tax_query' => array(
							array(
									'taxonomy' => 'area', //カスタムタクソノミー
									'field' => 'slug',
									'terms' => array( $post->post_name ), //タクソノミーターム
								)
							)
					 );
					$the_query = new WP_Query( $args );
					while ($the_query->have_posts()): $the_query->the_post(); ?>
					<?php
						$hinmoku_terms = get_the_terms($post->ID, 'hinmoku');
						foreach($hinmoku_terms as $term) {
							if($term->parent === 0) {
								$hinmoku_parent_name = $term->name;
								$hinmoku_parent_id = $term->term_id;
							}
						}
						foreach($hinmoku_terms as $term) {
							if($term->parent === $hinmoku_parent_id) {
								$hinmoku_child_name = $term->name;
								$hinmoku_child_id = $term->term_id;
							}
						}
						$area_terms = get_the_terms( $post->ID, 'area' );
						foreach($area_terms as $term) {
							if($term->parent === 0) {
								// $area_parent_name = $term->name;
								$area_parent_id = $term->term_id;
							}
						}
						foreach($area_terms as $term) {
							if($term->parent === $area_parent_id) {
								// $area_child_name = $term->name;
								$area_child_id = $term->term_id;
							}
						}
						foreach($area_terms as $term) {
							if($term->parent === $area_child_id) {
								$area_grandchild_name = $term->name;
							}
						}
						?>
					<li class="swiper-slide">
						<a href="<?php the_permalink() ?>">
							<div class="blog-catch-img">
								<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
									<img class="blog-detail-img" src="<?php echo $post_thumbnail;?>" alt="<?php the_title();?>">
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="<?php the_title();?>">
								<?php endif;?>
								<div class="blog-archive-date"><?php the_time('Y.m.d');?></div>
							</div>
							<div class="p-12">
								<p class="blog-archive-category"><?php
									echo esc_html($hinmoku_parent_name).'/'.esc_html($hinmoku_child_name);
									?></p>
								<?php if(get_field('買取価格')):?>
								<p class="blog-archive-category"><?php
									echo '買取価格 : ';
									the_field('買取価格');
									?></p>
								<?php endif;?>
								<p class="blog-archive-ttl"><?php the_title(); ?></p>
								<p class="blog-archive-shop"><?php
									echo esc_html($area_grandchild_name);
									?></p>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</ul>
				</div>
        <!-- end -->
    </div>
</section>


<section class="identification_documents">
    <div class="contents">
        <div class="title">お買取りに必要なものは<br>ご本人確認書類だけ</div>
        <div class="pic"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/identification_documents_contents.png" alt="運転免許証、マイナンバーカード、パスポート"></div>
        <p class="text"><em>宝石の鑑定書、ブランド品・時計のギャランティカード</em>などがありますと更に高価買取が可能です。<br>お手元にございましたらぜひご一緒にお持ちください！</p>
        <p class="notes">※18~19歳のお客様の場合、同意書又は委任状が必要になります。又、18歳未満のお客様はご利用いただけません。※保険証をご提示いただく場合は、別途発行日から3ヶ月以内の公共料金領収書又は住民票が必要になります。</p>
    </div>
</section>

<section class="menu">
    <div class="contents">
        <div class="title">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/menu_title.jpg" alt="買取・査定メニュー">
        </div>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/menu_contents.jpg" alt="">
    </div>
</section>

<section class="faq">
    <div class="contents">
        <div class="title">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/line-ad/faq_title.jpg"
                alt="よくある質問">
        </div>

<div class="shop-detail-faq">
    <div class="accordion" id="first-accordion">
        <div class="accordion-item">
            <p class="accordion-head">
                <a href="javascript:void(0);"><span
                        class="mr-8 color-red">Q</span>来店する前に予約は必要ですか？</a>
            </p>
            <div class="accordion-content" style="height: 0px; overflow: hidden; transition: all 0.4s ease 0s;">
                <p><span class="mr-8">A</span>予約は必要ありませんのでいつでもお越しいただけますが、混み合っている場合は査定をお待たせする場合もございますので、事前にお電話にて来店予約をいただけますとスムーズにご案内できます。</p>
            </div>
        </div>
        <div class="accordion-item">
            <p class="accordion-head">
                <a href="javascript:void(0);"><span
                        class="mr-8 color-red">Q</span>買取の際に、用意するものはありますか？</a>
            </p>
            <div class="accordion-content" style="height: 0px; overflow: hidden; transition: all 0.4s ease 0s;">
                <p><span class="mr-8">A</span>はい。身分証明書(運転免許証、マイナンバーカード、パスポート等)をご用意してください。店舗にてコピーを取らせていただきますので、必ずお持ちください。</p>
            </div>
        </div>
        <div class="accordion-item">
            <p class="accordion-head">
                <a href="javascript:void(0);"><span
                        class="mr-8 color-red">Q</span>買取の査定にはどのくらいの時間がかかりますか？</a>
            </p>
            <div class="accordion-content" style="height: 0px; overflow: hidden; transition: all 0.4s ease 0s;">
                <p><span class="mr-8">A</span>店舗でのお買取の場合は、10～15分のスピード査定が可能です。ただし、大量のお持ち込み・混雑状況などにより、予定時間が前後する可能性もございます。店内のカフェスペース（無料ドリンクサービス付き）でお待ちいただいたり、ご都合の宜しいお時間に再来店いただくことも可能です。</p>
            </div>
        </div>
        <div class="accordion-item">
            <p class="accordion-head">
                <a href="javascript:void(0);"><span
                        class="mr-8 color-red">Q</span>どうすれば高価で買取してくれますか？</a>
            </p>
            <div class="accordion-content" style="height: 0px; overflow: hidden; transition: all 0.4s ease 0s;">
                <p><span class="mr-8">A</span>ご購入時の付属品（ブランドの品の箱・鑑定書・保証書など）を一緒にお持ちいただきますと、査定額がアップします。また、複数まとめてお持ちいただけますとお値段に加算できます。ジュエルカフェではお得なクーポンなども配布していますので、ぜひご一緒にお持ちください。</p>
            </div>
        </div>
        <div class="accordion-item">
            <p class="accordion-head">
                <a href="javascript:void(0);"><span
                        class="mr-8 color-red">Q</span>金額査定後でもキャンセルはできますか？</a>
            </p>
            <div class="accordion-content" style="height: 0px; overflow: hidden; transition: all 0.4s ease 0s;">
                <p><span class="mr-8">A</span>お値段にご満足いただけない場合は、もちろんキャンセル可能です。手数料等も一切かかりませんのでご安心ください。</p>
            </div>
        </div>
    </div>
</div>

    </div>
</section>

<section class="stores">
    <div class="contents">
        <div class="title">
            <?php echo $post -> post_title;?>のジュエルカフェ
        </div>
        <ul class="primary">
            <?php
            $args = array(
                'post_type' => 'shop', 
                'posts_per_page' => -1,
                'post_parent' => 0,
                'tax_query' => array(
                    array(
                            'taxonomy' => 'area', //カスタムタクソノミー
                            'field' => 'slug',
                            'terms' => array( $post->post_name ), //タクソノミーターム
                        )
                    )
            );
            $the_query = new WP_Query( $args );
            while ($the_query->have_posts()): $the_query->the_post(); ?>
            <li>
                <div class="name1">ジュエルカフェ</div>
                <div class="name2"><?php the_title(); ?></div>
                <div class="address"><?php the_field('所在地', $post->ID);?></div>
                <div class="tel">TEL<a href="tel:<?php the_field('店舗電話番号', $post->ID);?>"><?php the_field('店舗電話番号', $post->ID);?></a></div>
                <div class="opening_hours">営業時間<?php the_field('営業時間', $post->ID);?></div>
                <div class="details">

                    <a href="/shop/okinawa/honto/<?php echo $post->post_name;?>">さらに詳しく</a>
                </div>
            </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>
</section>


</main>
<footer id="line-ad_footer">
    <div class="logo">
        <a href="/"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/line-ad/logo.svg" alt="ジュエルカフェ"></a>
    </div>
    <ul>
        <li>
            <a href="/">ジュエルカフェ公式サイト</a>
        </li>
        <li>
            <a href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a>
        </li>
        <li>
            <a href="<?php echo esc_url(home_url('/privacy/')); ?>">個人情報保護方針</a>
        </li>
    </ul>
    <small>© JEWEL CAFE All Rights Reserved.</small>



    <?php wp_footer();?>
    <script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/accordion.js" async></script>
    <script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/menu.js" async></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
const mySwiper = new Swiper('.swiper', {
    // Optional parameters
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },

    autoplay: { // 自動再生させる
        delay: 3000, // 次のスライドに切り替わるまでの時間（ミリ秒）
        disableOnInteraction: false, // ユーザーが操作しても自動再生を止めない
        waitForTransition: false, // アニメーションの間も自動再生を止めない（最初のスライドの表示時間を揃えたいときに）
    },

    slidesPerView: 1.5,

});
</script>
</footer>


<?php
$area = $post->post_name;

if($area == 'okinawa'){
    $area = 'okinawa/honto';
}elseif($area == 'hokkaido'){
    $area = 'hokkaido/douou';
}elseif($area == 'iwate' || $area == 'miyagi'){
    $area = 'tohoku/'.$area;
}



?>