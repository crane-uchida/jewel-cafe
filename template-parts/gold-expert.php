<?php /* ?><?php */ ?>
<section class="gold-expert">
  <div class="section-inner">
    <div class="contents">
      <div class="head flex">
        <h2 class="title">専門家による〈今日の金相場解説〉</h2>
        <div class="renew">更新日時&nbsp;|&nbsp;<?php echo $args[0]->time; ?></div>
      </div>
      <div class="primary">
        <div class="flex">
          <div class="personal_information">
            <div class="flex">
              <div class="flex">
                <div class="image"><a href="/kenji-kaneko/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kenji-kaneko.jpg"></a></div>
                <div class="name_sns">
                  <div class="name"><a href="/kenji-kaneko/"><span class="position">解説</span>金子 賢司</a></div>
                  <div class="sns sp">
                    <a href="https://twitter.com/NICE4611" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/jewelcafe_x.png" alt="X"></a>
                    <a href="https://fp-kane.com/" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon_hp.svg" alt="HP"></a>
                    <a href="https://kane4611.xsrv.jp/" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon_blog.svg" alt="blog"></a>
                  </div>
                </div>
              </div>
              <div class="career">
                <p>東証一部上場企業（現在は東証スタンダード市場）で10年間サラリーマンを務めるなか、業務中の交通事故をきっかけに企業の福利厚生に興味を持ち、社会保障の勉強を始める。以降ファイナンシャルプランナーとして活動し、個人・法人のお金に関する相談、北海道のテレビ番組のコメンテーター、年間毎年約100件のセミナー講師なども務める。趣味はフィットネス。健康とお金、豊かなライフスタイルを実践・発信している。</p>
              </div>
              <div class="sns pc">
                <a href="https://twitter.com/NICE4611" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/jewelcafe_x.png" alt="X" style="width:35px;" height="35"></a>
                <a href="https://fp-kane.com/" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon_hp.svg" alt="HP" style="width:35px;" height="35"></a>
                <a href="https://kane4611.xsrv.jp/" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon_blog.svg" alt="blog" style="width:35px;" height="35"></a>

              </div>
            </div>
          </div>
          <div class="explain">
              <?php echo $args[0]->comment; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



