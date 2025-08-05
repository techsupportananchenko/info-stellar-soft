/*

Документація gsap: https://greensock.com/docs/v3/GSAP

*/

// Підключаємо gsap з node_modules
// https://greensock.com/docs/v3/Installation
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.config({ trialWarn: false });
gsap.registerPlugin(ScrollTrigger);

if (ScrollTrigger.isTouch !== 1 && document.body.classList.contains('home')) {
  const boxes = gsap.utils.toArray('.item-1, .item-2');

  boxes.forEach((box, i) => {
    const anim = gsap.fromTo(
      box,
      { autoAlpha: 0, y: 100 },
      { duration: 1.5, autoAlpha: 1, y: 0 }
    );
    ScrollTrigger.create({
      trigger: box,
      animation: anim,
      toggleActions: 'play none none none',
      once: false,
    });
  });

  gsap.fromTo(
    '.single-item',
    { autoAlpha: 0, y: 100 },
    {
      duration: 1.5,
      autoAlpha: 1,
      y: 0,
      stagger: 0.4,
      scrollTrigger: {
        // Note that it's "scrollTrigger" not "ScrollTrigger"
        trigger: '.single-item',
      },
    }
  );
}


