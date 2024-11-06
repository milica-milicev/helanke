import Swiper from "swiper/bundle";

'use strict';
const Sliders = {
    init: function () {
        var swiperProducts = new Swiper('.js-swiper-products', {
            slidesPerView: 2.5,
            spaceBetween: 10,

            navigation: {
                nextEl: '.swiper-button-next-products',
                prevEl: '.swiper-button-prev-products',
            },

            breakpoints: {
              767: {
                  slidesPerView: 4.5,
                  spaceBetween: 20,
              },
          }
        });

        var swiperBlog = new Swiper('.js-swiper-blog', {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
              el: ".swiper-posts-pagination",
              clickable: true,
            },

            navigation: {
              nextEl: '.swiper-button-next-posts',
              prevEl: '.swiper-button-prev-posts',
          },
    
            breakpoints: {
              767: {
                slidesPerView: 3,
                spaceBetween: 20,
              },
            },
        });
    }
};

export default Sliders;
