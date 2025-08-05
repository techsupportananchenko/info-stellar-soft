// Підключення функціоналу "Чертоги Фрілансера"
import {isMobile} from './functions.js';
// Підключення списку активних модулів
import {flsModules} from './modules.js';


export function expHeaderScrollHandler() {
  let lastScrollTop = 0;

  const headerScrollHandler = function () {
    const header = document.getElementById('header');
    const currentY = window.scrollY;


    if (currentY <= 0) {
      header.style.top = '0';
    } else if (currentY > lastScrollTop) {
      header.style.top = '-94px';
    } else {
      header.style.top = '0';
    }
    lastScrollTop = currentY <= 0 ? 0 : currentY;

  }


  window.addEventListener('scroll', headerScrollHandler, {passive: true});
}

expHeaderScrollHandler();

//Blog Nav
export function buttonsBlogNav() {
  const mainButton = document.getElementById('mainButton');
  const hiddenBlock = document.getElementById('hiddenBlock');
  const blockButtons = document.querySelectorAll('.js-block-button');
  const handlerState = () => {
    const windowWidth = window.innerWidth;
    const isActiveNav = hiddenBlock ? hiddenBlock.classList.contains('blog-active') : '';

    if (windowWidth >= 768 && isActiveNav) {
      hiddenBlock.classList.remove('blog-active');
    }

  }

  // Проверка существования элементов перед выполнением кода
  if (mainButton && hiddenBlock && blockButtons.length > 0) {
    // Установка начального текста главной кнопки и удаления активного класса у всех остальных кнопок
    const activeButton = document.querySelector('.button-active');
    if (activeButton) {
      mainButton.innerText = activeButton.innerText;
    }

    mainButton.addEventListener('click', function () {
      hiddenBlock.classList.toggle('blog-active');
      mainButton.classList.toggle('button-active');
      updateButtonColors();
    });

    blockButtons.forEach((button) => {
      button.addEventListener('click', function () {
        hiddenBlock.classList.remove('blog-active');
        mainButton.classList.remove('button-active');
        const buttonText = this.innerText;
        mainButton.innerText = buttonText;
        updateButtonColors();
      });
    });

  }
  document.addEventListener('click', function (event) {
    if (hiddenBlock) {
      if (
        !hiddenBlock.contains(event.target) &&
        !mainButton.contains(event.target)
      ) {
        hiddenBlock.classList.remove('blog-active');
        mainButton.classList.remove('button-active');
      }
    }

  });

  window.addEventListener('resize', handlerState);
  window.addEventListener('load', handlerState);

  function updateButtonColors() {
    blockButtons.forEach((button) => {
      if (button.innerText === mainButton.innerText) {
        button.classList.add('button-same');
      } else {
        button.classList.remove('button-same');
      }
    });

    // Удаление класса button-active у всех кнопок кроме mainButton
    blockButtons.forEach((button) => {
      button.classList.remove('button-active');
    });
  }

  updateButtonColors();
}

buttonsBlogNav();

//Placeholder Form
export function placeholderForm() {
  const inputs = document.querySelectorAll('.js-input');

  inputs.forEach(function (input) {
    input.addEventListener('input', function () {
      if (input.value.length > 0) {
        input.classList.add('fill');
      } else {
        input.classList.remove('fill');
      }
    });
  });
}

placeholderForm();

//Industry Section
export function industrySection() {
  let blocks = document.querySelectorAll('.js-industry');

  blocks.forEach(function (block) {
    block.addEventListener('click', function () {
      blocks.forEach(function (b) {
        b.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
}

industrySection();

//Cf7 error detection

document.addEventListener('wpcf7submit', function (event) {
  if (event.detail.status !== 'mail_sent') {
    console.log('Form dont work');
    const webhookUrl = 'https://hooks.slack.com/services/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';


    const slackMessage = {
      text: "*CF7 Error Detected*",
      blocks: [
        {
          type: "section",
          text: {
            type: "mrkdwn",
            text: `The form does not work!\n*Form ID:* ${event.target.id}\n*Status:* ${event.detail.status}\n*Message:* ${event.detail.apiResponse.message}`
          }
        }
      ]
    };
    fetch(webhookUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(slackMessage),
    })
      .then(response => {
        if (!response.ok) {
          console.error('Error sending to Slack', response.statusText);
        }
      })
      .catch(error => {
        console.error('Network error sending to Slack:', error);
      });
  }
}, false);

//Cf7 error set clear fields after error
document.addEventListener('wpcf7beforesubmit', function (e) {
  const form = e.target;
  const output = form.querySelectorAll('.wpcf7-not-valid-tip');
  const buttonSubmit = form.querySelector('.wpcf7-submit');


  buttonSubmit.disabled = true;


  setTimeout(() => {
    buttonSubmit.disabled = false;
  }, 1800);

  if (output.length) {
    output.forEach((o) => {
      o.remove();
    });
  }
});


//Vacancy input fake.

export const vacancyInputFake = () => {
  const vacancyInput = document.querySelector('.consultation-form__file-input');
  const vacancyInputFake = document.querySelector('.consultation-form__file-fake');


  if (!vacancyInput && !vacancyInputFake) return;


  vacancyInputFake.addEventListener('click', function () {
    vacancyInput.click();
  })

  vacancyInput.addEventListener('change', function () {
    if (vacancyInput.files.length > 0) {
      const fileName = vacancyInput.files[0].name;
      vacancyInputFake.querySelector('.consultation-form__file-title').textContent = fileName;
    }
  });
}
vacancyInputFake();





