
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#course-slider', {
        type   : 'loop',
        perPage: 3,
        autoplay: true,
        breakpoints: {
            1024: {
                perPage: 2,
            },
            768: {
                perPage: 1,
            },
        }
    }).mount();
});
    const navbarMenu = document.querySelector(".navbar .links");
    const hamburgerBtn = document.querySelector(".hamburger-btn");
    const hideMenuBtn = navbarMenu?.querySelector(".close-btn");

    if (hamburgerBtn) {
        hamburgerBtn.addEventListener("click", () => {
            navbarMenu.classList.toggle("show-menu");
        });
    }

    if (hideMenuBtn) {
        hideMenuBtn.addEventListener("click", () => {
            navbarMenu.classList.remove("show-menu");
        });
    }

    const showPopupBtn = document.querySelector(".login-btn");
    const formPopup = document.querySelector(".form-popup");
    const hidePopupBtn = formPopup?.querySelector(".close-btn");

    if (showPopupBtn) {
        showPopupBtn.addEventListener("click", () => {
            document.body.classList.toggle("show-popup");
        });
    }

    if (hidePopupBtn) {
        hidePopupBtn.addEventListener("click", () => {
            document.body.classList.remove("show-popup");
        });
    }

    const signupLoginLinks = formPopup?.querySelectorAll(".bottom-link a");

    if (signupLoginLinks) {
        signupLoginLinks.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                formPopup.classList.toggle("show-signup", link.id === 'signup-link');
            });
        });
    }

    const profileBtn = document.querySelector('.profile-btn');
    const profilePopup = document.querySelector('.profile-popup-container');

    if (profileBtn && profilePopup) {
        profileBtn.addEventListener('mouseover', () => {
            profilePopup.classList.add('active');
        });

        profilePopup.addEventListener('mouseenter', () => {
            profilePopup.classList.add('active');
        });

        profilePopup.addEventListener('mouseleave', () => {
            profilePopup.classList.remove('active');
        });
    }

    const themeToggle = document.querySelector('.theme-toggle');

    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('light-mode');
            document.body.classList.toggle('dark-mode');
            document.querySelectorAll('.profile-card, .content-card').forEach(card => {
                card.classList.toggle('light-mode');
                card.classList.toggle('dark-mode');
            });
        });
    }
