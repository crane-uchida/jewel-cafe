<?php
/*
Template Name: 品目一覧
*/
?>

<?php get_header( );?>



<div id="page-top"></div>



<div class="main-section">
		<section class="breadcrumbs_type2">
			<style>
				.breadcrumbs_type2{
					.breadcrumbs{
						background:none;
						margin-bottom:0;
						padding: 0px 0 0px;
						letter-spacing: normal;
					}
				}
				.main-section + .main-section{
					padding-top:0;
				}
				.kaitori section {
					padding-bottom: 0;
				}

				.kaitori-kinds-feature{
					padding: 70px 0px;
				}
				.kaitori-kinds-feature .name{
					font-size: 20px;
					border-bottom: 1px solid #9f9f9f;
					margin-bottom: 15px;
					padding-bottom: 5px;
				}
				.kaitori-kinds-feature img{
					width: 180px;
					margin-right:15px;
				}
				.kaitori-kinds-feature .flex{
					margin-bottom:30px;
				}
				.static-catch{
					padding-top:0;
				}
				@media screen and (max-width: 480px){
					.kaitori-kinds-feature .flex{
						flex-wrap:wrap;
					}
					.kaitori-kinds-feature .flex > *{
						width: 100%;
					}
					.kaitori-kinds-feature img{
						margin: auto;
    					display: block;
					}
					.kaitori-kinds-feature .text{
						margin-top:10px;
					}
				}
			</style>
			<?php kaitori_breadcrumb();?>
		</section>
	</div>

    <div id="archive-kaitori" class="section-inner">
      <h1 class="section-ja-title">買取品目の一覧</h1>
