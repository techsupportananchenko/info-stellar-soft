import gsap from 'gsap';
import {ScrollToPlugin} from 'gsap/ScrollToPlugin';
import {CustomEase} from "gsap/CustomEase";

gsap.registerPlugin(ScrollToPlugin, CustomEase);

export function initSmoothAnchorScroll(duration = 3.0) {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (!href || href === '#' || href.trim() === '#') return;

      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();

        const scrollTarget = document.scrollingElement || document.documentElement;
        const targetY = target.getBoundingClientRect().top + window.scrollY - 30;

        gsap.to(scrollTarget, {
          duration: duration,
          scrollTo: {
            y: targetY
          },
          ease: "power1.inOut",

        });
      }
    });
  });
}

initSmoothAnchorScroll(2.5);
