<?php
    // Recebe os dados do formulário
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $jobTitle = $_POST['job-title'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    // Função para formatar o telefone
    function formatPhoneNumber($phone) {
        // Remove todos os caracteres não numéricos
        $phone = preg_replace('/\D/', '', $phone);
        
        // Adiciona parênteses ao DDD e formata o número
        if (strlen($phone) == 11) {
            return '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 5) . '-' . substr($phone, 7);
        } elseif (strlen($phone) == 10) {
            return '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 4) . '-' . substr($phone, 6);
        } else {
            return $phone; // Retorna o número sem formatação se não for 10 ou 11 dígitos
        }
    }

    // Formata o telefone
    $phone = formatPhoneNumber($phone);

    // Cria o conteúdo do arquivo HTML
    $htmlContent = "
    
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Assinatura de E-mail</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'>
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
                background-image: url('http://172.24.194.204/assinaturaEmail/img/body.jpg');
                background-size: cover;
                background-position: center;
                position: relative;
            }
            .content {
                position: absolute;
                top: 50%;
                left: 60%; /* Ajusta para 10% à direita do centro */
                transform: translate(-50%, -50%);
                text-align: left; /* Alinhar texto à esquerda */
                color: #000; /* Cor do texto sobre a imagem */
                font-size: 14px;
                padding: 10px;
                
                border-radius: 5px;
                width: 50%; /* Ajusta a largura do conteúdo para 50% da largura da imagem */
                box-sizing: border-box; /* Inclui padding e border na largura */
                z-index: 1; /* Garante que o texto esteja acima da imagem */
            }
            .name {
                font-size: 18px;
                font-weight: bold;
                color: #03435C;
            }
            .position {
                font-weight: bold; /* Negrito para o cargo */
                font-size: 15px; /* Tamanho do texto do cargo */
                margin: 5px 0;
            }
            .coordination {
                font-size: 12px; /* Tamanho menor para Diretoria / Coordenação */
                margin: 10px 0px 30px; /* Aumenta a margem para separar do telefone e email */
            }
            .phone, .email {
                font-size: 12px; /* Tamanho menor para Telefone e E-mail */
                margin: 5px 0;
                display: flex; /* Para alinhar o ícone e o texto */
                align-items: center; /* Centraliza verticalmente o ícone e o texto */
            }
            .phone i, .email i {
                margin-right: 5px; /* Espaçamento entre o ícone e o texto */
            }
            .email a {
                color: #000; /* Cor do link sobre a imagem */
                text-decoration: none;
            }
            .footer-image {
                width: 100%;
                height: 28px; /* Altura da imagem de rodapé */
                background-image: url('http://172.24.194.204/assinaturaEmail/img/rodape.jpg');
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
                display: flex; /* Para alinhar o ícone e o texto */
                align-items: center; /* Centraliza verticalmente o ícone e o texto */
            }
            .footer-image a i {
                margin-right: 5px; /* Espaçamento entre o ícone e o texto */
            }
            .fa-phone-alt{
                color: #03435C;
            }
            .fa-envelope{
                color: #03435C;
            }
            .info{
                margin-left: 10px;
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
                    <div class='phone'>
                        <i class='fas fa-phone-alt '></i> <div class='info'>$phone</div>
                    </div>
                    <div class='email'>
                        <i class='fas fa-envelope'></i> <div class='info'><a href='mailto:$email'>$email</a></div>
                    </div>
                </div>
            </div>

            <!-- Imagem de Rodapé -->
            <div class='footer-image'>
                <a href='https://ipea.gov.br' target='_blank' title='Ipea'>
                    <i class='fas fa-globe ' ></i> Ipea.gov.br
                </a>
                <a href='https://instagram.com/ipeaoficial' target='_blank' title='Instagram'>
                    <i class='fab fa-instagram'></i> @ipeaoficial
                </a>
                <a href='https://linkedin.com/company/ipea' target='_blank' title='LinkedIn'>
                    <i class='fab fa-linkedin'></i> @companyipea
                </a>
                <a href='https://youtube.com/user/agenciaipea' target='_blank' title='YouTube'>
                    <i class='fab fa-youtube'></i> agenciaipea
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
