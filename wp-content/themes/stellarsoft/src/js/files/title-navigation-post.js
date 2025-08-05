//Title logic on single post page.

export function initTitleNavigation() {
  const navTitlesMenu = document.getElementById('single-post-titles-nav');
  const singlePostContent = document.querySelector('.single-post');


  const addTitleInTableContent = () => {
    const titles = singlePostContent.querySelectorAll('h2.post-content__title');
    const listTitles = navTitlesMenu.querySelector('.sub-titles__list');
    //Set data attribute counter titles.
    const isAddCounterTitles = listTitles.getAttribute('data-counter-titles') === 'true';


    //Copies node titles.
    const copyTitles = [...titles];


    if (titles && titles.length > 0) {
      listTitles.innerHTML = '';
      //Default titles from article.
      copyTitles.forEach((title, index) => {
        //Copy node item title and add them to left sidebar.
        const listItem = document.createElement('li');
        const listLink = document.createElement('a');
        //Set first half word to dataAttribute links on left side.
        let dataNameTitle = title.textContent !== '' && title.textContent ? title.textContent.split(' ')[0] : null;


        listItem.classList.add('sub-titles__item');
        listLink.classList.add('sub-titles__link');

        //If have data attribute counter titles we add index.
        listLink.textContent = isAddCounterTitles ? `${index + 1}. ${title.textContent}` : title.textContent;
        listLink.id = `#post-${index}`;


        if (index === 0) {
          listItem.classList.add('active');
        }

        /**
         * Here we insert the first word from the title into the links for anchor links.
         * Look dataNameTitle var.
         */

        if (dataNameTitle) {
          dataNameTitle = dataNameTitle.toLowerCase();
          listLink.href = `#${dataNameTitle}`;
          title.setAttribute('id', dataNameTitle);
        }


        title.setAttribute('data-single-post-title', index.toString())
        listItem.setAttribute('data-single-post-title', index.toString())

        listItem.appendChild(listLink);
        listTitles.appendChild(listItem);


      });

    }
  };


  const setCurrentArticle = () => {

    const targetItems = document.querySelectorAll('h2.post-content__title');
    const navItems = document.getElementById('single-post-titles-nav');

    if (!targetItems || !navItems) {
      return;
    }

    const options = {
      root: null,
      rootMargin: '0px 0px -25% 0px',
      threshold: 1,
    }
    const callback = function (entries) {
      entries.forEach((entry) => {
        const isCenterWindow = entry.isIntersecting;
        const triggerTitle = entry.target;
        //Post title id
        const triggerID = triggerTitle.getAttribute('data-single-post-title');

        if (isCenterWindow) {
          navItems.querySelectorAll('.sub-titles__item').forEach((navItem) => {
            if (navItem.getAttribute('data-single-post-title') === triggerID) {
              navItem.classList.add('active');
            } else {
              navItem.classList.remove('active');
            }
          })

        }
      })
    }

    const observer = new IntersectionObserver(callback, options);

    targetItems.forEach((targetItem) => {
      observer.observe(targetItem);
    })


  }


  const progressReading = () => {
    const singlePostContentHeight = document.querySelector('.single-post__article')?.scrollHeight;
    const singlePostContentTop = document.querySelector('.single-post__article')?.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;
    const progressBar = singlePostContent.querySelector('.sub-titles__progress-status');

    if (!singlePostContentHeight || !singlePostContentTop || !windowHeight || !progressBar) return;

    const scrolled = Math.min(Math.max(windowHeight - singlePostContentTop, 0), singlePostContentHeight);


    const progress = (scrolled / singlePostContentHeight) * 100;

    progressBar.style.width = `${progress}%`;
  }


  const copyCurrentLinkPost = (singlePostContent) => {
    const links = singlePostContent.querySelectorAll('.copy-link-post');
    const noticeMassageEl = document.getElementById('copy-post');


    if (!links.length) return;

    links.forEach((link) => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const url = link.href;

        if (!url) return;

        navigator.clipboard.writeText(url);

        noticeMassageEl.style.display = 'block';

        return setTimeout(() => {
          noticeMassageEl.style.display = 'none';
        }, 3000)
      })
    })

  }


  function initFunction() {
    addTitleInTableContent();
    setCurrentArticle();
    copyCurrentLinkPost(singlePostContent);
    window.addEventListener('scroll', progressReading);
    window.addEventListener('resize', progressReading);
  }

  if (navTitlesMenu && singlePostContent) {
    initFunction();
  }
}

initTitleNavigation();
