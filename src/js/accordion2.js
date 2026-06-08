$(function(){

  var box = $('.voiceBox');
  box.after('<div class="more"></div>');
  var more = $('.more');

  function remClass(){
    $(this).next(more).removeClass('is-active');
  }
  function adClass(){
    $(this).next(more).addClass('is-active');
  }

  //forで.box-innerの高さを取得、縦幅が85pxより小さい場合.moreをhideする
  for(var i=0;i<box.length;i++){
    var boxInnerH = $('.voiceBox-inner').eq(i).innerHeight();
    if(boxInnerH<70){
      more.eq(i).hide();
    }else{
      box.eq(i).css({
        height:'70px'
      });
    }
  }

  more.on('click',function(){

    //複数あった時を考慮
    //クリックした.moreに対応する.box-innerの高さを取得する
    var index = more.index(this);
    var boxThis = box.eq(index);
    var innerH = $('.voiceBox-inner').eq(index).innerHeight();

    if($(this).hasClass('is-active')){
      boxThis.animate({
        height:'70px'
      },200,remClass);
    }else{
      boxThis.animate({
        height:innerH
      },200,adClass);
    }
  });
});
