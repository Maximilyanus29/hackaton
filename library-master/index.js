import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

const initSlider = () => {
    const mainSlider = new Swiper('.slider .swiper', {
        navigation: {
            nextEl: '.slider .swiper-button-next',
            prevEl: '.slider .swiper-button-prev'
        },
        autoplay: {
            delay: 3000
        },
        spaceBetween: 30,
        loop: true,
        slidesPerView: 4
    });
};
initSlider();

const addFavorite = () => {
    const books = document.querySelector('.books');

    const fillHeart = (e) => {
        const target = e.target;
        if (target.matches('.book__favorite')) {
            target.classList.toggle('active')
        }
    };

    books.addEventListener('click', fillHeart)
};
addFavorite();

const showModalLk = () => {
    const modalContainer = document.querySelector('.modal');
    const modalLk = document.querySelector('.lk-modal');
    const lkButtons = document.querySelectorAll('.js-lk');

    const openModal = (e) => {
        e.preventDefault();
        modalContainer.classList.add('open');
        modalLk.classList.add('open');
    };

    const closeModal = () => {
        modalContainer.classList.remove('open');
        for (let modal of modalContainer.children) {
            modal.classList.remove('open');
        }
    };

    lkButtons.forEach(btn => {
        btn.addEventListener('click', openModal);
    });

    modalContainer.addEventListener('click', (e) => {
        let target = e.target;
        if (target.closest('.modal__close')) {
            closeModal();
        }
        if (target.matches('.modal')) {
            closeModal();
        }
    });
};
showModalLk();

const editUserProfile = () => {
    const editButton = document.querySelector('.user-profile__button');
    const editValues = document.querySelectorAll('.user-profile__value');
    let isEdit;
    const editValue = () => {
        if (!isEdit) {
            editValues.forEach(value => {
                value.contentEditable = 'true';
                value.classList.add('edit');
            });
            editButton.textContent = 'Сохранить';
            return isEdit = true;
        } else {
            editValues.forEach(value => {
                value.contentEditable = 'false';
                value.classList.remove('edit');
            });
            editButton.textContent = 'Изменить';
            return isEdit = false;
        }
    };

    editButton.addEventListener('click', editValue);
};
editUserProfile();

const tabs = () => {
    const tabButtons = document.querySelectorAll('.tabs__button');
    const tabContents = document.querySelectorAll('.tabs__content');

    const changeTab = (e) => {
        const target = e.target;
        const dataTab = target.dataset.tab;

        tabButtons.forEach(button => {
            button.classList.remove('active');
        })

        target.classList.add('active');

        tabContents.forEach(content => {
            content.classList.remove('active');
            if (content.dataset.content === dataTab) {
                content.classList.add('active');
            }
        });
    };
    tabButtons.forEach(button => {
        button.addEventListener('click', changeTab);
    });
};
tabs();

const deleteFavorite = () => {
    const favoriteContainer = document.querySelector('.favorites-book');

    const deleteBook = (e) => {
        const target = e.target;
        if (target.matches('.book__favorite')) {
            target.classList.remove('active');
            target.parentElement.remove();
        }
    };

    favoriteContainer.addEventListener('click', deleteBook);
};
deleteFavorite();