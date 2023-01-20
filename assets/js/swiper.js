$(window).load(function(){

  var bar = document.querySelector('.bar')
  var barDuration = 3000

  var mySwiper = new Swiper('.swiper-container', {
    speed: 300, // スライドが切り替わる時の速さ
    slidesPerView: '1', // スライド表示数
    loop: true, // ループさせる
    loopAdditionalSlides: 0,
    preventInteractionOnTransition: true,
    autoplay: { // 自動再生 ON
      delay: 3000, // 次のスライドまでの秒数
      disableOnInteraction: false, //スライダー操作後、自動再生が止まるかどうか
    },
    // ページネーションが必要なら追加
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      type: 'bullets',
      // 個別にクラスをつけることができる
      renderBullet: (index, className) => {
        return '<span class="' + className + '">0' + (Number(index) + 1) + '<svg class="circle" width="48" height="48" viewBox="0 0 48 48"><circle class="circle2" cx="24" cy="24" r="23" stroke="#fff" stroke-width="1" fill="none"/><circle class="circle1" cx="24" cy="24" r="22" stroke="#fff" stroke-width="3" fill="none"/></svg></span>';
      },
    },
    // ナビボタンが必要なら追加
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
  })

});



