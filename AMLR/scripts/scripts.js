$(function () {
    const $video = $('.feature video');
    $(window).on('scroll', function () {
      let fromTop = $(window).scrollTop();
      let blurAmount = fromTop / 100;
      let opacity = 1 - ((fromTop / $('html').height()) * 1.3);

      $video.css({
        'filter': 'blur(' + blurAmount + 'px)',
        'opacity': opacity
      });
    });
  });