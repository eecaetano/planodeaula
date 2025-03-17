const sgMail = require('@sendgrid/mail');
sgMail.setApiKey('SUA_CHAVE_API_DO_SENDGRID');

const fs = require('fs');

const pdfData = fs.readFileSync('plano_de_aula.pdf');

const msg = {
  to: 'e038143p@educacao.sp.gov.br',
  from: 'seu-email@dominio.com',  // seu e-mail ou o e-mail configurado no SendGrid
  subject: 'Plano de Aula - PDF',
  text: 'Aqui está o plano de aula em formato PDF. Por favor, anexe o arquivo PDF antes de enviar.',
  attachments: [
    {
      content: pdfData.toString('base64'),
      filename: 'plano_de_aula.pdf',
      type: 'application/pdf',
      disposition: 'attachment'
    }
  ]
};

sgMail.send(msg)
  .then(() => {
    console.log('E-mail enviado com sucesso!');
  })
  .catch((error) => {
    console.error('Erro ao enviar o e-mail:', error);
  });
