

<ul>
  <li class="shop-feature-item">
    <div class="feature-header pos-r">
      <div class="feature-en-title">Shop Introduction 1</div>
      <h3 class="feature-title color-red">
        <?php
          echo $args[0]->shop_feature_title1;
        ?>
      </h3>
    </div>
    <div class="feature-image">
      <?php 
      $default_image = esc_url(get_template_directory_uri()) . '/assets/images/shop/shop-introduction-default-image.jpg';
      $image = !empty($args[0]->shop_feature_image1) 
          ? $args[0]->shop_feature_image1 
          : $default_image; 
      ?>
      <img 
        class="w-100per object-fit-contain" 
        src="<?php echo $image; ?>" 
        alt=""
        onerror="this.src='<?php echo $default_image; ?>';"
      >
    </div>
    <div class="feature-desc mt-8">
      <?php
        echo $args[0]->shop_feature_description1;
      ?>
    </div>
  </li>
  <li class="shop-feature-item">
    <div class="feature-header pos-r">
      <div class="feature-en-title">Shop Introduction 2</div>
      <h3 class="feature-title color-red">
        <?php
          echo $args[0]->shop_feature_title2;
        ?>
      </h3>
    </div>
    <div class="feature-image">
      <?php 
      $default_image = esc_url(get_template_directory_uri()) . '/assets/images/shop/shop-introduction-default-image2.jpg';
      $image = !empty($args[0]->shop_feature_image2) 
          ? $args[0]->shop_feature_image2
          : $default_image; 
      ?>
      <img 
        class="w-100per object-fit-contain" 
        src="<?php echo $image; ?>" 
        alt=""
        onerror="this.src='<?php echo $default_image; ?>';"
      >
    </div>
    <div class="feature-desc mt-8">
      <?php
        echo $args[0]->shop_feature_description2;
      ?>
    </div>
  </li>

</ul>





<?php /* ?>旧デザイン
<ul>
<li class="shop-feature-item">
  <div class="feature-header pos-r">
    <h3 class="feature-title color-red">女性のお客様でもお気軽に買取相談</h3>
  </div>
  <div class="feature-image">
    <img class="w-100per object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_feature01.jpg" alt="女性のお客様でもお気軽に買取相談">
  </div>
  <div class="feature-desc mt-8">
    女性スタッフ中心のジュエルカフェなら初めてのお客様・女性のお客様でも安心です。ジュエルカフェのお客様の8割が女性の方です。
  </div>
</li>
<li class="shop-feature-item">
  <div class="feature-header pos-r">
    <h3 class="feature-title color-red">カフェのようなくつろぎ空間</h3>
  </div>
  <div class="feature-image">
    <img class="w-100per object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_feature02.png" alt="カフェのようなくつろぎ空間">
  </div>
  <div class="feature-desc mt-8">
    査定をお待ちの間、ゆっくりとおくつろぎいただける清潔なショップであるよう心がけています。無料ドリンクや携帯充電器などのサービスをご用意しています。
  </div>
</li>
<li class="shop-feature-item">
  <div class="feature-header pos-r">
    <h3 class="feature-title color-red">うれしい特典・キャンペーン</h3>
  </div>
  <div class="feature-image">
    <img class="w-100per object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_feature03.jpg" alt="うれしい特典・キャンペーン">
  </div>
  <div class="feature-desc mt-8">
    ご来店特典・リピーター様特典など、うれしい特典やプレゼントをご用意しています。
  </div>
</li>
</ul>

<?php */ ?>