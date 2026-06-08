<?php
/*
Template Name: コラムブログ
*/
?>
<?php get_header( );?>


<!-- Google 構造化データ JSON-LD マークアップ -->
<?php
	$eyecatch_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'thumbnail' );
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php the_permalink(); ?>"
  },
  "headline": "<?php the_title();?>",
  "description":"<?php echo get_post_meta(get_the_ID(), '_aioseo_description', true);?>",  
  "image": "<?php echo $eyecatch_url; ?>",  
  "author": {
    "@type": "Organization",
    "name": "ジュエルカフェ",
    "url": "https://jewel-cafe.jp/"
  }, 
  "publisher": {
    "@type": "Organization",
    "name": "ジュエルカフェ",
    "logo": {
      "@type": "ImageObject",
      "url": "https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/common/logo.png"
    }
  },
  "datePublished": "<?php echo get_the_date('Y-m-d'); ?>",
  "dateModified": "<?php the_modified_date('Y-m-d') ?>"
}
</script>
<?php if(get_field('column_q1') && get_field('column_a1') && get_field('column_q2') && get_field('column_a2')): ?>
	<script type="application/ld+json">
	{
	"@context": "https://schema.org",
	"@type": "FAQPage",
	"mainEntity": [{
		"@type": "Question",
		"name": "<?php the_field('column_q1'); ?>",
		"acceptedAnswer": {
		"@type": "Answer",
		"text": "<?php the_field('column_a1'); ?>"
		}
	},{
		"@type": "Question",
		"name": "<?php the_field('column_q2'); ?>",
		"acceptedAnswer": {
		"@type": "Answer",
		"text": "<?php the_field('column_a2'); ?>"
		}
	}]
	}
	</script>
<?php endif; ?>





<?php /* ?>
<div class="breadcrumbs">
		<div class="column-inner">
			<a href="<?php echo esc_url( home_url() );?>">TOP<span></span></a>

			<a href="<?php echo esc_url(get_post_type_archive_link(get_post_type()));?>">ジュエルカフェのお役立ちコラム<span></span></a>

			<?php $parent_id = $post->ancestors[count($post->ancestors) - 1]; // 最上の親ページのIDを取得 ?>
			<a href="<?php echo get_permalink($parent_id); ?>">
				<?php echo $parent_title = get_post($parent_id)->post_title; // 最上の親ページのタイトルを取得して表示 ?>
				<span></span>
			</a>
			<span><?php the_title();?></span>
		</div>
</div>
<?php */ ?>


<div class="breadcrumbs">
	<div class="column-inner">
		<a href="<?php echo esc_url( home_url() );?>">TOP<span></span></a>
		
		
<?php if(get_field('column_breadcrumbs1') == '金・貴金属'): ?>
	<a href="/kaitori/gold/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == 'ダイヤモンド'): ?>
	<a href="/kaitori/diamond/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == 'ブランド品'): ?>
	<a href="/kaitori/brand/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == 'ブランド時計'): ?>
	<a href="/kaitori/tokei/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == '宝石'): ?>
	<a href="/kaitori/jewelry/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == '金券'): ?>
	<a href="/kaitori/card/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == '切手'): ?>
	<a href="/kaitori/letter-top/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == '化粧品'): ?>
	<a href="/kaitori/cosme/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == 'お酒'): ?>
	<a href="/kaitori/osake/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs1') == '遺品・生前整理'): ?>
	<a href="/kaitori/kottou/"><?php the_field('column_breadcrumbs1'); ?><span></span></a>
<?php endif; ?>



