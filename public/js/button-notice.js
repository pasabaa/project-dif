/*NOTICES*/

let buttonNotice = document.querySelector('#notice');

let notice = document.querySelectorAll('.notice');

let notices = notice;

/*SERVICES*/

let buttonService = document.querySelector('#service');

let service = document.querySelectorAll('.service');

let services = service;

/*FAMILIES*/

let buttonFamilie = document.querySelector('#familie');

let familie = document.querySelectorAll('.familie');

let families = familie;

/*CODE NOTICES */


buttonNotice.addEventListener('click', () => {
    for (let i = 0; i < notices.length; i++) {
        notices[i].classList.toggle('d-none');
    }
    console.log('si funciona');
});


/*CODE SERVICES*/

buttonService.addEventListener('click', () => {
    for (let i = 0; i < services.length; i++) {
        
        services[i].classList.toggle('d-none');
    }
});

/*CODE FAMILIES*/

buttonFamilie.addEventListener('click', () => {
    for (let i = 0; i < families.length; i++) {
        families[i].classList.toggle('d-none');
    }
})
