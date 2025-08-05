function footerAccordion(){
  const accordions = document.querySelectorAll('.js-footer-accordion');

  const openAccordion = (accordion) => {
    const content = accordion.querySelector('.js-footer-widget .menu');
    accordion.classList.add('accordion__active');
    content.style.maxHeight = content.scrollHeight + 'px';
  };

  const closeAccordion = (accordion) => {
    const content = accordion.querySelector('.js-footer-widget .menu');
    accordion.classList.remove('accordion__active');
    content.style.maxHeight = null;
  };

  accordions.forEach((accordion) => {
    const intro = accordion.querySelector('.js-footer-accordion-title');
    const content = accordion.querySelector('.js-footer-widget .menu');
    intro.onclick = () => {
      if (content.style.maxHeight) {
        closeAccordion(accordion);
      } else {
        accordions.forEach((accordion) => closeAccordion(accordion));
        openAccordion(accordion);
      }
    };
  });
}

footerAccordion();
