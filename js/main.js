$(document).ready(function() {
  $('.loggedIn, .sub-nav').hover(function() {
    // $('.logged-nav').css('z-index', '9999');
    $('.sub-nav').show();
  }, function() {
    // $('.logged-nav').css('z-index', '0');
    $('.sub-nav').hide();
  });

  // $(window).scroll(function() {
  //   if( $(window).scrollTop() > 70) {
  //     $('.nav-wrapper').addClass('nav-fixed');
  //   }else {
  //     $('.nav-wrapper').removeClass('nav-fixed');
  //   }
  // });
});
