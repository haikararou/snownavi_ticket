

/*ドロワーメニュー --------------------------------------------------------------------------------------------*/
//PC用
var modalopen = false;
$('.l-header__hamburger').click(function (e) {
  if (modalopen == false) {
    drowerChange('view');
  } else if (modalopen == true) {
    drowerChange('hiden');
  }
  e.stopPropagation();
});

/*ドロワーメニューの出し入れ --------------------------------------------------------------------------------------------*/
//PC用
function drowerChange(bl) {
  if (bl == 'view') {
    modalopen = true;
    $('.l-header__hamburger').addClass('open');
    $('.l-header__nav').addClass('open');
    TweenMax.fromTo(
      $('.l-header__nav'),
      0.8,
      {},
      {
        opacity: '1',
        display: 'block',
        delay: 0,
        ease: Power2.easeOut,
        onComplete: function () {},
      }
    );
    TweenMax.fromTo(
      $('.l-header__nav__scroll'),
      0.8,
      { 'padding-top': '0' },
      {
        'padding-top': '0',
        opacity: '1',
        display: 'block',
        delay: 0.6,
        ease: Power2.easeOut,
        onComplete: function () {},
      }
    );
  } else if (bl == 'hiden') {
    modalopen = false;
    TweenMax.fromTo(
      $('.l-header__nav__scroll'),
      0.3,
      { 'padding-top': '0' },
      {
        'padding-top': '0',
        opacity: '0',
        display: 'none',
        delay: 0,
        ease: Power2.easeOut,
        onComplete: function () {},
      }
    );
    TweenMax.fromTo(
      $('.l-header__nav'),
      0.4,
      { opacity: '1' },
      {
        opacity: '0',
        delay: 0.2,
        display: 'none',
        ease: Power2.easeOut,
        onComplete: function () {
          $('.l-header__hamburger.open').removeClass('open');
          $('.l-header__nav.open').removeClass('open');
        },
      }
    );
  }
}
