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
          <source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/declaration_mv_pc.avif" type="image/avif">
          <source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/declaration_mv_pc.jpg" type="image/jpeg">
          <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/declaration_mv_sp.avif" type="image/avif">
          <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/declaration_mv_sp.jpg" type="image/jpeg">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/declaration_mv_sp.jpg" alt="反社会的勢力排除宣言">
      </picture>
    </div>


    <div class="section-inner">
      <div class="contents_type2 mb-80">
        <h1 class="title_type2 mb-32">反社会的勢力排除宣言</h1>
        <div class="section-inner-700">
          <p class="base-font-size mb-24 lh-2">株式会社クレイン（以下、「当社」といいます）は、社会的責任ある企業として、コンプライアンス経営を徹底するため、反社会的勢力による経済活動への関与や、当該による被害を防止し、次のとおり、反社会的勢力排除に関する基本方針を定めます。</p>
          <ol class="number-type1 base-font-size lh-2">
            <li>当社は、政府方針である「企業が反社会的勢力による被害を防止するための指針」に基づき、暴力団、暴力団構成員、暴力団準構成員、暴力団関係企業、総会屋、社会運動標ぼうゴロ、特殊知能暴力集団を反社会的勢力と定め、当該勢力とは断固として対決し、取引関係を含めた一切の関係の排除に務めます。</li>
            <li>当社は、代表取締役等の経営トップ層以下、組織全体で反社会的勢力に対応するとともに、対応する従業員の安全確保に努めます。</li>
            <li>当社は反社会的勢力に対して、警察、暴力追放運動推進センター、弁護士等の外部専門機関と連携し、法令に則って組織的かつ適正に対応します。</li>
            <li>当社は裏取引、資金提供、不適切な取引などの不当な取引を含む反社会的勢力による不当要求には一切応じず、民事と刑事の両面から法的対応を行います。</li>
            <li>当社は、相手方が反社会的勢力かどうかについて、最大限の努力を講じて注意を払うとともに、万が一反社会的勢力との取引が判明した場合には、ただちに契約等を解消し、反社会的勢力との一切の関係遮断に努めます。</li>
            <li>当社は、いかなる理由があっても公明正大な対応を行うとともに、事案を隠ぺいするための裏取引は、絶対に行いません。</li>
            <li>当社は、反社会的勢力への資金提供は、絶対に行いません。</li>
          </ol>
          <p class="mtb-20 ta-r base-font-size">
            株式会社クレイン<br>
            代表取締役 新垣純
          </p>
        </div>
      </div>



			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>

<?php get_footer(); ?>