let lastScrollY = 0;

document.addEventListener('DOMContentLoaded', function() {

    // --- Seletores de Elementos (Agrupados por funcionalidade) ---

    // Elementos Comuns (presentes na maioria das páginas)
    const menuToggle = document.querySelector('.menu-toggle'); // Botão para abrir/fechar o menu hambúrguer
    const mainNav = document.querySelector('.main-nav');     // Contêiner principal da navegação
    const navList = document.querySelector('#nav-list');     // A lista <ul> dentro da navegação
    const pageHeader = document.querySelector('header');     // O elemento <header> da página
    const scrollToTopButton = document.getElementById('scroll-to-top'); // Botão "Voltar ao Topo"

    // Elementos do Lightbox/Modal de Imagem (se a página tiver galerias ou imagens clicáveis)
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxCloseButton = document.querySelector('#lightbox-modal .close-button');

    // Elementos para Animação de Aparição ao Rolar (Scroll Reveal)
    // Usados em seções de conteúdo que devem aparecer gradualmente (ex: "Ambiente", "Serviços")
    const ambienteItems = document.querySelectorAll('.ambiente-item'); // Itens na seção de ambiente
    const servicoItems = document.querySelectorAll('.servico-item');   // Itens na seção de serviços

    // Elementos do Formulário de Contato Principal (geralmente na página 'contato.php')
    // Importante: Certifique-se de que esses IDs/classes existam no HTML da sua página de contato.
    const mainContactForm = document.querySelector('.main-contact-form'); // O formulário principal
    const nameInput = document.getElementById('name');             // Campo Nome
    const emailInput = document.getElementById('email');           // Campo E-mail
    const messageInput = document.getElementById('message');         // Campo Mensagem
    const nameError = document.getElementById('name-error');       // Span de erro para Nome
    const emailError = document.getElementById('email-error');     // Span de erro para E-mail
    const messageError = document.getElementById('message-error');   // Span de erro para Mensagem
    const formStatusMessageMain = document.querySelector('.form-status-message-main'); // O elemento para feedback do formulário principal


    // --- Funções de Inicialização de Módulos ---

    /**
     * Inicializa a funcionalidade do menu hambúrguer.
     */
    function initMenu() {
        if (menuToggle && mainNav && navList) {
            menuToggle.addEventListener('click', function() {
                const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
                menuToggle.classList.toggle('open');
                mainNav.classList.toggle('active');
                menuToggle.setAttribute('aria-expanded', !isExpanded);
            });

            // Fecha o menu mobile se um link de navegação for clicado
            navList.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    if (mainNav.classList.contains('active')) {
                        closeMenu(); // Chama a função para fechar o menu
                    }
                });
            });
        }
    }

    /**
     * Fecha o menu hambúrguer, removendo as classes 'open' e 'active'.
     */
    function closeMenu() {
        if (menuToggle && mainNav) {
            menuToggle.classList.remove('open');
            mainNav.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    }

    /**
     * Inicializa a funcionalidade do lightbox de imagens.
     */
    function initLightbox() {
        console.log('initLightbox: Tentando inicializar o lightbox...');
        console.log('Elementos encontrados:');
        console.log('  lightboxModal:', lightboxModal);
        console.log('  lightboxImage:', lightboxImage);
        console.log('  lightboxCloseButton:', lightboxCloseButton);


        if (lightboxModal && lightboxImage && lightboxCloseButton) {
            console.log('initLightbox: Todos os elementos do lightbox foram encontrados. Adicionando listeners...');
            // Adiciona event listener a todas as imagens que devem abrir o lightbox.
            // Incluído o seletor '.clinic-image-item img' para imagens da parte da clínica.
            document.querySelectorAll('.ambiente-gallery img, .servico-item img, .clinic-image-item img').forEach(img => {
                img.addEventListener('click', function() {
                    console.log('Imagem clicada:', this);
                    // Pega o caminho da imagem grande do atributo data-fullsrc ou usa o src padrão
                    const fullSrc = this.getAttribute('data-fullsrc') || this.src;
                    const altText = this.alt; // Pega o texto alt da imagem
                    openLightbox(fullSrc, altText);
                });
            });

            // Fecha o lightbox ao clicar no botão de fechar (X)
            lightboxCloseButton.addEventListener('click', closeLightbox);

            // Fecha o lightbox ao clicar fora da imagem (no overlay)
            lightboxModal.addEventListener('click', (event) => {
                if (event.target === lightboxModal) {
                    closeLightbox();
                }
            });

            // Fecha o lightbox com a tecla ESC
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && lightboxModal.classList.contains('active')) {
                    closeLightbox();
                }
            });
        } else {
            console.warn('initLightbox: Um ou mais elementos do lightbox não foram encontrados. O lightbox pode não funcionar.');
        }
    }

    /**
     * Abre o lightbox com a imagem especificada.
     * @param {string} imgSrc - O caminho da imagem a ser exibida no lightbox.
     * @param {string} imgAlt - O texto alternativo (alt) da imagem.
     */
    function openLightbox(imgSrc, imgAlt) {
        if (lightboxModal && lightboxImage) {
            lightboxImage.src = imgSrc;
            lightboxImage.alt = imgAlt;
            lightboxModal.classList.add('active'); // Adiciona classe para exibir o modal
            document.body.style.overflow = 'hidden'; // Evita rolagem da página quando o modal está aberto
        }
    }

    /**
     * Fecha o lightbox.
     */
    function closeLightbox() {
        if (lightboxModal && lightboxImage) {
            lightboxModal.classList.remove('active'); // Remove classe para esconder o modal
            document.body.style.overflow = ''; // Restaura a rolagem da página
            lightboxImage.src = ''; // Limpa a imagem para otimização
        }
    }

    /**
     * Inicializa a funcionalidade do botão "Voltar ao Topo".
     */
    function initScrollToTopButton() {
        if (scrollToTopButton) {
            window.addEventListener('scroll', () => {
                // Mostra o botão após rolar 300px para baixo
                if (window.scrollY > 300) {
                    scrollToTopButton.classList.add('show');
                } else {
                    scrollToTopButton.classList.remove('show');
                }
            });

            // Rolagem suave ao clicar no botão
            scrollToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    }

    /**
     * Inicializa as animações de "scroll reveal" para elementos específicos.
     */
    function initScrollReveal() {
        // Função de callback para o Intersection Observer
        const handleIntersect = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Se o elemento está visível, adiciona a classe 'aparecer'
                    entry.target.classList.add('aparecer');
                    // Para de observar este elemento para que a animação não se repita
                    observer.unobserve(entry.target);
                }
            });
        };

        // Opções para o Intersection Observer
        const observerOptions = {
            root: null,      // Observa a viewport (elemento raiz padrão)
            threshold: 0.2,  // Ativa quando 20% do elemento está visível
            rootMargin: '0px' // Sem margem extra para o root
        };

        // Instancia o Intersection Observer
        const observer = new IntersectionObserver(handleIntersect, observerOptions);

        // Observa todos os elementos com a classe 'ambiente-item', se existirem
        if (ambienteItems.length > 0) {
            ambienteItems.forEach(item => {
                observer.observe(item);
            });
        }
        // Observa os elementos com a classe 'servico-item', se existirem
        if (servicoItems.length > 0) {
            servicoItems.forEach(item => {
                observer.observe(item);
            });
        }
    }
    
    /**
     * Inicializa a validação e o envio do formulário principal de contato (geralmente na página 'contato.php').
     */
    function initMainContactForm() {
        if (mainContactForm) {
            mainContactForm.addEventListener('submit', async function(event) {
                event.preventDefault(); // Impede o envio padrão do formulário HTML

                // Valida os campos do formulário
                const isValid = validateMainContactFormFields();

                if (!isValid) {
                    // Se o formulário não for válido, rola até o primeiro campo com erro
                    const firstInvalidElement = document.querySelector('.error-message:not(:empty)');
                    if (firstInvalidElement) {
                        firstInvalidElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return; // Impede o envio do formulário
                }

                // Se o formulário for válido, procede com o envio via AJAX (Formspree)
                const formData = new FormData(mainContactForm);
                const formspreeAction = mainContactForm.action; // Pega o atributo 'action' do HTML do formulário

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
                            mainContactForm.reset(); // Limpa o formulário
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
                } catch (error) { // Lida com erros de conexão de rede
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

    /**
     * Valida os campos do formulário principal de contato.
     * @returns {boolean} True se o formulário for válido, False caso contrário.
     */
    function validateMainContactFormFields() {
        // Limpa todas as mensagens de erro anteriores
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        let isValid = true; // Flag de validação

        // Validação do campo Nome
        if (nameInput && nameError) {
            if (nameInput.value.trim() === '') {
                nameError.textContent = 'O nome é obrigatório.';
                isValid = false;
            }
        }

        // Validação do campo Email
        if (emailInput && emailError) {
            if (emailInput.value.trim() === '') {
                emailError.textContent = 'O e-mail é obrigatório.';
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim())) {
                emailError.textContent = 'Por favor, insira um e-mail válido.';
                isValid = false;
            }
        }

        // Validação do campo Mensagem
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

    /**
     * Lógica para esconder/mostrar o HEADER ao rolar a página.
     * O formulário flutuante não é mais gerenciado aqui, pois foi removido.
     */
    function initHeaderVisibility() {
        if (pageHeader && mainNav) { // removemos as dependencias do formulario flutuante
            window.addEventListener('scroll', function() {
                // O header permanece visível se o menu mobile estiver aberto
                const shouldStayVisible = mainNav.classList.contains('active');

                // Se rolando para baixo, já passou de 150px e o menu não está aberto
                if (window.scrollY > lastScrollY && window.scrollY > 150 && !shouldStayVisible) {
                    pageHeader.classList.add('hidden'); // Esconde o header
                } 
                // Se rolando para cima, ou está nos primeiros 50px do topo, ou o menu está aberto
                else if (window.scrollY < lastScrollY || window.scrollY <= 50 || shouldStayVisible) {
                    pageHeader.classList.remove('hidden'); // Mostra o header
                }
                lastScrollY = window.scrollY; // Atualiza a última posição de rolagem
            });
        }
    }

    /**
     * Inicializa as mensagens de status do formulário principal com base nos parâmetros da URL.
     */
    function initUrlStatusMessage() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status && formStatusMessageMain) {
            let messageDiv = document.createElement('div');
            messageDiv.classList.add('form-status-message'); // Adiciona uma classe para estilização

            if (status === 'success') {
                messageDiv.textContent = 'Mensagem enviada com sucesso! Em breve entraremos em contato.';
                messageDiv.classList.add('success');
            } else if (status === 'error') {
                messageDiv.textContent = 'Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente mais tarde.';
                messageDiv.classList.add('error');
            }

            formStatusMessageMain.innerHTML = ''; // Limpa qualquer conteúdo anterior
            formStatusMessageMain.appendChild(messageDiv);
            formStatusMessageMain.style.display = 'block'; // Garante que o contêiner principal seja visível

            // Limpa os parâmetros da URL para evitar que a mensagem reapareça no refresh da página
            window.history.replaceState({}, document.title, window.location.pathname);

            // Esconde a mensagem após 5 segundos
            setTimeout(() => {
                formStatusMessageMain.style.display = 'none';
                if (messageDiv.parentNode) { // Verifica se ainda está no DOM antes de remover
                    messageDiv.parentNode.removeChild(messageDiv);
                }
            }, 5000);
        }
    }


    // --- Chamadas de Inicialização (Executadas quando o DOM estiver pronto) ---
    // Estas funções serão chamadas apenas uma vez para configurar os event listeners.
    initMenu();
    initLightbox();
    initScrollToTopButton();
    initScrollReveal();
    initMainContactForm(); // Permanece, pois lida com o formulário de contato principal
    initHeaderVisibility(); // Lógica de visibilidade do header sem o formulário flutuante
    initUrlStatusMessage();

}); // Fim de DOMContentLoaded
