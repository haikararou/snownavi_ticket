(function($) {
  var $win = $(window);
  $win.on('load resize', function() {
    if (window.matchMedia('(max-width:1024px)').matches) {
      // SPの処理
      $("#pagetop").hide();
    } else {
      // PCの処理
      $(function(){
        $('.c-gooddeal__area__container').masonry({ //要素を敷き詰めるブロックのidやclassを指定します。
          itemSelector : '.c-gooddeal__area__box' //敷き詰める要素のclassを指定します。
        });
      });
    }
  });
})(jQuery);


const breakpoint = window.matchMedia('(max-width:1024px)');
// ブレークポイントが切り替わった時の判定
breakpoint.addListener(() => {
  // 本来ならPCで設定したものをリセットしてSPの設定をするといった処理が必要だが、
  // リロードすることで再設定のことを考えなくてよくなる
  window.location.reload();
});