<?php if(get_field('column_breadcrumbs2') == 'ロレックス'): ?>
	<a href="/kaitori/tokei/rolex-top/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'オメガ'): ?>
	<a href="/kaitori/tokei/omega/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'カルティエ時計'): ?>
	<a href="/kaitori/tokei/cartier-watch/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ブルガリ時計'): ?>
	<a href="/kaitori/tokei/bulgari-watch/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'フランクミュラー'): ?>
	<a href="/kaitori/tokei/franckmuller/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ヴァシュロン'): ?>
	<a href="/kaitori/tokei/vacheron/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'パテックフィリップ'): ?>
	<a href="/kaitori/tokei/patek/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'パネライ'): ?>
	<a href="/kaitori/tokei/panerai/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'オーデマピゲ'): ?>
	<a href="/kaitori/tokei/piguet/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'IWC'): ?>
	<a href="/kaitori/tokei/iwc/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ウブロ'): ?>
	<a href="/kaitori/tokei/hublot/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'タグホイヤー'): ?>
	<a href="/kaitori/tokei/tagheuer/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ジャガールクルト'): ?>
	<a href="/kaitori/tokei/jaegerlecoultre/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ブライトリング'): ?>
	<a href="/kaitori/tokei/breitling/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ランゲ&ゾーネ'): ?>
	<a href="/kaitori/tokei/alange-soehne/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'シャネル時計'): ?>
	<a href="/kaitori/tokei/chanel-watch/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'エルメス時計'): ?>
	<a href="/kaitori/tokei/hermes-watch/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'セイコー'): ?>
	<a href="/kaitori/tokei/seiko/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ロジェ・デュブイ'): ?>
	<a href="/kaitori/tokei/rogerdubuis/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ブレゲ'): ?>
	<a href="/kaitori/tokei/breguet/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>

<?php elseif(get_field('column_breadcrumbs2') == 'ルイヴィトン'): ?>
	<a href="/kaitori/brand/vuitton/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'エルメス'): ?>
	<a href="/kaitori/brand/hermes/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'シャネル'): ?>
	<a href="/kaitori/brand/chanel/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'グッチ'): ?>
	<a href="/kaitori/brand/gucci/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'プラダ'): ?>
	<a href="/kaitori/brand/prada/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'コーチ'): ?>
	<a href="/kaitori/brand/coach/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'イヴサンローラン'): ?>
	<a href="/kaitori/brand/ysl/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'バーバリー'): ?>
	<a href="/kaitori/brand/burberry/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'フェンディ'): ?>
	<a href="/kaitori/brand/fendi/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'フェラガモ'): ?>
	<a href="/kaitori/brand/ferragamo/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'バレンシアガ'): ?>
	<a href="/kaitori/brand/balenciaga/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ボッテガ・ヴェネタ'): ?>
	<a href="/kaitori/brand/bottega-veneta/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ディオール'): ?>
	<a href="/kaitori/brand/dior/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'セリーヌ'): ?>
	<a href="/kaitori/brand/celine/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'クロエ'): ?>
	<a href="/kaitori/brand/chloe/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ロエベ'): ?>
	<a href="/kaitori/brand/loewe/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ブルガリ'): ?>
	<a href="/kaitori/brand/bvlgari/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ミュウミュウ'): ?>
	<a href="/kaitori/brand/miumiu/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'サマンサタバサ'): ?>
	<a href="/kaitori/brand/samanthathavasa/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ヴァレクストラ'): ?>
	<a href="/kaitori/brand/valextra/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ティファニー'): ?>
	<a href="/kaitori/brand/tiffany/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ハリーウィンストン'): ?>
	<a href="/kaitori/brand/harrywinston/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ヴァンクリーフ＆アーペル'): ?>
	<a href="/kaitori/brand/vancleefarpels/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'カルティエ'): ?>
	<a href="/kaitori/brand/cartier/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ブシュロン'): ?>
	<a href="/kaitori/brand/boucheron/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ポンテヴェキオ'): ?>
	<a href="/kaitori/brand/pontevecchio/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'クロムハーツ'): ?>
	<a href="/kaitori/brand/chromehearts/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'アーカー'): ?>
	<a href="/kaitori/brand/ahkah/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'グラフ'): ?>
	<a href="/kaitori/brand/graff/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ピアジェ'): ?>
	<a href="/kaitori/brand/piaget/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ミキモト'): ?>
	<a href="/kaitori/brand/mikimoto/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ダミアーニ'): ?>
	<a href="/kaitori/brand/piagetdamiani/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'フレッド'): ?>
	<a href="/kaitori/brand/fred/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ショパール'): ?>
	
	<a href="/kaitori/brand/chopard/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'カラーダイヤ'): ?>
	<a href="/kaitori/diamond/color-diamond/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'ピンクダイヤ'): ?>
	<a href="/kaitori/diamond/pink-diamond/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == '小さいダイヤ'): ?>
	<a href="/kaitori/diamond/melee-diamond/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == 'プレミア切手'): ?>
	<a href="/kaitori/letter-top/premium-stamp/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == '着物'): ?>
	<a href="/kaitori/kottou/kimono/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == '24金'): ?>
	<a href="/kaitori/gold/k24/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == '金の大判・小判'): ?>
	<a href="/kaitori/gold/koban/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php elseif(get_field('column_breadcrumbs2') == '金貨・金コイン'): ?>
	<a href="/kaitori/gold/coin/"><?php the_field('column_breadcrumbs2'); ?><span></span></a>