<?php /* ?> 削除してもよい
      <div class="main-section pos-r pt-0">
        <picture class="">
          <source media="(min-width: 768px)" srcset="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/kaitori/purchase-mv_pc.jpg">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/kaitori/purchase-mv_sp.jpg">
          <img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/purchase-mv_pc.jpg" alt="ジュエルカフェならお店で今すぐかんたんスピード買取！ 査定・ご相談0円" width="1000" height="400">
        </picture>
      </div>
<?php */ ?>
      <div class="mv">
        <p class="text">ジュエルカフェは<br>ラグジュアリーブランドの<br>高価買取を全店をあげて<br>強化しています。</p>
        <p class="text2">定番のルイヴィトン・シャネルをはじめ、<br>ラグジュアリーブランドなら他店に負けない高額査定で<br>ご案内しています。ぜひお持ち下さいませ。</p>
      </div>

      <section class="purchase">
        <h4 class="ttl-box-red">高価買取！買取品目拡大中！</h4>
        <p class="base-font-size">全国300店舗以上の買取専門店ジュエルカフェは買取品目をただいま大幅拡大中！<br>「こんなものも買い取ってもらえるの？」そんなご相談も大歓迎！</p>
				<?php get_template_part( 'template-parts/common-purchase-item' );?>
      </section>

      <section>
        <h3 class="ttl-box-red">ブランドバッグ・ジュエリー 買取強化リスト</h3>
        <div class="kaitori-list">
          <ul>
            <li>アイグナー / AIGNER</li>
            <li>アズディン アライア / Azzedine Alaia</li>
            <li>アルベルタ フェレッティ / ALBERTA FERRETTI</li>
            <li>アレキサンダー・マックイーン / Alexander McQueen</li>
            <li>アントニオ マラス / ANTONIO MARRAS</li>
            <li>イヴ サロモン / Yves Salomon</li>
            <li>イヴ・サンローラン / Yves Saint Laurent</li>
            <li>エスカーダ / ESCADA</li>
            <li>エトロ / ETRO</li>
            <li>エマニュエル ウンガロ / Emanuel Ungaro</li>
            <li>エミリオ プッチ / EMILIO PUCCI</li>
            <li>エムエークロス / m.a+</li>
            <li>エリザベス エマニュエル / Elizabeth Emanuel</li>
            <li>エリー サーブ / Elie Saab</li>
            <li>エルメス / HERMES</li>
            <li>エルメネジルド ゼニア / Ermenegildo Zegna</li>
            <li>カルティエ / Cartier</li>
            <li>クリスチャン ラクロワ / Christian Lacroix</li>
            <li>クリスチャン ルブタン / Christian Louboutin</li>
            <li>クロエ / Chloe</li>
            <li>グッチ / GUCCI</li>
            <li>ケンゾー / KENZO</li>
            <li>コルネリアーニ / CORNELIANI</li>
            <li>サルヴァトーレ フェラガモ / Salvatore Ferragamo</li>
            <li>シャネル / CHANEL</li>
          </ul>
          <ul>
            <li>シュルーク / Shourouk</li>
            <li>ショパール / Chopard</li>
            <li>ジバンシィ / Givenchy</li>
            <li>ジャンフランコ フェレ / GIANFRANCO FERRE</li>
            <li>ジュリアン マクドナルド / Julien Macdonald</li>
            <li>ジョルジオ アルマーニ / Giorgio Armani</li>
            <li>ジル・サンダー / JIL SANDER</li>
            <li>スワロフスキー / SWAROVSKI</li>
            <li>セリーヌ / CELINE</li>
            <li>タダシ ショージ / TADASHI SHOJI</li>
            <li>ティファニー / Tiffany&Co.</li>
            <li>テラクオーレ / Terracuore</li>
            <li>ディオール / Dior</li>
            <li>デルヴォー / DELVAUX</li>
            <li>トム フォード / Tom Ford</li>
            <li>ドルチェ＆ガッバーナ / DOLCE&GABBANA</li>
            <li>ニナ リッチ / NINA RICCI</li>
            <li>ヌメロ ヴェントゥーノ / N°21</li>
            <li>ハリー・ウィンストン / HARRY WINSTON</li>
            <li>バリー / Bally</li>
            <li>バルマン / BALMAIN</li>
            <li>バレンシアガ / BALENCIAGA</li>
            <li>バーバリー / BURBERRY</li>
            <li>ファルッチ / FARRUTX</li>
            <li>フェンディ / FENDI</li>
            <li>プラダ / PRADA</li>
          </ul>
          <ul>
            <li>ボッテガ・ヴェネタ / BOTTEGA VENETA</li>
            <li>ポメラート / Pomellato</li>
            <li>マシュー ウィリアムソン / Matthew Williamson</li>
            <li>マスターマインド・ジャパン / mastermind JAPAN</li>
            <li>マルセロ・ブロン カウンティ・オブ・ミラン / MARCELO BURLON COUNTY OF MILAN</li>
            <li>ミッソーニ / Missoni</li>
            <li>モンクレール ガム ルージュ / MONCLER GAMME ROUGE</li>
            <li>モンクレール ガム・ブルー / MONCLER GAMME BLEU</li>
            <li>ラファエル キャノ / RAPHAELE CANOT</li>
            <li>ランセル / LANCEL</li>
            <li>ルイ・ヴィトン / LOUIS VUITTON</li>
            <li>レポシ / REPOSSI</li>
            <li>ロイヤル チエ / ROYAL CHIE</li>
            <li>ロエベ / LOEWE</li>
            <li>ロシャス / ROCHAS</li>
            <li>ロベルト カヴァリ / roberto cavalli</li>
            <li>ロマン・ジェローム / ROMAIN JEROME</li>
            <li>ロリータ・ロレンゾ / Lolita Lorenzo</li>
            <li>ヴァレンティノ / VALENTINO</li>
            <li>ヴァン クリーフ＆アーペル / Van Cleef & Arpels</li>
            <li>ヴェルサーチ / VERSACE</li>
          </ul>
        </div>
      </section>

      <section class="mt-20">
        <h3 class="ttl-box-red">ブランドバッグ・ジュエリー 買取強化リスト</h3>
        <div class="kaitori-list">
          <ul>
            <li>A.ランゲ＆ゾーネ / A.LANGE&SOHNE</li>
            <li>F.P.ジュルヌ / F.P. Journe</li>
            <li>H.モーザー / H.Moser & Cie.</li>
            <li>IWC / International Watch Company</li>
            <li>アイクポッド / IKEPOD</li>
            <li>アイスウォッチ / ICE-WATCH</li>
            <li>アクアノウティック / AQUANAUTIC</li>
            <li>アスプレイ / ASPREY</li>
            <li>アルピナ / Alpina</li>
            <li>アーノルド＆サン / ARNOLD&son</li>
            <li>イッセイ ミヤケ / ISSEY MIYAKE</li>
            <li>ウォルサム / WALTHAM</li>
            <li>ウブロ / HUBLOT</li>
            <li>エドックス / EDOX</li>
            <li>エベラール / EBERHARD</li>
            <li>エベル / EBEL</li>
            <li>エルメス / HERMES</li>
            <li>オフィチーネ パネライ / OFFICINE PANERAI</li>
            <li>オメガ / OMEGA</li>
            <li>オーデマ ピゲ / AUDEMARS PIGUET</li>
            <li>カシオ / Casio</li>
            <li>カミーユ・フォルネ / Camille Fournet</li>
            <li>カルティエ / Cartier</li>
            <li>カール F. ブヘラ / CARL F. BUCHERER</li>
            <li>ガガ ミラノ / GaGa Milano</li>
            <li>グッチ / GUCCI</li>
            <li>グラスヒュッテ オリジナル / Glashutte Original</li>
            <li>コモノ / KOMONO</li>
            <li>コンコルド / CONCORD</li>
            <li>サイモン カーター / Simon Carter</li>
            <li>シチズン / CITIZEN</li>
            <li>シャネル / CHANEL</li>
            <li>ショパール / Chopard</li>
            <li>ショーメ / CHAUMET</li>
            <li>ジェラルド ジェンタ / GERALD GENTA</li>
            <li>ジャガー ルクルト / Jaeger-LeCoultre</li>
            <li>ジャケ ドロー / JAQUET DROZ</li>
            <li>ジャンリシャール / JeanRichard</li>
            <li>ジャン・ルソー / JEAN ROUSSEAU</li>
            <li>ジュリアーノ マッツォーリ / GIULIANO MAZZUOLI</li>
            <li>ジョルジオ アルマーニ / Giorgio Armani</li>
          </ul>
          <ul>
            <li>ジョージ ジェンセン / Georg Jensen</li>
            <li>ジラール ペルゴ / GIRARD-PERREGAUX</li>
            <li>ジル スチュアート / JILLSTUART</li>
            <li>ジン / SINN</li>
            <li>ジーショック / G-SHOCK</li>
            <li>スイスミリタリー・ハノワ / SWISS MILITARY HANOWA</li>
            <li>スウォッチ / Swatch</li>
            <li>スティールクラフト / STEEL CRAFT</li>
            <li>セイコー / SEIKO</li>
            <li>ゼニス / ZENITH</li>
            <li>タイム ウィル テル / Time Will Tell</li>
            <li>タイメックス / TIMEX</li>
            <li>タグ ホイヤー / TAG Heuer</li>
            <li>ダニエル ロート / DANIEL ROTH</li>
            <li>ダニエル・ウェリントン / Daniel Wellington</li>
            <li>ダンヒル / dunhill</li>
            <li>ティソ / TISSOT</li>
            <li>ティファニー / Tiffany&Co.</li>
            <li>テンデンス / Tendence</li>
            <li>ディオール / Dior</li>
            <li>ディオール オム / Dior Homme</li>
            <li>トゥーレイト / TOO LATE</li>
            <li>ニクソン / NIXON</li>
            <li>ヌーカ / NOOKA</li>
            <li>ノモス / NOMOS</li>
            <li>ハミルトン / HAMILTON</li>
            <li>ハリー・ウィンストン / HARRY WINSTON</li>
            <li>バックス＆ストラウス / BACKES&STRAUSS</li>
            <li>バルトレー / Barthelay</li>
            <li>バルマン / BALMAIN</li>
            <li>バレンシアガ / BALENCIAGA</li>
            <li>バーバリー / BURBERRY</li>
            <li>パテック フィリップ / Patek Philippe</li>
            <li>パルミジャーニ フルリエ / PARMIGIANI FLEURIER</li>
            <li>ピアジェ / Piaget</li>
            <li>ピエール クンツ / PIERRE KUNZ</li>
            <li>フォッシル / FOSSIL</li>
            <li>フォリフォリ / Folli Follie</li>
            <li>フランク ミュラー / FRANCK MULLER</li>
            <li>フレデリック コンスタント / FREDERIQUE CONSTANT</li>
            <li>ブシュロン / BOUCHERON</li>
          </ul>
          <ul>
            <li>ブライトリング / BREITLING</li>
            <li>ブランパン / BLANCPAIN</li>
            <li>ブルガリ / BVLGARI</li>
            <li>ブレゲ / Breguet</li>
            <li>プラダ / PRADA</li>
            <li>ベタ＆カンパニー / BEDAT&CO</li>
            <li>ベル＆ロス / Bell&Ross</li>
            <li>ボヴェ / BOVET</li>
            <li>ボーム＆メルシエ / BAUME&MERCIER</li>
            <li>ポルシェデザイン / PORSCHE DESIGN</li>
            <li>ポール & ジョー / PAUL & JOE</li>
            <li>ポール ピコ / PAUL PICOT</li>
            <li>ポール・スミス / Paul Smith</li>
            <li>マイケル・コース / MICHAEL KORS</li>
            <li>マーティン ブラウン / MARTIN BRAUN</li>
            <li>モバード / MOVADO</li>
            <li>モンディーン / MONDAINE</li>
            <li>モンブラン / MONTBLANC</li>
            <li>ユニバーサル ジュネーブ / UNIVERSAL GENEVE</li>
            <li>ユリス ナルダン / ULYSSE NARDIN</li>
            <li>ラドー / RADO</li>
            <li>ラルフ ローレン / Ralph Lauren</li>
            <li>ラ・メール コレクションズ / LA MER COLLECTIONS</li>
            <li>リシャール ミル / RICHARD MILLE</li>
            <li>リップ / LIP</li>
            <li>リベンハム / Libenham</li>
            <li>ルイ・ヴィトン / LOUIS VUITTON</li>
            <li>ルミノックス / LUMI-NOX</li>
            <li>レオン アト / LEON HATOT</li>
            <li>ロジェ・デュブイ / ROGER DUBUIS</li>
            <li>ロゼモン / Rosemont</li>
            <li>ロドルフ / RODOLPHE</li>
            <li>ロマン・ジェローム / ROMAIN JEROME</li>
            <li>ロレックス / ROLEX</li>
            <li>ロンジン / LONGINES</li>
            <li>ヴァシュロン・コンスタンタン / VACHERON CONSTANTIN</li>
            <li>ヴァン クリーフ＆アーペル / Van Cleef & Arpels</li>
            <li>ヴェルサーチ / VERSACE</li>
          </ul>
        </div>
      </section>

			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>



<?php get_footer( );?>
