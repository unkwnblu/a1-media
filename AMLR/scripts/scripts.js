var mySwiper = new Swiper(".swiper-container", {
  direction: "vertical",
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  grabCursor: true,
  speed: 1000,
  parallax: true,
  autoplay: false,
  effect: "slide",
  mousewheel: true
});
setTimeout(() => {
  mySwiper.update();
}, 100);