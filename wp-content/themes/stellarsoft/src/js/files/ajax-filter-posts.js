/**
 * Filter posts on Blog information block.
 */
export function initAjaxFilterPosts() {
  const buttonsItems = document.querySelectorAll('.blog-information-navigation__link') ?
    document.querySelectorAll('.blog-information-navigation__link') : null;


  const outContent = document.getElementById('blog-information-cards-content');

  const buttonViewMore = document.getElementById('blog-information-view-more-btn');

  const ajaxEndPoint = themeData.ajaxUrl ? themeData.ajaxUrl : null;

  const dataContainer = document.getElementById('blog-information-data');


  const isPossibleToFilter = (countPosts, elementHide) => {


    if (countPosts <= 6) {
      elementHide.style.display = "none";
    }

  }

  isPossibleToFilter();
  const handlerAjax = async function (event) {
    event.preventDefault();

    if (!buttonsItems.length) {
      return;
    }

    const valueTermId = event.currentTarget.getAttribute('data-blog-information-title');
    const valueSlug = event.currentTarget.getAttribute('data-blog-information-slug');
    const postTypes = dataContainer ? dataContainer.getAttribute('data-current-post-types') : '';
    const postAuthor = dataContainer ? dataContainer.getAttribute('data-current-author-id') : false;
    dataContainer.setAttribute('data-current-post-slug', valueSlug);
    dataContainer.setAttribute('data-current-posts-count', "1");


    const data = {
      'action': "get_ajax_filter_posts",
      'term_id': valueTermId,
      'slug': valueSlug,
      'post_types': postTypes,
    }

    if (postAuthor) {
      data['author_id'] = postAuthor;
    }


    if (!ajaxEndPoint) {
      {
        return;
      }
    }


    try {

      let promise = await fetch(ajaxEndPoint, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams(data).toString(),
      });


      let response = await promise.json();

      if (response.success) {
        if (buttonViewMore) {
          buttonViewMore.style.display = "block";
        }
        outContent.innerHTML = '';
        const postContent = response.data.posts;
        const foundPosts = response.data.posts_count;

        if (foundPosts <= 6 && buttonViewMore) buttonViewMore.style.display = "none";


        outContent.insertAdjacentHTML('beforeend', postContent);

      }

    } catch (error) {
      console.error("Error fetching data:", error);
    }


  }


  if (buttonsItems && buttonsItems.length > 0) {
    buttonsItems.forEach((button) => {
      button.addEventListener('click', handlerAjax);
    })
  }

}

initAjaxFilterPosts();




