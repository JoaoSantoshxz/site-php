<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKROFISIO - Sua Clínica de Fisioterapia</title>
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="icon" href="imagem/logo.png" type="image/png">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
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
                    <li><a href="index.php">Voltar ao inicio</a></li>
                </ul>
            </nav>
        </div>
    </header>

    
    <main>
        <section class="hero">
            <div class="container">
                <h2>Akro Vem de Ah.kro</h2>
                <p>Substantivo</p>

                <h2>1 - Do Grego ákros</h2>
                <p>ákros, que significa "no topo mais alto"</p>

                <h2>2 - Derivado de ákros</h2>
                <p>Representa tudo aquilo que busca a excelência, o ápice.</p>

                <h2>Estar no topo</h2>
                <p>Alcançar o máximo, superar seus limites</p>
            </div>
        </section>

        
        <section class="conteudo-alternado-complexo">
            <div class="container">
                <div class="item-complexo invertido">
                    <div class="imagem-direita">
                    
                        <img src="imagem/logo_erianrazera 2.png" alt="Logotipo da Akrofisio com texto Akro." data-fullsrc="imagem/logo_erianrazera 2.png">
                    </div>
                    <div class="texto-esquerda">
                        <h3>Nossa Missão</h3>
                        <p>Na AKROFISIO, nossa missão é guiá-lo no caminho da excelência em saúde e bem-estar. Acreditamos que cada indivíduo possui um potencial ilimitado, e nossa equipe dedicada está aqui para ajudá-lo a alcançar o ápice de sua recuperação e performance, superando todos os limites.</p>
                        <p>Combinamos técnicas avançadas de fisioterapia com um atendimento humanizado, criando um ambiente onde você se sente acolhido e motivado a atingir seus objetivos.</p>
                    </div>
                </div>
                
            </div>
        </section>

        
        <section class="call-to-action-estrutura">
            <div class="container">
                <h2>Pronto para Alcançar o Ápice da Sua Saúde?</h2>
                <p>Entre em contato e descubra como a AKROFISIO pode transformar sua vida com tratamentos personalizados e uma equipe de especialistas.</p>
                <a href="contato.php" class="button">Fale Conosco</a>
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


    <div id="lightbox-modal">
        <span class="close-button" aria-label="Fechar imagem">X</span>
        <img id="lightbox-image" src="" alt="Imagem em destaque">
    </div>

    
    <script src="js/script.js"></script>
</body>
</html>