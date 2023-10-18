(function($) {
const mediaQueryList = window.matchMedia("(min-width: 1024px)");
const listener = (event) => {
    if (event.matches) {
    } else {
    // 1024px未満
    //console.log('SP用ブレークポイント用処理');
    $('.c-gooddeal__area__box ul').each(function(){
        $(this).css("height",$(this).height()+"px");
    });
    $('.c-gooddeal__area__box ul').hide();
    $('.c-gooddeal__area__box h4').click(function () {
        $(this).next('.c-gooddeal__area__box ul').slideToggle('slow').siblings('.c-gooddeal__area__box ul').slideUp('slow');
        $(this).siblings('.c-gooddeal__area__box h4').removeClass('active');
        $(this).toggleClass('active');
    });
    }
};
mediaQueryList.addEventListener("change", listener);
// 初期化処理
listener(mediaQueryList);

})(jQuery);

// var $win = $(window);
//     $win.on('load resize', function() {
//         if (window.matchMedia('(max-width:1024px)').matches) {
//             $('.c-gooddeal__area__box ul').each(function(){
//                 $(this).css("height",$(this).height()+"px");
//             });
//             $('.c-gooddeal__area__box ul').hide();
//             $('.c-gooddeal__area__box h4').click(function () {
//                 $(this).next('.c-gooddeal__area__box ul').slideToggle('slow').siblings('.c-gooddeal__area__box ul').slideUp('slow');
//                 $(this).siblings('.c-gooddeal__area__box h4').removeClass('active');
//                 $(this).toggleClass('active');
//             });
//         } else {
//             // PCの処理
//         }
//     });
// })(jQuery);


// const breakpoint = window.matchMedia('(max-width:1024px)');
// // ブレークポイントが切り替わった時の判定
// breakpoint.addListener(() => {
//   // 本来ならPCで設定したものをリセットしてSPの設定をするといった処理が必要だが、
//   // リロードすることで再設定のことを考えなくてよくなる
//   window.location.reload();
// });