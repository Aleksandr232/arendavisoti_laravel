$(document).ready(function(){
    $('.content_toggle').click(function(){
      var target = $(this).data('target');
      $(target).toggleClass('hide');
      $(this).html($(target).hasClass('hide') ? 'Показать' : 'Скрыть');
      return false;
    });
  });
