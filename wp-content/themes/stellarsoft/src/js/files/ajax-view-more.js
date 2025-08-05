//Ajax load more request.
export function initAjaxLoadMorePosts() {
  const buttonViewMore = document.getElementById('blog-information-view-more-btn');

  const ajaxEndPoint = themeData.ajaxUrl ? themeData.ajaxUrl : null;

  const outContent = document.getElementById('blog-information-cards-content');

  const dataContainer = document.getElementById('blog-information-data');


  let paged = 1;

  const handlerRequest = async (e) => {
    if (ajaxEndPoint) {
      const currentButton = e.currentTarget;
      currentButton.disabled = true;
      const formData = new FormData();
      const postsOffset = document.querySelectorAll('.blog-information-card__wrap').length;
      const postsSlug = dataContainer ? dataContainer.getAttribute('data-current-post-slug') : '';
      const postsAuthor = dataContainer ? dataContainer.getAttribute('data-current-author-id') : '';
      const postsType = dataContainer ? dataContainer.getAttribute('data-current-post-types') : '';
      dataContainer.setAttribute('data-current-posts-count', paged++);


      formData.append('action', 'get_ajax_view_more');
      formData.append('post_offset', postsOffset);
      formData.append('post_types', postsType);
      formData.append('slug', postsSlug);
      formData.append('paged', paged);
      //Only if data container on post page have data inside,we use author id.
      if (postsAuthor) {
        formData.append('author_id', postsAuthor);
      }


      try {

        let promise = await fetch(ajaxEndPoint, {
          method: 'POST',
          body: formData,
        });


        let response = await promise.json();

        if (response.success) {
          buttonViewMore.style.display = "block";
          currentButton.disabled = false;
          if (!response.data) {
            buttonViewMore.style.display = "none";
          } else {
            const postContent = response.data.posts;
            const isPossibleLoadMore = response.data.has_more_posts;

            if (!isPossibleLoadMore) {
              buttonViewMore.style.display = "none";
              paged = 1;
            }


            outContent.insertAdjacentHTML('beforeend', postContent);
          }
        }

      } catch (error) {
        console.error("Error fetching data:", error);
      }

    }


  }

  if (buttonViewMore) {
    buttonViewMore.addEventListener('click', handlerRequest);
  }

}

initAjaxLoadMorePosts();
