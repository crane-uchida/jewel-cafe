

<?php get_header( );?>

	<div id="page-top"></div>
			<div class="main-section">
				<div class="only-pc">
					<?php $image_fv_pc = get_field('fv_image_pc'); if(!empty($image_fv_pc)):?>
					<img src="<?php echo esc_url($image_fv_pc['url']);?>" alt="ジュエルカフェならお店で今すぐかんたんスピード買取！ 査定・ご相談0円" >
					<?php endif;?>
				</div>
				<div class="only-sp">
					<?php $image_fv_sp = get_field('fv_image_sp'); if(!empty($image_fv_sp)):?>
					<img src="<?php echo esc_url($image_fv_sp['url']);?>" alt="ジュエルカフェならお店で今すぐかんたんスピード買取！ 査定・ご相談0円" >
					<?php endif;?>
				</div>
			</div>

			<?php kaitori_breadcrumb();?>

			<?php
				$wp_obj = get_queried_object( );
				$parent = $wp_obj->post_parent;
				$terms = get_the_terms($wp_obj->ID, 'hinmoku');
				foreach ($terms as $term) {
					if($term->parent === 0) {
						$parent_terms_slug = $term->slug;
						$parent_terms_id = $term->term_id;
						$parent_terms_name = $term->name;
					}
				}

				foreach ($terms as $term) {
					if ($term->parent === $parent_terms_id) {
						$child_terms_slug = $term->slug;
						$child_terms_id = $term->term_id;
						$child_terms_name = $term->name;
					}
				}

				if(count($terms) === 3) {
					foreach ($terms as $term) {
						if ($term->parent === $child_terms_id) {
							$grand_child_terms_slug = $term->slug;
							$grand_child_terms_name = $term->name;
						}
					}
				}
				if($parent === 0):
			?>
				<section class="intro section-inner">
					<?php get_template_part( 'template-parts/intro-kaitori-parents' );?>
				</section>
			<?php else:?>
				<section>
					<div class="section-inner">
						<?php get_template_part( 'template-parts/intro-kaitori-children' );?>
					</div>
				</section>
			<?php endif;?>

			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69163">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>

			<?php if (get_field('高価買取その1_タイトル')):?>
			<section class="ex-purchase">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">ジュエルカフェは</span>
							<span class="common-ttl-main"><span class="color-red">高価買取</span>を<br>実現しています！</span>
						</h2>
						<div class="common-ttl-en">Expensive Purchase</div>
					</div>
				</div>
				<div class="section-inner">
					<p class="lh-20">
						<?php the_field('高価買取説明文');?>
					</p>
					<?php get_template_part( 'template-parts/ex-purchase' );?>
				</div>
			</section>
			<?php endif;?>





			<section class="kaitori-resuluts">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">ジュエルカフェの</span>
							<span class="common-ttl-main"><?php the_title( ); ?><span class="color-red">買取方法</span></span>
						</h2>
						<div class="common-ttl-en">How to sell</div>
					</div>
				</div>

				<div class="section-inner">
					<p class="lh-20">ジュエルカフェの<?php the_title( ); ?>買取は、お客様のご都合に合わせて3つの便利な買取方法をご用意しています。<br>どの方法をご利用いただいても、ジュエルカフェなら1点1点丁寧に査定！お客様の<?php the_title( ); ?>を高価買取いたします。</p>

					<div class="tentouKaitoriRecommend">
						<div class="inner">おすすめ！</div>
					</div>

					<div class="d-f tentouKaitori">
						<div class="left"><img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/tentou_image.jpg"></div>
						<div class="right d-f">
							<p class="txt1">お客様満足度No1！<br>ジュエルカフェおすすめの<br class="br-sp"><?php the_title( ); ?>買取方法です。</p>
							<h3 class="kaitoriName">店頭買取</h3>
							<ul class="tentouKaitoriPoint_pc d-f">
								<li>スピード査定</li>
								<li>全国250店舗以上</li>
								<li>即日現金お渡し</li>
							</ul>
						</div>
					</div>
					<ul class="tentouKaitoriPoint_sp">
						<li>スピード査定</li>
						<li>全国250店舗以上</li>
						<li>即日現金お渡し</li>
					</ul>
					<p class="lh-20"><?php the_title( ); ?>買取専門店ジュエルカフェは全国250店舗！大型ショッピングセンターや駅前商店街など、お買い物のついでにお気軽にお立ち寄りいただけるロケーションでお待ちしております。商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定! スピード重視・ご相談重視なら、店頭買取がオススメです！</p>

					<h3 id="acMenu" class="detailBtn"><?php the_title( ); ?>の店頭買取方法を詳しく見る</h3>
					<div class="buy-flow acMenuContents">
		        <ul>
		          <li>
		            <h4 class="buy-flow-ttl">ご来店・受付</h4>
		            <p>こちらのページから最寄りのジュエルカフェをお探しください。日本全国のショッピングセンター、駅前商店街などに出店しております。ご来店の際は必ず<span>《運転免許証・保険証等の身分証明書》</span>をご持参ください。</p>
		            <div class="flow-number">01</div>
		          </li>
		          <li>
		            <h4 class="buy-flow-ttl">商品のお預かり</h4>
		            <p>ジュエルカフェの経験豊富な査定スタッフが、お客様の大切な商品をお預かりいたします。</p>
		            <div class="flow-number">02</div>
		          </li>
		          <li>
		            <h4 class="buy-flow-ttl">査定</h4>
		            <p>ジュエルカフェの店頭買取はスピード査定が自慢！およそ10分～15分程度で査定は完了いたします。（お客様のお待ち状況・お持ち込みの点数によってお待たせする場合もございます。）お待ちの間は、店内のカフェスペースにて無料のお飲み物をお召し上がりいただけます。くつろぎの空間で、ごゆっくりお過ごしください。</p>
		            <div class="flow-number">03</div>
		          </li>
		          <li>
		            <h4 class="buy-flow-ttl">査定結果のお知らせ・<br class="only-sp">お支払い</h4>
		            <p>査定が終わりましたら、お買取金額をお知らせいたします。金額にご納得いただけましたら買取成立となり、その場で代金をお支払いいたします。また、次回のご来店時にご利用いただけるクーポン券やメンバーズカードもお渡しいたします。ご利用毎にお得になる会員特典はリピーター様に大好評です。ぜひまたご利用ください！</p>
		            <div class="flow-number">04</div>
		          </li>
		        </ul>
		      </div>




					<div class="takuhaiSyuttyouKaitori d-f jc-sb">
						<div class="left">
							<div class="head d-f">
								<div class="left"><img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/takuhai_image.jpg"></div>
								<div class="right">
									<p class="txt1">全国送料無料！<br>スマホから簡単申し込み！</p>
									<h3 class="kaitoriName">宅配買取</h3>
								</div>
							</div>
							<ul class="point d-f jc-sb">
								<li>無料発送キット</li>
								<li>スピード査定</li>
								<li>スマホ申し込み</li>
								<li>詰めて送るだけ！</li>
							</ul>
							<p class="lh-18">宅配買取なら無料の発送キットに詰めて送るだけ！パソコンやスマホで24時間お申し込みいただけますので、お店まで出かけるお時間のない方にピッタリです！</p>
							<div class="linkBtn"><a href="<?php echo esc_url(home_url('delivery-buy/'));?>"><?php the_title( ); ?>の宅配買取方法を詳しく見る</a></div>
						</div>

						<div class="right">
							<div class="head d-f">
								<div class="left"><img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shucho_image.jpg"></div>
								<div class="right">
									<p class="txt1">大量の商品でも安心！<br>ご自宅で査定します！</p>
									<h3 class="kaitoriName">出張買取</h3>
								</div>
							</div>
							<ul class="point d-f jc-sb">
								<li>大量でも安心！</li>
								<li>即日現金お渡し</li>
								<li>スマホ申し込み</li>
								<li>お出かけ不要！</li>
							</ul>
							<p class="lh-18">ジュエルカフェの出張買取は「自宅で待つだけ」。面倒な梱包や運び出しもすべてジュエルカフェの専門スタッフが責任持って行います。大量の商品でも安心！</p>
							<div class="linkBtn"><a href="<?php echo esc_url(home_url('trip-buy/'));?>"><?php the_title( ); ?>の出張買取方法を詳しく見る</a></div>
						</div>
					</div>




				</div>
			</section>





			<?php if($parent_terms_slug === 'diamond'):?>
				<?php get_template_part( 'template-parts/diamond-simulator' );?>
			<?php endif;?>
			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				$post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定


				if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
					$current_terms_slug = array(); // 配列のセット
					foreach( $post_terms as $value ){ // 配列の作成
						if($value->parent) {
							$currnet_terms_slug[] = $value->slug; // タームのスラッグを配列に追加
						} else {

							$parent_terms_slug = $value->slug;
							$currnet_terms_slug[] = $value->slug;
						}
					}
				}



				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => $post_type_slug, // 投稿タイプを指定
					'posts_per_page' => 10, // 表示件数を指定
					'orderby' =>  'DESC', // ランダムに投稿を取得
					'paged' => $paged,
					'tax_query' => array( // タクソノミーパラメーターを使用
						array(
							'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
							'field' => 'slug', // スラッグに一致するタームを返す
							'terms' => $currnet_terms_slug // タームの配列を指定
						)
					)
				);



				$the_query = new WP_Query($args); if($the_query->have_posts()):
			?>
			<section class="kaitori-resuluts">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">リアルタイム!</span>
							<span class="common-ttl-main"><?php the_title( ); ?><span class="color-red">買取事例</span></span>
						</h2>
						<div class="common-ttl-en">Purchase Results</div>
					</div>
				</div>


				<div class="section-inner">
					<p class="lh-20">全国のジュエルカフェにて毎日数千件お買取させていただく<?php the_title( ); ?>商品をご紹介します。<br><?php the_title( ); ?>のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>


					<ul class="blog-archive-list">
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
					<?php
						$hinmoku_terms = get_the_terms($post->ID, 'hinmoku');
						foreach($hinmoku_terms as $term) {
							if($term->parent === 0) {
								$hinmoku_parent_name = $term->name;
								$hinmoku_parent_id = $term->term_id;
								$hinmoku_parent_slug = $term->slug;
							}
						}
						foreach($hinmoku_terms as $term) {
							if($term->parent === $hinmoku_parent_id) {
								$hinmoku_child_name = $term->name;
								$hinmoku_child_id = $term->term_id;
								$hinmoku_child_slug = $term->slug;
							}
						}
						foreach($hinmoku_terms as $term) {
							if($term->parent === $hinmoku_child_id) {
								$hinmoku_grandchild_name = $term->name;
								$hinmoku_grandchild_slug = $term->slug;
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
					<li>
						<a href="<?php the_permalink() ?>">
							<div class="blog-catch-img">
								<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
									<img class="blog-detail-img" src="<?php echo $post_thumbnail;?>" alt="<?php the_title();?>">
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
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

					<div class="blog-archive-linkWrapper">
						<?php
							if($grand_child_terms_slug) {
								$blog_archive_link = $hinmoku_parent_slug.'/'.$hinmoku_child_slug.'/'.$hinmoku_grandchild_slug.'/';
							} elseif($child_terms_slug) {
								$blog_archive_link = $hinmoku_parent_slug.'/'.$hinmoku_child_slug.'/';
							} else {
								$blog_archive_link = $hinmoku_parent_slug.'/';
							}
						?>
						<a href="<?php echo esc_url(home_url('blogs/'.$blog_archive_link));?>" class="blog-archive-link">もっと見る</a>
					</div>
				</div>
			</section>

			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69164">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>

			<?php endif; ?>



			<section class="kaitori-kinds">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">買取可能な</span>
							<?php
								// 階層によって見出しを分岐
								if($post->post_parent === 0){
									echo '<span class="common-ttl-main">'.get_the_title().'の<span class="color-red">種類</span></span>';
								}else{
									$children_args = array(
										'post_parent'=> $post->ID,
										'post_type'  => 'kaitori'
									);
									if(!count(get_children($children_args)) && !$grand_child_terms_slug){ //現在の下階層ページかつ孫タームが紐付いてないとき
										//孫ページがない子ページ
										echo '<span class="common-ttl-main">'.esc_html($parent_terms_name).'の<span class="color-red">種類</span></span>';
									} elseif (count(get_children($children_args)) > 0){
										//孫ページがある子ページ
										echo '<span class="common-ttl-main">'.get_the_title().'の<span class="color-red">種類</span></span>';
									} else {
										//孫ページ
										echo '<span class="common-ttl-main">'.esc_html($child_terms_name).'の<span class="color-red">種類</span></span>';
									}
								}
							?>
						</h2>
						<div class="common-ttl-en">Kinds we make expensive purchase</div>
					</div>
				</div>
				<div class="section-inner">
					<ul class="kaitori-kinds-list">
						<?php if($post->$post_parent === 0): //親ページの処理
							$args = array(
								'post_type' => 'kaitori',
								'posts_per_page' => -1,
								'post_parent' => $post->ID,
								'no_found_rows' => true,
								'order' => 'ASC',
								'orderby' => 'menu_order'
							);
							$the_query = new WP_Query($args); if($the_query->have_posts()):
							?>
							<?php while($the_query->have_posts()): $the_query->the_post();?>
								<li>
									<a href="<?php the_permalink();?>">
										<div class="kaitori-kinds-label ta-c">
											<h3 class="small-font-size"><?php the_title();?></h3>
										</div>
										<div class="kaitori-kinds-img ta-c">
											<?php the_post_thumbnail( 'full' );?>
										</div>
									</a>
								</li>
							<?php
								endwhile;
								wp_reset_postdata(  );
								endif;
							?>
						<?php else:?>
							<?php
								$children_args = array(
									'post_parent'=> $post->ID,
									'post_type'  => 'kaitori'
								);
								if(!count(get_children($children_args)) && !$grand_child_terms_slug): //子ページかつ最下層の処理
							?>
								<?php
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post__not_in' => array($post->ID),
									'post_parent' => $wp_obj->post_parent,
									'no_found_rows' => true,
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>
									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-label ta-c">
												<h3 class="small-font-size"><?php the_title();?></h3>
											</div>
											<div class="kaitori-kinds-img ta-c">
												<?php the_post_thumbnail( 'full' );?>
											</div>
										</a>
									</li>
								<?php
									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php //孫ページがある子ページ
								elseif(count(get_children($children_args)) > 0):
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post_parent' => $post->ID,
									'no_found_rows' => true,
									'order' => 'ASC',
									'orderby' => 'menu_order'
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>
									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-label ta-c">
												<h3 class="small-font-size"><?php the_title();?></h3>
											</div>
											<div class="kaitori-kinds-img ta-c"><?php ?>
												<?php the_post_thumbnail( 'full' );?>
											</div>
										</a>
									</li>
								<?php
									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php
								else: //孫ページの場合
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post__not_in' => array($post->ID),
									'post_parent' => $wp_obj->post_parent,
									'no_found_rows' => true,
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>
									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-label ta-c">
												<h3 class="small-font-size"><?php the_title();?></h3>
											</div>
											<div class="kaitori-kinds-img ta-c">
												<?php the_post_thumbnail( 'full' );?>
											</div>
										</a>
									</li>
								<?php
									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php endif;?>
						<?php endif;?>
					</ul>
				</div>
			</section>

			<?php
				//時計の子ページ(2階層目まで表示)
				if (has_term('tokei', 'hinmoku')):
					$wp_obj = $wp_obj ?: get_queried_object(  );
					$tokei_parent_post = get_page_by_path( 'tokei', OBJECT, 'kaitori' );
					$tokei_parent_post_id = $tokei_parent_post->ID;
					// if ($wp_obj->post_parent === $tokei_parent_post_id):
			?>
				<?php get_template_part('template-parts/tokei-one-price-accordion');?>
			<?php
					endif;
				// endif
			;?>

			<section class="kaitori-policy">
				<div class="policy-inner section-inner">

					<div class="head flex -jscenter ls_15">
						<div class="common-ttl policy-ttl">
							<div class="section-inner">
								<h2 class="kaitori-title">
									<span class="common-ttl-sub">ジュエルカフェが</span>
									<span class="common-ttl-main"><span class="marker-yellow"><span class="color-red"><?php the_title(); ?>買取</span>に</span><br><span class="marker-yellow">強い理由</span></span>
								</h2>
							</div>
						</div>
					</div>

					<div class="body">
						<div class="policies">

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-01.jpg" alt="プロの査定スタッフ"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由<span>1</span></div>
										</div>
										<div class="policy-title"><h3>プロの査定スタッフ</h3></div>
										<div class="policy-text">ジュエルカフェではプロの査定スタッフが丁寧に査定いたします。最新の価格データ、市場相場を加味して自信を持って査定し、お客様にご満足いただける価格をご提示できるように日々努めております。</div>
									</div>
								</div>
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-02.jpg" alt="海外に展開・独自販売ルートの確立"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由<span>2</span></div>
										</div>
										<div class="policy-title"><h3>海外に展開・独自販売ルートの確立</h3></div>
										<div class="policy-text">ジュエルカフェでは海外にも多数の営業拠点を展開。お買取した商品は国内外のネットワークを活かして販売に繋げるため、より高い高価買取を実現できます。</div>
									</div>
								</div>
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-03.jpg" alt="直営250店舗の実績"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由<span>3</span></div>
										</div>
										<div class="policy-title"><h3>直営250店舗の実績</h3></div>
										<div class="policy-text">ジュエルカフェでは直営店舗として250店舗以上の店舗を展開し、これまでに〇〇〇人以上のお客様にお売りいただいております。これからもお客様に信頼していただけるよう努めてまいります。</div>
									</div>
								</div>
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-04.jpg" alt="様々な特典が利用可能"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由<span>4</span></div>
										</div>
										<div class="policy-title"><h3>様々な特典が利用可能</h3></div>
										<div class="policy-text">ジュエルカフェでは、ご来店時にご利用いただける様々な特典をご用意しており、リピーターのお客様にも大変お喜びいただいております。Tポイントやジュエリークリーニングなども大好評です。</div>
									</div>
								</div>
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-05.jpg" alt="お近くのお店で気軽に無料査定"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由<span>5</span></div>
										</div>
										<div class="policy-title"><h3>お近くのお店で気軽に無料査定</h3></div>
										<div class="policy-text">ジュエルカフェは大型ショッピングモールや駅前商店街など便利なエリアにお店を展開。お買い物ついでに気軽に立ち寄れる居心地の良い空間を私たちは常に目指しております。</div>
									</div>
								</div>
							</div>

					</div>

				</div><!-- bg -->
			</section>


			<section class="kaitori-voice">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">ジュエルカフェで<br><?php the_title(); ?>をご利用いただいた</span>
							<span class="common-ttl-main">お客様の<span class="color-red">声</span></span>
						</h2>
						<div class="common-ttl-en">Customer's Voice</div>
					</div>
				</div>

				<div class="rating py-4">
          <div class="text-center">
            <div class="count-rating color-red">
              <div class="bold">
                <span>4.8</span>
              </div>
              <div class="devider"></div>
              <div class="star-rating">
                <div class="star-rating-front" style="width: 96%"></div>
                <div class="star-rating-back"></div>
              </div>
            </div>
            <div class="count-review mt-3 ta-c">
              （<span>47</span>件のレビュー）
            </div>
          </div>
        </div>

				<div class="section-inner">
					<div class="voice-list2">

						<div class="voice-list-item">
							<div class="d-f media jc-sb">
								<div class="voice-img">
									<?php
										$sex = get_field('お客様の声その1_性別');
										if ($sex == '女'):
									?>
										<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer.png" alt="買取してもらった女性お客様">
									<?php else: ?>
										<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer_male.png" alt="買取してもらった男性お客様">
									<?php endif; ?>
								</div>
								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その1_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その1_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">
								<div class="voice-img">
								<?php
									$sex = get_field('お客様の声その2_性別');
									if ($sex == '女'):
								?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer.png" alt="買取してもらった女性お客様">
								<?php else: ?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer_male.png" alt="買取してもらった男性お客様">
								<?php endif; ?>
								</div>
								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その2_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その2_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">
								<div class="voice-img">
								<?php
									$sex = get_field('お客様の声その3_性別');
									if ($sex == '女'):
								?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer.png" alt="買取してもらった女性お客様">
								<?php else: ?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer_male.png" alt="買取してもらった男性お客様">
								<?php endif; ?>
								</div>
								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その3_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その3_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">
								<div class="voice-img">
								<?php
									$sex = get_field('お客様の声その4_性別');
									if ($sex == '女'):
								?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer.png" alt="買取してもらった女性お客様">
								<?php else: ?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer_male.png" alt="買取してもらった男性お客様">
								<?php endif; ?>
								</div>
								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その4_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その4_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">
								<div class="voice-img">
								<?php
									$sex = get_field('お客様の声その5_性別');
									if ($sex == '女'):
								?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer.png" alt="買取してもらった女性お客様">
								<?php else: ?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer_male.png" alt="買取してもらった男性お客様">
								<?php endif; ?>
								</div>
								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その5_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その5_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">
								<div class="voice-img">
								<?php
									$sex = get_field('お客様の声その6_性別');
									if ($sex == '女'):
								?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer.png" alt="買取してもらった女性お客様">
								<?php else: ?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer_male.png" alt="買取してもらった男性お客様">
								<?php endif; ?>
								</div>
								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その6_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その6_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">
								<div class="voice-img">
								<?php
									$sex = get_field('お客様の声その7_性別');
									if ($sex == '女'):
								?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer.png" alt="買取してもらった女性お客様">
								<?php else: ?>
							    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer_male.png" alt="買取してもらった男性お客様">
								<?php endif; ?>
								</div>
								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その7_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その7_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">
								<div class="voice-img">
								<?php
									$sex = get_field('お客様の声その8_性別');
									if ($sex == '女'):
								?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer.png" alt="買取してもらった女性お客様">
								<?php else: ?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/customer_male.png" alt="買取してもらった男性お客様">
								<?php endif; ?>
								</div>
								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その8_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その8_お客様の声');?>
									</div>
								</div>
						</div>
					</div>
				</div>
			</section>








			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69165">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>

			<section class="kaitori-ways section-inner">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub"><?php the_title(); ?>買取で</span>
							<span class="common-ttl-main"><span class="color-red">高く売る方法</span></span>
						</h2>
						<div class="common-ttl-en">Ways to make expensive purchase Results</div>
					</div>
				</div>
				<?php ?>
				<div class="kaitori-ways-list">
					<?php the_field('高く売る方法');?>
				</div>
			</section>

			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'column'; // 投稿タイプのスラッグを指定
				$post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
				if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
					$terms_slug = array(); // 配列のセット
					foreach( $post_terms as $value ){ // 配列の作成
						$terms_slug[] = $value->slug; // タームのスラッグを配列に追加
					}
				}
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => $post_type_slug, // 投稿タイプを指定
					'posts_per_page' => 4, // 表示件数を指定
					'orderby' =>  'DESC', // 新着順に投稿を取得
					'paged' => $paged,
					'tax_query' => array( // タクソノミーパラメーターを使用
						array(
							'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
							'field' => 'slug', // スラッグに一致するタームを返す
							'terms' => $terms_slug // タームの配列を指定
						)
					)
				);
				$the_query = new WP_Query($args); if($the_query->have_posts()):
			?>
			<section class="kaitori-column">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub"><?php the_title(); ?>買取の</span>
							<span class="common-ttl-main"><span class="color-red">お役立ち</span>コラム</span>
						</h2>
						<div class="common-ttl-en">Colums</div>
					</div>
				</div>
				<div class="section-inner">
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
					<a href="<?php the_permalink() ?>">
						<div class="d-f">
							<div class="kaitori-info">
								<div class="kaitori-ttl color-black bold mb-4"><h3><?php the_title();?></h3></div>
								<div class="kaitori-txt color-black"><?php echo mb_substr(get_the_excerpt(), 0, 50) . '...';?></div>
							</div>
							<div class="kaitori-column-img">
								<?php if($post_thumbnail = get_the_post_thumbnail( $post->ID, 'full' )):?>
									<?php echo $post_thumbnail; ?>
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
								<?php endif;?>
							</div>
						</div>
					</a>

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</section>
			<?php endif; ?>

			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69166">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>

			<section class="kaitori-faq">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub"><?php the_title(); ?>買取の</span>
							<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
						</h2>
						<div class="common-ttl-en">Faq</div>
					</div>
				</div>
				<div class="section-inner">
				<?php if ( get_field('よくあるご質問その1_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その1_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その1_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その2_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その2_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その2_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その3_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その3_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その3_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その4_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その4_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その4_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その5_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その5_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その5_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その6_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その6_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その6_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その7_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その7_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その7_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その8_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その8_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その8_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その9_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その9_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その9_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その10_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その10_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その10_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

				</div>
			</section>

			<section class="kaitori-rank">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub"><?php the_title(); ?>買取の</span>
							<span class="common-ttl-main"><span class="color-red">ランキング</span></span>
						</h2>
						<div class="common-ttl-en">Ranking</div>
					</div>
				</div>
				<div class="section-inner">
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-01.png" alt="1位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<p class="kaitori-rank-item"><?php the_field('買取ランキング1位_タイトル');?></p>
						</div>
						<p class="kaitori-rank-txt"><?php the_field('買取ランキング1位_文章');?></p>
					</div>
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-02.png" alt="2位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<p class="kaitori-rank-item"><?php the_field('買取ランキング2位_タイトル');?></p>
						</div>
						<p class="kaitori-rank-txt"><?php the_field('買取ランキング2位_文章');?></p>
					</div>
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-03.png" alt="3位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<p class="kaitori-rank-item"><?php the_field('買取ランキング3位_タイトル');?></p>
						</div>
						<p class="kaitori-rank-txt"><?php the_field('買取ランキング3位_文章');?></p>
					</div>
				</div>
			</section>

			<section class="kaitori-howto">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub"><?php the_title(); ?>買取</span>
							<span class="common-ttl-main">今週の<span class="color-red"><?php the_title(); ?></span>豆知識</span>
						</h2>
						<div class="common-ttl-en">HOW TO TIPS</div>
					</div>
				</div>
				<div class="section-inner">
					<div class="kaitori-howto-item d-f">
						<h3 class="kaitori-howto-item-title"><?php the_field('買取豆知識_タイトル');?></h3>
						<?php $image_kaitori_howto = get_field('買取豆知識_画像'); if(!empty($image_kaitori_howto)):?>
							<img src="<?php echo esc_url($image_kaitori_howto['url']);?>" alt="<?php echo esc_html($image_kaitori_howto['url']);?>">
						<?php endif;?>
					</div>
					<div class="kaitori-howto-txt">
						<?php the_field('買取豆知識_文章');?>
					</div>
				</div>
			</section>

      <?php get_template_part( 'template-parts/common-tab' );?>

			<?php get_footer( );?>
