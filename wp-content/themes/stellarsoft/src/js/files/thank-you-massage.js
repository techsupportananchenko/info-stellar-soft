/**
 * Thank you massage for Contact form.
 * Show when user have submission form request.
 * Here we use different contact form.
 * @Claim your free cro plan form pop up v1 v2
 * @Contact form default.
 */

import {flsModules} from "./modules.js";


export function ThankYouMassage() {
  let event = 'wpcf7mailsent';
  const popUps = document.querySelectorAll('.claim-your-free-cro-plan__pop-up-content');

  if(!popUps) return;

  //Clear inputs and textarea when close pop up.
  popUps.forEach((popUp) => {
    const buttonClose = popUp.querySelector('.claim-your-free-cro-plan__pop-up-close');
    const inputs = popUp.querySelectorAll('input');
    const textArea = popUp.querySelectorAll('textarea[name="message"]');

    buttonClose.addEventListener('click', () => {
      inputs.forEach((input) => {
        if (input.type === 'text' || input.type === 'email' || input.tagName.toLowerCase() === 'textarea') {
          input.value = '';
        }
      })
      textArea.forEach((textarea) => {
        textarea.value = '';
      })
    });
  });

  //Events for form.
  document.addEventListener(event, function (event) {
      const formID = event.detail.contactFormId;
      const pathTheme = themeData.themeUrl ? themeData.themeUrl : '';
      const homeUrl = themeData.homeUrl ? themeData.homeUrl : '';
      const siteContent = document.querySelector('.wrapper');



      //Create only one pop up.
      if (document.getElementById(`popup-thank-you-${formID}`)) {
        flsModules.popup.open(`#popup-thank-you-${formID}`);
        return;
      }


      const defaultFormsThankYouPopUp = function () {
        let contentThankYou = document.createElement('div');
        contentThankYou.classList.add('thank-you', 'popup-thank-you');
        contentThankYou.setAttribute('aria-hidden', 'true');
        contentThankYou.setAttribute('id', `popup-thank-you-${formID}`);


        contentThankYou.innerHTML = `<div class="thank-you__content popup__content">
              <button data-close="popup-close" type="button" class="thank-you__close case-intro__close popup__close">
                <a></a>
            </button>

          <div class="thank-you__image">
                   <img src="${pathTheme}/assets/images/consultation-section/astronaut.png">
            </div>
            <div class="thank-you__text">
            <h3 class="thank-you__title">Thank you for contacting us!</h3>
            <p class="thank-you__sub-title">
            Thank you for reaching out! Our team will review your message and respond as soon as possible
            </p>
        </div>
         <div class="thank-you__button">
            <button id="popup-thank-you-close-btn" class="button-item">
            <a href="${homeUrl}" class="button-link new-btn--primary">
            Back to Home
            </a>
              </button>
          </div>
          <div class="thank-you__overlay-bg">
            <img  src="${pathTheme}/assets/images/consultation-section/stars.png" alt="form-img">
            </div>
            `;
        siteContent.appendChild(contentThankYou);
        flsModules.popup.open(`#popup-thank-you-${formID}`);
        flsModules.popup.close(`#popup-thank-you-close-btn-${formID}`);
      }


      const claimYourFreeCroPlanForm = function (title = '') {
        //Take current element from event on form.
        const contentThankYou = event.target.closest('.claim-your-free-cro-plan__contact-form');


        if (!contentThankYou) return;

        contentThankYou.innerHTML = `
            <div class="consultation__title">
            <h3>
            ${title}
            </h3>
            </div>

            <p class="consultation__sub-title">
            Thanks for reaching out — we’ll get back to you shortly.
            </p>

            <p class="consultation__sub-title-what-is-next">
            What\`s next?
            </p>

         <div class="consultation__steps">
              <ul class="consultation__steps-list">
              <li class="consultation__steps-list-item">
                <div class="consultation__steps-list-count">
                 <span class="count-number">1</span>
                 </div>
                <p>
                You will receive an auto-reply to your email with <a href="#">available time slots for a meeting</a>.
                </p>
               </li>
               <li class="consultation__steps-list-item">
                   <div class="consultation__steps-list-count">
                  <span class="count-number">2</span>
                   </div>
                   <p>
                      Our requirements specialist will address you within 60 minutes during working hours (10 am - 6 pm GMT+3).
                    </p>

              </li>
                 <li class="consultation__steps-list-item">
               <div class="consultation__steps-list-count">
                <span class="count-number">3</span>
               </div>
               <p>
               Within 2 business days, the Estimate with a Growth plan will be ready and our requirements specialist will present it to you on a meeting.
               </p>
              </li>
                 </ul>
                 </div>
                    <div class="consultation__info">
                        <p class="consultation__info-title">
                        Contact information!
                        </p>
                        <a href="tel:+380987568230" class="consultation__link consultation__link--phone">+380987568230</a>
                        <a href="mailto:business@stellar-soft.com" class="consultation__link consultation__link--email">business@stellar-soft.com</a>
                    </div>
                `;


      }

      //Data with form id where we need to show thank you pop up.
      const thankYouPopUps = {
        title: '',


        formsIDS: {
          //Claim your free cro plan v1 v2 forms
          2551: () => claimYourFreeCroPlanForm(this.title = 'Your Estimate will be ready soon!'),
          2552: () => claimYourFreeCroPlanForm(this.title = 'Your CRO plan will be ready soon!'),
          2600: () => claimYourFreeCroPlanForm(this.title = 'Your Estimate will be ready soon!'),
          2601: () => claimYourFreeCroPlanForm(this.title = 'Your CRO plan will be ready soon!'),
      }
    }


      //Show default thank you massage for default forms.
      thankYouPopUps.formsIDS[formID] ? thankYouPopUps.formsIDS[formID]() : defaultFormsThankYouPopUp();
    }
  )
}

ThankYouMassage();
