// Inicializa el carrusel de testimonios con Swiper.
// Archivo nuevo: no modifica script.js.
if (typeof Swiper !== 'undefined') {
  new Swiper('.carrusel-testimonios', {
    loop: true,
    grabCursor: true,
    spaceBetween: 18,
    slidesPerView: 1,
    autoplay: { delay: 4000, disableOnInteraction: false, pauseOnMouseEnter: true },
    pagination: { el: '.carrusel-testimonios .swiper-pagination', clickable: true },
    navigation: {
      nextEl: '.carrusel-testimonios .swiper-button-next',
      prevEl: '.carrusel-testimonios .swiper-button-prev'
    },
    breakpoints: {
      751: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
}
