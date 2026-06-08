<?php
require_once (dirname(__FILE__) . '/../etc/get-market-price.php');

if (is_null($marketPrice)) {
    $marketPrice = new MarketPrice();
}
?>

<section class="market-price">
    <div class="section-inner">
        <h2 class="section-ja-title ta-c">本日の金・プラチナ相場</h2>
        <div class="market-price-inner">
            <div class="d-f w-100per">
                <div class="market-price-item market-price-gold">
                    <div class="color-gold market-price-ttl">金価格相場</div>
                    <hr>
                    <div class="color-gold  market-price-detail">
                        ¥<?php echo $marketPrice->get('gold', true); ?><span>/1g</span>
                    </div>
                </div>
                <div class="market-price-item market-price-platinum">
                    <div class="color-silver market-price-ttl">プラチナ価格相場</div>
                    <hr>
                    <div class="color-silver market-price-detail">
                        ¥<?php echo $marketPrice->get('platinum', true); ?><span>/1g</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="market-price-inner">
            <div class="d-f w-100per">
                <div class="market-price-item market-price-silver">
                    <div class="color-silver market-price-ttl">シルバー価格相場</div>
                    <hr>
                    <div class="color-silver market-price-detail">
                        ¥<?php echo $marketPrice->get('silver', true); ?><span>/1g</span>
                    </div>
                </div>
                <div class="market-price-item market-price-platinum">
                    <div class="color-silver market-price-ttl">パラジウム価格相場</div>
                    <hr>
                    <div class="color-silver market-price-detail">
                        ¥<?php echo $marketPrice->get('palladium', true); ?><span>/1g</span>
                    </div>
                </div>
            </div>
        </div>
		<?php
		
			$gold_publish =  $marketPrice->pubdate();
			
			$gold_publish = str_replace('公表','公開',$gold_publish);
			
		
			
			$gold_publish = str_replace('20','<time itemprop="dateModified">20',$gold_publish);
			
			$gold_publish = str_replace(':30',':30</time>',$gold_publish);
			

		?>
        <div class="market-price-inner pb-20">
            <div class="ta-c small-font-size mt-12 mb-4"><?php echo $gold_publish; ?></div>
            <picture>
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/souba_text_sp.png">
              <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/souba_text_pc.png">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/souba_text_sp.png" style="max-width:100%; height:auto;">
            </picture>
        </div>
    </div>
</section>
