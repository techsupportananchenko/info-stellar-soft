//Handlers for mobile and desktop.
const megaMenu = {


  currentDevice: '',
  htmlDoc: document.documentElement,
  //Current device width.
  currentWindowWidth: function () {
    const headerNav = document.querySelector('.nav');
    headerNav.classList.remove('desktop-menu', 'mobile-menu');

    if (window.innerWidth >= 1024) {
      this.currentDevice = 'desktop';
      headerNav.classList.add('desktop-menu')
      headerNav.classList.remove('mobile-menu-active');
      // headerNav.querySelectorAll('.mega-menu').forEach((menu)=>(menu.classList.remove('show-mega-menu')));
      this.htmlDoc.classList.remove('lock')
    } else if (window.innerWidth <= 1024) {
      this.currentDevice = 'mobile';
      headerNav.classList.add('mobile-menu')
    }

    return this.currentDevice;
  },


  desktop: {
    handlers: {
      open: function openLogicMenuDesktopHandler(event) {
        const currentTarget = event.currentTarget.querySelector('.mega-menu');
        const MenuContent = document.querySelectorAll('.mega-menu');


        if (megaMenu.currentWindowWidth() === 'desktop') {
          MenuContent.forEach((item) => {
            item.classList.contains('show-mega-menu') ? item.classList.remove('show-mega-menu') : ''
          })
          currentTarget ? currentTarget.classList.add('show-mega-menu') : '';

          currentTarget.classList.contains('show-mega-menu') ?
            event.target.querySelector('.menu__link').classList.add('active-link') : '';

          if (currentTarget) {
            this.handlers.setVisible(currentTarget);
          }
        }
        document.querySelectorAll('.view__page-back') ? document.querySelectorAll('.view__page-back').forEach((item) => {
          item.remove();
        }) : '';

        //Call hover method after opened Menu.
        this.SubMenu();
      },
      hide: function hideLogicMenuDesktopHandler(event) {
        const linkItem = event.currentTarget.querySelector('.list__link');
        const currentTarget = event.currentTarget.querySelector('.mega-menu');
        const relatedItem = event.relatedTarget;

        if (relatedItem) {
          if (relatedItem.matches('.header__wrap') || relatedItem.matches('.header__about')) {
            return;
          }

          linkItem.classList.remove('active-link');
          currentTarget.classList.remove('show-mega-menu');
        }


      },
      hover: function showSubMenuDesktopHandler(event) {
        if (megaMenu.currentWindowWidth() === 'desktop') {
          const megaMenus = document.querySelectorAll('.mega-menu');
          const isEnableMenu = Object.entries(megaMenus).filter(([key, menu]) => menu.classList.contains('show-mega-menu'))
          if (isEnableMenu.length > 0 && isEnableMenu) {
            const [key, menuItem] = isEnableMenu[0];


            const elementTrigger = event.target.getAttribute('data-menu-link-content') ?
              event.target.getAttribute('data-menu-link-content') : '';
            if (elementTrigger && menuItem.querySelectorAll('.mega-menu__inbound').length > 0) {
              menuItem.querySelectorAll('.mega-menu__inbound').forEach((menuElement, index) => {
                const menuTrigger = menuElement.getAttribute('data-mega-menu-content');
                //Set class for element equal id content.
                if (menuTrigger === elementTrigger) {
                  menuElement.classList.add('active-inbound');
                } else {
                  menuElement.classList.remove('active-inbound');
                }
              })
            }
          }
        }
      },
      setVisible: function (currentLinkItem) {
        if (megaMenu.currentWindowWidth() === 'desktop') {
          if (currentLinkItem.hasChildNodes('.mega-menu__content')) {
            const contentInnerLink = currentLinkItem.querySelector('.mega-menu__content');
            //Set first element visible.
            contentInnerLink.querySelectorAll('.mega-menu__inbound').forEach((contentInner) => {
              contentInner.classList.remove('active-inbound');
            })
            contentInnerLink.firstChild.classList.add('active-inbound');

          }
        }

      },
    },
    handlersMobile: {
      openSubMenu: function openLogicMenuMobileHandler(event) {
        if (megaMenu.currentWindowWidth() === 'mobile') {
          event.stopPropagation();
          const currentElement = event.currentTarget;
          const subMenuMobile = currentElement.querySelector('.mega-menu');
          const subMenuLink = currentElement.querySelectorAll('.titles__item');


          if (subMenuLink)
            subMenuLink.forEach((subLink) => {
              subLink.addEventListener('click', function (event) {
                if (!event.currentTarget.matches('.mega-menu__main-link')) {
                  event.preventDefault()
                }
                const currentSubLink = event.currentTarget.querySelector('.titles__link');
                const subLinkID = currentSubLink.getAttribute('data-menu-link-content');
                const subContents = document.querySelectorAll('.mega-menu__inbound');
                const linkBack = currentSubLink.text;
                const linkBackItem = document.createElement('h3');
                linkBackItem.classList.add('view__page-title', 'view__page-back');
                linkBackItem.textContent = linkBack;


                subContents.forEach((subContent) => {
                  const subContentID = subContent.getAttribute('data-mega-menu-content');
                  if (subContentID === subLinkID) {
                    subContent.classList.add('active-inbound');
                    subMenuMobile.querySelector('.mega-menu__content').classList.add('active-inbound-content');

                    if (!subContent.querySelector('.view__page-back')) {
                      subContent.insertAdjacentElement('afterbegin', linkBackItem);
                    }
                    if (linkBackItem) {
                      linkBackItem.addEventListener('click', function () {
                        subContent.classList.remove('active-inbound');
                        subMenuMobile.querySelector('.mega-menu__content').classList.remove('active-inbound-content');
                      })
                    }
                  }
                });

              })
            })
          if (event.target.closest('.titles__heading') || event.target.closest('.mega-menu__inbound ,.active-inbound')) {
            return;
          }
          if (subMenuMobile.classList.contains('show-mega-menu')) {
            subMenuMobile.classList.remove('show-mega-menu');
          } else {
            document.querySelectorAll('.mega-menu').forEach((menu) => {
              menu.classList.remove('show-mega-menu');
            });
            subMenuMobile.classList.add('show-mega-menu');
          }
        }


      },
    },
    //Main menu.
    Menu: function OpenHideMenuDesktop() {
      const menuLinks = document.querySelectorAll('.list__item--has-mega-menu');
      const mobileMenuOpen = document.getElementById('mobile-menu-open');
      const mobileMenuClose = document.getElementById('mobile-menu-close');
      const linksHeader = document.querySelectorAll('.menu__link--has-mega-menu');


      linksHeader.forEach((link) => {
        link.addEventListener('click', (event) => {
          event.preventDefault();
        })
      })

      if (!this.handlers.boundOpen) {
        this.handlers.boundOpen = this.handlers.open.bind(this);
        this.handlers.boundHide = this.handlers.hide.bind(this);
        this.handlers.boundOpenMobile = this.handlersMobile.openSubMenu.bind(this)
      }

      const openHandler = this.handlers.boundOpen;
      const hideHandler = this.handlers.boundHide;
      const openHandlerMobile = this.handlers.boundOpenMobile;


      if (megaMenu.currentWindowWidth() === 'desktop') {
        menuLinks.forEach((menuLink) => {
          menuLink.removeEventListener('click', openHandlerMobile);
          menuLink.addEventListener('mouseenter', openHandler);
          menuLink.addEventListener('mouseleave', hideHandler);
        });
      }
      if (megaMenu.currentWindowWidth() === 'mobile') {
        mobileMenuOpen.addEventListener('click', function (event) {
          const menuMobile = document.querySelector('.mobile-menu');
          megaMenu.htmlDoc.classList.add('lock')
          if (menuMobile)
            menuMobile.classList.add('mobile-menu-active')
        });
        mobileMenuClose.addEventListener('click', function (event) {
          megaMenu.htmlDoc.classList.remove('lock');
          if (event.target.closest('.mobile-menu') && event.target.closest('.mobile-menu').classList.contains('mobile-menu-active')) {
            event.target.closest('.mobile-menu').classList.remove('mobile-menu-active');
            document.querySelectorAll('.active-inbound-content').forEach((menuInner) => {
              if (menuInner.classList.contains('active-inbound-content')) {
                menuInner.classList.remove('active-inbound-content');
                menuInner.querySelector('.mega-menu__inbound').classList.remove('active-inbound')
              }
            })
          }
        });


        menuLinks.forEach((menuLink) => {
          menuLink.removeEventListener('click', openHandlerMobile)
          menuLink.removeEventListener('mouseenter', openHandler);
          menuLink.removeEventListener('mouseleave', hideHandler);
          menuLink.addEventListener('click', openHandlerMobile)
        });
      }

    },
    //Sub menu inner.
    SubMenu: function SubMenuItemsDesktop() {
      //Mega menu item.
      const megaMenus = Array.from(document.querySelectorAll('.mega-menu'));
      const megaMenuTitles = document.querySelectorAll('.titles__link');
      const isEnableMenu = megaMenus.filter((menu) => menu.classList.contains('show-mega-menu'));
      if (isEnableMenu.length > 0) {
        //State menu and get current menu.
        const menuItem = isEnableMenu[0];
        if (menuItem.classList.contains('show-mega-menu') && menuItem) {
          if (megaMenu.currentWindowWidth() === 'desktop') {
            menuItem.addEventListener('mouseover', this.handlers.hover)
            //Hovered title.
            megaMenuTitles.forEach((menuTitle) => {
              menuTitle.addEventListener('mouseenter', function () {
                megaMenuTitles.forEach((item) => item.classList.remove('link-active'));
                menuTitle.classList.add('link-active');
              })
            })
          }

        }
      }

    }

  },

}

/**
 * @TODO
 * Delete all link events from links.
 * @hide-link class add in menu admin panel,look @class-stallar-soft-menu.php.
 * FIX IT ! Temporary solution !
 */
function hideLinkdsWithoutContent() {
  const linksToHide = document.querySelectorAll('.hide-link');


  if (!linksToHide && linksToHide.length <= 0) {
    return;
  }

  linksToHide.forEach((link) => {
    link.querySelectorAll('.view__wrap').forEach((linkChild) => {
      linkChild.addEventListener('click', (e) => {
        e.preventDefault();
      })
    })
    link.querySelectorAll('.view__page-title').forEach((title) => {
      title.remove();
    })
  })

}

hideLinkdsWithoutContent();

function initMenu() {
  megaMenu.desktop.Menu();
}

window.addEventListener('load', initMenu);
window.addEventListener('resize', initMenu);
