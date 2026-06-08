$(function() {

    //let links = $('.search-shop[data-uniq-id="' + '609bb70d69163' + '"] .search-shop-list, .search-shop[data-uniq-id="' + '609f9a5d30259' + '"] .search-shop-list' );
    let links = $('.search-shop[data-uniq-id="' + '609bb70d69163' + '"] .search-shop-list' );
    let prefs = links.find(".prefs");
    let pref_link = prefs.find("a");
    let area = links.find(".area_list");
    let area_link = area.find('a');
    let areaback = links.find(".prefs .areaback");
    let flag = 'selecting'
    let flag_shop = 'selecting_shop'

    let shops = links.find(".search-shops");
    let shop_link = shops.find("a");
    let prefback = links.find(".search-shops .prefback");


    //エリア選択
    area_link.on('click', function(){
      visualize(this);
      fitHeight(area, prefs);
      links.toggleClass(flag);
      return false;
    });
    //エリア選択に戻る
    areaback.on('click', function(){
      visualize(this);
      fitHeight(area, prefs, true);
      links.removeClass(flag);
      return false;
    });

    //都道府県選択
    pref_link.on('click', function(){
      listing_shops(this);
      fitHeight(prefs, shops);
      links.toggleClass(flag_shop);
      return false;
    });
    //都道府県選択に戻る
    prefback.on('click', function(){
      listing_shops(this);
      fitHeight(prefs, shops, true);
      links.toggleClass(flag_shop);
      return false;
    });

    function fitHeight(root, transition, back){
      let h = root.outerHeight();

      if(!back){
        h = transition.outerHeight();
      }

      links.outerHeight(h);
    }
    function visualize(e){
      let eq = area_link.index(e);
      if(!links.hasClass(flag)){
        links.find("[data-area-wrap=" + eq + "]").css({opacity: 1, display: 'flex'});
      }else{
        links.find("[data-area-wrap]").css({opacity: 0, display: 'none'});
      }
    }
    function listing_shops(e){
      let target = $(e).data("this-pref");
      if(!links.hasClass(flag_shop)){
        links.find(".search-shops .wrap[data-shop-wrap=" + target + "]").css({opacity: 1, display: 'flex'});
      }else{
        links.find("[data-shop-wrap]").css({opacity: 0, display: 'none'});
      }
    }

  });



  $(function() {

      let links = $('.search-shop[data-uniq-id="' + '609f9a5d30259' + '"] .search-shop-list' );
      let prefs = links.find(".prefs");
      let pref_link = prefs.find("a");
      let area = links.find(".area_list");
      let area_link = area.find('a');
      let areaback = links.find(".prefs .areaback");
      let flag = 'selecting'
      let flag_shop = 'selecting_shop'

      let shops = links.find(".search-shops");
      let shop_link = shops.find("a");
      let prefback = links.find(".search-shops .prefback");


      //エリア選択
      area_link.on('click', function(){
        visualize(this);
        fitHeight(area, prefs);
        links.toggleClass(flag);
        return false;
      });
      //エリア選択に戻る
      areaback.on('click', function(){
        visualize(this);
        fitHeight(area, prefs, true);
        links.removeClass(flag);
        return false;
      });

      //都道府県選択
      pref_link.on('click', function(){
        listing_shops(this);
        fitHeight(prefs, shops);
        links.toggleClass(flag_shop);
        return false;
      });
      //都道府県選択に戻る
      prefback.on('click', function(){
        listing_shops(this);
        fitHeight(prefs, shops, true);
        links.toggleClass(flag_shop);
        return false;
      });

      function fitHeight(root, transition, back){
        let h = root.outerHeight();

        if(!back){
          h = transition.outerHeight();
        }

        links.outerHeight(h);
      }
      function visualize(e){
        let eq = area_link.index(e);
        if(!links.hasClass(flag)){
          links.find("[data-area-wrap=" + eq + "]").css({opacity: 1, display: 'flex'});
        }else{
          links.find("[data-area-wrap]").css({opacity: 0, display: 'none'});
        }
      }
      function listing_shops(e){
        let target = $(e).data("this-pref");
        if(!links.hasClass(flag_shop)){
          links.find(".search-shops .wrap[data-shop-wrap=" + target + "]").css({opacity: 1, display: 'flex'});
        }else{
          links.find("[data-shop-wrap]").css({opacity: 0, display: 'none'});
        }
      }

    });

    $(function() {

        let links = $('.search-shop[data-uniq-id="' + '609bb70d69164' + '"] .search-shop-list' );
        let prefs = links.find(".prefs");
        let pref_link = prefs.find("a");
        let area = links.find(".area_list");
        let area_link = area.find('a');
        let areaback = links.find(".prefs .areaback");
        let flag = 'selecting'
        let flag_shop = 'selecting_shop'

        let shops = links.find(".search-shops");
        let shop_link = shops.find("a");
        let prefback = links.find(".search-shops .prefback");


        //エリア選択
        area_link.on('click', function(){
          visualize(this);
          fitHeight(area, prefs);
          links.toggleClass(flag);
          return false;
        });
        //エリア選択に戻る
        areaback.on('click', function(){
          visualize(this);
          fitHeight(area, prefs, true);
          links.removeClass(flag);
          return false;
        });

        //都道府県選択
        pref_link.on('click', function(){
          listing_shops(this);
          fitHeight(prefs, shops);
          links.toggleClass(flag_shop);
          return false;
        });
        //都道府県選択に戻る
        prefback.on('click', function(){
          listing_shops(this);
          fitHeight(prefs, shops, true);
          links.toggleClass(flag_shop);
          return false;
        });

        function fitHeight(root, transition, back){
          let h = root.outerHeight();

          if(!back){
            h = transition.outerHeight();
          }

          links.outerHeight(h);
        }
        function visualize(e){
          let eq = area_link.index(e);
          if(!links.hasClass(flag)){
            links.find("[data-area-wrap=" + eq + "]").css({opacity: 1, display: 'flex'});
          }else{
            links.find("[data-area-wrap]").css({opacity: 0, display: 'none'});
          }
        }
        function listing_shops(e){
          let target = $(e).data("this-pref");
          if(!links.hasClass(flag_shop)){
            links.find(".search-shops .wrap[data-shop-wrap=" + target + "]").css({opacity: 1, display: 'flex'});
          }else{
            links.find("[data-shop-wrap]").css({opacity: 0, display: 'none'});
          }
        }

      });

      $(function() {

          let links = $('.search-shop[data-uniq-id="' + '609bb70d69165' + '"] .search-shop-list' );
          let prefs = links.find(".prefs");
          let pref_link = prefs.find("a");
          let area = links.find(".area_list");
          let area_link = area.find('a');
          let areaback = links.find(".prefs .areaback");
          let flag = 'selecting'
          let flag_shop = 'selecting_shop'

          let shops = links.find(".search-shops");
          let shop_link = shops.find("a");
          let prefback = links.find(".search-shops .prefback");


          //エリア選択
          area_link.on('click', function(){
            visualize(this);
            fitHeight(area, prefs);
            links.toggleClass(flag);
            return false;
          });
          //エリア選択に戻る
          areaback.on('click', function(){
            visualize(this);
            fitHeight(area, prefs, true);
            links.removeClass(flag);
            return false;
          });

          //都道府県選択
          pref_link.on('click', function(){
            listing_shops(this);
            fitHeight(prefs, shops);
            links.toggleClass(flag_shop);
            return false;
          });
          //都道府県選択に戻る
          prefback.on('click', function(){
            listing_shops(this);
            fitHeight(prefs, shops, true);
            links.toggleClass(flag_shop);
            return false;
          });

          function fitHeight(root, transition, back){
            let h = root.outerHeight();

            if(!back){
              h = transition.outerHeight();
            }

            links.outerHeight(h);
          }
          function visualize(e){
            let eq = area_link.index(e);
            if(!links.hasClass(flag)){
              links.find("[data-area-wrap=" + eq + "]").css({opacity: 1, display: 'flex'});
            }else{
              links.find("[data-area-wrap]").css({opacity: 0, display: 'none'});
            }
          }
          function listing_shops(e){
            let target = $(e).data("this-pref");
            if(!links.hasClass(flag_shop)){
              links.find(".search-shops .wrap[data-shop-wrap=" + target + "]").css({opacity: 1, display: 'flex'});
            }else{
              links.find("[data-shop-wrap]").css({opacity: 0, display: 'none'});
            }
          }

        });


        $(function() {
          $(".store-area-tab a").click(function() {
            $(this).parent().addClass("is-active").siblings(".is-active").removeClass("is-active");
            var tabContents = $(this).attr("href");
            $(tabContents).addClass("is-active").siblings(".is-active").removeClass("is-active");
            return false;
          });
        });

/*
        $(function() {
         $('a[href^="#"]').click(function() {
            var speed = 400;
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top;
            $('body,html').animate({scrollTop:position}, speed, 'swing');
            return false;
         });
      });
*/
$(function(){
  var headerHeight = $('header').outerHeight(); // ヘッダーについているID、クラス名など、余白を開けたい場合は + 10を追記する。
  var urlHash = location.hash; // ハッシュ値があればページ内スクロール
  if(urlHash) { // 外部リンクからのクリック時
    $('body,html').stop().scrollTop(0); // スクロールを0に戻す
    setTimeout(function(){ // ロード時の処理を待ち、時間差でスクロール実行
      var target = $(urlHash);
      var position = target.offset().top - headerHeight;
      $('body,html').stop().animate({scrollTop:position}, 500); // スクロール速度ミリ秒
    }, 100);
  }
  $('a[href^="#"]').click(function(){ // 通常のクリック時
    var href= $(this).attr("href"); // ページ内リンク先を取得
    var target = $(href);
    var position = target.offset().top - headerHeight;
    $('body,html').stop().animate({scrollTop:position}, 500); // スクロール速度ミリ秒
    return false; // #付与なし、付与したい場合は、true
  });
});
