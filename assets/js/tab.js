$(function () {
  $(".c-tabs a").on('click', function(e) {
    e.preventDefault();
    var target = $(this).attr('href');
    if (! $(target).length) return false;
    $('.tab', $(this).closest('.c-tabs')).removeClass('is-active');
    $(this).closest('.tab').addClass('is-active');
    $('.panel', $(target).closest('.c-panels')).removeClass('is-active');
    $(target).addClass('is-active');
  });
});
