<section class="shop-flow section-inner">
  <div class="common-ttl">
    <div class="section-inner">
      <h2 class="shop-title">
		<?php if ( ($wp_obj?->parent ?? null) === 0 ): ?>
          <span class="common-ttl-sub">ジュエルカフェ - <?php the_title();?>の</span>
        <?php else:?>
          <span class="common-ttl-sub">ジュエルカフェ - 
			<?php
			$parent_id = $parent_id ?? wp_get_post_parent_id(get_the_ID());
			echo esc_html(get_post($parent_id)?->post_title ?? '');
			?>
		の</span>
        <?php endif;?>
        <span class="common-ttl-main">店舗買取の<span class="color-red">流れ</span></span>
      </h2>
      <div class="common-ttl-en"></div>
    </div>
  </div>


<ul class="flow-list">
  <li>
    <div class="flex">
      <div class="image_box">
          <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitorinonagare_1.jpg" alt="ご来店">
      </div>
      <div class="text_box">
          <h3 class="title">ご来店</h3>
          <p class="text">ご来店にご予約は不要です。お買い物のついでにお気軽にお立ち寄りください。
売却を具体的にお考えの方はご本人様確認書類（免許証やマイナンバーカード等）が必要ですのでお忘れなくお持ちください。
</p>
      </div>
    </div>
  </li>
  <li>
    <div class="flex">
      <div class="image_box">
          <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitorinonagare_2.jpg" alt="">
      </div>
      <div class="text_box">
          <h3 class="title">受付・ご相談</h3>
          <p class="text">ジュエルカフェは女性スタッフが中心ですので初めてのお客様でも安心！
小さなもの1つだけでも、本物かわからないものでも、どんなご相談でも喜んで承ります。受付・ご相談・査定はすべて無料ですので、少しでも気になったことはなんでもおっしゃってください。

</p>
      </div>
    </div>
  </li>
  <li>
    <div class="flex">
      <div class="image_box">
          <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitorinonagare_3.jpg" alt="">
      </div>
      <div class="text_box">
          <h3 class="title">スピード査定</h3>
          <p class="text">知識豊富なジュエルカフェ査定員がその場で金額査定をいたします。最新の市場相場や、ジュエリーのデザイン・コンディションも加味して的確な金額をお知らせしますのでご安心ください。査定は最短15分程度で完了！
お待ちの間には無料ドリンクのサービスもございます。

</p>
      </div>
    </div>
  </li>
  <li>
    <div class="flex">
      <div class="image_box">
          <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitorinonagare_4.jpg" alt="">
      </div>
      <div class="text_box">
          <h3 class="title">お見積り</h3>
          <p class="text">査定が終わりましたら、お客様に丁寧にご説明・ご提示いたします。もちろん金額にご納得いただけない場合はキャンセルもOK!査定だけでもプレゼントのキャンペーンを行っていることもあります！
</p>
      </div>
    </div>
  </li>
  <li>
    <div class="flex">
      <div class="image_box">
          <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitorinonagare_5.jpg" alt="">
      </div>
      <div class="text_box">
          <h3 class="title">ご成約・お支払い</h3>
          <p class="text">金額にご納得いただけましたら、成約書類にサインをいただいて売却完了です。お代金はその場でお支払いいたします。次回使えるクーポンやうれしいプレゼントもご用意！またぜひご利用くださいませ。
</p>
      </div>
    </div>
  </li>
</ul>
</section>
