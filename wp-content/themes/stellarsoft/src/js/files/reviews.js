// Add cookie for php function render_review_slide()
function setScreenSizeCookie() {
  let screenSize = 'desktop';
  if (window.innerWidth < 768) screenSize = 'mobile';
  else if (window.innerWidth < 1025) screenSize = 'tablet';

  document.cookie = `screen_size=${screenSize}; path=/; max-age=86400; Secure; SameSite=Lax`;
}

setScreenSizeCookie();
window.addEventListener("resize", setScreenSizeCookie);
