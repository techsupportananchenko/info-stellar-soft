import barba from "@barba/core";
import barbaPrefetch from '@barba/prefetch';
import gsap from "gsap";
// Home page
import {flsModules} from "./modules.js";
import * as flsScroll from "./scroll/scroll.js";
import * as flsSliders from './sliders.js';
import * as flsFunctions from "./functions.js";
import * as scriptFunctions from "./script.js";
import * as ajaxFilter from "./ajax-filter-posts.js";
import * as casePosts from "./cases-posts.js";
import * as ajaxViewMore from "./ajax-view-more.js";
import * as ajaxSearch from "./ajax-search";
import * as ajaxRating from "./ajax-rating";
import * as titleNavigationPost from "./title-navigation-post";
import * as cookie from "./cookie";
import * as smoothAnchorScroll from "./anchor-scroll";
import * as filerVacancyCategory from "./vacancy";


function cf7Init(container = document) {
  if (window.wpcf7 && typeof window.wpcf7.init === 'function') {
    const forms = container.querySelectorAll('.wpcf7 form');
    if (forms.length) {
      forms.forEach(form => {
        window.wpcf7.init(form);
        // console.log('[CF7] Re-initialized form:', form);
      });
    } else {
      // console.log('[CF7] No forms found in container');
    }
  } else {
    // console.warn('[CF7] wpcf7.init is not available!');
  }
}


function initModules(container = document) {

  flsModules.watcher.scrollWatcherUpdate?.();
  flsFunctions.isWebp?.();
  flsScroll.digitsCounter?.();
  flsSliders.initSliders?.();
  flsFunctions.tabs?.();
  flsModules.popup.initPopups?.();
  flsFunctions.spollers?.();
  scriptFunctions.industrySection?.();
  scriptFunctions.expHeaderScrollHandler?.();
  scriptFunctions.buttonsBlogNav?.();
  scriptFunctions.placeholderForm?.();
  scriptFunctions.industrySection?.();
  scriptFunctions.vacancyInputFake?.();
  ajaxFilter.initAjaxFilterPosts?.();
  ajaxViewMore.initAjaxLoadMorePosts();
  casePosts.casePost?.();
  ajaxSearch.ajaxSearch?.();
  ajaxRating.ajaxRating?.();
  titleNavigationPost.initTitleNavigation?.();
  cookie.cookie();
  smoothAnchorScroll.initSmoothAnchorScroll();
  filerVacancyCategory.filerVacancyCategory()
}


function initSpa() {

  const header = document.querySelector('.header__about');


  barba.use(barbaPrefetch, {
    root: header,
    timeout: 2500,
    limit: 0
  });


  //Set lock body when page is loading.
  barba.hooks.enter(() => {
    const htmlDoc = document.documentElement;
    htmlDoc.classList.add('lock');
  })

  //Remove lock body when page is loaded.
  barba.hooks.afterLeave(() => {
    const htmlDoc = document.documentElement;
    htmlDoc.classList.remove('lock');
  })


  //Set in button close prev page.
  barba.hooks.afterEnter(({current, next}) => {
    const buttonClose = next.container.querySelector('.case-intro__close');

    if (!buttonClose) return;

    buttonClose.href = '#';

    buttonClose.addEventListener('click', (e) => {
      e.preventDefault();
      window.history.back();
    })
  })


  barba.init({
    cacheFirstPage: true,
    preventRunning: true,
    prefetch: true,
    timeout: 7000,
    prevent: ({el, event, href}) => {
      const currentUrl = window.location.href;

      if (window.isPopupOpen) {
        return true;
      }
      if (el.hasAttribute('data-popup')) {
        return true;
      }

      if (event.type === 'click' && href === currentUrl) {
        event.preventDefault();
        return true;
      }

      return false;
    },
    transitions: [{
      sync: true,

      leave(data) {
        const header = document.getElementById('header');
        const isMobileOpen = header.querySelector('.nav').classList.contains('mobile-menu-active');
        const isDesktopOpen = header.querySelector('.mega-menu').classList.contains('show-mega-menu');
        const htmlDoc = document.documentElement;

        if (isMobileOpen) {
          header.querySelector('.nav').classList.remove('mobile-menu-active');
          htmlDoc.classList.remove('lock');
        }
        if (isDesktopOpen) {
          header.querySelector('.mega-menu').classList.remove('show-mega-menu');
        }


        return gsap.to(data.current.container, {
          opacity: 0,
          duration: 0.5,
          ease: 'power2.out'
        });
      },

      enter(data) {
        window.scrollTo(0, 0);

        gsap.set(data.next.container.closest('.wrapper'), {
          perspective: 1000,
        });

        gsap.set(data.next.container, {
          position: 'fixed',
          top: 94,
          opacity: 1,
          zIndex: 500,
          left: 0,
          scale: 1.3,
          y: '100%',
          width: '100%',
        });


        return gsap.to(data.next.container, {
          ease: "power3.inOut",
          scale: 1,
          zIndex: 0,
          y: 1,
          top: 83,
          duration: 1,
          onComplete: () => {
            gsap.set(data.next.container, {
              position: 'static',
              zIndex: 1,
              clearProps: 'transform',
            });

            gsap.set(data.next.container.closest('.wrapper'), {
              clearProps: 'perspective',
            });
          }
        });
      }

    }]
  });

  // Init for all pages
  barba.hooks.after(({next}) => {
    window.scrollTo({top: 0, left: 0, behavior: 'smooth'});
    cf7Init(next.container);
    initModules(next.container);
  });

}

document.addEventListener('DOMContentLoaded', initSpa);