<?php endif; ?>



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
			<p class="blog-detail-date">
				<time datetime="<?php the_modified_date("Y-m-d H:i:s"); ?>" itemprop="modified">更新日：<?php the_modified_date('Y/m/d') ?></time>
			</p>
      <h1 class="section-ja-title shop-detail-h1">
				<?php the_title();?>
			</h1>

				<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
				
				<img src="<?php echo $post_thumbnail;?>" alt="<?php the_title();?>" class="blog-detail-img">
				
			<?php else:?>
				<img class="blog-detail-img" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="ジュエルぐま">
			<?php endif;?>

			<section class="column-comment mb-60">
				<?php 

					$post_content = do_shortcode(wpautop(get_the_content()));
					
					echo get_link_thumbnail($post_content);
					
					//the_content();
					
				?>
			</section>








<?php if(get_field('column_q1') && get_field('column_a1') && get_field('column_q2') && get_field('column_a2')): ?>


	<section class="faq">
		<div class="title">
			<?php
				$parent_id = $post->post_parent; // 親ページのIDを取得
				$parent_title = get_post($parent_id)->post_title; // 親ページのタイトルを取得
				if($parent_title == '遺品整理') {
					$parent_title = $parent_title.'をしたい方から';
				}elseif($parent_title == 'ブロックチェーン'){
					$parent_title = '';
				}else{
					$parent_title = $parent_title.'を売りたい方から';
				}
				echo $parent_title.'<br class="pc-none">よくいただく質問'; // 親ページのタイトルを表示
			?>
		</div>
		<ul>
			<li>
				<dl>
					<dt>
						<p class="q"><?php the_field('column_q1'); ?></p>
					</dt>
					<dd>
						<p class="a"><?php the_field('column_a1'); ?></p>
					</dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>
						<p class="q"><?php the_field('column_q2'); ?></p>
					</dt>
					<dd>
						<p class="a"><?php the_field('column_a2'); ?></p>
					</dd>
				</dl>
			</li>
		</ul>
	</section>



<?php endif; ?>










<?php get_template_part( 'template-parts/cta' );?>

<div class="supervision_box">
	<div class="image"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/supervision_person.svg" alt="監修"></div>
	<div class="txt">
		<div class="name">監修：安井 理</div>
		<div class="career">慶應義塾大学 文学部 人間関係学科卒。1999年より神奈川を中心に学習塾・結婚相談所・リユース専門店などを経営。特にリユース専門店は県内30店舗まで展開した後、戦略的バイアウト。以降は越境ECや業界特化型のライター・コラムニスト・アドバイザーとして活躍。</div>
	</div>
</div>


<?php get_template_part( 'template-parts/sns' );?>







			






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
