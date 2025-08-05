export function cookie() {
  const buttonAccept = document.getElementById('cookie-accept');
  const buttonDecline = document.getElementById('cookie-decline');
  const banner = document.getElementById('cookie-banner');
  const gtm_header_script = themeData?.gtm_head;
  const gtm_body_script = themeData?.gtm_body;
  const cookieStatus = document.cookie.split('; ').find(row => row.startsWith('cookie_status='));
  const isAccepted = cookieStatus ? cookieStatus.includes('accept') : false;


  if (!buttonAccept || !buttonDecline || !banner || !gtm_header_script || !gtm_body_script) return;


  const handlerGtmDom = (isAccepted = false,) => {

    if (isAccepted) {


      if (!document.querySelector('script[data-gtm="true"]')) {
        const headFragment = document.createRange().createContextualFragment(
          gtm_header_script.replace('<script', '<script data-gtm="true"')
        );
        document.head.prepend(headFragment);
      }

      if (!document.querySelector('noscript[data-gtm="true"]')) {
        const bodyFragment = document.createRange().createContextualFragment(
          gtm_body_script.replace('<noscript', '<noscript data-gtm="true"')
        );
        document.body.insertBefore(bodyFragment, document.body.firstChild);
      }


    }

    if (cookieStatus) {
      banner.classList.remove('active');
    } else {
      banner.classList.add('active');
    }

  }


  handlerGtmDom(isAccepted);

  const handlerCookie = function (status = '') {

    if (!status) return;

    banner.classList.add('active');

    setTimeout(() => {
      banner.classList.remove('active');
      document.cookie = `cookie_status=${status}; path=/; max-age=86400; Secure; SameSite=Lax`;
    }, 300)
  }


  buttonAccept.addEventListener('click', () => {
    handlerCookie('accept')
    handlerGtmDom(true)
  });
  buttonDecline.addEventListener('click', () => {
    handlerCookie('decline')
    handlerGtmDom(false)
  });


}


document.addEventListener('DOMContentLoaded', cookie);
