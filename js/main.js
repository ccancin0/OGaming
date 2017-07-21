$(document).ready(function() {
  $('.loggedIn, .sub-nav').hover(function() {
    // $('.logged-nav').css('z-index', '9999');
    $('.sub-nav').show();
  }, function() {
    // $('.logged-nav').css('z-index', '0');
    $('.sub-nav').hide();
  });

  $('.currrenyType').hover(function() {
    // $('.logged-nav').css('z-index', '9999');
    $('li').show();
  }, function() {
    // $('.logged-nav').css('z-index', '0');
    $('li').not('li.active').hide();
  });

  $(window).scroll(function() {
    if( $(window).scrollTop() > 200) {
      $('.nav-wrapper').addClass('nav-fixed');
      // $('.sub-nav').css('background: none repeat scroll 0 0 #5f5f5f;');
    }else {
      $('.nav-wrapper').removeClass('nav-fixed');
    }
  });

  $('#close').on('click', function(){
    $('#close').parent().hide();
  });

  $('#pass a.open').on('click', function() {
    $('li.pass2, li#pass span').show();
    $('li#pass span.new').css('display', 'inline');
    $('li.pass2 input, li#pass input').css('border', '1px solid #0096d5');
    $('li.pass2 span, li#pass span').css('font-weight','bold');
    $('li.pass2 input, li#pass input').css('background', 'none');
    $('li#pass input, li.pass2 input').attr('readonly',false);
    $('li#pass input').attr('value','');
    $('li#pass input').attr('type','password');
    $('.info button').show();
  });

  $('#email a.open').on('click', function(){
    $('li#email span.new').css('display', 'inline');
    $('li#email span').css('font-weight','bold');
    $('li#email input').css('border', '1px solid #0096d5');
    $('li#email input').css('background', 'none');
    $('li#email input').attr('readonly',false);
    $('li#email input').attr('value','');
    $('.info button').show();
  });
});
