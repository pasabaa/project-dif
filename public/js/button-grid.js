let btnCard = document.querySelector('#button-card');

let btnList = document.querySelector('#button-list');

let cards = document.querySelector('#card-list');

let list = document.querySelector('#list');

const saveToLocalCard = () => {

    btnCard.classList.add('text-dark-variant');
    btnList.classList.remove('text-dark-variant');

    cards.classList.remove('d-none');
    list.classList.add('d-none');

    localStorage.setItem('type-list-card', btnCard.classList);

    localStorage.removeItem('type-list-list');
}

const saveToLocalList = () => {

    btnList.classList.add('text-dark-variant');

    btnCard.classList.remove('text-dark-variant');


    list.classList.remove('d-none');
    cards.classList.add('d-none');


    localStorage.setItem('type-list-list', btnCard.classList);

    localStorage.removeItem('type-list-card');

}

btnCard.addEventListener('click', saveToLocalCard);

btnList.addEventListener('click', saveToLocalList);
