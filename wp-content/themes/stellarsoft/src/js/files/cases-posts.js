
export function casePost() {
  const itemTagShowAll = document.getElementById('cases-dropdown-btn');
  const tagsPosts = document.querySelectorAll('[data-case-tag-id]');
  const ajaxEndPoint = themeData ? themeData.ajaxUrl : null;
  let currentPage = 1;


  //Request to careers.
  async function getAjaxCasesPost(data = {}) {
    if (!ajaxEndPoint) {
      return;
    }

    const requestData = {
      action: 'cases_ajax_action',
      ...data,
    };

    try {
      const result = await fetch(ajaxEndPoint, {
        method: 'POST',
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams(requestData).toString(),
      });

      return await result.json();
    } catch (error) {
      console.error('Error fetch cases posts:', error);
    }
  }

  //Render posts content.
  const renderPosts = function (posts, container) {
    container.innerHTML = "";


    if (!Array.isArray(posts)) {
      container.classList.add('not-fond-posts')
      container.innerHTML += `
           <div class="case__not-found">
           ${posts.massage}
           </div>
        `;
      return;
    }


    posts.forEach((post) => {
      container.classList.remove('not-fond-posts')
      container.innerHTML += `
            <div class="case">
                <div class="case__wrapper">
                    ${post.image ? `<div class="case__image">
                        <img src="${post.image}" alt="${post.title}">
                    </div>` : ""}

                    <div class="case__about">
                        <h3 class="case__title">
                        <a href="${post.link}">
                          ${post.title}
                        </a>
                        </h3>

                        ${post.excerpt ? `<h3 class="case__excerpt">${post.excerpt.length > 155 ? post.excerpt.substring(0, 155) + '...' : post.excerpt}</h3>` : ""}

                        ${post.technologies && post.technologies.length > 0 ? `
                            <div class="case__technologies">
                                ${post.technologies.slice(0, 3).map(tech => `
                                    ${tech.icon_url ? `<div class="technology technology--${tech.slug}">
                                <img src="${tech.icon_url}" class="technology-img" alt="${tech.name}">
                                </div>` : ``}
                                `).join('')}
                                ${post.technologies.length > 3 ? `<div class="technology technology--others">+${post.technologies.length - 3}</div>` : ""}
                            </div>
                        ` : ""}

                        <div class="case__link">
                            <a class="link new-btn new-btn--primary" href="${post.link}">View Details</a>
                        </div>

                        ${post.tags && post.tags.length > 0 ? `
                            <div class="case__tags">
                                ${post.tags.map(tag => `<span class="case__tag">${tag}</span>`).join('')}
                            </div>
                        ` : ""}
                    </div>
                </div>
            </div>
        `;
    });
  }


  //Render Paginate new bar with numbers.
  const renderPaginateBar = function (dataCountPages) {
    const paginateBar = document.getElementById('case-pagination-bar');
    const countPages = dataCountPages.max_pages;
    currentPage = 1;


    paginateBar.innerHTML = '';

    if (countPages > 0) {
      for (let i = 1; i <= countPages; i++) {

        const pageBtn = document.createElement("span");
        pageBtn.classList.add("pagination__count");
        pageBtn.textContent = i;
        pageBtn.setAttribute("data-page", i);

        if (i === currentPage) {
          pageBtn.classList.add("active");
        }


        paginateBar.appendChild(pageBtn);
      }
      statesNumbersPagination(currentPage)
    }
  }


  //States buttons Prev | Next.
  const statesButtonsPagination = function (dataState) {
    const nextBtn = document.getElementById("case-next-page");
    const prevBtn = document.getElementById("case-prev-page");


    if (!dataState.has_next) {
      nextBtn.classList.add('disabled');
    } else {
      nextBtn.classList.remove('disabled');
    }

    if (!dataState.has_prev) {
      prevBtn.classList.add('disabled');
    } else {
      prevBtn.classList.remove('disabled');
    }


  }

  //States for numbers.
  const statesNumbersPagination = function (setCurrentPage) {
    const paginationNumbers = document.querySelectorAll('[data-page]');


    if (!paginationNumbers || setCurrentPage <= 0) return;

    currentPage = parseInt(setCurrentPage);

    paginationNumbers.forEach((btnNum) => {
      const btnDataPage = parseInt(btnNum.getAttribute('data-page'));
      if (btnDataPage === currentPage) {
        btnNum.classList.add('active');
      } else {
        btnNum.classList.remove('active');
      }
    })

    goToSelectPage(paginationNumbers);


  }


  //Pagination posts
  const paginateHandler = async function (direction) {
    if (direction === "prev" && currentPage <= 1) return;
    currentPage = direction === "next" ? currentPage + 1 : currentPage - 1;

    const contentOut = document.getElementById("cases-content");
    const currentTermId = contentOut.getAttribute("data-case-posts-id");


    const paginatedPosts = await getAjaxCasesPost({
      careers_term_id: currentTermId,
      current_paginate: currentPage,
    });

    if (!paginatedPosts) return;


    const postsData = paginatedPosts.data.posts;
    const paginationData = paginatedPosts.data.pagination;


    statesButtonsPagination({ ...paginationData });
    statesNumbersPagination(currentPage);
    renderPosts(postsData, contentOut);
    pullUpWindowHandler();
  };


  //Go to selects page.
  const goToPageHandler = async function (e) {
    const currentButtonNum = e.currentTarget;
    const currentPage = e.currentTarget.getAttribute('data-page');
    const contentOut = document.getElementById("cases-content");
    const currentTermId = contentOut.getAttribute("data-case-posts-id");


    if (!currentButtonNum || !currentPage || !currentTermId) return;


    const posts = await getAjaxCasesPost({
      careers_term_id: currentTermId,
      current_paginate: currentPage,
    })


    statesButtonsPagination({ ...posts.data.pagination });
    statesNumbersPagination(currentPage);
    renderPosts(posts.data.posts, contentOut);
    pullUpWindowHandler();

  }

  //Filter posts from Ajax.
  const getFilterPostsHandler = async (e) => {
    const currentBtn = e.currentTarget;
    const allButtons = document.querySelectorAll('[data-case-tag-id]');
    const tagId = e.currentTarget.getAttribute('data-case-tag-id');
    const posts = await getAjaxCasesPost({ careers_term_id: tagId });
    const contentOut = document.getElementById('cases-content');


    allButtons.forEach((btn) => (btn.classList.remove('active')));
    currentBtn.classList.add('active');
    contentOut.setAttribute('data-case-posts-id', tagId);


    if (!posts.success) return;
    const postsData = posts.data.posts;
    const paginationData = posts.data.pagination;
    contentOut.innerHTML = '';


    renderPosts(postsData, contentOut);
    renderPaginateBar({ ...paginationData });
    statesButtonsPagination({ ...paginationData });
    pullUpWindowHandler();
  }


  //Pull up winwow to top block with content
  const pullUpWindowHandler = function () {
    const triggerContent = document.getElementById('cases-content');

    if (!triggerContent) return;

    triggerContent.scrollIntoView({
      behavior: 'smooth',
      block: 'start',
    })
  }


  //Pagination when click on prev | next btn.
  function paginatePosts() {
    const nextBtn = document.getElementById("case-next-page");
    const prevBtn = document.getElementById("case-prev-page");

    if (!nextBtn && !prevBtn) return;


    nextBtn.addEventListener("click", () => paginateHandler("next"));
    prevBtn.addEventListener("click", () => paginateHandler("prev"));


  }


  paginatePosts();

  //Selected page on number.
  function goToSelectPage(pagesNumElements = []) {
    if (pagesNumElements.length === 0) {
      pagesNumElements = document.querySelectorAll('[data-page]');
    }

    if (pagesNumElements.length === 0) return;

    pagesNumElements.forEach((pageCount) => {
      pageCount.removeEventListener('click', goToPageHandler);
      pageCount.addEventListener('click', goToPageHandler);
    });
  }

  goToSelectPage();

  //Mobile list with tags.
  function mobileListTags() {

    if (!itemTagShowAll) {
      return;
    }

    itemTagShowAll.addEventListener('click', function (e) {
      const buttonTarget = e.currentTarget;
      const dropDown = buttonTarget.nextElementSibling;

      buttonTarget.classList.toggle('active-show-all-btn');
      dropDown.classList.toggle('active');
    })
  }

  mobileListTags();

  //Filer posts by tag.
  function filterPostsByTag() {

    if (!tagsPosts) {
      return;
    }


    tagsPosts.forEach((tag) => {
      tag.addEventListener('click', getFilterPostsHandler)
    })


  }

  filterPostsByTag();

}

casePost();