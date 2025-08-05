function getAjaxColorThemeSwitch() {
  const buttonSwitch = document.getElementById('bth-theme-switch');
  const ajaxEndPoint = themeData.ajaxUrl ? themeData.ajaxUrl : null;
  const DOM = document.documentElement;
  const token = themeData.nonce;


  if (!buttonSwitch && !ajaxEndPoint) return;


  //Switch action.
  const switchTheme = () => {
    const isDarkTheme = DOM.classList.contains('theme-dark');

    isDarkTheme ? DOM.classList.replace('theme-dark', 'theme-light') : DOM.classList.replace('theme-light', 'theme-dark');

  }

  //Save current theme.
  const ajaxHandler = async () => {
    let currentTheme = 'theme-dark';
    if (DOM.classList.contains('theme-light')) currentTheme = 'theme-light';
    if (DOM.classList.contains('theme-dark')) currentTheme = 'theme-dark';


    try {
      const request = await fetch(ajaxEndPoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `nonce=${token}&action=theme_switch&theme=${currentTheme}`
      })
    } catch (error) {
      console.log('AJAX error', error)
    }


  }

//@TODO Disable for live light theme.
  // buttonSwitch.addEventListener('click', async function () {
  //   switchTheme()
  //   await ajaxHandler();
  // });


}

getAjaxColorThemeSwitch();
