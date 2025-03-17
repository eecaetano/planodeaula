<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Configuração do servidor de e-mail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // ou outro servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'seu-email@gmail.com';
    $mail->Password = 'sua-senha';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Destinatário e remetente
    $mail->setFrom('seu-email@gmail.com', 'Seu Nome');
    $mail->addAddress('e038143p@educacao.sp.gov.br');  // Destinatário

    //Anexando o PDF
    $mail->addAttachment('plano_de_aula.pdf');  // caminho para o PDF

    //Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Plano de Aula - PDF';
    $mail->Body    = 'Aqui está o plano de aula em formato PDF.';

    $mail->send();
    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail. Mailer Error: {$mail->ErrorInfo}";
}
