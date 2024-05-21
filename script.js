    const navbarMenu = document.querySelector(".navbar .links");
    const hamburgerBtn = document.querySelector(".hamburger-btn");
    const hideMenuBtn = navbarMenu?.querySelector(".close-btn");
    const showPopupBtn = document.querySelector(".login-btn");
    const formPopup = document.querySelector(".form-popup");
    const hidePopupBtn = formPopup?.querySelector(".close-btn");
    const signupLoginLink = formPopup?.querySelectorAll(".bottom-link a");
    const profileBtn = document.querySelector('.profile-btn');
    const profilePopup = document.querySelector('.profile-popup-container');

    if (hamburgerBtn) {
        hamburgerBtn.addEventListener("click", () => {
            navbarMenu.classList.toggle("show-menu");
        });
    }

    if (hideMenuBtn) {
        hideMenuBtn.addEventListener("click", () => hamburgerBtn.click());
    }

    if (showPopupBtn) {
        showPopupBtn.addEventListener("click", () => {
            document.body.classList.toggle("show-popup");
        });
    }

    if (hidePopupBtn) {
        hidePopupBtn.addEventListener("click", () => showPopupBtn.click());
    }

    if (signupLoginLink) {
        signupLoginLink.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                formPopup.classList[link.id === 'signup-link' ? 'add' : 'remove']("show-signup");
            });
        });
    }

    if (profileBtn && profilePopup) {
        profileBtn.addEventListener('mouseover', function(event) {
            event.preventDefault();
            profilePopup.classList.add('active');
        });

        profilePopup.addEventListener('mouseenter', function(event) {
            event.preventDefault();
            profilePopup.classList.add('active');
        });

        profilePopup.addEventListener('mouseleave', function(event) {
            event.preventDefault();
            profilePopup.classList.remove('active');
        });
    }

    const themeToggle = document.querySelector('.theme-toggle');
        themeToggle.addEventListener('click', () => {
            console.log(6);
            document.body.classList.toggle('light-mode');
            document.body.classList.toggle('dark-mode');
            document.querySelectorAll('.profile-card, .content-card').forEach(card => {
                card.classList.toggle('light-mode');
                card.classList.toggle('dark-mode');
            });
        });
    
