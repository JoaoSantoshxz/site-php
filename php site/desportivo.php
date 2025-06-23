<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKROFISIO - Fisioterapia Desportiva</title>
    <!-- Link para Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Ícone da página -->
    <link rel="icon" href="imagem/logo.png" type="image/png">
    
    <!-- Fonte Inter do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        /* Variáveis CSS */
        :root {
            --primary-color: #5ec2bd; /* Azul esverdeado, similar ao turquesa */
            --secondary-color: #433f3e; /* Cinza escuro, quase preto */
            --text-light: #ffffff;
            --text-dark: #333; /* Usado para texto em fundos claros */
            --background-dark: #000000;
            --background-light: #ffffff;
            --whatsapp-green: #25D366;
            --whatsapp-green-hover: #1DA851;
            --email-red: #D44638;
            --email-red-hover: #B53629;
            --instagram-pink: #E4405F;
            --instagram-pink-hover: #C13584;
            --social-dark: #000000; /* Para TikTok e X/Twitter que são pretos */
            --social-dark-hover: #333;
            --border-light: #eee;
            --border-medium: #ddd;
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.2);
            --shadow-strong: rgba(0, 0, 0, 0.25);
        }

        /* --- Estilos Base --- */
        body {
            margin: 0;
            padding-top: 100px; /* Compensa o header fixo */
            line-height: 1.6;
            background-color: var(--background-dark);
            color: var(--text-light);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden; /* Evita rolagem horizontal indesejada */
        }

        h1, h2, h3, h4 {
            color: var(--primary-color);
            margin-bottom: 15px;
            line-height: 1.2;
        }

        h1 { font-size: 2.5em; }
        h2 { font-size: 2em; }
        h3 { font-size: 1.5em; }
        h4 { font-size: 1.2em; }

        p {
            color: var(--text-light);
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--secondary-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .button {
            display: inline-block;
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: var(--secondary-color);
            color: var(--text-light);
        }

        /* --- Header --- */
        header {
            background-color: var(--background-light);
            color: var(--secondary-color);
            padding: 0;
            height: 100px;
            box-shadow: 0 2px 5px var(--shadow-light);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        }

        header.hidden {
            transform: translateY(-100%); /* Move o header para cima, para fora da tela */
            opacity: 0;
            pointer-events: none; /* Impede interações com o header escondido */
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            height: 100%;
        }

        header .logo img {
            height: 90px;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex; /* Por padrão para desktop */
        }

        header nav ul li {
            margin-left: 20px;
        }

        header nav ul li:first-child {
            margin-left: 0;
        }

        header nav ul li a {
            color: var(--secondary-color);
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        header nav ul li a:hover {
            background-color: var(--primary-color);
            color: var(--text-light);
        }

        /* --- Menu Hambúrguer (Mobile) --- */
        .menu-toggle {
            display: none; /* Escondido por padrão (será mostrado em mobile via media query) */
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 101;
        }

        .menu-toggle span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: var(--secondary-color);
            margin: 5px 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .menu-toggle.open span:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }
        .menu-toggle.open span:nth-child(2) {
            opacity: 0;
        }
        .menu-toggle.open span:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        /* --- Navegação Principal (Mobile/Desktop) --- */
        .main-nav {
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out, visibility 0.3s ease-out;
        }

        /* Estado inicial do menu mobile (escondido) */
        @media (max-width: 768px) {
            .main-nav {
                position: absolute;
                top: 100px; /* Começa abaixo do header */
                left: 0;
                width: 100%;
                max-height: 0; /* Escondido por altura */
                overflow: hidden; /* Garante que o conteúdo não vaze */
                background-color: var(--background-light);
                box-shadow: 0 2px 5px var(--shadow-light);
                z-index: 99;
                opacity: 0;
                visibility: hidden;
            }

            .main-nav ul {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
                margin: 0;
            }

            .main-nav ul li {
                margin: 10px 0;
                width: 100%; /* Links ocupam a largura total em mobile */
            }

            .main-nav ul li a {
                display: block; /* Para que o padding/hitbox seja maior */
                padding: 10px 0;
                color: var(--secondary-color);
                border-bottom: 1px solid var(--border-light);
                width: 100%;
                text-align: left;
            }

            .main-nav ul li:last-child a {
                border-bottom: none;
            }

            /* Estado do menu mobile (ativo/aberto) */
            .main-nav.active {
                max-height: 500px; /* Altura suficiente para o menu se expandir */
                opacity: 1;
                visibility: visible;
                overflow-y: auto; /* Permite rolagem se muitos itens */
            }
        }

        /* --- Media Queries Gerais --- */
        @media (max-width: 768px) {
            .menu-toggle {
                display: block; /* Mostra o ícone do hambúrguer em mobile */
            }

            header .container {
                justify-content: space-between;
                align-items: center;
            }

            /* Ajustes para a nova seção de contato em mobile (se presente) */
            .contact-grid {
                flex-direction: column;
            }

            .contact-form-column,
            .contact-info-column {
                width: 100%;
                margin-right: 0;
                margin-bottom: 30px;
            }

            .contact-info-column {
                margin-top: 0;
            }

            .contact-map-section {
                padding: 20px 0;
            }
        }

        @media (min-width: 769px) {
            .menu-toggle {
                display: none; /* Esconde o ícone do hambúrguer em desktop */
            }

            header nav {
                display: block; /* Garante que a nav principal seja exibida */
            }

            .main-nav {
                display: block; /* Garante a exibição em desktop */
                position: static; /* Remove o posicionamento absoluto */
                width: auto;
                max-height: none; /* Remove o limite de altura */
                box-shadow: none;
                background-color: transparent;
                transition: none; /* Desativa transições do mobile */
                opacity: 1; /* Garante visibilidade */
                visibility: visible; /* Garante visibilidade */
            }

            .main-nav ul {
                flex-direction: row; /* Volta para layout horizontal */
                align-items: center;
                padding: 0;
            }

            .main-nav ul li {
                margin-left: 20px;
                margin-bottom: 0;
            }

            .main-nav ul li:first-child {
                margin-left: 0;
            }

            .main-nav ul li a {
                display: inline-block; /* Volta para inline-block */
                padding: 8px 12px;
                border-bottom: none;
                text-align: center; /* Centraliza o texto */
            }

            /* Desktop: layout de duas colunas para o contato */
            .contact-grid {
                display: flex;
                justify-content: space-between;
                gap: 40px;
            }

            .contact-form-column,
            .contact-info-column {
                width: calc(50% - 20px);
            }
        }

        /* --- Hero Section (se presente na página) --- */
        .hero {
            padding: 80px 0;
            text-align: center;
        }

        .hero .container {
            max-width: 800px;
        }

        .hero h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            color: var(--text-light);
            margin-bottom: 30px;
        }

        /* --- Serviços Section (se presente na página) --- */
        .servicos {
            padding: 60px 0;
        }

        .servicos h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        .servicos-lista {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .servico-item {
            background-color: var(--background-light);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            text-align: center;
            /* Animação para aparecer ao rolar */
            transform: translateY(20px);
            opacity: 0;
            transition: transform 0.6s ease-out, opacity 0.6s ease-out;
        }

        .servico-item.aparecer {
            transform: translateY(0);
            opacity: 1;
        }

        .servico-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
            border-radius: 5px;
            /* Adicionado para o zoom na imagem */
            transition: transform 0.3s ease;
            cursor: pointer; /* Indica que a imagem é clicável */
        }

        .servico-item img:hover {
            transform: scale(1.05); /* Efeito de mini zoom */
        }

        .servico-item h3 {
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .servico-item p {
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .saiba-mais {
            color: var(--primary-color);
            font-weight: bold;
        }

        .saiba-mais:hover {
            text-decoration: underline;
        }

        /* --- Footer --- */
        footer {
            margin-top: auto; /* Garante que o footer vá para o final da página */
            width: 100%;
            background-color: var(--secondary-color);
            color: var(--text-light);
            padding: 30px 20px;
            text-align: center;
        }

        .footer-contact-info p {
            margin: 5px 0;
        }

        .footer-contact-info i {
            margin-right: 8px;
            color: var(--primary-color);
        }

        .footer-social-icons {
            list-style: none;
            padding: 0;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .footer-social-icons a {
            color: white;
            font-size: 1.5em;
            transition: color 0.3s ease;
        }

        .footer-social-icons a:hover {
            color: var(--primary-color);
        }

        /* --- Seções da Página de Estrutura --- */
        .estrutura-intro {
            padding: 60px 0;
            text-align: center;
            background-color: var(--background-dark);
        }

        .estrutura-intro h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        .estrutura-intro p {
            color: var(--text-light);
            font-size: 1.1em;
            max-width: 800px;
            margin: 0 auto 30px;
        }

        .galeria-ambientes {
            padding: 60px 0;
            background-color: var(--background-dark);
        }

        .ambiente-item {
            display: flex;
            flex-wrap: wrap; /* Permite que os itens quebrem linha em mobile */
            align-items: center;
            margin-bottom: 60px;
            background-color: var(--background-light);
            border-radius: 10px;
            box-shadow: 0 8px 20px var(--shadow-medium);
            overflow: hidden;

            /* Animação de aparição ao rolar */
            transform: translateY(30px);
            opacity: 0;
            transition: transform 0.8s ease-out, opacity 0.8s ease-out;
        }

        .ambiente-item.aparecer { /* Esta classe será adicionada pelo JS */
            transform: translateY(0);
            opacity: 1;
        }

        /* Estilo para a galeria de imagens dentro de cada item de ambiente */
        .ambiente-gallery {
            display: flex;
            flex-wrap: wrap; /* Permite que as imagens quebrem linha em mobile */
            gap: 10px; /* Espaço entre as imagens */
            width: 100%; /* Largura total em mobile */
            overflow: hidden; /* Garante que a borda arredondada do item pai funcione */
            background-color: var(--background-light); /* Para que as imagens não pareçam flutuar em fundos escuros */
            padding: 10px; /* Pequeno padding para as imagens dentro da galeria */
            box-sizing: border-box; /* Garante que o padding não adicione largura extra */
            justify-content: center; /* Centraliza as imagens se houver espaço extra */
        }

        /* Estilo para imagens individuais dentro da galeria */
        .ambiente-gallery img {
            flex: 1 1 150px; /* Permite que as imagens se ajustem e quebrem linha. Min-width de 150px */
            height: 180px; /* Altura fixa para as miniaturas de imagem em mobile */
            object-fit: cover; /* Recorta a imagem para cobrir o espaço sem distorcer */
            border-radius: 8px; /* Arredonda as bordas das imagens individuais */
            display: block;
            cursor: pointer; /* Indica que a imagem é clicável */
            transition: transform 0.3s ease; /* Transição suave para o zoom */
        }

        .ambiente-gallery img:hover {
            transform: scale(1.05); /* Efeito de mini zoom na imagem da galeria */
        }

        .ambiente-info {
            padding: 30px;
            flex: 1; /* Ocupa o espaço restante */
            color: var(--text-dark);
        }

        .ambiente-info h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .ambiente-info p {
            color: var(--text-dark);
            line-height: 1.8;
        }

        /* Layout para desktop: Galeria de imagens na esquerda, texto na direita */
        @media (min-width: 768px) {
            .ambiente-item {
                flex-direction: row;
            }

            .ambiente-gallery {
                width: 50%; /* Metade da largura para a galeria de imagens */
                height: auto; /* Altura automática para se ajustar ao conteúdo */
                max-height: 400px; /* Altura máxima para a galeria em desktop */
                align-content: flex-start; /* Alinha as linhas de imagens ao topo */
                padding: 20px; /* Ajusta o padding para desktop */
            }

            .ambiente-gallery img {
                height: 150px; /* Ajusta a altura da miniatura em desktop */
                flex: 1 1 calc(50% - 5px); /* Duas imagens por linha em desktop (ajusta o 5px para o gap/2) */
            }
            
            .ambiente-gallery img:only-child { /* Se for apenas uma imagem, ocupa 100% da largura da galeria */
                flex: 1 1 100%;
                height: 300px; /* Altura maior para imagem única */
            }

            .ambiente-info {
                width: 50%;
            }

            /* Layout invertido: Galeria de imagens na direita, texto na esquerda */
            .ambiente-item.invertido {
                flex-direction: row-reverse;
            }
        }

        /* --- Chamada para Ação Final (na página de Estrutura) --- */
        .call-to-action-estrutura {
            padding: 80px 0;
            text-align: center;
            background-color: var(--primary-color);
            color: var(--text-light);
        }

        .call-to-action-estrutura h2 {
            color: var(--text-light);
            margin-bottom: 20px;
            font-size: 2.2em;
        }

        .call-to-action-estrutura p {
            color: var(--text-light);
            font-size: 1.1em;
            margin-bottom: 30px;
        }

        .call-to-action-estrutura .button {
            background-color: var(--secondary-color);
        }

        .call-to-action-estrutura .button:hover {
            background-color: #333;
        }


        /* --- Estilos para Mensagens de Erro de Formulário --- */
        .error-message {
            color: #dc3545; /* Vermelho vibrante */
            font-size: 0.85em;
            margin-top: 5px;
            display: block; /* Garante que cada mensagem de erro fique em sua própria linha */
            text-align: left; /* Alinha o texto à esquerda */
            height: 1.2em; /* Garante que o layout não "pule" quando a mensagem aparece/desaparece */
        }

        /* Estilo para inputs inválidos */
        .main-contact-form input:invalid:not(:focus):not(:placeholder-shown),
        .main-contact-form textarea:invalid:not(:focus):not(:placeholder-shown) {
            border-color: #dc3545; /* Borda vermelha para campos inválidos */
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        /* --- Conteúdo Alternado (se presente em outras páginas) --- */
        .conteudo-alternado-complexo .container {
            padding: 40px 20px;
        }

        .item-complexo {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 40px;
            align-items: center;
        }

        .imagem-esquerda,
        .imagem-direita {
            width: 40%;
            margin-right: 30px;
        }

        .texto-direita,
        .texto-esquerda {
            width: 55%;
        }

        .texto-direita p,
        .texto-esquerda p {
            color: var(--text-light);
        }

        .item-complexo.invertido {
            flex-direction: row-reverse;
        }

        .item-complexo.invertido .imagem-direita {
            margin-left: 30px;
            margin-right: 0;
        }

        .item-complexo.invertido .texto-esquerda {
            text-align: right;
        }

        .imagem-esquerda img,
        .imagem-direita img {
            max-width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .item-complexo,
            .item-complexo.invertido {
                flex-direction: column;
                text-align: center;
            }

            .imagem-esquerda,
            .imagem-direita,
            .item-complexo.invertido .imagem-direita {
                width: 80%;
                margin: 0 auto 20px;
            }

            .texto-direita,
            .item-complexo.invertido .texto-esquerda {
                width: 100%;
                text-align: left;
            }
        }

        /* --- Seções de Detalhes de Serviços (se presente em outras páginas) --- */
        .introducao .container,
        .secao-quiropraxia .container,
        .secao-recovery .container,
        .secao-revitalize .container,
        .secao-pilates .container,
        .secao-transforme .container {
            padding: 40px 20px;
            text-align: center;
        }

        .introducao p,
        .secao-quiropraxia p,
        .secao-quiropraxia ul li,
        .secao-recovery p,
        .secao-revitalize p,
        .secao-revitalize ul li,
        .secao-pilates p,
        .secao-transforme p,
        .secao-transforme ul li {
            color: var(--text-light);
            text-align: left;
        }

        .secao-quiropraxia h3,
        .secao-revitalize h3,
        .secao-transforme h3 {
            margin-top: 20px;
            text-align: left;
        }

        .secao-quiropraxia ul,
        .secao-revitalize ul,
        .secao-transforme ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .secao-quiropraxia ul li,
        .secao-revitalize ul li {
            margin-bottom: 5px;
        }

        /* --- Seções e Elementos do Layout de Contato (se presente em outras páginas) --- */
        .contact-main-content {
            padding: 60px 0;
            background-color: var(--background-dark);
        }

        .contact-intro {
            text-align: center;
            margin-bottom: 50px;
        }

        .contact-intro h2 {
            color: var(--primary-color);
            font-size: 2.5em;
            margin-bottom: 15px;
        }

        .contact-intro p {
            color: var(--text-light);
            font-size: 1.1em;
            max-width: 700px;
            margin: 0 auto;
        }

        .contact-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 50px;
        }

        .contact-form-column,
        .contact-info-column {
            background-color: var(--background-light);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px var(--shadow-medium);
            flex: 1;
            min-width: 300px;
        }

        .contact-form-column h3,
        .contact-info-column h3 {
            color: var(--text-dark);
            text-align: center;
            margin-bottom: 25px;
        }

        .main-contact-form .form-group {
            margin-bottom: 20px;
        }

        .main-contact-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--text-dark);
        }

        .main-contact-form input[type="text"],
        .main-contact-form input[type="email"],
        .main-contact-form textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid var(--border-medium);
            border-radius: 4px;
            font-size: 1em;
            color: var(--text-dark);
            background-color: var(--background-light);
        }

        .main-contact-form textarea {
            resize: vertical;
            min-height: 100px;
        }

        .main-contact-form .submit-button {
            background-color: var(--primary-color);
            color: var(--text-light);
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            margin-top: 15px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .main-contact-form .submit-button:hover {
            background-color: var(--secondary-color);
        }

        /* Mensagens de feedback para o formulário principal */
        .form-status-message-main {
            margin-top: 20px;
        }

        .form-status-message {
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }

        .form-status-message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .form-status-message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }


        .direct-contacts-list {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }

        .direct-contacts-list li {
            margin-bottom: 15px;
            font-size: 1.1em;
            color: var(--text-dark);
        }

        .direct-contacts-list li a,
        .direct-contacts-list li i {
            display: flex;
            align-items: center;
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .direct-contacts-list li a:hover {
            color: var(--primary-color);
        }

        .direct-contacts-list li i {
            margin-right: 12px;
            font-size: 20px;
            color: var(--primary-color);
        }
        /* Cores específicas dos ícones */
        .direct-contacts-list li .fa-envelope { color: var(--email-red); }
        .direct-contacts-list li .fa-whatsapp { color: var(--whatsapp-green); }
        .direct-contacts-list li .fa-map-marker-alt { color: var(--primary-color); }
        .direct-contacts-list li .fa-phone { color: var(--primary-color); }


        .social-links-block {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-medium);
        }

        .social-links-block h4 {
            color: var(--text-dark);
            text-align: center;
            margin-bottom: 20px;
        }

        .social-icons-list {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-icons-list li a {
            font-size: 2.2em;
            color: var(--text-dark);
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .social-icons-list li a:hover {
            transform: translateY(-3px);
        }

        .social-icons-list li .fa-instagram:hover { color: var(--instagram-pink); }
        .social-icons-list li .fa-tiktok:hover { color: var(--social-dark); }
        .social-icons-list li .fa-x-twitter:hover { color: var(--social-dark); }


        /* --- Seção do Mapa (se presente em outras páginas) --- */
        .contact-map-section {
            padding: 50px 20px;
            text-align: center;
            background-color: var(--background-dark);
        }

        .contact-map-section h3 {
            color: var(--primary-color);
            margin-bottom: 30px;
        }

        .map-embed iframe {
            width: 100%;
            max-width: 1000px;
            height: 450px;
            border: 0;
            border-radius: 8px;
            box-shadow: 0 8px 16px var(--shadow-strong);
        }

        /* Scroll-to-top button */
        #scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: var(--text-light);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 1.5em;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 999;
        }

        #scroll-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        /* --- Lightbox/Modal de Imagem --- */
        #lightbox-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Fundo escuro semi-transparente */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000; /* Garante que fique acima de tudo */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #lightbox-modal.active {
            opacity: 1;
            visibility: visible;
        }

        #lightbox-modal #lightbox-image {
            max-width: 90%; /* Limita o tamanho da imagem para caber na tela */
            max-height: 90%; /* Limita o tamanho da imagem para caber na tela */
            object-fit: contain; /* Garante que a imagem inteira seja visível, sem cortar */
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            transform: scale(0.8); /* Inicia menor para animação */
            transition: transform 0.3s ease;
        }

        #lightbox-modal.active #lightbox-image {
            transform: scale(1); /* Anima para o tamanho normal ao aparecer */
        }

        #lightbox-modal .close-button {
            position: absolute;
            top: 20px;
            right: 30px;
            color: var(--text-light);
            font-size: 2.5em;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1; /* Alinha o 'X' no centro */
            transition: background-color 0.3s ease;
        }

        #lightbox-modal .close-button:hover {
            background-color: var(--primary-color);
        }

        /* Estilos específicos para a página de Fisioterapia Desportiva (e ortopédica) */
        .hero-fisioterapia-desportiva,
        .hero-fisioterapia { /* Adicionei aqui para reutilizar o estilo */
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://placehold.co/1920x600/000/fff?text=Fisioterapia+Desportiva') no-repeat center center/cover;
            color: var(--text-light);
            text-align: center;
            padding: 100px 20px;
            position: relative;
            z-index: 1;
            box-shadow: inset 0 -5px 15px rgba(0, 0, 0, 0.3);
        }

        .hero-fisioterapia-desportiva h1,
        .hero-fisioterapia h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            color: var(--primary-color);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-fisioterapia-desportiva p,
        .hero-fisioterapia p {
            font-size: 1.3em;
            max-width: 800px;
            margin: 0 auto 30px;
            line-height: 1.6;
        }

        .content-section {
            padding: 60px 20px;
            background-color: var(--background-dark);
            color: var(--text-light);
        }

        .content-section h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5em;
            color: var(--primary-color);
        }

        .content-block {
            display: flex;
            flex-wrap: wrap;
            align-items: center; /* Alinha os itens (texto e imagem) no centro vertical */
            margin-bottom: 60px;
            background-color: #1a1a1a;
            border-radius: 10px;
            box-shadow: 0 5px 15px var(--shadow-strong);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .content-block.inverted {
            flex-direction: row-reverse; /* Inverte a ordem para imagem à direita */
        }

        .content-block .text-content {
            flex: 1;
            padding: 30px;
            min-width: 300px;
            box-sizing: border-box;
        }

        .content-block .text-content h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.8em;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 10px;
        }

        .content-block .text-content p,
        .content-block .text-content ul {
            color: var(--text-light);
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .content-block .text-content ul {
            list-style-type: disc;
            padding-left: 25px;
        }
        
        .content-block .text-content ul li {
            margin-bottom: 8px;
        }

        .content-block .image-content {
            flex: 1;
            min-width: 300px; /* Garante que a imagem não fique muito pequena */
            height: 350px; /* Altura fixa para as imagens em desktop */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #333; /* Fundo escuro para a imagem */
        }

        .content-block .image-content img {
            width: 100%; /* Preenche a largura do contêiner */
            height: 100%; /* Preenche a altura do contêiner */
            object-fit: cover; /* Recorta a imagem para cobrir o espaço, mantendo a proporção */
            display: block;
            border-radius: 5px; /* Leve arredondamento na imagem */
        }

        .benefits-section {
            background-color: var(--secondary-color);
            padding: 60px 20px;
            text-align: center;
            color: var(--text-light);
        }

        .benefits-section h2 {
            color: var(--primary-color);
            margin-bottom: 40px;
            font-size: 2.5em;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .benefit-item {
            background-color: #1a1a1a;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px var(--shadow-medium);
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .benefit-item i {
            font-size: 2.5em;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: block;
            text-align: center;
        }

        .benefit-item h3 {
            color: var(--primary-color);
            font-size: 1.4em;
            margin-bottom: 10px;
            text-align: center;
        }

        .benefit-item p {
            color: var(--text-light);
            font-size: 1em;
            line-height: 1.6;
        }

        .fisioterapia-cta {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 80px 20px;
            text-align: center;
        }

        .fisioterapia-cta h2 {
            color: var(--text-light);
            font-size: 2.8em;
            margin-bottom: 20px;
        }

        .fisioterapia-cta p {
            font-size: 1.2em;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .fisioterapia-cta .button {
            background-color: var(--secondary-color);
            color: var(--text-light);
            font-size: 1.2em;
            padding: 15px 30px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .fisioterapia-cta .button:hover {
            background-color: #333;
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .hero-fisioterapia-desportiva h1,
            .hero-fisioterapia h1 {
                font-size: 2.5em;
            }
            .hero-fisioterapia-desportiva p,
            .hero-fisioterapia p {
                font-size: 1em;
            }
            .content-block {
                flex-direction: column;
                margin-bottom: 40px;
            }
            .content-block.inverted {
                flex-direction: column;
            }
            .content-block .text-content,
            .content-block .image-content {
                width: 100%;
                min-width: unset;
            }
            .content-block .image-content {
                height: 250px; /* Altura fixa em mobile para manter a consistência visual */
            }
            .content-section h2,
            .benefits-section h2,
            .fisioterapia-cta h2 {
                font-size: 2em;
            }
            .benefits-grid {
                grid-template-columns: 1fr;
            }
            .fisioterapia-cta .button {
                font-size: 1.1em;
                padding: 12px 25px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="imagem/logo_erianrazera 2.png" alt="Logotipo da Clínica AKROFISIO">
            </div>
            <button class="menu-toggle" aria-expanded="false" aria-controls="nav-list" aria-label="Abrir/Fechar Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="main-nav">
                <ul id="nav-list">
                    <li><a href="index.php">Início</a></li>
                    <li><a href="ortopedica.php">Fisioterapia Ortopédica</a></li>
                    <li><a href="desportivo.php">Fisioterapia Desportiva</a></li> <!-- Novo link -->
                    <li><a href="agenda.php">Agendamento</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero-fisioterapia-desportiva">
            <div class="container">
                <h1>Fisioterapia Desportiva</h1>
                <p>Cansado de Deixar a Lesão Ganhar o Jogo? Prepare-se para um Retorno Triunfal com a Fisioterapia Desportiva!</p>
            </div>
        </section>

        <section class="content-section">
            <div class="container">
                <h2>O Que é Essa Mágica que Traz Atletas de Volta?</h2>
                <div class="content-block">
                    <div class="text-content">
                        <h3>O Especialista em Performance e Recuperação!</h3>
                        <p>Imagine seu corpo como um atleta de alta performance. Ele está sempre no limite, exigindo o máximo de cada músculo, tendão e articulação. Às vezes, nesse ritmo intenso, acontece um "tilt": uma lesão que te tira do jogo, do treino ou até daquela caminhada que você tanto gosta.</p>
                        <p>É aí que entra o fisioterapeuta desportivo, o especialista em performance e recuperação de atletas (e de qualquer um que pratique atividade física!). Ele não só "conserta" o que está machucado, mas te prepara para voltar ainda mais forte, mais rápido e com menos chances de se lesionar novamente. Pense nele como o seu mecânico de elite para o corpo esportivo!</p>
                        <p>Ele vai te guiar em um plano de ação para:</p>
                        <ul>
                            <li>Acabar com a dor: Chega de jogar no sacrifício! A fisioterapia desportiva vai na raiz do problema, aliviando a dor e permitindo que você se mova sem desconforto.</li>
                            <li>Acelerar sua recuperação: Quer voltar a treinar e competir o quanto antes? Com técnicas e exercícios específicos, a fisio desportiva otimiza a cicatrização e fortalece a área lesionada.</li>
                            <li>Devolver sua performance máxima: Não é só voltar, é voltar melhor! Com exercícios de força, agilidade e equilíbrio, você recupera e até melhora seu desempenho esportivo.</li>
                            <li>Prevenir futuras lesões: Aprenda a identificar seus pontos fracos e a fortalecê-los, criando um "escudo" protetor contra novas lesões. É como blindar seu corpo para o próximo desafio!</li>
                            <li>Otimizar seus movimentos: Aperfeiçoe sua técnica e biomecânica para correr mais rápido, saltar mais alto ou arremessar com mais precisão, usando seu corpo de forma mais eficiente.</li>
                        </ul>
                    </div>
                    <div class="image-content">
                        <img src="imagem/des2.jpg" alt="[Image of atleta fazendo exercícios de fisioterapia desportiva]">
                    </div>
                </div>

                <div class="content-block inverted">
                    <div class="text-content">
                        <h3>Como é a Jornada de um Campeão (Mesmo Fora das Quadras)?</h3>
                        <p>A fisioterapia desportiva não é só repouso ou massagem. É um plano de ataque inteligente e personalizado:</p>
                        <ul>
                            <li>A Investigação Esportiva: O fisioterapeuta vai te ouvir com atenção, entender seu esporte, seu histórico de lesões e seus objetivos. Ele é o seu "detetive" particular no mundo do esporte!</li>
                            <li>A Avaliação de Performance: Ele vai testar sua força, flexibilidade, equilíbrio, padrões de movimento e até analisar a forma como você executa seu esporte. Tudo para entender exatamente o que precisa ser ajustado.</li>
                            <li>O Plano de Treino e Recuperação VIP: Com base na avaliação, ele cria um programa de exercícios exclusivo para você. Podem ser exercícios na academia, na esteira, com elásticos, pesos, e até alguns movimentos específicos do seu esporte.</li>
                            <li>A Execução com Acompanhamento de Elite: Você não estará sozinho! O fisioterapeuta te acompanha em cada exercício, garantindo que você faça tudo com a técnica perfeita para maximizar os resultados e evitar novas lesões.</li>
                            <li>A Celebração da Vitória: A cada sessão, você sentirá a evolução, ganhando mais confiança, diminuindo a dor e se aproximando do seu retorno triunfal ao esporte. E o melhor: com a certeza de que está mais preparado do que nunca!</li>
                        </ul>
                    </div>
                    <div class="image-content">
                        <img src="imagem/des1.jpg" alt="[Image of Fisioterapeuta auxiliando atleta em exercício de agilidade]">
                    </div>
                </div>

                <div class="content-block">
                    <div class="text-content">
                        <h3>Para Quem é a Fisioterapia Desportiva?</h3>
                        <p>Para QUALQUER PESSOA que:</p>
                        <ul>
                            <li>Pratica esportes (desde o atleta profissional até o corredor de fim de semana).</li>
                            <li>Faz academia, pilates, yoga ou qualquer atividade física regular.</li>
                            <li>Sofreu uma lesão esportiva (entorse, estiramento muscular, tendinite, fratura por estresse, etc.).</li>
                            <li>Está no pós-operatório de alguma lesão ligada ao esporte.</li>
                            <li>Quer prevenir lesões e melhorar sua performance.</li>
                            <li>Ou simplesmente deseja voltar a praticar sua atividade favorita sem dor e com segurança!</li>
                        </ul>
                    </div>
                    <div class="image-content">
                        <img src="imagem/des3.jpg" alt="[Image of Pessoas de diferentes idades praticando esportes]">
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits-section">
            <div class="container">
                <h2>Benefícios da Fisioterapia Desportiva</h2>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <i class="fas fa-hand-holding-medical"></i>
                        <h3>Recuperação Rápida</h3>
                        <p>Acelere a cura de lesões, permitindo um retorno mais rápido e seguro às suas atividades esportivas.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-chart-line"></i>
                        <h3>Melhora da Performance</h3>
                        <p>Otimize sua força, agilidade e flexibilidade, elevando seu desempenho no esporte.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Prevenção de Lesões</h3>
                        <p>Identifique e corrija desequilíbrios, criando um corpo mais resiliente contra novas lesões.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-running"></i>
                        <h3>Retorno Seguro ao Esporte</h3>
                        <p>Garanta um retorno gradual e seguro, minimizando riscos de reincidência e maximizando a confiança.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-dumbbell"></i>
                        <h3>Reabilitação Personalizada</h3>
                        <p>Programas de exercícios adaptados ao seu esporte e às suas necessidades individuais.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="fisioterapia-cta">
            <div class="container">
                <h2>Não Deixe a Lesão Te Parar!</h2>
                <p>Invista em você e no seu corpo! A fisioterapia desportiva é o seu atalho para a recuperação e para atingir o seu máximo potencial. Que tal dar o primeiro passo para o seu retorno triunfal?</p>
                <a href="agenda.php" class="button">Agendar Consulta Esportiva</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-contact-info">
            <p><i class="fas fa-phone-alt"></i> (44) 99107-6554</p>
            <p><i class="fas fa-envelope"></i> contato@akrofisio.com.br</p>
            <p><i class="fas fa-map-marker-alt"></i> Rua Pitangas, 1204 - Centro, Campo Mourão - PR</p>
            <ul class="footer-social-icons">
                <li><a href="https://www.instagram.com/akrofisio/" target="_blank" rel="noopener noreferrer" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://wa.me/554499689629" target="_blank" rel="noopener noreferrer" title="WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
            </ul>
            <div class="container">
                <p>&copy; <?php echo date("Y"); ?> Clínica de Fisioterapia AKROFISIO. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <button id="scroll-to-top" aria-label="Voltar ao topo">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!-- Inclui o JavaScript principal para funcionalidades interativas -->
    <script src="js/script.js"></script>
</body>
</html>
