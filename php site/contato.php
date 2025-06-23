<?php include 'includes/header.php'; ?>

    <section class="contact-main-content">
        <div class="container">
            <div class="contact-intro">
                <h2>Gostaríamos de saber sua opinião.</h2>
                <p>Escolha o método mais conveniente e nós lhe retornaremos assim que possível.</p>
            </div>

            <div class="contact-grid">
                <div class="contact-form-column">
                    <h3>Envie uma Mensagem</h3>
                    <!-- AÇÃO DO FORMULÁRIO ALTERADA PARA FORMSPREE -->
                    <form action="https://formspree.io/f/YOUR_FORMSPREE_ID_FOR_MAIN_FORM" method="POST" class="main-contact-form">
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" required placeholder="Seu nome completo">
                            <span class="error-message" id="name-error"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Endereço de E-mail:</label>
                            <input type="email" id="email" name="email" required placeholder="seu.email@exemplo.com">
                            <span class="error-message" id="email-error"></span>
                        </div>

                        <div class="form-group">
                            <label for="message">Mensagem:</label>
                            <textarea id="message" name="message" rows="7" required placeholder="Sua mensagem..."></textarea>
                            <span class="error-message" id="message-error"></span>
                        </div>

                        <button type="submit" class="submit-button">Enviar Mensagem</button>
                    </form>
                    <div class="form-status-message-main"></div>
                </div>

                <div class="contact-info-column">
                    <h3>Nossos Contatos</h3>
                    <ul class="direct-contacts-list">
                        <li>
                            <a href="https://wa.me/554499689629?text=Olá!%20Gostaria%20de%20agendar%20um%20horário." target="_blank" rel="noopener noreferrer" title="Fale conosco pelo WhatsApp">
                                <i class="fab fa-whatsapp"></i> +55 44 9968-9629
                            </a>
                        </li>
                        <li>
                            <a href="mailto:contato@akrofisio.com.br" title="Enviar e-mail para AKROFISIO">
                                <i class="fas fa-envelope"></i> contato@akrofisio.com.br
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> Rua Pitangas, 1204 - Centro, Campo Mourão - PR
                        </li>
                        <li>
                            <i class="fas fa-phone"></i> (44) 9968-9629
                        </li>
                    </ul>

                    <div class="social-links-block">
                        <h4>Siga-nos:</h4>
                        <ul class="social-icons-list">
                            <li>
                                <a href="https://www.instagram.com/akrofisio/" target="_blank" rel="noopener noreferrer" title="Visitar Instagram da AKROFISIO">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@akrofisio" target="_blank" rel="noopener noreferrer" title="Visitar TikTok da AKROFISIO">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://x.com/akrofisio" target="_blank" rel="noopener noreferrer" title="Visitar X (Twitter) da AKROFISIO">
                                    <i class="fab fa-x-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="contact-map-section">
                <h3>Onde nos Encontrar</h3>
                <div class="map-embed">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.433606771038!2d-46.63419508493132!3d-23.55052008468798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59a6d0d2b51b%3A0x6e7d6b3c9b8f2c2!2sRua%20Augusta%2C%202000%20-%20Consola%C3%A7%C3%A3o%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001304-000!5e0!3m2!1spt-BR!2sbr!4v1678901234567!5m2!1spt-BR!2sbr"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </section>

<?php include 'includes/footer.php'; ?>
