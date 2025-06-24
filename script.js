let lastScrollY = 0;

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    const navList = document.querySelector('#nav-list');
    const pageHeader = document.querySelector('header');
    const scrollToTopButton = document.getElementById('scroll-to-top');

    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxCloseButton = document.querySelector('#lightbox-modal .close-button');

    const ambienteItems = document.querySelectorAll('.ambiente-item');
    const servicoItems = document.querySelectorAll('.servico-item');

    const mainContactForm = document.querySelector('.main-contact-form');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const messageInput = document.getElementById('message');
    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error');
    const messageError = document.getElementById('message-error');
    const formStatusMessageMain = document.querySelector('.form-status-message-main');

    function initMenu() {
        if (menuToggle && mainNav && navList) {
            menuToggle.addEventListener('click', function() {
                const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
                menuToggle.classList.toggle('open');
                mainNav.classList.toggle('active');
                menuToggle.setAttribute('aria-expanded', !isExpanded);
            });

            navList.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    if (mainNav.classList.contains('active')) {
                        closeMenu();
                    }
                });
            });
        }
    }

    function closeMenu() {
        if (menuToggle && mainNav) {
            menuToggle.classList.remove('open');
            mainNav.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    }

    function initLightbox() {
        if (lightboxModal && lightboxImage && lightboxCloseButton) {
            document.querySelectorAll('.ambiente-gallery img, .servico-item img, .clinic-image-item img').forEach(img => {
                img.addEventListener('click', function() {
                    const fullSrc = this.getAttribute('data-fullsrc') || this.src;
                    const altText = this.alt;
                    openLightbox(fullSrc, altText);
                });
            });

            lightboxCloseButton.addEventListener('click', closeLightbox);

            lightboxModal.addEventListener('click', (event) => {
                if (event.target === lightboxModal) {
                    closeLightbox();
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && lightboxModal.classList.contains('active')) {
                    closeLightbox();
                }
            });
        }
    }

    function openLightbox(imgSrc, imgAlt) {
        if (lightboxModal && lightboxImage) {
            lightboxImage.src = imgSrc;
            lightboxImage.alt = imgAlt;
            lightboxModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeLightbox() {
        if (lightboxModal && lightboxImage) {
            lightboxModal.classList.remove('active');
            document.body.style.overflow = '';
            lightboxImage.src = '';
        }
    }

    function initScrollToTopButton() {
        if (scrollToTopButton) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    scrollToTopButton.classList.add('show');
                } else {
                    scrollToTopButton.classList.remove('show');
                }
            });

            scrollToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    }

    function initScrollReveal() {
        const handleIntersect = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('aparecer');
                    observer.unobserve(entry.target);
                }
            });
        };

        const observerOptions = {
            root: null,
            threshold: 0.2,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver(handleIntersect, observerOptions);

        if (ambienteItems.length > 0) {
            ambienteItems.forEach(item => {
                observer.observe(item);
            });
        }
        if (servicoItems.length > 0) {
            servicoItems.forEach(item => {
                observer.observe(item);
            });
        }
    }

    function initMainContactForm() {
        if (mainContactForm) {
            mainContactForm.addEventListener('submit', async function(event) {
                event.preventDefault();

                const isValid = validateMainContactFormFields();

                if (!isValid) {
                    const firstInvalidElement = document.querySelector('.error-message:not(:empty)');
                    if (firstInvalidElement) {
                        firstInvalidElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                    return;
                }

                const formData = new FormData(mainContactForm);
                const formspreeAction = mainContactForm.action;

                try {
                    const response = await fetch(formspreeAction, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json'
                        }
                    });

                    if (response.ok) {
                        if (formStatusMessageMain) {
                            formStatusMessageMain.textContent = 'Mensagem enviada com sucesso! Em breve entraremos em contato.';
                            formStatusMessageMain.classList.remove('error');
                            formStatusMessageMain.classList.add('success');
                            formStatusMessageMain.style.display = 'block';
                            mainContactForm.reset();
                            setTimeout(() => {
                                formStatusMessageMain.style.display = 'none';
                            }, 5000);
                        } else {
                            console.log('Mensagem enviada com sucesso! (Feedback via console)');
                            mainContactForm.reset();
                        }
                    } else {
                        const data = await response.json();
                        let errorMessage = 'Ocorreu um erro ao enviar a mensagem. Tente novamente.';
                        if (data.errors) {
                            errorMessage = data.errors.map(error => error.message).join(', ');
                        }
                        if (formStatusMessageMain) {
                            formStatusMessageMain.textContent = errorMessage;
                            formStatusMessageMain.classList.remove('success');
                            formStatusMessageMain.classList.add('error');
                            formStatusMessageMain.style.display = 'block';
                            setTimeout(() => {
                                formStatusMessageMain.style.display = 'none';
                            }, 5000);
                        } else {
                            console.error('Erro ao enviar mensagem:', errorMessage);
                        }
                    }
                } catch (error) {
                    console.error('Erro de conexão ao enviar o formulário principal:', error);
                    if (formStatusMessageMain) {
                        formStatusMessageMain.textContent = 'Erro de conexão. Por favor, tente novamente mais tarde.';
                        formStatusMessageMain.classList.remove('success');
                        formStatusMessageMain.classList.add('error');
                        formStatusMessageMain.style.display = 'block';
                        setTimeout(() => {
                            formStatusMessageMain.style.display = 'none';
                        }, 5000);
                    }
                }
            });
        }
    }

    function validateMainContactFormFields() {
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        let isValid = true;

        if (nameInput && nameError) {
            if (nameInput.value.trim() === '') {
                nameError.textContent = 'O nome é obrigatório.';
                isValid = false;
            }
        }

        if (emailInput && emailError) {
            if (emailInput.value.trim() === '') {
                emailError.textContent = 'O e-mail é obrigatório.';
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim())) {
                emailError.textContent = 'Por favor, insira um e-mail válido.';
                isValid = false;
            }
        }

        if (messageInput && messageError) {
            if (messageInput.value.trim() === '') {
                messageError.textContent = 'A mensagem é obrigatório.';
                isValid = false;
            } else if (messageInput.value.trim().length < 10) {
                messageError.textContent = 'A mensagem deve ter pelo menos 10 caracteres.';
                isValid = false;
            }
        }
        return isValid;
    }

    function initHeaderVisibility() {
        if (pageHeader && mainNav) {
            window.addEventListener('scroll', function() {
                const shouldStayVisible = mainNav.classList.contains('active');

                if (window.scrollY > lastScrollY && window.scrollY > 150 && !shouldStayVisible) {
                    pageHeader.classList.add('hidden');
                } else if (window.scrollY < lastScrollY || window.scrollY <= 50 || shouldStayVisible) {
                    pageHeader.classList.remove('hidden');
                }
                lastScrollY = window.scrollY;
            });
        }
    }

    function initUrlStatusMessage() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status && formStatusMessageMain) {
            let messageDiv = document.createElement('div');
            messageDiv.classList.add('form-status-message');

            if (status === 'success') {
                messageDiv.textContent = 'Mensagem enviada com sucesso! Em breve entraremos em contato.';
                messageDiv.classList.add('success');
            } else if (status === 'error') {
                messageDiv.textContent = 'Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente mais tarde.';
                messageDiv.classList.add('error');
            }

            formStatusMessageMain.innerHTML = '';
            formStatusMessageMain.appendChild(messageDiv);
            formStatusMessageMain.style.display = 'block';

            window.history.replaceState({}, document.title, window.location.pathname);

            setTimeout(() => {
                formStatusMessageMain.style.display = 'none';
                if (messageDiv.parentNode) {
                    messageDiv.parentNode.removeChild(messageDiv);
                }
            }, 5000);
        }
    }

    initMenu();
    initLightbox();
    initScrollToTopButton();
    initScrollReveal();
    initMainContactForm();
    initHeaderVisibility();
    initUrlStatusMessage();
});