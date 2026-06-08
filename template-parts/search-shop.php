<div class="search-shop-bg mt-20">
	<div class="container -cushion">
		<div class="title">
			<div class="only-sp">
				<div class="search-shop-en search-shop-flex -jsstart">
					<div class="index sopia bold">Search Shop</div>
					<div class="border"></div>
				</div>
			</div>
			<div class="shop-ja-ttl">
				査定は無料です。<br>お近くの店舗までお問合せください
			</div>
			<div class="only-pc">
				<div class="search-shop-en search-shop-flex -jsstart">
					<div class="index sopia bold">Search Shop</div>
					<div class="border"></div>
				</div>
			</div>
		</div>
		<div class="search-shop-list" style="height: 115px;">
			<div class="wrap search-shop-flex c2 -wrap area_list">
				<a href="">
					<div class="ico_arrow">北海道・東北</div>
				</a>
				<a href="">
					<div class="ico_arrow">関東</div>
				</a>
				<a href="">
					<div class="ico_arrow">関西</div>
				</a>
				<a href="">
					<div class="ico_arrow">中部・北陸</div>
				</a>
				<a href="">
					<div class="ico_arrow">中国・四国</div>
				</a>
				<a href="">
					<div class="ico_arrow">九州・沖縄</div>
				</a>
			</div>
			<div class="prefs">
				<div class="wrap search-shop-flex c2 -wrap" data-area-wrap="0" style="opacity: 0; display: none;">
					<a href="" data-this-pref="道央">北海道</a>
					<a href="" data-this-pref="青森県">青森県</a>
					<a href="" data-this-pref="岩手県">岩手県</a>
					<a href="" data-this-pref="宮城県">宮城県</a>
					<a href="" data-this-pref="秋田県">秋田県</a>
					<a href="" data-this-pref="山形県">山形県</a>
					<a href="" data-this-pref="福島県">福島県</a>
				</div>
				<div class="wrap search-shop-flex c2 -wrap" data-area-wrap="1" style="opacity: 0; display: none;">
					<a href="" data-this-pref="東京都">東京都</a>
					<a href="" data-this-pref="神奈川県">神奈川県</a>
					<a href="" data-this-pref="埼玉県">埼玉県</a>
					<a href="" data-this-pref="千葉県">千葉県</a>
					<a href="" data-this-pref="茨城県">茨城県</a>
					<a href="" data-this-pref="群馬県">群馬県</a>
					<a href="" data-this-pref="栃木県">栃木県</a>
					<a href="" data-this-pref="山梨県">山梨県</a>
				</div>
				<div class="wrap search-shop-flex c2 -wrap" data-area-wrap="2" style="opacity: 0; display: none;">
					<a href="" data-this-pref="大阪府">大阪府</a>
					<a href="" data-this-pref="兵庫県">兵庫県</a>
					<a href="" data-this-pref="京都府">京都府</a>
					<a href="" data-this-pref="滋賀県">滋賀県</a>
					<a href="" data-this-pref="奈良県">奈良県</a>
					<a href="" data-this-pref="和歌山県">和歌山県</a>
				</div>
				<div class="wrap search-shop-flex c2 -wrap" data-area-wrap="3" style="opacity: 0; display: none;">
					<a href="" data-this-pref="愛知県">愛知県</a>
					<a href="" data-this-pref="岐阜県">岐阜県</a>
					<a href="" data-this-pref="三重県">三重県</a>
					<a href="" data-this-pref="静岡県">静岡県</a>
					<a href="" data-this-pref="新潟県">新潟県</a>
					<a href="" data-this-pref="長野県">長野県</a>
					<a href="" data-this-pref="富山県">富山県</a>
					<a href="" data-this-pref="石川県">石川県</a>
					<a href="" data-this-pref="福井県">福井県</a>
				</div>
				<div class="wrap search-shop-flex c2 -wrap" data-area-wrap="4" style="opacity: 0; display: none;">
					<a href="" data-this-pref="岡山県">岡山県</a>
					<a href="" data-this-pref="広島県">広島県</a>
					<a href="" data-this-pref="山口県">山口県</a>
					<a href="" data-this-pref="鳥取県">鳥取県</a>
					<a href="" data-this-pref="島根県">島根県</a>
					<a href="" data-this-pref="徳島県">徳島県</a>
					<a href="" data-this-pref="香川県">香川県</a>
					<a href="" data-this-pref="愛媛県">愛媛県</a>
					<a href="" data-this-pref="高知県">高知県</a>
				</div>
				<div class="wrap search-shop-flex c2 -wrap" data-area-wrap="5" style="opacity: 0; display: none;">
					<a href="" data-this-pref="福岡県">福岡県</a>
					<a href="" data-this-pref="佐賀県">佐賀県</a>
					<a href="" data-this-pref="長崎県">長崎県</a>
					<a href="" data-this-pref="熊本県">熊本県</a>
					<a href="" data-this-pref="大分県">大分県</a>
					<a href="" data-this-pref="宮崎県">宮崎県</a>
					<a href="" data-this-pref="鹿児島県">鹿児島県</a>
					<a href="" data-this-pref="沖縄本島">沖縄県</a>
				</div>
				<div class="ta">
					<div class="areaback"><span class="ico_arrow">エリア選択に戻る</span></div>
				</div>
			</div><!-- prefs -->
			<div class="search-shops">

				<?php
				$my_tax = 'area';
				$parent_terms = get_terms($my_tax, array('hide_empty' => false, 'parent' => 0)); //親ターム取得
				if (!empty($parent_terms)):
					foreach ($parent_terms as $pt) :
						$pt_id = $pt->term_id;
						$pt_name = $pt->name;
						$pt_url = get_term_link($pt);
						$child_terms = get_terms($my_tax, array('hide_empty' => false, 'parent' => $pt_id)); //子ターム取得
						if (!empty($child_terms)):
							foreach ($child_terms as $ct) :
								echo '<div class="wrap search-shop-flex c2 -wrap" data-shop-wrap="'.$ct->name.'">';
								$ct_id = $ct->term_id;
								$ct_slug = $ct->slug;
								$args = array(
									'post_type' => array('shop'),
									'post_parent' => 0,
									$my_tax => $ct_slug,
									'posts_per_page' => -1,
								);
								$the_query = new WP_Query($args);
								?>
								<?php if($the_query->have_posts()):?>
									<?php while ($the_query->have_posts()): ?>
										<?php $the_query->the_post(); ?>
										<a href="<?php the_permalink(); ?>">
											<div class="ico_arrow"><?php the_title(); ?></div>
										</a>
									<?php endwhile;?>
								<?php else:?>
									<div class="noshops">店舗が見つかりませんでした。</div>
								<?php endif;?>
								</div>
								<?php wp_reset_postdata();?>
							<?php endforeach; ?>
						<?php endif;?>
					<?php endforeach; ?>
				<?php endif; ?>

				<div class="ta">
					<div class="prefback"><span class="ico_arrow">都道府県選択に戻る</span></div>
				</div>
			</div><!-- shops -->
		</div><!-- links -->

	</div>
</div><!-- bg -->