<?php get_header(); ?>

<style>
@media screen and (min-width: 1000px) {
  .mv img{
    display:block;
    width:1000px;
    margin-left:auto;
    margin-right:auto;
  }
}
</style>


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



    <div class="main-section">
      <picture class="mv">
          <source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/privacy_mv_pc.avif" type="image/avif">
          <source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/privacy_mv_pc.jpg" type="image/jpeg">
          <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/privacy_mv_sp.avif" type="image/avif">
          <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/privacy_mv_sp.jpg" type="image/jpeg">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/privacy_mv_sp.jpg" alt="個人情報保護方針">
      </picture>
    </div>


    <div class="section-inner">
      <div class="contents_type2 mb-80">
        <h1 class="title_type2 mb-32">個人情報保護方針</h1>
        <div class="section-inner-700">
          <p class="base-font-size mb-24 lh-2">株式会社クレイン（以下、「当社」といいます）は、業務上お客様、並びに従業員の重要な個人情報を保護することを、重大な社会的責任であると認識しております。将来に亘って、この大切な個人情報を適正、安全に取り扱うために、役職員のすべてが遵守すべき行動基準として本個人情報保護方針を定め、その遵守の徹底を図ってまいります。</p>
          <ol class="number-type1 base-font-size lh-2">
            <li>当社は全ての事業で取り扱う個人情報および役職員等の個人情報の取り扱いに関して、個人情報保護に関する法令、国が定める指針およびその他の規範を遵守します。</li>
            <li>当社は、役職員のすべてが遵守すべき行動基準として、日本工業規格「個人情報保護マネジメントシステム-要求事項」（J IS Q 15001）に準拠した個人情報保護マネジメントシステムを策定し、適切に維持し運用いたします。</li>
            <li>当社は、事業内容及び規模を考慮した適切な個人情報の取得を行い、事前に利用目的及び提供に有無を明確にし、本人の同意を得た上で、目的の範囲内において適切に利用し、目的外利用を行わないための措置を講じます。</li>
            <li>当社は前項の措置により取得した個人情報の取扱いの全部または一部を委託する場合、および個人情報を第三者に提供する場合には、充分な保護水準を満たした者を選定し、契約等により適切な措置を講じます。</li>
            <li>当社は、個人情報への不正アクセス、個人情報の紛失、破壊、き損、改ざん、漏洩などのリスクに対して合理的な安全対策および厚生措置を講じます。</li>
            <li>当社は、個人情報保護に関す苦情、ご相談に対し下記窓口で適切に対応いたします。</li>
            <li>当社は、ご本人からの当該個人情報の開示、訂正、削除、利用停止等の要請に対して遅延無く対応いたします。</li>
            <li>当社は、社会、経済情勢の変化に対応し、個人情報の適切な利用および保護のため、個人情報保護マネジメントシステムを継続的に見直し改善いたします。</li> 
          </ol>

          <div class="color-box-600 mt-40">
            <div class="bold color-red ft-16">＜個人情報苦情および相談窓口＞</div>
            <div class="bold mt-10 ft-14">株式会社クレイン　お客様相談室</div>
            <ul class="ft-14 mt-4">
              <li>TEL：<a href="tel:0120-107-903" class="color-black">0120-107-903</a></li>
              <li>メール：jewel-cafe@crane-a.co.jp</li>
            </ul>
          </div>
          <p class="ta-r base-font-size mt-32">制定：2007年5月1日<br>
            改定：2015年12月31日<br>
            株式会社クレイン<br>
            代表取締役 新垣純
          </p>
        </div>
      </div>






			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>


















<?php get_footer(); ?>