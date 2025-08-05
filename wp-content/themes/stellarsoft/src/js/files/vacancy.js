export function filerVacancyCategory() {

  const categoryTitles = document.querySelectorAll('[data-vacancy-id]');
  const vacancies = document.querySelectorAll('.vacancy');


  if (!categoryTitles && !vacancies) {
    return;
  }

  const handlerFilter = function (event) {

    const techNameID = this.getAttribute('data-vacancy-id');
    const currentTarget = event.currentTarget;
    categoryTitles.forEach((categoryTitle) => {
      categoryTitle.classList.remove('active');
    })

    currentTarget.classList.add('active');

    vacancies.forEach((vacancy) => {
      const vacancyElements = vacancy.querySelectorAll('[data-vacancy-tech-id]');
      vacancy.style.display = 'none';

      if (vacancyElements) {
        vacancyElements.forEach((vacancyElement) => {
          const vacancyNameID = vacancyElement.getAttribute('data-vacancy-tech-id');

          if (vacancyNameID === techNameID) {
            vacancyElement.closest('.vacancy').style.display = 'flex';
          }
        })
      }


    })


  }

  categoryTitles.forEach((techName, index) => {
    index === 0 ? techName.classList.add('active') : '';
    techName.addEventListener('click', handlerFilter);
  })


}

filerVacancyCategory();
