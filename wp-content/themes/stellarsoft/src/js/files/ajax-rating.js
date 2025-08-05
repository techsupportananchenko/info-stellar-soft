/**
 * Ajax Rating handler.
 */

export function ajaxRating() {
  const buttons = document.querySelectorAll('[data-grade-btn]');
  const ajaxEndPoint = themeData.ajaxUrl ? themeData.ajaxUrl : null;
  const token = themeData.nonce;

  if (!buttons.length || !ajaxEndPoint) return;


  const ajaxHandler = async function (e) {
    const button = e.currentTarget;
    const valueGrade = parseInt(e.currentTarget.getAttribute('data-grade-btn'));
    const postId = e.currentTarget.closest('[data-post-id]')?.getAttribute('data-post-id') || null;
    const reviewsCount = e.currentTarget.closest('[data-post-id]')?.querySelector('[data-reviews-count]') || null;
    const ratingAvarage = e.currentTarget.closest('[data-post-id]')?.querySelector('[data-raiting-average]') || null;


    if (!valueGrade) return;

    if (valueGrade < 1 || valueGrade > 5) return;


    const data = {
      'action': 'ajax_rating',
      'grade': valueGrade,
      'post_id': postId,
      'nonce': token,
    };
    try {
      const response = await fetch(ajaxEndPoint, {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: new URLSearchParams(data).toString(),
      });

      const dataRate = await response.json();

      const {average_post_rating, count_post_rating} = dataRate?.data ?? {};


      if (!average_post_rating || !count_post_rating) return;

      buttons.forEach(button => {
        button.classList.remove('user-voice-exist');
        button.disabled = true;
      })

      button.classList.add('user-voice-exist');

      reviewsCount.textContent = count_post_rating;
      ratingAvarage.textContent = average_post_rating;


    } catch (error) {
      console.error("Error fetching data:", error);
    }


  }


  buttons.forEach(button => {
    button.addEventListener('click', ajaxHandler);
  });


}

ajaxRating();
