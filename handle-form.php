<?php
    // Recebe os dados do formulário
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $jobTitle = $_POST['job-title'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    // Cria o conteúdo do arquivo HTML
    $htmlContent = "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Assinatura de E-mail</title>
        <style>
            .signature {
                width: 520px;
                font-family: Arial, sans-serif;
                color: #000; /* Cor do texto */
                position: relative;
            }
            .main-image {
                width: 100%;
                height: 158px; /* Altura da imagem principal */
                background-image: url('img/body.jpg');
                background-size: cover;
                background-position: center;
                position: relative;
            }
            .content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: #000; /* Cor do texto sobre a imagem */
                font-size: 14px;
                background-color: rgba(255, 255, 255, 0.6); /* Fundo semitransparente para melhor legibilidade */
                padding: 10px;
                border-radius: 5px;
                z-index: 1; /* Garante que o texto esteja acima da imagem */
            }
            .name {
                font-size: 18px;
                font-weight: bold;
            }
            .position, .coordination, .phone, .email {
                margin: 5px 0;
            }
            .email a {
                color: #000; /* Cor do link sobre a imagem */
                text-decoration: none;
            }
            .footer-image {
                width: 100%;
                height: 28px; /* Altura da imagem de rodapé */
                background-image: url('img/rodape.jpg');
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 15px; /* Espaçamento entre os itens */
                position: relative;
                z-index: 1; /* Garante que os links estejam acima da imagem de fundo */
            }
            .footer-image a {
                color: #fff; /* Cor do texto dos links */
                text-decoration: none;
                font-size: 12px; /* Tamanho do texto dos links */
            }
        </style>
    </head>
    <body>
        <div class='signature'>
            <!-- Imagem Principal -->
            <div class='main-image'>
                <!-- Conteúdo da Assinatura sobre a imagem -->
                <div class='content'>
                    <div class='name'>$name</div>
                    <div class='position'>$jobTitle</div>
                    <div class='coordination'>$department</div>
                    <div class='phone'>Telefone: $phone</div>
                    <div class='email'>
                        E-mail: <a href='mailto:$email'>$email</a>
                    </div>
                </div>
            </div>

            <!-- Imagem de Rodapé -->
            <div class='footer-image'>
                <a href='https://ipea.gov.br' target='_blank' title='Ipea'>
                    Ipea.gov.br
                </a>
                <a href='https://instagram.com/ipeaoficial' target='_blank' title='Instagram'>
                    @ipeaoficial
                </a>
                <a href='https://linkedin.com/company/ipea' target='_blank' title='LinkedIn'>
                    @companyipea
                </a>
                <a href='https://youtube.com/user/agenciaipea' target='_blank' title='YouTube'>
                    agenciaipea
                </a>
            </div>
        </div>
    </body>
    </html>
    ";

    // Define o nome do arquivo para download
    $fileName = "assinatura_email.html";

    // Define os headers para o download do arquivo
    header('Content-Type: text/html');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Length: ' . strlen($htmlContent));

    // Envia o conteúdo do arquivo HTML para o navegador
    echo $htmlContent;
    exit;
?>
