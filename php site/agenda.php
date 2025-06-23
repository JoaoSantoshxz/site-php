<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKROFISIO - Agendamento de Horário</title>
    <!-- Inclui o CSS principal para manter a identidade visual -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Link para Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Ícone da página -->
    <link rel="icon" href="imagem/logo.png" type="image/png">
    
    <!-- Fonte Inter do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos específicos para a página de agendamento */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Garante que o body ocupe a altura total da viewport */
            background-color: #000000; /* Fundo preto para a página */
        }

        main {
            flex-grow: 1; /* Permite que o conteúdo principal ocupe o espaço restante */
            display: flex;
            align-items: center; /* Centraliza verticalmente o formulário */
            justify-content: center; /* Centraliza horizontalmente o formulário */
            padding: 40px 20px; /* Adiciona algum padding */
        }

        .scheduling-page-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 650px; /* Largura máxima para o formulário */
            box-sizing: border-box; /* Inclui padding na largura total */
        }

        .scheduling-page-container h3 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.2em;
            font-weight: 700;
        }

        .scheduling-page-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #34495e;
        }

        .scheduling-page-container input[type="text"],
        .scheduling-page-container input[type="email"],
        .scheduling-page-container input[type="tel"],
        .scheduling-page-container select,
        .scheduling-page-container input[type="date"] {
            width: calc(100% - 24px); /* Ajuste para o padding interno */
            padding: 12px;
            margin-bottom: 25px;
            border: 1px solid #c0c0c0;
            border-radius: 8px;
            font-size: 1.1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .scheduling-page-container input[type="text"]:focus,
        .scheduling-page-container input[type="email"]:focus,
        .scheduling-page-container input[type="tel"]:focus,
        .scheduling-page-container select:focus,
        .scheduling-page-container input[type="date"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        .scheduling-page-container button[type="submit"] {
            background-color: #28a745; /* Cor verde para ação de agendamento */
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.25rem;
            font-weight: 700;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .scheduling-page-container button[type="submit"]:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        /* Rodapé no final da página */
        footer {
            margin-top: auto;
            width: 100%;
            background-color: #333; /* Cor de fundo do rodapé */
            color: white; /* Cor do texto do rodapé */
            padding: 20px 0;
            text-align: center;
        }
        .footer-contact-info p,
        .footer-social-icons {
            margin-bottom: 10px;
        }
        .footer-social-icons li {
            display: inline-block;
            margin: 0 8px;
        }
        .footer-social-icons a {
            color: white;
            font-size: 1.5em;
            transition: color 0.3s ease;
        }
        .footer-social-icons a:hover {
            color: #007bff; /* Cor ao passar o mouse */
        }
        .footer-contact-info p i {
            margin-right: 8px;
        }

        /* Botão de scroll to top */
        #scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 1.5em;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: background-color 0.3s ease, opacity 0.3s ease;
            opacity: 0; /* Começa escondido */
            visibility: hidden; /* Escondido para acessibilidade */
            z-index: 900;
        }

        #scroll-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        #scroll-to-top:hover {
            background-color: #0056b3;
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
                    <li><a href="index.php">Voltar ao início</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="scheduling-page-container">
            <h3>Agende Seu Horário na AKROFISIO</h3>
            <form action="processa_agendamento.php" method="POST">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="servico">Serviço Desejado:</label>
                <select id="servico" name="servico" required>
                    <option value="">Selecione um serviço</option>
                    <option value="fisioterapia_ortopedica">Fisioterapia Ortopédica</option>
                    <option value="fisioterapia_neurologica">Fisioterapia Neurológica</option>
                    <option value="reabilitacao_esportiva">Reabilitação Esportiva</option>
                    <option value="pilates">Pilates</option>
                    <option value="outros">Outros</option>
                </select>

                <label for="data">Data Preferencial:</label>
                <input type="date" id="data" name="data" required>

                <label for="hora">Hora Preferencial:</label>
                <select id="hora" name="hora" required>
                    <option value="">Selecione uma hora</option>
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                </select>

                <button type="submit">Agendar Agora</button>
            </form>
        </div>
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
                <!-- PHP para exibir o ano atual dinamicamente -->
                <p>&copy; <?php echo date("Y"); ?> Clínica de Fisioterapia AKROFISIO. Todos os direitos reservados.</p>
                <nav>
                </nav>
            </div>
        </div>
    </footer>

    <button id="scroll-to-top" aria-label="Voltar ao topo">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <script src="js/script.js"></script>
    <script>
        // Lógica para o botão de scroll to top (se aplicável, pode ser movido para script.js)
        const scrollToTopBtn = document.getElementById('scroll-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) { // Mostra o botão após rolar 100px
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Rolagem suave
            });
        });
    </script>
</body>
</html>
