import Swiper from "swiper/bundle";

'use strict';
const Sliders = {
    init: function () {
        var swiperProducts = new Swiper('.js-swiper-products', {
            slidesPerView: 2,
            spaceBetween: 10,

            navigation: {
                nextEl: '.swiper-button-next-products',
                prevEl: '.swiper-button-prev-products',
            },

            breakpoints: {
                1025: {
                    slidesPerView: 4.5,
                    spaceBetween: 20,
                },
            },
        });

        var swiperBlog = new Swiper('.js-swiper-blog', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
    
            breakpoints: {
              767: {
                slidesPerView: 2,
                spaceBetween: 10,
              },
              1025: {
                slidesPerView: 3,
                spaceBetween: 20,
              },
            },
        });
    }
};

export default Sliders;
