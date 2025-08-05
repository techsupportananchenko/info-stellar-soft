export function ajaxSearch() {
  const buttonSearch = document.getElementById('search-btn');
  const ajaxEndPoint = themeData ? themeData.ajaxUrl : null;
  const input = document.getElementById('search-input-item');
  const outContent = document.getElementById('blog-information-cards-content');
  const buttonViewMore = document.getElementById('blog-information-view-more-btn');
  const dataContainer = document.getElementById('blog-information-data');



  const debounce = function (func, delay = 1000) {
    let timeout;
    return function (...args) {
      clearTimeout(timeout);
      timeout = setTimeout(() => {
        func.apply(this, args);
      }, delay);
    };
  };

  if (!buttonSearch || !ajaxEndPoint) return;

  const ajaxHandler = async function () {
    let inputValue = input.value.trim();


    if (inputValue === '') {
      input.style.border = '1px solid #eb5444';
      return;
    } else {
      input.style.border = 'none';
    }

    const url = `${ajaxEndPoint}?action=get_ajax_search&s=${encodeURIComponent(inputValue)}`;

    try {
      const result = await fetch(url);
      const response = await result.json();


      if (!response.success) {
        outContent.innerHTML = 'No results found.';
        return;
      }

      const posts = response.data.posts;
      const foundPosts = response.data.posts_count;
      const currentTagPosts = response.data.tag;


      dataContainer.setAttribute('data-current-post-slug',currentTagPosts);
      buttonViewMore.style.display = "block";


      if (foundPosts <= 6 && buttonViewMore) buttonViewMore.style.display = "none";

      outContent.innerHTML = '';
      outContent.insertAdjacentHTML('beforeend', posts);
      input.value = '';

    } catch (e) {
      console.error(e);
    }
  };

  const debouncedAjaxHandler = debounce(ajaxHandler, 1500);

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') debouncedAjaxHandler();
  });

  buttonSearch.addEventListener('click', debouncedAjaxHandler);
}

ajaxSearch();
