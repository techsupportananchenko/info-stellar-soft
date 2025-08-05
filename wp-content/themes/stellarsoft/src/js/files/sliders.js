import Swiper from 'swiper';
import {Navigation, Grid, Pagination, Mousewheel} from 'swiper/modules';

export function initSliders() {


  //Render for fraction items count pagination slider,require use in pagination 'Fraction'.
  //Example:
  //1 of last
  const paginationFraction = (paginationEl = ``) => {
    if (!paginationEl) return;

    return {
      el: `${paginationEl}`,
      className: 'swiper-pagination-fraction',
      type: 'custom',
      renderCustom: function (swiper, current, total) {




        total = swiper.slides.length;
        const isEnd = swiper.isEnd ? 'swiper-pagination-fraction-end' : '';
        const isBegin = swiper.isBeginning ? 'swiper-pagination-fraction-begin' : '';


        setTimeout(() => {
          const totalEl = swiper.el.querySelectorAll('.swiper-pagination-total');

          if (!totalEl.length) return;

          totalEl.forEach((el) => {
            el.onclick = () => {
              swiper.slideTo(total - 1);
            };
          });
        }, 0);

        return `<div class="swiper-pagination-fraction">
         <span class="swiper-pagination-current ${isBegin}">${current}</span>
         <span class="swiper-pagination-separator">of</span>
         <span class="swiper-pagination-total ${isEnd}">${total}</span>
       </div>`;
      },
    };
  };


  //Render for like counters pagination slider,require use in pagination 'Fraction'.
  //For using call this function on pagination.
  //Example:s
  //1 2 3 ... last.
  const paginationLikeCounters = (paginationEl = ``) => {

    return {
      el: `${paginationEl}`,
      className: 'swiper-pagination-counters',
      type: 'custom',
      renderCustom: function (swiper) {
        const last = swiper.slides.length;
        const activeSlide = swiper.realIndex + 1;


        let swiperCounters = [];

        for (let i = 0; i <= 3; i++) {
          swiperCounters.push(i);
        }

        if (last > 4) {
          swiperCounters.push('...');
          swiperCounters.push(last);
        }


        setTimeout(() => {
          let pagItems = [...document.querySelectorAll('.swiper-pagination-counter')];
          const isEnd = swiper.isEnd;


          isEnd ? pagItems[pagItems.length - 1].classList.add('swiper-pagination-bullet-active') : '';

          if (!pagItems.length) return;

          pagItems.forEach((item) => {
            const index = parseInt(item.textContent);


            if (!isNaN(index)) {
              item.addEventListener('click', () => {
                swiper.slideTo(index - 1);
              });
            }
          });
        }, 0);


        return `<div class="swiper-pagination-fraction">
         ${swiperCounters.map((item, i) =>
          item !== 0
            ? `<span class="swiper-pagination-bullet swiper-pagination-counter ${i === activeSlide ? 'swiper-pagination-bullet-active' : ''}">${item}</span>`
            : ''
        ).join('')}
        </div>`;
      }
    };
  }


  //Add active class to pagination slide.
  //If u using Custom pagination,use this function for pagination active bullet class.
  const paginationActiveClass = (swiper = {}) => {


    if (!swiper) return;

    const current = swiper.realIndex + 1;


    const paginationEl = swiper.pagination.el;

    if (!paginationEl) return;

    const pagItems = paginationEl.querySelectorAll('.swiper-pagination-bullet');

    pagItems.forEach(item => {
      item.classList.remove('swiper-pagination-bullet-active');
      let index = parseInt(item.textContent);


      if (isNaN(index)) return;


      if (index === current) item.classList.add('swiper-pagination-bullet-active');


    });
  }


  //Default slider.
  if (document.querySelector('.swiper')) {
    new Swiper('.swiper', {
      modules: [Navigation],
      observer: true,
      observeParents: true,
      slidesPerView: 1,
      spaceBetween: 0,
      speed: 800,

      navigation: {
        prevEl: '.swiper-button-prev',
        nextEl: '.swiper-button-next',
      },
    });
  }
  //Cases Slider.
  if (document.querySelectorAll('.cases-slider').length > 0) {
    const args = {
      modules: [Navigation, Pagination],
      spaceBetween: 10,
      slidesPerView: 1,
      cache: true,
      //Use my custom pagination render function.
      pagination: paginationFraction('.js-cases-pagination'),
      navigation: {
        prevEl: '.js-cases-prev',
        nextEl: '.js-cases-next',
      },

      breakpoints: {
        375: {
          slidesPerView: 1.104,
        },
        768: {
          slidesPerView: 1.104,
        },
        1024: {
          slidesPerView: 2.4,
        },
      },
      on: {
        slideChange: function () {
          paginationActiveClass(this);
        },
      },
    };


    const swiper = new Swiper('.cases-slider', args);


  }


  //Review Slider Main slider
  if (document.querySelector('.js-review-slider')) {
    const swiper = new Swiper('.js-review-slider', {
        modules: [Navigation, Pagination],
        observer: true,
        observeParents: true,
        slidesPerView: 1.025,
        speed: 600,
        spaceBetween: 10,
        slideToClickedSlide: true,

        //Here we use paginationFraction function to render custom pagination.
        pagination: paginationFraction('.js-review-pagination'),
        navigation: {
          prevEl: '.js-review-prev',
          nextEl:
            '.js-review-next',
        },

        breakpoints: {
          768:
            {
              slidesPerView: 1.104,
            }
          ,
          1024:
            {
              slidesPerView: 1.1991,
            }
          ,
        },

      })
    ;


  }
  //Review Slider inner Page
  if (document.querySelector('.js-review-slider-inner-page')) {
    new Swiper('.js-review-slider-inner-page', {
      modules: [Navigation, Pagination],
      observer: true,
      observeParents: true,
      slidesPerView: 1.025,
      speed: 600,
      spaceBetween: 10,

      pagination: {
        el: '.js-review-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + [index + 1] + '</span>';
        },
      },

      navigation: {
        prevEl: '.js-review-prev',
        nextEl: '.js-review-next',
      },

      breakpoints: {
        768: {
          slidesPerView: 1.104,
        },
        1024: {
          slidesPerView: 1.076,
        },
      },

      on: {},
    });
  }

  //Cycle Slider
  if (document.querySelector('.js-cycle-slider')) {
    var swiper = new Swiper('.js-cycle-slider', {
      modules: [Pagination, Mousewheel],
      observer: true,
      observeParents: true,
      slidesPerView: 1.025,
      speed: 600,
      spaceBetween: 10,

      mousewheel: {
        sensitivity: 1,
        eventsTarget: '.js-cycle-slider',
        releaseOnEdges: true,
      },

      pagination: {
        el: null,
      },

      breakpoints: {
        768: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
      },

      on: {
        slideChange: function () {
          var paginationItems = document.querySelectorAll(
            '.cycle-pagination__item'
          );
          var currentSlideIndex = this.realIndex;
          paginationItems.forEach(function (item, index) {
            if (index === currentSlideIndex) {
              item.classList.add('active', 'current');
            } else {
              item.classList.remove('current');
              if (index < currentSlideIndex) {
                item.classList.add('active');
              } else {
                item.classList.remove('active');
              }
            }
          });
        },
      },
    });

    // Получаем все элементы вашей кастомной пагинации
    var paginationItems = document.querySelectorAll('.cycle-pagination__item');

    // Добавляем обработчики клика для каждого элемента пагинации
    paginationItems.forEach(function (item, index) {
      item.addEventListener('click', function () {
        // Удаляем классы active и current у всех элементов пагинации
        paginationItems.forEach(function (item) {
          item.classList.remove('active', 'current');
        });

        // Добавляем классы active и current к текущему элементу пагинации
        this.classList.add('active', 'current');

        // Переключаем слайдер к соответствующему индексу
        swiper.slideTo(index);
      });
    });
  }

  //Blog Slider
  if (document.querySelectorAll('.js-blog-slider').length > 0) {
    let blogSlider = null;

    /**
     * Check current window size.
     * Init slider on when window less 768px.
     */
    const manageBlogSlider = function () {
      const windowWidth = window.innerWidth;

      if (windowWidth <= 768 && !blogSlider) {
        blogSlider = new Swiper('.js-blog-slider', {
          modules: [Navigation, Pagination],
          observer: true,
          observeParents: true,
          slidesPerView: 1.025,
          spaceBetween: 10,
          pagination: {
            el: '.js-blog-pagination',
            clickable: true,
            renderBullet: function (index, className) {
              return (
                '<span class="' + className + '">' + (index + 1) + '</span>'
              );
            },
          },
          navigation: {
            prevEl: '.js-blog-prev',
            nextEl: '.js-blog-next',
          },
        });
      } else if (windowWidth > 768 && blogSlider) {
        blogSlider.destroy(true, true);
        blogSlider = null;
      }
    }

    manageBlogSlider();

    window.addEventListener('resize', manageBlogSlider);
  }
  //Blog Cards Slider
  if (document.querySelector('.js-blog-cards-slider')) {
    new Swiper('.js-blog-cards-slider', {
      modules: [Navigation, Pagination],
      observer: true,
      observeParents: true,
      slidesPerView: 1,
      speed: 600,
      spaceBetween: 10,

      navigation: {
        prevEl: '.js-blog-cards-prev',
        nextEl: '.js-blog-cards-next',
      },

      pagination: {
        el: '.js-blog-cards-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + [index + 1] + '</span>';
        },
      },

      on: {},
    });
  }
  // Awards block slider.
  if (
    document.querySelectorAll('.awards-swiper') &&
    document.querySelectorAll('.awards-swiper').length > 0
  ) {
    document.querySelectorAll('.awards-swiper').forEach(function (swiperEl) {
      new Swiper(swiperEl, {
        observer: true,
        observeParents: true,
        slidesPerView: 3,
        speed: 600,
        spaceBetween: 11,
        breakpoints: {
          0: {
            slidesPerView: 1.45,
          },
          768: {
            slidesPerView: 3,
          },
        },
      });
    });
  }


  //Tailored Solutions Slider.
  if (document.querySelector('.tailored-solutions-swiper')) {

    const swiper = new Swiper('.tailored-solutions-swiper', {
      // Optional parameters
      modules: [Navigation, Pagination],
      direction: 'horizontal',
      slidesPerView: 1.1,
      spaceBetween: 10,
      slideActiveClass: 'tailored-solutions__content-card--active',
      speed: 1000,

      navigation: {
        prevEl: '.tailored-solutions__navigation-prev',
        nextEl: '.tailored-solutions__navigation-next',
      },

      pagination: paginationFraction('.tailored-solutions__pagination'),


      breakpoints: {
        1023.98: {
          slidesPerView: 1,
          spaceBetween: 100,
          centeredSlides: true,
        },
      },

    });

  }


  //Custom Software Development Slider.
  if (document.querySelector('.custom-software-development-slider')) {

    //Here we d`ont use slider,just to change active class on click. Use only for screen more 1024px
    const customSoftwareContent = document.querySelector('.custom-software-development-slider')

    if (!customSoftwareContent) return;


    const elementsSlide = [...customSoftwareContent.querySelectorAll('.works-slide')];

    const changeSlideHandler = (e) => {
      const target = e.currentTarget;

      const slideIndex = parseInt(target.getAttribute('data-slide-index'));


      if (isNaN(slideIndex) || !elementsSlide.length) return;


      elementsSlide.forEach((el) => {
        el.classList.remove('active');
      });


      if (elementsSlide[slideIndex]) elementsSlide[slideIndex].classList.add('active');

    }


    elementsSlide.forEach((el) => {

      el.addEventListener('click', changeSlideHandler);
    });


    //Swiper logic. Use only for screen less 1024px
    const args = {
      modules: [Navigation, Pagination],
      observer: true,
      observeParents: true,
      spaceBetween: 10,
      slidesPerView: 1.025,

      pagination: paginationFraction('.custom-software-development__pagination'),

      navigation: {
        prevEl: '.js-cases-prev',
        nextEl: '.js-cases-next',
      },

      breakpoints: {
        768: {
          slidesPerView: 1.104,
        },
        1024: {
          slidesPerView: 4,
        },
      },
    };
    let swiperInstance = null;

    const initSwiperIfNeeded = function () {
      const shouldInit = window.innerWidth < 1024;


      if (shouldInit && !swiperInstance) {

        swiperInstance = new Swiper('.custom-software-development-slider', args);
      } else if (!shouldInit && swiperInstance) {
        swiperInstance.destroy(true, true);
        swiperInstance = null;
      }
    }

    initSwiperIfNeeded();
    window.addEventListener('resize', initSwiperIfNeeded);
  }


}

function initSlidersScroll() {
  let sliderScrollItems = document.querySelectorAll('.swiper_scroll');
  if (sliderScrollItems.length > 0) {
    for (let index = 0; index < sliderScrollItems.length; index++) {
      const sliderScrollItem = sliderScrollItems[index];
      const sliderScrollBar =
        sliderScrollItem.querySelector('.swiper-scrollbar');
      const sliderScroll = new Swiper(sliderScrollItem, {
        observer: true,
        observeParents: true,
        direction: 'vertical',
        slidesPerView: 'auto',
        freeMode: {
          enabled: true,
        },
        scrollbar: {
          el: sliderScrollBar,
          draggable: true,
          snapOnRelease: false,
        },
        mousewheel: {
          releaseOnEdges: true,
        },
      });
      sliderScroll.scrollbar.updateSize();
    }
  }
}


window.addEventListener('load', function (e) {
  initSliders();
});
