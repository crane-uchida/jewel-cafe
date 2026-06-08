<div class="mb-40">
	<p>シャネルは数あるブランドの中でも特に人気が高く、安定した高値でお買取できるのが特徴です。</p>
	<p>買取相場は需要や流通量、トレンドにより変動しますが、未使用品はもちろん中古品でも状態や付属品次第で高評価が期待できます。</p>
	<p>ぜひジュエルカフェの無料査定をご利用ください。</p>
</div>

<?php
$table = $wpdb->prefix . 'souba';

$sql = "
    SELECT *
    FROM {$table}
    WHERE date_time <= NOW()
    ORDER BY date_time DESC
    LIMIT 1
";

$current = $wpdb->get_row($sql);

if ($current) {
    $iso = date('c', strtotime($current->date_time));
	echo '<div class="mb-20 ta-c"><span>更新日</span> ';
    echo '<time datetime="' . esc_attr($iso) . '">';
    echo esc_html(date('Y年m月d日', strtotime($current->date_time)));
    echo '</time>';
	echo '</div>';
}

?>



  <ul class="cat-Trend2_List DetailsContainer"> 
   <li> 
    <details class="cat-Trend2Details"> 
     <summary class="cat-Trend2Details_Summary">シャネル / バッグ</summary> 
     <div class="cat-Trend2Details_Contents" > 
      <div class="cat-Trend2Details_Inner" > 
       <div class="cat-Trend2Details_Table" > 
        <table> 
         <thead> 
          <tr> 
           <th>商品名</th> 
           <th>参考買取価格相場</th> 
          </tr> 
         </thead> 
         <tbody> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />マトラッセ23 ダブルフラップ ダブルチェーンショルダーバッグ 4番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">400,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">320,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />ボーイシャネル チェーンショルダーバッグ 28番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">420,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">330,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />マトラッセ パテントレザー ビジネスバッグ 3番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">150,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">120,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カンボンライン ハンドバッグ 8番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">200,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">160,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
         </tbody> 
        </table> 
       </div> 
      </div> 
     </div> 
    </details> </li> 
   <li> 
    <details class="cat-Trend2Details"> 
     <summary class="cat-Trend2Details_Summary">シャネル / 財布</summary> 
     <div class="cat-Trend2Details_Contents" > 
      <div class="cat-Trend2Details_Inner" > 
       <div class="cat-Trend2Details_Table" > 
        <table> 
         <thead> 
          <tr> 
           <th>商品名</th> 
           <th>参考買取価格相場</th> 
          </tr> 
         </thead> 
         <tbody> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カメリア 長財布 11810280 ノワール ラムスキン</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">42,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">30,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カメリア 三つ折り財布 29番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">44,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">30,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カンボンライン 長財布 16番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">60,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">45,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />ボーイシャネル キャビアスキン ラウンドコンパクトウォレット 22番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">57,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">42,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
         </tbody> 
        </table> 
       </div> 
      </div> 
     </div> 
    </details> </li> 
   <li> 
    <details class="cat-Trend2Details"> 
     <summary class="cat-Trend2Details_Summary">マトラッセ</summary> 
     <div class="cat-Trend2Details_Contents" > 
      <div class="cat-Trend2Details_Inner" > 
       <div class="cat-Trend2Details_Table" > 
        <table> 
         <thead> 
          <tr> 
           <th>商品名</th> 
           <th>参考買取価格相場</th> 
          </tr> 
         </thead> 
         <tbody> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />マトラッセ23 ダブルフラップ ダブルチェーンショルダーバッグ 4番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">400,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">330,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />マトラッセ キャビアスキンクラシックチェーンウォレット ランダム</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">300,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">240,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />ココハンドル キャビアスキン 2WAYハンドバッグ ミニ ランダム</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">550,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">430,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />マトラッセ ハンドバッグ 6番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">350,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">280,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
         </tbody> 
        </table> 
       </div> 
      </div> 
     </div> 
    </details> </li> 
   <li> 
    <details class="cat-Trend2Details"> 
     <summary class="cat-Trend2Details_Summary">ボーイシャネル</summary> 
     <div class="cat-Trend2Details_Contents" > 
      <div class="cat-Trend2Details_Inner" > 
       <div class="cat-Trend2Details_Table" > 
        <table> 
         <thead> 
          <tr> 
           <th>商品名</th> 
           <th>参考買取価格相場</th> 
          </tr> 
         </thead> 
         <tbody> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />ボーイシャネル チェーンショルダーバッグ 28番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">420,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">330,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />ボーイシャネル チェーンショルダーバッグ 25番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">380,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">300,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />ボーイシャネル キャビアスキン チェーンショルダーバッグ 20番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">350,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">280,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />ボーイシャネル キャビアスキン ラウンドファスナー長財布 24番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">70,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">55,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
         </tbody> 
        </table> 
       </div> 
      </div> 
     </div> 
    </details> </li> 
   <li> 
    <details class="cat-Trend2Details"> 
     <summary class="cat-Trend2Details_Summary">カメリア</summary> 
     <div class="cat-Trend2Details_Contents" > 
      <div class="cat-Trend2Details_Inner" > 
       <div class="cat-Trend2Details_Table" > 
        <table> 
         <thead> 
          <tr> 
           <th>商品名</th> 
           <th>参考買取価格相場</th> 
          </tr> 
         </thead> 
         <tbody> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カメリア 長財布 11810280 ノワール ラムスキン</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">44,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">30,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カメリア 三つ折り財布 29番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">44,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">30,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カメリア クラッチバッグ 25番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">85,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">68,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カメリア キャビアスキン チェーンウォレット ランダム</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">300,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">240,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
         </tbody> 
        </table> 
       </div> 
      </div> 
     </div> 
    </details> </li> 
   <li> 
    <details class="cat-Trend2Details"> 
     <summary class="cat-Trend2Details_Summary">カンボンライン</summary> 
     <div class="cat-Trend2Details_Contents" > 
      <div class="cat-Trend2Details_Inner" > 
       <div class="cat-Trend2Details_Table" > 
        <table> 
         <thead> 
          <tr> 
           <th>商品名</th> 
           <th>参考買取価格相場</th> 
          </tr> 
         </thead> 
         <tbody> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カンボンライン カードケース 9番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">10,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">7,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カンボンライン 長財布 16番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">60,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">45,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カンボンライン ラムスキン ショルダーバッグ 8993218</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">100,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">80,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
          <tr> 
           <td> <a style="text-decoration: none;" class="cat-Trend2Details_Name">シャネル<br />カンボンライン ハンドバッグ 8番</a> </td> 
           <td> 
            <dl class="cat-Trend2Details_Price"> 
             <div > 
              <dt>
               未使用品
              </dt> 
              <dd>
               <span class="font-Heebo">200,000</span>円
              </dd> 
             </div> 
             <div > 
              <dt>
               中古品
              </dt> 
              <dd>
               <span class="font-Heebo">160,000</span>円
              </dd> 
             </div> 
            </dl> </td> 
          </tr> 
         </tbody> 
        </table> 
       </div> 
      </div> 
     </div> 
    </details> </li> 
  </ul>
